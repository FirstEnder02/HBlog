<!-- Overlay cho sidebar -->
<div class="sidebar-overlay" onclick="toggleNav()"></div>

<!-- Sidebar trống -->
<div id="mySidebar" class="sidebar">
    <!-- Sidebar content sẽ được thêm sau này -->
</div>

<!-- Nút toggle sidebar -->
<button id="toggleBtn" onclick="toggleNav()" class="sidebar-toggle">
    ☰
</button>

<style>
    /* NGĂN HOÀN TOÀN VIỆC BODY BỊ ẢNH HƯỞNG */
    body {
        margin: 0 !important;
        padding: 0 !important;
        overflow-x: hidden !important;
    }
    
    /* Đảm bảo main content KHÔNG di chuyển */
    .main, #mainContent {
        transition: none !important;
        margin-left: 0 !important;
        transform: none !important;
        width: 100% !important;
    }
    
    /* Sidebar - FIXED, tuyệt đối không ảnh hưởng layout */
    .sidebar { 
        height: 100vh; 
        width: 0; 
        position: fixed; 
        top: 0; 
        left: 0; 
        background: linear-gradient(to bottom, #0a0a0a, #111); 
        overflow: hidden;
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 9999;
        box-shadow: 5px 0 25px rgba(0, 0, 0, 0.7);
        border-right: 1px solid rgba(0, 255, 255, 0.3);
        /* Quan trọng: Không ảnh hưởng đến layout của các element khác */
        pointer-events: none;
    }
    
    /* Khi sidebar mở - hiển thị và cho phép tương tác */
    .sidebar.open {
        width: 320px !important;
        pointer-events: auto;
    }
    
    /* Nút toggle sidebar */
    .sidebar-toggle {
        position: fixed;
        top: 20px;
        left: 20px;
        width: 45px;
        height: 45px;
        background: rgba(0, 40, 40, 0.9);
        color: #00ffff;
        border: 1px solid rgba(0, 255, 255, 0.5);
        cursor: pointer;
        font-size: 22px;
        z-index: 10000;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        pointer-events: auto;
    }
    
    .sidebar-toggle:hover {
        background: rgba(0, 60, 60, 0.9);
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 255, 255, 0.3);
    }
    
    /* Di chuyển nút toggle khi sidebar mở */
    .sidebar.open + .sidebar-toggle {
        left: 340px;
        background: rgba(0, 60, 80, 0.9);
    }
    
    /* Overlay - che phủ toàn bộ trang khi sidebar mở */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9998;
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);
        animation: fadeIn 0.3s ease-in-out;
        pointer-events: none;
    }
    
    .sidebar-overlay.active {
        display: block !important;
        pointer-events: auto;
    }
    
    /* Hiệu ứng fade in cho overlay */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    /* Hiệu ứng mở sidebar */
    @keyframes slideIn {
        from { 
            transform: translateX(-100%); 
            opacity: 0; 
        }
        to { 
            transform: translateX(0); 
            opacity: 1; 
        }
    }
    
    .sidebar.open {
        animation: slideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<script>
    function toggleNav() {
        const sidebar = document.getElementById("mySidebar");
        const overlay = document.querySelector(".sidebar-overlay");
        const body = document.body;
        
        // Toggle mở/đóng sidebar
        sidebar.classList.toggle("open");
        overlay.classList.toggle("active");
        
        // Ngăn scroll body khi sidebar mở
        if (sidebar.classList.contains("open")) {
            document.body.style.overflow = "hidden";
            document.body.style.position = "fixed";
            document.body.style.width = "100%";
        } else {
            document.body.style.overflow = "auto";
            document.body.style.position = "static";
        }
    }
    
    // Đóng sidebar bằng phím Escape
    document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            const sidebar = document.getElementById("mySidebar");
            if (sidebar.classList.contains("open")) {
                toggleNav();
            }
        }
    });
    
    // Đóng sidebar khi click bên ngoài (trên overlay)
    document.addEventListener("click", function(event) {
        const sidebar = document.getElementById("mySidebar");
        const overlay = document.querySelector(".sidebar-overlay");
        
        if (sidebar.classList.contains("open") && 
            overlay.classList.contains("active") && 
            event.target === overlay) {
            toggleNav();
        }
    });
    
    // Đảm bảo sidebar không ảnh hưởng đến layout
    document.addEventListener('DOMContentLoaded', function() {
        const mainContent = document.getElementById('mainContent');
        if (mainContent) {
            mainContent.style.marginLeft = '0';
            mainContent.style.paddingLeft = '0';
            mainContent.style.transition = 'none';
        }
    });
</script>