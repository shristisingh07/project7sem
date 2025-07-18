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
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>Premium विtaChat Bot</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        /* Importing Google Fonts - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        :root {
            /* Premium dark theme colors */
            --text-color: #edf3ff;
            --subheading-color: #97a7ca;
            --placeholder-color: #c3cdde;
            --primary-color: #0a0f1a;
            --secondary-color: rgba(40, 48, 69, 0.8);
            --secondary-hover-color: rgba(51, 62, 88, 0.9);
            --scrollbar-color: #626a7f;
            --accent-color: #4d7fff;
            --accent-hover: #3a6af5;
            --bot-avatar-bg: rgba(77, 127, 255, 0.15);
            --premium-gradient: linear-gradient(135deg, #4d7fff, #8f6fff);
            --user-name-color: #ffcc00;
        }

        body.light-theme {
            /* Premium light theme colors */
            --text-color: #090c13;
            --subheading-color: #7b8cae;
            --placeholder-color: #606982;
            --primary-color: #f3f7ff;
            --secondary-color: rgba(220, 230, 249, 0.8);
            --secondary-hover-color: rgba(210, 221, 242, 0.9);
            --scrollbar-color: #a2aac2;
            --accent-color: #1d7efd;
            --accent-hover: #0264e3;
            --bot-avatar-bg: rgba(29, 126, 253, 0.15);
            --premium-gradient: linear-gradient(135deg, #1d7efd, #8f6fff);
            --user-name-color: #d4af37;
        }

        body {
            color: var(--text-color);
            background: var(--primary-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(77, 127, 255, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(143, 111, 255, 0.05) 0%, transparent 20%);
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: rgba(40, 48, 69, 0.8);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .light-theme .login-container {
            background: rgba(220, 230, 249, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .login-container h2 {
            margin-bottom: 25px;
            background: var(--premium-gradient);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2rem;
        }

        .login-form .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
            color: var(--subheading-color);
            font-size: 0.9rem;
        }

        .login-form input {
            width: 100%;
            padding: 14px;
            background: rgba(20, 25, 40, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--text-color);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .light-theme .login-form input {
            background: rgba(200, 210, 230, 0.5);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .login-form input:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(77, 127, 255, 0.2);
        }

        .login-form button {
            width: 100%;
            padding: 14px;
            background: var(--premium-gradient);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-form button:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(77, 127, 255, 0.3);
        }

        .error-message {
            color: #ff6b7d;
            margin-bottom: 20px;
            padding: 10px;
            background: rgba(255, 107, 125, 0.1);
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .premium-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(10, 15, 26, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            z-index: 100;
        }

        .light-theme .premium-header {
            background: rgba(243, 247, 255, 0.7);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--premium-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            color: white;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--user-name-color);
            position: relative;
            display: inline-block;
        }

        .user-name::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--premium-gradient);
            border-radius: 1px;
            animation: underlinePulse 2s infinite;
        }

        @keyframes underlinePulse {
            0% { width: 100%; }
            50% { width: 70%; }
            100% { width: 100%; }
        }

        .user-status {
            font-size: 0.85rem;
            color: var(--subheading-color);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .premium-indicator {
            background: var(--premium-gradient);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 15px rgba(77, 127, 255, 0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(77, 127, 255, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(77, 127, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(77, 127, 255, 0); }
        }

        .container {
            overflow-y: auto;
            padding: 100px 0 100px;
            max-height: calc(100vh - 127px);
            scrollbar-color: var(--scrollbar-color) transparent;
            flex: 1;
            position: relative;
        }

        .container::-webkit-scrollbar {
            width: 8px;
        }

        .container::-webkit-scrollbar-thumb {
            background: var(--scrollbar-color);
            border-radius: 4px;
        }

        .container :where(.app-header, .suggestions, .message, .prompt-wrapper, .disclaimer-text) {
            margin: 0 auto;
            width: 100%;
            padding: 0 20px;
            max-width: 980px;
        }

        /* App header styling */
        .container .app-header {
            margin-top: 4vh;
            text-align: center;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .app-header .heading {
            font-size: 2.8rem;
            width: fit-content;
            margin: 0 auto;
            background: var(--premium-gradient);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            padding-bottom: 15px;
        }

        .app-header .heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 4px;
            background: var(--premium-gradient);
            border-radius: 2px;
        }

        .app-header .sub-heading {
            font-size: 1.4rem;
            margin-top: 15px;
            color: var(--subheading-color);
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        /* Suggestions list stylings */
        .container .suggestions {
            display: flex;
            gap: 20px;
            margin-top: 8vh;
            list-style: none;
            overflow-x: auto;
            scrollbar-width: none;
            padding-bottom: 10px;
            animation: fadeIn 0.8s 0.3s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .suggestions::-webkit-scrollbar {
            display: none;
        }

        body.chats-active .container :where(.app-header, .suggestions) {
            display: none;
        }

        .suggestions .suggestions-item {
            width: 260px;
            padding: 22px;
            flex-shrink: 0;
            display: flex;
            cursor: pointer;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
            border-radius: 16px;
            background: var(--secondary-color);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .suggestions .suggestions-item:hover {
            background: var(--secondary-hover-color);
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .suggestions .suggestions-item .text {
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .suggestions .suggestions-item span {
            height: 50px;
            width: 50px;
            margin-top: 30px;
            display: flex;
            align-self: flex-end;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: var(--accent-color);
            background: var(--primary-color);
            font-size: 1.8rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .suggestions .suggestions-item:hover span {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .suggestions .suggestions-item:nth-child(1) span {
            color: #4d7fff;
        }
        .suggestions .suggestions-item:nth-child(2) span {
            color: #6fdc8c;
        }
        .suggestions .suggestions-item:nth-child(3) span {
            color: #ffc350;
        }
        .suggestions .suggestions-item:nth-child(4) span {
            color: #9a7bff;
        }

        /* Chats container styling */
        .container .chats-container {
            display: flex;
            gap: 25px;
            flex-direction: column;
            padding: 20px 0;
        }

        .chats-container .message {
            display: flex;
            gap: 15px;
            align-items: flex-start;
            animation: messageAppear 0.4s ease-out;
        }

        @keyframes messageAppear {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chats-container .bot-message .avatar {
            height: 48px;
            width: 48px;
            flex-shrink: 0;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--bot-avatar-bg);
            color: var(--accent-color);
            font-size: 1.8rem;
            border: 1px solid rgba(77, 127, 255, 0.2);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .chats-container .bot-message .loading .avatar {
            animation: rotate 3s linear infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        .chats-container .message .message-text {
            padding: 16px 20px;
            word-wrap: break-word;
            white-space: pre-line;
            line-height: 1.6;
            border-radius: 18px;
            background: var(--secondary-color);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            max-width: 85%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            animation: textAppear 0.3s ease-out;
        }

        @keyframes textAppear {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .chats-container .bot-message {
            margin: 10px auto;
        }

        .chats-container .user-message {
            flex-direction: row-reverse;
            align-items: flex-end;
        }

        .chats-container .user-message .message-text {
            padding: 16px 20px;
            border-radius: 18px 18px 4px 18px;
            background: rgba(77, 127, 255, 0.15);
            color: var(--text-color);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .chats-container .user-message .img-attachment {
            width: 50%;
            margin-top: 10px;
            border-radius: 18px 4px 18px 18px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .chats-container .user-message .file-attachment {
            display: flex;
            gap: 8px;
            align-items: center;
            padding: 12px 18px;
            margin-top: 10px;
            border-radius: 18px 4px 18px 18px;
            background: rgba(77, 127, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: var(--text-color);
        }

        .chats-container .user-message .file-attachment span {
            color: var(--accent-color);
        }

        /* Prompt container stylings */
        .prompt-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px 0;
            background: rgba(10, 15, 26, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            z-index: 100;
        }

        .light-theme .prompt-container {
            background: rgba(243, 247, 255, 0.7);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .prompt-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
        }

        .prompt-form {
            flex: 1;
            display: flex;
            gap: 12px;
            height: 60px;
            align-items: center;
            background: rgba(40, 48, 69, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 0 5px 0 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .light-theme .prompt-form {
            background: rgba(220, 230, 249, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .prompt-form:focus-within {
            box-shadow: 0 10px 30px rgba(77, 127, 255, 0.3);
            border-color: rgba(77, 127, 255, 0.3);
        }

        .prompt-form .prompt-input {
            height: 100%;
            width: 100%;
            background: none;
            outline: none;
            border: none;
            font-size: 1.05rem;
            color: var(--text-color);
        }

        .prompt-form .prompt-input::placeholder {
            color: var(--placeholder-color);
        }

        .prompt-wrapper button {
            width: 50px;
            height: 50px;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            font-size: 1.5rem;
            flex-shrink: 0;
            color: var(--text-color);
            background-color: rgba(40, 48, 69, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .light-theme .prompt-wrapper button {
            background-color: rgba(220, 230, 249, 0.6);
        }

        .prompt-wrapper :is(button:hover, .file-icon, #cancel-file-btn) {
            background-color: var(--secondary-hover-color);
        }

        .prompt-form .prompt-actions {
            display: flex;
            gap: 8px;
            height: 100%;
            align-items: center;
        }

        .prompt-form #send-prompt-btn {
            color: white;
            display: none;
            background: var(--accent-color);
            box-shadow: 0 4px 15px rgba(77, 127, 255, 0.3);
        }

        .prompt-form #send-prompt-btn:hover {
            background: var(--accent-hover);
            transform: translateY(-2px);
        }

        .prompt-form #send-prompt-btn:disabled {
            background: #7b8cae;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .prompt-form .prompt-input:valid ~ .prompt-actions #send-prompt-btn {
            display: flex;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }

        .prompt-form .file-upload-wrapper {
            position: relative;
            height: 45px;
            width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prompt-form .file-upload-wrapper :where(button, img) {
            position: absolute;
            border-radius: 50%;
            object-fit: cover;
            display: none;
        }

        .prompt-form .file-upload-wrapper #add-file-btn,
        .prompt-form .file-upload-wrapper.active.img-attached img,
        .prompt-form .file-upload-wrapper.active.file-attached .file-icon,
        .prompt-form .file-upload-wrapper.active:hover #cancel-file-btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prompt-form .file-upload-wrapper.active #add-file-btn {
            display: none;
        }

        .prompt-form :is(#cancel-file-btn, #stop-response-btn:hover) {
            color: #ff6b7d;
        }

        .prompt-form .file-icon {
            color: var(--accent-color);
        }

        .prompt-form #stop-response-btn,
        body.bot-responding .prompt-form .file-upload-wrapper {
            display: none;
        }

        body.bot-responding .prompt-form #stop-response-btn {
            display: flex;
        }

        .prompt-container .disclaimer-text {
            text-align: center;
            font-size: 0.85rem;
            padding: 15px 20px 0;
            color: var(--placeholder-color);
            opacity: 0.8;
        }

        /* Responsive media query code for small screens */
        @media (max-width: 768px) {
            .container {
                padding: 140px 0 120px;
            }
            
            .premium-header {
                padding: 12px 15px;
            }
            
            .user-avatar {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            
            .user-name {
                font-size: 1.1rem;
            }

            .app-header .heading {
                font-size: 2.2rem;
            }

            .app-header .sub-heading {
                font-size: 1.2rem;
            }

            .suggestions {
                margin-top: 5vh;
            }

            .suggestions .suggestions-item {
                width: 220px;
                padding: 18px;
            }

            .prompt-wrapper {
                gap: 10px;
            }

            .prompt-form {
                height: 55px;
            }

            .prompt-wrapper button {
                width: 45px;
                height: 45px;
                font-size: 1.3rem;
            }
        }
		.go-back-button {
            background: rgba(77, 127, 255, 0.15);
            color: var(--accent-color);
            width: 45px;
            height: 45px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .go-back-button:hover {
            background: rgba(77, 127, 255, 0.25);
            transform: translateY(-2px);
        }
        
        .light-theme .go-back-button {
            background: rgba(29, 126, 253, 0.15);
            color: var(--accent-color);
        }
        
        .light-theme .go-back-button:hover {
            background: rgba(29, 126, 253, 0.25);
        }
    </style>
</head>
<body>
    <?php if ($showLogin): ?>
        <div class="login-container">
            <h2>विtaChat Pro - Premium Access</h2>
            
            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form class="login-form" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                
                <button type="submit" name="login">Login to Premium Chat</button>
            </form>
        </div>
    <?php else: ?>
        <div class="premium-header">
            <div class="user-info">
                <div class="user-avatar"><?php 
                    $names = explode(' ', $_SESSION['user_name']);
                    $initials = '';
                    foreach ($names as $name) {
                        $initials .= strtoupper(substr($name, 0, 1));
                    }
                    echo substr($initials, 0, 2);
                ?></div>
                <div class="user-details">
                    <div class="user-name"  style="text-transform:capitalize;"><?php echo $_SESSION['user_name']; ?></div>
                    <div class="user-status">
                        <span class="material-symbols-rounded">verified</span>
                        Premium Member
                    </div>
                </div>
            </div>
            <form method="post" style="display: flex; gap: 10px;">
                <div class="premium-indicator">
                    <span class="material-symbols-rounded">workspace_premium</span>
                    Premium Account
                </div>
				<a href="userpanel.php" class="go-back-button material-symbols-rounded" title="Go Back">arrow_back</a>
                <button type="submit" name="logout" class="material-symbols-rounded" style="background: rgba(255, 107, 125, 0.15); color: #ff6b7d; width: 45px; height: 45px; font-size: 1.5rem; display: flex; align-items: center; justify-content: center; border-radius: 50%; cursor: pointer;">logout</button>
            </form>
			
        </div>
        
        <div class="container">
            <!--App Header-->
            <header class="app-header">
                <h1 class="heading">विtaChat Pro</h1>
                <h2 class="sub-heading">Welcome back, <span class="user-name"  style="text-transform:capitalize;"><?php 
                    $names = explode(' ', $_SESSION['user_name']);
                    echo $names[0];
                ?></span>! How can I assist you today?</h2>
            </header>

            <!--Suggestions List-->
            <ul class="suggestions">
    <li class="suggestions-item">
        <p class="text">Design a morning yoga routine for back pain relief</p>
        <span class="material-symbols-rounded">draw</span>
    </li>
    <li class="suggestions-item">
        <p class="text">How to create personalized meditation playlists for stress management</p>
        <span class="material-symbols-rounded">lightbulb</span>
    </li>
    <li class="suggestions-item">
        <p class="text">Suggest therapeutic soundscapes for migraine relief</p>
        <span class="material-symbols-rounded">explore</span>
    </li>
    <li class="suggestions-item">
        <p class="text">Create a healthy meal planner component with recipe suggestions</p>
        <span class="material-symbols-rounded">code_blocks</span>
    </li>
</ul>

            <!--Chats Container-->
            <div class="chats-container">
            </div>
        </div>

        <!-- Prompt Container -->
        <div class="prompt-container">
            <div class="prompt-wrapper">
                <form action="#" class="prompt-form">
                    <input type="text" placeholder="Ask विtaChat ..." class="prompt-input" required>
                    <div class="prompt-actions">
                        <!-- File upload wrapper -->
                        <div class="file-upload-wrapper">
                            <img src="#" alt="" class="file-preview">
                            <input type="file" accept="image/*, .pdf, .txt, .csv" id="file-input" hidden>
                            <button type="button" class="file-icon material-symbols-rounded">description</button>
                            <button id="add-file-btn" type="button" class="material-symbols-rounded">attach_file</button>
                            <button id="cancel-file-btn" type="button" class="material-symbols-rounded">close</button>
                        </div>
                        <button id="stop-response-btn" type="button" class="material-symbols-rounded">stop_circle</button>
                        <button id="send-prompt-btn" class="material-symbols-rounded">arrow_upward</button>
                    </div>
                </form>

                <button id="theme-toggle-btn" class="material-symbols-rounded">light_mode</button>
                <button id="delete-chats-btn" class="material-symbols-rounded">delete</button>
            </div>

            <p class="disclaimer-text">विtaChat can make mistakes, so double-check its responses.</p>
        </div>

        <script>
            const container = document.querySelector(".container");
            const chatsContainer = document.querySelector(".chats-container");
            const promptForm = document.querySelector(".prompt-form");
            const promptInput = promptForm.querySelector(".prompt-input");
            const fileInput = promptForm.querySelector("#file-input");
            const fileUploadWrapper = promptForm.querySelector(".file-upload-wrapper");
            const themeToggle = document.querySelector("#theme-toggle-btn");
            const deleteChatsBtn = document.querySelector("#delete-chats-btn");
            const sendPromptBtn = document.querySelector("#send-prompt-btn");

            // API setup
            const API_KEY ="AIzaSyB9646JvnWuMoyFxGbOm-WS8SavpgCx5D4";
            const API_URL =`https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${API_KEY}`;

            let typingInterval, controller;
            const chatHistory = [];
            const userData = { message: "", file: {} };

            // Scroll to bottom of the container
            const scrollToBottom = () => {
                container.scrollTo({
                    top: container.scrollHeight,
                    behavior: "smooth"
                });
            }

            // Simulating typing effect for bot responses
            const typingEffect = (text, textElement, botMsgDiv) => {
                textElement.textContent = "";
                const words = text.split(" ");
                let wordIndex = 0;

                // Set an interval to type each word 
                typingInterval = setInterval(() => {
                    if (wordIndex < words.length) {
                        textElement.textContent += (wordIndex === 0 ? "" : " ") + words[wordIndex++];
                        scrollToBottom();
                    } else {
                        clearInterval(typingInterval);
                        botMsgDiv.classList.remove("loading");
                        document.body.classList.remove("bot-responding");
                        sendPromptBtn.disabled = false;
                    }
                }, 40);
            }

            // Make the API call and generate the bot's response
            const generateResponse = async (botMsgDiv) => {
                const textElement = botMsgDiv.querySelector(".message-text");
                controller = new AbortController();

                // Add user message and file data to the chat history
                chatHistory.push({
                    role: "user",
                    parts: [{ text: userData.message }, ...(userData.file.data ? [{ inline_data: (({ fileName, isImage, ...rest }) => rest)(userData.file) }] : [])]
                });
                
                try {
                    // Send the chat history to the API to get a response
                    const response = await fetch(API_URL, {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ contents: chatHistory }),
                        signal: controller.signal
                    });

                    const data = await response.json();
                    if (!response.ok) throw new Error(data.error.message);

                    // Process the response text and display with typing effect
                    const responseText = data.candidates[0].content.parts[0].text.replace(/\*\*([^*]+)\*\*/g, "$1").trim();
                    typingEffect(responseText, textElement, botMsgDiv);

                    chatHistory.push({ role: "model", parts: [{ text: responseText }] });
                } catch (error) {
                    textElement.style.color = "#ff6b7d";
                    textElement.textContent = error.name === "AbortError" ? "Response generation stopped." : error.message;
                    botMsgDiv.classList.remove("loading");
                    document.body.classList.remove("bot-responding");
                    sendPromptBtn.disabled = false;
                } finally {
                    userData.file = {};
                }
            }

            // Handle the form submission
            const handleFormSubmit = (e) => {
                e.preventDefault();
                const userMessage = promptInput.value.trim();
                if (!userMessage || document.body.classList.contains("bot-responding")) return;

                promptInput.value = "";
                userData.message = userMessage;
                document.body.classList.add("bot-responding", "chats-active");
                fileUploadWrapper.classList.remove("active", "img-attached", "file-attached");
                sendPromptBtn.disabled = true;

                // Generate user message HTML and add in the chats container
                const userMsgHTML = `
                    <p class="message-text"></p>
                    ${userData.file.data ? (userData.file.isImage ? 
                        `<img src="data:${userData.file.mime_type};base64,${userData.file.data}" class="img-attachment" />` : 
                        `<p class="file-attachment"><span class="material-symbols-rounded">description</span>${userData.file.fileName}</p>`) : ""}
                `;

                const userMsgDiv = document.createElement("div");
                userMsgDiv.classList.add("message", "user-message");
                userMsgDiv.innerHTML = userMsgHTML;
                userMsgDiv.querySelector(".message-text").textContent = userMessage;
                chatsContainer.appendChild(userMsgDiv);
                scrollToBottom();

                setTimeout(() => {
                    // Generate bot message HTML and add in the chats container after 600ms
                    const botMsgHTML = `<div class="avatar material-symbols-rounded">smart_toy</div><p class="message-text">Thinking...</p>`;
                    const botMsgDiv = document.createElement("div");
                    botMsgDiv.classList.add("message", "bot-message", "loading");
                    botMsgDiv.innerHTML = botMsgHTML;
                    chatsContainer.appendChild(botMsgDiv);
                    scrollToBottom();
                    generateResponse(botMsgDiv);
                }, 600);
            }

            // Handle file input change (file upload)
            fileInput.addEventListener("change", () => {
                const file = fileInput.files[0];
                if (!file) return;

                const isImage = file.type.startsWith("image/");
                const reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = (e) => {
                    fileInput.value = "";
                    const base64String = e.target.result.split(",")[1]
                    fileUploadWrapper.querySelector(".file-preview").src = e.target.result;
                    fileUploadWrapper.classList.add("active", isImage ? "img-attached" : "file-attached");

                    // Store file data in userData obj
                    userData.file = {
                        fileName: file.name,
                        data: base64String,
                        mime_type: file.type,
                        isImage
                    }
                }
            });

            // Cancel file upload
            document.querySelector("#cancel-file-btn").addEventListener("click", () => {
                userData.file = {};
                fileUploadWrapper.classList.remove("active", "img-attached", "file-attached");
            });

            // Stop ongoing bot response
            document.querySelector("#stop-response-btn").addEventListener("click", () => {
                userData.file = {};
                controller?.abort();
                clearInterval(typingInterval);
                const loadingMsg = chatsContainer.querySelector(".bot-message.loading");
                if (loadingMsg) {
                    loadingMsg.classList.remove("loading");
                    loadingMsg.querySelector(".message-text").textContent = "Response stopped";
                    loadingMsg.querySelector(".message-text").style.color = "#ff6b7d";
                }
                document.body.classList.remove("bot-responding");
                sendPromptBtn.disabled = false;
            });

            // Delete all chats
            deleteChatsBtn.addEventListener("click", () => {
                chatHistory.length = 0;
                chatsContainer.innerHTML = "";
                document.body.classList.remove("bot-responding", "chats-active");
            });

            // Handle suggestions click
            document.querySelectorAll(".suggestions-item").forEach(item => {
                item.addEventListener("click", () => {
                    promptInput.value = item.querySelector(".text").textContent;
                    promptForm.dispatchEvent(new Event("submit"));
                });
            });

            // Show/hide controls for mobile on prompt input focus
            document.addEventListener("click", ({ target }) => {
                const wrapper = document.querySelector(".prompt-wrapper");
                const shouldHide = target.classList.contains("prompt-input") || 
                                  (wrapper.classList.contains("hide-controls") && 
                                  (target.id === "add-file-btn" || target.id === "stop-response-btn"));
                wrapper.classList.toggle("hide-controls", shouldHide);
            });

            // Toggle dark/light theme
            themeToggle.addEventListener("click", () => {
                const isLightTheme = document.body.classList.toggle("light-theme");
                localStorage.setItem("themeColor", isLightTheme ? "light_mode" : "dark_mode");
                themeToggle.textContent = isLightTheme ? "dark_mode" : "light_mode";
            });

            // Set initial theme from local storage
            const isLightTheme = localStorage.getItem("themeColor") === "light_mode";
            document.body.classList.toggle("light-theme", isLightTheme);
            themeToggle.textContent = isLightTheme ? "dark_mode" : "light_mode";

            promptForm.addEventListener("submit", handleFormSubmit);
            promptForm.querySelector("#add-file-btn").addEventListener("click", () => fileInput.click());
        </script>
    <?php endif; ?>
</body>
</html>