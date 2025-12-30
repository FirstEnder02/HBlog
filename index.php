<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main" id="mainContent" style="transition: margin-left 0.5s; padding: 40px 20px;">

    <div class="intro" style="background:white; padding:30px; margin-bottom:30px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1); text-align:center;">
        <h1>:Boom:</h1>
        <p>!</p>
    </div>

    <h2>Bài viết mới nhất</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY date DESC");
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div style="background:white; padding:20px; margin-bottom:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">';
            echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
            echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
            echo '<small>Đăng lúc: ' . $row['date'] . '</small>';
            echo '</div>';
        }
    } else {
        echo '<p>Chưa có bài viết nào.</p>';
    }
    ?>
</div>

<?php include 'footer.php'; ?>