<footer style="background: linear-gradient(to top, #111, #0a0a0a); color: #aaa; text-align:center; padding: 25px 10px; margin-top:auto; border-top: 1px solid rgba(0, 255, 255, 0.2); position: relative; overflow: hidden;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            <div style="text-align: left;">
                <div style="font-size: 20px; color: #00cccc; margin-bottom: 5px;">Dev Blog</div>
                <div style="font-size: 14px;">Nơi chia sẻ kiến thức lập trình</div>
            </div>
            
            <div style="text-align: center;">
                &copy; <?php echo date('Y'); ?> Blog Cá Nhân - Lập Trình Viên
                <div style="font-size: 12px; margin-top: 5px; color: #666;">
                    Được xây dựng với PHP, MySQL và đam mê
                </div>
            </div>
            
            <div style="text-align: right;">
                <div style="font-size: 14px; margin-bottom: 5px;">Kết nối</div>
                <div style="display: flex; gap: 15px; justify-content: flex-end;">
                    <span style="color: #00cccc; cursor: pointer;">GitHub</span>
                    <span style="color: #00cccc; cursor: pointer;">LinkedIn</span>
                    <span style="color: #00cccc; cursor: pointer;">Twitter</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
let sidebarOpen = false;
const body = document.body;

function toggleNav() {
    const sidebar = document.getElementById("mySidebar");
    const btn = document.getElementById("toggleBtn");
    const mainContent = document.getElementById("mainContent");
    
    sidebarOpen = !sidebarOpen;
    if (sidebarOpen) {
        sidebar.style.width = "300px";
        btn.innerHTML = "×";
        btn.style.left = "320px";
        body.classList.add('sidebar-open');
        if (mainContent) {
            mainContent.style.marginLeft = "300px";
        }
    } else {
        sidebar.style.width = "0";
        btn.innerHTML = "☰";
        btn.style.left = "20px";
        body.classList.remove('sidebar-open');
        if (mainContent) {
            mainContent.style.marginLeft = "0";
        }
    }
}

document.addEventListener('click', function(event) {
    const sidebar = document.getElementById("mySidebar");
    const btn = document.getElementById("toggleBtn");
    
    if (sidebarOpen && 
        !sidebar.contains(event.target) && 
        !btn.contains(event.target)) {
        toggleNav();
    }
});

document.addEventListener('keydown', function(event) {
    if (sidebarOpen && event.key === 'Escape') {
        toggleNav();
    }
});
</script>
</body>
</html>