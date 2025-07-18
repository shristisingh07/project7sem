<?php
include ("nav1.php");
?>
<?php
include ("footer.php");
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
<style>
        :root {
            --vc-about-beige: #d4cbc2;
            --vc-about-brown: #a9865c;
            --vc-about-charcoal: #1b1f1f;
            --vc-about-light-beige: #f8f5f2;
            --vc-about-dark-charcoal: #151818;
            --vc-about-light-brown: #c0a07d;
            --vc-about-light-gold: #e6d3b3;
            --vc-about-cream: #f9f6f1;
        }
        
        .vc-about * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .vc-about body {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: var(--vc-about-charcoal);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .vc-about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Light Banner Styles */
        .vc-about-main-title-section-wrapper {
            background: linear-gradient(135deg, var(--vc-about-light-beige) 0%, var(--vc-about-cream) 100%);
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(169, 134, 92, 0.15);
        }
        
        .vc-about-main-title-section-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%23a9865c" opacity="0.05"/><path d="M0 50 Q 25 30, 50 50 T 100 50" stroke="%23a9865c" stroke-width="0.3" fill="none"/></svg>');
            background-size: cover;
            z-index: 0;
        }
        
        .vc-about-main-title-section h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--vc-about-brown);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .vc-about-main-title-section h1::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background-color: var(--vc-about-brown);
            border-radius: 2px;
        }
        
        .vc-about-breadcrumb {
            font-size: 1.1rem;
            color: var(--vc-about-charcoal);
            margin-top: 25px;
        }
        
        .vc-about-breadcrumb a {
            color: var(--vc-about-brown);
            text-decoration: none;
            transition: color 0.3s;
            position: relative;
        }
        
        .vc-about-breadcrumb a::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--vc-about-brown);
            transition: width 0.3s;
        }
        
        .vc-about-breadcrumb a:hover::after {
            width: 100%;
        }
        
        .vc-about-breadcrumb span {
            margin: 0 10px;
            color: var(--vc-about-light-brown);
        }
        
        /* Hero Section */
        .vc-about-hero {
            display: flex;
            justify-content:space-evenly;
            align-items: center;
            padding: 80px 0;
            min-height: 80vh;
            background: white;
            position: relative;
            overflow: hidden;
        }
        
        .vc-about-hero::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--vc-about-light-gold) 0%, transparent 70%);
            opacity: 0.15;
            z-index: 0;
        }
        
        .vc-about-hero-content {
            max-width: auto;
            animation: vc-about-fadeInUp 1s ease;
            position: relative;
            z-index: 2;
        }
        
        .vc-about-hero-content h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: var(--vc-about-charcoal);
        }
        
        .vc-about-hero-content h1 span {
            color: var(--vc-about-brown);
            position: relative;
        }
        
        .vc-about-hero-content h1 span::after {
            content: "";
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background-color: rgba(169, 134, 92, 0.3);
            z-index: -1;
        }
        
        .vc-about-hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: var(--vc-about-dark-charcoal);
        }
        
        .vc-about-btn {
            display: inline-block;
            background: var(--vc-about-brown);
            color: white;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(169, 134, 92, 0.2);
            border: 2px solid var(--vc-about-brown);
        }
        
        .vc-about-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(169, 134, 92, 0.3);
            background: transparent;
            color: var(--vc-about-brown);
        }
        
        .vc-about-hero-image {
            position: relative;
            width: 100%;
			height:100%;
            animation: vc-about-float 6s ease-in-out infinite;
            z-index: 1;
        }
        
        .vc-about-hero-image img {
            width: 100%;
            max-width: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(169, 134, 92, 0.15);
            border: 8px solid white;
        }
        
        .vc-about-hero-image::after {
            content: "";
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100%;
            height: 100%;
            border: 2px solid var(--vc-about-light-brown);
            border-radius: 20px;
            z-index: -1;
            animation: vc-about-pulse 4s ease-in-out infinite;
        }
        
        /* Stats Section */
        .vc-about-stats {
            background-color: var(--vc-about-light-beige);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .vc-about-stats::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%23a9865c" opacity="0.05"/><path d="M0 50 Q 25 30, 50 50 T 100 50" stroke="%23a9865c" stroke-width="0.3" fill="none"/></svg>');
            z-index: 0;
        }
        
        .vc-about-stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        
        .vc-about-stat-item {
            padding: 20px;
            width: 200px;
            background: white;
            border-radius: 15px;
            margin: 10px;
            box-shadow: 0 5px 15px rgba(169, 134, 92, 0.1);
            transition: all 0.3s ease;
        }
        
        .vc-about-stat-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(169, 134, 92, 0.15);
        }
        
        .vc-about-stat-number {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 700;
            color: var(--vc-about-brown);
            margin-bottom: 10px;
        }
        
        .vc-about-stat-text {
            font-size: 1.1rem;
            color: var(--vc-about-charcoal);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Services Section */
        .vc-about-services {
            padding: 100px 0;
            text-align: center;
            background: white;
            position: relative;
        }
        
        .vc-about-services::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%231b1f1f" fill-opacity="0.05" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,202.7C672,203,768,181,864,165.3C960,149,1056,139,1152,149.3C1248,160,1344,192,1392,208L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') bottom no-repeat;
            background-size: cover;
        }
        
        .vc-about-section-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--vc-about-charcoal);
            position: relative;
            display: inline-block;
        }
        
        .vc-about-section-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--vc-about-brown);
            border-radius: 2px;
        }
        
        .vc-about-section-subtitle {
            font-size: 1.2rem;
            color: var(--vc-about-dark-charcoal);
            max-width: 700px;
            margin: 0 auto 60px;
            opacity: 0.8;
        }
        
        .vc-about-services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .vc-about-service-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(169, 134, 92, 0.08);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
            text-align: center;
        }
        
        .vc-about-service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 40px rgba(169, 134, 92, 0.15);
        }
        
        .vc-about-service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--vc-about-brown), var(--vc-about-light-brown));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
            z-index: -1;
        }
        
        .vc-about-service-card:hover::before {
            transform: scaleX(1);
        }
        
        .vc-about-service-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #f7f5f2 0%, #e8e2dc 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2.5rem;
            color: var(--vc-about-brown);
            transition: all 0.4s ease;
            border: 2px solid rgba(169, 134, 92, 0.1);
        }
        
        .vc-about-service-card:hover .vc-about-service-icon {
            background: linear-gradient(135deg, var(--vc-about-brown) 0%, var(--vc-about-light-brown) 100%);
            color: white;
            transform: scale(1.1);
        }
        
        .vc-about-service-card h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--vc-about-charcoal);
            font-family: 'Montserrat', sans-serif;
        }
        
        .vc-about-service-card p {
            color: var(--vc-about-dark-charcoal);
            margin-bottom: 25px;
            opacity: 0.9;
        }
        
        /* Features Section */
        .vc-about-features {
            padding: 100px 0;
            background: white;
        }
        
        .vc-about-features-content {
            display: flex;
            align-items: center;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .vc-about-features-image {
            flex: 1;
            animation: vc-about-pulse 4s ease-in-out infinite;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(169, 134, 92, 0.15);
            border: 8px solid white;
        }
        
        .vc-about-features-image img {
            width: 100%;
            display: block;
        }
        
        .vc-about-features-text {
            flex: 1;
        }
        
        .vc-about-features-text h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: var(--vc-about-charcoal);
            position: relative;
        }
        
        .vc-about-features-text h2::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background-color: var(--vc-about-brown);
            border-radius: 2px;
        }
        
        .vc-about-features-list {
            list-style: none;
        }
        
        .vc-about-features-list li {
            margin-bottom: 25px;
            padding-left: 45px;
            position: relative;
            font-size: 1.1rem;
        }
        
        .vc-about-features-list li i {
            position: absolute;
            left: 0;
            top: 5px;
            color: var(--vc-about-brown);
            font-size: 1.5rem;
            background: var(--vc-about-light-beige);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Team Section */
        .vc-about-team {
            padding: 100px 0;
            background: white;
            text-align: center;
        }
        
        .vc-about-team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .vc-about-team-member {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(169, 134, 92, 0.08);
            transition: all 0.4s ease;
            text-align: center;
        }
        
        .vc-about-team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(169, 134, 92, 0.15);
        }
        
        .vc-about-member-image {
            height: 250px;
            background: var(--vc-about-light-beige);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .vc-about-member-image i {
            font-size: 4rem;
            color: var(--vc-about-brown);
            opacity: 0.3;
        }
        
        .vc-about-member-info {
            padding: 25px 20px;
        }
        
        .vc-about-member-info h3 {
            font-family: 'Montserrat', sans-serif;
            color: var(--vc-about-charcoal);
            margin-bottom: 5px;
        }
        
        .vc-about-member-info p {
            color: var(--vc-about-brown);
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        .vc-about-member-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .vc-about-member-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background: var(--vc-about-light-beige);
            color: var(--vc-about-brown);
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .vc-about-member-social a:hover {
            background: var(--vc-about-brown);
            color: white;
            transform: translateY(-3px);
        }
        
        /* Testimonials */
        .vc-about-testimonials {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--vc-about-charcoal) 0%, var(--vc-about-dark-charcoal) 100%);
            text-align: center;
            position: relative;
            overflow: hidden;
			 margin-bottom: 100px;
        }
        
        .vc-about-testimonials::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%23a9865c" opacity="0.05"/><path d="M0 50 Q 25 30, 50 50 T 100 50" stroke="%23a9865c" stroke-width="0.5" fill="none"/></svg>');
            z-index: 0;
        }
        
        .vc-about-testimonials .vc-about-section-title {
            color: var(--vc-about-beige);
        }
        
        .vc-about-testimonials .vc-about-section-subtitle {
            color: rgba(212, 203, 194, 0.8);
        }
        
        .vc-about-testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
           
            position: relative;
            z-index: 2;
        }
        
        .vc-about-testimonial-card {
            background: rgba(27, 31, 31, 0.7);
            border-radius: 20px;
            padding: 30px;
            text-align: left;
            border: 1px solid rgba(169, 134, 92, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .vc-about-testimonial-content {
            color: var(--vc-about-beige);
            font-style: italic;
            margin-bottom: 20px;
            position: relative;
        }
        
        .vc-about-testimonial-content::before {
            content: """;
            font-family: Georgia, serif;
            font-size: 4rem;
            position: absolute;
            top: -25px;
            left: -15px;
            color: rgba(169, 134, 92, 0.3);
            line-height: 1;
        }
        
        .vc-about-testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .vc-about-author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--vc-about-brown);
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .vc-about-author-info h4 {
            color: white;
            margin-bottom: 5px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .vc-about-author-info p {
            color: var(--vc-about-light-brown);
            font-size: 0.9rem;
        }
        
        /* CTA Section */
        .vc-about-cta {
            padding: 120px 5%;
            text-align: center;
            background: linear-gradient(120deg, var(--vc-about-brown), var(--vc-about-light-brown));
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .vc-about-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,128L48,138.7C96,149,192,171,288,181.3C384,192,480,192,576,170.7C672,149,768,107,864,96C960,85,1056,107,1152,112C1248,117,1344,107,1392,101.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') bottom no-repeat;
            background-size: cover;
        }
        
        .vc-about-cta-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .vc-about-cta h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .vc-about-cta p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }
        
        .vc-about-btn-light {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
        }
        
        .vc-about-btn-light:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
        }
        
        /* Animations */
        @keyframes vc-about-fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes vc-about-float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        
        @keyframes vc-about-pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.03);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .vc-about-hero {
                flex-direction: column;
                text-align: center;
                padding: 60px 0;
            }
            
            .vc-about-hero-content {
                margin-bottom: 50px;
            }
            
            .vc-about-hero-image {
                width: 80%;
            }
            
            .vc-about-features-content {
                flex-direction: column;
            }
            
            .vc-about-stats-container {
                justify-content: center;
            }
            
            .vc-about-main-title-section-wrapper {
                padding: 70px 0 50px;
            }
        }
        
        @media (max-width: 768px) {
            .vc-about-main-title-section h1 {
                font-size: 2.8rem;
            }
            
            .vc-about-hero-content h1 {
                font-size: 2.8rem;
            }
            
            .vc-about-section-title {
                font-size: 2.2rem;
            }
            
            .vc-about-cta h2 {
                font-size: 2.5rem;
            }
            
            .vc-about-stat-item {
                width: 45%;
                margin-bottom: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .vc-about-hero-content h1 {
                font-size: 2.2rem;
            }
            
            .vc-about-section-title {
                font-size: 1.8rem;
            }
            
            .vc-about-stat-item {
                width: 100%;
            }
            
            .vc-about-main-title-section h1 {
                font-size: 2.3rem;
            }
        }
		       .vc-about-stats {
            background: rgba(255, 255, 255, 0.92);
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            padding: 60px 40px;
            position: relative;
            margin-bottom: 40px;
        }
        
        .vc-about-stats::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(45deg, #00c9ff, #92fe9d, #00c9ff);
            background-size: 400%;
            border-radius: 25px;
            z-index: -1;
            animation: glowing 12s linear infinite;
            opacity: 0.7;
        }
        
        .vc-about-section-title {
            text-align: center;
            font-size: 2.2rem;
            color: #1a2980;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .vc-about-section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, #1a2980, #26d0ce);
            border-radius: 2px;
        }
        
        .vc-about-section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 50px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .vc-about-stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 30px;
            justify-content: center;
        }
        
        .vc-about-stat-item {
            background: linear-gradient(135deg, rgba(26, 41, 128, 0.1) 0%, rgba(38, 208, 206, 0.1) 100%);
            border-radius: 20px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.4s ease;
            border: 2px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }
        
        .vc-about-stat-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, rgba(26, 41, 128, 0.15) 0%, rgba(38, 208, 206, 0.15) 100%);
        }
        
        .vc-about-stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, #1a2980, #26d0ce);
        }
        
        .vc-about-stat-number {
            font-size: 3.2rem;
            font-weight: 700;
            color: #1a2980;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
            min-height: 70px;
        }
        
        .vc-about-stat-number::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #1a2980, #26d0ce);
            border-radius: 2px;
        }
        
        .vc-about-stat-text {
            font-size: 1.2rem;
            color: #555;
            font-weight: 600;
        }
        
        .counter-label {
            font-size: 0.9rem;
            color: #26d0ce;
            font-weight: 600;
            margin-top: 5px;
            display: block;
        }
        
        .live-indicator {
            display: inline-block;
            background: #2ecc71;
            color: white;
            font-size: 0.8rem;
            padding: 3px 10px;
            border-radius: 20px;
            margin-top: 10px;
            animation: pulse 2s infinite;
        }
		
    </style>
</head>
<body class="page-template page-template-elementor_header_footer page page-id-4409 wp-custom-logo theme-mantras has-go-to-top mantras-plus-1.0.2 mantras-pro-1.0.0 woocommerce-no-js tribe-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-mantras wvs-show-label wvs-tooltip tinvwl-theme-style elementor-default elementor-template-full-width elementor-kit-14 elementor-page elementor-page-4409">
   
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
		<?php
nav1();
?>
    <section class="vc-about-main-title-section-wrapper aligncenter">
        <div class="vc-about-main-title-section-container">
            <div class="vc-about-container">
                <div class="vc-about-main-title-section"><h1>About Us</h1></div>
                <div class="vc-about-breadcrumb"><a href="index.php">Home</a><span class="breadcrumb-default-delimiter"></span><span class="vc-about-current">About Us</span></div>
            </div>
        </div>
    </section>

    <!-- **Wrapper** -->
    <div class="vc-about-wrapper">
        <!-- ** Inner Wrapper ** -->
        <div class="vc-about-inner-wrapper">
            <!-- **Main** -->
            <div id="vc-about-main" class="vc-about-main-content">
                <!-- Hero Section -->
                <section class="vc-about-hero" >
                    <div class="vc-about-container" style="display:flex;">
                        <div class="vc-about-hero-content">
                            <h1>Your Journey to <span>Better Health</span> Starts Here</h1>
                            <p>VitaCare is your all-in-one health companion designed to empower your wellness journey with personalized tools and guidance. Our mission is to make health management accessible, intuitive, and effective for everyone.</p>
                            <p>Founded by a team of healthcare professionals and technology experts, VitaCare combines medical expertise with cutting-edge technology to create a platform that truly understands your health needs.</p>
                            <a href="#" class="btn">Get Started Today</a>
                        </div>
                        <div class="vc-about-hero-image">
                            <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 500'><rect width='600' height='500' fill='%23f7f5f2' rx='30'/><circle cx='300' cy='220' r='120' fill='%23a9865c' opacity='0.2'/><circle cx='200' cy='150' r='70' fill='%231b1f1f' opacity='0.1'/><circle cx='400' cy='100' r='50' fill='%231b1f1f' opacity='0.1'/><circle cx='500' cy='200' r='80' fill='%23a9865c' opacity='0.1'/><path d='M250,350 L350,350 L350,450 L250,450 Z' fill='white' stroke='%23a9865c' stroke-width='3'/><circle cx='300' cy='300' r='30' fill='%23a9865c'/><path d='M280,300 L320,300 M300,280 L300,320' stroke='white' stroke-width='4'/></svg>" alt="VitaCare Health App">
                        </div>
                    </div>
                </section>

                <!-- Stats Section -->
                <section class="vc-about-stats">
            <div class="vc-about-container">
                <h2 class="vc-about-section-title">Our Impact in Numbers</h2>
                <p class="vc-about-section-subtitle">Join thousands who have transformed their health with VitaCare. These numbers update in real-time as users interact with our platform.</p>
                
                <div class="vc-about-stats-container">
                    <div class="vc-about-stat-item">
                        <div class="vc-about-stat-number" id="active-users">0</div>
                        <div class="vc-about-stat-text">Active Users</div>
                        <span class="counter-label">Live counter: <span id="user-counter">0</span> users/min</span>
                        <div class="live-indicator">
                            <i class="fas fa-sync-alt"></i> LIVE UPDATE
                        </div>
                    </div>
                    <div class="vc-about-stat-item">
                        <div class="vc-about-stat-number" id="satisfaction-rate">0%</div>
                        <div class="vc-about-stat-text">Satisfaction Rate</div>
                        <span class="counter-label">Based on 15,000+ reviews</span>
                    </div>
                    <div class="vc-about-stat-item">
                        <div class="vc-about-stat-number" id="health-experts">0</div>
                        <div class="vc-about-stat-text">Health Experts</div>
                        <span class="counter-label">New experts joining monthly</span>
                    </div>
                    <div class="vc-about-stat-item">
                        <div class="vc-about-stat-number">24/7</div>
                        <div class="vc-about-stat-text">Support</div>
                        <span class="counter-label">Average response time: 3.2 min</span>
                    </div>
                </div>
            </div>
        </section>
                <!-- Services Section -->
                <section class="vc-about-services">
                    <div class="vc-about-container">
                        <h2 class="vc-about-section-title">Our Comprehensive Services</h2>
                        <p class="vc-about-section-subtitle">VitaCare provides a holistic approach to health and wellness with our suite of innovative tools designed to support every aspect of your wellbeing.</p>
                        
                        <div class="vc-about-services-grid">
                            <div class="vc-about-service-card">
                                <div class="vc-about-service-icon">
                                    <i class="fas fa-running"></i>
                                </div>
                                <h3>Workout Plans</h3>
                                <p>Personalized exercise routines tailored to your fitness level and goals. Track progress and get real-time feedback.</p>
                                <a href="#" class="btn">Explore Workouts</a>
                            </div>
                            
                            <div class="vc-about-service-card">
                                <div class="vc-about-service-icon">
                                    <i class="fas fa-spa"></i>
                                </div>
                                <h3>Mindfulness</h3>
                                <p>Guided meditation, breathing exercises, and sleep stories to reduce stress and improve mental wellbeing.</p>
                                <a href="#" class="btn">Find Calm</a>
                            </div>
                            
                            <div class="vc-about-service-card">
                                <div class="vc-about-service-icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <h3>Nutrition Plans</h3>
                                <p>Nutritionist-approved meal plans customized to your dietary preferences and health requirements.</p>
                                <a href="#" class="btn">Discover Recipes</a>
                            </div>
                            
                            <div class="vc-about-service-card">
                                <div class="vc-about-service-icon">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <h3>AI Health Coach</h3>
                                <p>24/7 access to our intelligent assistant for instant health advice and personalized recommendations.</p>
                                <a href="#" class="btn">Chat Now</a>
                            </div>
                            
                            <div class="vc-about-service-card">
                                <div class="vc-about-service-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <h3>Medicine Tracker</h3>
                                <p>Never miss a dose with smart medication reminders and prescription tracking system.</p>
                                <a href="#" class="btn">Set Reminders</a>
                            </div>
                            
                            <div class="vc-about-service-card">
                                <div class="vc-about-service-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3>Health Analytics</h3>
                                <p>Comprehensive dashboards to visualize your health progress and identify improvement areas.</p>
                                <a href="#" class="btn">View Analytics</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Features Section -->
                <section class="vc-about-features">
                    <div class="vc-about-container">
                        <div class="vc-about-features-content">
                            <div class="vc-about-features-image">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 500'><rect width='600' height='500' fill='white' rx='30'/><circle cx='300' cy='200' r='80' fill='%23e8e2dc'/><path d='M280,200 L320,200 M300,180 L300,220' stroke='%23a9865c' stroke-width='8'/><rect x='150' y='300' width='300' height='20' rx='10' fill='%23e8e2dc'/><rect x='150' y='340' width='240' height='20' rx='10' fill='%23e8e2dc'/><rect x='150' y='380' width='200' height='20' rx='10' fill='%23e8e2dc'/></svg>" alt="VitaCare Features">
                            </div>
                            <div class="features-text">
                                <h2>Why Choose VitaCare?</h2>
                                <ul class="features-list">
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <strong>Personalized Experience:</strong> Customized plans that adapt to your unique health profile and goals
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <strong>Expert Guidance:</strong> Insights from certified health professionals and nutritionists
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <strong>Seamless Integration:</strong> Syncs with popular wearables and health devices
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <strong>Privacy First:</strong> Your health data is securely encrypted and always confidential
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <strong>Continuous Improvement:</strong> Regular updates with new features and content based on user feedback
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <strong>Community Support:</strong> Connect with others on similar health journeys for motivation
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Team Section -->
                <section class="vc-about-team">
                    <div class="vc-about-container">
                        <h2 class="vc-about-section-title">Our Expert Team</h2>
                        <p class="vc-about-section-subtitle">Meet the brilliant minds behind our innovative projects. Our team combines expertise with passion to deliver exceptional results.</p>
                        
                        <div class="vc-about-team-grid">
                            <div class="vc-about-team-member">
                                <div class="vc-about-member-image">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <div class="vc-about-member-info">
                                    <h4>Dr. Ashish Kumar Pandey</h4>
                                    <p>Project Mentor</p>
                                    <div class="member-social">
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vc-about-team-member">
                                <div class="vc-about-member-image">
                                    <img src="img/shristi1.jpg" alt="Shristi Singh" class="team-photo">
                                </div>
                                <div class="vc-about-member-info">
                                    <h4>Shristi Singh</h4>
                                    <p>Group Leader</p>
                                    <div class="vc-about-member-social">
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-github"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vc-about-team-member">
                                <div class="vc-about-member-image">
                                    <img src="img/jaya.jpg" alt="Jaya Singh" class="team-photo">
                                </div>
                                <div class="vc-about-member-info">
                                    <h4>Jaya Singh</h4>
                                    <p>Team Member</p>
                                    <div class="vc-about-member-social">
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vc-about-team-member">
                                <div class="vc-about-member-image">
                                    <img src="img/ajeet.jpg">
                                </div>
                                <div class="vc-about-member-info">
                                    <h4>Ajeet Singh</h4>
                                    <p>Team Mentor</p>
                                    <div class="vc-about-member-social">
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Testimonials -->
                <section class="vc-about-testimonials">
                    <div class="vc-about-container">
                        <h2 class="vc-about-section-title">What Our Users Say</h2>
                        <p class="vc-about-section-subtitle">Real stories from people who transformed their health with VitaCare</p>
                        
                        <div class="vc-about-testimonials-grid">
                            <div class="vc-about-testimonial-card">
                                <div class="vc-about-testimonial-content">
                                    VitaCare helped me lose 35 pounds and completely transform my relationship with food. The personalized meal plans and workout routines made all the difference.
                                </div>
                                <div class="vc-about-testimonial-author">
                                    <div class="vc-about-author-image">JR</div>
                                    <div class="vc-about-author-info">
                                        <h4>Jay pashwan</h4>
                                        <p>User for 2 years</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vc-about-testimonial-card">
                                <div class="vc-about-testimonial-content">
                                    As a busy professional, I struggled to maintain healthy habits. VitaCare's reminders and quick workout routines fit perfectly into my schedule. My energy levels have never been better!
                                </div>
                                <div class="vc-about-testimonial-author">
                                    <div class="vc-about-author-image">MP</div>
                                    <div class="vc-about-author-info">
                                        <h4>Mira singh</h4>
                                        <p>User for 1 year</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vc-about-testimonial-card">
                                <div class="vc-about-testimonial-content">
                                    The mindfulness and sleep programs have been life-changing for my anxiety. I've reduced my stress levels significantly and finally sleep through the night.
                                </div>
                                <div class="vc-about-testimonial-author">
                                    <div class="vc-about-author-image">TS</div>
                                    <div class="vc-about-author-info">
                                        <h4>Anil yadav</h4>
                                        <p>User for 8 months</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- CTA Section -->
                
            </div>
            <!-- **Main - End ** -->
        </div>
		
    </div>
	</div>
<?php
footer();
?>
</div>
    <script>
        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            document.querySelectorAll('.service-card, .features-content').forEach(card => {
                observer.observe(card);
            });
            
            // Service card hover animation delay
            const cards = document.querySelectorAll('.service-card');
            cards.forEach((card, index) => {
                card.style.transitionDelay = `${index * 0.1}s`;
            });
        });
		
		/ Set up counters with realistic starting values
        const counters = {
            activeUsers: { value: 0, target: 253742, element: document.getElementById('active-users') },
            satisfactionRate: { value: 0, target: 98, element: document.getElementById('satisfaction-rate') },
            healthExperts: { value: 0, target: 52, element: document.getElementById('health-experts') },
            userCounter: { value: 0, element: document.getElementById('user-counter') }
        };
        
        // Simulate realistic growth patterns
        const growthRates = {
            activeUsers: 12,   // users per second (simulated)
            satisfactionRate: 0.2, // % growth per interval
            healthExperts: 0.05,   // experts per interval
            userCounter: 3     // users per minute counter
        };
        
        // Initialize counter animation
        function initCounters() {
            // Start counting up to targets
            animateCounter(counters.activeUsers, 2000, () => {
                counters.activeUsers.element.textContent = formatNumber(counters.activeUsers.value) + "+";
            });
            
            animateCounter(counters.satisfactionRate, 2200, () => {
                counters.satisfactionRate.element.textContent = counters.satisfactionRate.value.toFixed(0) + "%";
            });
            
            animateCounter(counters.healthExperts, 1800, () => {
                counters.healthExperts.element.textContent = counters.healthExperts.value.toFixed(0) + "+";
            });
            
            // Start "live" counters after initial animation
            setTimeout(() => {
                setInterval(updateLiveCounters, 1000);
            }, 2500);
        }
        
        // Animate counter from 0 to target
        function animateCounter(counter, duration, onUpdate) {
            const startTime = Date.now();
            const startValue = counter.value;
            
            function update() {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Use easing function for more natural animation
                const easeProgress = easeOutQuad(progress);
                counter.value = Math.floor(startValue + easeProgress * (counter.target - startValue));
                
                if (onUpdate) onUpdate();
                
                if (progress < 1) {
                    requestAnimationFrame(update);
                }
            }
            
            requestAnimationFrame(update);
        }
        
        // Easing function for smooth animation
        function easeOutQuad(t) {
            return t * (2 - t);
        }
        
        // Format large numbers with commas
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        
        // Update the "live" counters
        function updateLiveCounters() {
            // Simulate user growth
            counters.activeUsers.value += growthRates.activeUsers;
            counters.activeUsers.element.textContent = formatNumber(Math.floor(counters.activeUsers.value)) + "+";
            
            // Simulate satisfaction rate fluctuation
            counters.satisfactionRate.value = 98 + Math.sin(Date.now() / 20000) * 0.2;
            counters.satisfactionRate.element.textContent = counters.satisfactionRate.value.toFixed(1) + "%";
            
            // Simulate health expert growth
            counters.healthExperts.value += growthRates.healthExperts;
            if (counters.healthExperts.value >= counters.healthExperts.target + 1) {
                counters.healthExperts.target += 1;
                counters.healthExperts.value = counters.healthExperts.target;
            }
            counters.healthExperts.element.textContent = Math.floor(counters.healthExperts.value) + "+";
            
            // Update user counter (resets every minute)
            counters.userCounter.value += growthRates.userCounter / 60;
            if (counters.userCounter.value >= 60) {
                counters.userCounter.value = 0;
            }
            counters.userCounter.element.textContent = Math.floor(counters.userCounter.value);
        }
        
        // Initialize when page loads
        window.addEventListener('load', initCounters);
    </script>
</body>
</html>