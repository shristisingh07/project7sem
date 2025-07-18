<?php
	session_start();
	require 'db_connect.php';
	$error = '';
	$showLogin = true;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['login'])) {
			$email = $conn->real_escape_string($_POST['email']);
			$password = $conn->real_escape_string($_POST['password']);

			$stmt = $conn->prepare("SELECT id, name, password, is_premium FROM users WHERE email = ?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();


			if ($result->num_rows === 1) {
				$user = $result->fetch_assoc();
				if (password_verify($password, $user['password'])) {
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['user_name'] = $user['name'];
					$_SESSION['is_premium'] = $user['is_premium'];
					$_SESSION['user_email'] = $user['email'];
					
					// Redirect premium users to userpanel.php
					if ($user['is_premium'] == 1) {
						header("Location: userpanel.php");
					} else {
						header("Location: dashboard.php");
					}
					exit();
				} else {
					$error = "Invalid password!";
				}
			} else {
				$error = "User not found!";
				$showLogin = false;
			}
			$stmt->close();
		} elseif (isset($_POST['signup'])) {
			$name = $conn->real_escape_string($_POST['user_name']);
			$email = $conn->real_escape_string($_POST['user_email']);
			// Fixed password hashing
			$password =$conn->real_escape_string($_POST['password'], PASSWORD_DEFAULT);
			
			// Phone number validation
			$phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
			
			if(empty($phone)) {
				$error = "Invalid phone number!";
				$showLogin = false;
			} elseif(strlen($phone) > 15) {
				$error = "Phone number too long!";
				$showLogin = false;
			} else {
				$stmt = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
				$stmt->bind_param("ssss", $name, $email, $password, $phone);

				if ($stmt->execute()) {
					$error = "Signup successful! Please login";
					$showLogin = true;
				} else {
					$error = "Signup failed: " . $stmt->error;
					error_log("Database error: " . $stmt->error);
					$showLogin = false;
				}
				$stmt->close();
			}
		}
	}

	if (isset($_GET['section']) && $_GET['section'] === 'premium') {
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_premium']) || $_SESSION['is_premium'] != 1) {
			header("Location: payment.php"); // Redirect to payment if not premium
			exit();
		}
	}

	try {
		$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
		$stmt->bind_param("i", $_SESSION['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		$stmt->close();
		
		if (!$user) {
			header("Location: dashboard.php");
			throw new Exception("User not found!");
		}
	} catch(Exception $e) {
		$conn->close();
		die("Error: " . $e->getMessage());
	}

	// Handle form submissions
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_reminder'])) {
			$medicine_name = $_POST['medicine_name'];
			$dosage = $_POST['dosage'];
			$time = $_POST['time'];
			$frequency = $_POST['frequency'];
			
			$stmt = $conn->prepare("INSERT INTO medicine_reminders 
				(user_id, medicine_name, dosage, time, frequency) 
				VALUES (?, ?, ?, ?, ?)");
			$stmt->bind_param("issss", $_SESSION['user_id'], $medicine_name, $dosage, $time, $frequency);
			$stmt->execute();
			$stmt->close();
			
			$_SESSION['success'] = "Medicine reminder added successfully!";
			sendMedicineNotification($_SESSION['user_id'], $medicine_name, $dosage, $time, $frequency);
			header("Location: userpanel.php?section=medicine");
			exit();
		}
		
		if (isset($_POST['delete_reminder'])) {
			$reminder_id = $_POST['reminder_id'];
			
			$stmt = $conn->prepare("DELETE FROM medicine_reminders WHERE id = ? AND user_id = ?");
			$stmt->bind_param("ii", $reminder_id, $_SESSION['user_id']);
			$stmt->execute();
			$stmt->close();
			
			$_SESSION['success'] = "Reminder deleted successfully!";
			header("Location: userpanel.php?section=medicine");
			exit();
		}
	}

	function sendMedicineNotification($user_id, $medicine, $dosage, $time, $frequency) {
		global $conn;
		
		// Get user details
		$stmt = $conn->prepare("SELECT email, phone FROM users WHERE id = ?");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$user = $stmt->get_result()->fetch_assoc();
		$stmt->close();
		
		if (!$user) return;
		
		// Prepare message
		$message = "VitaCare Medicine Reminder:\n";
		$message .= "Medicine: $medicine\n";
		$message .= "Dosage: $dosage\n";
		$message .= "Time: " . date('h:i A', strtotime($time)) . "\n";
		$message .= "Frequency: " . ucfirst($frequency);
		
		// Send email
		if (!empty($user['email'])) {
			$subject = "VitaCare: Medicine Reminder Added";
			$headers = "From: reminders@vitacare.com";
			mail($user['email'], $subject, $message, $headers);
		}
		
		// Send WhatsApp (simulated)
		if (!empty($user['phone'])) {
			logWhatsAppNotification($user['phone'], $message);
		}
	}

	function logWhatsAppNotification($phone, $message) {
		$logFile = 'whatsapp.log';
		$logEntry = "[" . date('Y-m-d H:i:s') . "] To: $phone\nMessage: $message\n\n";
		file_put_contents($logFile, $logEntry, FILE_APPEND);
	}

	// Get all reminders for the user
	$reminders = [];
	$stmt = $conn->prepare("SELECT * FROM medicine_reminders WHERE user_id = ?");
	$stmt->bind_param("i", $_SESSION['user_id']);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		$reminders[] = $row;
	}
	$stmt->close();

	// Determine active section from URL parameter
	$active_section = isset($_GET['section']) ? $_GET['section'] : 'dashboard';

	$conn->close();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
		<title>विtaCare Premium User Panel</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
		<style>
			:root {
				--primary-color: #764ba2;
				--secondary-color: #667eea;
				--sidebar-width: 250px;
			}

			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			}

			body {
				background: #f8f9fa;
				display: flex;
				min-height: 100vh;
				background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
			background-size: 400% 400%;
			animation: gradient 15s ease infinite;
			min-height: 100vh;
			}
			.sound-btn {
		position: fixed;
		bottom: 20px;
		right: 20px;
		z-index: 1000;
		padding: 10px 15px;
		background: var(--primary-color);
		color: white;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		box-shadow: 0 3px 10px rgba(0,0,0,0.2);
	}

			.sidebar {
				width: var(--sidebar-width);
				background: white;
				box-shadow: 0 0 10px rgba(0,0,0,0.1);
				padding: 1.5rem 0;
				position: fixed;
				height: 100vh;
				transition: transform 0.3s ease;
				z-index: 100;
			}

			.sidebar.hidden {
				transform: translateX(-100%);
			}

			.sidebar-header {
				padding: 0 1.5rem 1.5rem;
				border-bottom: 1px solid #eee;
			}

			.brand {
				font-size: 1.5rem;
				font-weight: 600;
				color: var(--primary-color);
			}

			.sidebar-menu {
				list-style: none;
				margin-top: 1.5rem;
			}

			.menu-item {
				padding: 0.8rem 1.5rem;
				display: flex;
				align-items: center;
				gap: 1rem;
				color: #555;
				text-decoration: none;
				transition: all 0.3s;
				cursor: pointer;
			}

			.menu-item:hover, .menu-item.active {
				background-color: #f0f0ff;
				color: var(--primary-color);
			}

			.menu-item i {
				width: 20px;
				text-align: center;
			}

			.submenu {
				list-style: none;
				margin-left: 30px;
				display: none;
			}

			.submenu.show {
				display: block;
			}

			.main-content {
				flex: 1;
				margin-left: var(--sidebar-width);
				padding: 2rem;
				transition: margin-left 0.3s ease;
			}

			.main-content.full-width {
				margin-left: 0;
			}

			.header {
				background: white;
				padding: 1rem 2rem;
				border-radius: 10px;
				box-shadow: 0 2px 10px rgba(0,0,0,0.05);
				margin-bottom: 2rem;
			}

			.welcome-text {
				font-size: 2rem;
				color: var(--primary-color);
				margin-bottom: 0.5rem;
			}

			.section-title {
				font-size: 1.5rem;
				color: var(--secondary-color);
				margin-bottom: 1.5rem;
				padding-bottom: 0.5rem;
				border-bottom: 2px solid #eee;
			}

			.dashboard-grid {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
				gap: 2rem;
			}

			.dashboard-card {
				background: white;
				padding: 1.5rem;
				border-radius: 10px;
				box-shadow: 0 5px 15px rgba(0,0,0,0.05);
			}

			.card-header {
				display: flex;
				align-items: center;
				gap: 1rem;
				margin-bottom: 1.5rem;
			}

			.card-icon {
				width: 40px;
				height: 40px;
				border-radius: 8px;
				background: var(--primary-color);
				color: white;
				display: flex;
				align-items: center;
				justify-content: center;
			}

			.card-title {
				font-size: 1.2rem;
				color: var(--primary-color);
			}

			.card-content {
				color: #555;
				line-height: 1.6;
			}

			.btn {
				display: inline-block;
				padding: 0.8rem 1.5rem;
				background: var(--primary-color);
				color: white;
				text-decoration: none;
				border-radius: 5px;
				margin-top: 1rem;
				transition: all 0.3s;
				border: none;
				cursor: pointer;
			}

			.btn:hover {
				background: var(--secondary-color);
			}

			.btn-delete {
				background: #e74c3c;
			}

			.btn-delete:hover {
				background: #c0392b;
			}

			.content-section {
				display: none;
			}

			.content-section.active {
				display: block;
			}

			.medicine-list {
				list-style: none;
				margin-top: 1rem;
			}

			.medicine-item {
				padding: 1rem;
				background: white;
				border-radius: 8px;
				margin-bottom: 1rem;
				box-shadow: 0 2px 5px rgba(0,0,0,0.05);
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.medicine-info {
				flex: 1;
			}

			.medicine-name {
				font-weight: 600;
				color: var(--primary-color);
			}

			.medicine-time {
				color: #777;
				font-size: 0.9rem;
			}

			.form-group {
				margin-bottom: 1.5rem;
			}

			.form-group label {
				display: block;
				margin-bottom: 0.5rem;
				font-weight: 600;
				color: #555;
			}

			.form-group input, 
			.form-group select, 
			.form-group textarea {
				width: 100%;
				padding: 0.8rem;
				border: 1px solid #ddd;
				border-radius: 5px;
				font-size: 1rem;
			}

			.workout-category {
				margin-bottom: 2rem;
			}
			.recipe-category {
				margin-bottom: 2rem;
			}

			.workout-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
				gap: 1.5rem;
			}
			.recipe-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
				gap: 1.5rem;
			}

			.workout-card {
				background: white;
				border-radius: 8px;
				overflow: hidden;
				box-shadow: 0 3px 10px rgba(0,0,0,0.1);
			}
			.recipe-card {
				background: white;
				border-radius: 8px;
				overflow: hidden;
				box-shadow: 0 3px 10px rgba(0,0,0,0.1);
			}

			.workout-image {
				height: 150px;
				background: linear-gradient(to right, #667eea, #764ba2);
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-size: 3rem;
			}
			.recipe-image {
				height: 150px;
				background: linear-gradient(to right, #667eea, #764ba2);
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-size: 3rem;
			}

			.workout-content {
				padding: 1.2rem;
			}
			.recipe-content {
				padding: 1.2rem;
			}

			.chat-container {
				background: white;
				border-radius: 10px;
				box-shadow: 0 5px 15px rgba(0,0,0,0.05);
				padding: 1.5rem;
				height: 500px;
				display: flex;
				flex-direction: column;
			}

			.chat-messages {
				flex: 1;
				overflow-y: auto;
				padding: 1rem;
				border: 1px solid #eee;
				border-radius: 8px;
				margin-bottom: 1rem;
			}

			.message {
				margin-bottom: 1rem;
				max-width: 80%;
			}

			.message.user {
				margin-left: auto;
				text-align: right;
			}

			.message-bubble {
				padding: 0.8rem 1.2rem;
				border-radius: 18px;
				display: inline-block;
			}

			.message.bot .message-bubble {
				background: #f0f0ff;
				border-bottom-left-radius: 5px;
			}

			.message.user .message-bubble {
				background: var(--primary-color);
				color: white;
				border-bottom-right-radius: 5px;
			}

			.chat-input {
				display: flex;
				gap: 1rem;
			}

			.chat-input input {
				flex: 1;
				padding: 0.8rem;
				border: 1px solid #ddd;
				border-radius: 25px;
			}

			.chat-input button {
				background: var(--primary-color);
				color: white;
				border: none;
				width: 45px;
				height: 45px;
				border-radius: 50%;
				cursor: pointer;
			}
			
			/* Alarm modal styles */
			.alarm-modal {
				display: none;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-color: rgba(0,0,0,0.7);
				z-index: 10000;
				align-items: center;
				justify-content: center;
			}
			
			.alarm-content {
				background: white;
				border-radius: 15px;
				padding: 2rem;
				text-align: center;
				width: 400px;
				max-width: 90%;
				position: relative;
			}
			
			.alarm-title {
				color: var(--primary-color);
				font-size: 1.8rem;
				margin-bottom: 1.5rem;
			}
			
			.alarm-medicine {
				font-size: 1.5rem;
				font-weight: bold;
				color: #e74c3c;
				margin-bottom: 1rem;
			}
			
			.alarm-time {
				font-size: 1.2rem;
				margin-bottom: 1.5rem;
			}
			
			.alarm-animation {
				font-size: 4rem;
				margin: 1.5rem 0;
				animation: shake 0.5s infinite;
			}
			
			@keyframes shake {
				0% { transform: translateX(0); }
				25% { transform: translateX(-10px); }
				50% { transform: translateX(10px); }
				75% { transform: translateX(-10px); }
				100% { transform: translateX(0); }
			}
			
			.alarm-snooze {
				margin-top: 1.5rem;
			}
			
			.snooze-btn {
				background: #3498db;
				margin-right: 1rem;
			}
			
			.dismiss-btn {
				background: #2ecc71;
			}
			
				/* Add background animation */
		body {
			
		}

		@keyframes gradient {
			0% { background-position: 0% 50%; }
			50% { background-position: 100% 50%; }
			100% { background-position: 0% 50%; }
		}
		
		/* Animation for workout cards */
		.workout-card {
			transition: all 0.3s ease;
			transform: translateY(0);
		}
		.recipe-card {
			transition: all 0.3s ease;
			transform: translateY(0);
		}
		
		.workout-card:hover {
			transform: translateY(-10px);
			box-shadow: 0 10px 20px rgba(0,0,0,0.15);
		}
		.recipe-card:hover {
			transform: translateY(-10px);
			box-shadow: 0 10px 20px rgba(0,0,0,0.15);
		}
		
		/* Animation for workout image */
		.workout-image {
			transition: all 0.5s ease;
		}
		.recipe-image {
			transition: all 0.5s ease;
		}
		
		.workout-card:hover .workout-image {
			transform: scale(1.05);
		}
		#workout-content {
		height: 100%;
		overflow: hidden;
	}

	#workout-content-container {
		height:auto; /* Adjust based on your layout */
		min-height: 600px;
	}
	
	.recipe-card:hover .workout-image {
			transform: scale(1.05);
		}
		#recipe-content {
		height: 100%;
		overflow: hidden;
	}

	#recipe-content-container {
		height:auto; /* Adjust based on your layout */
		min-height: 600px;
	}
		/* Iframe styling */
		#workout-content iframe {
			width: 100%;
			height: 600px;
			border: none;
			border-radius: 10px;
			box-shadow: 0 5px 15px rgba(0,0,0,0.1);
			background: white;
		}
		/* Iframe styling */
		#recipe-content iframe {
			width: 100%;
			height: 600px;
			border: none;
			border-radius: 10px;
			box-shadow: 0 5px 15px rgba(0,0,0,0.1);
			background: white;
		}
		
		/* Loading spinner */
		.loading-spinner {
			text-align: center;
			padding: 2rem;
			font-size: 1.2rem;
			color: var(--primary-color);
		}
		
		.fa-spinner {
			margin-right: 10px;
		}
		
		#relaxation-content-container {
		height:auto;
		position: relative;
	}
	#relaxation-content iframe {
		width: 100%;
			height: 600px;
		border: none;
		border-radius: 10px;
			box-shadow: 0 5px 15px rgba(0,0,0,0.1);
	}

	/* Fullscreen toggle button */
	.fullscreen-toggle {
		position: absolute;
		top: 10px;
		right: 10px;
		background: var(--primary-color);
		color: white;
		border: none;
		border-radius: 50%;
		width: 40px;
		height: 40px;
		display: flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
		z-index: 10;
	}

	.section-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 1.5rem;
	}

	.section-title-container {
		flex: 1;
	}
		</style>
	</head>
	<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img loading="lazy" style="width:6rem; height:6rem;"src="img/logo.png" class="attachment-full size-full" alt="" decoding="async" /><div class="brand"></div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="menu-item <?= $active_section === 'dashboard' ? 'active' : '' ?>" 
                   data-section="dashboard">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a class="menu-item <?= $active_section === 'medicine' ? 'active' : '' ?>" 
                   data-section="medicine">
                    <i class="fas fa-pills"></i> Medicine Reminder
                </a>
            </li>
            <li>
                <a class="menu-item <?= in_array($active_section, ['workout', 'relaxation', 'recipes']) ? 'active' : '' ?>" 
                   id="services-toggle">
                    <i class="fas fa-dumbbell"></i> Services
                </a>
                <ul class="submenu <?= in_array($active_section, ['workout', 'relaxation', 'recipes']) ? 'show' : '' ?>">
                    <li>
                        <a class="menu-item <?= $active_section === 'workout' ? 'active' : '' ?>" 
                           data-section="workout">Workout</a>
                    </li>
                    <li>
                        <a class="menu-item <?= $active_section === 'relaxation' ? 'active' : '' ?>" 
                           data-section="relaxation">Relaxation</a>
                    </li>
                    <li>
                        <a class="menu-item <?= $active_section === 'recipes' ? 'active' : '' ?>" 
                           data-section="recipes">Recipes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="menu-item "  href="premiumchatbot.php">
                   
                    <i class="fas fa-robot"></i> AI Chatbot
                </a>
            </li>
        </ul>
    </div>
		
		<!-- Main Content -->
		<div class="main-content" id="main-content">
			<div class="header">
				<h1 class="welcome-text">Welcome, <span  style="text-transform:capitalize;"><?= htmlspecialchars($user['name']) ?>!</span></h1>
				<p >Your Premium Dashboard - Enjoy exclusive features</p>
			</div>
			
			<!-- Show success/error messages -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="message-box success">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="message-box error">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
			
			<!-- Dashboard Content -->
			<div id="dashboard-section" class="content-section <?= $active_section === 'dashboard' ? 'active' : '' ?>">
				<h2 class="section-title"  style="color:white;">Your Premium Dashboard</h2>
				<div class="dashboard-grid">
					<div class="dashboard-card">
						<div class="card-header">
							<div class="card-icon"><i class="fas fa-pills"></i></div>
							<h2 class="card-title">Medicine Reminder</h2>
						</div>
						<div class="card-content">
							<p>Set reminders for your medications and never miss a dose. Premium members can set unlimited reminders.</p>
							<button class="btn" data-section="medicine">Manage Reminders</button>
						</div>
					</div>
					
					<div class="dashboard-card">
						<div class="card-header">
							<div class="card-icon"><i class="fas fa-dumbbell"></i></div>
							<h2 class="card-title" >Personalized Workouts</h2>
						</div>
						<div class="card-content">
							<p>Access premium workout plans tailored specifically for your fitness goals and health conditions.</p>
							<button class="btn" data-section="workout">View Workouts</button>
						</div>
					</div>
					
					<div class="dashboard-card">
						<div class="card-header">
							<div class="card-icon"><i class="fas fa-utensils"></i></div>
							<h2 class="card-title">Relaxation</h2>
						</div>
						<div class="card-content">
							<p>Experience soothing relaxation techniques carefully selected by our wellness experts to match your stress levels and lifestyle.</p>
							<button class="btn" data-section="relaxation">Explore Recipes</button>
						</div>
					</div>

					<div class="dashboard-card">
						<div class="card-header">
							<div class="card-icon"><i class="fas fa-utensils"></i></div>
							<h2 class="card-title">Healthy Recipes</h2>
						</div>
						<div class="card-content">
							<p>Discover delicious and healthy recipes curated by our nutrition experts based on your dietary needs.</p>
							<button class="btn" data-section="recipes">Explore Recipes</button>
						</div>
					</div>
					
					<div class="dashboard-card">
						<div class="card-header">
							<div class="card-icon"><i class="fas fa-robot"></i></div>
							<h2 class="card-title">AI Health Assistant</h2>
						</div>
						<div class="card-content">
							<p>Get personalized health advice from our AI assistant, available 24/7 to answer your health questions.</p>
							<a href="premiumchatbot.php"><button class="btn" >Chat Now</button></a>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Medicine Reminder Content -->
			<div id="medicine-section" class="content-section <?= $active_section === 'medicine' ? 'active' : '' ?>">
				<h2 class="section-title"  style="color:white;">Medicine Reminder</h2>
				
				<div class="dashboard-card">
					<h3>Your Medications</h3>
					
					<?php if (empty($reminders)): ?>
						<p>No reminders set yet. Add your first medication below.</p>
					<?php else: ?>
						<ul class="medicine-list">
							<?php foreach ($reminders as $reminder): ?>
								<li class="medicine-item">
									<div class="medicine-info">
										<div class="medicine-name"><?= htmlspecialchars($reminder['medicine_name']) ?></div>
										<div class="medicine-time">
											Dosage: <?= htmlspecialchars($reminder['dosage']) ?> | 
											Time: <?= date('h:i A', strtotime($reminder['time'])) ?> | 
											Frequency: <?= ucfirst($reminder['frequency']) ?>
										</div>
									</div>
									<div>
										<form method="post" style="display:inline;">
											<input type="hidden" name="reminder_id" value="<?= $reminder['id'] ?>">
											<button type="submit" name="delete_reminder" class="btn btn-delete">Delete</button>
										</form>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				
				<div class="dashboard-card" style="margin-top: 2rem;">
					<h3>Add New Reminder</h3>
					<form method="post">
						<div class="form-group">
							<label for="medicine_name">Medicine Name</label>
							<input type="text" id="medicine_name" name="medicine_name" placeholder="Enter medicine name" required>
						</div>
						
						<div class="form-group">
							<label for="dosage">Dosage</label>
							<input type="text" id="dosage" name="dosage" placeholder="e.g., 1 tablet" required>
						</div>
						
						<div class="form-group">
							<label for="time">Time</label>
							<input type="time" id="time" name="time" required>
						</div>
						
						<div class="form-group">
							<label for="frequency">Frequency</label>
							<select id="frequency" name="frequency" required>
								<option value="daily">Daily</option>
								<option value="weekly">Weekly</option>
								<option value="monthly">Monthly</option>
							</select>
						</div>
						
						<button type="submit" name="add_reminder" class="btn">Save Reminder</button>
					</form>
				</div>
			</div>
			
	<!-- Updated Workout Section with Enhanced Styling -->
	<div id="workout-section" class="content-section <?= $active_section === 'workout' ? 'active' : '' ?>">
		<div class="section-header">
			<div class="section-title-container">
				<h2 class="section-title" style="color:white;">Personalized Workouts</h2>
			</div>
			<button class="fullscreen-toggle" id="workout-fullscreen-toggle">
				<i class="fas fa-expand"></i>
			</button>
		</div>
		
		<div id="age-group-selection" class="dashboard-card">
			<h3>Select Your Age Group</h3>
			<div class="workout-grid">
				<div class="workout-card" data-age-group="less18">
					<div class="workout-image" style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);">
						<i class="fas fa-child"></i>
					</div>
					<div class="workout-content">
						<h4>Under 18 Years</h4>
						<p>Workouts designed for teenagers</p>
					</div>
				</div>
				
				<div class="workout-card" data-age-group="more18">
					<div class="workout-image" style="background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);">
						<i class="fas fa-user"></i>
					</div>
					<div class="workout-content">
						<h4>18-40 Years</h4>
						<p>Workouts for adults</p>
					</div>
				</div>
				
				<div class="workout-card" data-age-group="greater40">
					<div class="workout-image" style="background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);">
						<i class="fas fa-user-alt"></i>
					</div>
					<div class="workout-content">
						<h4>Over 40 Years</h4>
						<p>Workouts for mature adults</p>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Content containers for each age group -->
		<div id="workout-content-container" class="dashboard-card" style="display:none;">
			<button class="btn back-btn" id="back-to-age-selection" style="margin-bottom: 20px; background: var(--secondary-color);">
				<i class="fas fa-arrow-left"></i> Back to Age Groups
			</button>
			<div id="workout-content"  style="height:100vh;"></div>
		</div>
	</div>

			
			<!-- Relaxation Content -->
			<div id="relaxation-section" class="content-section <?= $active_section === 'relaxation' ? 'active' : '' ?>">
				<div class="section-header">
					<div class="section-title-container">
						<h2 class="section-title" style="color:white;">Relaxation Techniques</h2>
					</div>
					<div>
						<button class="btn back-btn" id="back-to-dashboard" style="margin-right: 10px;">
							<i class="fas fa-arrow-left"></i> Back
						</button>
						<button class="fullscreen-toggle" id="relaxation-fullscreen-toggle">
							<i class="fas fa-expand"></i>
						</button>
					</div>
				</div>
				
				<div id="relaxation-content-container" class="dashboard-card" style=" position: relative;">
					<div class="loading-spinner" id="relaxation-loading" style="display: none;">
						<i class="fas fa-spinner fa-spin"></i> Loading relaxation content...
					</div>
					<div id="relaxation-content"  style="height:100vh;"></div>
				</div>
			</div>
			
			<!-- Recipes Content -->
			<div id="recipes-section" class="content-section <?= $active_section === 'recipes' ? 'active' : '' ?>">
				<div class="section-header">
					<div class="section-title-container">
						<h2 class="section-title" style="color:white;">Healthy Recipes</h2>
					</div>
					<button class="fullscreen-toggle" id="recipes-fullscreen-toggle">
						<i class="fas fa-expand"></i>
					</button>
				</div>
				
				<div id="recipe-age-group-selection" class="dashboard-card">
			<h3>Select Your Age Group</h3>
			<div class="recipe-grid">
				<div class="recipe-card" data-age-group="less18">
					<div class="workout-image" style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);">
						<i class="fas fa-child"></i>
					</div>
					<div class="recipe-content">
						<h4>Under 18 Years</h4>
						<p>Recipes designed for teenagers</p>
					</div>
				</div>
				
				<div class="recipe-card" data-age-group="more18">
					<div class="workout-image" style="background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);">
						<i class="fas fa-user"></i>
					</div>
					<div class="recipe-content">
						<h4>18-40 Years</h4>
						<p>Recipes for adults</p>
					</div>
				</div>
				
				<div class="recipe-card" data-age-group="greater40">
					<div class="workout-image" style="background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);">
						<i class="fas fa-user-alt"></i>
					</div>
					<div class="recipe-content">
						<h4>Over 40 Years</h4>
						<p>Recipes for mature adults</p>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Content containers for each age group -->
		<div id="recipe-content-container" class="dashboard-card" style="display:none;">
			<button class="btn back-btn" id="recipe-back-to-age-selection" style="margin-bottom: 20px; background: var(--secondary-color);">
				<i class="fas fa-arrow-left"></i> Back to Age Groups
			</button>
			<div id="recipe-content"  style="height:100vh;"></div>
		</div>
	</div>
		<!-- Alarm Modal -->
		<div class="alarm-modal" id="alarm-modal">
			<div class="alarm-content">
				<div class="alarm-title">Medicine Reminder</div>
				<div class="alarm-animation">
					<i class="fas fa-pills"></i>
				</div>
				<div class="alarm-medicine" id="alarm-medicine-name"></div>
				<div class="alarm-time" id="alarm-medicine-time"></div>
				<p>It's time to take your medicine!</p>
				<audio id="alarm-sound" loop>
					<source src="video/alarm.mp3" type="audio/mpeg">
				</audio>
				<div class="alarm-snooze">
					<button class="btn snooze-btn" id="snooze-btn">Snooze (5 min)</button>
					<button class="btn dismiss-btn" id="dismiss-btn">Dismiss</button>
				</div>
			</div>
		</div>
