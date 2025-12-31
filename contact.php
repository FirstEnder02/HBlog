<?php include 'config.php'; include 'header.php'; ?>

<div class="main" style="flex: 1; padding: 40px 0;">
    <div class="page-container">
        
            <!-- Profile Image Section with Skills -->
            <div style="
                background: linear-gradient(to right, #f8f9fa, #ffffff);
                border-radius: 15px;
                padding: 30px;
                border: 1px solid rgba(0, 123, 255, 0.2);
                margin-bottom: 40px;
                display: flex;
                align-items: center;
                gap: 40px;
                flex-wrap: wrap;
            ">
                <div style="flex: 0 0 200px; text-align: center;">
                    <div style="
                        width: 200px;
                        height: 200px;
                        background: white;
                        border-radius: 50%;
                        overflow: hidden;
                        margin: 0 auto 15px;
                        border: 4px solid #007bff;
                        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
                    ">
                        <img src="assets/Sechi.JPG" alt="Sechi" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h4 style="color: #007bff; margin: 0; font-size: 18px;">Trần Hậu Huy</h4>
                    <p style="color: #666; font-size: 14px; margin: 5px 0 0 0;">Lập Trình Viên Sơ Cấp</p>
                </div>
                
                <div style="flex: 1; min-width: 300px;">
                    <h4 style="color: #007bff; margin-bottom: 20px; font-size: 20px;">Kỹ Năng Chuyên Môn</h4>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px;">
                        <?php
                        $skills = [
                            ['PHP', 'progress-bar-php', '80%'],
                            ['MySQL', 'progress-bar-mysql', '75%'],
                            ['JavaScript', 'progress-bar-js', '70%'],
                            ['HTML/CSS', 'progress-bar-html', '85%'],
                            ['API Development', 'progress-bar-api', '65%'],
                            ['Web Security', 'progress-bar-security', '60%']
                        ];
                        
                        foreach ($skills as $skill) {
                            echo '<div>';
                            echo '<div style="display: flex; justify-content: space-between; margin-bottom: 8px;">';
                            echo '<span style="color: #555; font-weight: 500;">' . $skill[0] . '</span>';
                            echo '<span style="color: #007bff; font-size: 14px;">' . $skill[2] . '</span>';
                            echo '</div>';
                            echo '<div style="height: 8px; background: rgba(0, 123, 255, 0.1); border-radius: 4px; overflow: hidden;">';
                            echo '<div style="width: ' . $skill[2] . '; height: 100%; background: linear-gradient(to right, #007bff, #0056b3); border-radius: 4px;"></div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <!-- Contact Information Section -->
        <div class="content-card">
            <h3 style="color: #007bff; margin-bottom: 25px; font-size: 22px; display: flex; align-items: center; gap: 10px;">
                Thông Tin Liên Hệ
            </h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px;">
                <!-- Personal Info Card -->
                <div style="
                    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
                    border-radius: 15px;
                    padding: 30px;
                    color: white;
                    box-shadow: 0 10px 30px rgba(0, 123, 255, 0.25);
                    position: relative;
                    overflow: hidden;
                ">
                    <div style="position: absolute; top: -30px; right: -30px; width: 100px; height: 100px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>
                    
                    <div style="position: relative; z-index: 2;">
                        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 25px;">
                            <div style="
                                width: 80px;
                                height: 80px;
                                background: rgba(255, 255, 255, 0.2);
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border: 3px solid rgba(255, 255, 255, 0.3);
                                overflow: hidden;
                            ">
                                <img src="assets/Sechi.JPG" alt="Sechi" 
                                     style="width: 100%; height: 100%; object-fit: cover; display: block;">
                            </div>
                            <div>
                                <h4 style="color: white; margin: 0 0 5px 0; font-size: 20px;">Lập Trình Viên</h4>
                                <p style="color: rgba(255, 255, 255, 0.9); margin: 0; font-size: 14px;">PHP • MySQL • JavaScript</p>
                            </div>
                        </div>
                        
                        <div style="margin-top: 25px;">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                               
                                <div>
                                    <p style="color: rgba(255, 255, 255, 0.9); margin: 0 0 5px 0; font-size: 14px;">Email</p>
                                    <a href="mailto:tranhauhuy265@gmail.com" style="color: white; text-decoration: none; font-size: 16px; font-weight: 500;">
                                        tranhauhuy265@gmail.com
                                    </a>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div>
                                    <p style="color: rgba(255, 255, 255, 0.9); margin: 0 0 5px 0; font-size: 14px;">Điện thoại</p>
                                    <a href="tel:+84777102004" style="color: white; text-decoration: none; font-size: 16px; font-weight: 500;">0123456whatever</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Availability & Response Card -->
                <div style="
                    background: white;
                    border-radius: 15px;
                    padding: 30px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                    border: 1px solid rgba(0, 123, 255, 0.2);
                ">
                    <h4 style="color: #007bff; margin-bottom: 20px; font-size: 20px;">Thời Gian Phản Hồi</h4>
                    
                    <div style="margin-bottom: 25px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <span style="color: #555; font-weight: 500;">📧 Email:</span>
                            <span style="background: rgba(40, 167, 69, 0.1); color: #28a745; padding: 5px 12px; border-radius: 15px; font-size: 14px;">
                                24-48 giờ
                            </span>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <span style="color: #555; font-weight: 500;">📱 Tin nhắn:</span>
                            <span style="background: rgba(0, 123, 255, 0.1); color: #007bff; padding: 5px 12px; border-radius: 15px; font-size: 14px;">
                                2-12 giờ
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- Working Hours -->
            <div style="
                background: linear-gradient(to right, #f8f9fa, #ffffff);
                border-radius: 15px;
                padding: 25px;
                border: 1px solid rgba(0, 123, 255, 0.2);
                margin-bottom: 30px;
            ">
                <h4 style="color: #007bff; margin-bottom: 20px; font-size: 20px; display: flex; align-items: center; gap: 10px;">
                    Giờ Làm Việc
                </h4>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                    <?php
                    $working_hours = [
                        ['Thứ 2 - Thứ 6', '08:00 - 18:00', '🟢'],
                        ['Thứ 7', '08:00 - 12:00', '🟡'],
                        ['Chủ nhật', 'Nghỉ', '🔴']
                    ];
                    
                    foreach ($working_hours as $day) {
                        echo '<div style="text-align: center;">';
                        echo '<div style="font-size: 24px; margin-bottom: 5px;">' . $day[2] . '</div>';
                        echo '<div style="font-weight: 500; color: #333; margin-bottom: 5px;">' . $day[0] . '</div>';
                        echo '<div style="color: #666; font-size: 14px;">' . $day[1] . '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                
                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0, 123, 255, 0.1);">
                    <p style="color: #666; font-size: 14px; margin: 0; text-align: center;">
                        Giờ làm việc có thể linh hoạt cho các dự án cần hỗ trợ ngoài giờ
                    </p>
                </div>
            </div>
            
            <!-- Contact Message -->
            <div style="
                background: rgba(0, 123, 255, 0.05);
                padding: 25px;
                border-radius: 15px;
                border: 1px solid rgba(0, 123, 255, 0.2);
                text-align: center;
            ">
                
                <div style="display: flex; justify-content: center; gap: 15px; margin-top: 20px; flex-wrap: wrap;">
                    <a href="mailto:your.email@example.com" style="
                        background: #007bff;
                        color: white;
                        padding: 12px 25px;
                        border-radius: 8px;
                        text-decoration: none;
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        font-weight: 500;
                        border: none;
                        cursor: pointer;
                    " onmouseover="this.style.background='#0056b3'" onmouseout="this.style.background='#007bff'">
                        Gửi Email
                    </a>
                    
                    <a href="tel:+84123456789" style="
                        background: white;
                        color: #007bff;
                        padding: 12px 25px;
                        border-radius: 8px;
                        text-decoration: none;
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        font-weight: 500;
                        border: 1px solid #007bff;
                        cursor: pointer;
                    " onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='white'">
                        📱 Gọi Ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>