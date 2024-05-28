<?php
// Include header
include 'header.php';
include 'eml_parser.php';  // Make sure to include the database connection file

// Check if lesson ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redirect to dashboard if lesson ID is not provided
    header("Location: dashboard.php");
    exit();
}

// Fetch lesson details from the database based on the provided lesson ID
$lesson_id = intval($_GET['id']);
$sql = "SELECT * FROM course_contents WHERE id = $lesson_id AND content_type = 'lesson'";
$result = mysqli_query($conn, $sql);

// Check if lesson exists
if (mysqli_num_rows($result) == 0) {
    // Redirect to dashboard if lesson does not exist
    header("Location: dashboard.php");
    exit();
}

// Fetch lesson data
$lesson = mysqli_fetch_assoc($result);

?>

<div class="container">
    <h2><?php echo htmlspecialchars($lesson['title']); ?></h2>
    <div>
        <?php echo parseLessonEML($lesson['content']); ?>
    </div>
    <div>
        <a href="quiz.php?lesson_id=<?php echo $lesson_id; ?>" class="btn btn-primary">Take the Quiz</a>
    </div>
</div>

<?php
// Include footer
include 'footer.php';

// Close database connection
mysqli_close($conn);
?>
