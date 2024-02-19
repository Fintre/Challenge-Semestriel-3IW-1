-- Adminer 4.8.1 PostgreSQL 16.2 (Debian 16.2-1.pgdg120+2) dump

DROP TABLE IF EXISTS "gfm_categorie";
DROP SEQUENCE IF EXISTS gfm_categorie_id_seq;
CREATE SEQUENCE gfm_categorie_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."gfm_categorie" (
    "id" integer DEFAULT nextval('gfm_categorie_id_seq') NOT NULL,
    "description" character varying(255) NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "isDeleted" smallint DEFAULT '0' NOT NULL,
    CONSTRAINT "gfm_categorie_pkey" UNIQUE ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "gfm_comment";
DROP SEQUENCE IF EXISTS gfm_comment_id_seq;
CREATE SEQUENCE gfm_comment_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."gfm_comment" (
    "id" integer DEFAULT nextval('gfm_comment_id_seq') NOT NULL,
    "commentText" character varying(255) NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "user_id" integer NOT NULL,
    "post_id" integer NOT NULL,
    CONSTRAINT "gfm_comment_pkey" UNIQUE ("id")
) WITH (oids = false);

CREATE INDEX "gfm_comment_post_id" ON "public"."gfm_comment" USING btree ("post_id");

CREATE INDEX "gfm_comment_user_id" ON "public"."gfm_comment" USING btree ("user_id");


DROP TABLE IF EXISTS "gfm_media";
DROP SEQUENCE IF EXISTS gfm_media_id_seq;
CREATE SEQUENCE gfm_media_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."gfm_media" (
    "id" integer DEFAULT nextval('gfm_media_id_seq') NOT NULL,
    "tag" character varying(15) NOT NULL,
    "filepath" character varying(100) NOT NULL,
    "description" character varying(255) NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "isDeleted" smallint DEFAULT '0' NOT NULL,
    "post_id" integer NOT NULL,
    "type" character varying(15) NOT NULL,
    CONSTRAINT "gfm_media_pkey" UNIQUE ("id")
) WITH (oids = false);

CREATE INDEX "gfm_media_post_id" ON "public"."gfm_media" USING btree ("post_id");


DROP TABLE IF EXISTS "gfm_post";
DROP SEQUENCE IF EXISTS gfm_post_id_seq;
CREATE SEQUENCE gfm_post_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."gfm_post" (
    "id" integer DEFAULT nextval('gfm_post_id_seq') NOT NULL,
    "title" character varying(40) NOT NULL,
    "body" text NOT NULL,
    "type" character varying(40) NOT NULL,
    "slug" character varying(20) NOT NULL,
    "published" smallint DEFAULT '0' NOT NULL,
    "isdeleted" smallint DEFAULT '0' NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "user_username" character varying(25),
    "theme_id" integer,
    CONSTRAINT "gfm_post_pkey" UNIQUE ("id")
) WITH (oids = false);

CREATE INDEX "gfm_post_user_id" ON "public"."gfm_post" USING btree ("user_username");


DROP TABLE IF EXISTS "gfm_sitesetting";
DROP SEQUENCE IF EXISTS gfm_sitesetting_id_seq;
CREATE SEQUENCE gfm_sitesetting_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 32767 CACHE 1;

CREATE TABLE "public"."gfm_sitesetting" (
    "clé" character varying(45) NOT NULL,
    "valeur" character varying(255) NOT NULL,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "isDeleted" smallint DEFAULT '0' NOT NULL,
    "id" smallint DEFAULT nextval('gfm_sitesetting_id_seq') NOT NULL,
    CONSTRAINT "gfm_sitesetting_id" UNIQUE ("id"),
    CONSTRAINT "gfm_sitesetting_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "gfm_theme";
DROP SEQUENCE IF EXISTS gfm_theme_id_seq;
CREATE SEQUENCE gfm_theme_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."gfm_theme" (
    "id" integer DEFAULT nextval('gfm_theme_id_seq') NOT NULL,
    "titre" character varying(255) NOT NULL,
    "description" character varying(255),
    "actif" boolean DEFAULT false NOT NULL,
    CONSTRAINT "gfm_theme_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "gfm_user";
DROP SEQUENCE IF EXISTS gfm_user_id_seq;
CREATE SEQUENCE gfm_user_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."gfm_user" (
    "id" integer DEFAULT nextval('gfm_user_id_seq') NOT NULL,
    "firstname" character varying(25) NOT NULL,
    "lastname" character varying(50) NOT NULL,
    "email" character varying(320) NOT NULL,
    "username" character varying(25) NOT NULL,
    "pwd" character varying(255) NOT NULL,
    "status" smallint DEFAULT '0' NOT NULL,
    "img_path" character varying(255),
    "role" character varying(15) DEFAULT 'user',
    "reset_token" character varying(255),
    "reset_expires" timestamp,
    "createdat" timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "updatedat" timestamp DEFAULT CURRENT_TIMESTAMP,
    "activation_token" character varying(255),
    "is_active" boolean DEFAULT false,
    CONSTRAINT "gfm_user_email_key" UNIQUE ("email"),
    CONSTRAINT "gfm_user_pkey" UNIQUE ("id"),
    CONSTRAINT "gfm_user_username" UNIQUE ("username")
) WITH (oids = false);


ALTER TABLE ONLY "public"."gfm_comment" ADD CONSTRAINT "gfm_comment_post_fk" FOREIGN KEY (post_id) REFERENCES gfm_post(id) NOT DEFERRABLE;
ALTER TABLE ONLY "public"."gfm_comment" ADD CONSTRAINT "gfm_comment_user_fk" FOREIGN KEY (user_id) REFERENCES gfm_user(id) NOT DEFERRABLE;

ALTER TABLE ONLY "public"."gfm_media" ADD CONSTRAINT "gfm_media_post_fk" FOREIGN KEY (post_id) REFERENCES gfm_post(id) ON UPDATE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."gfm_post" ADD CONSTRAINT "gfm_post_theme_id_fkey" FOREIGN KEY (theme_id) REFERENCES gfm_theme(id) ON UPDATE CASCADE ON DELETE SET NULL NOT DEFERRABLE;
ALTER TABLE ONLY "public"."gfm_post" ADD CONSTRAINT "gfm_post_user_username_fkey" FOREIGN KEY (user_username) REFERENCES gfm_user(username) ON UPDATE CASCADE NOT DEFERRABLE;

-- 2024-02-19 20:20:10.165302+00
