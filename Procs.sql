CREATE OR REPLACE PROCEDURE deletestock 
(v_name stocks.stock_name%type, v_price stocks.price%type, v_userid user_db.user_id%type) 
IS
v_quantity inventory.quantity%type;
v_money user_db.money%type;
no_quantity exception;
BEGIN
    select quantity into v_quantity from inventory where stock_name=v_name;
    select money into v_money from user_db where user_id=v_userid;
    if(v_quantity > 0) then
     delete from stocks where stock_name= v_name and ROWNUM=1;
     update user_db set money = v_money + v_price;
    else
        raise no_quantity;
    end if;
    exception when no_quantity then
        raise_application_error(-20000,'Insufficient Stocks');  
END deletestock;
/