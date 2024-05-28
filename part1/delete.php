<?php
require_once('header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $bookmark_id = $_GET['id'];

    // Prepare and execute the delete statement
    $sql = "DELETE FROM bookmarks WHERE id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $bookmark_id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        // Redirect to dashboard after deletion
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
