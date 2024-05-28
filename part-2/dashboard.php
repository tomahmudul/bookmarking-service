<?php

// Include header
include 'header.php';


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}


// Fetch list of available lessons from the database
$sql = "SELECT * FROM course_contents WHERE content_type = 'lesson'";
$result = mysqli_query($conn, $sql);

?>

<div class="container">
    <h2>Welcome to Your Dashboard, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Select a lesson from the list below:</p>
    <ul>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href='lesson.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></li>";
            }
        } else {
            echo "<li>No lessons available.</li>";
        }
        ?>
    </ul>
</div>

<?php
// Close database connection
mysqli_close($conn);

// Include footer
include 'footer.php';
?>
