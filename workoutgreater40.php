<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeniorFit Wellness Hub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            --senior: #9b59b6;
            --easy: #28a745;
            --medium: #ffc107;
            --hard: #dc3545;
        }
        
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
            border-left: 4px solid var(--senior);
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
        
        .senior-icon {
            color: var(--senior);
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
            content: '\f023';
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
		.lang-btn1{
			 background: var(--accent);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 5rem;
            height: 40px;
			margin-left:2rem;
			margin-top:2rem;
            border-radius: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
		}
		a{
			text-decoration:none;
		}
        
    </style>
</head>
<body>
	
    <div class="container">
        <header>
            <h1 id="app-title">SeniorFit Wellness Hub</h1>
            <p id="app-tagline">Gentle Exercise Programs for People Over 40</p>
            
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
                    <p id="male-desc">Gentle workout programs for men over 40</p>
                </div>
                
                <div class="gender-card" data-gender="female">
                    <i class="fas fa-venus gender-icon female-icon"></i>
                    <h3 id="female-title">Female</h3>
                    <p id="female-desc">Gentle workout programs for women over 40</p>
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
                <div class="category-card" data-category="joint-health">
                    <i class="fas fa-bone category-icon"></i>
                    <h3>Joint Health</h3>
                    <p>Improve mobility and reduce joint pain</p>
                </div>
                
                <div class="category-card" data-category="heart-health">
                    <i class="fas fa-heartbeat category-icon"></i>
                    <h3>Heart Health</h3>
                    <p>Gentle cardio for better circulation</p>
                </div>
                
                <div class="category-card" data-category="flexibility">
                    <i class="fas fa-people-arrows category-icon"></i>
                    <h3>Flexibility</h3>
                    <p>Improve range of motion and mobility</p>
                </div>
                
                <div class="category-card" data-category="balance">
                    <i class="fas fa-balance-scale category-icon"></i>
                    <h3>Balance</h3>
                    <p>Exercises to improve stability</p>
                </div>
                
                <div class="category-card" data-category="strength">
                    <i class="fas fa-dumbbell category-icon"></i>
                    <h3>Strength</h3>
                    <p>Maintain muscle mass with gentle exercises</p>
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
            
            <h2 class="section-title" id="current-month">July 2023 - Joint Health</h2>
            
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
                                    <span class="difficulty easy" id="detail-difficulty">Easy</span>
                                </div>
                            </div>
                            <div class="detail-card">
                                <div class="detail-label" id="day-label">Day</div>
                                <div class="detail-value" id="detail-day">Day 1</div>
                            </div>
                            <div class="detail-card">
                                <div class="detail-label" id="exercise-label">Exercise</div>
                                <div class="detail-value" id="detail-exercise-num">1/8</div>
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-info-circle"></i>
                                <h3 id="benefits-title">Category Benefits</h3>
                            </div>
                            <div class="section-content" id="category-benefits-content">
                                Joint health exercises improve mobility and reduce joint pain through gentle movements. Benefits include increased flexibility, reduced stiffness, and better overall joint function. Consistent practice leads to improved quality of movement.
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-list-ol"></i>
                                <h3 id="instructions-title">How to Perform</h3>
                            </div>
                            <div class="section-content" id="instructions-content">
                                1. Position yourself correctly for the exercise
                                2. Move slowly and with control
                                3. Maintain proper form throughout
                                4. Breathe steadily
                                5. Complete the recommended repetitions
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-chart-line"></i>
                                <h3 id="benefits-title-2">Long-Term Benefits</h3>
                            </div>
                            <div class="section-content" id="long-term-content">
                                Long-term joint exercises maintain mobility, reduce arthritis symptoms, and improve overall quality of life. You'll enjoy easier movement with continued practice.
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
            <p id="footer-text">Gentle Exercise Programs for People Over 40</p>
            <p id="footer-quote">Stay active, stay healthy!</p>
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
            progressData: JSON.parse(localStorage.getItem('seniorFitProgress')) || {},
            // Track unlocked days per gender/category/month combination
            // unlockedDays: {
            //     "gender": {
            //         "category": {
            //             "month": lastUnlockedDay
            //         }
            //     }
            // }
            unlockedDays: JSON.parse(localStorage.getItem('seniorFitUnlockedDays')) || {}
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
                appTitle: "SeniorFit Wellness Hub",
                appTagline: "Gentle Exercise Programs for People Over 40",
                genderTitle: "Select Your Gender",
                maleTitle: "Male",
                maleDesc: "Gentle workout programs for men over 40",
                femaleTitle: "Female",
                femaleDesc: "Gentle workout programs for women over 40",
                backToGender: "Back to Gender Selection",
                categoryTitle: "Select Your Fitness Goal",
                backToCategory: "Back to Categories",
                monthTitle: "Select Month",
                backToMonth: "Back to Month Selection",
                footerText: "Gentle Exercise Programs for People Over 40",
                footerQuote: "Stay active, stay healthy!",
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
                appTitle: "सीनियरफिट वेलनेस हब",
                appTagline: "40 वर्ष से अधिक उम्र के लोगों के लिए हल्के व्यायाम कार्यक्रम",
                genderTitle: "अपना लिंग चुनें",
                maleTitle: "पुरुष",
                maleDesc: "40 वर्ष से अधिक उम्र के पुरुषों के लिए हल्के वर्कआउट प्रोग्राम",
                femaleTitle: "महिला",
                femaleDesc: "40 वर्ष से अधिक उम्र की महिलाओं के लिए हल्के वर्कआउट प्रोग्राम",
                backToGender: "लिंग चयन पर वापस जाएं",
                categoryTitle: "अपना फिटनेस लक्ष्य चुनें",
                backToCategory: "श्रेणियों पर वापस जाएं",
                monthTitle: "महीना चुनें",
                backToMonth: "महीना चयन पर वापस जाएं",
                footerText: "40 वर्ष से अधिक उम्र के लोगों के लिए हल्के व्यायाम कार्यक्रम",
                footerQuote: "सक्रिय रहें, स्वस्थ रहें!",
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
            'joint-health': { en: "Joint Health", hi: "जोड़ों का स्वास्थ्य" },
            'heart-health': { en: "Heart Health", hi: "हृदय स्वास्थ्य" },
            'flexibility': { en: "Flexibility", hi: "लचीलापन" },
            'balance': { en: "Balance", hi: "संतुलन" },
            'strength': { en: "Strength", hi: "ताकत" }
        };

        // Category descriptions in both languages
        const categoryDescriptions = {
            'joint-health': {
                en: "Improve mobility and reduce joint pain",
                hi: "गतिशीलता में सुधार करें और जोड़ों के दर्द को कम करें"
            },
            'heart-health': {
                en: "Gentle cardio for better circulation",
                hi: "बेहतर रक्त संचार के लिए हल्का कार्डियो"
            },
            'flexibility': {
                en: "Improve range of motion and mobility",
                hi: "गति की सीमा और गतिशीलता में सुधार करें"
            },
            'balance': {
                en: "Exercises to improve stability",
                hi: "स्थिरता में सुधार के लिए व्यायाम"
            },
            'strength': {
                en: "Maintain muscle mass with gentle exercises",
                hi: "हल्के व्यायाम के साथ मांसपेशियों को बनाए रखें"
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
            'joint-health': {
                en: "Joint health exercises improve mobility and reduce joint pain through gentle movements. Benefits include increased flexibility, reduced stiffness, and better overall joint function. Consistent practice leads to improved quality of movement.",
                hi: "जोड़ों के स्वास्थ्य व्यायाम हल्की गतिविधियों के माध्यम से गतिशीलता में सुधार करते हैं और जोड़ों के दर्द को कम करते हैं। लाभों में बढ़ी हुई लचीलापन, कम अकड़न और बेहतर समग्र जोड़ कार्य शामिल हैं। निरंतर अभ्यास से गति की गुणवत्ता में सुधार होता है।",
                longTerm: {
                    en: "Long-term joint exercises maintain mobility, reduce arthritis symptoms, and improve overall quality of life. You'll enjoy easier movement with continued practice.",
                    hi: "दीर्घकालिक जोड़ व्यायाम गतिशीलता बनाए रखते हैं, गठिया के लक्षणों को कम करते हैं और समग्र जीवन की गुणवत्ता में सुधार करते हैं। आप निरंतर अभ्यास के साथ आसान आंदोलन का आनंद लेंगे।"
                }
            },
            'heart-health': {
                en: "Heart health exercises gently elevate your heart rate to improve circulation and cardiovascular function. Benefits include better blood flow, reduced blood pressure, and improved stamina. Regular practice leads to a stronger heart.",
                hi: "हृदय स्वास्थ्य व्यायाम धीरे से आपकी हृदय गति को बढ़ाते हैं ताकि रक्त संचार और हृदय संबंधी कार्य में सुधार हो सके। लाभों में बेहतर रक्त प्रवाह, कम रक्तचाप और बेहतर सहनशक्ति शामिल हैं। नियमित अभ्यास से एक मजबूत दिल होता है।",
                longTerm: {
                    en: "Consistent heart exercises reduce risk of heart disease, improve cholesterol levels, and increase longevity. You'll maintain better cardiovascular health long-term.",
                    hi: "निरंतर हृदय व्यायाम हृदय रोग के जोखिम को कम करते हैं, कोलेस्ट्रॉल के स्तर में सुधार करते हैं और दीर्घायु बढ़ाते हैं। आप दीर्घकालिक रूप से बेहतर हृदय संबंधी स्वास्थ्य बनाए रखेंगे।"
                }
            },
            'flexibility': {
                en: "Flexibility exercises gently stretch your muscles to improve range of motion and reduce stiffness. Benefits include easier movement, reduced muscle tension, and better posture. Regular practice leads to greater freedom of movement.",
                hi: "लचीलापन व्यायाम आपकी मांसपेशियों को धीरे से खींचते हैं ताकि गति की सीमा में सुधार हो सके और अकड़न कम हो सके। लाभों में आसान आंदोलन, कम मांसपेशियों में तनाव और बेहतर मुद्रा शामिल हैं। नियमित अभ्यास से आंदोलन की अधिक स्वतंत्रता होती है।",
                longTerm: {
                    en: "Long-term flexibility training maintains joint health, prevents injuries, and makes daily activities easier. You'll enjoy permanently improved flexibility with continued practice.",
                    hi: "दीर्घकालिक लचीलापन प्रशिक्षण जोड़ों के स्वास्थ्य को बनाए रखता है, चोटों को रोकता है और दैनिक गतिविधियों को आसान बनाता है। आप निरंतर अभ्यास के साथ स्थायी रूप से बेहतर लचीलापन का आनंद लेंगे।"
                }
            },
            'balance': {
                en: "Balance exercises improve stability and coordination to prevent falls. Benefits include better posture, increased confidence in movement, and stronger core muscles. Regular practice leads to improved stability.",
                hi: "संतुलन व्यायाम गिरने से रोकने के लिए स्थिरता और समन्वय में सुधार करते हैं। लाभों में बेहतर मुद्रा, आंदोलन में बढ़ा हुआ आत्मविश्वास और मजबूत कोर मांसपेशियां शामिल हैं। नियमित अभ्यास से बेहतर स्थिरता होती है।",
                longTerm: {
                    en: "Consistent balance training reduces fall risk, improves proprioception, and maintains independence. You'll enjoy better stability long-term.",
                    hi: "निरंतर संतुलन प्रशिक्षण गिरने के जोखिम को कम करता है, प्रोप्रियोसेप्शन में सुधार करता है और स्वतंत्रता बनाए रखता है। आप दीर्घकालिक रूप से बेहतर स्थिरता का आनंद लेंगे।"
                }
            },
            'strength': {
                en: "Strength exercises maintain muscle mass with gentle resistance movements. Benefits include improved metabolism, better bone density, and easier daily activities. Regular workouts lead to maintained strength.",
                hi: "ताकत व्यायाम हल्के प्रतिरोध आंदोलनों के साथ मांसपेशियों को बनाए रखते हैं। लाभों में बेहतर चयापचय, बेहतर हड्डी घनत्व और आसान दैनिक गतिविधियां शामिल हैं। नियमित वर्कआउट से बनाए रखी गई ताकत होती है।",
                longTerm: {
                    en: "Long-term strength training prevents age-related muscle loss, maintains independence, and improves quality of life. You'll enjoy permanently maintained strength with continued practice.",
                    hi: "दीर्घकालिक ताकत प्रशिक्षण उम्र से संबंधित मांसपेशियों के नुकसान को रोकता है, स्वतंत्रता बनाए रखता है और जीवन की गुणवत्ता में सुधार करता है। आप निरंतर अभ्यास के साथ स्थायी रूप से बनाए रखी गई ताकत का आनंद लेंगे।"
                }
            }
        };

        // Exercise video mappings for each category
        const exerciseVideos = {
            'joint-health': {
                "Neck Rolls": "video/greater40/nechroll.mp4",
                "Shoulder Rolls": "video/greater40/shoulder.mp4",
                "Wrist Circles": "video/greater40/wristl.mp4",
                "Elbow Bends": "video/greater40/elbow.mp4",
                "Hip Circles": "video/greater40/hipcircle.mp4",
                "Knee Lifts": "video/greater40/kneelift.mp4",
                "Ankle Circles": "video/greater40/ankle.mp4",
                "Toe Taps": "video/greater40/toe.mp4",
                "Finger Stretches": "video/greater40/finger.mp4",
                "Seated Leg Extensions": "video/greater40/seatlog.mp4"
            },
            'heart-health': {
                "Seated Marching": "video/greater40/seatmarch.mp4",
                "Arm Raises": "video/greater40/armraise.mp4",
                "Side Steps": "video/greater40/sidestep.mp4",
                "Heel Raises": "video/greater40/heelraise.mp4",
                "Toe Taps": "video/greater40/toe.mp4",
                "Seated Knee Lifts": "video/greater40/seatedknee.mp4",
                "Leg Streching": "video/greater40/legstreching.mp4",
                "Chair Squats": "video/greater40/chairsquat.mp4",
                "Standing Side Leg Lifts": "video/greater40/standingside.mp4",
                "Hip Marching": "video/greater40/hipmarching.mp4"
            },
            'flexibility': {
                "Neck Stretch": "video/greater40/neck.mp4",
                "Shoulder Stretch": "video/greater40/shoulder.mp4",
                "Seated Forward Bend": "video/greater40/seatedf.mp4",
                "Side Stretch": "video/greater40/sidestrech.mp4",
                "Seated Twist": "video/greater40/seatedtwist.mp4",
                "Ankle Stretch": "video/greater40/ankle.mp4",
                "Wrist Stretch": "video/greater40/wrist.mp4",
                "Seated Hamstring Stretch": "video/greater40/seatedhamstring.mp4",
                "Chest Opener": "video/greater40/chestopener.mp4",
                "Seated Figure Four": "video/greater40/seatedfour.mp4"
            },
            'balance': {
                "Heel-to-Toe Walk": "video/greater40/heel.mp4",
                "Single Leg Stand": "video/greater40/singleleg.mp4",
                "Seated Knee Lifts": "video/greater40/seatedknee.mp4",
                "Side Leg Lifts": "video/greater40/sideleg.mp4",
                "Toe Stand": "video/greater40/toestand.mp4",
                "Heel Stand": "video/greater40/heelstand.mp4",
                "Seated Marching": "video/greater40/seatmarch.mp4",
                "Chair Squats": "video/greater40/chairsquat.mp4",
                "Standing Side Leg Lifts": "video/standingside.mp4",
                "Seated Bicycle": "video/greater40/seatbicycle.mp4"
            },
            'strength': {
                "Chair Squats": "video/greater40/chairsquat.mp4",
                "Wall Push-ups": "video/greater40/wallpush.mp4",
                "Arm Raises": "video/greater40/armraise.mp4",
                "Leg Extensions": "video/greater40/seatleg.mp4",
                "Heel Raises": "video/greater40/toestand.mp4",
                "Seated Knee Lifts": "video/greater40/seatedknee.mp4",
                "Side Leg Lifts": "video/greater40/sideleg.mp4",
                "Seated Marching": "video/greater40/seatmarch.mp4",
                "Toe Taps": "video/greater40/toetap.mp4",
                "Heel Slides": "video/greater40/heelslide.mp4"
            }
        };

        // Generate exercise details for seniors
        function getExerciseDetails(category, day) {
            const icons = [
                "fa-running", "fa-people-arrows", "fa-walking", "fa-arrow-up", "fa-redo",
                "fa-people-carry", "fa-bed", "fa-heartbeat", "fa-dumbbell", "fa-fire"
            ];
            
            const durations = ["15 seconds", "20 seconds", "25 seconds", "30 seconds", "40 seconds"];
            
            const exerciseCategories = {
                'joint-health': [
                    "Neck Rolls", "Shoulder Rolls", "Wrist Circles", "Elbow Bends", 
                    "Hip Circles", "Knee Lifts", "Ankle Circles", "Toe Taps", 
                    "Finger Stretches", "Seated Leg Extensions"
                ],
                'heart-health': [
                    "Seated Marching", "Arm Raises", "Side Steps", "Heel Raises", 
                    "Toe Taps", "Seated Knee Lifts", "Leg Streching", "Chair Squats", 
                    "Standing Side Leg Lifts", "Hip Marching"
                ],
                'flexibility': [
                    "Neck Stretch", "Shoulder Stretch", "Seated Forward Bend", 
                    "Side Stretch", "Seated Twist", "Ankle Stretch", 
                    "Wrist Stretch", "Seated Hamstring Stretch", 
                    "Chest Opener", "Seated Figure Four"
                ],
                'balance': [
                    "Heel-to-Toe Walk", "Single Leg Stand", "Seated Knee Lifts", 
                    "Side Leg Lifts", "Toe Stand", "Heel Stand", 
                    "Seated Marching", "Chair Squats", "Standing Side Leg Lifts", 
                    "Seated Bicycle"
                ],
                'strength': [
                    "Chair Squats", "Wall Push-ups", "Arm Raises", 
                    "Leg Extensions", "Heel Raises", "Seated Knee Lifts", 
                    "Side Leg Lifts", "Seated Marching", "Toe Taps", 
                    "Heel Slides"
                ]
            };
            
            const exercises = [];
            const exerciseNames = exerciseCategories[category] || exerciseCategories['joint-health'];
            
            for (let i = 0; i < 8; i++) { // Reduced to 8 exercises for seniors
                const exerciseIndex = (day + i) % exerciseNames.length;
                const exerciseName = exerciseNames[exerciseIndex];
                const iconIndex = (day + i) % icons.length;
                const durIndex = Math.floor(Math.random() * durations.length);
                
                // Get the appropriate video for this exercise and category
                let video = exerciseVideos[category][exerciseName];
                
                exercises.push({
                    name: exerciseName,
                    icon: icons[iconIndex],
                    duration: durations[durIndex],
                    difficulty: "easy", // All exercises marked as easy for seniors
                    video: video,
                    instructions: {
                        en: `1. Start in a comfortable position for ${exerciseName}<br>2. Move slowly and gently<br>3. Maintain proper form throughout<br>4. Breathe steadily<br>5. Complete the recommended repetitions`,
                        hi: `1. ${exerciseName} के लिए आरामदायक स्थिति में शुरू करें<br>2. धीरे और आराम से आगे बढ़ें<br>3. पूरे समय उचित फॉर्म बनाए रखें<br>4. लगातार सांस लें<br>5. अनुशंसित पुनरावृत्ति पूरी करें`
                    },
                    completed: false
                });
            }
            
            return exercises;
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
                categorySection.style.borderLeft = '4px solid var(--senior)';
                
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
                localStorage.setItem('seniorFitUnlockedDays', JSON.stringify(state.unlockedDays));
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
                        <div class="exercise-name">${isRestDay ? restDayText : isLocked ? lockedText : `8 ${exercisesText}`}</div>
                        ${isRestDay ? 
                            `<div class="exercise-duration">${fullDayText}</div>` : 
                            isLocked ? '' :
                            `<div class="exercise-counter">${completedExercises}/8 ${completedText}</div>` +
                            '<div class="exercise-progress">' + 
                                Array(8).fill(0).map((_, i) => 
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
            
            detailExerciseNum.textContent = `${state.currentExercise + 1}/8`;
            
            // Set category benefits
            const benefits = categoryBenefits[state.category] || categoryBenefits['joint-health'];
            categoryBenefitsContent.innerHTML = benefits[state.currentLanguage];
            
            // Set exercise instructions
            instructionsContent.innerHTML = exercise.instructions ? 
                exercise.instructions[state.currentLanguage] : 
                "Instructions not available";
            
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
            localStorage.setItem('seniorFitProgress', JSON.stringify(state.progressData));
            
            // Check if we need to unlock the next day
            const currentUnlockedDay = getCurrentUnlockedDay();
            if (state.selectedDay === currentUnlockedDay) {
                // Unlock the next day
                state.unlockedDays[state.gender][state.category][state.month] = currentUnlockedDay + 1;
                localStorage.setItem('seniorFitUnlockedDays', JSON.stringify(state.unlockedDays));
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
        updateLanguageContent('en'); // Set initial language
        
        // Set up the current month
        const now = new Date();
        const currentMonth = now.toLocaleString('default', { month: 'long' }).toLowerCase();
        state.month = currentMonth;
    </script>
</body>
</html>