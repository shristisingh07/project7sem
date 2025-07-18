<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'db_connect.php';

$error = '';
$showLogin = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $_POST['password'];

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
                header("Location: dashboard.php");
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
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // Phone number validation
        $phone = preg_replace('/[^0-9]/', '', $_POST['phone']); // Remove non-digits
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
                // More detailed error message for debugging
                $error = "Signup failed: " . $stmt->error;
                $showLogin = false;
            }
            $stmt->close();
        }
    }
    $conn->close();
}

ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitNest - Fitness Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<style>
		/* Navigation Styles */
 * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
		        .form-toggle {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem; /* Reduced margin */
        }

.main-title-section-wrapper {
            height: 40vh !important; /* Fixed banner height */
            display: flex;
            align-items: center;
            position: relative;
        }

.main-nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.main-nav ul li {
    margin-left: 2rem;
}

.main-nav ul li a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: color 0.3s ease;
}

.main-nav ul li a:hover {
    color: #764ba2;
}

/* Banner Styles */


.banner-content {
    text-align: center;
}

.banner-content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.breadcrumb {
    font-size: 0.9rem;
}

.breadcrumb a {
    color: #fff;
    text-decoration: none;
}

.breadcrumb .separator {
    margin: 0 0.5rem;
}

.breadcrumb .current {
    color: #ccc;
}

/* Main Content */
.main-content {
    padding: 4rem 0;
}

.auth-container {
            max-width: 400px;
            margin: 2rem auto;
            padding: 1.5rem; /* Reduced padding */
            min-height: auto; /* Remove fixed height */
        }
        
        .hidden {
            display: none;
        }

        .mantras-custom-auth-register-alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
	
	</style>
</head>

<?php include("nav1.php"); ?>

<body class="page-template page-template-elementor_header_footer page page-id-4449 wp-custom-logo theme-mantras has-go-to-top mantras-plus-1.0.2 mantras-pro-1.0.0 woocommerce-no-js tribe-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-mantras wvs-show-label wvs-tooltip tinvwl-theme-style elementor-default  elementor-kit-14  elementor-page-4449">

     <?php nav1(); ?>
    <section class="main-title-section-wrapper aligncenter" >
        <div class="main-title-section-container">
            <div class="container">
                <div class="main-title-section"><h1>Registration/LogIn</h1></div>
                <div class="breadcrumb">
                    <a href="index.php">Home</a>
                    <span class="breadcrumb-default-delimiter"></span>
                    <span class="current">Registration/LogIn</span>
                </div>
            </div>
        </div>
        <div class="main-title-section-bg"></div>
    </section>
	    <div class="container auth-container">
            <!-- Login Form -->
		<div id="loginForm1" class="<?= $showLogin ? '' : 'hidden' ?>">
        <div class="mantras-custom-auth-column dt-sc-full-width wdt-registration-form" >
            <div class="mantras-custom-auth-sc-border-title"><h2><span>Login Form</span></h2></div>
            <?php if($error): ?>
                <div class="mantras-custom-auth-register-alert"><?= $error ?></div>
            <?php endif; ?>


            <form id="loginForm" method="POST" >
                <div class="form-group">
                    <input type="email" name="email" required>
                    <label>Email Address</label>
                </div>
                <div class="form-group">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <p class="toggle-link">Don't have an account? <a href="#" onclick="showSignup(); return false;">Sign Up</a></p>
            </form>
        </div>
        </div>
            <!-- Registration Form -->
             <div id="signupForm1" class="<?= !$showLogin ? '' : 'hidden' ?>">
        <div class="mantras-custom-auth-column dt-sc-full-width wdt-registration-form" >
            <div class="mantras-custom-auth-sc-border-title"><h2><span>Registration Form</span></h2></div>
            <?php if($error): ?>
                <div class="mantras-custom-auth-register-alert"><?= $error ?></div>
            <?php endif; ?>

            <form id="signupForm" method="POST" >
                <p>
                    <input type="text" name="user_name" id="user_name" class="input" required 
                           placeholder="Username *">
                </p>
                <p>
                    <input type="email" name="user_email" id="user_email" class="input" required 
                           placeholder="Email Id *">
                </p>
				<p>
                    <input type="password" name="password" id="password" class="input" required 
                           placeholder="Password *">
                </p>
				<p>
                    <input type="text" name="phone" placeholder="Mobile Number (digits only)" required>
                </p>
                <p class="submit">
                    <input type="submit" name="signup" class="button-primary mantras-custom-auth-register-button" 
                           value="Register">
                </p>
                <p class="toggle-link">Already have an account? <a href="#" onclick="showLogin(); return false;">Login</a></p>
            </form>
        </div>
        </div>
    </div>
	
    <?php include("footer.php"); ?>
    <?php footer(); ?>
	 
    <script>
        function showLogin() {
            document.getElementById('signupForm1').classList.add('hidden');
            document.getElementById('loginForm1').classList.remove('hidden');
        }

        function showSignup() {
            document.getElementById('loginForm1').classList.add('hidden');
            document.getElementById('signupForm1').classList.remove('hidden');
        }
        
        // Add input validation for phone number
        document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>