<?php include 'config.php'; include 'header.php'; ?>

<div class="main" style="flex: 1; padding: 40px 0;">
    <div class="page-container">
        <div class="content-card">
            <h2 style="color: #007bff; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 2px solid rgba(0, 123, 255, 0.3); font-size: 28px; display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 24px;">Thông tin chung về tôi</span>
            </h2>
            
            <div style="display: flex; align-items: center; gap: 40px; margin-bottom: 30px; flex-wrap: wrap;">
                <div style="flex: 0 0 280px;">
                    <div style="width: 280px; height: 330px; background: linear-gradient(45deg, #e9ecef, #ffffff); border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 123, 255, 0.15); border: 1px solid rgba(0, 123, 255, 0.2);">
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                            <div style="text-align: center; padding: 25px;">
                                <div style="width: 140px; height: 140px; background: white; border-radius: 50%; margin: 0 auto 15px; border: 3px solid #007bff; overflow: hidden; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2);">
                                    <img src="assets/Sechi.JPG" alt="Sechi" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <h3 style="color: #333; margin-bottom: 10px; font-size: 18px;">Lập Trình Viên Sơ Cấp</h3>
                                <p style="color: #666; font-size: 13px;">PHP • MySQL • JavaScript</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="flex: 1; min-width: 280px;">
                    <div style="background: rgba(255, 255, 255, 0.95); padding: 30px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 123, 255, 0.1); border: 1px solid rgba(0, 123, 255, 0.15);">
                        <h1 style="color: #007bff; margin-bottom: 20px; font-size: 28px; text-shadow: 0 2px 4px rgba(0, 123, 255, 0.1);">Khơi gợi nguồn hứng khởi</h1>
                        <div style="color: #555; line-height: 1.7; font-size: 16px;">
                            <p style="margin-bottom: 15px;">Xin chào! Tôi là một <strong style="color: #007bff;">lập trình viên</strong> với 4 năm kinh nghiệm tiếp xúc với mảng công nghệ thông tin.</p>
                            
                            <div style="background: rgba(0, 123, 255, 0.05); padding: 20px; border-radius: 10px; margin: 20px 0; border-left: 4px solid #007bff;">
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                                    <div>
                                        <p style="margin: 8px 0; font-size: 14px;"><strong style="color: #007bff;">Chuyên môn:</strong><br>PHP, MySQL, JavaScript, HTML/CSS</p>
                                    </div>
                                    <div>
                                        <p style="margin: 8px 0; font-size: 14px;"><strong style="color: #007bff;">Kinh nghiệm:</strong><br>Sơ cấp</p>
                                    </div>
                                    <div>
                                        <p style="margin: 8px 0; font-size: 14px;"><strong style="color: #007bff;">Phong cách:</strong><br>Code sạch, tối ưu</p>
                                    </div>
                                </div>
                            </div>
                            
                            <p style="font-size: 15px;">Tôi tạo blog này để chia sẻ các vấp ngã, lỗi cơ bản và những bài học từ thực tế mà mình từng mắc phải để phát triển cho bản thân và các lập trình viên mới.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 100%; height: 1px; background: linear-gradient(to right, transparent, rgba(0, 123, 255, 0.3), transparent); margin: 30px 0;"></div>
        </div>
        
        <!-- Latest Posts -->
        <div class="content-card">
            <h2 style="color: #007bff; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 2px solid rgba(0, 123, 255, 0.3); font-size: 28px; display: flex; align-items: center; gap: 10px; justify-content: space-between;">
                <span style="display: flex; align-items: center; gap: 10px;">
                    <span style="font-size: 24px;">📝</span> Bài Viết Mới Nhất
                </span>
                <a href="posts.php" style="font-size: 14px; color: #007bff; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                    Xem tất cả →
                </a>
            </h2>
            
            <?php
            $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY date DESC LIMIT 3");
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $image_path = getImagePath($row['image_url']);
                    ?>
                    
                    <div style="
                        background: rgba(248, 249, 250, 0.9);
                        padding: 25px;
                        margin-bottom: 25px;
                        border-radius: 12px;
                        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.08);
                        border-left: 4px solid #007bff;
                        color: #555;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                        cursor: pointer;
                    " onclick="window.location.href='post.php?id=<?php echo $row['id']; ?>'"
                      onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(0, 123, 255, 0.15)'" 
                      onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 15px rgba(0, 123, 255, 0.08)'">
                    
                        <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                            <?php if (!empty($row['image_url'])): ?>
                            <div style="flex: 0 0 150px;">
                                <img src="<?php echo htmlspecialchars($image_path); ?>" 
                                     alt="<?php echo htmlspecialchars($row['title']); ?>" 
                                     style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(0, 123, 255, 0.2);"
                                     onerror="this.src='assets/default-post.jpg'">
                            </div>
                            <?php endif; ?>
                            
                            <div style="flex: 1;">
                                <h3 style="color: #007bff; margin-top: 0; font-size: 20px; margin-bottom: 10px;">
                                    <a href="post.php?id=<?php echo $row['id']; ?>" 
                                       style="color: inherit; text-decoration: none; display: block;">
                                        <?php echo htmlspecialchars($row['title']); ?>
                                    </a>
                                </h3>
                                
                                <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px; font-size: 13px; color: #666;">
                                    <span style="background: rgba(0, 123, 255, 0.1); padding: 3px 10px; border-radius: 15px;">
                                        <strong>👤</strong> <?php echo htmlspecialchars($row['author']); ?>
                                    </span>
                                    <span style="background: rgba(40, 167, 69, 0.1); padding: 3px 10px; border-radius: 15px;">
                                        <strong>📂</strong> <?php echo htmlspecialchars($row['category']); ?>
                                    </span>
                                    <span style="background: rgba(108, 117, 125, 0.1); padding: 3px 10px; border-radius: 15px;">
                                        <strong>👁️</strong> <?php echo number_format($row['views']); ?> lượt xem
                                    </span>
                                </div>
                                
                                <p style="line-height: 1.6; color: #666; font-size: 15px;">
                                    <?php echo nl2br(htmlspecialchars(substr($row['content'], 0, 200))); ?>...
                                </p>
                                
                                <a href="post.php?id=<?php echo $row['id']; ?>" 
                                   style="color: #007bff; text-decoration: none; font-size: 14px; display: inline-block; margin-top: 10px;">
                                    Đọc tiếp →
                                </a>
                            </div>
                        </div>
                        
                        <small style="color: #888; display: block; margin-top: 15px; padding-top: 15px; border-top: 1px solid rgba(0,0,0,0.1); font-size: 13px;">
                            <strong>📅</strong> Đăng lúc: <?php echo date('d/m/Y H:i', strtotime($row['date'])); ?>
                        </small>
                    </div>
                    
                    <?php
                }
            } else {
                echo '<div style="
                    background: rgba(248, 249, 250, 0.9);
                    padding: 40px;
                    border-radius: 12px;
                    text-align: center;
                    border: 2px dashed rgba(0, 123, 255, 0.3);
                ">';
                echo '<p style="color: #888; margin: 0; font-size: 16px;">📝 Chưa có bài viết nào.</p>';
                echo '</div>';
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>