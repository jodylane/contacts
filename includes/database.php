<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/26/2017
 * Time: 10:16 AM
 * Description: This file was created to
 */
//local development
//$host = "localhost";
//$login = "phpuser";
//$password = "phpuser";
//$database = "contacts";
//production
$host = "localhost";
$login = "jodylane";
$password = "jodylane";
$database = "jodylane_db";

//connect to db
$conn = @new mysqli($host, $login, $password, $database);

//handle connection errors
if($conn -> connect_errno){
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection to database failed: ($errno) $errmsg.");
    require_once('includes/footer.php');
}

//Selection from contacts table
$sql = "SELECT * FROM users";

//execute query
$query = $conn->query($sql);

//handle query errors
if(!$query){
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    echo "Selection failed with: ($errno) $errmsg.";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}
?>
