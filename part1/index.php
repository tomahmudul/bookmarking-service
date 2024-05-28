<?php

require_once('header.php');

$sql = "SELECT url, COUNT(*) as count FROM bookmarks GROUP BY url ORDER BY count DESC LIMIT 10";
$result = $mysqli->query($sql);
$popular_bookmarks = $result->fetch_all(MYSQLI_ASSOC);

$mysqli->close();
?>
<div class="container mt-5">
    <h1>Welcome to Bookmarking Service</h1>
    <p>Your go-to app for managing and sharing bookmarks!</p>

    <h2>Top 10 Most Popular Bookmarks</h2>
    <ul class="list-group">
        <?php if (!empty($popular_bookmarks)): ?>
            <?php foreach ($popular_bookmarks as $bookmark): ?>
                <li class="list-group-item">
                    <a href="<?= htmlspecialchars($bookmark['url']) ?>" target="_blank"><?= htmlspecialchars($bookmark['url']) ?></a>
                    <span class="badge badge-primary badge-pill"><?= $bookmark['count'] ?> bookmarks</span>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">No bookmarks available</li>
        <?php endif; ?>
    </ul>
</div>

<?php
require_once('footer.php');
?>
