<?php include 'config.php'; include 'header.php'; ?>

<div class="main" style="flex: 1; padding: 40px 0;">
    <div class="page-container">
        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $post_id = intval($_GET['id']);
            $result = mysqli_query($conn, "SELECT * FROM posts WHERE id = $post_id");
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $image_path = getImagePath($row['image_url']);
                $is_local = isLocalImage($row['image_url']);
                
                // Increase view count
                mysqli_query($conn, "UPDATE posts SET views = views + 1 WHERE id = $post_id");
                ?>
                
                <div class="content-card">
                    <!-- Back Button -->
                    <div style="margin-bottom: 20px;">
                        <a href="javascript:history.back()" style="color: #007bff; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; font-size: 14px;">
                            ← Quay lại
                        </a>
                    </div>
                    
                    <!-- Post Header -->
                    <div style="margin-bottom: 30px;">
                        <h1 style="color: #007bff; font-size: 32px; margin-bottom: 15px; line-height: 1.3;"><?php echo htmlspecialchars($row['title']); ?></h1>
                        
                        <div style="display: flex; flex-wrap: wrap; gap: 15px; align-items: center; margin-bottom: 20px;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="color: #555; font-weight: 500;">👤</span>
                                <span style="color: #555;"><?php echo htmlspecialchars($row['author']); ?></span>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="color: #555; font-weight: 500;">📅</span>
                                <span style="color: #555;"><?php echo date('d/m/Y H:i', strtotime($row['date'])); ?></span>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="color: #555; font-weight: 500;">📂</span>
                                <span style="background: rgba(40, 167, 69, 0.1); padding: 3px 12px; border-radius: 15px; color: #28a745; font-size: 14px;">
                                    <?php echo htmlspecialchars($row['category']); ?>
                                </span>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="color: #555; font-weight: 500;">👁️</span>
                                <span style="color: #555;"><?php echo number_format($row['views'] + 1); ?> lượt xem</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Featured Image -->
                    <?php if (!empty($row['image_url'])): ?>
                    <div style="margin-bottom: 30px;">
                        <img src="<?php echo htmlspecialchars($image_path); ?>" 
                             alt="<?php echo htmlspecialchars($row['title']); ?>" 
                             style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 12px; border: 1px solid rgba(0, 123, 255, 0.2);"
                             onerror="this.src='assets/default-post.jpg'">
                        <?php if ($is_local): ?>
                        <p style="text-align: center; color: #666; font-size: 14px; margin-top: 10px;">
                            <span style="background: rgba(40, 167, 69, 0.1); padding: 2px 8px; border-radius: 10px; color: #28a745;">📁 Local Image</span>
                        </p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Post Content -->
                    <div style="line-height: 1.8; font-size: 16px; color: #333;">
                        <?php echo nl2br(htmlspecialchars($row['content'])); ?>
                    </div>
                    
                    <!-- Tags/Categories -->
                    <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.1);">
                        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                            <span style="color: #555; font-weight: 500;">🏷️ Từ khóa:</span>
                            <a href="posts.php?category=<?php echo urlencode($row['category']); ?>" 
                               style="background: rgba(0, 123, 255, 0.1); color: #007bff; padding: 5px 15px; border-radius: 15px; text-decoration: none; font-size: 14px;">
                                <?php echo htmlspecialchars($row['category']); ?>
                            </a>
                        </div>
                    </div>
                </div>
                
                <?php
            } else {
                echo '<div class="content-card" style="text-align: center; padding: 60px 40px;">';
                echo '<p style="color: #888; font-size: 18px; margin-bottom: 20px;">📝 Bài viết không tồn tại.</p>';
                echo '<a href="posts.php" style="color: #007bff; text-decoration: none;">← Xem tất cả bài viết</a>';
                echo '</div>';
            }
        } else {
            echo '<div class="content-card" style="text-align: center; padding: 60px 40px;">';
            echo '<p style="color: #888; font-size: 18px; margin-bottom: 20px;">📝 Không tìm thấy bài viết.</p>';
            echo '<a href="posts.php" style="color: #007bff; text-decoration: none;">← Xem tất cả bài viết</a>';
            echo '</div>';
        }
        mysqli_close($conn);
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>