<?php
include 'header.php';
include 'eml_parser.php';


// Check if lesson ID is provided
if (!isset($_GET['lesson_id'])) {
    echo "No lesson specified.";
    include 'footer.php';
    exit;
}

$lesson_id = intval($_GET['lesson_id']);



// Fetch the course_id from the lesson
$query = $conn->prepare("SELECT course_id FROM course_contents WHERE id = ? AND content_type = 'lesson'");
$query->bind_param("i", $lesson_id);
$query->execute();
$query->bind_result($course_id);
$query->fetch();
$query->close();

// Fetch the quiz content using the course_id and content_type
$query = $conn->prepare("SELECT content FROM course_contents WHERE course_id = ? AND content_type = 'quiz'");
$query->bind_param("i", $course_id);
$query->execute();
$query->bind_result($eml_content);
$query->fetch();
$query->close();

// If no content found
if (!$eml_content) {
    echo "Lesson not found.";
    include 'footer.php';
    exit;
}

// Parse the EML content to HTML
$html_content = parseQuizEML($eml_content);

?>


<div class="container">
    <?php echo $html_content; ?>
</div>
<div class="container">
    <button onclick="submitQuiz()" class="btn btn-primary" style='margin-top: 20px;'>Submit Quiz</button>
</div>
<script>
    // Function to handle quiz submission
    function submitQuiz() {
        let correctAnswers = 0;
        let totalQuestions = document.querySelectorAll('.question').length;

        document.querySelectorAll('.question').forEach(question => {
            let selectedOption = question.querySelector('input[type="radio"]:checked');
            if (selectedOption && selectedOption.getAttribute('data-correct') === 'true') {
                correctAnswers++;
            }
        });

        alert('You got ' + correctAnswers + ' out of ' + totalQuestions + ' correct.');
    }
</script>

<?php
include 'footer.php';
?>
