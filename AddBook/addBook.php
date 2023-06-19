<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/HomePage/homePageStyle.css">
    <title>Add Book</title>
</head>
<body>
<header>
        <h1>
            <a href="HomePage\testPage.php">My book list</a>
        </h1>
        <nav class="navbar">
            <a href="#">About us</a>
            <a href="/AddBook/addBook.php">Add Book</a>
            <span class="session-variable">
                <?php
                    session_start();
                    if(isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                    }
                ?>
            </span>
        </nav>
    </header>

    <h1>Add Book</h1>
    <form id="bookForm" onsubmit="submitForm(event)">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>
        
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        <br><br>
        
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
        <br><br>
        
        <label for="page_count">Page Count:</label>
        <input type="number" id="page_count" name="page_count" required>
        <br><br>
        
        <label for="contents">Contents(short description):</label>
        <textarea id="contents" name="contents"></textarea>
        <br><br>
        
        <label for="coverImgString">Cover Image String(URL):</label>
        <input type="text" id="coverImgString" name="coverImgString">
        <br><br>
        
        <label for="starRating">Star rating String(up to 5 "*"):</label>
        <input type="text" id="starRating" name="starRating">
        <br><br>

        <label for="readState">Read State String:</label>
        <input type="text" id="readState" name="reaadState">
        <br><br>


        <input type="submit" value="Add Book">
    </form>
    
    <div class="footer">
        This website was made by Ivan and Antonin as 3rd year's web project
    </div>

    <script>
        function submitForm(event) {
            event.preventDefault(); // Prevent the default form submission
    
            // Get the form data
            const form = document.getElementById("bookForm");
            const formData = new FormData(form);
    
            // Create a new AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "insertBook.php", true);
    
            xhr.onload = function() {
                console.log(this.responseText);
                // Handle the response
                // You can redirect to another page or display a success message
            };
    
            xhr.send(formData);
        }
    </script>
</body>
</html>
