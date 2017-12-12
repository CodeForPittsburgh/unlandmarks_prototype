/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  mark
 * Created: Nov 14, 2017
 */
CREATE FUNCTION create_users_stamp() RETURNS trigger AS $create_users_stamp$
    BEGIN
        NEW.created_time := current_timestamp;
        NEW.created_by := current_user;
        RETURN NEW;
    END;
$create_users_stamp$ LANGUAGE plpgsql;

CREATE FUNCTION update_users_stamp() RETURNS trigger AS $update_users_stamp$
    BEGIN
        NEW.updated_time := current_timestamp;
        NEW.updated_by := current_user;
        RETURN NEW;
    END;
$update_users_stamp$ LANGUAGE plpgsql;

CREATE FUNCTION verify_users_stamp() RETURNS trigger AS $verify_users_stamp$
    BEGIN
        NEW.verified_time := current_timestamp;
        NEW.verified_by := current_user;
        RETURN NEW;
    END;
$verify_users_stamp$ LANGUAGE plpgsql;

DROP TABLE IF EXISTS unlandmark.emp;
CREATE TABLE unlandmark.emp (
    empname text,
    salary integer,
    verified boolean,
    created_by varchar(20),
    created_time timestamp not null,
    updated_by varchar(20),
    updated_time timestamp,
    verified_by varchar(20),
    verified_time timestamp,
  CONSTRAINT empname_pkey PRIMARY KEY (empname)
)
WITH (
  OIDS=FALSE
);
    CREATE TRIGGER insert_places_stamp BEFORE INSERT ON unlandmark.emp
    FOR EACH ROW EXECUTE PROCEDURE create_users_stamp();

    CREATE TRIGGER update_places_stamp BEFORE UPDATE ON unlandmark.emp
    FOR EACH ROW EXECUTE PROCEDURE update_users_stamp();

    CREATE TRIGGER verify_places_stamp BEFORE INSERT ON unlandmark.emp
    FOR EACH ROW EXECUTE PROCEDURE verify_users_stamp();

--------------------------------
DROP TABLE IF EXISTS unlandmark.emp;
CREATE TABLE unlandmark.emp (
    empname           text PRIMARY KEY,
    salary            integer,
    verification_indicator boolean default FALSE
);

DROP TABLE IF EXISTS unlandmark.emp_audit;
CREATE TABLE unlandmark.emp_audit(
    operation         char(1)   NOT NULL,
    userid            text      NOT NULL,
    empname           text      NOT NULL,
    salary            integer,
    stamp             timestamp NOT NULL
);

DROP VIEW IF EXISTS unlandmark.emp_view;
CREATE VIEW unlandmark.emp_view AS
    SELECT e.empname,
           e.salary,
           max(ea.stamp) AS last_updated
      FROM unlandmark.emp e
      LEFT JOIN unlandmark.emp_audit ea ON ea.empname = e.empname
     GROUP BY 1, 2;

CREATE OR REPLACE FUNCTION unlandmark.update_emp_view() RETURNS TRIGGER AS $$
    BEGIN
        --
        -- Perform the required operation on emp, and create a row in emp_audit
        -- to reflect the change made to emp.
        --
        IF (TG_OP = 'DELETE') THEN
            DELETE FROM emp WHERE empname = OLD.empname;
            IF NOT FOUND THEN RETURN NULL; END IF;

            OLD.last_updated = now();
            INSERT INTO emp_audit VALUES('D', user, OLD.*);
            RETURN OLD;
        ELSIF (TG_OP = 'UPDATE') THEN
            UPDATE emp SET salary = NEW.salary WHERE empname = OLD.empname;
            IF NOT FOUND THEN RETURN NULL; END IF;

            NEW.last_updated = now();
            INSERT INTO emp_audit VALUES('U', user, NEW.*);
            RETURN NEW;
        ELSIF (TG_OP = 'INSERT') THEN
            INSERT INTO emp VALUES(NEW.empname, NEW.salary);

            NEW.last_updated = now();
            INSERT INTO emp_audit VALUES('I', user, NEW.*);
            RETURN NEW;
        END IF;
    END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER emp_audit
INSTEAD OF INSERT OR UPDATE OR DELETE ON unlandmark.emp_view
    FOR EACH ROW EXECUTE PROCEDURE unlandmark.update_emp_view();

insert into unlandmark.emp (empname,salary,verification_indicator) values('Me',1000,'f');

select * from unlandmark.emp;

select emp_view;

update unlandmark.emp set verification_indicator = 't' where empname = 'Me';
insert into unlandmark.emp (empname,salary,verification_indicator) values('Me1',1000,'f');
insert into unlandmark.emp (empname,salary,verification_indicator) values('Me2',1000,'f');
insert into unlandmark.emp (empname,salary,verification_indicator) values('Me3',1000,'f');
update unlandmark.emp set verification_indicator = 't' where empname = 'Me3';

