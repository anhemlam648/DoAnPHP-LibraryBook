<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 40px 0;
            text-align: left;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            margin-bottom: 20px;
            text-align: center; 
        }

        .footer-section h4 {
            color: #fff;
        }

        .subscribe-form {
            display: flex;
            flex-direction: column;
            max-width: 300px;
            margin: 0 auto; 
        }

        .subscribe-form input {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .contact-info {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            margin-bottom: 10px;
        }

        .social-icons {
            margin-top: 20px;
            text-align: center;
        }

        .social-icons a {
            margin-right: 15px;
            color: #0077cc; /* Màu xanh nước biển */
            text-decoration: none;
        }

        .footer-content {
            text-align: center; 
        }

        .footer-image {
            width: 100%; 
            max-width: 300px; 
            display: block; 
            margin: 0 auto; 
        }

        .introduction {
            text-align: center;
            margin-bottom: 20px;
        }

        .introduction p {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="footer">
        <div class="introduction">
            <p>Đăng ký nhận bản tin để không bỏ lỡ những ưu đãi đặc quyền dành riêng cho bạn.</p>
        </div>

        <div class="footer-container">        
            <div class="footer-section">
                <img class="footer-image"
                    src="https://hoanghamobile.com/tin-tuc/wp-content/uploads/2023/08/kho-truyen-tranh-21.jpg"
                    alt="hình">
            </div>

            <div class="footer-section">
                <ul class="contact-info">
                    <li>Sản phẩm & Đơn hàng: +012 345 67890</li>
                    <li>Kỹ thuật & Bảo hành: +012 345 67890</li>
                    <li>Điện thoại: +012 345 67890</li>
                    <li>Email: info@Bookstore.vn</li>
                    <li>Địa chỉ: Quận 9, Tp. Hồ Chí Minh</li>
                </ul>
            </div>

            <div class="footer-section">
                <div class="social-icons">
                    <a href="#" target="_blank">Facebook</a>
                    <a href="#" target="_blank">Twitter</a>
                    <a href="#" target="_blank">Instagram</a>
                </div>
            </div>
        </div>

        <hr>

        <div class="footer-content">
            <p>&copy; 2024 Bookstore. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
