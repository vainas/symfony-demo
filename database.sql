CREATE DATABASE IF NOT EXISTS symfony;
USE symfony;

CREATE TABLE users(
id  int(255) auto_increment not null,
role varchar(20),
name varchar(255),
surname varchar(255),
email varchar(255),
password varchar(255),
image varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE categories(
id  int(255) auto_increment not null,
name varchar(255),
description text,
CONSTRAINT pk_categories PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE entries(
id  int(255) auto_increment not null,
user_id  int(255) not null,
category_id  int(255) not null,
title varchar(255),
content text,
status varchar(20),
image varchar(255),
CONSTRAINT pk_entries PRIMARY KEY(id),
CONSTRAINT fk_entries_user FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_entries_categories FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb;

CREATE TABLE tags(
id  int(255) auto_increment not null,
name varchar(255),
description text,
CONSTRAINT pk_tags PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE entry_tag(
id  int(255) auto_increment not null,
entry_id int(255) not null,
tag_id int(255) not null,
CONSTRAINT pk_entry_tag PRIMARY KEY(id),
CONSTRAINT fk_entry_tag_entries FOREIGN KEY(entry_id) REFERENCES entries(id),
CONSTRAINT fk_entry_tag_tags FOREIGN KEY(tag_id) REFERENCES tags(id)
)ENGINE=InnoDb;