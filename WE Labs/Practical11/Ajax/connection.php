<?php 
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');
    define('db','dbStore');


    $conn = mysqli_connect(host, user, pass, db) or die(mysqli_connect_error());


    if (!$conn) {
        echo "<script>alert('Connection Error!')</script>";
    }
    
    
    


?>