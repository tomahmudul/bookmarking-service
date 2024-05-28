<?php
$servername = "elearning-app.mysql.database.azure.com";
$username = "elearning";
$password = "Learning@db";
$dbname = "elearning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}