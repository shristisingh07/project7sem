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
                
                // Redirect premium users to this chatbot interface
                if ($user['is_premium'] == 1) {
                    $showLogin = false;
                } else {
                    $error = "You need a premium account to access this chatbot";
                }
            } else {
                $error = "Invalid password!";
            }
        } else {
            $error = "User not found!";
        }
    } elseif (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        $showLogin = true;
    }
}

// For premium users, fetch additional user data
if (isset($_SESSION['user_id']) && $_SESSION['is_premium'] == 1) {
    $showLogin = false;
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        
        if (!$user) {
            throw new Exception("User not found!");
        }
    } catch(Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>
	
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>FitPro - Gamified Fitness Platform</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<style>
			/* ====== ROOT VARIABLES ====== */
			:root {
				--primary: #2A5B8C;
				--primary-dark: #1E4365;
				--primary-light: #3F7ABF;
				--secondary: #38B2AC;
				--accent: #F6AD55;
				--success: #48BB78;
				--warning: #ED8936;
				--danger: #E53E3E;
				--light: #F7FAFC;
				--dark: #2D3748;
				--gray: #718096;
				--light-gray: #E2E8F0;
				--card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
				--transition: all 0.3s ease;
				--gold: #FFD700;
				--silver: #C0C0C0;
				--bronze: #CD7F32;
				--text-primary: #2D3748;
				--bg-primary: #F7FAFC;
				--card-bg: #FFFFFF;
			}
			
			/* ====== DARK THEME VARIABLES ====== */
			.dark-theme {
				--primary: #3F7ABF;
				--primary-dark: #2A5B8C;
				--primary-light: #4A8CD4;
				--secondary: #48BB78;
				--accent: #F6AD55;
				--light: #1A202C;
				--dark: #E2E8F0;
				--gray: #A0AEC0;
				--light-gray: #2D3748;
				--text-primary: #E2E8F0;
				--bg-primary: #121826;
				--card-bg: #1A202C;
			}
			
			/* ====== BASE STYLES ====== */
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				font-family: 'Poppins', sans-serif;
			}
			
			body {
				background: linear-gradient(135deg, var(--bg-primary) 0%, #e6eef7 100%);
				min-height: 100vh;
				padding: 20px;
				color: var(--text-primary);
				overflow-x: hidden;
				transition: var(--transition);
			}
			
			.container {
				max-width: 1400px;
				margin: 0 auto;
				position: relative;
			}
			
			header {
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding: 20px 0;
				margin-bottom: 30px;
				flex-wrap: wrap;
				gap: 20px;
			}
			
			.logo {
				display: flex;
				align-items: center;
				gap: 15px;
			}
			
			.logo h1 {
				font-size: 2.5rem;
				font-weight: 700;
				color: var(--primary);
				letter-spacing: -0.5px;
			}
			
			.logo span {
				color: var(--secondary);
			}
			
			.logo-icon {
				background: var(--primary);
				width: 60px;
				height: 60px;
				border-radius: 18px;
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-size: 2rem;
				box-shadow: 0 5px 15px rgba(42, 91, 140, 0.3);
			}
			
			.user-info {
				display: flex;
				align-items: center;
				gap: 15px;
				flex-wrap: wrap;
			}
			
			.user-card {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 18px 25px;
				box-shadow: var(--card-shadow);
				display: flex;
				align-items: center;
				gap: 15px;
				min-width: 280px;
				border: 1px solid rgba(42, 91, 140, 0.1);
				transition: var(--transition);
			}
			
			.avatar {
				width: 60px;
				height: 60px;
				border-radius: 50%;
				background: linear-gradient(45deg, var(--primary), var(--primary-dark));
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-size: 1.6rem;
				font-weight: bold;
				cursor: pointer;
				transition: var(--transition);
			}
			
			.points {
				background: linear-gradient(to right, var(--primary), var(--primary-light));
				color: white;
				padding: 8px 18px;
				border-radius: 30px;
				font-weight: bold;
				display: flex;
				align-items: center;
				gap: 8px;
				font-size: 1.1rem;
				box-shadow: 0 4px 10px rgba(42, 91, 140, 0.3);
			}
			
			.level {
				background: linear-gradient(to right, var(--secondary), #319795);
				color: white;
				padding: 8px 18px;
				border-radius: 30px;
				font-weight: bold;
				display: flex;
				align-items: center;
				gap: 8px;
				font-size: 1.1rem;
				box-shadow: 0 4px 10px rgba(56, 178, 172, 0.3);
			}
			
			.dashboard {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
				gap: 30px;
				margin-bottom: 40px;
			}
			
			.card {
				background: var(--card-bg);
				border-radius: 22px;
				overflow: hidden;
				box-shadow: var(--card-shadow);
				transition: var(--transition);
				border: 1px solid rgba(0, 0, 0, 0.05);
				position: relative;
			}
			
			.card:hover {
				transform: translateY(-8px);
				box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
			}
			
			.card-header {
				background: linear-gradient(45deg, var(--primary), var(--primary-dark));
				color: white;
				padding: 25px;
				display: flex;
				align-items: center;
				justify-content: space-between;
				position: relative;
				overflow: hidden;
			}
			
			.card-header::before {
				content: "";
				position: absolute;
				top: -50%;
				right: -20%;
				width: 150px;
				height: 150px;
				background: rgba(255, 255, 255, 0.1);
				border-radius: 50%;
			}
			
			.card-title {
				font-size: 1.5rem;
				font-weight: 600;
				z-index: 1;
			}
			
			.card-title i {
				margin-right: 12px;
				font-size: 1.4rem;
			}
			
			.card-body {
				padding: 30px;
			}
			
			.goal-tracker {
				text-align: center;
			}
			
			.goal-display {
				font-size: 2rem;
				font-weight: 700;
				margin: 20px 0;
				color: var(--primary);
				display: flex;
				justify-content: center;
				align-items: center;
				gap: 10px;
			}
			
			.goal-display span {
				font-size: 1.5rem;
				color: var(--gray);
			}
			
			.progress-container {
				height: 30px;
				background: var(--light-gray);
				border-radius: 20px;
				margin: 30px 0;
				overflow: hidden;
				position: relative;
				box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
			}
			
			.progress-bar {
				height: 100%;
				background: linear-gradient(90deg, var(--secondary), var(--primary));
				border-radius: 20px;
				display: flex;
				align-items: center;
				justify-content: flex-end;
				padding-right: 15px;
				color: white;
				font-weight: bold;
				font-size: 1rem;
				transition: width 0.8s cubic-bezier(0.22, 0.61, 0.36, 1);
				position: relative;
				overflow: hidden;
			}
			
			.progress-bar::after {
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
				animation: shine 2s infinite;
			}
			
			.goal-controls {
				display: flex;
				justify-content: center;
				gap: 20px;
				margin-top: 30px;
			}
			
			.btn {
				padding: 14px 30px;
				border: none;
				border-radius: 50px;
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition);
				display: flex;
				align-items: center;
				gap: 10px;
				font-size: 1.05rem;
				box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
			}
			
			.btn-primary {
				background: var(--primary);
				color: white;
			}
			
			.btn-primary:hover {
				background: var(--primary-dark);
				transform: translateY(-3px);
				box-shadow: 0 8px 20px rgba(42, 91, 140, 0.4);
			}
			
			.btn-secondary {
				background: var(--light-gray);
				color: var(--dark);
			}
			
			.btn-secondary:hover {
				background: #d1d5db;
				transform: translateY(-3px);
			}
			
			.challenges-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
				gap: 25px;
				margin-top: 25px;
			}
			
			.challenge-card {
				border: 2px solid var(--light-gray);
				border-radius: 18px;
				overflow: hidden;
				transition: var(--transition);
				background: var(--card-bg);
				position: relative;
			}
			
			.challenge-card:hover {
				border-color: var(--primary);
				transform: translateY(-8px);
				box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
			}
			
			.challenge-header {
				background: var(--light);
				padding: 20px;
				display: flex;
				align-items: center;
				justify-content: space-between;
				border-bottom: 2px solid rgba(0, 0, 0, 0.05);
			}
			
			.challenge-title {
				font-weight: 600;
				font-size: 1.2rem;
				color: var(--primary);
			}
			
			.challenge-points {
				background: linear-gradient(to right, var(--accent), #F6AD55);
				color: white;
				padding: 6px 15px;
				border-radius: 20px;
				font-size: 0.95rem;
				font-weight: 600;
			}
			
			.challenge-body {
				padding: 20px;
			}
			
			.challenge-progress {
				margin: 20px 0;
			}
			
			.challenge-progress-bar {
				height: 12px;
				background: var(--light-gray);
				border-radius: 10px;
				overflow: hidden;
				box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
			}
			
			.challenge-progress-fill {
				height: 100%;
				background: linear-gradient(90deg, var(--success), #38A169);
				border-radius: 10px;
				transition: width 0.8s ease;
			}
			
			.challenge-stats {
				display: flex;
				justify-content: space-between;
				font-size: 0.95rem;
				color: var(--gray);
				margin-top: 8px;
			}
			
			.rewards-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
				gap: 25px;
				margin-top: 25px;
			}
			
			.reward-card {
				border: 2px solid var(--light-gray);
				border-radius: 18px;
				overflow: hidden;
				text-align: center;
				transition: var(--transition);
				background: var(--card-bg);
			}
			
			.reward-card:hover {
				border-color: var(--accent);
				transform: translateY(-8px);
				box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
			}
			
			.reward-icon {
				background: linear-gradient(45deg, var(--primary), var(--primary-dark));
				height: 100px;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 2.8rem;
				color: white;
			}
			
			.reward-details {
				padding: 20px;
			}
			
			.reward-name {
				font-weight: 600;
				margin-bottom: 10px;
				font-size: 1.2rem;
				color: var(--primary);
			}
			
			.reward-cost {
				color: var(--accent);
				font-weight: 700;
				font-size: 1.5rem;
				margin: 15px 0;
				display: flex;
				align-items: center;
				justify-content: center;
				gap: 5px;
			}
			
			.activity-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
				gap: 20px;
				margin-top: 25px;
			}
			
			.activity-card {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 25px 20px;
				text-align: center;
				box-shadow: var(--card-shadow);
				transition: var(--transition);
				cursor: pointer;
				border: 2px solid transparent;
				position: relative;
				overflow: hidden;
			}
			
			.activity-card:hover {
				transform: translateY(-8px);
				background: linear-gradient(135deg, var(--primary), var(--primary-dark));
				color: white;
				box-shadow: 0 15px 30px rgba(42, 91, 140, 0.4);
				border-color: transparent;
			}
			
			.activity-icon {
				font-size: 3rem;
				margin-bottom: 20px;
				transition: var(--transition);
			}
			
			.activity-name {
				font-weight: 600;
				margin-bottom: 15px;
				font-size: 1.2rem;
			}
			
			.activity-points {
				font-size: 1rem;
				color: var(--gray);
				transition: var(--transition);
			}
			
			.activity-card:hover .activity-points {
				color: rgba(255, 255, 255, 0.9);
			}
			
			.notification {
				position: fixed;
				top: 30px;
				right: 30px;
				background: var(--card-bg);
				border-radius: 15px;
				box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
				padding: 20px 30px;
				display: flex;
				align-items: center;
				gap: 20px;
				transform: translateX(150%);
				transition: transform 0.5s cubic-bezier(0.18, 0.89, 0.32, 1.28);
				z-index: 1000;
				max-width: 400px;
				border-left: 5px solid var(--success);
			}
			
			.notification.show {
				transform: translateX(0);
			}
			
			.notification-icon {
				width: 50px;
				height: 50px;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 1.5rem;
				background: var(--success);
				color: white;
			}
			
			.notification-info .notification-icon {
				background: var(--primary);
			}
			
			.notification-warning .notification-icon {
				background: var(--warning);
			}
			
			.notification-content h4 {
				margin-bottom: 8px;
				font-size: 1.2rem;
			}
			
			.badge {
				position: absolute;
				top: -10px;
				right: -10px;
				background: var(--danger);
				color: white;
				padding: 5px 10px;
				border-radius: 20px;
				font-weight: bold;
				font-size: 0.9rem;
				z-index: 10;
				box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
			}
			
			.section-title {
				font-size: 2rem;
				font-weight: 700;
				margin-bottom: 30px;
				text-align: center;
				color: var(--primary);
				position: relative;
			}
			
			.section-title::after {
				content: "";
				position: absolute;
				bottom: -10px;
				left: 50%;
				transform: translateX(-50%);
				width: 80px;
				height: 4px;
				background: linear-gradient(90deg, var(--primary), var(--secondary));
				border-radius: 2px;
			}
			
			.stats-grid {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
				gap: 20px;
				margin-bottom: 40px;
			}
			
			.stat-card {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 30px;
				text-align: center;
				box-shadow: var(--card-shadow);
				transition: var(--transition);
				border: 1px solid rgba(42, 91, 140, 0.1);
			}
			
			.stat-card:hover {
				transform: translateY(-5px);
				box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
			}
			
			.stat-value {
				font-size: 2.5rem;
				font-weight: 700;
				color: var(--primary);
				margin: 15px 0;
			}
			
			.stat-label {
				color: var(--gray);
				font-weight: 500;
			}
			
			.tabs {
				display: flex;
				gap: 10px;
				margin-bottom: 30px;
				justify-content: center;
				flex-wrap: wrap;
			}
			
			.tab {
				padding: 12px 25px;
				background: var(--light-gray);
				border-radius: 50px;
				cursor: pointer;
				font-weight: 500;
				transition: var(--transition);
			}
			
			.tab.active {
				background: var(--primary);
				color: white;
			}
			
			.tab-content {
				display: none;
			}
			
			.tab-content.active {
				display: block;
			}
			
			.leaderboard {
				background: var(--card-bg);
				border-radius: 18px;
				overflow: hidden;
				box-shadow: var(--card-shadow);
				margin-top: 25px;
			}
			
			.leaderboard-header {
				background: linear-gradient(45deg, var(--primary), var(--primary-dark));
				color: white;
				padding: 20px;
				display: flex;
				justify-content: space-between;
				font-weight: 600;
			}
			
			.leaderboard-row {
				display: flex;
				justify-content: space-between;
				padding: 20px;
				border-bottom: 1px solid var(--light-gray);
				align-items: center;
				transition: var(--transition);
			}
			
			.leaderboard-row:hover {
				background: rgba(42, 91, 140, 0.05);
			}
			
			.leaderboard-row.current-user {
				background: rgba(56, 178, 172, 0.1);
				border-left: 4px solid var(--secondary);
			}
			
			.rank {
				width: 40px;
				height: 40px;
				border-radius: 50%;
				background: var(--primary);
				color: white;
				display: flex;
				align-items: center;
				justify-content: center;
				font-weight: 600;
			}
			
			.rank-1 {
				background: linear-gradient(45deg, var(--gold), #FFC800);
			}
			
			.rank-2 {
				background: linear-gradient(45deg, var(--silver), #B0B0B0);
			}
			
			.rank-3 {
				background: linear-gradient(45deg, var(--bronze), #B87333);
			}
			
			.user-detail {
				display: flex;
				align-items: center;
				gap: 15px;
				flex: 1;
				margin-left: 20px;
			}
			
			.user-avatar {
				width: 45px;
				height: 45px;
				border-radius: 50%;
				background: linear-gradient(45deg, var(--primary), var(--secondary));
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-weight: 600;
				cursor: pointer;
			}
			
			.points-col, .level-col {
				width: 100px;
				text-align: center;
			}
			
			.activity-col {
				width: 150px;
				text-align: center;
			}
			
			.login-container {
				max-width: 500px;
				margin: 100px auto;
				background: var(--card-bg);
				border-radius: 20px;
				box-shadow: var(--card-shadow);
				overflow: hidden;
			}
			
			.login-header {
				background: linear-gradient(45deg, var(--primary), var(--primary-dark));
				color: white;
				padding: 40px;
				text-align: center;
			}
			
			.login-body {
				padding: 40px;
			}
			
			.form-group {
				margin-bottom: 25px;
			}
			
			.form-group label {
				display: block;
				margin-bottom: 10px;
				font-weight: 500;
				color: var(--dark);
			}
			
			.form-group input {
				width: 100%;
				padding: 15px;
				border-radius: 12px;
				border: 1px solid var(--light-gray);
				font-size: 1rem;
				transition: var(--transition);
				background: var(--bg-primary);
				color: var(--text-primary);
			}
			
			.form-group input:focus {
				border-color: var(--primary);
				outline: none;
				box-shadow: 0 0 0 3px rgba(42, 91, 140, 0.2);
			}
			
			.login-btn {
				width: 100%;
				padding: 16px;
				background: var(--primary);
				color: white;
				border: none;
				border-radius: 12px;
				font-size: 1.1rem;
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition);
			}
			
			.login-btn:hover {
				background: var(--primary-dark);
			}
			
			/* New styles for enhanced features */
			.featured-challenge {
				grid-column: span 2;
				background: linear-gradient(135deg, var(--primary), var(--secondary));
				color: white;
				border-radius: 22px;
				overflow: hidden;
				box-shadow: var(--card-shadow);
				display: flex;
				margin-bottom: 40px;
			}
			
			.featured-content {
				padding: 40px;
				flex: 1;
				display: flex;
				flex-direction: column;
				justify-content: center;
			}
			
			.featured-image {
				flex: 1;
				background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%232A5B8C"/><path d="M20,20 L80,20 L80,80 L20,80 Z" fill="none" stroke="%2338B2AC" stroke-width="2"/><circle cx="50" cy="50" r="30" fill="none" stroke="%23F6AD55" stroke-width="2"/></svg>') center/cover;
			}
			
			.featured-title {
				font-size: 2.2rem;
				margin-bottom: 15px;
				font-weight: 700;
			}
			
			.featured-description {
				font-size: 1.1rem;
				margin-bottom: 25px;
				opacity: 0.9;
				max-width: 500px;
			}
			
			.achievements-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
				gap: 25px;
				margin-top: 25px;
			}
			
			.achievement-card {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 25px;
				text-align: center;
				box-shadow: var(--card-shadow);
				transition: var(--transition);
				position: relative;
				border: 2px solid var(--light-gray);
			}
			
			.achievement-card.earned {
				border-color: var(--accent);
				transform: translateY(-5px);
				box-shadow: 0 10px 20px rgba(246, 173, 85, 0.2);
			}
			
			.achievement-icon {
				font-size: 2.5rem;
				margin-bottom: 15px;
				color: var(--primary);
			}
			
			.achievement-card.earned .achievement-icon {
				color: var(--accent);
			}
			
			.achievement-name {
				font-weight: 600;
				margin-bottom: 10px;
			}
			
			.achievement-desc {
				font-size: 0.9rem;
				color: var(--gray);
				margin-bottom: 15px;
			}
			
			.achievement-points {
				background: var(--light-gray);
				padding: 4px 10px;
				border-radius: 20px;
				font-size: 0.9rem;
				display: inline-block;
			}
			
			.achievement-card.earned .achievement-points {
				background: var(--accent);
				color: white;
			}
			
			.nutrition-tracker {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
				gap: 25px;
				margin-top: 25px;
			}
			
			.nutrition-card {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 25px;
				box-shadow: var(--card-shadow);
			}
			
			.macro-grid {
				display: grid;
				grid-template-columns: repeat(4, 1fr);
				gap: 15px;
				margin-top: 20px;
			}
			
			.macro-card {
				text-align: center;
				padding: 15px;
				border-radius: 15px;
				background: var(--light);
			}
			
			.macro-value {
				font-size: 1.5rem;
				font-weight: 700;
				margin: 10px 0;
			}
			
			.macro-label {
				color: var(--gray);
				font-size: 0.9rem;
			}
			
			.food-log {
				margin-top: 25px;
			}
			
			.food-item {
				display: flex;
				justify-content: space-between;
				padding: 15px 0;
				border-bottom: 1px solid var(--light-gray);
			}
			
			.food-name {
				font-weight: 500;
			}
			
			.food-calories {
				color: var(--accent);
				font-weight: 600;
			}
			
			.add-food-btn {
				margin-top: 20px;
				width: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				gap: 10px;
				background: var(--primary);
				color: white;
				border: none;
				padding: 12px;
				border-radius: 12px;
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition);
			}
			
			.add-food-btn:hover {
				background: var(--primary-dark);
			}
			
			.weekly-progress {
				margin-top: 40px;
			}
			
			.progress-chart {
				display: flex;
				align-items: flex-end;
				height: 200px;
				gap: 20px;
				margin-top: 20px;
				padding: 0 20px;
			}
			
			.chart-bar {
				flex: 1;
				background: var(--light-gray);
				border-radius: 10px 10px 0 0;
				position: relative;
				min-width: 40px;
				max-width: 60px;
			}
			
			.bar-fill {
				background: linear-gradient(to top, var(--primary), var(--secondary));
				border-radius: 10px 10px 0 0;
				position: absolute;
				bottom: 0;
				left: 0;
				right: 0;
				transition: height 1s ease;
			}
			
			.chart-label {
				position: absolute;
				bottom: -30px;
				left: 0;
				right: 0;
				text-align: center;
				font-size: 0.9rem;
				color: var(--gray);
			}
			
			.bar-value {
				position: absolute;
				top: -25px;
				left: 0;
				right: 0;
				text-align: center;
				font-weight: 600;
				color: var(--primary);
			}
			
			.social-feed {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
				gap: 25px;
				margin-top: 25px;
			}
			
			.post-card {
				background: var(--card-bg);
				border-radius: 18px;
				overflow: hidden;
				box-shadow: var(--card-shadow);
			}
			
			.post-header {
				padding: 20px;
				display: flex;
				align-items: center;
				gap: 15px;
			}
			
			.post-avatar {
				width: 45px;
				height: 45px;
				border-radius: 50%;
				background: linear-gradient(45deg, var(--primary), var(--secondary));
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-weight: 600;
			}
			
			.post-content {
				padding: 0 20px 20px;
			}
			
			.post-image {
				height: 200px;
				background: var(--light-gray);
				margin: 15px 0;
				border-radius: 12px;
				overflow: hidden;
			}
			
			.post-actions {
				display: flex;
				gap: 20px;
				padding: 15px 20px;
				border-top: 1px solid var(--light-gray);
			}
			
			.post-action {
				display: flex;
				align-items: center;
				gap: 5px;
				color: var(--gray);
				cursor: pointer;
				transition: var(--transition);
			}
			
			.post-action:hover {
				color: var(--primary);
			}
			
			.avatar-selector {
				display: flex;
				gap: 15px;
				margin: 20px 0;
				flex-wrap: wrap;
				justify-content: center;
			}
			
			.avatar-option {
				width: 60px;
				height: 60px;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				background: var(--light);
				cursor: pointer;
				transition: var(--transition);
				font-weight: 600;
				font-size: 1.2rem;
			}
			
			.avatar-option.selected {
				transform: scale(1.1);
				box-shadow: 0 0 0 3px var(--primary);
			}
			
			.theme-selector {
				display: flex;
				gap: 15px;
				margin: 20px 0;
				flex-wrap: wrap;
				justify-content: center;
			}
			
			.theme-option {
				width: 40px;
				height: 40px;
				border-radius: 50%;
				cursor: pointer;
				transition: var(--transition);
			}
			
			.theme-option.selected {
				transform: scale(1.2);
				box-shadow: 0 0 0 3px white, 0 0 0 5px var(--primary);
			}
			
			.theme-blue { background: #2A5B8C; }
			.theme-green { background: #38B2AC; }
			.theme-orange { background: #F6AD55; }
			.theme-purple { background: #805AD5; }
			.theme-red { background: #E53E3E; }
			.theme-dark { background: #121826; }
			
			.modal {
				position: fixed;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: rgba(0, 0, 0, 0.7);
				display: flex;
				align-items: center;
				justify-content: center;
				z-index: 2000;
				opacity: 0;
				visibility: hidden;
				transition: var(--transition);
			}
			
			.modal.active {
				opacity: 1;
				visibility: visible;
			}
			
			.modal-content {
				background: var(--card-bg);
				border-radius: 20px;
				max-width: 500px;
				width: 90%;
				max-height: 90vh;
				overflow-y: auto;
				transform: scale(0.9);
				transition: var(--transition);
			}
			
			.modal.active .modal-content {
				transform: scale(1);
			}
			
			.modal-header {
				padding: 25px;
				background: linear-gradient(45deg, var(--primary), var(--primary-dark));
				color: white;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			
			.close-modal {
				background: none;
				border: none;
				color: white;
				font-size: 1.5rem;
				cursor: pointer;
			}
			
			.modal-body {
				padding: 25px;
			}
			
			.virtual-trainer {
				display: flex;
				flex-direction: column;
				align-items: center;
				padding: 20px;
				background: var(--light);
				border-radius: 18px;
				margin-top: 30px;
			}
			
			.trainer-avatar {
				width: 120px;
				height: 120px;
				border-radius: 50%;
				background: linear-gradient(45deg, var(--primary), var(--secondary));
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-size: 3rem;
				margin-bottom: 20px;
			}
			
			.trainer-message {
				background: var(--card-bg);
				padding: 15px;
				border-radius: 18px;
				margin-bottom: 20px;
				position: relative;
				max-width: 80%;
			}
			
			.trainer-message:after {
				content: "";
				position: absolute;
				bottom: -10px;
				left: 20px;
				width: 0;
				height: 0;
				border-left: 10px solid transparent;
				border-right: 10px solid transparent;
				border-top: 10px solid var(--card-bg);
			}
			
			.workout-plan {
				margin-top: 20px;
				width: 100%;
			}
			
			.workout-item {
				display: flex;
				justify-content: space-between;
				padding: 15px;
				border-bottom: 1px solid var(--light-gray);
				align-items: center;
			}
			
			.workout-info {
				flex: 1;
			}
			
			.workout-actions {
				display: flex;
				gap: 10px;
			}
			
			.workout-btn {
				padding: 8px 15px;
				border: none;
				border-radius: 20px;
				font-weight: 500;
				cursor: pointer;
				transition: var(--transition);
			}
			
			.start-btn {
				background: var(--success);
				color: white;
			}
			
			.skip-btn {
				background: var(--light-gray);
				color: var(--dark);
			}
			
			.streak-calendar {
				display: grid;
				grid-template-columns: repeat(7, 1fr);
				gap: 5px;
				margin-top: 20px;
			}
			
			.calendar-day {
				aspect-ratio: 1;
				display: flex;
				align-items: center;
				justify-content: center;
				border-radius: 8px;
				background: var(--light);
				font-weight: 500;
				font-size: 0.9rem;
			}
			
			.calendar-day.active {
				background: var(--success);
				color: white;
				box-shadow: 0 3px 10px rgba(72, 187, 120, 0.3);
			}
			
			.calendar-day.today {
				border: 2px solid var(--primary);
			}
			
			.level-progress {
				margin-top: 30px;
				background: var(--light);
				border-radius: 20px;
				padding: 20px;
				position: relative;
				overflow: hidden;
			}
			
			.level-bar {
				height: 20px;
				background: white;
				border-radius: 10px;
				position: relative;
				overflow: hidden;
				margin-top: 10px;
			}
			
			.level-fill {
				height: 100%;
				background: linear-gradient(90deg, var(--accent), var(--warning));
				border-radius: 10px;
				transition: width 1s ease;
			}
			
			.level-milestones {
				display: flex;
				justify-content: space-between;
				margin-top: 10px;
			}
			
			.milestone {
				position: relative;
				text-align: center;
				font-size: 0.8rem;
				color: var(--gray);
			}
			
			.milestone:after {
				content: "";
				position: absolute;
				top: -10px;
				left: 50%;
				transform: translateX(-50%);
				width: 2px;
				height: 5px;
				background: var(--gray);
			}
			
			.milestone.active {
				color: var(--primary);
				font-weight: 600;
			}
			
			.milestone.active:after {
				height: 10px;
				background: var(--primary);
			}
			
			.fitness-quote {
				text-align: center;
				font-style: italic;
				margin: 40px 0;
				padding: 20px;
				background: linear-gradient(135deg, rgba(42, 91, 140, 0.1) 0%, rgba(56, 178, 172, 0.1) 100%);
				border-radius: 18px;
				font-size: 1.2rem;
				position: relative;
			}
			
			.quote-icon {
				position: absolute;
				top: 10px;
				left: 20px;
				font-size: 3rem;
				opacity: 0.1;
			}
			
			.water-intake {
				display: flex;
				align-items: center;
				justify-content: space-between;
				margin-top: 25px;
				padding: 20px;
				background: linear-gradient(to right, var(--primary-light), var(--primary));
				border-radius: 18px;
				color: white;
			}
			
			.water-controls {
				display: flex;
				gap: 10px;
			}
			
			.water-btn {
				width: 40px;
				height: 40px;
				border-radius: 50%;
				background: rgba(255, 255, 255, 0.2);
				display: flex;
				align-items: center;
				justify-content: center;
				cursor: pointer;
				transition: var(--transition);
			}
			
			.water-btn:hover {
				background: rgba(255, 255, 255, 0.3);
			}
			
			.water-stats {
				text-align: center;
			}
			
			.water-amount {
				font-size: 2rem;
				font-weight: 700;
				margin-bottom: 5px;
			}
			
			.water-label {
				opacity: 0.8;
			}
			
			.settings-card {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 30px;
				margin-bottom: 30px;
				box-shadow: var(--card-shadow);
			}
			
			.settings-header {
				font-size: 1.5rem;
				margin-bottom: 20px;
				color: var(--primary);
				display: flex;
				align-items: center;
				gap: 10px;
			}
			
			.settings-option {
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding: 15px 0;
				border-bottom: 1px solid var(--light-gray);
			}
			
			.toggle-switch {
				position: relative;
				display: inline-block;
				width: 60px;
				height: 30px;
			}
			
			.toggle-switch input {
				opacity: 0;
				width: 0;
				height: 0;
			}
			
			.slider {
				position: absolute;
				cursor: pointer;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background-color: var(--light-gray);
				transition: .4s;
				border-radius: 34px;
			}
			
			.slider:before {
				position: absolute;
				content: "";
				height: 22px;
				width: 22px;
				left: 4px;
				bottom: 4px;
				background-color: white;
				transition: .4s;
				border-radius: 50%;
			}
			
			input:checked + .slider {
				background-color: var(--primary);
			}
			
			input:checked + .slider:before {
				transform: translateX(30px);
			}
			
			.profile-card {
				display: flex;
				flex-direction: column;
				align-items: center;
				text-align: center;
				padding: 30px;
			}
			
			.profile-avatar {
				width: 150px;
				height: 150px;
				border-radius: 50%;
				background: linear-gradient(45deg, var(--primary), var(--secondary));
				display: flex;
				align-items: center;
				justify-content: center;
				color: white;
				font-size: 3rem;
				margin-bottom: 20px;
			}
			
			.profile-stats {
				display: grid;
				grid-template-columns: repeat(3, 1fr);
				gap: 20px;
				margin-top: 30px;
				width: 100%;
			}
			
			.profile-stat {
				background: var(--light);
				border-radius: 15px;
				padding: 20px;
				text-align: center;
			}
			
			.history-table {
				width: 100%;
				border-collapse: collapse;
				margin-top: 20px;
			}
			
			.history-table th {
				background: var(--light);
				padding: 15px;
				text-align: left;
			}
			
			.history-table td {
				padding: 15px;
				border-bottom: 1px solid var(--light-gray);
			}
			
			.history-table tr:hover {
				background: rgba(42, 91, 140, 0.05);
			}
			
			.workout-schedule {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
				gap: 25px;
				margin-top: 25px;
			}
			
			.schedule-card {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 25px;
				box-shadow: var(--card-shadow);
			}
			
			.schedule-header {
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin-bottom: 20px;
			}
			
			.schedule-list {
				list-style: none;
			}
			
			.schedule-item {
				display: flex;
				justify-content: space-between;
				padding: 12px 0;
				border-bottom: 1px solid var(--light-gray);
			}
			
			.schedule-item:last-child {
				border-bottom: none;
			}
			
			.schedule-time {
				font-weight: 600;
			}
			
			.schedule-status {
				padding: 4px 10px;
				border-radius: 20px;
				font-size: 0.9rem;
			}
			
			.status-completed {
				background: var(--success);
				color: white;
			}
			
			.status-pending {
				background: var(--warning);
				color: white;
			}
			
			.status-skipped {
				background: var(--light-gray);
				color: var(--dark);
			}
			
			.community-feed {
				display: flex;
				flex-direction: column;
				gap: 20px;
				margin-top: 25px;
			}
			
			.new-post {
				background: var(--card-bg);
				border-radius: 18px;
				padding: 20px;
				box-shadow: var(--card-shadow);
			}
			
			.post-input {
				width: 100%;
				padding: 15px;
				border-radius: 12px;
				border: 1px solid var(--light-gray);
				font-size: 1rem;
				background: var(--bg-primary);
				color: var(--text-primary);
				margin-bottom: 15px;
				resize: vertical;
				min-height: 100px;
			}
			
			.post-btn {
				background: var(--primary);
				color: white;
				border: none;
				padding: 12px 25px;
				border-radius: 12px;
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition);
			}
			
			.post-btn:hover {
				background: var(--primary-dark);
			}
			
			.activity-history {
				max-height: 600px;
				overflow-y: auto;
			}
			
			.history-filters {
				display: flex;
				gap: 15px;
				margin-bottom: 20px;
			}
			
			.history-filter {
				padding: 8px 15px;
				background: var(--light-gray);
				border-radius: 20px;
				cursor: pointer;
			}
			
			.history-filter.active {
				background: var(--primary);
				color: white;
			}
			
			.workout-progress {
				display: flex;
				flex-direction: column;
				gap: 15px;
				margin-top: 20px;
			}
			
			.progress-item {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}
			
			.progress-label {
				font-weight: 500;
			}
			
			.progress-bar-small {
				height: 10px;
				background: var(--light-gray);
				border-radius: 5px;
				flex: 1;
				margin: 0 15px;
				overflow: hidden;
			}
			
			.progress-fill-small {
				height: 100%;
				background: var(--primary);
				border-radius: 5px;
			}
			
			.workout-completed {
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				text-align: center;
				padding: 40px;
				background: rgba(56, 178, 172, 0.1);
				border-radius: 18px;
				margin-top: 30px;
			}
			
			.completed-icon {
				font-size: 4rem;
				color: var(--success);
				margin-bottom: 20px;
			}
			
			@keyframes shine {
				0% { transform: translateX(-100%); }
				100% { transform: translateX(100%); }
			}
			
			@keyframes pulse {
				0% { transform: scale(1); }
				50% { transform: scale(1.05); }
				100% { transform: scale(1); }
			}
			
			@keyframes float {
				0% { transform: translateY(0px); }
				50% { transform: translateY(-10px); }
				100% { transform: translateY(0px); }
			}
			
			.pulse {
				animation: pulse 2s infinite;
			}
			
			.floating {
				animation: float 3s ease-in-out infinite;
			}
			
			@media (max-width: 768px) {
				.dashboard {
					grid-template-columns: 1fr;
				}
				
				header {
					flex-direction: column;
					gap: 20px;
				}
				
				.user-info {
					width: 100%;
					justify-content: center;
				}
				
				.section-title {
					font-size: 1.8rem;
				}
				
				.leaderboard-header, .leaderboard-row {
					flex-wrap: wrap;
					gap: 10px;
				}
				
				.points-col, .level-col, .activity-col {
					width: auto;
				}
				
				.featured-challenge {
					grid-column: span 1;
					flex-direction: column;
				}
				
				.featured-image {
					height: 200px;
				}
				
				.macro-grid {
					grid-template-columns: repeat(2, 1fr);
				}
				
				.profile-stats {
					grid-template-columns: 1fr;
				}
			}
		</style>
	</head>
	<body>
		<div class="container">
			<header>
				<div class="logo">
					<div class="logo-icon floating">
						<i class="fas fa-heartbeat"></i>
					</div>
					<h1>Fit<span>Pro</span></h1>
				</div>
				<div class="user-info">
					<div class="user-card">
						<div class="avatar" id="user-avatar"><?php 
						$names = explode(' ', $_SESSION['user_name']);
						$initials = '';
						foreach ($names as $name) {
                        $initials .= strtoupper(substr($name, 0, 1));
						}
						echo substr($initials, 0, 2);
						?>
						</div>
						<div>
							<h3 style="text-transform:capitalize;"><?php echo $_SESSION['user_name']; ?></h3>
							<p>Fitness Enthusiast</p>
						</div>
					</div>
					<div class="points">
						<i class="fas fa-coins"></i>
						<span id="points-value">1,250</span>
					</div>
					<div class="level">
						<i class="fas fa-trophy"></i>
						<span id="level-value">Level 7</span>
					</div>
					<button class="btn btn-secondary" id="theme-toggle">
						<i class="fas fa-moon"></i> Dark Mode
					</button>
				</div>
			</header>
			
			<div class="stats-grid">
				<div class="stat-card">
					<div class="stat-value" id="streak-value">12</div>
					<div class="stat-label">Day Streak</div>
				</div>
				<div class="stat-card">
					<div class="stat-value" id="challenges-value">5</div>
					<div class="stat-label">Active Challenges</div>
				</div>
				<div class="stat-card">
					<div class="stat-value" id="calories-value">3,840</div>
					<div class="stat-label">Calories Burned</div>
				</div>
				<div class="stat-card">
					<div class="stat-value" id="distance-value">42.5</div>
					<div class="stat-label">Kilometers</div>
				</div>
			</div>
			
			<div class="featured-challenge">
				<div class="featured-content">
					<h2 class="featured-title">Summer Fitness Challenge</h2>
					<p class="featured-description">Join thousands of users in our 30-day summer transformation challenge. Complete daily workouts to earn exclusive rewards!</p>
					<button class="btn btn-primary pulse">
						<i class="fas fa-fire"></i> Join Challenge Now
					</button>
				</div>
				<div class="featured-image"></div>
			</div>
			
			<div class="dashboard">
				<!-- Goal Tracker Card -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><i class="fas fa-bullseye"></i> Daily Goal Tracker</h2>
					</div>
					<div class="card-body goal-tracker">
						<p>Track your daily step goal</p>
						<div class="goal-display">
							<span id="steps-value">8,342</span>
							<span>/</span>
							<span id="goal-value">10,000</span>
							<span>steps</span>
						</div>
						<div class="progress-container">
							<div class="progress-bar" id="progress-bar" style="width: 83.42%">83%</div>
						</div>
						<div class="goal-controls">
							<button class="btn btn-secondary" id="decrease-goal">
								<i class="fas fa-minus"></i> Decrease
							</button>
							<button class="btn btn-primary" id="increase-goal">
								<i class="fas fa-plus"></i> Increase
							</button>
						</div>
						
						<div class="water-intake">
							<div class="water-controls">
								<div class="water-btn" id="water-minus">
									<i class="fas fa-minus"></i>
								</div>
							</div>
							<div class="water-stats">
								<div class="water-amount" id="water-amount">5</div>
								<div class="water-label">Glasses of Water</div>
							</div>
							<div class="water-controls">
								<div class="water-btn" id="water-plus">
									<i class="fas fa-plus"></i>
								</div>
							</div>
						</div>
						
						<div class="streak-calendar">
							<!-- Calendar will be populated dynamically -->
						</div>
					</div>
				</div>
				
				<!-- Activity Tracker Card -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><i class="fas fa-running"></i> Log Activity</h2>
					</div>
					<div class="card-body">
						<p>Log your workout to earn points</p>
						<div class="activity-grid">
							<div class="activity-card" data-activity="walk">
								<div class="activity-icon">
									<i class="fas fa-walking"></i>
								</div>
								<h3 class="activity-name">Walking</h3>
								<p class="activity-points">+10 points per km</p>
							</div>
							<div class="activity-card" data-activity="run">
								<div class="activity-icon">
									<i class="fas fa-running"></i>
								</div>
								<h3 class="activity-name">Running</h3>
								<p class="activity-points">+15 points per km</p>
							</div>
							<div class="activity-card" data-activity="cycle">
								<div class="activity-icon">
									<i class="fas fa-bicycle"></i>
								</div>
								<h3 class="activity-name">Cycling</h3>
								<p class="activity-points">+12 points per km</p>
							</div>
							<div class="activity-card" data-activity="workout">
								<div class="activity-icon">
									<i class="fas fa-dumbbell"></i>
								</div>
								<h3 class="activity-name">Workout</h3>
								<p class="activity-points">+20 points per session</p>
							</div>
						</div>
						
						<div class="level-progress">
							<h3>Level Progress</h3>
							<p>Earn 250 more points to reach Level 8</p>
							<div class="level-bar">
								<div class="level-fill" style="width: 75%"></div>
							</div>
							<div class="level-milestones">
								<div class="milestone">Lvl 7</div>
								<div class="milestone active">Lvl 8</div>
								<div class="milestone">Lvl 9</div>
								<div class="milestone">Lvl 10</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Virtual Trainer Card -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><i class="fas fa-robot"></i> Virtual Trainer</h2>
					</div>
					<div class="card-body">
						<div class="virtual-trainer">
							<div class="trainer-avatar">
								<i class="fas fa-dumbbell"></i>
							</div>
							<div class="trainer-message">
								Hi <?php echo $_SESSION['user_name']; ?> Ready for today's workout? Let's focus on upper body strength today.
							</div>
							<button class="btn btn-primary" id="start-workout">
								<i class="fas fa-play"></i> Start Workout
							</button>
							
							<div class="workout-plan">
								<h3>Today's Plan</h3>
								<div class="workout-item">
									<div class="workout-info">
										<h4>Push-ups</h4>
										<p>3 sets of 15 reps</p>
									</div>
									<div class="workout-actions">
										<button class="workout-btn start-btn" data-workout="pushups">Start</button>
									</div>
								</div>
								<div class="workout-item">
									<div class="workout-info">
										<h4>Dumbbell Rows</h4>
										<p>3 sets of 12 reps</p>
									</div>
									<div class="workout-actions">
										<button class="workout-btn start-btn" data-workout="rows">Start</button>
									</div>
								</div>
								<div class="workout-item">
									<div class="workout-info">
										<h4>Shoulder Press</h4>
										<p>3 sets of 10 reps</p>
									</div>
									<div class="workout-actions">
										<button class="workout-btn start-btn" data-workout="press">Start</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Sleep Tracker Card -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><i class="fas fa-bed"></i> Sleep Tracker</h2>
					</div>
					<div class="card-body">
						<div class="progress-container">
							<div class="progress-bar" id="sleep-bar" style="width: 75%">7.5 hours</div>
						</div>
						<div class="goal-controls">
							<button class="btn btn-secondary" id="log-sleep">
								<i class="fas fa-moon"></i> Log Sleep
							</button>
						</div>
						
						<div class="workout-progress">
							<div class="progress-item">
								<div class="progress-label">Sleep Quality</div>
								<div class="progress-bar-small">
									<div class="progress-fill-small" style="width: 80%"></div>
								</div>
								<div>80%</div>
							</div>
							<div class="progress-item">
								<div class="progress-label">Deep Sleep</div>
								<div class="progress-bar-small">
									<div class="progress-fill-small" style="width: 60%"></div>
								</div>
								<div>1.8h</div>
							</div>
							<div class="progress-item">
								<div class="progress-label">REM Sleep</div>
								<div class="progress-bar-small">
									<div class="progress-fill-small" style="width: 45%"></div>
								</div>
								<div>1.3h</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Friends Activity Card -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><i class="fas fa-users"></i> Friends Activity</h2>
					</div>
					<div class="card-body">
						<div class="leaderboard">
							<div class="leaderboard-header">
								<div style="width: 50px;">#</div>
								<div style="flex: 1;">Friend</div>
								<div style="width: 100px;">Activity</div>
							</div>
							<div id="friends-activity">
								<!-- Friends activity will be populated dynamically -->
							</div>
						</div>
						<button class="btn btn-primary" style="width: 100%; margin-top: 20px;">
							<i class="fas fa-user-plus"></i> Add Friends
						</button>
					</div>
				</div>
				
				<!-- Weekly Schedule Card -->
				<div class="card">
					<div class="card-header">
						<h2 class="card-title"><i class="fas fa-calendar-alt"></i> Weekly Schedule</h2>
					</div>
					<div class="card-body">
						<div class="workout-schedule">
							<div class="schedule-card">
								<div class="schedule-header">
									<h3>Monday</h3>
									<span>Completed</span>
								</div>
								<ul class="schedule-list">
									<li class="schedule-item">
										<span class="schedule-time">7:00 AM</span>
										<span>Morning Run</span>
										<span class="schedule-status status-completed">Done</span>
									</li>
									<li class="schedule-item">
										<span class="schedule-time">6:00 PM</span>
										<span>Strength Training</span>
										<span class="schedule-status status-completed">Done</span>
									</li>
								</ul>
							</div>
							
							<div class="schedule-card">
								<div class="schedule-header">
									<h3>Tuesday</h3>
									<span>Pending</span>
								</div>
								<ul class="schedule-list">
									<li class="schedule-item">
										<span class="schedule-time">7:30 AM</span>
										<span>Yoga</span>
										<span class="schedule-status status-pending">Pending</span>
									</li>
									<li class="schedule-item">
										<span class="schedule-time">5:30 PM</span>
										<span>HIIT Workout</span>
										<span class="schedule-status status-pending">Pending</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fitness-quote">
				<i class="fas fa-quote-left quote-icon"></i>
				"The only bad workout is the one that didn't happen."
				<div class="quote-author">- Unknown</div>
			</div>
			
			<div class="tabs">
				<div class="tab active" data-tab="challenges">Challenges</div>
				<div class="tab" data-tab="achievements">Achievements</div>
				<div class="tab" data-tab="rewards">Rewards</div>
				<div class="tab" data-tab="nutrition">Nutrition</div>
				<div class="tab" data-tab="leaderboard">Leaderboard</div>
				<div class="tab" data-tab="profile">Profile</div>
				<div class="tab" data-tab="social">Social</div>
				<div class="tab" data-tab="history">History</div>
				<div class="tab" data-tab="settings">Settings</div>
			</div>
			
			<!-- Challenges Section -->
			<div class="tab-content active" id="challenges-tab">
				<h2 class="section-title">Fitness Challenges</h2>
				<div class="challenges-grid">
					<div class="challenge-card">
						<div class="challenge-header">
							<h3 class="challenge-title">10K Steps Daily</h3>
							<span class="challenge-points">500 pts</span>
						</div>
						<div class="challenge-body">
							<p>Complete 7 days of 10,000 steps</p>
							<div class="challenge-progress">
								<div class="challenge-progress-bar">
									<div class="challenge-progress-fill" style="width: 60%"></div>
								</div>
								<div class="challenge-stats">
									<span>4/7 days</span>
									<span>60%</span>
								</div>
							</div>
							<button class="btn btn-primary" style="width: 100%">Join Challenge</button>
						</div>
					</div>
					
					<div class="challenge-card">
						<div class="badge">Popular</div>
						<div class="challenge-header">
							<h3 class="challenge-title">30-Day Yoga</h3>
							<span class="challenge-points">800 pts</span>
						</div>
						<div class="challenge-body">
							<p>Complete 30 yoga sessions</p>
							<div class="challenge-progress">
								<div class="challenge-progress-bar">
									<div class="challenge-progress-fill" style="width: 30%"></div>
								</div>
								<div class="challenge-stats">
									<span>9/30 sessions</span>
									<span>30%</span>
								</div>
							</div>
							<button class="btn btn-primary" style="width: 100%">Join Challenge</button>
						</div>
					</div>
					
					<div class="challenge-card">
						<div class="challenge-header">
							<h3 class="challenge-title">100km Cycling</h3>
							<span class="challenge-points">1000 pts</span>
						</div>
						<div class="challenge-body">
							<p>Cycle 100km in 2 weeks</p>
							<div class="challenge-progress">
								<div class="challenge-progress-bar">
									<div class="challenge-progress-fill" style="width: 45%"></div>
								</div>
								<div class="challenge-stats">
									<span>45/100 km</span>
									<span>45%</span>
								</div>
							</div>
							<button class="btn btn-primary" style="width: 100%">Join Challenge</button>
						</div>
					</div>
					
					<div class="challenge-card">
						<div class="badge">New</div>
						<div class="challenge-header">
							<h3 class="challenge-title">Plank Challenge</h3>
							<span class="challenge-points">600 pts</span>
						</div>
						<div class="challenge-body">
							<p>Hold a plank for 5 minutes</p>
							<div class="challenge-progress">
								<div class="challenge-progress-bar">
									<div class="challenge-progress-fill" style="width: 20%"></div>
								</div>
								<div class="challenge-stats">
									<span>1:00/5:00 min</span>
									<span>20%</span>
								</div>
							</div>
							<button class="btn btn-primary" style="width: 100%">Join Challenge</button>
						</div>
					</div>
					
					<div class="challenge-card">
						<div class="challenge-header">
							<h3 class="challenge-title">Hydration Hero</h3>
							<span class="challenge-points">300 pts</span>
						</div>
						<div class="challenge-body">
							<p>Drink 8 glasses of water daily for 2 weeks</p>
							<div class="challenge-progress">
								<div class="challenge-progress-bar">
									<div class="challenge-progress-fill" style="width: 35%"></div>
								</div>
								<div class="challenge-stats">
									<span>5/14 days</span>
									<span>35%</span>
								</div>
							</div>
							<button class="btn btn-primary" style="width: 100%">Join Challenge</button>
						</div>
					</div>
					
					<div class="challenge-card">
						<div class="badge">Elite</div>
						<div class="challenge-header">
							<h3 class="challenge-title">Marathon Prep</h3>
							<span class="challenge-points">1500 pts</span>
						</div>
						<div class="challenge-body">
							<p>Run 100km in a month</p>
							<div class="challenge-progress">
								<div class="challenge-progress-bar">
									<div class="challenge-progress-fill" style="width: 28%"></div>
								</div>
								<div class="challenge-stats">
									<span>28/100 km</span>
									<span>28%</span>
								</div>
							</div>
							<button class="btn btn-primary" style="width: 100%">Join Challenge</button>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Achievements Section -->
			<div class="tab-content" id="achievements-tab">
				<h2 class="section-title">Your Achievements</h2>
				<div class="achievements-grid">
					<div class="achievement-card earned">
						<div class="achievement-icon">
							<i class="fas fa-shoe-prints"></i>
						</div>
						<h3 class="achievement-name">First Steps</h3>
						<p class="achievement-desc">Complete your first activity</p>
						<div class="achievement-points">50 pts</div>
					</div>
					
					<div class="achievement-card earned">
						<div class="achievement-icon">
							<i class="fas fa-fire"></i>
						</div>
						<h3 class="achievement-name">7-Day Streak</h3>
						<p class="achievement-desc">Maintain a 7-day activity streak</p>
						<div class="achievement-points">200 pts</div>
					</div>
					
					<div class="achievement-card">
						<div class="achievement-icon">
							<i class="fas fa-medal"></i>
						</div>
						<h3 class="achievement-name">Marathon Runner</h3>
						<p class="achievement-desc">Run a total of 42km</p>
						<div class="achievement-points">500 pts</div>
					</div>
					
					<div class="achievement-card">
						<div class="achievement-icon">
							<i class="fas fa-mountain"></i>
						</div>
						<h3 class="achievement-name">Altitude Master</h3>
						<p class="achievement-desc">Climb 10,000 steps in a day</p>
						<div class="achievement-points">300 pts</div>
					</div>
					
					<div class="achievement-card earned">
						<div class="achievement-icon">
							<i class="fas fa-heart"></i>
						</div>
						<h3 class="achievement-name">Healthy Heart</h3>
						<p class="achievement-desc">Burn 5,000 calories</p>
						<div class="achievement-points">350 pts</div>
					</div>
					
					<div class="achievement-card">
						<div class="achievement-icon">
							<i class="fas fa-infinity"></i>
						</div>
						<h3 class="achievement-name">Endurance King</h3>
						<p class="achievement-desc">Complete 100 activities</p>
						<div class="achievement-points">750 pts</div>
					</div>
					
					<div class="achievement-card earned">
						<div class="achievement-icon">
							<i class="fas fa-water"></i>
						</div>
						<h3 class="achievement-name">Hydration Hero</h3>
						<p class="achievement-desc">Drink 8 glasses daily for 7 days</p>
						<div class="achievement-points">250 pts</div>
					</div>
					
					<div class="achievement-card">
						<div class="achievement-icon">
							<i class="fas fa-weight"></i>
						</div>
						<h3 class="achievement-name">Weight Warrior</h3>
						<p class="achievement-desc">Lose 5kg in a month</p>
						<div class="achievement-points">600 pts</div>
					</div>
					
					<div class="achievement-card earned">
						<div class="achievement-icon">
							<i class="fas fa-moon"></i>
						</div>
						<h3 class="achievement-name">Sleep Master</h3>
						<p class="achievement-desc">Get 8 hours of sleep for 10 days</p>
						<div class="achievement-points">300 pts</div>
					</div>
					
					<div class="achievement-card">
						<div class="achievement-icon">
							<i class="fas fa-dumbbell"></i>
						</div>
						<h3 class="achievement-name">Strength Master</h3>
						<p class="achievement-desc">Lift your body weight</p>
						<div class="achievement-points">700 pts</div>
					</div>
					
					<div class="achievement-card earned">
						<div class="achievement-icon">
							<i class="fas fa-users"></i>
						</div>
						<h3 class="achievement-name">Social Butterfly</h3>
						<p class="achievement-desc">Connect with 10 friends</p>
						<div class="achievement-points">200 pts</div>
					</div>
					
					<div class="achievement-card">
						<div class="achievement-icon">
							<i class="fas fa-trophy"></i>
						</div>
						<h3 class="achievement-name">Legendary Status</h3>
						<p class="achievement-desc">Reach level 20</p>
						<div class="achievement-points">1000 pts</div>
					</div>
				</div>
			</div>
			
			<!-- Rewards Section -->
			<div class="tab-content" id="rewards-tab">
				<h2 class="section-title">Rewards Shop</h2>
				<div class="rewards-grid">
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-music"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Spotify Premium</h3>
							<p>1 month subscription</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 500</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
					
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-tshirt"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Fitness T-Shirt</h3>
							<p>Premium quality</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 800</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
					
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-wine-bottle"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Water Bottle</h3>
							<p>Insulated 750ml</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 300</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
					
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-book"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Fitness Guide</h3>
							<p>Expert training plans</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 400</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
					
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-headphones"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Wireless Earbuds</h3>
							<p>Sweat-resistant</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 1200</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
					
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-dumbbell"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Resistance Bands</h3>
							<p>Set of 5 bands</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 600</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
					
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-shopping-bag"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Gym Bag</h3>
							<p>Premium sports bag</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 700</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
					
					<div class="reward-card">
						<div class="reward-icon">
							<i class="fas fa-socks"></i>
						</div>
						<div class="reward-details">
							<h3 class="reward-name">Compression Socks</h3>
							<p>Performance socks</p>
							<div class="reward-cost"><i class="fas fa-coins"></i> 350</div>
							<button class="btn btn-primary">Redeem</button>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Nutrition Section -->
			<div class="tab-content" id="nutrition-tab">
				<h2 class="section-title">Nutrition Tracker</h2>
				<div class="nutrition-tracker">
					<div class="nutrition-card">
						<h3>Daily Macronutrients</h3>
						<div class="macro-grid">
							<div class="macro-card">
								<i class="fas fa-bolt"></i>
								<div class="macro-value" id="calories-intake">1,840</div>
								<div class="macro-label">Calories</div>
							</div>
							<div class="macro-card">
								<i class="fas fa-bread-slice"></i>
								<div class="macro-value" id="carbs-value">210g</div>
								<div class="macro-label">Carbs</div>
							</div>
							<div class="macro-card">
								<i class="fas fa-drumstick-bite"></i>
								<div class="macro-value" id="protein-value">95g</div>
								<div class="macro-label">Protein</div>
							</div>
							<div class="macro-card">
								<i class="fas fa-oil-can"></i>
								<div class="macro-value" id="fat-value">65g</div>
								<div class="macro-label">Fat</div>
							</div>
						</div>
						
						<div class="weekly-progress">
							<h3>Calorie Balance</h3>
							<div class="progress-chart" id="calorie-chart">
								<!-- Chart bars will be populated dynamically -->
							</div>
						</div>
					</div>
					
					<div class="nutrition-card">
						<h3>Today's Food Log</h3>
						<div class="food-log">
							<div class="food-item">
								<div class="food-name">Oatmeal with fruits</div>
								<div class="food-calories">350 cal</div>
							</div>
							<div class="food-item">
								<div class="food-name">Grilled chicken salad</div>
								<div class="food-calories">450 cal</div>
							</div>
							<div class="food-item">
								<div class="food-name">Protein shake</div>
								<div class="food-calories">220 cal</div>
							</div>
							<div class="food-item">
								<div class="food-name">Salmon with vegetables</div>
								<div class="food-calories">520 cal</div>
							</div>
							<div class="food-item">
								<div class="food-name">Greek yogurt</div>
								<div class="food-calories">120 cal</div>
							</div>
						</div>
						
						<button class="add-food-btn">
							<i class="fas fa-plus"></i> Add Food Item
						</button>
					</div>
				</div>
			</div>
			
			<!-- Leaderboard Section -->
			<div class="tab-content" id="leaderboard-tab">
				<h2 class="section-title">Community Leaderboard</h2>
				
				<div class="leaderboard">
					<div class="leaderboard-header">
						<div style="width: 50px;">Rank</div>
						<div style="flex: 1; margin-left: 20px;">User</div>
						<div style="width: 100px;">Points</div>
						<div style="width: 100px;">Level</div>
						<div style="width: 150px;">Activities</div>
					</div>
					
					<div id="leaderboard-content">
						<!-- Leaderboard will be populated dynamically -->
					</div>
				</div>
			</div>
			
			<!-- Profile Section -->
			<div class="tab-content" id="profile-tab">
				<h2 class="section-title">Your Profile</h2>
				
				<div class="profile-card">
					<div class="profile-avatar" id="profile-avatar">AJ</div>
					<h2>Alex Johnson</h2>
					<p>Fitness Enthusiast | Level 7</p>
					
					<div class="profile-stats">
						<div class="profile-stat">
							<div class="stat-value">1,250</div>
							<div class="stat-label">Points</div>
						</div>
						<div class="profile-stat">
							<div class="stat-value">42</div>
							<div class="stat-label">Activities</div>
						</div>
						<div class="profile-stat">
							<div class="stat-value">12</div>
							<div class="stat-label">Day Streak</div>
						</div>
					</div>
				</div>
				
				<div class="settings-card">
					<h3 class="settings-header"><i class="fas fa-user"></i> Personal Information</h3>
					<div class="settings-option">
						<span>Name</span>
						<span>Alex Johnson</span>
					</div>
					<div class="settings-option">
						<span>Email</span>
						<span>alex.johnson@example.com</span>
					</div>
					<div class="settings-option">
						<span>Location</span>
						<span>New York, USA</span>
					</div>
					<div class="settings-option">
						<span>Member Since</span>
						<span>January 2023</span>
					</div>
				</div>
				
				<div class="settings-card">
					<h3 class="settings-header"><i class="fas fa-chart-line"></i> Fitness Goals</h3>
					<div class="settings-option">
						<span>Daily Steps</span>
						<span>10,000</span>
					</div>
					<div class="settings-option">
						<span>Daily Calories</span>
						<span>2,200</span>
					</div>
					<div class="settings-option">
						<span>Workouts per Week</span>
						<span>5</span>
					</div>
					<div class="settings-option">
						<span>Weight Goal</span>
						<span>Lose 5kg</span>
					</div>
				</div>
			</div>
			
			<!-- Social Section -->
			<div class="tab-content" id="social-tab">
				<h2 class="section-title">Social Feed</h2>
				
				<div class="community-feed">
					<div class="new-post">
						<textarea class="post-input" placeholder="Share your fitness journey..."></textarea>
						<button class="post-btn">
							<i class="fas fa-paper-plane"></i> Post Update
						</button>
					</div>
					
					<div class="social-feed">
						<div class="post-card">
							<div class="post-header">
								<div class="post-avatar">MJ</div>
								<div>
									<h4>Michael Jordan</h4>
									<p>2 hours ago</p>
								</div>
							</div>
							<div class="post-content">
								<p>Just completed my personal best - 10km in 45 minutes! Feeling amazing 💪</p>
								<div class="post-image"></div>
							</div>
							<div class="post-actions">
								<div class="post-action">
									<i class="fas fa-heart"></i> 24
								</div>
								<div class="post-action">
									<i class="fas fa-comment"></i> 8
								</div>
								<div class="post-action">
									<i class="fas fa-share"></i> Share
								</div>
							</div>
						</div>
						
						<div class="post-card">
							<div class="post-header">
								<div class="post-avatar">SW</div>
								<div>
									<h4>Sarah Williams</h4>
									<p>5 hours ago</p>
								</div>
							</div>
							<div class="post-content">
								<p>Completed the 30-Day Yoga Challenge! 🧘‍♀️ Feeling more flexible and centered than ever before.</p>
							</div>
							<div class="post-actions">
								<div class="post-action">
									<i class="fas fa-heart"></i> 32
								</div>
								<div class="post-action">
									<i class="fas fa-comment"></i> 12
								</div>
								<div class="post-action">
									<i class="fas fa-share"></i> Share
								</div>
							</div>
						</div>
						
						<div class="post-card">
							<div class="post-header">
								<div class="post-avatar">DK</div>
								<div>
									<h4>David Kim</h4>
									<p>Yesterday</p>
								</div>
							</div>
							<div class="post-content">
								<p>Who's joining me for the Summer Fitness Challenge? Let's get this! 🔥</p>
								<div class="post-image"></div>
							</div>
							<div class="post-actions">
								<div class="post-action">
									<i class="fas fa-heart"></i> 45
								</div>
								<div class="post-action">
									<i class="fas fa-comment"></i> 15
								</div>
								<div class="post-action">
									<i class="fas fa-share"></i> Share
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- History Section -->
			<div class="tab-content" id="history-tab">
				<h2 class="section-title">Activity History</h2>
				
				<div class="history-filters">
					<div class="history-filter active">All Activities</div>
					<div class="history-filter">This Week</div>
					<div class="history-filter">This Month</div>
					<div class="history-filter">Running</div>
					<div class="history-filter">Cycling</div>
				</div>
				
				<div class="activity-history">
					<table class="history-table">
						<thead>
							<tr>
								<th>Activity</th>
								<th>Date</th>
								<th>Duration</th>
								<th>Calories</th>
								<th>Points</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Morning Run</td>
								<td>Today, 7:30 AM</td>
								<td>45 min</td>
								<td>420 cal</td>
								<td>+45</td>
							</tr>
							<tr>
								<td>Strength Training</td>
								<td>Yesterday, 6:00 PM</td>
								<td>60 min</td>
								<td>380 cal</td>
								<td>+60</td>
							</tr>
							<tr>
								<td>Evening Walk</td>
								<td>Yesterday, 8:00 PM</td>
								<td>30 min</td>
								<td>180 cal</td>
								<td>+15</td>
							</tr>
							<tr>
								<td>Cycling</td>
								<td>Jul 10, 5:30 PM</td>
								<td>75 min</td>
								<td>550 cal</td>
								<td>+75</td>
							</tr>
							<tr>
								<td>Yoga Session</td>
								<td>Jul 10, 7:00 AM</td>
								<td>40 min</td>
								<td>220 cal</td>
								<td>+40</td>
							</tr>
							<tr>
								<td>HIIT Workout</td>
								<td>Jul 9, 6:15 PM</td>
								<td>35 min</td>
								<td>410 cal</td>
								<td>+50</td>
							</tr>
							<tr>
								<td>Morning Run</td>
								<td>Jul 9, 7:00 AM</td>
								<td>50 min</td>
								<td>480 cal</td>
								<td>+55</td>
							</tr>
							<tr>
								<td>Swimming</td>
								<td>Jul 8, 5:00 PM</td>
								<td>60 min</td>
								<td>520 cal</td>
								<td>+70</td>
							</tr>
							<tr>
								<td>Strength Training</td>
								<td>Jul 8, 7:30 AM</td>
								<td>55 min</td>
								<td>390 cal</td>
								<td>+65</td>
							</tr>
							<tr>
								<td>Evening Walk</td>
								<td>Jul 7, 8:30 PM</td>
								<td>40 min</td>
								<td>220 cal</td>
								<td>+20</td>
							</tr>
							<tr>
								<td>Cycling</td>
								<td>Jul 7, 6:00 PM</td>
								<td>90 min</td>
								<td>650 cal</td>
								<td>+90</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<!-- Settings Section -->
			<div class="tab-content" id="settings-tab">
				<h2 class="section-title">Account Settings</h2>
				
				<div class="settings-card">
					<h3 class="settings-header"><i class="fas fa-user-cog"></i> Profile Settings</h3>
					<div class="settings-option">
						<span>Change Avatar</span>
						<button class="btn btn-secondary" id="change-avatar">
							<i class="fas fa-user-edit"></i> Change
						</button>
					</div>
					<div class="settings-option">
						<span>Change Username</span>
						<button class="btn btn-secondary">
							<i class="fas fa-edit"></i> Change
						</button>
					</div>
					<div class="settings-option">
						<span>Change Email</span>
						<button class="btn btn-secondary">
							<i class="fas fa-envelope"></i> Change
						</button>
					</div>
					<div class="settings-option">
						<span>Change Password</span>
						<button class="btn btn-secondary">
							<i class="fas fa-lock"></i> Change
						</button>
					</div>
				</div>
				
				<div class="settings-card">
					<h3 class="settings-header"><i class="fas fa-bell"></i> Notification Settings</h3>
					<div class="settings-option">
						<span>Activity Reminders</span>
						<label class="toggle-switch">
							<input type="checkbox" checked>
							<span class="slider"></span>
						</label>
					</div>
					<div class="settings-option">
						<span>Challenge Updates</span>
						<label class="toggle-switch">
							<input type="checkbox" checked>
							<span class="slider"></span>
						</label>
					</div>
					<div class="settings-option">
						<span>Friend Activities</span>
						<label class="toggle-switch">
							<input type="checkbox">
							<span class="slider"></span>
						</label>
					</div>
					<div class="settings-option">
						<span>Weekly Reports</span>
						<label class="toggle-switch">
							<input type="checkbox" checked>
							<span class="slider"></span>
						</label>
					</div>
				</div>
				
				<div class="settings-card">
					<h3 class="settings-header"><i class="fas fa-palette"></i> Theme Settings</h3>
					<div class="theme-selector">
						<div class="theme-option theme-blue selected"></div>
						<div class="theme-option theme-green"></div>
						<div class="theme-option theme-orange"></div>
						<div class="theme-option theme-purple"></div>
						<div class="theme-option theme-red"></div>
						<div class="theme-option theme-dark"></div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Notification -->
		<div class="notification notification-success">
			<div class="notification-icon">
				<i class="fas fa-check"></i>
			</div>
			<div class="notification-content">
				<h4>Activity Logged!</h4>
				<p>You earned 15 points for running</p>
			</div>
		</div>

		<!-- Avatar Modal -->
		<div class="modal" id="avatar-modal">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Choose Your Avatar</h3>
					<button class="close-modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="avatar-selector">
						<div class="avatar-option">AJ</div>
						<div class="avatar-option">MJ</div>
						<div class="avatar-option">SW</div>
						<div class="avatar-option">DK</div>
						<div class="avatar-option">RB</div>
						<div class="avatar-option">IT</div>
						<div class="avatar-option">ER</div>
						<div class="avatar-option">OP</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Workout Complete Modal -->
		<div class="modal" id="workout-complete-modal">
			<div class="modal-content">
				<div class="modal-body">
					<div class="workout-completed">
						<div class="completed-icon">
							<i class="fas fa-trophy"></i>
						</div>
						<h2>Workout Completed!</h2>
						<p>You've earned <strong>60 points</strong> for your effort</p>
						<p>Keep up the great work!</p>
						<button class="btn btn-primary" id="close-workout-modal">
							Continue
						</button>
					</div>
				</div>
			</div>
		</div>

		<script>
			// DOM Elements (Move all these to the top, for clarity)
const notification = document.querySelector('.notification');
const leaderboardContent = document.getElementById('leaderboard-content');
const usernameElement = document.getElementById('username');
const userAvatar = document.getElementById('user-avatar');
const profileAvatar = document.getElementById('profile-avatar');
const calorieChart = document.getElementById('calorie-chart');
const streakCalendar = document.querySelector('.streak-calendar');
const themeToggle = document.getElementById('theme-toggle');
const avatarModal = document.getElementById('avatar-modal');
const changeAvatarBtn = document.getElementById('change-avatar');
const workoutCompleteModal = document.getElementById('workout-complete-modal');
const closeWorkoutModal = document.getElementById('close-workout-modal');
const logSleepBtn = document.getElementById('log-sleep');
const friendsActivity = document.getElementById('friends-activity');

// Stats elements
const streakValue = document.getElementById('streak-value');
const challengesValue = document.getElementById('challenges-value');
const caloriesValue = document.getElementById('calories-value');
const distanceValue = document.getElementById('distance-value');


// Wait for the document to fully load
document.addEventListener('DOMContentLoaded', function() {
const activityCards = document.querySelectorAll('.activity-card');
const increaseGoalBtn = document.getElementById('increase-goal');
const decreaseGoalBtn = document.getElementById('decrease-goal');
const progressBar = document.getElementById('progress-bar');
const goalValue = document.getElementById('goal-value');
const stepsValue = document.getElementById('steps-value');
const pointsValue = document.getElementById('points-value');
const levelValue = document.getElementById('level-value');
const waterAmount = document.getElementById('water-amount');
const waterPlusBtn = document.getElementById('water-plus');
const waterMinusBtn = document.getElementById('water-minus');
const tabs = document.querySelectorAll('.tab');
const tabContents = document.querySelectorAll('.tab-content');
const closeModalBtns = document.querySelectorAll('.close-modal');
const avatarOptions = document.querySelectorAll('.avatar-option');
const themeOptions = document.querySelectorAll('.theme-option');
const startWorkoutBtn = document.getElementById('start-workout');
const workoutStartBtns = document.querySelectorAll('.start-btn');
const challengeJoinButtons = document.querySelectorAll('.challenge-card .btn'); //Moved here
const rewardRedeemButtons = document.querySelectorAll('.reward-card .btn'); //Moved here

// Initial state
let steps = 8342;
let goal = 10000;
let points = 1250;
let level = 7;
let streak = 12;
let activeChallenges = 5;
let calories = 3840;
let distance = 42.5;
let waterCount = 5;
let currentUser = null;
let currentTheme = 'light';
let currentAvatar = 'AJ';
let workoutInProgress = false;

// Simulated database
const users = [
{ id: 1, name: "Alex Johnson", initials: "AJ", points: 1250, level: 7, activities: 42 },
{ id: 2, name: "Sarah Williams", initials: "SW", points: 2450, level: 12, activities: 68 },
{ id: 3, name: "Michael Chen", initials: "MC", points: 1980, level: 10, activities: 57 },
{ id: 4, name: "Emma Rodriguez", initials: "ER", points: 1750, level: 9, activities: 49 },
{ id: 5, name: "David Kim", initials: "DK", points: 1620, level: 8, activities: 45 },
{ id: 6, name: "Olivia Parker", initials: "OP", points: 1420, level: 7, activities: 40 },
{ id: 7, name: "James Wilson", initials: "JW", points: 1320, level: 7, activities: 38 },
{ id: 8, name: "Sophia Martinez", initials: "SM", points: 1280, level: 7, activities: 37 },
{ id: 9, name: "Robert Brown", initials: "RB", points: 1180, level: 6, activities: 34 },
{ id: 10, name: "Isabella Taylor", initials: "IT", points: 1050, level: 6, activities: 31 }
];

// Friends activity data
const friends = [
{ name: "Sarah Williams", activity: "Just ran 5km", time: "10 min ago" },
{ name: "Michael Chen", activity: "Completed yoga session", time: "25 min ago" },
{ name: "David Kim", activity: "Achieved new personal best", time: "1 hour ago" },
{ name: "Emma Rodriguez", activity: "Finished cycling challenge", time: "2 hours ago" },
{ name: "Olivia Parker", activity: "Logged morning workout", time: "3 hours ago" }
];

// Initialize
login();
renderCalorieChart();
renderStreakCalendar();
renderFriendsActivity();

// Simulate login
function login() {
// In a real app, this would come from the login form
currentUser = users[0]; // Set first user as logged in
if (usernameElement) usernameElement.textContent = currentUser.name;
if (userAvatar) userAvatar.textContent = currentUser.initials;
if (profileAvatar) profileAvatar.textContent = currentUser.initials;
updateUI();
renderLeaderboard();
}

// Update all UI elements
function updateUI() {
if (!currentUser) return;

// Update progress bar
const percentage = Math.min(100, (steps / goal) * 100);
if (progressBar) {
progressBar.style.width = `${percentage}%`;
progressBar.textContent = `${Math.round(percentage)}%`;
}

// Update values
if (goalValue) goalValue.textContent = goal.toLocaleString();
if (stepsValue) stepsValue.textContent = steps.toLocaleString();
if (pointsValue) pointsValue.textContent = points.toLocaleString();
if (levelValue) levelValue.textContent = `Level ${level}`;
if (waterAmount) waterAmount.textContent = waterCount;

// Update stats
if (streakValue) streakValue.textContent = streak;
if (challengesValue) challengesValue.textContent = activeChallenges;
if (caloriesValue) caloriesValue.textContent = calories.toLocaleString();
if (distanceValue) distanceValue.textContent = distance.toLocaleString();
}

// Render leaderboard
function renderLeaderboard() {
if (!leaderboardContent) return;

// Sort users by points
const sortedUsers = [...users].sort((a, b) => b.points - a.points);

leaderboardContent.innerHTML = '';

sortedUsers.forEach((user, index) => {
const row = document.createElement('div');
row.className = `leaderboard-row ${user.id === currentUser.id ? 'current-user' : ''}`;

let rankClass = '';
if (index === 0) rankClass = 'rank-1';
if (index === 1) rankClass = 'rank-2';
if (index === 2) rankClass = 'rank-3';

row.innerHTML = `
<div class="rank ${rankClass}">${index + 1}</div>
<div class="user-detail">
<div class="user-avatar">${user.initials}</div>
<div>${user.name}</div>
</div>
<div class="points-col">${user.points.toLocaleString()} pts</div>
<div class="level-col">Level ${user.level}</div>
<div class="activity-col">${user.activities} activities</div>
`;

leaderboardContent.appendChild(row);
});
}

// Render friends activity
function renderFriendsActivity() {
if (!friendsActivity) return;

friendsActivity.innerHTML = '';

friends.forEach(friend => {
const row = document.createElement('div');
row.className = 'leaderboard-row';

row.innerHTML = `
<div class="user-detail">
<div class="user-avatar">${friend.name.split(' ').map(n => n[0]).join('')}</div>
<div>
<div><strong>${friend.name}</strong></div>
<div>${friend.activity}</div>
</div>
</div>
<div style="color: var(--gray); font-size: 0.9rem;">${friend.time}</div>
`;

friendsActivity.appendChild(row);
});
}

// Show notification
function showNotification(message, pointsEarned, type = 'success') {
const content = notification.querySelector('.notification-content');
content.querySelector('h4').textContent = message;
content.querySelector('p').textContent = pointsEarned >= 0
? `You earned ${pointsEarned} points!`
: `You redeemed ${Math.abs(pointsEarned)} points`;

// Update notification type
notification.className = 'notification';
notification.classList.add('notification-' + type);

notification.classList.add('show');

setTimeout(() => {
notification.classList.remove('show');
}, 3000);
}

// Log activity
function logActivity(activity) {
let pointsEarned = 0;
let message = '';
let stepsAdded = 0;

switch (activity) {
case 'walk':
pointsEarned = 30;
message = 'Walking logged!';
stepsAdded = 2000;
distance += 1.5;
calories += 120;
break;
case 'run':
pointsEarned = 45;
message = 'Running logged!';
stepsAdded = 3000;
distance += 3.0;
calories += 280;
break;
case 'cycle':
pointsEarned = 36;
message = 'Cycling logged!';
stepsAdded = 1500;
distance += 5.0;
calories += 220;
break;
case 'workout':
pointsEarned = 20;
message = 'Workout logged!';
stepsAdded = 1000;
calories += 180;
break;
}

// Update values
steps += stepsAdded;
points += pointsEarned;
currentUser.points = points;
currentUser.activities++;

// Check for level up
if (points >= level * 200) {
level++;
currentUser.level = level;
// Show level up notification after a delay
setTimeout(() => {
showNotification('Level Up!', level, 'info');
}, 3500);
}

// Update UI
updateUI();
renderLeaderboard();

// Show notification
showNotification(message, pointsEarned);
}

// Adjust goal
function adjustGoal(direction) {
if (direction === 'increase' && goal < 20000) {
goal += 1000;
} else if (direction === 'decrease' && goal > 5000) {
goal -= 1000;
}
updateUI();
}

// Adjust water intake
function adjustWater(direction) {
if (direction === 'increase' && waterCount < 10) {
waterCount++;
points += 5; // Reward for hydration
showNotification('Hydration Bonus!', 5, 'info');
} else if (direction === 'decrease' && waterCount > 0) {
waterCount--;
}
updateUI();
}

// Render calorie chart
function renderCalorieChart() {
if (!calorieChart) return;

const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
const values = [1800, 2100, 1950, 2300, 2000, 2400, 1900];

calorieChart.innerHTML = '';

days.forEach((day, index) => {
const bar = document.createElement('div');
bar.className = 'chart-bar';

// Random height between 50% and 100%
const height = Math.floor(30 + Math.random() * 70);
const value = values[index];

bar.innerHTML = `
<div class="bar-fill" style="height: ${height}%"></div>
<div class="bar-value">${value}</div>
<div class="chart-label">${day}</div>
`;

calorieChart.appendChild(bar);
});
}

// Render streak calendar
function renderStreakCalendar() {
if (!streakCalendar) return;

streakCalendar.innerHTML = '';

// Get current date
const today = new Date();
const year = today.getFullYear();
const month = today.getMonth();
const firstDay = new Date(year, month, 1);
const lastDay = new Date(year, month + 1, 0);

// Days in month
const daysInMonth = lastDay.getDate();

// Create calendar days
for (let i = 1; i <= daysInMonth; i++) {
const day = document.createElement('div');
day.className = 'calendar-day';
day.textContent = i;

// Mark today
if (i === today.getDate()) {
day.classList.add('today');
}

// Mark active days (random for demo)
if (i <= today.getDate() && Math.random() > 0.3) {
day.classList.add('active');
}

streakCalendar.appendChild(day);
}
}

// Toggle theme
function toggleTheme() {
if (currentTheme === 'light') {
document.documentElement.classList.add('dark-theme');
themeToggle.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
currentTheme = 'dark';
} else {
document.documentElement.classList.remove('dark-theme');
themeToggle.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
currentTheme = 'light';
}
}

// Change theme
function changeTheme(theme) {
// Remove all theme classes
document.documentElement.classList.remove('dark-theme');

if (theme === 'dark') {
document.documentElement.classList.add('dark-theme');
themeToggle.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
currentTheme = 'dark';
} else {
themeToggle.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
currentTheme = 'light';
}
}

// Change avatar
function changeAvatar(avatar) {
currentAvatar = avatar;
if (userAvatar) userAvatar.textContent = avatar;
if (profileAvatar) profileAvatar.textContent = avatar;
closeModal(avatarModal);
}

// Open modal
function openModal(modal) {
modal.classList.add('active');
}

// Close modal
function closeModal(modal) {
modal.classList.remove('active');
}

// Start workout
function startWorkout() {
workoutInProgress = true;
if (startWorkoutBtn) {
startWorkoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Workout in Progress';
startWorkoutBtn.disabled = true;
}

// Simulate workout duration
setTimeout(() => {
workoutComplete();
}, 3000);
}

// Complete workout
function workoutComplete() {
workoutInProgress = false;
if (startWorkoutBtn) {
startWorkoutBtn.innerHTML = '<i class="fas fa-play"></i> Start Workout';
startWorkoutBtn.disabled = false;
}

// Award points
points += 60;
currentUser.points = points;
calories += 380;
currentUser.activities++;

// Update UI
updateUI();
renderLeaderboard();

// Show completion modal
openModal(workoutCompleteModal);
}

// Log sleep
function logSleep() {
points += 20;
currentUser.points = points;
updateUI();
showNotification('Sleep Logged!', 20, 'info');
}

// Tab switching
tabs.forEach(tab => {
tab.addEventListener('click', () => {
// Remove active class from all tabs
tabs.forEach(t => t.classList.remove('active'));
tabContents.forEach(c => c.classList.remove('active'));

// Add active class to clicked tab
tab.classList.add('active');

// Show corresponding content
const tabId = tab.getAttribute('data-tab') + '-tab';
document.getElementById(tabId).classList.add('active');
});
});

// Event listeners
activityCards.forEach(card => {
card.addEventListener('click', () => {
// Add visual feedback
card.style.transform = 'scale(0.95)';
setTimeout(() => {
card.style.transform = '';
}, 200);

// Log activity
const activity = card.getAttribute('data-activity');
logActivity(activity);
});
});

if (increaseGoalBtn) increaseGoalBtn.addEventListener('click', () => adjustGoal('increase'));
if (decreaseGoalBtn) decreaseGoalBtn.addEventListener('click', () => adjustGoal('decrease'));
if (waterPlusBtn) waterPlusBtn.addEventListener('click', () => adjustWater('increase'));
if (waterMinusBtn) waterMinusBtn.addEventListener('click', () => adjustWater('decrease'));
if (themeToggle) themeToggle.addEventListener('click', toggleTheme);
if (changeAvatarBtn) changeAvatarBtn.addEventListener('click', () => openModal(avatarModal));
closeModalBtns.forEach(btn => {
btn.addEventListener('click', () => closeModal(avatarModal));
});
avatarOptions.forEach(option => {
option.addEventListener('click', () => {
changeAvatar(option.textContent);
});
});
themeOptions.forEach(option => {
option.addEventListener('click', () => {
// Remove selected class from all options
themeOptions.forEach(opt => opt.classList.remove('selected'));
// Add selected class to clicked option
option.classList.add('selected');

// Change theme based on class
if (option.classList.contains('theme-dark')) {
changeTheme('dark');
} else {
changeTheme('light');
}
});
});
if (startWorkoutBtn) startWorkoutBtn.addEventListener('click', startWorkout);
if (closeWorkoutModal) closeWorkoutModal.addEventListener('click', () => closeModal(workoutCompleteModal));
workoutStartBtns.forEach(btn => {
btn.addEventListener('click', () => {
const workout = btn.getAttribute('data-workout');
showNotification(`${workout.charAt(0).toUpperCase() + workout.slice(1)} Started!`, 0, 'info');
btn.textContent = 'In Progress...';
btn.disabled = true;

// Simulate workout completion
setTimeout(() => {
btn.textContent = 'Completed';
btn.classList.remove('start-btn');
btn.classList.add('status-completed');
points += 20;
currentUser.points = points;
calories += 120;
updateUI();
showNotification(`${workout.charAt(0).toUpperCase() + workout.slice(1)} Completed!`, 20);
}, 2000);
});
});
if (logSleepBtn) logSleepBtn.addEventListener('click', logSleep);

// Join challenge buttons
challengeJoinButtons.forEach(button => {
button.addEventListener('click', function() {
if (this.textContent === 'Join Challenge') {
this.textContent = 'Challenge Joined!';
this.style.background = 'var(--success)';
activeChallenges++;

// Update UI
updateUI();

// Show notification
showNotification('Challenge Joined!', 0, 'info');
}
});
});

// Redeem reward buttons
rewardRedeemButtons.forEach(button => {
button.addEventListener('click', function() {
const rewardCost = parseInt(this.closest('.reward-card').querySelector('.reward-cost').textContent.match(/\d+/)[0]);

if (points >= rewardCost) {
points -= rewardCost;
currentUser.points = points;
this.textContent = 'Redeemed!';
this.disabled = true;

// Update UI
updateUI();
renderLeaderboard();

// Show notification
const rewardName = this.closest('.reward-card').querySelector('.reward-name').textContent;
showNotification(`${rewardName} Redeemed!`, -rewardCost, 'warning');
} else {
showNotification('Not enough points!', 0, 'warning');
}
});
});

// Simulate real-time updates
setInterval(() => {
// Randomly add steps
if (Math.random() > 0.7) {
steps += Math.floor(Math.random() * 50);
updateUI();
}

// Randomly complete challenges
if (Math.random() > 0.95 && activeChallenges > 0) {
const challengeCards = document.querySelectorAll('.challenge-card');
const randomIndex = Math.floor(Math.random() * challengeCards.length);
const challenge = challengeCards[randomIndex];
const progressBar = challenge.querySelector('.challenge-progress-fill');
const progressText = challenge.querySelector('.challenge-stats span:first-child');

// Update progress
if (progressBar.style.width !== '100%') {
const currentWidth = parseInt(progressBar.style.width);
const newWidth = Math.min(100, currentWidth + Math.floor(Math.random() * 20));
progressBar.style.width = `${newWidth}%`;

// Update text
if (progressText) {
const match = progressText.textContent.match(/(\d+)\/(\d+)/);
if (match) {
const current = parseInt(match[1]);
const total = parseInt(match[2]);
const newValue = Math.min(total, current + 1);
progressText.textContent = `${newValue}/${total}`;
}
}

// Check if challenge completed
if (newWidth === 100) {
points += 500;
currentUser.points = points;
activeChallenges--;
updateUI();
renderLeaderboard();
setTimeout(() => {
showNotification('Challenge Completed!', 500, 'info');
}, 1000);
}
}
}
}, 2000);
});

		</script>
	</body>
	</html>