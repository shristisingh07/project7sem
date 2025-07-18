<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title> विtaCare Relaxation Hub | Find Your Calm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #5D9B9B;
            --secondary: #8FCACA;
            --accent: #FF9A8B;
            --light: #F8F9FA;
            --dark: #2C3E50;
            --success: #88C9A1;
            --quote-bg: rgba(255, 255, 255, 0.92);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #e0f7fa, #f5f5f5);
            color: var(--dark);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(141, 184, 184, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            z-index: -1;
        }
        
        header {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .logo i {
            color: var(--accent);
            animation: pulse 2s infinite;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            position: relative;
            padding: 5px 0;
            transition: all 0.3s ease;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--accent);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .hero {
            min-height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
            background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=1000');
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(93, 155, 155, 0.3), rgba(143, 202, 202, 0.3));
        }
        
        .hero-content {
            max-width: 800px;
            z-index: 2;
            animation: fadeIn 1.5s ease-out;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
            animation: textFloat 3s ease-in-out infinite alternate;
        }
        
        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            color: #444;
            animation: fadeIn 2s ease-out;
        }
        
        .btn {
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            animation: pulse 2s infinite;
        }
        
        .btn-primary {
            background-color: var(--accent);
            color: white;
            box-shadow: 0 4px 10px rgba(255, 154, 139, 0.3);
        }
        
        .btn-primary:hover {
            background-color: #ff7b68;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 154, 139, 0.4);
            animation: none;
        }
        
        .quote-container {
            background-color: white;
            border-radius: 15px;
            padding: 2rem;
            max-width: 700px;
            margin: 2rem auto;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1s ease-out;
        }
        
        .quote-container::before {
            content: """;
            position: absolute;
            top: -20px;
            left: 20px;
            font-size: 8rem;
            color: rgba(93, 155, 155, 0.1);
            font-family: Georgia, serif;
        }
        
        .quote-text {
            font-size: 1.6rem;
            font-weight: 500;
            font-style: italic;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            color: var(--dark);
        }
        
        .quote-author {
            font-size: 1.2rem;
            text-align: right;
            color: var(--primary);
            font-weight: 600;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin: 4rem 0 2rem;
            color: var(--primary);
            position: relative;
            animation: fadeIn 1s ease-out;
        }
        
        .section-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--accent);
            border-radius: 2px;
        }
        
        .games-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 5%;
            max-width: 1400px;
            margin: 0 auto 2rem;
        }
        
        .game-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: backwards;
        }
        
        .game-card:nth-child(1) { animation-delay: 0.1s; }
        .game-card:nth-child(2) { animation-delay: 0.2s; }
        .game-card:nth-child(3) { animation-delay: 0.3s; }
        .game-card:nth-child(4) { animation-delay: 0.4s; }
        .game-card:nth-child(5) { animation-delay: 0.5s; }
        .game-card:nth-child(6) { animation-delay: 0.6s; }
        
        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .game-img {
            height: 200px;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
        }
        
        .game-card:hover .game-img {
            transform: scale(1.05);
        }
        
        .game-content {
            padding: 1.5rem;
        }
        
        .game-title {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }
        
        .game-desc {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        .game-tag {
            display: inline-block;
            background-color: var(--secondary);
            color: var(--dark);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }
        
        .recipes-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 5%;
            max-width: 1400px;
            margin: 0 auto 2rem;
        }
        
        .recipe-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: backwards;
        }
        
        .recipe-card:nth-child(1) { animation-delay: 0.1s; }
        .recipe-card:nth-child(2) { animation-delay: 0.2s; }
        .recipe-card:nth-child(3) { animation-delay: 0.3s; }
        
        .recipe-header {
            background-color: var(--primary);
            color: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .recipe-title {
            font-size: 1.3rem;
            font-weight: 600;
        }
        
        .recipe-region {
            font-size: 0.9rem;
            background-color: var(--accent);
            padding: 3px 10px;
            border-radius: 20px;
        }
        
        .recipe-body {
            padding: 1.5rem;
        }
        
        .recipe-ingredients {
            margin-bottom: 1.5rem;
        }
        
        .recipe-subtitle {
            font-size: 1.1rem;
            margin-bottom: 0.8rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .recipe-list {
            padding-left: 1.5rem;
            color: #555;
            line-height: 1.8;
        }
        
        .recipe-list li {
            margin-bottom: 0.3rem;
        }
        
        .recipe-servings {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--accent);
            font-weight: 600;
            margin-top: 1rem;
        }
        
        /* Articles Section */
        .articles-section {
            background-color: var(--light);
            padding: 4rem 0;
        }
        
        .articles-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            padding: 0 5%;
            max-width: 1400px;
            margin: 0 auto 2rem;
        }
        
        .article-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: backwards;
        }
        
        .article-card:nth-child(1) { animation-delay: 0.1s; }
        .article-card:nth-child(2) { animation-delay: 0.2s; }
        .article-card:nth-child(3) { animation-delay: 0.3s; }
        
        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.12);
        }
        
        .article-img {
            height: 220px;
            background-size: cover;
            background-position: center;
        }
        
        .article-content {
            padding: 1.8rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .article-tags {
            display: flex;
            gap: 0.6rem;
            margin-bottom: 1rem;
        }
        
        .article-tag {
            background-color: var(--secondary);
            color: var(--dark);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .article-title {
            font-size: 1.4rem;
            margin-bottom: 0.8rem;
            color: var(--dark);
            line-height: 1.3;
        }
        
        .article-excerpt {
            color: #555;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            flex: 1;
        }
        
        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid rgba(0,0,0,0.08);
            color: #777;
            font-size: 0.9rem;
        }
        
        .article-author {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .article-author img {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .article-read-time {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .music-section {
            background-color: var(--light);
            padding: 4rem 5%;
            margin: 4rem 0;
        }
        
        .music-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto 2rem;
        }
        
        .music-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: backwards;
        }
        
        .music-card:nth-child(1) { animation-delay: 0.1s; }
        .music-card:nth-child(2) { animation-delay: 0.2s; }
        .music-card:nth-child(3) { animation-delay: 0.3s; }
        
        .music-img {
            height: 180px;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
        }
        
        .music-card:hover .music-img {
            transform: scale(1.05);
        }
        
        .music-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .music-title {
            font-size: 1.3rem;
            color: var(--dark);
        }
        
        .music-duration {
            color: #777;
            font-size: 0.9rem;
        }
        
        .player-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
        }
        
        .play-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .play-btn:hover {
            background-color: var(--accent);
            transform: scale(1.1);
        }
        
        .progress-bar {
            flex: 1;
            height: 5px;
            background-color: #eee;
            border-radius: 5px;
            margin: 0 15px;
            overflow: hidden;
        }
        
        .progress {
            height: 100%;
            width: 30%;
            background-color: var(--accent);
            border-radius: 5px;
        }
        
        .jokes-container {
            max-width: 800px;
            margin: 0 auto 2rem;
            padding: 0 5%;
        }
        
        .joke-card {
            background-color: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeIn 1.5s ease-out;
        }
        
        .joke-text {
            font-size: 1.4rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }
        
        .joke-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .joke-btn:hover {
            background-color: #ff7b68;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 154, 139, 0.4);
        }
        
        /* Floating leaves animation */
        .floating-leaves {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        
        .leaf {
            position: absolute;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%235D9B9B"><path d="M17,8C8,10,5.9,16.7,5.9,16.7C2.7,16.2,2,13.8,2,13.8C2,13.8,5,8,17,8z"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            width: 30px;
            height: 30px;
            opacity: 0.7;
            animation: float 15s linear infinite;
        }
        
        /* Read More Buttons */
        .section-footer {
            display: flex;
            justify-content: center;
            margin: 2rem 0 4rem;
            padding: 0 5%;
        }
        
        .read-more-btn {
            padding: 12px 30px;
            border-radius: 50px;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(93, 155, 155, 0.3);
        }
        
        .read-more-btn:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 154, 139, 0.4);
        }
        
        .music-section .section-footer {
            margin-bottom: 2rem;
        }
        
        /* New Quotes Section */
        .quotes-section {
            background: linear-gradient(135deg, #8fcaca, #5d9b9b);
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .quotes-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(255,255,255,0.1)"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>');
            background-size: 150px;
            opacity: 0.2;
        }
        
        .quotes-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 5%;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .quote-card {
            background-color: var(--quote-bg);
            border-radius: 15px;
            padding: 2.5rem 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: backwards;
        }
        
        .quote-card:nth-child(1) { animation-delay: 0.1s; }
        .quote-card:nth-child(2) { animation-delay: 0.2s; }
        .quote-card:nth-child(3) { animation-delay: 0.3s; }
        .quote-card:nth-child(4) { animation-delay: 0.4s; }
        
        .quote-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .quote-card::before {
            content: """;
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 6rem;
            color: rgba(93, 155, 155, 0.15);
            font-family: Georgia, serif;
            line-height: 1;
        }
        
        .quote-card-text {
            font-size: 1.4rem;
            font-weight: 500;
            font-style: italic;
            line-height: 1.6;
            color: var(--dark);
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }
        
        .quote-card-author {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary);
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .quote-card-author img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--secondary);
        }
        
        .quote-category {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: var(--accent);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .quote-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 1.5rem;
        }
        
        .quote-action-btn {
            background-color: rgba(93, 155, 155, 0.1);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--primary);
        }
        
        .quote-action-btn:hover {
            background-color: var(--accent);
            color: white;
            transform: scale(1.1);
        }
        
        footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 5%;
            text-align: center;
            animation: fadeIn 1s ease-out;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-logo {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--secondary);
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 1.5rem 0;
            flex-wrap: wrap;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--accent);
        }
        
        .copyright {
            margin-top: 2rem;
            color: #aaa;
            font-size: 0.9rem;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes textFloat {
            0% { transform: translateY(0); }
            100% { transform: translateY(-5px); }
        }
        
        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.7;
            }
            90% {
                opacity: 0.7;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .section-footer {
                margin: 1.5rem 0 3rem;
            }
            
            .quote-card {
                padding: 2rem 1.5rem;
            }
            
            .quote-card-text {
                font-size: 1.2rem;
            }
        }
        
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Floating leaves animation -->
    <div class="floating-leaves" id="leavesContainer"></div>
    
    <header>
        <nav class="navbar">
            <a href="index.php"><div class="logo">
                
                <img loading="lazy" style="width:6rem; height:6rem;"src="img/logo.png" class="attachment-full size-full" alt="" decoding="async" /><span>विtaCare Relaxation Hub</span>
            </div></a>
            <div class="nav-links">
                <a href="#home">Home</a>
                <a href="#games">Games</a>
                <a href="#recipes">Recipes</a>
                <a href="#articles">Articles</a>
                <a href="#music">Music</a>
                <a href="#jokes">Jokes</a>
                <a href="#quotes">Quotes</a> <!-- Added Quotes link -->
            </div>
        </nav>
    </header>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1 id="heroHeading">Find Your Inner Peace</h1>
            <p id="heroSubheading">Your sanctuary for relaxation, inspiration, and joy. Take a deep breath and unwind.</p>
            <a href="relaxation.php" class="btn btn-primary">Explore Relaxation</a>
        </div>
    </section>

    <section class="quote-container">
        <p class="quote-text">"Peace is the result of retraining your mind to process life as it is, rather than as you think it should be."</p>
        <p class="quote-author">- Wayne Dyer</p>
    </section>

    <section id="games">
        <h2 class="section-title">Relaxing Games</h2>
        <div class="games-container">
            <div class="game-card">
                <a href="game/puzzle.php"><div class="game-img" style="background-image: url('img/puzzle.jpg');"></div>
                <div class="game-content">
                    <h3 class="game-title">Puzzle Solve</h3>
                    <p class="game-desc">Calming jigsaw puzzles with beautiful nature scenes. Relax your mind while solving.</p>
                    <span class="game-tag">Mindful</span>
                </div></a>
            </div>
            
            <div class="game-card">
                <a href="game/stonegrass.php"><div class="game-img" style="background-image: url('img/paperscissor.jpg');"></div>
                <div class="game-content">
                    <h3 class="game-title">Stone & Grass</h3>
                    <p class="game-desc">Create beautiful zen gardens with stones and flowing grass. A meditative experience.</p>
                    <span class="game-tag">Creative</span>
                </div></a>
            </div>
            
            <a href="game/water.php"><div class="game-card">
                <div class="game-img" style="background-image: url('img/wate1r.png');"></div>
                <div class="game-content">
                    <h3 class="game-title">Water Color Sort Puzzle</h3>
                    <p class="game-desc">Water Sort Puzzle is a relaxing, yet challenging color-sorting game in which the object is to sort different-colored liquids into their own separate test tubes. </p>
                    <span class="game-tag">Design</span>
                </div>
            </div></a>
        </div>
        
        <!-- Read More Button for Games -->
        <div class="section-footer">
            <a href="game/game.php" class="read-more-btn">
                <i class="fas fa-gamepad"></i>
                Explore More Games
            </a>
        </div>
    </section>

    <section id="recipes">
        <h2 class="section-title">Tasty Recipes</h2>
        <div class="recipes-container">
            <div class="recipe-card">
                <div class="recipe-header">
                    <h3 class="recipe-title">Paneer Butter Masala</h3>
                    <span class="recipe-region">North Indian</span>
                </div>
                <div class="recipe-body">
                    <h4 class="recipe-subtitle"><i class="fas fa-carrot"></i> Ingredients (2 persons):</h4>
                    <ul class="recipe-list">
                        <li>200g Paneer (cubed)</li>
                        <li>2 Tomatoes, pureed</li>
                        <li>1 Onion, finely chopped</li>
                        <li>1 tsp Ginger-garlic paste</li>
                        <li>1/2 cup Cream</li>
                        <li>1 tsp Garam masala</li>
                    </ul>
                    
                    <h4 class="recipe-subtitle"><i class="fas fa-list-ol"></i> Method:</h4>
                    <ul class="recipe-list">
                        <li>Melt butter, sauté onions until golden</li>
                        <li>Add ginger-garlic paste, cook for 2 minutes</li>
                        <li>Add tomato puree, cook until oil separates</li>
                        <li>Add spices, cook for 2 minutes</li>
                    </ul>
                    
                    <div class="recipe-servings">
                        <i class="fas fa-user-friends"></i>
                        <span>Serves: 2 persons</span>
                    </div>
                </div>
            </div>
            
            <div class="recipe-card">
                <div class="recipe-header">
                    <h3 class="recipe-title">Masala Dosa</h3>
                    <span class="recipe-region">South Indian</span>
                </div>
                <div class="recipe-body">
                    <h4 class="recipe-subtitle"><i class="fas fa-carrot"></i> Ingredients (3 persons):</h4>
                    <ul class="recipe-list">
                        <li>2 cups Rice</li>
                        <li>1/2 cup Urad dal</li>
                        <li>1/4 cup Chana dal</li>
                        <li>1/2 tsp Fenugreek seeds</li>
                        <li>Salt to taste</li>
                    </ul>
                    
                    <h4 class="recipe-subtitle"><i class="fas fa-list-ol"></i> Method:</h4>
                    <ul class="recipe-list">
                        <li>Soak rice and dal separately for 6 hours</li>
                        <li>Grind to smooth batter, ferment overnight</li>
                        <li>Heat oil, add mustard seeds and curry leaves</li>
                    </ul>
                    
                    <div class="recipe-servings">
                        <i class="fas fa-user-friends"></i>
                        <span>Serves: 3 persons</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Read More Button for Recipes -->
        <div class="section-footer">
            <a href="game/recipes.php" class="read-more-btn">
                <i class="fas fa-utensils"></i>
                Discover More Recipes
            </a>
        </div>
    </section>

    <!-- Articles Section -->
    <section id="articles" class="articles-section">
        <h2 class="section-title">Relaxing Articles</h2>
        <div class="articles-container">
            <div class="article-card">
                <div class="article-img" style="background-image: url('https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?q=80&w=1000');"></div>
                <div class="article-content">
                    <div class="article-tags">
                        <span class="article-tag">Mindfulness</span>
                        <span class="article-tag">Meditation</span>
                    </div>
                    <h3 class="article-title">The Science of Deep Breathing and Its Benefits</h3>
                    <p class="article-excerpt">Discover how conscious breathing techniques can reduce stress, improve focus, and enhance overall well-being in just minutes a day.</p>
                    <div class="article-meta">
                        <div class="article-author">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author">
                            <span>Dr. Priya Sharma</span>
                        </div>
                        <div class="article-read-time">
                            <i class="far fa-clock"></i>
                            <span>6 min read</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="article-card">
                <div class="article-img" style="background-image: url('https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=1000');"></div>
                <div class="article-content">
                    <div class="article-tags">
                        <span class="article-tag">Nature</span>
                        <span class="article-tag">Wellness</span>
                    </div>
                    <h3 class="article-title">Forest Bathing: How Nature Heals the Mind</h3>
                    <p class="article-excerpt">Explore the Japanese practice of Shinrin-yoku and learn how immersing yourself in nature can lower stress hormones and boost immunity.</p>
                    <div class="article-meta">
                        <div class="article-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author">
                            <span>Rahul Verma</span>
                        </div>
                        <div class="article-read-time">
                            <i class="far fa-clock"></i>
                            <span>8 min read</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="article-card">
                <div class="article-img" style="background-image: url('https://images.unsplash.com/photo-1518611012118-696072aa579a?q=80&w=1000');"></div>
                <div class="article-content">
                    <div class="article-tags">
                        <span class="article-tag">Sleep</span>
                        <span class="article-tag">Health</span>
                    </div>
                    <h3 class="article-title">The Ultimate Guide to Better Sleep Hygiene</h3>
                    <p class="article-excerpt">Transform your nighttime routine with these evidence-based practices to improve sleep quality and wake up refreshed every morning.</p>
                    <div class="article-meta">
                        <div class="article-author">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Author">
                            <span>Ananya Patel</span>
                        </div>
                        <div class="article-read-time">
                            <i class="far fa-clock"></i>
                            <span>10 min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Read More Button for Articles -->
        <div class="section-footer">
            <a href="game/articles.php" class="read-more-btn">
                <i class="fas fa-book-open"></i>
                Read More Articles
            </a>
        </div>
    </section>

    <section id="music" class="music-section">
        <h2 class="section-title">Relaxing Music</h2>
        <div class="music-container">
            <div class="music-card">
                <div class="music-img" style="background-image: url('https://images.unsplash.com/photo-1470225620780-dba8ba36b745?q=80&w=1000');"></div>
                <div class="music-content">
                    <h3 class="music-title">Forest Meditation</h3>
                    <p class="music-duration">Nature Sounds • 45 min</p>
                    <div class="player-controls">
                        <div class="play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                        <i class="fas fa-volume-up"></i>
                    </div>
                </div>
            </div>
            
            <div class="music-card">
                <div class="music-img" style="background-image: url('https://images.unsplash.com/photo-1511379938547-c1f69419868d?q=80&w=1000');"></div>
                <div class="music-content">
                    <h3 class="music-title">Calm Piano</h3>
                    <p class="music-duration">Instrumental • 60 min</p>
                    <div class="player-controls">
                        <div class="play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                        <i class="fas fa-volume-up"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Read More Button for Music -->
        <div class="section-footer">
            <a href="game/music.php" class="read-more-btn">
                <i class="fas fa-music"></i>
                Listen to More Tracks
            </a>
        </div>
    </section>

    <section id="jokes">
        <h2 class="section-title">Light-hearted Jokes</h2>
        <div class="jokes-container">
            <div class="joke-card">
                <p class="joke-text">Why don't scientists trust atoms?<br>Because they make up everything!</p>
                <button class="joke-btn" onclick="showNewJoke()">Next Joke</button>
            </div>
        </div>
        
        <!-- Read More Button for Jokes -->
        <div class="section-footer">
            <a href="game/joke.php" class="read-more-btn">
                <i class="fas fa-grin-squint-tears"></i>
                More Jokes to Enjoy
            </a>
        </div>
    </section>

    <!-- New Quotes Section -->
    <section id="quotes" class="quotes-section">
        <h2 class="section-title">Inspirational Quotes</h2>
        <div class="quotes-container">
            <div class="quote-card">
                <span class="quote-category">Mindfulness</span>
                <p class="quote-card-text">"The greatest weapon against stress is our ability to choose one thought over another."</p>
                <div class="quote-card-author">
                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Author">
                    <span>William James</span>
                </div>
                <div class="quote-actions">
                    <button class="quote-action-btn" title="Save this quote">
                        <i class="far fa-bookmark"></i>
                    </button>
                    <button class="quote-action-btn" title="Copy to clipboard">
                        <i class="far fa-copy"></i>
                    </button>
                    <button class="quote-action-btn" title="Share this quote">
                        <i class="far fa-share-square"></i>
                    </button>
                </div>
            </div>
            
            
            
            <div class="quote-card">
                <span class="quote-category">Self-Care</span>
                <p class="quote-card-text">"Almost everything will work again if you unplug it for a few minutes, including you."</p>
                <div class="quote-card-author">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Author">
                    <span>Anne Lamott</span>
                </div>
                <div class="quote-actions">
                    <button class="quote-action-btn" title="Save this quote">
                        <i class="far fa-bookmark"></i>
                    </button>
                    <button class="quote-action-btn" title="Copy to clipboard">
                        <i class="far fa-copy"></i>
                    </button>
                    <button class="quote-action-btn" title="Share this quote">
                        <i class="far fa-share-square"></i>
                    </button>
                </div>
            </div>
            
            <div class="quote-card">
                <span class="quote-category">Breathing</span>
                <p class="quote-card-text">"Inhale the future, exhale the past. Your breath is the anchor to the present moment."</p>
                <div class="quote-card-author">
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Author">
                    <span>Deepak Chopra</span>
                </div>
                <div class="quote-actions">
                    <button class="quote-action-btn" title="Save this quote">
                        <i class="far fa-bookmark"></i>
                    </button>
                    <button class="quote-action-btn" title="Copy to clipboard">
                        <i class="far fa-copy"></i>
                    </button>
                    <button class="quote-action-btn" title="Share this quote">
                        <i class="far fa-share-square"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Read More Button for Quotes -->
		
    </section>
