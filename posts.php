<?php include 'config.php'; include 'header.php'; ?>

<div class="main" style="flex: 1; padding: 40px 0;">
    <div class="page-container">
        <div class="content-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <div>
                    <h2 style="color: #007bff; margin-bottom: 10px; font-size: 28px; display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 24px;">📝</span> Tất Cả Bài Viết
                    </h2>
                    <p style="color: #666; font-size: 15px;">Tổng hợp tất cả bài viết về lập trình, công nghệ và kinh nghiệm phát triển web</p>
                </div>
            </div>
            <div style="background: rgba(0, 123, 255, 0.05); padding: 15px; border-radius: 10px; border: 1px solid rgba(0, 123, 255, 0.1);">
                <div style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
                    <span style="font-weight: 500; color: #555; font-size: 14px;">Lọc theo danh mục:</span>
                    <?php
                    $category_result = mysqli_query($conn, "SELECT DISTINCT category FROM posts ORDER BY category");
                    $categories = [];
                    while($cat = mysqli_fetch_assoc($category_result)) {
                        $categories[] = $cat['category'];
                    }
                    mysqli_data_seek($category_result, 0);
                    
                    echo '<a href="posts.php" style="background: #007bff; color: white; padding: 5px 15px; border-radius: 20px; text-decoration: none; font-size: 13px; border: 1px solid #007bff;">Tất cả</a>';
                    
                    while($cat = mysqli_fetch_assoc($category_result)) {
                        echo '<a href="posts.php?category=' . urlencode($cat['category']) . '" style="background: white; color: #007bff; padding: 5px 15px; border-radius: 20px; text-decoration: none; font-size: 13px; border: 1px solid rgba(0, 123, 255, 0.3);">' . htmlspecialchars($cat['category']) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <div class="content-card">
            <?php
            $category_filter = isset($_GET['category']) ? $_GET['category'] : '';
            $query = "SELECT * FROM posts";
            
            if (!empty($category_filter)) {
                $query .= " WHERE category = '" . mysqli_real_escape_string($conn, $category_filter) . "'";
            }
            $query .= " ORDER BY date DESC";
            
            $result = mysqli_query($conn, $query);
            $total_posts = mysqli_num_rows($result);
            
            if ($total_posts > 0) {
                if (!empty($category_filter)) {
                    echo '<div style="background: rgba(0, 123, 255, 0.05); padding: 15px; border-radius: 10px; margin-bottom: 20px; border-left: 4px solid #007bff;">';
                    echo '<p style="color: #555; margin: 0; font-size: 15px;">Đang hiển thị bài viết trong danh mục: <strong style="color: #007bff;">' . htmlspecialchars($category_filter) . '</strong> (' . $total_posts . ' bài viết)</p>';
                    echo '</div>';
                }
                
                while($row = mysqli_fetch_assoc($result)) {
                    $image_path = getImagePath($row['image_url']);
                    $is_local = isLocalImage($row['image_url']);
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
                            <div style="flex: 0 0 180px; position: relative;">
                                <?php if ($is_local): ?>
                                <div style="position: absolute; top: 5px; left: 5px; background: #28a745; color: white; font-size: 10px; padding: 2px 5px; border-radius: 3px; z-index: 2;">Local</div>
                                <?php endif; ?>
                                <img src="<?php echo htmlspecialchars($image_path); ?>" 
                                     alt="<?php echo htmlspecialchars($row['title']); ?>" 
                                     style="width: 100%; height: 120px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(0, 123, 255, 0.2);"
                                     onerror="this.src='assets/default-post.jpg'">
                            </div>
                            <?php endif; ?>
                            
                            <div style="flex: 1;">
                                <h3 style="color: #007bff; margin-top: 0; font-size: 22px; margin-bottom: 12px;">
                                    <a href="post.php?id=<?php echo $row['id']; ?>" 
                                       style="color: inherit; text-decoration: none; display: block;">
                                        <?php echo htmlspecialchars($row['title']); ?>
                                    </a>
                                </h3>
                                
                                <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px; font-size: 14px; color: #666;">
                                    <span style="background: rgba(0, 123, 255, 0.1); padding: 4px 12px; border-radius: 15px; display: flex; align-items: center; gap: 5px;">
                                        <span style="font-size: 12px;">👤</span> <?php echo htmlspecialchars($row['author']); ?>
                                    </span>
                                    <span style="background: rgba(40, 167, 69, 0.1); padding: 4px 12px; border-radius: 15px; display: flex; align-items: center; gap: 5px;">
                                        <span style="font-size: 12px;">📂</span> <?php echo htmlspecialchars($row['category']); ?>
                                    </span>
                                    <span style="background: rgba(108, 117, 125, 0.1); padding: 4px 12px; border-radius: 15px; display: flex; align-items: center; gap: 5px;">
                                        <span style="font-size: 12px;">👁️</span> <?php echo number_format($row['views']); ?> lượt xem
                                    </span>
                                    <?php if ($is_local): ?>
                                    <span style="background: rgba(40, 167, 69, 0.1); padding: 4px 12px; border-radius: 15px; display: flex; align-items: center; gap: 3px;">
                                        <span style="font-size: 12px;">💾</span> Local Image
                                    </span>
                                    <?php endif; ?>
                                </div>
                                
                                <p style="line-height: 1.6; color: #666; font-size: 15px;">
                                    <?php echo nl2br(htmlspecialchars(substr($row['content'], 0, 300))); ?>...
                                </p>
                                
                                <a href="post.php?id=<?php echo $row['id']; ?>" 
                                   style="color: #007bff; text-decoration: none; font-size: 14px; display: inline-block; margin-top: 10px;">
                                    Đọc tiếp →
                                </a>
                            </div>
                        </div>
                        
                        <small style="color: #888; display: block; margin-top: 15px; padding-top: 15px; border-top: 1px solid rgba(0,0,0,0.1); font-size: 13px;">
                            <strong style="color: #555;">📅</strong> Đăng lúc: <?php echo date('d/m/Y H:i', strtotime($row['date'])); ?>
                            <?php if ($is_local): ?>
                             • <span style="color: #28a745;">📁 Local Image: <?php echo htmlspecialchars($row['image_url']); ?></span>
                            <?php endif; ?>
                        </small>
                    </div>
                    
                    <?php
                }
            } else {
                echo '<div style="
                    background: rgba(248, 249, 250, 0.9);
                    padding: 60px 40px;
                    border-radius: 12px;
                    text-align: center;
                    border: 2px dashed rgba(0, 123, 255, 0.3);
                ">';
                if (!empty($category_filter)) {
                    echo '<p style="color: #888; margin: 0 0 15px 0; font-size: 18px;">Không có bài viết nào trong danh mục này.</p>';
                    echo '<a href="posts.php" style="color: #007bff; text-decoration: none; font-size: 15px;">← Xem tất cả bài viết</a>';
                } else {
                    echo '<p style="color: #888; margin: 0 0 15px 0; font-size: 18px;">📝 Chưa có bài viết nào.</p>';
                    echo '<a href="index.php" style="color: #007bff; text-decoration: none; font-size: 15px;">← Quay lại trang chủ</a>';
                }
                echo '</div>';
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>