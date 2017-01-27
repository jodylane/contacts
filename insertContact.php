<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/26/2017
 * Time: 10:16 AM
 * Description: This file was created to
 */

include 'includes/header.php';


// if the script did not receive post data, display an error message, then terminate the script immediately
if (!filter_has_var(INPUT_POST, 'fname') ||
    !filter_has_var(INPUT_POST, 'lname') ||
    !filter_has_var(INPUT_POST, 'uname') ||
    !filter_has_var(INPUT_POST, 'email') ||
    !filter_has_var(INPUT_POST, 'password')
) {
    //display an error message
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '<strong>Warning!</strong> Something went wrong, We didn\'t receive anything on our end. Please contact 317-867-5309. We apologize for any inconvinience!</div>';
    //add the footer and close the connection to the db and exit the script
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//take special characters out and sanitize the data we recieved to avoid code injection
if(isset($_REQUEST['fname'])){
    $firstName = html_entity_decode($_REQUEST["fname"]);
    $firstName = trim($firstName);
    $firstName = stripcslashes($firstName);
    $firstName = strip_tags($firstName);
    $firstName = $conn->real_escape_string($firstName);
}
if(isset($_REQUEST['lname'])){
    $lastName = html_entity_decode($_REQUEST["lname"]);
    $lastName = trim($lastName);
    $lastName = stripcslashes($lastName);
    $lastName = strip_tags($lastName);
    $lastName = $conn->real_escape_string($lastName);
}
if(isset($_REQUEST['uname'])){
    $username = html_entity_decode($_REQUEST["uname"]);
    $username = trim($username);
    $username = stripcslashes($username);
    $username = strip_tags($username);
    $username = $conn->real_escape_string($username);
}
if(isset($_REQUEST['email'])){
    $email = html_entity_decode($_REQUEST["email"]);
    $email = trim($email);
    $email = stripcslashes($email);
    $email = strip_tags($email);
    $email = $conn->real_escape_string($email);
}
if(isset($_REQUEST['password'])){
    $password = html_entity_decode($_REQUEST["password"]);
    $password = trim($password);
    $password = stripcslashes($password);
    $password = strip_tags($password);
    $password = $conn->real_escape_string($password);
}

// Whats the difference???

//$firstName = trim(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING));
//$lastName = trim(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING));
//$username = trim(filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING));
//$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
//$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

//$firstName = $conn->real_escape_string($firstName);
//$firstName = $conn->real_escape_string($lastName);
//$firstName = $conn->real_escape_string($username);
//$firstName = $conn->real_escape_string($email);
//$firstName = $conn->real_escape_string($password);

//if(strlen($firstName) < 1 ||
//    strlen($lastName) < 1 ||
//    strlen($username) < 1 ||
//    strlen($email) < 1 ||
//    strlen($password) < 1
//){
//    //display an error message
//    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
//    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
//    echo '<span aria-hidden="true">&times;</span>';
//    echo '</button>';
//    echo '<strong>Warning!</strong> Please fill out all fields with valid inputs. We apologize for any inconvinience!</div>';
//    //add the footer and close the connection to the db and exit the script
//    require_once 'includes/footer.php';
//    $conn->close();
//    die();
//}

//SQL statement inserts inputs into table
$sql = "INSERT INTO users (id, firstName, lastName, email, username, password) VALUES (NULL, '$firstName', '$lastName', '$email', '$username', '$password');";

//executes query
$query = @$conn->query($sql);

//handle errors
if(!$query){
    $errno = $conn->errno;
    $errmsg = $conn->error;
    //display an error message
    echo '<div class="alert alert-danger alert-dismissible" role="alert">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '<strong>Warning!</strong> Failed to create contact, please try again. If you problem persists please contact 317-867-5309. We apologize for any inconvinience!</div>';
    //add the footer and close the connection to the db and exit the script
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//whats the difference
//$result = mysqli_query($link, $sql);
//if (mysqli_affected_rows($link) == 1){
//    $success = true;
//}else{
//    $success = false;
//}

//close connection to database
$conn->close();

//display an success message
echo '<div class="row margin-bottom"><div class="col-md-offset-3 col-md-6 alert alert-success alert-dismissible" role="alert">';
echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
echo '<span aria-hidden="true">&times;</span>';
echo '</button>';
echo '<strong>Hooray!</strong> You successfully added a Contact <a href="index.php">Return Home</a></div></div>';

require_once'includes/footer.php';
?>




