<html !DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homePageStyle.css">
    <title>Home</title>
    
</head>
<body>
    <header>
        <h1 class="heading">
            <a href="HomePage\testPage.php">My book list</a>
        </h1>
        <nav class="navbar">
            <div class="navbar-content">
                <a href="HomePage\testPage.php">Home</a>
                <a href="/AddBook/addBook.php">Add Book</a>
                <a href="Navbar\AboutUs.php">About Us</a>
                <a href="Navbar\Contact.php">Contact</a>
                <span class="session-variable">
                    <?php
                        session_start();
                        if(isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        }
                    ?>
                </span>
            </div>
        </nav>
        <nav class="dropdown-menu">
            <button class="dropbtn">Menu ▼</button>
            <div class="dropdown-content">
              <a href="HomePage\testPage.php">Home</a>
              <a href="Navbar\AboutUs.php">About Us</a>
              <a href="Navbar\Contact.php">Contact</a>
            </div>
        </nav>
          
    </header>
    
    <main>
        <label id="filter-label" for="filter">Filter by:</label>
        <select id="filter">
            <option value="none">None</option>
            <option value="author">Author</option>
            <option value="title">Title</option>
            <option value="page_count">Page count</option>
            <option value="genre">Genre</option>
        </select>
        <button id="addBookButton" onclick="redirectToAddBook()">Add Book</button>
          
        <div id="container">
            <table id="table">
    
            <tr class="editable">
            <td class="coverImgString">null</td>
            <td class="id_book">18</td>
            <td class="title">R.U.R</td>
            <td class="author">KarelCapek</td>
            <td class="rel_date">1920-07-02</td>
            <td class="genre">scifi</td>
            <td class="page_count">128</td>
            <td class="contents">robots</td>
            <td class="starRating"></td>
            <td class="readState">read</td>
            <td>
              <button class="editButton" data-bookid="18">Edit</button>
              <button class="applyButton" data-bookid="18">Apply Changes</button>
              <button class="removeButton" data-bookid="18">Remove</button>
            </td>
            </tr><tr class="editable">
            <td class="coverImgString">null</td>
            <td class="id_book">19</td>
            <td class="title">Mistborn</td>
            <td class="author">Sanderson</td>
            <td class="rel_date">2006-07-17</td>
            <td class="genre">fantasy</td>
            <td class="page_count">672</td>
            <td class="contents">cool book</td>
            <td class="starRating">*</td>
            <td class="readState">read</td>
            <td>
              <button class="editButton" data-bookid="19">Edit</button>
              <button class="applyButton" data-bookid="19">Apply Changes</button>
              <button class="removeButton" data-bookid="19">Remove</button>
    </td>
            </tr><tr class="editable">
            <td class="coverImgString">null</td>
            <td class="id_book">20</td>
            <td class="title">au</td>
            <td class="author">au</td>
            <td class="rel_date">2004-03-03</td>
            <td class="genre">au</td>
            <td class="page_count">100</td>
            <td class="contents">asas</td>
            <td class="starRating"></td>
            <td class="readState">comp</td>
            <td>
              <button class="editButton" data-bookid="20">Edit</button>
              <button class="applyButton" data-bookid="20">Apply Changes</button>
              <button class="removeButton" data-bookid="20">Remove</button>
            </td>
            </tr><tr class="editable">
            <td class="coverImgString">null</td>
            <td class="id_book">21</td>
            <td class="title">au</td>
            <td class="author">au</td>
            <td class="rel_date">2004-03-03</td>
            <td class="genre">au</td>
            <td class="page_count">100</td>
            <td class="contents">asas</td>
            <td class="starRating"></td>
            <td class="readState">comp</td>
            <td>
              <button class="editButton" data-bookid="21">Edit</button>
              <button class="applyButton" data-bookid="21">Apply Changes</button>
              <button class="removeButton" data-bookid="21">Remove</button>
            </td>
            </tr></table>
        </div>
    </main>
    <br>
    <div id="container">
        <table id="table">

        </table>
    </div>
    <script src="bookRowWriter.js"></script> 
    <script src="Navbar\navbarScript.js"></script>

    <div class="footer">
        This website was made by Ivan and Antonin as 3rd year's web project
    </div>
</body>
</html>