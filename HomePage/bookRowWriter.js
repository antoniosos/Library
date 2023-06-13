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
    starRating: null,
    readState: null,


    render: function() {
      const rowElement = document.createElement("tr");
      rowElement.classList.add("editable");
      rowElement.innerHTML = `
        <td class="coverImgString">${this.coverImgString}</td>
        <td class="id_book">${this.id_book}</td>
        <td class="title">${this.title}</td>
        <td class="author">${this.author}</td>
        <td class="rel_date">${this.rel_date}</td>
        <td class="genre">${this.genre}</td>
        <td class="page_count">${this.page_count}</td>
        <td class="contents">${this.contents}</td>
        <td class="starRating">${this.starRating}</td>
        <td class="readState">${this.readState}</td>
        <td>
          <button class="editButton" data-bookid="${this.id_book}">Edit</button>
          <button class="applyButton" data-bookid="${this.id_book}">Apply Changes</button>
          <button class="removeButton" data-bookid="${this.id_book}">Remove</button>
        </td>
        `;
        
        // Add event listeners to the buttons
          const editButton = rowElement.querySelector(".editButton");
          const applyButton = rowElement.querySelector(".applyButton");
          const removeButton = rowElement.querySelector(".removeButton");

          editButton.addEventListener("click", handleEdit);
          applyButton.addEventListener("click", handleApply);
          removeButton.addEventListener("click", handleRemove);


      return rowElement;
    }
  };
  
  class Book {
    constructor(id_book, title, author, rel_date, genre, page_count, contents, coverImgString, starRating, readState) {
      this.id_book = id_book;
      this.title = title;
      this.author = author;
      this.rel_date = rel_date;
      this.genre = genre;
      this.page_count = page_count;
      this.contents = contents;
      this.coverImgString = coverImgString;
      this.starRating = starRating;
      this.readState = readState;
      console.log("Star Rating: ", this.starRating);
      console.log("Read State: ", this.readState);

    }
  }
  
 

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      //console.log(this.responseText);
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
          bookData.coverImgString,
          bookData.starRating,
          bookData.readState
        );
        shelve.push(book);
      }

  // Render and append each row to the container element
  const container = document.getElementById("table");
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
    newRow.starRating = object.starRating;
    newRow.readState = object.readState;

    container.appendChild(newRow.render());
  });
};
    xmlhttp.open("GET","testbookFetcher.php");
    xmlhttp.send();

    
    function handleApply(event) {
      const button = event.target;
      const row = button.closest("tr");
      const cells = row.querySelectorAll("td");
    
      const updatedBook = {
        id_book: cells[1].textContent,
        title: cells[2].textContent,
        author: cells[3].textContent,
        rel_date: cells[4].textContent,
        genre: cells[5].textContent,
        page_count: cells[6].textContent,
        contents: cells[7].textContent,
        coverImgString: cells[0].textContent,
        starRating: cells[8].textContent,
        readState: cells[9].textContent
      };
      
      // Make an AJAX request to update the book's row in the database
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST", "updateBook.php");
      xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      xmlhttp.send(JSON.stringify(updatedBook));
    
      // Disable contentEditable and remove the editable class from the cells
      cells.forEach((cell) => {
        cell.contentEditable = false;
        //cell.classList.remove("editable");
      });
    
      // Enable the Edit button
      //row.querySelector("#editButton").disabled = false;

      location.reload();
    }
    
    
    function handleRemove(event) {
      const bookId = event.target.dataset.bookid;
            // Send the book ID to the server via AJAX request
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "removeBook.php");
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function () {
              if (this.readyState === 4 && this.status === 200) {
                // Handle the response if needed
              }
            };
            xmlhttp.send("bookId=" + bookid);
      location.reload();
    }

    function handleEdit(event) {
      const button = event.target;
      const row = button.closest("tr"); // Find the closest parent <tr> element
      const cells = row.querySelectorAll("td");
    
      // Iterate through the cells and make them editable (excluding buttons and id_book)  !!!!!don't forget to add "buttons" in css for it to work properly
      cells.forEach((cell) => {
        if (!cell.classList.contains("buttons") && cell.className !== "id_book") {
          cell.contentEditable = true;
          //cell.classList.add("editable");
        }
      });
    
      // Disable the Edit button
      button.disabled = true;
    }
    
    function sortBooks(selectedOption) {
      const bookContainer = document.getElementById("table");
      const bookElements = Array.from(bookContainer.getElementsByClassName("editable")); //book
    
      bookElements.sort((a, b) => {
        const aCell = a.querySelector("." + selectedOption);
        const bCell = b.querySelector("." + selectedOption);
    
        if (!aCell || !bCell) {
          return 0; // Return 0 to maintain the current order if cells are null
        }
    
        let aCellValue = aCell.textContent.trim();
        let bCellValue = bCell.textContent.trim();
    
        if (selectedOption === "page_count") {
          let parsedA = parseInt(aCellValue);
          let parsedB = parseInt(bCellValue);
          return parsedB - parsedA;
        } else {
          return aCellValue.localeCompare(bCellValue);
        }
      });
    
      // Clear the existing book container
      bookContainer.innerHTML = "";
    
      // Append the sorted book elements back to the container
      bookElements.forEach((book) => {
        bookContainer.appendChild(book);
      });
    }

    const filterDropdown = document.getElementById("filter");
    
    filterDropdown.addEventListener("change", function() {
      const selectedOption = filterDropdown.value;
      sortBooks(selectedOption);
    });
    