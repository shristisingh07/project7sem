<?php
include ("nav1.php");
?>
<?php
include ("footer.php");
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        :root {
            --primary: #1a2a6c;
            --secondary: #b21f1f;
            --accent: #ffd700;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7f1 100%);
            color: var(--dark);
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><polygon fill="rgba(26, 42, 108, 0.05)" points="0,100 100,0 100,100"/></svg>');
            background-size: cover;
            opacity: 0.3;
            z-index: -1;
        }
        
        .container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        header {
            text-align: center;
            margin-bottom: 50px;
            padding: 30px;
            position: relative;
            animation: fadeIn 1s ease-out;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .logo-icon {
            background: var(--primary);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .logo-text {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }
        
        h1 {
            font-size: 2.8rem;
            color: var(--primary);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .subtitle {
            font-size: 1.2rem;
            color: #555;
            max-width: 700px;
            margin: 30px auto 0;
            line-height: 1.6;
        }
        
        /* Banner Section */
        .banner-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 20px;
            padding: 60px 40px;
            margin: 50px 0;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        
        .banner-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
        }
        
        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .banner-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .banner-subtitle {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        
        .stats-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--accent);
        }
        
        .stat-label {
            font-size: 1.1rem;
            opacity: 0.85;
        }
        
        .banner-cta {
            background: white;
            color: var(--primary);
            padding: 16px 40px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }
        
        .banner-cta:hover {
            transform: translateY(-5px);
            background: var(--accent);
            color: var(--dark);
        }
        
        /* Mentor Section */
        .mentor-section {
            text-align: center;
            margin-bottom: 70px;
            animation: slideUp 0.8s ease-out;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            color: var(--primary);
            display: inline-block;
            padding: 0 20px;
            background: linear-gradient(to right, transparent, var(--accent), transparent);
            background-size: 100% 3px;
            background-repeat: no-repeat;
            background-position: bottom;
        }
        
        .mentor-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.4s ease;
        }
        
        .mentor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }
        
        .mentor-header {
            padding: 40px 40px 20px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            text-align: center;
        }
        
        .mentor-photo {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255, 255, 255, 0.3);
            margin: 0 auto 20px;
            display: block;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .mentor-name {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .mentor-role {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }
        
        .mentor-qualification {
            font-size: 1.1rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 20px;
            border-radius: 30px;
            display: inline-block;
        }
        
        .mentor-body {
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .mentor-project {
            text-align: center;
            margin-bottom: 25px;
            width: 100%;
        }
        
        .project-title {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .project-title i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        .project-name {
            font-size: 1.8rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .project-description {
            color: #666;
            line-height: 1.7;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .mentor-footer {
            padding: 30px 40px;
            background: var(--light);
            border-top: 1px solid #eee;
            display: flex;
            justify-content: center;
        }
        
        .social-links {
            display: flex;
            gap: 20px;
        }
        
        .social-links a {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.3rem;
        }
        
        .social-links a:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(178, 31, 31, 0.4);
        }
        
        /* Team Section */
        .team-section {
            margin-bottom: 70px;
        }
        
        .team-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .team-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 350px;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: slideUp 0.8s ease-out;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .team-card-header {
            padding: 30px 30px 15px;
            text-align: center;
            background: linear-gradient(to bottom, white 70%, var(--light) 100%);
        }
        
        .team-photo {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            margin: 0 auto 20px;
            display: block;
        }
        
        .team-name {
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .team-role {
            color: var(--secondary);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .team-qualification {
            color: #666;
            font-size: 1rem;
        }
        
        .team-card-body {
            padding: 25px 30px;
            text-align: center;
        }
        
        .team-project-title {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .team-project-title i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        .team-project-name {
            font-size: 1.4rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .team-project-description {
            color: #666;
            line-height: 1.6;
            font-size: 1rem;
        }
        
        .team-card-footer {
            padding: 20px 30px;
            background: var(--light);
            border-top: 1px solid #eee;
            display: flex;
            justify-content: center;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .mentor-card { animation-delay: 0.2s; }
        .team-card:nth-child(1) { animation-delay: 0.4s; }
        .team-card:nth-child(2) { animation-delay: 0.6s; }
        .team-card:nth-child(3) { animation-delay: 0.8s; }
        
        @media (max-width: 900px) {
            .team-grid {
                flex-wrap: wrap;
            }
            .team-card {
                width: 45%;
                min-width: 300px;
            }
        }
        
        @media (max-width: 768px) {
            .team-card {
                width: 100%;
                max-width: 400px;
            }
            h1 {
                font-size: 2.2rem;
            }
            .mentor-name {
                font-size: 1.8rem;
            }
            .banner-title {
                font-size: 2rem;
            }
            .banner-subtitle {
                font-size: 1.1rem;
            }
            .stat-number {
                font-size: 2.2rem;
            }
        }
        
        .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: var(--accent);
            color: var(--dark);
            font-weight: bold;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>


    

            
          
                
            <!-- **Main** -->
	
    
<body class="page-template page-template-elementor_header_footer page page-id-4409 wp-custom-logo theme-mantras has-go-to-top mantras-plus-1.0.2 mantras-pro-1.0.0 woocommerce-no-js tribe-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-mantras wvs-show-label wvs-tooltip tinvwl-theme-style elementor-default elementor-template-full-width elementor-kit-14 elementor-page elementor-page-4409">
   
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
		<?php
nav1();
?>
	 <section class="main-title-section-wrapper aligncenter">
    <div class="main-title-section-container">
        <div class="container">
            <div class="main-title-section"><h1>Team</h1></div>
            <div class="breadcrumb"><a href="index.php">Home</a><span class="breadcrumb-default-delimiter"></span><span class="current">Team</span></div>        </div>
    </div>
    <div class="main-title-section-bg"></div>
</section> 
    <div class="container">
        <header>
           
            <h1>Our Team & Mentors</h1>
            <p class="subtitle">Meet the brilliant minds behind our innovative projects. Our team combines expertise with passion to deliver exceptional results.</p>
        </header>
        
        <!-- Mentor Section -->
        <section class="mentor-section">
            <div class="section-title">
                <h2>Meet Our Mentor</h2>
            </div>
            
            <div class="mentor-card">
                <div class="mentor-header">
                    <img src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1034&q=80"  alt="Dr. Ashish Kumar Pandey" class="mentor-photo">
                    <h2 class="mentor-name">Dr. Ashish Kumar Pandey</h2>
                    <div class="mentor-role">Senior Technical Advisor</div>
                    <div class="mentor-qualification">Ph.D. in Computer Science, IIT Delhi</div>
                </div>
                
                <div class="mentor-body">
                    <div class="mentor-project">
                        <div class="project-title">
                            <i class="fas fa-project-diagram"></i> GUIDING PROJECT
                        </div>
                        <h3 class="project-name">AI-Powered Healthcare Analytics</h3>
                        <p class="project-description">
                            Developing an advanced analytics platform that leverages machine learning to predict disease outbreaks, optimize treatment plans, and improve patient outcomes through data-driven insights.
                        </p>
                    </div>
                </div>
                
                <div class="mentor-footer">
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Team Section -->
        <section class="team-section">
            <div class="section-title">
                <h2>Our Core Team</h2>
            </div>
            
            <div class="team-grid">
                <!-- Team Member 1 -->
                <div class="team-card">
                    <div class="team-card-header">
                        <div style="position: relative; display: inline-block;">
                            <img src="img/shristi1.jpg"alt="Shristi Singh" class="team-photo">
                            <div class="badge">Group Leader</div>
                        </div>
                        <h3 class="team-name">Shristi Singh</h3>
                        <div class="team-role">Project Lead</div>
                        <div class="team-qualification">B.Tech in Computer Science And Engineering</div>
                    </div>
                    
                    <div class="team-card-body">
                        <div class="team-project-title">
                            <i class="fas fa-project-diagram"></i> CURRENT PROJECT
                        </div>
                        <h3 class="team-project-name">Smart Learning Platform</h3>
                        <p class="team-project-description">
                            Building an adaptive learning system that personalizes educational content based on student performance and learning patterns.
                        </p>
                    </div>
                    
                    <div class="team-card-footer">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="team-card">
                    <div class="team-card-header">
                        <img src="img/jaya.jpg" alt="Jaya Singh" class="team-photo">
                        <h3 class="team-name">Jaya Singh</h3>
                        <div class="team-role">Frontend Developer</div>
                        <div class="team-qualification">B.Tech in Computer Science And Engineering</div>
                    </div>
                    
                    <div class="team-card-body">
                        <div class="team-project-title">
                            <i class="fas fa-project-diagram"></i> CURRENT PROJECT
                        </div>
                        <h3 class="team-project-name">UI/UX Modernization</h3>
                        <p class="team-project-description">
                            Redesigning user interfaces for enterprise applications to improve usability and enhance user experience.
                        </p>
                    </div>
                    
                    <div class="team-card-footer">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="team-card">
                    <div class="team-card-header">
                        <img src="img/ajeet.jpg" alt="Ajeet Singh" class="team-photo" >
                        <h3 class="team-name">Ajeet Singh</h3>
                        <div class="team-role">Backend Engineer</div>
                        <div class="team-qualification">B.Tech in Computer Science And Engineering</div>
                    </div>
                    
                    <div class="team-card-body">
                        <div class="team-project-title">
                            <i class="fas fa-project-diagram"></i> CURRENT PROJECT
                        </div>
                        <h3 class="team-project-name">Cloud Infrastructure</h3>
                        <p class="team-project-description">
                            Developing scalable cloud architecture to handle millions of transactions with high availability and security.
                        </p>
                    </div>
                    
                    <div class="team-card-footer">
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		</div>
		</div>
           <?php
footer();
?>
        
    </div>
    
    <script>
        // Add subtle animations on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = `slideUp 0.8s ease-out forwards`;
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('.mentor-card, .team-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
<!-- **Main - End ** --->

            
            <!-- **Footer** -->
        