<script src="https://cdn.jsdelivr.net/npm/emailjs-com@3.2.0/dist/email.min.js"></script>
		<script>
		// ==================== NAVIGATION SYSTEM ====================
        // Handle sidebar menu clicks
        document.querySelectorAll('.menu-item[data-section]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                navigateToSection(this.getAttribute('data-section'));
            });
        });
        
        // Toggle services submenu
        document.getElementById('services-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            const submenu = this.nextElementSibling;
            submenu.classList.toggle('show');
        });
        
        // Handle buttons that change sections
        document.querySelectorAll('.btn[data-section]').forEach(button => {
            button.addEventListener('click', function() {
                navigateToSection(this.getAttribute('data-section'));
            });
        });
        
        // Navigation function
        function navigateToSection(sectionId) {
            // Update URL without reloading page
            const url = new URL(window.location);
            url.searchParams.set('section', sectionId);
            window.history.pushState({}, '', url);
            
            // Show the selected section
            showSection(sectionId);
            
            // Update active menu item
            updateActiveMenuItem(sectionId);
        }
        
        // Function to show a specific section
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show the selected section
            document.getElementById(`${sectionId}-section`).classList.add('active');
            
            // Scroll to the top of the page
            window.scrollTo(0, 0);
            
            // Load section-specific content
            if (sectionId === 'relaxation') {
                loadRelaxationContent();
            }
            else if (sectionId === 'workout') {
                // Reset workout section to category selection
                document.getElementById('age-group-selection').style.display = 'block';
                document.getElementById('workout-content-container').style.display = 'none';
                resetColorScheme();
            }
        }
        
        // Function to update active menu item
        function updateActiveMenuItem(sectionId) {
            // Remove active class from all menu items
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to the selected menu item
            const targetItem = document.querySelector(`.menu-item[data-section="${sectionId}"]`);
            if (targetItem) {
                targetItem.classList.add('active');
            }
            
            // Also activate the parent service menu if it's a service
            if (['workout', 'relaxation', 'recipes'].includes(sectionId)) {
                document.getElementById('services-toggle').classList.add('active');
                document.querySelector('.submenu').classList.add('show');
            }
        }
        
        // Handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const section = urlParams.get('section') || 'dashboard';
            showSection(section);
            updateActiveMenuItem(section);
        });

        // ==================== ALARM SYSTEM ====================
        const alarmModal = document.getElementById('alarm-modal');
        const alarmSound = document.getElementById('alarm-sound');
        const medicineNameEl = document.getElementById('alarm-medicine-name');
        const medicineTimeEl = document.getElementById('alarm-medicine-time');
        const snoozeBtn = document.getElementById('snooze-btn');
        const dismissBtn = document.getElementById('dismiss-btn');
        
        let currentAlarm = null;
        let snoozeTimeout = null;
        let alarmInterval = null;
        let audioContext;
        let audioContextAllowed = false;
        
        // Create and show enable sound button
        const enableSoundBtn = document.createElement('button');
        enableSoundBtn.textContent = '🔕 Enable Alarm Sound';
        enableSoundBtn.classList.add('sound-btn');
        document.body.appendChild(enableSoundBtn);
        
        // Handle sound permission
        enableSoundBtn.addEventListener('click', function() {
            // Try to initialize audio context
            try {
                // Create audio context if not already created
                if (!audioContext) {
                    audioContext = new (window.AudioContext || window.webkitAudioContext)();
                }
                
                // Resume audio context
                audioContext.resume().then(() => {
                    audioContextAllowed = true;
                    enableSoundBtn.textContent = '🔔 Sound Enabled';
                    setTimeout(() => {
                        enableSoundBtn.style.display = 'none';
                    }, 2000);
                }).catch(e => {
                    console.error('Audio permission denied:', e);
                    alert('Please allow audio permissions in your browser settings');
                });
            } catch (e) {
                console.error('Audio context error:', e);
                alert('Your browser does not support audio features');
            }
        });
        
        // Get reminders from PHP
        const reminders = <?= json_encode($reminders) ?>;
        var message = "";
        // Function to check for due reminders
        function checkReminders() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const currentTime = `${hours}:${minutes}`;
            
            // Check each reminder
            for (const reminder of reminders) {
                // Extract time part (HH:MM)
                const reminderTime = reminder.time.substring(0, 5);
                
                // Check if it's time for this reminder
                if (currentTime === reminderTime) {
                    // Show alarm if not already showing
                    if (!currentAlarm) {
                        currentAlarm = reminder;
                        showAlarm(reminder);
                    }
                    break;
                }
            }
        }
        
        // Show alarm function
        function showAlarm(reminder) {
            medicineNameEl.textContent = reminder.medicine_name;
            medicineTimeEl.textContent = `Time: ${formatTime(reminder.time)} | Dosage: ${reminder.dosage}`;
            alarmModal.style.display = 'flex';
            
            // Play alarm sound only if permission granted
            if (audioContextAllowed) {
                try {
                    // Reset audio to start from beginning
                    alarmSound.currentTime = 0;
                    alarmSound.play().catch(e => console.log('Audio play error:', e));
                } catch (e) {
                    console.log('Audio error:', e);
                }
            }
			message = "VitaCare Medicine Reminder:\nMedicine:" + reminder.medicine_name +"\n Dosage:"+ reminder.dosage +"\n Time: "+ reminder.time +"\n Frequency: " +reminder.frequency;
   			const userName = '<?php echo addslashes($user["name"]); ?>';
    		const userEmail = '<?php echo addslashes($user["email"]); ?>';

			// Send email using EmailJS
			// Initialize EmailJS
			(function() {
           		 emailjs.init("arKiwep9wHJEsV_CE"); // Replace with your EmailJS User ID
       					 })();

            // EmailJS service ID and template ID
            emailjs.send("service_5ydq22j", "template_24873d8", {
                name: userName,
                title: message,
                email: userEmail,
            })
            .then(function(response) {
                console.log("Email sent successfully!", response);
            }, function(error) {
                console.log("Failed to send email:", error);
            });
            
            // Trigger notifications
            triggerNotifications(reminder);
        }
        
        // Add notification function
        function triggerNotifications(reminder) {
            // Create form data with all required fields
            const formData = new FormData();
            formData.append('user_id', <?= $_SESSION['user_id'] ?>);
            formData.append('medicine_name', reminder.medicine_name);
            formData.append('dosage', reminder.dosage);
            formData.append('time', reminder.time);
            formData.append('frequency', reminder.frequency);

			


            // Send POST request

            // fetch('send_notifications.php', {
            //     method: 'POST',
            //     body: formData
            // });
        }
        
        // Format time to AM/PM
        function formatTime(timeStr) {
            const [hours, minutes] = timeStr.split(':');
            const hour = parseInt(hours);
            const period = hour >= 12 ? 'PM' : 'AM';
            const displayHour = hour % 12 || 12;
            return `${displayHour}:${minutes} ${period}`;
        }
        
        // Dismiss alarm
        dismissBtn.addEventListener('click', function() {
            alarmModal.style.display = 'none';
            if (alarmSound) {
                alarmSound.pause();
                alarmSound.currentTime = 0;
            }
            currentAlarm = null;
        });
        
        // Snooze alarm
        snoozeBtn.addEventListener('click', function() {
            alarmModal.style.display = 'none';
            if (alarmSound) {
                alarmSound.pause();
                alarmSound.currentTime = 0;
            }
            
            // Set snooze for 5 minutes
            snoozeTimeout = setTimeout(() => {
                showAlarm(currentAlarm);
            }, 5 * 60 * 1000); // 5 minutes
        });

        // Check reminders every minute
        alarmInterval = setInterval(checkReminders, 60000);
        checkReminders();

        // ==================== WORKOUT SYSTEM ====================
        // Workout content loader
        document.querySelectorAll('.workout-card[data-age-group]').forEach(card => {
            card.addEventListener('click', function() {
                const ageGroup = this.getAttribute('data-age-group');
                loadWorkoutContent(ageGroup);
            });
        });

        function loadWorkoutContent(ageGroup) {
            // Hide age selection
            document.getElementById('age-group-selection').style.display = 'none';
            
            // Show content container
            const container = document.getElementById('workout-content-container');
            container.style.display = 'block';
            
            // Set loading indicator
            const contentDiv = document.getElementById('workout-content');
            contentDiv.innerHTML = '<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Loading workouts...</div>';
            
            // Fetch the appropriate content
            let contentFile;
            switch(ageGroup) {
                case 'less18': contentFile = 'workoutlesss18.php'; break;
                case 'more18': contentFile = 'workoutmore18.php'; break;
                case 'greater40': contentFile = 'workoutgreater40.php'; break;
            }
            
            // Load content
            setTimeout(() => {
                contentDiv.innerHTML = `<iframe src="${contentFile}" frameborder="0" style="width:100%; height:100%;"></iframe>`;
                changeColorScheme(ageGroup);
            }, 1000);
        }

        // Change color scheme based on age group
        function changeColorScheme(ageGroup) {
            const root = document.documentElement;
            
            switch(ageGroup) {
                case 'less18':
                    root.style.setProperty('--primary-color', '#ff6b6b');
                    root.style.setProperty('--secondary-color', '#ffd166');
                    break;
                case 'more18':
                    root.style.setProperty('--primary-color', '#118ab2');
                    root.style.setProperty('--secondary-color', '#06d6a0');
                    break;
                case 'greater40':
                    root.style.setProperty('--primary-color', '#9b5de5');
                    root.style.setProperty('--secondary-color', '#f15bb5');
                    break;
            }
        }

        // Back button functionality
        document.getElementById('back-to-age-selection').addEventListener('click', function() {
            resetColorScheme();
            document.getElementById('workout-content-container').style.display = 'none';
            document.getElementById('age-group-selection').style.display = 'block';
        });

        // Function to reset color scheme
        function resetColorScheme() {
            const root = document.documentElement;
            root.style.setProperty('--primary-color', '#764ba2');
            root.style.setProperty('--secondary-color', '#667eea');
        }

        // ==================== RELAXATION SYSTEM ====================
        // Function to load relaxation content
        function loadRelaxationContent() {
            const container = document.getElementById('relaxation-content-container');
            const contentDiv = document.getElementById('relaxation-content');
            const loading = document.getElementById('relaxation-loading');
            
            // Only load if not already loaded
            if (contentDiv.innerHTML.trim() === '') {
                // Show loading indicator
                loading.style.display = 'block';
                
                // Load content
                setTimeout(() => {
                    contentDiv.innerHTML = `
                        <iframe src="relaxation.php" 
                                frameborder="0" 
                                style="width:100%; height:100%; border:none; border-radius:10px;">
                        </iframe>
                    `;
                    loading.style.display = 'none';

                    // Change color scheme
                    document.documentElement.style.setProperty('--primary-color', '#4a6572');
                    document.documentElement.style.setProperty('--secondary-color', '#5d9b9b');
                }, 500);
            }
        }

        // Back to dashboard button
        document.getElementById('back-to-dashboard').addEventListener('click', function() {
            navigateToSection('dashboard');
        });

        // ==================== FULLSCREEN TOGGLE ====================
        // Function to toggle fullscreen mode
        function toggleFullscreen(sectionId) {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const toggleBtn = document.getElementById(`${sectionId}-fullscreen-toggle`);
            
            if (mainContent.classList.contains('full-width')) {
                // Exit fullscreen
                sidebar.classList.remove('hidden');
                mainContent.classList.remove('full-width');
                toggleBtn.innerHTML = '<i class="fas fa-expand"></i>';
            } else {
                // Enter fullscreen
                sidebar.classList.add('hidden');
                mainContent.classList.add('full-width');
                toggleBtn.innerHTML = '<i class="fas fa-compress"></i>';
            }
        }

        // Add fullscreen toggle for workout section
        document.getElementById('workout-fullscreen-toggle').addEventListener('click', function() {
            toggleFullscreen('workout');
        });

        // Add fullscreen toggle for relaxation section
        document.getElementById('relaxation-fullscreen-toggle').addEventListener('click', function() {
            toggleFullscreen('relaxation');
        });

        // Add fullscreen toggle for recipes section
        document.getElementById('recipes-fullscreen-toggle').addEventListener('click', function() {
            toggleFullscreen('recipes');
        });
		// ==================== recipe SYSTEM ====================
        // recipe content loader
        document.querySelectorAll('.recipe-card[data-age-group]').forEach(card => {
            card.addEventListener('click', function() {
                const ageGroup = this.getAttribute('data-age-group');
                loadrecipeContent(ageGroup);
            });
        });

        function loadrecipeContent(ageGroup) {
            // Hide age selection
            document.getElementById('recipe-age-group-selection').style.display = 'none';
            
            // Show content container
            const container = document.getElementById('recipe-content-container');
            container.style.display = 'block';
            
            // Set loading indicator
            const contentDiv = document.getElementById('recipe-content');
            contentDiv.innerHTML = '<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Loading recipes...</div>';
            
            // Fetch the appropriate content
            let contentFile;
            switch(ageGroup) {
                case 'less18': contentFile = 'recipelesss18.php'; break;
                case 'more18': contentFile = 'recipemore18.php'; break;
                case 'greater40': contentFile = 'recipemore40.php'; break;
            }
            
            // Load content
            setTimeout(() => {
                contentDiv.innerHTML = `<iframe src="${contentFile}" frameborder="0" style="width:100%; height:100%;"></iframe>`;
                changeColorScheme(ageGroup);
            }, 1000);
        }

        // Change color scheme based on age group
        function changeColorScheme(ageGroup) {
            const root = document.documentElement;
            
            switch(ageGroup) {
                case 'less18':
                    root.style.setProperty('--primary-color', '#ff6b6b');
                    root.style.setProperty('--secondary-color', '#ffd166');
                    break;
                case 'more18':
                    root.style.setProperty('--primary-color', '#118ab2');
                    root.style.setProperty('--secondary-color', '#06d6a0');
                    break;
                case 'greater40':
                    root.style.setProperty('--primary-color', '#9b5de5');
                    root.style.setProperty('--secondary-color', '#f15bb5');
                    break;
            }
        }

        // Back button functionality
        document.getElementById('recipe-back-to-age-selection').addEventListener('click', function() {
            resetColorScheme();
            document.getElementById('recipe-content-container').style.display = 'none';
            document.getElementById('recipe-age-group-selection').style.display = 'block';
        });

        // Function to reset color scheme
        function resetColorScheme() {
            const root = document.documentElement;
            root.style.setProperty('--primary-color', '#764ba2');
            root.style.setProperty('--secondary-color', '#667eea');
        }

        // ==================== INITIALIZATION ====================
        // Initialize active section
        document.addEventListener('DOMContentLoaded', function() {
            // Show current section
            const urlParams = new URLSearchParams(window.location.search);
            const section = urlParams.get('section') || 'dashboard';
            showSection(section);
            
            // Load relaxation if needed
            if (section === 'relaxation') {
                loadRelaxationContent();
            }
        });

		</script>
		
	</body>
	</html>