<div class="section-footer">
            <a href="game/quote.php" class="read-more-btn">
                <i class="fas fa-quote-right"></i>
                 Explore More Quotes
            </a>
        </div>
       
    <footer>
        <div class="footer-content">
            <div class="footer-logo">विtaCare Relaxation Hub</div>
            <p>Your daily dose of calm and happiness</p>
            <div class="footer-links">
                <a href="#home">Home</a>
                <a href="#games">Games</a>
                <a href="#recipes">Recipes</a>
                <a href="#articles">Articles</a>
                <a href="#music">Music</a>
                <a href="#jokes">Jokes</a>
                <a href="#quotes">Quotes</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
            <p class="copyright">© 2025 विtaCare Relaxation Hub. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Motivational Quotes
        const quotes = [
            {
                text: "The greatest weapon against stress is our ability to choose one thought over another.",
                author: "William James"
            },
            {
                text: "Peace is not the absence of chaos but the ability to remain calm within it.",
                author: "Unknown"
            },
            {
                text: "Almost everything will work again if you unplug it for a few minutes, including you.",
                author: "Anne Lamott"
            },
            {
                text: "Inhale the future, exhale the past.",
                author: "Unknown"
            },
            {
                text: "The time to relax is when you don't have time for it.",
                author: "Sydney J. Harris"
            }
        ];
        
        // Jokes Collection
        const jokes = [
            "What do you call a bear with no teeth? A gummy bear!",
            "Why couldn't the bicycle stand up by itself? It was two tired!",
            "What do you call a fish wearing a bowtie? So-fish-ticated!",
            "Why did the scarecrow win an award? Because he was outstanding in his field!",
            "What do you call a factory that makes okay products? A satisfactory!",
            "Why did the math book look sad? Because it had too many problems."
        ];
        
        // Hero content variations
        const heroContents = [
            { 
                heading: "Find Your Inner Peace",
                subheading: "Your sanctuary for relaxation, inspiration, and joy. Take a deep breath and unwind."
            },
            { 
                heading: "Embrace Calmness",
                subheading: "Discover tranquility in every moment. Let go of stress and find balance."
            },
            { 
                heading: "Unwind Your Mind",
                subheading: "Let go of tension and find your center. Peace is just a breath away."
            },
            { 
                heading: "Serenity Awaits",
                subheading: "Step into a world of calm. Your journey to relaxation starts here."
            },
            { 
                heading: "Peace Within Reach",
                subheading: "Discover simple ways to relax and recharge. Your oasis of calm is waiting."
            }
        ];
        
        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Set a random quote
            setRandomQuote();
            
            // Set a random hero content
            setRandomHeroContent();
            
            // Set up game card animations
            setupGameCards();
            
            // Create floating leaves
            createFloatingLeaves();
            
            // Set up quote card actions
            setupQuoteActions();
        });
        
        // Set a random hero content
        function setRandomHeroContent() {
            const heroHeading = document.getElementById('heroHeading');
            const heroSubheading = document.getElementById('heroSubheading');
            const randomIndex = Math.floor(Math.random() * heroContents.length);
            
            heroHeading.textContent = heroContents[randomIndex].heading;
            heroSubheading.textContent = heroContents[randomIndex].subheading;
        }
        
        // Set a random motivational quote
        function setRandomQuote() {
            const quoteContainer = document.querySelector('.quote-text');
            const authorContainer = document.querySelector('.quote-author');
            const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
            
            quoteContainer.textContent = `"${randomQuote.text}"`;
            authorContainer.textContent = `- ${randomQuote.author}`;
        }
        
        // Set up game card hover effects
        function setupGameCards() {
            const gameCards = document.querySelectorAll('.game-card');
            
            gameCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-10px)';
                    card.style.boxShadow = '0 15px 30px rgba(0,0,0,0.15)';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                    card.style.boxShadow = '0 5px 15px rgba(0,0,0,0.08)';
                });
            });
        }
        
        // Show a new joke
        function showNewJoke() {
            const jokeText = document.querySelector('.joke-text');
            const randomJoke = jokes[Math.floor(Math.random() * jokes.length)];
            
            // Fade out
            jokeText.style.opacity = '0';
            
            setTimeout(() => {
                jokeText.textContent = randomJoke;
                // Fade in
                jokeText.style.opacity = '1';
            }, 500);
        }
        
        // Simulate music player functionality
        const playButtons = document.querySelectorAll('.play-btn');
        playButtons.forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('fa-play')) {
                    icon.classList.remove('fa-play');
                    icon.classList.add('fa-pause');
                } else {
                    icon.classList.remove('fa-pause');
                    icon.classList.add('fa-play');
                }
            });
        });
        
        // Create floating leaves animation
        function createFloatingLeaves() {
            const leavesContainer = document.getElementById('leavesContainer');
            const leafCount = 15;
            
            for (let i = 0; i < leafCount; i++) {
                const leaf = document.createElement('div');
                leaf.classList.add('leaf');
                
                // Random properties
                const size = Math.random() * 20 + 10; // 10-30px
                const left = Math.random() * 100; // 0-100%
                const delay = Math.random() * 15; // 0-15s
                const duration = Math.random() * 10 + 15; // 15-25s
                
                leaf.style.width = `${size}px`;
                leaf.style.height = `${size}px`;
                leaf.style.left = `${left}%`;
                leaf.style.animationDuration = `${duration}s`;
                leaf.style.animationDelay = `${delay}s`;
                
                leavesContainer.appendChild(leaf);
            }
        }
        
        // Set up quote card actions
        function setupQuoteActions() {
            // Copy to clipboard functionality
            const copyButtons = document.querySelectorAll('.quote-action-btn:nth-child(2)');
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quoteCard = this.closest('.quote-card');
                    const quoteText = quoteCard.querySelector('.quote-card-text').textContent;
                    const author = quoteCard.querySelector('.quote-card-author span').textContent;
                    const fullQuote = `${quoteText} - ${author}`;
                    
                    // Copy to clipboard
                    navigator.clipboard.writeText(fullQuote)
                        .then(() => {
                            // Show feedback
                            const originalHTML = this.innerHTML;
                            this.innerHTML = '<i class="fas fa-check"></i>';
                            
                            setTimeout(() => {
                                this.innerHTML = originalHTML;
                            }, 2000);
                        })
                        .catch(err => {
                            console.error('Failed to copy: ', err);
                        });
                });
            });
        }
    </script>
</body>
</html>