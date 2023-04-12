use WA_Library;

CREATE TABLE books(
id_book INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
title NVARCHAR(50) NOT NULL,
author NVARCHAR (50) NOT NULL,
rel_date DATE NOT NULL,
genre NVARCHAR(30) NOT NULL,
page_count INT NOT NULL,
contents NVARCHAR(30) NULL
);

CREATE TABLE users(
id_user INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
password NVARCHAR(30) NOT NULL,
nickname NVARCHAR(30) NOT NULL,
email NVARCHAR(60) NOT NULL,
creation_date DATE NOT NULL DEFAULT GETDATE(),
profileURL NVARCHAR(99) NULL,
comment NVARCHAR(999) NULL
);


CREATE TABLE user_inputs(
id_input INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
stars NVARCHAR(5) NULL,
r_state NVARCHAR(10) NOT NULL DEFAULT 'none',
comment NVARCHAR(999) NULL
);

ALTER TABLE user_inputs
ADD id_user INT NOT NULL,
CONSTRAINT fk_u FOREIGN KEY (id_user) REFERENCES users (id_user);

ALTER TABLE user_inputs
ADD id_book INT NOT NULL,
CONSTRAINT fk_b FOREIGN KEY (id_book) REFERENCES books (id_book);


