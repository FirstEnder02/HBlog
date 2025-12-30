<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Blog Cá Nhân</title>
    <style>
        body { margin:0; font-family: Arial, sans-serif; background: #000; color: #eee; min-height: 100vh; display: flex; flex-direction: column; }
        .header { background: #111; color: white; padding: 20px; text-align: center; border-bottom: 2px solid white; position: relative; overflow: hidden; }
        .header::after { content: ''; position: absolute; top: 0; right: 0; bottom: 0; left: 0; background: linear-gradient(to left, rgba(255,255,255,0.15), transparent 70%); pointer-events: none; }
        .nav a { color: white; padding: 0 25px; text-decoration: none; font-size: 18px; position: relative; z-index: 1; }
        .nav a:hover { color: #fff; }
    </style>
</head>
<body>

<div class="header">
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
</div>