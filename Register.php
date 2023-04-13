<?php
class Register{
    public $host = "localhost";
    public $user = "root";
    public $pswd = "abc123";
    public $database = "WA_Library";

    public string $password;
    public string $nickname;
    public string $email;
    public $conn;

    //code for the manual testing

    /*public function __construct($nickname, $password, $email){
        $this->nickname = $nickname;
        $this->password = $password;
        $this->email = $email;

        $conn = mysqli_connect($this->host, $this->user, $this->pswd,$this->database);

        if( $conn === false )  
        {  
        echo "Unable to connect.</br>";  
          
        }else{
            echo "able to connect.</br>";  

        }
    } */

    //automatic code that gets values form POST request
    public function __construct(){
        $this->nickname = $_POST['nickname'];
        $this->password = $_POST['password'];
        $this->email = $_POST['email'];

        $conn = mysqli_connect($this->host, $this->user, $this->pswd,$this->database);

        if( $conn === false )  
        {  
        echo "Unable to connect.</br>";  
        }else{
            echo "able to connect.</br>";  
        }
    }

    
}
function createUserRow(){
    //will accept those values only if manual construct is active
    $reg = new Register("nickname", "password", "example@gmail.com");
    $conn = mysqli_connect($reg->host, $reg->user, $reg->pswd, $reg->database);

    $query = "CALL insert_user('$reg->password', '$reg->nickname', '$reg->email');";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "success";
    }else{
        echo "there was an error creating new user";
    }


    mysqli_close($conn);
}

function showAllTables(){
    //will accept those values only if manual construct is active
    $reg = new Register("nickname", "password", "example@gmail.com");

// Create connection
$conn = mysqli_connect($reg->host, $reg->user, $reg->pswd, $reg->database);

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return;
    }

    $sql = "SHOW TABLES";
    $result = mysqli_query($conn, $sql);

    // Check if the query was executed successfully
    if (!$result) {
        echo "Error executing query: " . mysqli_error($conn);
        mysqli_close($conn);
        return;
    }

    // Fetch all rows as an associative array
    $tables = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Loop through the tables and display their columns
    foreach ($tables as $table) {
        echo "<h3>" . $table['Tables_in_wa_library'] . "</h3>";
        $sql = "DESCRIBE " . $table['Tables_in_wa_library'];
        $result = mysqli_query($conn, $sql);
        $columns = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($columns as $column) {
            echo $column['Field'] . "<br>";
        }
    }

// Close connection
mysqli_close($conn);
}

//!!!
createUserRow();

//showAllTables();