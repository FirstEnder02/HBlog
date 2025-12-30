<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Blog Cá Nhân - Lập Trình Viên</title>
    <style>
        body { 
            margin:0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #000; 
            color: #eee; 
            min-height: 100vh; 
            display: flex; 
            flex-direction: column; 
        }
        
        /* Header chính */
        .header { 
            background: #111; 
            color: white; 
            padding: 0; 
            border-bottom: 2px solid #00ffff; 
            position: relative; 
            overflow: hidden; 
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
            height: 80px;
            display: flex;
            align-items: center;
        }
        
        /* Container bên trong header để căn chỉnh với main content */
        .header-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            box-sizing: border-box;
        }
        
        .header::after { 
            content: ''; 
            position: absolute; 
            top: 0; 
            right: 0; 
            bottom: 0; 
            left: 0; 
            background: linear-gradient(90deg, 
                rgba(0, 255, 255, 0.05) 0%, 
                rgba(0, 255, 255, 0.02) 20%, 
                transparent 50%, 
                rgba(0, 255, 255, 0.02) 80%, 
                rgba(0, 255, 255, 0.05) 100%); 
            pointer-events: none; 
            z-index: 1;
        }
        
        .nav { 
            display: flex; 
            align-items: stretch;
            gap: 0;
            position: relative;
            z-index: 2;
            height: 100%;
        }
        
        .nav a { 
            color: #ccc;
            text-decoration: none; 
            font-size: 16px; 
            position: relative; 
            z-index: 1; 
            transition: all 0.3s;
            background: transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100%;
            margin: 0;
            border: none;
            border-radius: 0;
        }
        
        /* Add subtle separator lines between buttons */
        .nav a:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 20%;
            bottom: 20%;
            width: 1px;
            background: rgba(0, 255, 255, 0.15);
        }
        
        .nav a:hover { 
            color: #00ffff; 
            outline: 1px solid rgba(0, 255, 255, 0.5);
            outline-offset: -1px;
            background: rgba(0, 255, 255, 0.05);
            transform: none;
            box-shadow: none;
        }
        
        /* Active state */
        .nav a.active {
            color: #00ffff;
            outline: 1px solid rgba(0, 255, 255, 0.7);
            outline-offset: -1px;
            background: rgba(0, 255, 255, 0.03);
        }
        
        .nav a i {
            font-size: 24px;
            margin-bottom: 5px;
            color: #00ffff;
        }
        
        .nav a:hover i,
        .nav a.active i {
            color: #00ffff;
            text-shadow: 0 0 8px rgba(0, 255, 255, 0.5);
        }
        
        .nav a span {
            font-weight: 500;
            letter-spacing: 0.5px;
            font-size: 14px;
        }
        
        /* Hiệu ứng ánh sáng di chuyển */
        @keyframes headerGlow {
            0% { background-position: -100px 0; }
            100% { background-position: calc(100vw + 100px) 0; }
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(0, 255, 255, 0.8), 
                transparent);
            animation: headerGlow 8s linear infinite;
            z-index: 2;
        }
        
        /* Optional: Add a subtle glow effect on active/hover */
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }
        
        .nav a.active::before,
        .nav a:hover::before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            right: 2px;
            bottom: 2px;
            border: 1px solid rgba(0, 255, 255, 0.3);
            pointer-events: none;
            animation: pulseGlow 2s ease-in-out infinite;
        }
        
        /* Responsive cho header */
        @media (max-width: 768px) {
            .header-container {
                padding: 0 15px;
            }
            
            .nav a {
                width: 80px;
            }
            
            .nav a i {
                font-size: 20px;
            }
            
            .nav a span {
                font-size: 12px;
            }
        }
        
        @media (min-width: 769px) and (max-width: 1024px) {
            .header-container {
                padding: 0 25px;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <div class="header-container">
        <div class="nav">
            <a href="index.php" class="active">
                <div style="font-size: 24px; margin-bottom: 5px;">⌂</div>
                <span>Home</span>
            </a>
            <a href="#">
                <div style="font-size: 24px; margin-bottom: 5px;">👤</div>
                <span>About</span>
            </a>
            <a href="#">
                <div style="font-size: 24px; margin-bottom: 5px;">✉</div>
                <span>Contact</span>
            </a>
        </div>
    </div>
</div>

</body>
</html>