create or replace trigger addate
before insert on stocks for each row
declare
    v_date stocks.stock_date%type;
begin
    select sysdate into v_date from dual;
    :new.stock_date := v_date;
end;
/

create or replace trigger buyprice
after insert on stocks for each row
declare
    v_money user_db.money%type;
    v_balance user_db.money%type;
    v_quantity inventory.quantity%type;
    no_money exception;
begin
    select money into v_money from user_db where user_id= :new.user_id;
    select quantity  into v_quantity from inventory where stock_name = :new.stock_name;
    v_balance := v_money - :new.price;
    if(v_balance >=0) then
        update user_db set money = v_balance;
        update inventory set quantity = quantity +1 where stock_name = :new.stock_name;
    else
         raise no_money;
    end if;
    exception when no_money then
        raise_application_error(-20000,'Insufficient Funds');
end;
/

create or replace trigger sellquantity
after delete on stocks for each row
declare
    v_quantity inventory.quantity%type;
begin
    select quantity into v_quantity from inventory where stock_name=:old.stock_name;
    v_quantity := v_quantity -1 ;
    if (v_quantity >=0 ) then  
        update inventory set quantity = v_quantity where stock_name=:old.stock_name;
    end if;
end;
/

