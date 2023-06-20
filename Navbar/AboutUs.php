<html !DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="AboutUsStyle.css">
    <title>About Us</title>
    
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
       <div class="about-me" id="Ivan">
        <h3>Ivan Zagorodnyi</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores quisquam, excepturi commodi labore nemo sit molestiae voluptatibus, sint cumque placeat, repellat aut ipsam. A cumque ea culpa esse. Molestiae, assumenda?</p>
       </div>
       <div class="about-me" id="Antonin">
        <h3>Antonin Pivonka</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem adipisci mollitia sequi rerum odio ea tempora molestiae, voluptatum atque harum sed nam amet nobis cupiditate perferendis commodi libero reiciendis quia?</p>
       </div>
    </main>

    <div class="footer">
        This website was made by Ivan and Antonin as 3rd year's web project
    </div>
</body>
</html>