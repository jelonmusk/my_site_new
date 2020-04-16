<?php
$servername = "localhost";
$username = "test";
$password = "password1";
$dbname = "books_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
?>