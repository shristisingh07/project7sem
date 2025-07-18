<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>विtaCare Fitness Hub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Variables */
        :root {
            --primary: #4a6fa5;
            --secondary: #6b8cce;
            --accent: #ff6b6b;
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --male: #3498db;
            --female: #e74c3c;
            --easy: #28a745;
            --medium: #ffc107;
            --hard: #dc3545;
        }
        
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
            color: var(--light);
            min-height: 100vh;
            position: relative;
            padding-bottom: 60px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            text-align: center;
            padding: 20px 0;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            margin-bottom: 20px;
            position: relative;
        }
        
        #app-title {
            font-size: 2.5rem;
            margin-bottom: 5px;
            color: #fff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        
        #app-tagline {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .progress-container {
            height: 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            margin: 20px 0;
            overflow: hidden;
        }
        
        #progress {
            height: 100%;
            background: var(--accent);
            width: 0%;
            transition: width 0.5s ease;
        }
        
        .section {
            display: none;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
            border-left: 4px solid var(--primary);
        }
        
        .active-section {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
            color: var(--accent);
            text-shadow: 0 0 5px rgba(255, 107, 107, 0.5);
        }
        
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .gender-card, .category-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 220px;
        }
        
        .gender-card:hover, .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border-color: var(--accent);
        }
        
        .gender-card.active, .category-card.active {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent);
            box-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
        }
        
        .gender-icon {
            font-size: 3.5rem;
            margin-bottom: 15px;
        }
        
        .male-icon {
            color: var(--male);
        }
        
        .female-icon {
            color: var(--female);
        }
        
        .gender-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        
        .gender-card p {
            opacity: 0.8;
            font-size: 0.95rem;
        }
        
        .category-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent);
        }
        
        .category-card h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }
        
        .category-card p {
            opacity: 0.8;
            font-size: 0.9rem;
        }
        
        .month-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
        
        .month-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            padding: 15px 10px;
            color: var(--light);
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 60px;
        }
        
        .month-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
        }
        
        .month-btn.active {
            background: var(--accent);
            color: var(--dark);
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }
        
        .calendar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .day-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .day-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border-color: var(--accent);
        }
        
        .day-card.locked {
            opacity: 0.6;
            cursor: not-allowed;
            position: relative;
        }
        
        .day-card.locked::after {
            content: '\f023'; /* Lock icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            color: var(--accent);
        }
        
        .rest-day {
            background: rgba(74, 111, 165, 0.3);
        }
        
        .day-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .day-number {
            font-weight: bold;
            font-size: 1.1rem;
            color: var(--accent);
        }
        
        .exercise-icon {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 15px;
            text-align: center;
            width: 100%;
        }
        
        .exercise-name {
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 10px;
            font-weight: 500;
        }
        
        .exercise-duration {
            text-align: center;
            opacity: 0.9;
            font-size: 0.9rem;
        }
        
        .exercise-counter {
            text-align: center;
            margin: 10px 0;
            font-size: 0.9rem;
        }
        
        .exercise-progress {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 10px;
        }
        
        .exercise-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
        }
        
        .exercise-dot.completed {
            background: var(--success);
        }
        
        .exercise-dot.active {
            background: var(--accent);
            transform: scale(1.2);
        }
        
        .back-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            color: var(--light);
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }
        
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.15);
        }
        
        #exercise-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            overflow-y: auto;
            padding: 20px;
        }
        
        .modal-content {
            background: rgba(30, 30, 40, 0.95);
            max-width: 1000px;
            margin: 20px auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.7);
            position: relative;
        }
        
        .modal-header {
            padding: 25px;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid var(--accent);
        }
        
        .modal-title {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.6rem;
        }
        
        .modal-icon {
            font-size: 2rem;
            color: var(--accent);
        }
        
        .close-btn {
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .close-btn:hover {
            color: var(--accent);
            transform: rotate(90deg);
        }
        
        .modal-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 25px;
        }
        
        @media (max-width: 768px) {
            .modal-body {
                grid-template-columns: 1fr;
            }
        }
        
        .video-container {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: #000;
        }
        
        #exercise-video {
            width: 100%;
            display: block;
        }
        
        .video-controls {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 0 20px;
        }
        
        .video-btn {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .video-btn:hover {
            background: var(--accent);
            color: var(--dark);
        }
        
        .details-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .detail-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 10px;
        }
        
        .detail-label {
            font-size: 0.8rem;
            opacity: 0.7;
            margin-bottom: 5px;
        }
        
        .detail-value {
            font-size: 1.1rem;
            font-weight: 500;
        }
        
        .difficulty {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
        }
        
        .difficulty.easy {
            background: var(--easy);
            color: white;
        }
        
        .difficulty.medium {
            background: var(--medium);
            color: var(--dark);
        }
        
        .difficulty.hard {
            background: var(--hard);
            color: white;
        }
        
        .content-section {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .section-heading {
            color: var(--accent);
            margin-bottom: 15px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-content {
            line-height: 1.6;
            font-size: 0.95rem;
            white-space: pre-line;
        }
        
        .exercise-progress-container {
            margin-bottom: 20px;
        }
        
        .progress-title {
            margin-bottom: 10px;
            color: var(--accent);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .exercise-progress-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }
        
        .timer-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        #exercise-timer {
            font-size: 3rem;
            font-weight: bold;
            font-family: monospace;
            color: var(--accent);
            text-shadow: 0 0 10px rgba(255, 107, 107, 0.5);
        }
        
        .timer-controls {
            display: flex;
            gap: 15px;
        }
        
        .timer-btn {
            padding: 10px 25px;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .timer-btn.start {
            background: var(--success);
            color: white;
        }
        
        .timer-btn.pause {
            background: var(--warning);
            color: var(--dark);
        }
        
        .timer-btn.next {
            background: var(--primary);
            color: white;
        }
        
        .timer-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .exercise-list-container {
            margin-top: 20px;
        }
        
        .exercise-list-title {
            margin-bottom: 15px;
            color: var(--accent);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .exercise-list {
            max-height: 300px;
            overflow-y: auto;
        }
        
        .exercise-item {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .exercise-item:hover {
            background: rgba(255, 255, 255, 0.08);
        }
        
        .exercise-item.active {
            border-left: 3px solid var(--accent);
            background: rgba(255, 255, 255, 0.1);
        }
        
        .exercise-item.completed .exercise-name {
            text-decoration: line-through;
            opacity: 0.7;
        }
        
        .exercise-item i {
            font-size: 1.5rem;
            color: var(--accent);
        }
        
        .exercise-item-content {
            flex: 1;
        }
        
        .exercise-name {
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .exercise-duration {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .lang-selector {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        
        .lang-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .lang-btn.active {
            background: var(--accent);
            color: var(--dark);
            border-color: var(--accent);
        }
        
        .lang-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .clock-container {
            position: absolute;
            top: 20px;
            left: 20px;
            text-align: left;
        }
        
        #current-time {
            font-size: 1.2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        
        #current-date {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            margin-top: 30px;
        }
        
        #footer-text {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        
        #footer-quote {
            font-style: italic;
            opacity: 0.8;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        #fullscreen-video {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: black;
            z-index: 2000;
        }
        
        #fullscreen-player {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .close-fullscreen {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            border: none;
            color: white;
            font-size: 1.5rem;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
        }
		a{
			text-decoration:none;
		}
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1 id="app-title">विtaCare Fitness Hub</h1>
            <p id="app-tagline">Monthly Exercise Programs for Men & Women</p>
            
            <div class="clock-container">
                <div id="current-time">00:00:00</div>
                <div id="current-date">Sunday, January 1, 2023</div>
            </div>
            
            <div class="lang-selector">
                <button class="lang-btn active" data-lang="en">EN</button>
				
                <button class="lang-btn" data-lang="hi">HI</button>
				 <!-- <a href="userpanel.php"><button class="lang-btn active" data-lang="en" style="width:6rem;">Go Back</button></a> -->
            </div>
        </header>
        
        <div class="progress-container">
            <div id="progress"></div>
        </div>
        
        <!-- Gender Selection -->
        <section id="gender-section" class="section active-section">
            <h2 class="section-title" id="gender-title">Select Your Gender</h2>
            
            <div class="cards-container">
                <div class="gender-card" data-gender="male">
                    <i class="fas fa-mars gender-icon male-icon"></i>
                    <h3 id="male-title">Male</h3>
                    <p id="male-desc">Workout programs designed for men</p>
                </div>
                
                <div class="gender-card" data-gender="female">
                    <i class="fas fa-venus gender-icon female-icon"></i>
                    <h3 id="female-title">Female</h3>
                    <p id="female-desc">Workout programs designed for women</p>
                </div>
            </div>
        </section>
        
        <!-- Category Selection -->
        <section id="category-section" class="section">
            <button class="back-btn" id="back-to-gender">
                <i class="fas fa-arrow-left"></i>
                <span id="back-to-gender-text">Back to Gender Selection</span>
            </button>
            
            <h2 class="section-title" id="category-title">Select Your Fitness Goal</h2>
            
            <div class="cards-container">
                <div class="category-card" data-category="slim-legs">
                    <i class="fas fa-running category-icon"></i>
                    <h3>Slim Legs</h3>
                    <p>Tone and slim your legs with targeted exercises</p>
                </div>
                
                <div class="category-card" data-category="belly-fat">
                    <i class="fas fa-walking category-icon"></i>
                    <h3>Belly Fat Loss</h3>
                    <p>Burn belly fat and achieve a flatter stomach</p>
                </div>
                
                <div class="category-card" data-category="waist-fat">
                    <i class="fas fa-people-arrows category-icon"></i>
                    <h3>Waist Fat Loss</h3>
                    <p>Sculpt your waistline and reduce love handles</p>
                </div>
                
                <div class="category-card" data-category="six-pack">
                    <i class="fas fa-fire category-icon"></i>
                    <h3>Six Pack Abs</h3>
                    <p>Build defined abdominal muscles</p>
                </div>
                
                <div class="category-card" data-category="arm-toning">
                    <i class="fas fa-dumbbell category-icon"></i>
                    <h3>Arm Toning</h3>
                    <p>Sculpt and strengthen your arms</p>
                </div>
            </div>
        </section>
        
        <!-- Month Selection -->
        <section id="month-section" class="section">
            <button class="back-btn" id="back-to-category">
                <i class="fas fa-arrow-left"></i>
                <span id="back-to-category-text">Back to Categories</span>
            </button>
            
            <h2 class="section-title" id="month-title">Select Month</h2>
            
            <div class="month-grid">
                <button class="month-btn" data-month="january">January</button>
                <button class="month-btn" data-month="february">February</button>
                <button class="month-btn" data-month="march">March</button>
                <button class="month-btn" data-month="april">April</button>
                <button class="month-btn" data-month="may">May</button>
                <button class="month-btn" data-month="june">June</button>
                <button class="month-btn" data-month="july">July</button>
                <button class="month-btn" data-month="august">August</button>
                <button class="month-btn" data-month="september">September</button>
                <button class="month-btn" data-month="october">October</button>
                <button class="month-btn" data-month="november">November</button>
                <button class="month-btn" data-month="december">December</button>
            </div>
        </section>
        
        <!-- Calendar -->
        <section id="calendar-section" class="section">
            <button class="back-btn" id="back-to-month">
                <i class="fas fa-arrow-left"></i>
                <span id="back-to-month-text">Back to Month Selection</span>
            </button>
            
            <h2 class="section-title" id="current-month">July 2023 - Six Pack Abs</h2>
            
            <div id="calendar" class="calendar">
                <!-- Calendar will be generated here -->
            </div>
        </section>
        
        <!-- Exercise Modal -->
        <div id="exercise-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <i class="fas" id="modal-icon"></i>
                        <span id="modal-title">Exercise Name</span>
                    </div>
                    <button class="close-btn">&times;</button>
                </div>
                
                <div class="modal-body">
                    <div class="left-column">
                        <div class="video-container">
                            <video id="exercise-video" loop autoplay controls></video>
                            <div class="video-controls">
                                <button class="video-btn" id="fullscreen-btn">
                                    <i class="fas fa-expand"></i>
                                    <span id="fullscreen-text">Fullscreen</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="details-container">
                            <div class="detail-card">
                                <div class="detail-label" id="duration-label">Duration</div>
                                <div class="detail-value" id="detail-duration">30 seconds</div>
                            </div>
                            <div class="detail-card">
                                <div class="detail-label" id="difficulty-label">Difficulty</div>
                                <div class="detail-value">
                                    <span class="difficulty medium" id="detail-difficulty">Medium</span>
                                </div>
                            </div>
                            <div class="detail-card">
                                <div class="detail-label" id="day-label">Day</div>
                                <div class="detail-value" id="detail-day">Day 1</div>
                            </div>
                            <div class="detail-card">
                                <div class="detail-label" id="exercise-label">Exercise</div>
                                <div class="detail-value" id="detail-exercise-num">1/10</div>
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-info-circle"></i>
                                <h3 id="benefits-title">Category Benefits</h3>
                            </div>
                            <div class="section-content" id="category-benefits-content">
                                <!-- Category benefits content will be loaded here -->
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-list-ol"></i>
                                <h3 id="instructions-title">How to Perform</h3>
                            </div>
                            <div class="section-content" id="instructions-content">
                                <!-- Instructions content will be loaded here -->
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-chart-line"></i>
                                <h3 id="benefits-title-2">Long-Term Benefits</h3>
                            </div>
                            <div class="section-content" id="long-term-content">
                                <!-- Long-term benefits content will be loaded here -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="right-column">
                        <div class="exercise-progress-container">
                            <div class="progress-title">
                                <i class="fas fa-tasks"></i>
                                <h3 id="progress-title">Progress</h3>
                            </div>
                            <div class="exercise-progress-dots" id="exercise-progress">
                                <!-- Progress dots will be generated here -->
                            </div>
                        </div>
                        
                        <div class="timer-container">
                            <div id="exercise-timer">00:30</div>
                            <div class="timer-controls">
                                <button class="timer-btn start" id="start-timer">
                                    <i class="fas fa-play"></i>
                                    <span id="start-text">Start</span>
                                </button>
                                <button class="timer-btn pause" id="pause-timer">
                                    <i class="fas fa-pause"></i>
                                    <span id="pause-text">Pause</span>
                                </button>
                                <button class="timer-btn next" id="next-exercise">
                                    <i class="fas fa-step-forward"></i>
                                    <span id="next-text">Next</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="exercise-list-container">
                            <div class="exercise-list-title">
                                <i class="fas fa-list"></i>
                                <h3 id="todays-exercises-title">Today's Exercises</h3>
                            </div>
                            <div class="exercise-list" id="exercise-list">
                                <!-- Exercise list will be generated here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Fullscreen Video -->
        <div id="fullscreen-video">
            <button class="close-fullscreen">&times;</button>
            <video id="fullscreen-player" controls></video>
        </div>
        
        <footer>
            <p id="footer-text">Monthly Exercise Programs for Men & Women</p>
            <p id="footer-quote">Stay consistent, stay healthy!</p>
        </footer>
    </div>

    <script>
		//localStorage.clear();
        // State management
        const state = {
            gender: null,
            category: null,
            month: null,
            daysInMonth: 31,
            currentYear: new Date().getFullYear(),
            selectedDay: 1,
            currentExercise: 0,
            timerInterval: null,
            timerSeconds: 30,
            isTimerRunning: false,
            exercises: [],
            currentLanguage: 'en', // Default language
            adminMode: false,
            allExercises: [],
            // Enhanced progress tracking structure:
            // progressData: {
            //     "gender": {
            //         "category": {
            //             "month": {
            //                 "day": [array of exercises with completion status]
            //             }
            //         }
            //     }
            // }
            progressData: JSON.parse(localStorage.getItem('fitnessProgress')) || {},
            // Track unlocked days per gender/category/month combination
            // unlockedDays: {
            //     "gender": {
            //         "category": {
            //             "month": lastUnlockedDay
            //         }
            //     }
            // }
            unlockedDays: JSON.parse(localStorage.getItem('fitnessUnlockedDays')) || {}
        };

        // DOM elements
        const genderSection = document.getElementById('gender-section');
        const categorySection = document.getElementById('category-section');
        const monthSection = document.getElementById('month-section');
        const calendarSection = document.getElementById('calendar-section');
        const progressBar = document.getElementById('progress');
        const currentMonthEl = document.getElementById('current-month');
        const calendarEl = document.getElementById('calendar');
        const modal = document.getElementById('exercise-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalIcon = document.getElementById('modal-icon');
        const exerciseVideo = document.getElementById('exercise-video');
        const categoryBenefitsContent = document.getElementById('category-benefits-content');
        const instructionsContent = document.getElementById('instructions-content');
        const longTermContent = document.getElementById('long-term-content');
        const detailDuration = document.getElementById('detail-duration');
        const detailDifficulty = document.getElementById('detail-difficulty');
        const detailDay = document.getElementById('detail-day');
        const detailExerciseNum = document.getElementById('detail-exercise-num');
        const exerciseProgressEl = document.getElementById('exercise-progress');
        const exerciseTimerEl = document.getElementById('exercise-timer');
        const startTimerBtn = document.getElementById('start-timer');
        const pauseTimerBtn = document.getElementById('pause-timer');
        const nextExerciseBtn = document.getElementById('next-exercise');
        const exerciseListEl = document.getElementById('exercise-list');
        const fullscreenVideo = document.getElementById('fullscreen-video');
        const fullscreenPlayer = document.getElementById('fullscreen-player');
        const currentTimeEl = document.getElementById('current-time');
        const currentDateEl = document.getElementById('current-date');
        
        // Language elements
        const langButtons = document.querySelectorAll('.lang-btn');
        const appTitle = document.getElementById('app-title');
        const appTagline = document.getElementById('app-tagline');
        const genderTitle = document.getElementById('gender-title');
        const maleTitle = document.getElementById('male-title');
        const maleDesc = document.getElementById('male-desc');
        const femaleTitle = document.getElementById('female-title');
        const femaleDesc = document.getElementById('female-desc');
        const backToGenderText = document.getElementById('back-to-gender-text');
        const categoryTitle = document.getElementById('category-title');
        const backToCategoryText = document.getElementById('back-to-category-text');
        const monthTitle = document.getElementById('month-title');
        const backToMonthText = document.getElementById('back-to-month-text');
        const footerText = document.getElementById('footer-text');
        const footerQuote = document.getElementById('footer-quote');
        const benefitsTitle = document.getElementById('benefits-title');
        const detailsTitle = document.getElementById('details-title');
        const durationLabel = document.getElementById('duration-label');
        const difficultyLabel = document.getElementById('difficulty-label');
        const dayLabel = document.getElementById('day-label');
        const exerciseLabel = document.getElementById('exercise-label');
        const instructionsTitle = document.getElementById('instructions-title');
        const benefitsTitle2 = document.getElementById('benefits-title-2');
        const progressTitle = document.getElementById('progress-title');
        const todaysExercisesTitle = document.getElementById('todays-exercises-title');
        const startText = document.getElementById('start-text');
        const pauseText = document.getElementById('pause-text');
        const nextText = document.getElementById('next-text');
        const fullscreenText = document.getElementById('fullscreen-text');

        // Language content
        const languageContent = {
            en: {
                appTitle: "Vitacare Fitness Hub",
                appTagline: "Monthly Exercise Programs for Men & Women",
                genderTitle: "Select Your Gender",
                maleTitle: "Male",
                maleDesc: "Workout programs designed for men",
                femaleTitle: "Female",
                femaleDesc: "Workout programs designed for women",
                backToGender: "Back to Gender Selection",
                categoryTitle: "Select Your Fitness Goal",
                backToCategory: "Back to Categories",
                monthTitle: "Select Month",
                backToMonth: "Back to Month Selection",
                footerText: "Monthly Exercise Programs for Men & Women",
                footerQuote: "Stay consistent, stay healthy!",
                benefitsTitle: "Category Benefits",
                detailsTitle: "Details",
                durationLabel: "Duration",
                difficultyLabel: "Difficulty",
                dayLabel: "Day",
                exerciseLabel: "Exercise",
                instructionsTitle: "How to Perform",
                benefitsTitle2: "Long-Term Benefits",
                progressTitle: "Progress",
                todaysExercisesTitle: "Today's Exercises",
                startText: "Start",
                pauseText: "Pause",
                nextText: "Next",
                fullscreenText: "Fullscreen"
            },
            hi: {
                appTitle: "विtaCare Fitness Hub",
                appTagline: "पुरुषों और महिलाओं के लिए मासिक व्यायाम कार्यक्रम",
                genderTitle: "अपना लिंग चुनें",
                maleTitle: "पुरुष",
                maleDesc: "पुरुषों के लिए डिज़ाइन किए गए वर्कआउट प्रोग्राम",
                femaleTitle: "महिला",
                femaleDesc: "महिलाओं के लिए डिज़ाइन किए गए वर्कआउट प्रोग्राम",
                backToGender: "लिंग चयन पर वापस जाएं",
                categoryTitle: "अपना फिटनेस लक्ष्य चुनें",
                backToCategory: "श्रेणियों पर वापस जाएं",
                monthTitle: "महीना चुनें",
                backToMonth: "महीना चयन पर वापस जाएं",
                footerText: "पुरुषों और महिलाओं के लिए मासिक व्यायाम कार्यक्रम",
                footerQuote: "निरंतर रहें, स्वस्थ रहें!",
                benefitsTitle: "श्रेणी लाभ",
                detailsTitle: "विवरण",
                durationLabel: "अवधि",
                difficultyLabel: "कठिनाई",
                dayLabel: "दिन",
                exerciseLabel: "व्यायाम",
                instructionsTitle: "कैसे करें",
                benefitsTitle2: "दीर्घकालिक लाभ",
                progressTitle: "प्रगति",
                todaysExercisesTitle: "आज के व्यायाम",
                startText: "शुरू",
                pauseText: "रोकें",
                nextText: "अगला",
                fullscreenText: "पूर्ण स्क्रीन"
            }
        };

        // Category names in both languages
        const categoryNames = {
            'slim-legs': { en: "Slim Legs", hi: "पतली टांगें" },
            'belly-fat': { en: "Belly Fat Loss", hi: "पेट की चर्बी कम करना" },
            'waist-fat': { en: "Waist Fat Loss", hi: "कमर की चर्बी कम करना" },
            'six-pack': { en: "Six Pack Abs", hi: "सिक्स पैक एब्स" },
            'arm-toning': { en: "Arm Toning", hi: "बांह टोनिंग" },
            'face-toning': { en: "Face Toning", hi: "चेहरा टोनिंग" },
            'eye-care': { en: "Eye Care", hi: "आंखों की देखभाल" },
            'breast-exercise': { en: "Breast Exercise", hi: "स्तन व्यायाम" }
        };

        // Category descriptions in both languages
        const categoryDescriptions = {
            'slim-legs': {
                en: "Tone and slim your legs with targeted exercises",
                hi: "लक्षित व्यायामों से अपनी टांगों को टोन और पतला करें"
            },
            'belly-fat': {
                en: "Burn belly fat and achieve a flatter stomach",
                hi: "पेट की चर्बी जलाएं और एक सपाट पेट पाएं"
            },
            'waist-fat': {
                en: "Sculpt your waistline and reduce love handles",
                hi: "अपनी कमर को मूर्तिकृत करें और लव हैंडल्स कम करें"
            },
            'six-pack': {
                en: "Build defined abdominal muscles",
                hi: "परिभाषित पेट की मांसपेशियों का निर्माण करें"
            },
            'arm-toning': {
                en: "Sculpt and strengthen your arms",
                hi: "अपनी बाहों को मूर्तिकृत और मजबूत करें"
            },
            'face-toning': {
                en: "Exercises to tone facial muscles",
                hi: "चेहरे की मांसपेशियों को टोन करने के लिए व्यायाम"
            },
            'eye-care': {
                en: "Reduce puffiness and strengthen eye muscles",
                hi: "सूजन कम करें और आंखों की मांसपेशियों को मजबूत करें"
            },
            'breast-exercise': {
                en: "Strengthen chest muscles for better support",
                hi: "बेहतर समर्थन के लिए छाती की मांसपेशियों को मजबूत करें"
            }
        };

        // Month names in both languages
        const monthNames = {
            en: {
                january: "January",
                february: "February",
                march: "March",
                april: "April",
                may: "May",
                june: "June",
                july: "July",
                august: "August",
                september: "September",
                october: "October",
                november: "November",
                december: "December"
            },
            hi: {
                january: "जनवरी",
                february: "फरवरी",
                march: "मार्च",
                april: "अप्रैल",
                may: "मई",
                june: "जून",
                july: "जुलाई",
                august: "अगस्त",
                september: "सितंबर",
                october: "अक्टूबर",
                november: "नवंबर",
                december: "दिसंबर"
            }
        };

        // Category benefits mapping
        const categoryBenefits = {
            'slim-legs': {
                en: "Slim legs exercises target your lower body to tone and define muscles while reducing excess fat. Benefits include improved leg shape, increased lower body strength, and enhanced mobility. Consistent practice leads to more sculpted and defined legs.",
                hi: "पतली टांगों के व्यायाम आपके निचले शरीर को टोन और परिभाषित करते हैं जबकि अतिरिक्त वसा को कम करते हैं। लाभों में बेहतर पैरों का आकार, बढ़ी हुई निचले शरीर की ताकत और बेहतर गतिशीलता शामिल है। नियमित अभ्यास से अधिक मूर्तिकृत और परिभाषित टांगें मिलती हैं।",
                longTerm: {
                    en: "Long-term practice leads to permanently toned legs, improved posture, and reduced risk of lower body injuries. You'll notice increased endurance and better overall leg definition.",
                    hi: "दीर्घकालिक अभ्यास स्थायी रूप से टोन्ड टांगों, बेहतर मुद्रा और निचले शरीर की चोटों के कम जोखिम की ओर ले जाता है। आप बढ़ी हुई सहनशक्ति और बेहतर समग्र पैर परिभाषा देखेंगे।"
                }
            },
            'belly-fat': {
                en: "Belly fat exercises focus on your core to burn visceral fat and strengthen abdominal muscles. Benefits include a flatter stomach, improved digestion, and better posture. Regular workouts lead to a more defined midsection.",
                hi: "पेट की चर्बी के व्यायाम आपके कोर पर केंद्रित होते हैं ताकि आंत की चर्बी को जलाया जा सके और पेट की मांसपेशियों को मजबूत किया जा सके। लाभों में एक सपाट पेट, बेहतर पाचन और बेहतर मुद्रा शामिल है। नियमित वर्कआउट से अधिक परिभाषित मध्य भाग होता है।",
                longTerm: {
                    en: "Consistent belly fat workouts reduce risk of diabetes, improve cardiovascular health, and lead to permanent fat loss in the abdominal area. You'll maintain a flatter stomach long-term.",
                    hi: "नियमित पेट की चर्बी वर्कआउट मधुमेह के जोखिम को कम करते हैं, हृदय स्वास्थ्य में सुधार करते हैं और पेट के क्षेत्र में स्थायी वसा हानि की ओर ले जाते हैं। आप दीर्घकालिक रूप से एक सपाट पेट बनाए रखेंगे।"
                }
            },
            'waist-fat': {
                en: "Waist fat exercises sculpt your waistline by targeting oblique muscles and reducing love handles. Benefits include a more defined waist, improved core stability, and better posture. Regular practice creates an hourglass figure.",
                hi: "कमर की चर्बी के व्यायाम तिरछी मांसपेशियों को लक्षित करके और प्यार के हैंडल को कम करके आपकी कमर को मूर्तिकृत करते हैं। लाभों में अधिक परिभाषित कमर, बेहतर कोर स्थिरता और बेहतर मुद्रा शामिल है। नियमित अभ्यास एक घंटे के चश्मे का आंकड़ा बनाता है।",
                longTerm: {
                    en: "Long-term waist exercises maintain a slim waistline, improve spinal health, and reduce back pain. You'll enjoy a permanently sculpted midsection.",
                    hi: "दीर्घकालिक कमर के व्यायाम एक पतली कमर बनाए रखते हैं, रीढ़ की हड्डी के स्वास्थ्य में सुधार करते हैं और पीठ दर्द को कम करते हैं। आप स्थायी रूप से मूर्तिकृत मध्य भाग का आनंद लेंगे।"
                }
            },
            'six-pack': {
                en: "Six pack exercises build defined abdominal muscles through targeted core strengthening. Benefits include improved core strength, better posture, and enhanced athletic performance. Consistent training leads to visible abs.",
                hi: "सिक्स पैक व्यायाम लक्षित कोर मजबूती के माध्यम से परिभाषित पेट की मांसपेशियों का निर्माण करते हैं। लाभों में बेहतर कोर ताकत, बेहतर मुद्रा और बेहतर एथलेटिक प्रदर्शन शामिल है। निरंतर प्रशिक्षण से दिखाई देने वाले एब्स होते हैं।",
                longTerm: {
                    en: "Long-term ab training maintains core strength, improves balance, and reduces risk of back injuries. You'll enjoy permanently defined abs with continued practice.",
                    hi: "दीर्घकालिक एब्स प्रशिक्षण कोर ताकत बनाए रखता है, संतुलन में सुधार करता है और पीठ की चोटों के जोखिम को कम करता है। आप निरंतर अभ्यास के साथ स्थायी रूप से परिभाषित एब्स का आनंद लेंगे।"
                }
            },
            'arm-toning': {
                en: "Arm toning exercises target biceps, triceps, and shoulders to create sculpted arms. Benefits include increased arm strength, improved muscle definition, and enhanced upper body appearance. Regular workouts lead to toned, defined arms.",
                hi: "आर्म टोनिंग व्यायाम बाइसेप्स, ट्राइसेप्स और कंधों को लक्षित करते हैं ताकि मूर्तिकृत बाहें बनाई जा सकें। लाभों में बढ़ी हुई बांह की ताकत, बेहतर मांसपेशियों की परिभाषा और बेहतर ऊपरी शरीर की उपस्थिति शामिल है। नियमित वर्कआउट से टोंड, परिभाषित बाहें होती हैं।",
                longTerm: {
                    en: "Consistent arm training maintains muscle tone, improves daily functional strength, and prevents age-related muscle loss. You'll enjoy permanently toned arms.",
                    hi: "निरंतर बांह प्रशिक्षण मांसपेशियों के टोन को बनाए रखता है, दैनिक कार्यात्मक ताकत में सुधार करता है और उम्र से संबंधित मांसपेशियों के नुकसान को रोकता है। आप स्थायी रूप से टोंड बाहों का आनंद लेंगे।"
                }
            }
        };

        // Generate exercise details
        function getExerciseDetails(category, day) {
            // Specific videos for category wise exercises
            const exerciseVideoMapping = {
                // Slim legs
                "Squats": "video/more18/squat.mp4",
                "Lunges": "video/more18/lunge.mp4",
                "Calf Raises": "video/more18/calf.mp4",
                "Glute Bridges": "video/more18/glute.mp4",
                "Leg Press": "video/more18/legpress.mp4",
                "Step-ups": "video/more18/stepup.mp4",
                "Hamstring Curls": "video/more18/stringcurl.mp4",
                "Leg Extensions": "video/more18/legextension.mp4",
                "Inner Thigh Lifts": "video/more18/innerthigh.mp4",
                "Outer Thigh Lifts": "video/more18/outerthigh.mp4",

                // Belly fat
                "Plank": "video/more18/plank.mp4",
                "Russian Twists": "video/more18/russiantwist.mp4",
                "Bicycle Crunches": "video/more18/bcrunch.mp4",
                "Mountain Climbers": "video/more18/mountain.mp4",
                "Leg Raises": "video/more18/legraise.mp4",
                "Reverse Crunches": "video/more18/rcrunch.mp4",
                "Flutter Kicks": "video/more18/flutter.mp4",
                "Scissor Kicks": "video/more18/scissor.mp4",
                "Heel Touches": "video/more18/heeltouch.mp4",
                "Sit-ups": "video/more18/situp.mp4",

                // Waist fat
                "Side Plank": "video/more18/sideplank.mp4",
                "Wood Choppers": "video/more18/woodchopper.mp4",
                "Oblique Crunches": "video/more18/oblique.mp4",
                "Waist Twists": "video/more18/waisttwist.mp4",
                "Side Bends": "video/more18/sidebend.mp4",
                "Windshield Wipers": "video/more18/wind.mp4",
                "Hip Dips": "video/more18/hipdip.mp4",
                "Standing Oblique Crunches": "video/more18/standingoblique.mp4",
                "Russian Twists (Waist)": "video/more18/russian.mp4", // Duplicate for clarity
                "Bicycle Crunches (Waist)": "video/more18/bcrunch.mp4", // Duplicate for clarity

                // Six pack
                "Crunches": "video/more18/crunch.mp4",
                "V-ups": "video/more18/vup.mp4",
                "Toe Touches": "video/more18/toetouch.mp4",
                "Leg Raises (Six Pack)": "video/more18/legraise.mp4",
                "Plank (Six Pack)": "video/more18/plank.mp4",
                "Bicycle Crunches (Six Pack)": "video/more18/bcrunch.mp4",
                "Reverse Crunches (Six Pack)": "video/more18/rcrunch.mp4",
                "Flutter Kicks (Six Pack)": "video/more18/flutter.mp4",
                "Scissor Kicks (Six Pack)": "video/more18/scissor.mp4",


                // Arm toning
                "Bicep Curls": "video/more18/bicep.mp4",
                "Tricep Dips": "video/more18/tricep.mp4",
                "Push-ups": "video/more18/pushup.mp4",
                "Shoulder Press": "video/more18/shoulder.mp4",
                "Lateral Raises": "video/more18/lateral.mp4",
                "Front Raises": "video/more18/frontraise.mp4",
                "Hammer Curls": "video/more18/hammercurl.mp4",
                "Tricep Extensions": "video/more18/tricepextension.mp4",
                "Arm Circles": "video/more18/arm.mp4",
                "Plank Taps": "video/more18/planktap.mp4"
            };

            
            const icons = [
                "fa-running", "fa-people-arrows", "fa-walking", "fa-arrow-up", "fa-redo",
                "fa-people-carry", "fa-bed", "fa-heartbeat", "fa-dumbbell", "fa-fire"
            ];
            
            const difficulties = ["easy", "medium", "hard"];
            const durations = ["15 seconds", "30 seconds", "45 seconds", "1 minute", "1.5 minutes"];
            
            const exerciseCategories = {
                'slim-legs': [
                    "Squats", "Lunges", "Calf Raises", "Glute Bridges", "Leg Press",
                    "Step-ups", "Hamstring Curls", "Leg Extensions", "Inner Thigh Lifts", "Outer Thigh Lifts"
                ],
                'belly-fat': [
                    "Plank", "Russian Twists", "Bicycle Crunches", "Mountain Climbers", "Leg Raises",
                    "Reverse Crunches", "Flutter Kicks", "Scissor Kicks", "Heel Touches", "Sit-ups"
                ],
                'waist-fat': [
                    "Side Plank", "Wood Choppers", "Oblique Crunches", "Russian Twists (Waist)", "Bicycle Crunches (Waist)",
                    "Waist Twists", "Side Bends", "Windshield Wipers", "Hip Dips", "Standing Oblique Crunches"
                ],
                'six-pack': [
                    "Crunches", "Leg Raises (Six Pack)", "Plank (Six Pack)", "Bicycle Crunches (Six Pack)", "Reverse Crunches (Six Pack)",
                    "V-ups", "Toe Touches", "Flutter Kicks (Six Pack)", "Scissor Kicks (Six Pack)"
                ],
                'arm-toning': [
                    "Bicep Curls", "Tricep Dips", "Push-ups", "Shoulder Press", "Lateral Raises",
                    "Front Raises", "Hammer Curls", "Tricep Extensions", "Arm Circles", "Plank Taps"
                ]
            };
            
            const exercises = [];
            const exerciseNames = exerciseCategories[category] || exerciseCategories['slim-legs'];
            
            for (let i = 0; i < 10; i++) {
                const exerciseIndex = (day + i) % exerciseNames.length;
                const exerciseName = exerciseNames[exerciseIndex];
                const iconIndex = (day + i) % icons.length;
                const diffIndex = Math.floor(Math.random() * difficulties.length);
                const durIndex = Math.floor(Math.random() * durations.length);
                
                let video = exerciseVideoMapping[exerciseName];
                
                
                exercises.push({
                    name: exerciseName,
                    icon: icons[iconIndex],
                    duration: durations[durIndex],
                    difficulty: difficulties[diffIndex],
                    video: video,
                    instructions: {
                        en: `1. Start in the proper position for ${exerciseName}<br>2. Move slowly and controlled<br>3. Maintain proper form throughout<br>4. Breathe steadily<br>5. Complete the recommended repetitions`,
                        hi: `1. ${exerciseName} के लिए उचित स्थिति में शुरू करें<br>2. धीरे और नियंत्रित तरीके से आगे बढ़ें<br>3. पूरे समय उचित फॉर्म बनाए रखें<br>4. लगातार सांस लें<br>5. अनुशंसित पुनरावृत्ति पूरी करें`
                    },
                    completed: false
                });
            }
            
            return exercises;
        }

        // Get current unlocked day for the selected gender, category, and month
        function getCurrentUnlockedDay() {
            // Initialize the structure if not exists
            if (!state.unlockedDays[state.gender]) {
                state.unlockedDays[state.gender] = {};
            }
            if (!state.unlockedDays[state.gender][state.category]) {
                state.unlockedDays[state.gender][state.category] = {};
            }
            if (!state.unlockedDays[state.gender][state.category][state.month]) {
                // Default to day 1 if not set
                state.unlockedDays[state.gender][state.category][state.month] = 1;
                localStorage.setItem('fitnessUnlockedDays', JSON.stringify(state.unlockedDays));
            }
            
            return state.unlockedDays[state.gender][state.category][state.month];
        }

        // Get progress data for the current selection
        function getCurrentProgress() {
            // Initialize the structure if not exists
            if (!state.progressData[state.gender]) {
                state.progressData[state.gender] = {};
            }
            if (!state.progressData[state.gender][state.category]) {
                state.progressData[state.gender][state.category] = {};
            }
            if (!state.progressData[state.gender][state.category][state.month]) {
                state.progressData[state.gender][state.category][state.month] = {};
            }
            
            return state.progressData[state.gender][state.category][state.month];
        }

        // Navigation functions
        function showSection(section) {
            document.querySelectorAll('.section').forEach(sec => {
                sec.classList.remove('active-section');
            });
            section.classList.add('active-section');
            updateProgressBar();
        }

        function updateProgressBar() {
            let progress = 0;
            if (genderSection.classList.contains('active-section')) progress = 25;
            if (categorySection.classList.contains('active-section')) progress = 50;
            if (monthSection.classList.contains('active-section')) progress = 75;
            if (calendarSection.classList.contains('active-section')) progress = 100;
            
            progressBar.style.width = progress + '%';
        }

        // Update clock function
        function updateClock() {
            const now = new Date();
            
            // Format time
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            
            // Format date
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const dayName = days[now.getDay()];
            const monthName = months[now.getMonth()];
            const date = now.getDate();
            const year = now.getFullYear();
            const dateString = `${dayName}, ${monthName} ${date}, ${year}`;
            
            currentTimeEl.textContent = timeString;
            currentDateEl.textContent = dateString;
        }

        // Set up clock
        setInterval(updateClock, 1000);
        updateClock(); // Initial call

        // Gender selection
        document.querySelectorAll('.gender-card').forEach(card => {
            card.addEventListener('click', function() {
                state.gender = this.dataset.gender;
                document.querySelectorAll('.gender-card').forEach(c => {
                    c.classList.remove('active');
                });
                this.classList.add('active');
                
                // Add gender-specific styling to category section
                if (state.gender === 'male') {
                    categorySection.style.borderLeft = '4px solid var(--male)';
                } else {
                    categorySection.style.borderLeft = '4px solid var(--female)';
                }
                
                showSection(categorySection);
            });
        });

        // Category selection
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', function() {
                state.category = this.dataset.category;
                document.querySelectorAll('.category-card').forEach(c => {
                    c.classList.remove('active');
                });
                this.classList.add('active');
                showSection(monthSection);
            });
        });

        // Month selection
        document.querySelectorAll('.month-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                state.month = this.dataset.month;
                document.querySelectorAll('.month-btn').forEach(b => {
                    b.classList.remove('active');
                });
                this.classList.add('active');
                
                // Update current month display
                updateCurrentMonthDisplay();
                
                // Generate calendar
                generateCalendar();
                showSection(calendarSection);
            });
        });

        // Update current month display based on language
        function updateCurrentMonthDisplay() {
            const monthNameLocalized = monthNames[state.currentLanguage][state.month];
            const categoryNameLocalized = categoryNames[state.category][state.currentLanguage];
            
            currentMonthEl.textContent = `${monthNameLocalized} ${state.currentYear} - ${categoryNameLocalized}`;
        }

        // Auto-select current month
        function autoSelectCurrentMonth() {
            const now = new Date();
            const currentMonth = now.toLocaleString('default', { month: 'long' }).toLowerCase();
            state.month = currentMonth;
            
            // Highlight current month button
            document.querySelectorAll('.month-btn').forEach(btn => {
                if (btn.dataset.month === currentMonth) {
                    btn.classList.add('active');
                }
            });
        }

        // Get days in month
        function getDaysInMonth(month) {
            const months = {
                'january': 31,
                'february': (state.currentYear % 4 === 0) ? 29 : 28,
                'march': 31,
                'april': 30,
                'may': 31,
                'june': 30,
                'july': 31,
                'august': 31,
                'september': 30,
                'october': 31,
                'november': 30,
                'december': 31
            };
            return months[month] || 31;
        }

        // Generate calendar function with locked days
        function generateCalendar() {
            calendarEl.innerHTML = '';
            state.daysInMonth = getDaysInMonth(state.month);
            
            const dayText = state.currentLanguage === 'en' ? 'Day' : 'दिन';
            const restDayText = state.currentLanguage === 'en' ? 'Rest Day' : 'आराम का दिन';
            const exercisesText = state.currentLanguage === 'en' ? 'Exercises' : 'व्यायाम';
            const fullDayText = state.currentLanguage === 'en' ? 'Full day' : 'पूरा दिन';
            const completedText = state.currentLanguage === 'en' ? 'completed' : 'पूर्ण';
            const lockedText = state.currentLanguage === 'en' ? 'Complete previous days to unlock' : 'अनलॉक करने के लिए पिछले दिन पूरा करें';
            
            // Get current unlocked day
            const currentUnlockedDay = getCurrentUnlockedDay();
            
            // Get progress for this month and category
            const monthProgress = getCurrentProgress();
            
            for (let day = 1; day <= state.daysInMonth; day++) {
                // Skip rest days (every 7th day)
                const isRestDay = day % 7 === 0;
                const isLocked = day > currentUnlockedDay && !isRestDay;
                
                const dayCard = document.createElement('div');
                dayCard.className = `day-card ${isRestDay ? "rest-day" : ""} ${isLocked ? "locked" : ""}`;
                dayCard.dataset.day = day;
                
                // Check if this day has progress data
                const dayProgress = monthProgress[day];
                const completedExercises = dayProgress ? dayProgress.filter(ex => ex.completed).length : 0;
                
                dayCard.innerHTML = `
                    <div class="day-header">
                        <div class="day-number">${dayText} ${day}</div>
                    </div>
                    <div class="day-content">
                        <i class="fas ${isRestDay ? "fa-bed" : "fa-dumbbell"} exercise-icon"></i>
                        <div class="exercise-name">${isRestDay ? restDayText : isLocked ? lockedText : `10 ${exercisesText}`}</div>
                        ${isRestDay ? 
                            `<div class="exercise-duration">${fullDayText}</div>` : 
                            isLocked ? '' :
                            `<div class="exercise-counter">${completedExercises}/10 ${completedText}</div>` +
                            '<div class="exercise-progress">' + 
                                Array(10).fill(0).map((_, i) => 
                                    `<div class="exercise-dot ${i < completedExercises ? 'completed' : ''}"></div>`
                                ).join('') +
                            '</div>'
                        }
                    </div>
                `;
                
                // Add click event to show exercise details if not locked or rest day
                if (!isRestDay && !isLocked) {
                    dayCard.addEventListener('click', () => {
                        state.selectedDay = day;
                        
                        // Check if we have saved progress for this day
                        const dayProgress = monthProgress[day];
                        
                        if (dayProgress) {
                            // Use saved exercises with progress
                            state.exercises = dayProgress;
                        } else {
                            // Generate new exercises
                            state.exercises = getExerciseDetails(state.category, day);
                        }
                        
                        state.currentExercise = 0;
                        showExerciseDetails(day);
                    });
                }
                
                calendarEl.appendChild(dayCard);
            }
        }

        // Show exercise details in modal
        function showExerciseDetails(day) {
            // Set the first exercise as active
            const exercise = state.exercises[state.currentExercise];
            updateExerciseModal(exercise, day);
            
            // Show modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        // Update exercise modal with current exercise details
        function updateExerciseModal(exercise, day) {
            modalTitle.textContent = exercise.name;
            modalIcon.className = `fas ${exercise.icon}`;
            detailDuration.textContent = exercise.duration;
            detailDifficulty.textContent = exercise.difficulty;
            detailDifficulty.className = `difficulty ${exercise.difficulty}`;
            
            // Update day text based on language
            const dayText = state.currentLanguage === 'en' ? 'Day' : 'दिन';
            detailDay.textContent = `${dayText} ${day}`;
            
            detailExerciseNum.textContent = `${state.currentExercise + 1}/10`;
            
            // Set category benefits
            const benefits = categoryBenefits[state.category] || categoryBenefits['slim-legs'];
            categoryBenefitsContent.innerHTML = benefits[state.currentLanguage];
            
            // Set exercise instructions
            instructionsContent.innerHTML = exercise.instructions ? 
                exercise.instructions[state.currentLanguage] : 
                (state.currentLanguage === 'en' ? "Instructions not available" : "निर्देश उपलब्ध नहीं हैं");
            
            // Set long-term benefits
            longTermContent.innerHTML = benefits.longTerm[state.currentLanguage];
            
            // Set video source
            if (exercise.video) {
                exerciseVideo.src = exercise.video;
                exerciseVideo.load(); // Load the new video source
                exerciseVideo.style.display = 'block';
                document.getElementById('fullscreen-btn').style.display = 'block';
            } else {
                exerciseVideo.style.display = 'none';
                document.getElementById('fullscreen-btn').style.display = 'none';
            }
            
            // Generate progress dots
            exerciseProgressEl.innerHTML = '';
            state.exercises.forEach((ex, index) => {
                const dot = document.createElement('div');
                dot.className = 'exercise-dot';
                if (ex.completed) dot.classList.add('completed');
                if (index === state.currentExercise) dot.classList.add('active');
                
                // Make dots clickable
                dot.addEventListener('click', () => {
                    state.currentExercise = index;
                    updateExerciseModal(state.exercises[state.currentExercise], day);
                });
                
                exerciseProgressEl.appendChild(dot);
            });
            
            // Generate exercise list
            exerciseListEl.innerHTML = '';
            state.exercises.forEach((ex, index) => {
                const item = document.createElement('div');
                item.className = `exercise-item ${ex.completed ? 'completed' : ''} ${index === state.currentExercise ? 'active' : ''}`;
                item.innerHTML = `
                    <i class="fas ${ex.icon}"></i>
                    <div>
                        <div class="exercise-name">${ex.name}</div>
                        <div class="exercise-duration">${ex.duration} • <span class="difficulty ${ex.difficulty}">${ex.difficulty}</span></div>
                    </div>
                `;
                
                // Make exercise items clickable
                item.addEventListener('click', () => {
                    state.currentExercise = index;
                    updateExerciseModal(state.exercises[state.currentExercise], day);
                });
                
                exerciseListEl.appendChild(item);
            });
            
            // Reset timer
            resetTimer();
        }

        // Timer functions
        function startTimer() {
            if (state.isTimerRunning) return;
            
            state.isTimerRunning = true;
            state.timerSeconds = getDurationInSeconds(state.exercises[state.currentExercise].duration);
            updateTimerDisplay();
            
            state.timerInterval = setInterval(() => {
                state.timerSeconds--;
                updateTimerDisplay();
                
                if (state.timerSeconds <= 0) {
                    clearInterval(state.timerInterval);
                    state.isTimerRunning = false;
                    markExerciseCompleted();
                }
            }, 1000);
        }
        
        function pauseTimer() {
            if (!state.isTimerRunning) return;
            
            clearInterval(state.timerInterval);
            state.isTimerRunning = false;
        }
        
        function resetTimer() {
            pauseTimer();
            state.timerSeconds = getDurationInSeconds(state.exercises[state.currentExercise].duration);
            updateTimerDisplay();
        }
        
        function updateTimerDisplay() {
            const minutes = Math.floor(state.timerSeconds / 60).toString().padStart(2, '0');
            const seconds = (state.timerSeconds % 60).toString().padStart(2, '0');
            exerciseTimerEl.textContent = `${minutes}:${seconds}`;
        }
        
        function getDurationInSeconds(duration) {
            if (duration.includes('minute')) {
                return parseInt(duration) * 60;
            }
            return parseInt(duration);
        }
        
        function markExerciseCompleted() {
            // Clear the timer interval if running
            pauseTimer();
            
            // Mark current exercise as completed
            state.exercises[state.currentExercise].completed = true;
            
            // Get current progress data structure
            const monthProgress = getCurrentProgress();
            
            // Save all exercises for this day
            monthProgress[state.selectedDay] = state.exercises;
            
            // Save to localStorage
            localStorage.setItem('fitnessProgress', JSON.stringify(state.progressData));
            
            // Check if we need to unlock the next day
            const currentUnlockedDay = getCurrentUnlockedDay();
            if (state.selectedDay === currentUnlockedDay) {
                // Unlock the next day
                state.unlockedDays[state.gender][state.category][state.month] = currentUnlockedDay + 1;
                localStorage.setItem('fitnessUnlockedDays', JSON.stringify(state.unlockedDays));
            }
            
            // Move to next exercise
            const nextExercise = state.currentExercise + 1;
            if (nextExercise < state.exercises.length) {
                state.currentExercise = nextExercise;
                updateExerciseModal(state.exercises[state.currentExercise], state.selectedDay);
            } else {
                // All exercises completed for this day
                alert(state.currentLanguage === 'en' ? 
                    'Congratulations! You have completed all exercises for today!' : 
                    'बधाई हो! आपने आज के सभी व्यायाम पूरे कर लिए हैं!');
                
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                generateCalendar(); // Refresh calendar to show progress
            }
        }
        
        function nextExercise() {
            markExerciseCompleted();
        }

        // Close modal
        document.querySelector('.close-btn').addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            if (exerciseVideo) exerciseVideo.pause();
            pauseTimer();
        });

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                if (exerciseVideo) exerciseVideo.pause();
                pauseTimer();
            }
        });

        // Language switching
        langButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const lang = this.dataset.lang;
                
                // Update active button
                langButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Update language state
                state.currentLanguage = lang;
                
                // Update all text content
                updateLanguageContent(lang);
                
                // Update month display if we're on the calendar
                if (calendarSection.classList.contains('active-section')) {
                    updateCurrentMonthDisplay();
                    generateCalendar();
                }
                
                // Update modal content if open
                if (modal.style.display === 'block') {
                    updateExerciseModal(state.exercises[state.currentExercise], state.selectedDay);
                }
            });
        });
        
        // Update all text content based on language
        function updateLanguageContent(lang) {
            const content = languageContent[lang];
            
            // Update UI elements
            appTitle.textContent = content.appTitle;
            appTagline.textContent = content.appTagline;
            genderTitle.textContent = content.genderTitle;
            maleTitle.textContent = content.maleTitle;
            maleDesc.textContent = content.maleDesc;
            femaleTitle.textContent = content.femaleTitle;
            femaleDesc.textContent = content.femaleDesc;
            backToGenderText.textContent = content.backToGender;
            categoryTitle.textContent = content.categoryTitle;
            backToCategoryText.textContent = content.backToCategory;
            monthTitle.textContent = content.monthTitle;
            backToMonthText.textContent = content.backToMonth;
            footerText.textContent = content.footerText;
            footerQuote.textContent = content.footerQuote;
            benefitsTitle.textContent = content.benefitsTitle;
            detailsTitle.textContent = content.detailsTitle;
            durationLabel.textContent = content.durationLabel;
            difficultyLabel.textContent = content.difficultyLabel;
            dayLabel.textContent = content.dayLabel;
            exerciseLabel.textContent = content.exerciseLabel;
            instructionsTitle.textContent = content.instructionsTitle;
            benefitsTitle2.textContent = content.benefitsTitle2;
            progressTitle.textContent = content.progressTitle;
            todaysExercisesTitle.textContent = content.todaysExercisesTitle;
            startText.textContent = content.startText;
            pauseText.textContent = content.pauseText;
            nextText.textContent = content.nextText;
            fullscreenText.textContent = content.fullscreenText;
            
            // Update category names and descriptions
            document.querySelectorAll('.category-card').forEach(card => {
                const category = card.dataset.category;
                const title = card.querySelector('h3');
                const desc = card.querySelector('p');
                
                title.textContent = categoryNames[category][lang];
                desc.textContent = categoryDescriptions[category][lang];
            });
            
            // Update month buttons
            document.querySelectorAll('.month-btn').forEach(btn => {
                const month = btn.dataset.month;
                btn.textContent = monthNames[lang][month];
            });

            // Update current month display in calendar section
            if (calendarSection.classList.contains('active-section')) {
                updateCurrentMonthDisplay();
                generateCalendar(); // Regenerate calendar to update day texts
            }
        }

        // Fullscreen video
        document.getElementById('fullscreen-btn')?.addEventListener('click', () => {
            if (exerciseVideo.src) {
                fullscreenPlayer.src = exerciseVideo.src;
                fullscreenVideo.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                fullscreenPlayer.play();
            }
        });

        // Close fullscreen video
        document.querySelector('.close-fullscreen')?.addEventListener('click', () => {
            fullscreenVideo.style.display = 'none';
            document.body.style.overflow = 'auto';
            fullscreenPlayer.pause();
        });

        // Timer controls
        startTimerBtn?.addEventListener('click', startTimer);
        pauseTimerBtn?.addEventListener('click', pauseTimer);
        nextExerciseBtn?.addEventListener('click', nextExercise);

        // Back buttons
        document.getElementById('back-to-gender')?.addEventListener('click', () => showSection(genderSection));
        document.getElementById('back-to-category')?.addEventListener('click', () => showSection(categorySection));
        document.getElementById('back-to-month')?.addEventListener('click', () => showSection(monthSection));
        
        // Initialize
        updateProgressBar();
        autoSelectCurrentMonth();
        updateLanguageContent('en'); // Set initial language to English
        
        // Set up the current month
        const now = new Date();
        const currentMonth = now.toLocaleString('default', { month: 'long' }).toLowerCase();
        state.month = currentMonth;
    </script>
</body>
</html>
