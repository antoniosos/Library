// Create an HTML row object
const row = {
    id_book: null,
    title: null,
    author: null,
    rel_date: null,
    genre: null,
    page_count: null,
    contents: null,
    coverImgString: null,
    render: function() {
      const rowElement = document.createElement("tr");
      rowElement.classList.add("my-book");
      rowElement.innerHTML = `
        <td class="coverImgString">${this.coverImgString}</td>
        <td class="id_book">${this.id_book}</td>
        <td class="title">${this.title}</td>
        <td class="author">${this.author}</td>
        <td class="rel_date">${this.rel_date}</td>
        <td class="genre">${this.genre}</td>
        <td class="page_count">${this.page_count}</td>
        <td class="contents">${this.contents}</td>

      `;
      return rowElement;
    }
  };
  
  class Book {
    constructor(id_book, title, author, rel_date, genre, page_count, contents, coverImgString) {
      this.id_book = id_book;
      this.title = title;
      this.author = author;
      this.rel_date = rel_date;
      this.genre = genre;
      this.page_count = page_count;
      this.contents = contents;
      this.coverImgString = coverImgString;
    }
  }
  
 

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {

     const response = JSON.parse(this.responseText);
     const shelve = [];
  
      // Loop through the response array obtained from PHP
      for (let i = 0; i < response.length; i++) {
        const bookData = response[i];
        const book = new Book(
          bookData.id_book,
          bookData.title,
          bookData.author,
          bookData.rel_date,
          bookData.genre,
          bookData.page_count,
          bookData.contents,
          bookData.coverImgString
        );
        shelve.push(book);
      }

  // Render and append each row to the container element
  const container = document.getElementById("my-books-body");
  shelve.forEach(function(object) {
    const newRow = Object.create(row);
    newRow.coverImgString = object.coverImgString;
    newRow.id_book = object.id_book;
    newRow.title = object.title;
    newRow.author = object.author;
    newRow.rel_date = object.rel_date;
    newRow.genre = object.genre;
    newRow.page_count = object.page_count;
    newRow.contents = object.contents;
    container.appendChild(newRow.render());
  });
};
    xmlhttp.open("GET","bookFetcher.php");
    xmlhttp.send();


  