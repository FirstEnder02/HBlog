<div class="sidebar-overlay" onclick="toggleNav()"></div>

<div id="mySidebar" class="sidebar">
</div>
<button id="toggleBtn" onclick="toggleNav()" class="sidebar-toggle">
    ☰
</button>

<style>
    body {
        margin: 0 !important;
        padding: 0 !important;
        overflow-x: hidden !important;
    }
    .main, #mainContent {
        transition: none !important;
        margin-left: 0 !important;
        transform: none !important;
        width: 100% !important;
    }
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
        pointer-events: none;
    }
    .sidebar.open {
        width: 320px !important;
        pointer-events: auto;
    }
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
    .sidebar.open + .sidebar-toggle {
        left: 340px;
        background: rgba(0, 60, 80, 0.9);
    }
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
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
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
        sidebar.classList.toggle("open");
        overlay.classList.toggle("active");
        if (sidebar.classList.contains("open")) {
            document.body.style.overflow = "hidden";
            document.body.style.position = "fixed";
            document.body.style.width = "100%";
        } else {
            document.body.style.overflow = "auto";
            document.body.style.position = "static";
        }
    }
    document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            const sidebar = document.getElementById("mySidebar");
            if (sidebar.classList.contains("open")) {
                toggleNav();
            }
        }
    });
    document.addEventListener("click", function(event) {
        const sidebar = document.getElementById("mySidebar");
        const overlay = document.querySelector(".sidebar-overlay");
        
        if (sidebar.classList.contains("open") && 
            overlay.classList.contains("active") && 
            event.target === overlay) {
            toggleNav();
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const mainContent = document.getElementById('mainContent');
        if (mainContent) {
            mainContent.style.marginLeft = '0';
            mainContent.style.paddingLeft = '0';
            mainContent.style.transition = 'none';
        }
    });
</script>