<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JuniorFit Wellness Hub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS variables */
        :root {
            --primary: #4CAF50; /* Green */
            --secondary: #8BC34A; /* Light Green */
            --accent: #FFC107; /* Amber */
            --light: #f8f9fa; /* Light color */
            --dark: #343a40; /* Dark color */
            --success: #28a745; /* Success color */
            --warning: #ffc107; /* Warning color */
            --danger: #dc3545; /* Danger color */
            --male: #2196F3; /* Blue (for boys) */
            --female: #E91E63; /* Pink (for girls) */
            --junior: #FFC107; /* Amber (for junior) */
            --easy: #4CAF50; /* Easy */
            --medium: #FFC107; /* Medium */
            --hard: #F44336; /* Hard */
        }
        
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #004d40, #388e3c, #004d40); /* Dark green gradient */
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
            border-left: 4px solid var(--junior);
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
            text-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
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
            box-shadow: 0 0 20px rgba(255, 193, 7, 0.5);
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
        
        .junior-icon {
            color: var(--junior);
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
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
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
            background: rgba(76, 175, 80, 0.3); /* Primary green with transparency */
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
            text-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
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
            <h1 id="app-title">JuniorFit Wellness Hub</h1>
            <p id="app-tagline">Fun and Active Programs for Teens Under 18</p>
            
            <div class="clock-container">
                <div id="current-time">00:00:00</div>
                <div id="current-date">Sunday, January 1, 2023</div>
            </div>
            
            <div class="lang-selector">
                <button class="lang-btn active" data-lang="en">EN</button>
                <button class="lang-btn" data-lang="hi">HI</button>
				<button class="lang-btn active" onclick="window.history.back()" data-lang="en" style="width:6rem;">Go Back</button>
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
                    <i class="fas fa-child gender-icon male-icon"></i>
                    <h3 id="male-title">Boy</h3>
                    <p id="male-desc">Active programs for boys under 18</p>
                </div>
                
                <div class="gender-card" data-gender="female">
                    <i class="fas fa-child-reaching gender-icon female-icon"></i>
                    <h3 id="female-title">Girl</h3>
                    <p id="female-desc">Active programs for girls under 18</p>
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
                <div class="category-card" data-category="full-body">
                    <i class="fas fa-heartbeat category-icon"></i>
                    <h3>Full Body</h3>
                    <p>Overall fitness and strength</p>
                </div>
                
                <div class="category-card" data-category="flexibility">
                    <i class="fas fa-child category-icon"></i>
                    <h3>Flexibility</h3>
                    <p>Improve range of motion</p>
                </div>
                
                <div class="category-card" data-category="cardio">
                    <i class="fas fa-running category-icon"></i>
                    <h3>Cardio</h3>
                    <p>Boost heart health</p>
                </div>
                
                <div class="category-card" data-category="core-strength">
                    <i class="fas fa-dumbbell category-icon"></i>
                    <h3>Core Strength</h3>
                    <p>Build strong abdominal muscles</p>
                </div>
                
                <div class="category-card" data-category="balance-coordination">
                    <i class="fas fa-brain category-icon"></i>
                    <h3>Balance & Coordination</h3>
                    <p>Improve stability and motor skills</p>
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
            
            <h2 class="section-title" id="current-month">July 2023 - Full Body</h2>
            
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
                                <div class="detail-value" id="detail-exercise-num">1/6</div>
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-info-circle"></i>
                                <h3 id="benefits-title">Benefits</h3>
                            </div>
                            <div class="section-content" id="category-benefits-content">
                                <!-- Benefits content will load here -->
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-list-ol"></i>
                                <h3 id="instructions-title">How To Do</h3>
                            </div>
                            <div class="section-content" id="instructions-content">
                                <!-- Instructions content will load here -->
                            </div>
                        </div>
                        
                        <div class="content-section">
                            <div class="section-heading">
                                <i class="fas fa-chart-line"></i>
                                <h3 id="benefits-title-2">Long-Term Benefits</h3>
                            </div>
                            <div class="section-content" id="long-term-content">
                                <!-- Long-term benefits content will load here -->
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
            <p id="footer-text">Fun and Active Programs for Teens Under 18</p>
            <p id="footer-quote">Move your body, grow your mind!</p>
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
            progressData: JSON.parse(localStorage.getItem('juniorFitProgress')) || {}, // Load progress data from localStorage
            unlockedDays: JSON.parse(localStorage.getItem('juniorFitUnlockedDays')) || {} // Load unlocked days from localStorage
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
                appTitle: "JuniorFit Wellness Hub",
                appTagline: "Fun and Active Programs for Teens Under 18",
                genderTitle: "Select Your Gender",
                maleTitle: "Boy",
                maleDesc: "Active programs for boys under 18",
                femaleTitle: "Girl",
                femaleDesc: "Active programs for girls under 18",
                backToGender: "Back to Gender Selection",
                categoryTitle: "Select Your Fitness Goal",
                backToCategory: "Back to Categories",
                monthTitle: "Select Month",
                backToMonth: "Back to Month Selection",
                footerText: "Fun and Active Programs for Teens Under 18",
                footerQuote: "Move your body, grow your mind!",
                benefitsTitle: "Benefits",
                durationLabel: "Duration",
                difficultyLabel: "Difficulty",
                dayLabel: "Day",
                exerciseLabel: "Exercise",
                instructionsTitle: "How To Do",
                benefitsTitle2: "Long-Term Benefits",
                progressTitle: "Progress",
                todaysExercisesTitle: "Today's Exercises",
                startText: "Start",
                pauseText: "Pause",
                nextText: "Next",
                fullscreenText: "Fullscreen"
            },
            hi: {
                appTitle: "जूनियरफिट वेलनेस हब",
                appTagline: "18 वर्ष से कम उम्र के किशोरों के लिए मजेदार और सक्रिय कार्यक्रम",
                genderTitle: "अपना लिंग चुनें",
                maleTitle: "लड़का",
                maleDesc: "18 वर्ष से कम उम्र के लड़कों के लिए सक्रिय कार्यक्रम",
                femaleTitle: "लड़की",
                femaleDesc: "18 वर्ष से कम उम्र की लड़कियों के लिए सक्रिय कार्यक्रम",
                backToGender: "लिंग चयन पर वापस जाएं",
                categoryTitle: "अपना फिटनेस लक्ष्य चुनें",
                backToCategory: "श्रेणियों पर वापस जाएं",
                monthTitle: "महीना चुनें",
                backToMonth: "महीना चयन पर वापस जाएं",
                footerText: "18 वर्ष से कम उम्र के किशोरों के लिए मजेदार और सक्रिय कार्यक्रम",
                footerQuote: "अपने शरीर को हिलाओ, अपने दिमाग को बढ़ाओ!",
                benefitsTitle: "लाभ",
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
            'full-body': { en: "Full Body", hi: "पूर्ण शरीर" },
            'flexibility': { en: "Flexibility", hi: "लचीलापन" },
            'cardio': { en: "Cardio", hi: "कार्डियो" },
            'core-strength': { en: "Core Strength", hi: "कोर स्ट्रेंथ" },
            'balance-coordination': { en: "Balance & Coordination", hi: "संतुलन और समन्वय" }
        };

        // Category descriptions in both languages
        const categoryDescriptions = {
            'full-body': {
                en: "Overall fitness and strength",
                hi: "समग्र फिटनेस और ताकत"
            },
            'flexibility': {
                en: "Improve range of motion",
                hi: "गति की सीमा में सुधार करें"
            },
            'cardio': {
                en: "Boost heart health",
                hi: "हृदय स्वास्थ्य को बढ़ावा दें"
            },
            'core-strength': {
                en: "Build strong abdominal muscles",
                hi: "मजबूत पेट की मांसपेशियों का निर्माण करें"
            },
            'balance-coordination': {
                en: "Improve stability and motor skills",
                hi: "स्थिरता और मोटर कौशल में सुधार करें"
            }
        };

        // Month names in both languages
        const monthNames = {
            en: {
                january: "January", february: "February", march: "March", april: "April", may: "May", june: "June",
                july: "July", august: "August", september: "September", october: "October", november: "November", december: "December"
            },
            hi: {
                january: "जनवरी", february: "फरवरी", march: "मार्च", april: "अप्रैल", may: "मई", june: "जून",
                july: "जुलाई", august: "अगस्त", september: "सितंबर", october: "अक्टूबर", november: "नवंबर", december: "दिसंबर"
            }
        };

        // Category benefits mapping
        const categoryBenefits = {
            'full-body': {
                en: "These exercises work all major muscle groups, improving overall strength, coordination, and posture. Perfect for teenagers in their growth phase.",
                hi: "ये व्यायाम सभी प्रमुख मांसपेशी समूहों पर काम करते हैं, समग्र शक्ति, समन्वय और मुद्रा में सुधार करते हैं। विकास चरण में किशोरों के लिए बिल्कुल सही।",
                longTerm: {
                    en: "Regular full-body workouts lead to balanced muscle development, better metabolism, and improved physical performance in daily activities.",
                    hi: "नियमित पूर्ण-शरीर वर्कआउट से संतुलित मांसपेशियों का विकास, बेहतर चयापचय और दैनिक गतिविधियों में बेहतर शारीरिक प्रदर्शन होता है।"
                }
            },
            'flexibility': {
                en: "These exercises enhance your range of motion, reduce muscle stiffness, and help prevent injuries. Great for growing teenagers.",
                hi: "ये व्यायाम आपकी गति की सीमा को बढ़ाते हैं, मांसपेशियों की जकड़न को कम करते हैं और चोटों को रोकने में मदद करते हैं। बढ़ते किशोरों के लिए बहुत अच्छा।",
                longTerm: {
                    en: "Consistent flexibility training improves posture, reduces back pain, and enhances performance in sports and other physical activities.",
                    hi: "निरंतर लचीलापन प्रशिक्षण मुद्रा में सुधार करता है, पीठ दर्द को कम करता है और खेल और अन्य शारीरिक गतिविधियों में प्रदर्शन को बढ़ाता है।"
                }
            },
            'cardio': {
                en: "These activities boost heart health, increase stamina, and improve overall energy levels. Essential for healthy teenage development.",
                hi: "ये गतिविधियाँ हृदय स्वास्थ्य को बढ़ावा देती हैं, सहनशक्ति बढ़ाती हैं और समग्र ऊर्जा स्तर में सुधार करती हैं। स्वस्थ किशोर विकास के लिए आवश्यक।",
                longTerm: {
                    en: "Regular cardio exercise strengthens the heart, improves lung capacity, and helps maintain a healthy weight throughout life.",
                    hi: "नियमित कार्डियो व्यायाम हृदय को मजबूत करता है, फेफड़ों की क्षमता में सुधार करता है और जीवन भर स्वस्थ वजन बनाए रखने में मदद करता है।"
                }
            },
            'core-strength': {
                en: "These exercises target your abdominal muscles, lower back, and pelvis to build a strong core foundation. Important for growing teens.",
                hi: "ये व्यायाम आपकी पेट की मांसपेशियों, निचली पीठ और श्रोणि को मजबूत कोर नींव बनाने के लिए लक्षित करते हैं। बढ़ते किशोरों के लिए महत्वपूर्ण।",
                longTerm: {
                    en: "A strong core improves posture, prevents back pain, enhances athletic performance, and supports overall body strength.",
                    hi: "एक मजबूत कोर मुद्रा में सुधार करता है, पीठ दर्द को रोकता है, एथलेटिक प्रदर्शन को बढ़ाता है और समग्र शरीर की ताकत का समर्थन करता है।"
                }
            },
            'balance-coordination': {
                en: "These exercises improve stability, body awareness, and coordination skills. Essential for teens developing motor skills.",
                hi: "ये व्यायाम स्थिरता, शरीर की जागरूकता और समन्वय कौशल में सुधार करते हैं। मोटर कौशल विकसित करने वाले किशोरों के लिए आवश्यक।",
                longTerm: {
                    en: "Good balance and coordination reduce injury risk, improve sports performance, and enhance daily movement efficiency.",
                    hi: "अच्छा संतुलन और समन्वय चोट के जोखिम को कम करता है, खेल प्रदर्शन में सुधार करता है और दैनिक आंदोलन दक्षता को बढ़ाता है।"
                }
            }
        };

        // Exercise details for teenagers under 18
        function getExerciseDetails(category, day) {
            // Exercise video URLs - using simple animations suitable for teens
            const exerciseVideos = {
                "Jumping Jacks": "video/less18/jumpingjack.mp4",
                "Arm Circles": "video/less18/armcircle.mp4",
                "Bodyweight Squats": "video/less18/bodysquat1.mp4",
                "Lunges": "video/less18/.mp4",
                "Push-ups (Knee)": "video/less18/pushup.mp4",
                "Plank": "video/less18/plank.mp4",
                "Leg Raises": "video/less18/legraise.mp4",
                "Superman": "video/less18/superman.mp4",
                "Standing Toe Touch": "video/less18/toetouch.mp4",
                "Side Stretch": "video/less18/sidestretch.mp4",
                "Neck Rolls": "video/less18/neckroll.mp4",
                "Butterfly Stretch": "video/less18/butterfly.mp4",
                "Jog in Place": "video/less18/join.mp4",
                "High Knees": "video/less18/highknee.mp4",
                "Butt Kicks": "video/less18/buttkick.mp4",
                "Bicycle Crunches": "video/less18/bicycle.mp4",
                "Russian Twists": "video/less18/russiantwist.mp4",
                "Leg Cross Crunches": "video/legcross.mp4",
                "Flutter Kicks": "video/less18/flutter.mp4",
                "Single Leg Stand": "video/less18/legstand.mp4",
                "Heel-to-Toe Walk": "video/less18/heeltoe.mp4",
                "Side Leg Raises": "video/less18/sideleg.mp4",
                "Standing March": "video/less18/standingmarch.mp4"
            };
            
            // Exercise icons
            const icons = [
                "fa-running", "fa-child", "fa-heartbeat", "fa-dumbbell", "fa-brain",
                "fa-star", "fa-leaf", "fa-wind", "fa-gamepad", "fa-paint-brush"
            ];
            
            // Exercise durations
            const durations = ["30 seconds", "45 seconds", "1 minute"];
            
            // Collection of exercises by category
            const exerciseCategories = {
                'full-body': [
                    "Jumping Jacks", "Bodyweight Squats", "Push-ups (Knee)", 
                    "Plank", "Leg Raises", "Superman"
                ],
                'flexibility': [
                    "Standing Toe Touch", "Side Stretch", "Neck Rolls", 
                    "Butterfly Stretch", "Arm Circles", "Bodyweight Squats"
                ],
                'cardio': [
                    "Jog in Place", "Jumping Jacks", "High Knees", 
                    "Butt Kicks", "Arm Circles", "Bodyweight Squats"
                ],
                'core-strength': [
                    "Plank", "Bicycle Crunches", "Russian Twists",
                    "Leg Cross Crunches", "Flutter Kicks", "Leg Raises"
                ],
                'balance-coordination': [
                    "Single Leg Stand", "Heel-to-Toe Walk", "Side Leg Raises",
                    "Standing March", "Bodyweight Squats", "Arm Circles"
                ]
            };
            
            const exercises = [];
            // Use selected category's exercise names, fallback to 'full-body' if not available
            const exerciseNames = exerciseCategories[category] || exerciseCategories['full-body'];
            
            for (let i = 0; i < 6; i++) { // 6 exercises per day (reduced from 8)
                const exerciseIndex = (day + i) % exerciseNames.length;
                const exerciseName = exerciseNames[exerciseIndex];
                const iconIndex = (day + i) % icons.length;
                const durIndex = Math.floor(Math.random() * durations.length);
                
                // Use specific video if available, otherwise use a default teen-friendly video
                let video = exerciseVideos[exerciseName]; 
                
                exercises.push({
                    name: exerciseName,
                    icon: icons[iconIndex],
                    duration: durations[durIndex],
                    difficulty: "easy", // All exercises marked as easy for this age group
                    video: video,
                    instructions: {
                        en: `1. Start in a comfortable position<br>2. Follow the movement in the video<br>3. Breathe normally throughout<br>4. Maintain good posture<br>5. Stop if you feel any pain`,
                        hi: `1. एक आरामदायक स्थिति में शुरू करें<br>2. वीडियो में दिखाए गए आंदोलन का पालन करें<br>3. पूरे समय सामान्य रूप से सांस लें<br>4. अच्छी मुद्रा बनाए रखें<br>5. यदि आपको कोई दर्द महसूस हो तो रुक जाएं`
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
                
                categorySection.style.borderLeft = '4px solid var(--junior)';
                
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
                
                updateCurrentMonthDisplay();
                
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
            
            document.querySelectorAll('.month-btn').forEach(btn => {
                if (btn.dataset.month === currentMonth) {
                    btn.classList.add('active');
                }
            });
        }

        // Get days in month
        function getDaysInMonth(month) {
            const months = {
                'january': 31, 'february': (state.currentYear % 4 === 0) ? 29 : 28, 'march': 31,
                'april': 30, 'may': 31, 'june': 30, 'july': 31, 'august': 31,
                'september': 30, 'october': 31, 'november': 30, 'december': 31
            };
            return months[month] || 31;
        }

        // Get current unlocked day for the selected gender, category, and month
        function getCurrentUnlockedDay() {
            if (!state.unlockedDays[state.gender]) state.unlockedDays[state.gender] = {};
            if (!state.unlockedDays[state.gender][state.category]) state.unlockedDays[state.gender][state.category] = {};
            if (!state.unlockedDays[state.gender][state.category][state.month]) {
                state.unlockedDays[state.gender][state.category][state.month] = 1; // Set to day 1 by default
                localStorage.setItem('juniorFitUnlockedDays', JSON.stringify(state.unlockedDays));
            }
            return state.unlockedDays[state.gender][state.category][state.month];
        }

        // Get progress data for the current selection
        function getCurrentProgress() {
            if (!state.progressData[state.gender]) state.progressData[state.gender] = {};
            if (!state.progressData[state.gender][state.category]) state.progressData[state.gender][state.category] = {};
            if (!state.progressData[state.gender][state.category][state.month]) state.progressData[state.gender][state.category][state.month] = {};
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
            
            const currentUnlockedDay = getCurrentUnlockedDay();
            const monthProgress = getCurrentProgress();
            
            for (let day = 1; day <= state.daysInMonth; day++) {
                const isRestDay = day % 7 === 0;
                const isLocked = day > currentUnlockedDay && !isRestDay;
                
                const dayCard = document.createElement('div');
                dayCard.className = `day-card ${isRestDay ? "rest-day" : ""} ${isLocked ? "locked" : ""}`;
                dayCard.dataset.day = day;
                
                const dayProgress = monthProgress[day];
                const completedExercises = dayProgress ? dayProgress.filter(ex => ex.completed).length : 0;
                
                dayCard.innerHTML = `
                    <div class="day-header">
                        <div class="day-number">${dayText} ${day}</div>
                    </div>
                    <div class="day-content">
                        <i class="fas ${isRestDay ? "fa-bed" : "fa-child"} exercise-icon"></i>
                        <div class="exercise-name">${isRestDay ? restDayText : isLocked ? lockedText : `6 ${exercisesText}`}</div>
                        ${isRestDay ? 
                            `<div class="exercise-duration">${fullDayText}</div>` : 
                            isLocked ? '' :
                            `<div class="exercise-counter">${completedExercises}/6 ${completedText}</div>` +
                            '<div class="exercise-progress">' + 
                                Array(6).fill(0).map((_, i) => 
                                    `<div class="exercise-dot ${i < completedExercises ? 'completed' : ''}"></div>`
                                ).join('') +
                            '</div>'
                        }
                    </div>
                `;
                
                if (!isRestDay && !isLocked) {
                    dayCard.addEventListener('click', () => {
                        state.selectedDay = day;
                        const dayData = monthProgress[day];
                        if (dayData) {
                            state.exercises = dayData;
                        } else {
                            state.exercises = getExerciseDetails(state.category, day);
                            monthProgress[day] = state.exercises; // Save generated exercises
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
            const exercise = state.exercises[state.currentExercise];
            updateExerciseModal(exercise, day);
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
            
            const dayText = state.currentLanguage === 'en' ? 'Day' : 'दिन';
            detailDay.textContent = `${dayText} ${day}`;
            
            detailExerciseNum.textContent = `${state.currentExercise + 1}/6`;
            
            const benefits = categoryBenefits[state.category] || categoryBenefits['full-body'];
            categoryBenefitsContent.innerHTML = benefits[state.currentLanguage];
            instructionsContent.innerHTML = exercise.instructions ? exercise.instructions[state.currentLanguage] : (state.currentLanguage === 'en' ? "Instructions not available" : "निर्देश उपलब्ध नहीं हैं");
            longTermContent.innerHTML = benefits.longTerm[state.currentLanguage];
            
            if (exercise.video) {
                exerciseVideo.src = exercise.video;
                exerciseVideo.load();
                exerciseVideo.style.display = 'block';
                document.getElementById('fullscreen-btn').style.display = 'block';
            } else {
                exerciseVideo.style.display = 'none';
                document.getElementById('fullscreen-btn').style.display = 'none';
            }
            
            exerciseProgressEl.innerHTML = '';
            state.exercises.forEach((ex, index) => {
                const dot = document.createElement('div');
                dot.className = 'exercise-dot';
                if (ex.completed) dot.classList.add('completed');
                if (index === state.currentExercise) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    state.currentExercise = index;
                    updateExerciseModal(state.exercises[state.currentExercise], day);
                });
                exerciseProgressEl.appendChild(dot);
            });
            
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
                item.addEventListener('click', () => {
                    state.currentExercise = index;
                    updateExerciseModal(state.exercises[state.currentExercise], day);
                });
                exerciseListEl.appendChild(item);
            });
            
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
            pauseTimer();
            state.exercises[state.currentExercise].completed = true;
            
            const monthProgress = getCurrentProgress();
            monthProgress[state.selectedDay] = state.exercises;
            localStorage.setItem('juniorFitProgress', JSON.stringify(state.progressData));
            
            const allExercisesCompletedForDay = state.exercises.every(ex => ex.completed);
            
            if (allExercisesCompletedForDay) {
                const currentUnlockedDay = getCurrentUnlockedDay();
                if (state.selectedDay === currentUnlockedDay) {
                    state.unlockedDays[state.gender][state.category][state.month] = currentUnlockedDay + 1;
                    localStorage.setItem('juniorFitUnlockedDays', JSON.stringify(state.unlockedDays));
                }
                alert(state.currentLanguage === 'en' ? 
                    'Congratulations! You have completed all exercises for today!' : 
                    'बधाई हो! आपने आज के सभी व्यायाम पूरे कर लिए हैं!');
                
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                generateCalendar(); // Refresh calendar to show progress
            } else {
                const nextExerciseIndex = state.currentExercise + 1;
                if (nextExerciseIndex < state.exercises.length) {
                    state.currentExercise = nextExerciseIndex;
                    updateExerciseModal(state.exercises[state.currentExercise], state.selectedDay);
                } else {
                    // This scenario should only be reached if someone completes an exercise without manually going to next
                    // or if they clicked "Next" on the last exercise of the day
                    alert(state.currentLanguage === 'en' ? 
                        'You have completed all exercises for today!' : 
                        'आपने आज के सभी व्यायाम पूरे कर लिए हैं!');
                    
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                    generateCalendar();
                }
            }
        }
        
        function nextExercise() {
            // Check if current exercise is completed, if not, complete it before moving on
            if (!state.exercises[state.currentExercise].completed) {
                markExerciseCompleted(); // This will also go to next if not all for day are completed
            } else {
                const nextExerciseIndex = state.currentExercise + 1;
                if (nextExerciseIndex < state.exercises.length) {
                    state.currentExercise = nextExerciseIndex;
                    updateExerciseModal(state.exercises[state.currentExercise], state.selectedDay);
                } else {
                    alert(state.currentLanguage === 'en' ? 
                        'You have completed all exercises for today!' : 
                        'आपने आज के सभी व्यायाम पूरे कर लिए हैं!');
                    
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                    generateCalendar();
                }
            }
        }

        // Close modal
        document.querySelector('.close-btn').addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            if (exerciseVideo) exerciseVideo.pause();
            pauseTimer();
            generateCalendar(); // Refresh calendar on close to show progress
        });

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                if (exerciseVideo) exerciseVideo.pause();
                pauseTimer();
                generateCalendar(); // Refresh calendar on close to show progress
            }
        });

        // Language switching
        langButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const lang = this.dataset.lang;
                
                langButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                state.currentLanguage = lang;
                
                updateLanguageContent(lang);
                
                if (calendarSection.classList.contains('active-section')) {
                    updateCurrentMonthDisplay();
                    generateCalendar();
                }
                
                if (modal.style.display === 'block') {
                    updateExerciseModal(state.exercises[state.currentExercise], state.selectedDay);
                }
            });
        });
        
        // Update all text content based on language
        function updateLanguageContent(lang) {
            const content = languageContent[lang];
            
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
            
            document.querySelectorAll('.category-card').forEach(card => {
                const category = card.dataset.category;
                const title = card.querySelector('h3');
                const desc = card.querySelector('p');
                
                title.textContent = categoryNames[category][lang];
                desc.textContent = categoryDescriptions[category][lang];
            });
            
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
        
        // Set up the current month (this ensures state.month is always set on load)
        const now = new Date();
        const currentMonth = now.toLocaleString('default', { month: 'long' }).toLowerCase();
        state.month = currentMonth;
                // JavaScript to ensure the back button works
        document.querySelector('.back-button').addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>
</html>