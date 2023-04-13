CREATE DATABASE WA_Library;
USE WA_Library;

CREATE TABLE books(
id_book INT AUTO_INCREMENT PRIMARY KEY,
title NVARCHAR(50) NOT NULL,
author NVARCHAR (50) NOT NULL,
rel_date DATE NOT NULL,
genre NVARCHAR(30) NOT NULL,
page_count INT NOT NULL,
contents NVARCHAR(30)
);

CREATE TABLE users(
id_user INT AUTO_INCREMENT PRIMARY KEY,
password NVARCHAR(30) NOT NULL,
nickname NVARCHAR(30) NOT NULL,
email NVARCHAR(60) NOT NULL,
creation_date DATE NOT NULL,
profileURL NVARCHAR(99),
comment NVARCHAR(999)
);

CREATE TABLE user_inputs(
id_input INT AUTO_INCREMENT PRIMARY KEY,
stars CHAR(5),
r_state CHAR(10) NOT NULL DEFAULT 'none',
comment TEXT
);

ALTER TABLE user_inputs
ADD id_user INT NOT NULL,
ADD CONSTRAINT fk_u FOREIGN KEY (id_user) REFERENCES users (id_user);

ALTER TABLE user_inputs
ADD id_book INT NOT NULL,
ADD CONSTRAINT fk_b FOREIGN KEY (id_book) REFERENCES books (id_book);
select * from users;