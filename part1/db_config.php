<?php
$mysqli = new mysqli("elearning-app.mysql.database.azure.com", "elearning", "Learning", "bookmarking-service");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
