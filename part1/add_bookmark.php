<?php
require_once('header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $url = $_POST['url'];

    $sql = "INSERT INTO bookmarks (user_id, title, url) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iss", $user_id, $title, $url);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}

require_once('header.php');
?>

<div class="container mt-5">
    <h1>Add New Bookmark</h1>
    <form method="POST" action="add_bookmark.php">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" class="form-control" id="url" name="url" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Bookmark</button>
    </form>
</div>

<?php
require_once('footer.php');
?>
