drop sequence stocks_stock_id_seq;
drop sequence INVENTORY_INVENTORY_ID_SEQ;
drop sequence user_db_user_id_seq;
drop trigger user_db_user_id_trg;
drop trigger stocks_stock_id_trg;
drop trigger INVENTORY_INVENTORY_ID_TRG;
drop table inventory;
drop table stocks;
drop table user_db;

desc user_db;
desc stocks;   
desc inventory;

insert into user_db (username, first_name, last_name, money) values ('Dizzel', 'Marius-Iulian', 'Rosca', 10000);

insert into stocks (user_id, stock_name, price) values (1, 'Facebook Inc.', 243.5000);

insert into inventory (user_id, stock_name, quantity) values (1, 'Tesla Inc.', 0);
insert into inventory (user_id, stock_name, quantity) values (1, 'Facebook Inc.', 0);
insert into inventory (user_id, stock_name, quantity) values (1, 'Amazon.com Inc.', 0);
insert into inventory (user_id, stock_name, quantity) values (1, 'Blizzard Inc.', 0);
insert into inventory (user_id, stock_name, quantity) values (1, 'Marvell Group Ltd.', 0);
insert into inventory (user_id, stock_name, quantity) values (1, 'Alphabet Inc.', 0);

select * from user_db;
select * from stocks;
select * from inventory;

delete from user_db;
delete from stocks;

update user_db set money = 15000 where user_id= 1;
update inventory set quantity =0; 

commit;




