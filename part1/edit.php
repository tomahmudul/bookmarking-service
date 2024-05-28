<?php

require_once('header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $bookmark_id = $_GET['id'];

    // Fetch existing bookmark
    $sql = "SELECT title, url FROM bookmarks WHERE id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $bookmark_id, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($title, $url);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookmark_id = $_POST['id'];
    $title = $_POST['title'];
    $url = $_POST['url'];

    $sql = "UPDATE bookmarks SET title = ?, url = ? WHERE id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssii", $title, $url, $bookmark_id, $_SESSION['user_id']);

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
    <h1>Edit Bookmark</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($bookmark_id) ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($title) ?>" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" class="form-control" id="url" name="url" value="<?= htmlspecialchars($url) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Bookmark</button>
    </form>
</div>

<?php
require_once('footer.php');
?>
