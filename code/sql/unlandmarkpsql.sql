create schema unlandmark;

-- owner
-- TBD

-- group
-- TBD
-- CREATE GROUP name ;

-- roles
-- TBD 
-- CREATE ROLE name ;

-- GRANT admin TO <>;


-- ALTER TABLE unlandmark.<>
-- OWNER TO postgres;

-- create index

-- foreign keys

-- audit tables

-- Example Function and Trigger

-- Run create function only once

CREATE OR REPLACE FUNCTION create_users_stamp() RETURNS trigger AS $create_users_stamp$
    BEGIN
        NEW.created_time := current_timestamp;
        NEW.created_by := current_user;
        RETURN NEW;
    END;
$create_users_stamp$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION update_users_stamp() RETURNS trigger AS $update_users_stamp$
    BEGIN
        NEW.updated_time := current_timestamp;
        NEW.updated_by := current_user;
        RETURN NEW;
    END;
$update_users_stamp$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION verify_users_stamp() RETURNS trigger AS $verify_users_stamp$
    BEGIN
        NEW.verified_time := current_timestamp;
        NEW.verified_by := current_user;
        RETURN NEW;
    END;
$verify_users_stamp$ LANGUAGE plpgsql;

-----------------------------
DROP TABLE IF EXISTS unlandmark.places;
CREATE TABLE unlandmark.places(
        places_id serial NOT NULL,
        landmark_name varchar(128),
        nickname varchar(128),
        address_id integer,
        original_use_type_id integer,
        original_use text,
        end_date varchar(20),
        current_use_type_id integer,
        current_use text,
        stories__id integer,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
  CONSTRAINT places_pkey PRIMARY KEY (places_id)
-- FOREIGN KEY (address_id) REFERENCES address(address_id),
-- FOREIGN KEY (places_type_id) REFERENCES landmark_type(places_type_id)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER insert_places_stamp BEFORE INSERT ON unlandmark.places
    FOR EACH ROW EXECUTE PROCEDURE create_users_stamp();

    CREATE TRIGGER update_places_stamp BEFORE UPDATE ON unlandmark.places
    FOR EACH ROW EXECUTE PROCEDURE update_users_stamp();

    CREATE TRIGGER verify_places_stamp BEFORE UPDATE ON unlandmark.places
    FOR EACH ROW EXECUTE PROCEDURE verify_users_stamp();
-------------------------------------
DROP TABLE IF EXISTS unlandmark.address;
CREATE TABLE unlandmark.address (
        address_id serial NOT NULL,
        current_address text,
        lat varchar(30),
        lng varchar(30),
        geocode_source varchar(20),
        location_latlng geometry(Point,4326),
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
  CONSTRAINT address_pkey PRIMARY KEY (location_latlng)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER insert_address_stamp BEFORE INSERT ON unlandmark.address
    FOR EACH ROW EXECUTE PROCEDURE create_users_stamp();

    CREATE TRIGGER update_address_stamp BEFORE UPDATE ON unlandmark.address
    FOR EACH ROW EXECUTE PROCEDURE update_users_stamp();

    CREATE TRIGGER verify_address_stamp BEFORE UPDATE ON unlandmark.address
    FOR EACH ROW EXECUTE PROCEDURE verify_users_stamp();
-------------------------------------
DROP TABLE IF EXISTS unlandmark.stories;
CREATE TABLE unlandmark.stories(
        stories_id serial NOT NULL,
        research_url_id integer,
        research_notes text,
        research_sources text,
        personal_history_text text,
        personal_history_subject text,
        personal_history_recorder text,
        followup_email varchar(255), 
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
  CONSTRAINT stories_pkey PRIMARY KEY (stories_id)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER insert_stories_stamp BEFORE INSERT ON unlandmark.stories
    FOR EACH ROW EXECUTE PROCEDURE create_users_stamp();

    CREATE TRIGGER update_stories_stamp BEFORE UPDATE ON unlandmark.stories
    FOR EACH ROW EXECUTE PROCEDURE update_users_stamp();

    CREATE TRIGGER verify_stories_stamp BEFORE UPDATE ON unlandmark.stories
    FOR EACH ROW EXECUTE PROCEDURE verify_users_stamp();
-------------------------------------------------
DROP TABLE IF EXISTS unlandmark.PlaceStories;
CREATE TABLE unlandmark.PlaceStories (
        places_id integer NOT NULL,
        stories_id integer NOT NULL,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,l
)
WITH (
  OIDS=FALSE
);

ALTER TABLE IF EXISTS unlandmark.PlaceStories 
        ADD CONSTRAINT Places_PlaceStories
        FOREIGN KEY (places_id)  REFERENCES  unlandmark.places(places_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

ALTER TABLE IF EXISTS unlandmark.PlaceStories
        ADD CONSTRAINT Stories_PlaceStories
        FOREIGN KEY (stories_id) REFERENCES unlandmark.stories(stories_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

    CREATE TRIGGER PlaceStories_stamp BEFORE INSERT OR UPDATE ON unlandmark.PlaceStories
    FOR EACH ROW EXECUTE PROCEDURE users_stamp();
-------------------------------------------
DROP TABLE IF EXISTS unlandmark.landmark_status;
CREATE TABLE unlandmark.landmark_status (
        landmark_status_id serial NOT NULL,
        landmark_status_description  varchar(20) NOT NULL,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
  CONSTRAINT landmark_status_pkey PRIMARY KEY (landmark_status_id)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER landmark_status_stamp BEFORE INSERT OR UPDATE ON unlandmark.landmark_status
    FOR EACH ROW EXECUTE PROCEDURE users_stamp();
-------------------------------------------
DROP TABLE IF EXISTS unlandmark.landmark_type;
CREATE TABLE unlandmark.landmark_type (
        landmark_type_id serial NOT NULL,
        landmark_type_description  varchar(30) NOT NULL,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
  CONSTRAINT landmark_type_pkey PRIMARY KEY (landmark_type_description)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER insert_landmark_type_stamp BEFORE INSERT ON unlandmark.landmark_type
    FOR EACH ROW EXECUTE PROCEDURE create_users_stamp();

    CREATE TRIGGER update_landmark_type_stamp BEFORE UPDATE ON unlandmark.landmark_type
    FOR EACH ROW EXECUTE PROCEDURE update_users_stamp();

    CREATE TRIGGER verify_landmark_type_stamp BEFORE UPDATE ON unlandmark.landmark_type
    FOR EACH ROW EXECUTE PROCEDURE verify_users_stamp();
--------------------------------------------------
DROP TABLE IF EXISTS unlandmark.landmark_url;
CREATE TABLE unlandmark.landmark_url (
        landmark_url_id serial NOT NULL,
        landmark_url_location  varchar(2083),
        landmark_url_type_id integer,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
  CONSTRAINT landmark_url_pkey PRIMARY KEY (landmark_url_id)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER landmark_url_stamp BEFORE INSERT OR UPDATE ON unlandmark.landmark_url
    FOR EACH ROW EXECUTE PROCEDURE users_stamp();
-----------------------------------------------
DROP TABLE IF EXISTS unlandmark.landmark_url_type;
CREATE TABLE unlandmark.landmark_url_type (
        landmark_url_type_id serial NOT NULL,
        landmark_type_url_description varchar(20) NOT NULL,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
CONSTRAINT landmark_url_type_pkey PRIMARY KEY (landmark_url_type_id)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER landmark_url_type_stamp BEFORE INSERT OR UPDATE ON unlandmark.landmark_url_type
    FOR EACH ROW EXECUTE PROCEDURE users_stamp();

DROP TABLE IF EXISTS unlandmark.users;
CREATE TABLE unlandmark.users (
        users_id serial NOT NULL,
        users_name varchar(20) NOT NULL,
        users_password varchar(255) NOT NULL,
        users_groups_id integer,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,
CONSTRAINT users_pkey PRIMARY KEY (users_id)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER users_stamp BEFORE INSERT OR UPDATE ON unlandmark.users
    FOR EACH ROW EXECUTE PROCEDURE users_stamp();
-------------------------------------
DROP TABLE IF EXISTS unlandmark.groups;
CREATE TABLE unlandmark.groups (
        groups_id serial NOT NULL,
        groups_name varchar(20) NOT NULL,
        verification_indicator boolean default FALSE,
        created_by varchar(20),
        created_time timestamp not null,
        updated_by varchar(20),
        updated_time timestamp,
        verified_by varchar(20),
        verified_time timestamp,

CONSTRAINT groups_pkey PRIMARY KEY (groups_id)
)
WITH (
  OIDS=FALSE
);

    CREATE TRIGGER groups_stamp BEFORE INSERT OR UPDATE ON unlandmark.groups
    FOR EACH ROW EXECUTE PROCEDURE users_stamp();

------------------------------------------