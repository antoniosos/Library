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