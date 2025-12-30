<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main content sử dụng cùng page-container -->
<div class="main" id="mainContent" style="
    flex: 1; 
    padding: 40px 0;
    width: 100%;
    position: relative;
    z-index: 1;
">
    <div class="page-container" style="padding: 0 50px; max-width: 1400px; margin: 0 auto;">
        <div class="content-container" style="
            background: rgba(15, 15, 15, 0.8);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid rgba(0, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            margin-bottom: 30px;
        ">
            <div class="intro-container" style="display: flex; align-items: center; gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                <!-- Hình ảnh lập trình viên -->
                <div class="developer-image" style="flex: 0 0 280px; position: relative;">
                    <div style="width: 280px; height: 330px; background: linear-gradient(45deg, #2a2a2a, #1a1a1a); border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.1);">
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);">
                            <div style="text-align: center; padding: 25px;">
                                <div style="width: 110px; height: 110px; background: #333; border-radius: 50%; margin: 0 auto 15px; border: 3px solid #00ffff; display: flex; align-items: center; justify-content: center; font-size: 36px; color: #00ffff;">
                                    <i class="code-icon">{"}</i>
                                </div>
                                <h3 style="color: white; margin-bottom: 10px; font-size: 18px;">Lập Trình Viên</h3>
                                <p style="color: #aaa; font-size: 13px;">PHP • MySQL • JavaScript</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Container mô tả -->
                <div class="description-container" style="flex: 1; min-width: 280px;">
                    <div style="background: rgba(20, 20, 20, 0.9); padding: 25px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.05); position: relative; overflow: hidden;">
                        <!-- Hiệu ứng ánh sáng code -->
                        <div style="position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: radial-gradient(circle, rgba(0, 255, 255, 0.1) 0%, transparent 70%);"></div>
                        
                        <h1 style="color: #00ffff; margin-bottom: 15px; font-size: 24px; text-shadow: 0 0 8px rgba(0, 255, 255, 0.3);">Chào mừng đến với Blog Cá Nhân</h1>
                        <div style="color: #eee; line-height: 1.6; font-size: 15px;">
                            <p style="margin-bottom: 12px;">Xin chào! Tôi là một <strong style="color: #00ffff;">lập trình viên full-stack</strong> với niềm đam mê mãnh liệt với công nghệ và sáng tạo.</p>
                            
                            <div style="background: rgba(0, 40, 40, 0.3); padding: 12px; border-radius: 8px; margin: 15px 0; border-left: 4px solid #00ffff;">
                                <p style="margin: 5px 0; font-size: 14px;"><strong>Chuyên môn:</strong> PHP, MySQL, JavaScript, HTML/CSS</p>
                                <p style="margin: 5px 0; font-size: 14px;"><strong>Kinh nghiệm:</strong> 5+ năm phát triển web</p>
                                <p style="margin: 5px 0; font-size: 14px;"><strong>Phong cách:</strong> Code sạch, tối ưu, hiệu quả</p>
                            </div>
                            
                            <p style="font-size: 15px;">Trong blog này, tôi chia sẻ kiến thức lập trình, kinh nghiệm phát triển web, các dự án cá nhân và những bài học quý giá từ thực tế. Hy vọng bạn tìm thấy điều hữu ích!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Container cho bài viết -->
        <div class="posts-container" style="
        
            background: rgba(15, 15, 15, 0.8);
            border-radius: 15px;
            padding: 25px 30px;
            border: 1px solid rgba(0, 255, 255, 0.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        "> 
            <h2 style="color: #00ffff; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(0, 255, 255, 0.2); font-size: 22px;">Bài viết mới nhất</h2>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY date DESC");
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div style="background:rgba(30,30,30,0.9); padding:20px; margin-bottom:20px; border-radius:10px; box-shadow:0 5px 15px rgba(0, 255, 255, 0.1); border-left: 3px solid #00aaaa; color: #eee;">';
                    echo '<h3 style="color: #00ffff; margin-top: 0; font-size: 20px; margin-bottom: 10px;">' . htmlspecialchars($row['title']) . '</h3>';
                    echo '<p style="line-height: 1.6; color: #ddd; font-size: 15px;">' . nl2br(htmlspecialchars($row['content'])) . '</p>';
                    echo '<small style="color: #aaa; display: block; margin-top: 15px; padding-top: 10px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 13px;">Đăng lúc: ' . $row['date'] . '</small>';
                    echo '</div>';
                }
            } else {
                echo '<div style="background:rgba(30,30,30,0.9); padding:25px; border-radius:10px; text-align:center; border: 1px dashed rgba(0, 255, 255, 0.3);">';
                echo '<p style="color: #aaa; margin: 0;">Chưa có bài viết nào.</p>';
                echo '</div>';
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>