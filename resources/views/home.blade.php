<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>LegalKart Style Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700;400&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Tajawal', Arial, sans-serif;
            background: #f6f8fa;
            color: #333;
            direction: rtl;
        }
        .navbar {
            background: #254b8b;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar .logo {
            font-size: 2em;
            color: #fff;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .navbar ul {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }
        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1em;
            transition: color 0.2s;
        }
        .navbar ul li a:hover {
            color: #ffd300;
        }
        .hero {
            background: linear-gradient(90deg, #254b8b 60%, #2b7cda 100%);
            color: #fff;
            padding: 90px 30px 60px 30px;
            text-align: center;
        }
        .hero h1 {
            font-size: 2.7em;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.3em;
            margin-bottom: 30px;
        }
        .hero .cta-btn {
            background: #ffd300;
            color: #254b8b;
            border: none;
            padding: 18px 50px;
            font-size: 1.2em;
            font-weight: bold;
            border-radius: 40px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .hero .cta-btn:hover {
            background: #fff;
            color: #254b8b;
        }
        .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 35px;
            margin: 60px 0 40px 0;
        }
        .service-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 18px rgba(24, 60, 86, 0.07);
            width: 290px;
            padding: 35px 25px;
            text-align: center;
            transition: box-shadow 0.2s;
            border: 1px solid #e0e6ed;
        }
        .service-card:hover {
            box-shadow: 0 16px 24px rgba(24, 60, 86, 0.14);
            border-color: #ffd300;
        }
        .service-card img {
            width: 54px;
            margin-bottom: 12px;
        }
        .service-card h3 {
            margin: 0 0 12px 0;
            color: #254b8b;
            font-size: 1.3em;
            font-weight: bold;
        }
        .service-card p {
            color: #444;
            font-size: 1em;
        }
        .footer {
            background: #254b8b;
            color: #fff;
            text-align: center;
            padding: 25px 10px;
            margin-top: 40px;
            font-size: 1.1em;
        }
        @media (max-width: 850px) {
            .services {
                flex-direction: column;
                align-items: center;
            }
            .navbar {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">LegalKart</div>
        <ul>
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">خدماتنا</a></li>
            <li><a href="#">عن الشركة</a></li>
            <li><a href="#">تواصل معنا</a></li>
        </ul>
    </nav>
    <section class="hero">
        <h1>أفضل منصة للخدمات القانونية أونلاين</h1>
        <p>استشر محاميك، احصل على عقود قانونية، وخدمات تأسيس الشركات بسرعة واحترافية.</p>
        <button class="cta-btn">ابدأ الآن</button>
    </section>
    <section class="services">
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3068/3068777.png" alt="استشارات قانونية">
            <h3>استشارات قانونية</h3>
            <p>احصل على استشارة قانونية من أفضل المحامين عبر الإنترنت في دقائق.</p>
        </div>
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3068/3068781.png" alt="عقود قانونية">
            <h3>عقود قانونية جاهزة</h3>
            <p>صيغ احترافية للعقود القانونية تناسب احتياجاتك الشخصية والعملية.</p>
        </div>
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3068/3068785.png" alt="تأسيس شركات">
            <h3>تأسيس الشركات</h3>
            <p>خدمات تأسيس الشركات وتسجيل العلامات التجارية بسهولة وسرعة.</p>
        </div>
    </section>
    <footer class="footer">
        &copy; 2025 LegalKart. جميع الحقوق محفوظة.
    </footer>
</body>
</html>