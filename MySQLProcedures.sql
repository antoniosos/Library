use WA_Library;

delimiter $$
CREATE PROCEDURE insert_user(IN pswd NVARCHAR(30), IN nn NVARCHAR(30), IN email NVARCHAR(60))
BEGIN
  INSERT INTO users (password, nickname, email, creation_date)
  VALUES (pswd, nn, email, CURDATE());
END $$
delimiter;
