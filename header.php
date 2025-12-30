<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Blog Cá Nhân - Lập Trình Viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
    <div class="header-container">
        <nav class="nav">
            <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a>
            <a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Liên hệ</a>
            <a href="posts.php" class="<?= basename($_SERVER['PHP_SELF']) == 'posts.php' ? 'active' : '' ?>">Bài viết</a>
            <!-- <a href="add_post.php" class="<?= basename($_SERVER['PHP_SELF']) == 'add_post.php' ? 'active' : '' ?>">Thêm bài</a> -->
        </nav>
    </div>
</header>