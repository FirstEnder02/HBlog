<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main" id="mainContent" style="flex:1; padding: 40px 20px; position: relative; transition: margin-left 0.5s ease-in-out;">
    <div class="intro" style="background:rgba(20,20,20,0.8); padding:30px; margin-bottom:30px; border-radius:8px; box-shadow:0 4px 20px rgba(255,255,255,0.1); text-align:center; position: relative; z-index: 2; color: #eee;">
        <h1>Chào mừng đến với Blog Cá Nhân của tôi</h1>
        <p>Nơi tôi chia sẻ kiến thức lập trình, kinh nghiệm phát triển web và các dự án thú vị. Hy vọng bạn tìm thấy điều hữu ích!</p>
    </div>
    <h2 style="color: #eee;">Bài viết mới nhất</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY date DESC");
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div style="background:rgba(20,20,20,0.8); padding:20px; margin-bottom:20px; border-radius:8px; box-shadow:0 4px 15px rgba(255,255,255,0.1); position: relative; z-index: 2; color: #eee;">';
            echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
            echo '<p>' . nl2br(htmlspecialchars($row['content'])) . '</p>';
            echo '<small>Đăng lúc: ' . $row['date'] . '</small>';
            echo '</div>';
        }
    } else {
        echo '<p style="color: #eee;">Chưa có bài viết nào.</p>';
    }
    mysqli_close($conn);
    ?>
</div>

<?php include 'footer.php'; ?>