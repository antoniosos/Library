use wa_library;
alter table books add coverImgString varchar(999);

DELIMITER //

CREATE PROCEDURE insert_book (in bookTitle varchar(50), in bookAuthor varchar(50), in bookRelDate date, in bookGenre varchar(30), in bookPageCount int, in bookContents varchar(30))
BEGIN
  INSERT INTO books(title, author, rel_date, genre, page_count,contents)
  VALUES
  (bookTitle,bookAuthor,bookRelDate,bookGenre,bookPageCount,bookContents);
END //

DELIMITER ;

CALL insert_book('Fahrenheit 451','Ray Bradbury','1953-01-01','sci-fi',158,'');

