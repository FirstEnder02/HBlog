<footer style="background:#111; color:white; text-align:center; padding:10px; margin-top:auto;">
    &copy; <?php echo date('Y'); ?> Blog Cá Nhân
</footer>

<script>
let sidebarOpen = false;
const body = document.body;
function toggleNav() {
    const sidebar = document.getElementById("mySidebar");
    const btn = document.getElementById("toggleBtn");
    sidebarOpen = !sidebarOpen;
    if (sidebarOpen) {
        sidebar.style.width = "300px";
        btn.innerHTML = "×";
        btn.style.left = "320px";
        body.classList.add('sidebar-open');
    } else {
        sidebar.style.width = "0";
        btn.innerHTML = "☰";
        btn.style.left = "20px";
        body.classList.remove('sidebar-open');
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