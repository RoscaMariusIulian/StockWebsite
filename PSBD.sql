CREATE TABLE inventory (
    inventory_id   NUMBER NOT NULL,
    user_id        NUMBER NOT NULL,
    stock_name     VARCHAR2(25),
    quantity       NUMBER
);

ALTER TABLE inventory ADD CONSTRAINT inventory_pk PRIMARY KEY ( inventory_id );

CREATE TABLE stocks (
    stock_id     NUMBER NOT NULL,
    user_id      NUMBER NOT NULL,
    stock_name   VARCHAR2(25),
    price        NUMBER,
    stock_date   DATE
);

ALTER TABLE stocks ADD CONSTRAINT stocks_pk PRIMARY KEY ( stock_id );

CREATE TABLE user_db (
    user_id      NUMBER NOT NULL,
    username     VARCHAR2(25),
    first_name   VARCHAR2(25),
    last_name    VARCHAR2(25),
    money        NUMBER
);

ALTER TABLE user_db ADD CONSTRAINT user_db_pk PRIMARY KEY ( user_id );

ALTER TABLE inventory
    ADD CONSTRAINT inventory_user_db_fk FOREIGN KEY ( user_id )
        REFERENCES user_db ( user_id );

ALTER TABLE stocks
    ADD CONSTRAINT stocks_user_db_fk FOREIGN KEY ( user_id )
        REFERENCES user_db ( user_id );

CREATE SEQUENCE inventory_inventory_id_seq START WITH 1 NOCACHE ORDER;

CREATE OR REPLACE TRIGGER inventory_inventory_id_trg BEFORE
    INSERT ON inventory
    FOR EACH ROW
    WHEN ( new.inventory_id IS NULL )
BEGIN
    :new.inventory_id := inventory_inventory_id_seq.nextval;
END;
/

CREATE SEQUENCE stocks_stock_id_seq START WITH 1 NOCACHE ORDER;

CREATE OR REPLACE TRIGGER stocks_stock_id_trg BEFORE
    INSERT ON stocks
    FOR EACH ROW
    WHEN ( new.stock_id IS NULL )
BEGIN
    :new.stock_id := stocks_stock_id_seq.nextval;
END;
/

CREATE SEQUENCE user_db_user_id_seq START WITH 1 NOCACHE ORDER;

CREATE OR REPLACE TRIGGER user_db_user_id_trg BEFORE
    INSERT ON user_db
    FOR EACH ROW
    WHEN ( new.user_id IS NULL )
BEGIN
    :new.user_id := user_db_user_id_seq.nextval;
END;
/
