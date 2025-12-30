<?php include 'config.php'; include 'header.php'; ?>

<div class="main" style="flex: 1; padding: 40px 0;">
    <div class="page-container">
        <div class="content-card">
            <h2 style="color: #007bff; margin-bottom: 25px;">Thêm Bài Viết Mới</h2>
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $content = mysqli_real_escape_string($conn, $_POST['content']);
                $author = mysqli_real_escape_string($conn, $_POST['author']);
                $category = mysqli_real_escape_string($conn, $_POST['category']);
                $views = intval($_POST['views']);
                $date = date('Y-m-d H:i:s');
                $image_url = '';
                
                // Handle image upload
                // In the image upload section, change:
                if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $upload_dir = 'assets/';
                    $file_name = time() . '_' . basename($_FILES['image']['name']);
                    $upload_file = $upload_dir . $file_name;
                    
                    if (getimagesize($_FILES['image']['tmp_name'])) {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
                            $image_url = 'assets/' . $file_name; // Store with assets/ prefix
                        }
                    }
                } elseif (!empty($_POST['image_url'])) {
                    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
                }
                
                // Insert with prepared statement
                $stmt = $conn->prepare("INSERT INTO posts (title, content, date, author, category, views, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssis", $title, $content, $date, $author, $category, $views, $image_url);
                
                if ($stmt->execute()) {
                    echo '<div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            Bài viết đã được thêm thành công!
                          </div>';
                } else {
                    echo '<div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                            Lỗi: ' . $conn->error . '
                          </div>';
                }
                $stmt->close();
            }
            ?>
            
            <form method="POST" enctype="multipart/form-data" style="max-width: 800px; margin: 0 auto;">
                <div class="form-group">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="title" required class="form-control">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Nội dung</label>
                    <textarea name="content" required rows="8" class="form-control"></textarea>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label class="form-label">Tác giả</label>
                        <input type="text" name="author" required class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Danh mục</label>
                        <select name="category" required class="form-control">
                            <option value="">Chọn danh mục</option>
                            <?php
                            $categories = ['PHP', 'MySQL', 'JavaScript', 'React', 'API', 'Security', 'Tools', 'DevOps', 'Best Practices'];
                            foreach ($categories as $cat) {
                                echo "<option value='$cat'>$cat</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Số lượt xem</label>
                    <input type="number" name="views" value="0" min="0" class="form-control">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Ảnh bài viết</label>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 2px dashed #ddd;">
                        <p style="color: #666; margin-bottom: 15px;">Chọn một trong hai phương thức:</p>
                        
                        <div style="margin-bottom: 15px;">
                            <label>
                                <input type="radio" name="image_source" value="upload" checked onclick="toggleImageSource()"> 
                                Tải ảnh lên (ưu tiên)
                            </label>
                            <input type="file" name="image" accept="image/*" id="uploadImage" class="form-control">
                        </div>
                        
                        <div>
                            <label>
                                <input type="radio" name="image_source" value="url" onclick="toggleImageSource()"> 
                                Hoặc nhập URL ảnh
                            </label>
                            <input type="url" name="image_url" id="urlImage" placeholder="https://example.com/image.jpg" class="form-control">
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn-primary" style="width: 100%; padding: 15px;">📝 Đăng Bài Viết</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>