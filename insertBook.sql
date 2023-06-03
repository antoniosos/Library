use wa_library;
alter table books add coverImgString varchar(999);
alter table books add starRating varchar(5);
alter table books add readState varchar(9);
ALTER TABLE books
ADD COLUMN id_user INT,
ADD CONSTRAINT fk_user_id
FOREIGN KEY (id_user)
REFERENCES users(id_user);

DELIMITER //

CREATE  PROCEDURE insert_book(in bookTitle varchar(50), in bookAuthor varchar(50), in bookRelDate date, in bookGenre varchar(30), in bookPageCount int, in bookContents varchar(30), in bookUserid int, in bookRating varchar(5), in bookState varchar(9))
BEGIN
  INSERT INTO books(title, author, rel_date, genre, page_count,contents, id_user, starRating, readState)
  VALUES
  (bookTitle,bookAuthor,bookRelDate,bookGenre,bookPageCount,bookContents, bookUserid, bookRating, bookState);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE check_ifMailExists (IN mail varchar(60))
BEGIN
  SELECT email
  FROM users
  WHERE users.email = mail;
END //

DELIMITER ;

