<?php
session_start();

if(isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-panel.php");
    exit();
}

$error = '';
require 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // सही टेबल नाम और कॉलम का उपयोग करें
    $result = $conn->query("SELECT * FROM admindetail
                          WHERE username = '$username' 
                          AND password = '$password'");

    if($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username']; // सीधे username लिया
        header("Location: admin-panel.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VitaCare Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #2A2F4F;
            --secondary: #917FB3;
            --accent: #E5BEEC;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .login-header h1 {
            color: var(--primary);
            font-size: 1.8rem;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 8px rgba(146, 127, 179, 0.3);
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .error-message {
            color: #dc3545;
            text-align: center;
            margin-top: 20px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h1>VitaCare Admin Portal</h1>
        </div>

        <form method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
                <i class="fas fa-user"></i>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>

            <button type="submit" class="login-btn">Sign In</button>

            <?php if($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>