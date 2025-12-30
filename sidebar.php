<div id="mySidebar" class="sidebar">
    <button id="toggleBtn" onclick="toggleNav()" class="sidebar-toggle">
        ☰
    </button>
    <h2 class="sidebar-title">Giới thiệu</h2>
    <p class="sidebar-content">
        Tôi là một lập trình viên đam mê PHP, MySQL và phát triển web. 
        Tôi thích xây dựng các dự án cá nhân đơn giản, hiệu quả và chia sẻ kiến thức qua blog này!
    </p>
    <div class="sidebar-menu">
        <a href="index.php" class="sidebar-link">Home</a>
        <a href="#" class="sidebar-link">About</a>
        <a href="#" class="sidebar-link">Contact</a>
    </div>
</div>

<style>
    .sidebar { 
        height: 100%; 
        width: 0; 
        position: fixed; 
        top: 0; 
        left: 0; 
        background: #111; 
        overflow-x: hidden; 
        transition: width 0.5s ease-in-out; 
        padding-top: 60px; 
        z-index: 1000;
    }
    
    .sidebar-toggle {
        position: fixed;
        top: 20px;
        left: 20px;
        width: 40px;
        height: 40px;
        background: #333;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 20px;
        z-index: 1001;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: left 0.5s ease-in-out;
    }
    
    .sidebar-title {
        color: white;
        text-align: center;
        padding: 0 20px;
        margin-top: 30px;
    }
    
    .sidebar-content {
        color: #818181;
        padding: 20px;
        word-wrap: break-word;
        line-height: 1.5;
        text-align: center;
    }
    
    .sidebar-menu {
        text-align: center;
        padding: 20px;
    }
    
    .sidebar-link {
        color: #818181;
        display: block;
        padding: 10px;
        text-decoration: none;
        font-size: 18px;
        transition: color 0.3s;
    }
    
    .sidebar-link:hover {
        color: #f1f1f1;
    }
</style>