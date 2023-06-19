<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homePageStyle.css">
    <title>Home</title>
    <style>
        
    </style>
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
    
    
    <br>
    <div id="container">
        <table id="table">

        </table>
    </div>
    <script src="bookRowWriter.js"></script> 

    <div class="footer">
        This website was made by Ivan and Antonin as 3rd year's web project
    </div>
</body>
</html>