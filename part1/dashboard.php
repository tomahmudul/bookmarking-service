<?php

require_once('header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch bookmarks
$sql = "SELECT id, title, url FROM bookmarks WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$bookmarks = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$mysqli->close();
?>
<div class="container mt-5">
    <h1>Your Bookmarks</h1>
    <a href="add_bookmark.php" class="btn btn-primary mb-3">Add New Bookmark</a>
    <?php if (!empty($bookmarks)): ?>
        <ul class="list-group">
            <?php foreach ($bookmarks as $bookmark): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="<?= htmlspecialchars($bookmark['url']) ?>" target="_blank"><?= htmlspecialchars($bookmark['title']) ?></a>
                    <span>
                        <a href="edit.php?id=<?= $bookmark['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                        <a href="delete.php?id=<?= $bookmark['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No bookmarks available. <a href="add.php">Add some</a>.</p>
    <?php endif; ?>
</div>