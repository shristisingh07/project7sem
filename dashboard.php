<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login-signup.php");
    exit();
}

require 'db_connect.php';

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
    $conn->close();
    die("Error: " . $e->getMessage());
}

// Check subscription status
$is_premium = false;
if ($user['is_premium'] == 1) {
    $stmt = $conn->prepare("SELECT * FROM subscriptions WHERE user_id = ? AND end_date > NOW() AND status = 'active'");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $is_premium = ($result->num_rows > 0);
    $stmt->close();
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['go_premium']) ) {
	     if($user['is_premium']==0){?>
<script>
    jQuery(document).ready(function($) {
        // This will run automatically when page loads
        processPayment();
        
        function processPayment() {
            var paymentOption = 'netbanking';
            let billing_name = <?php echo json_encode($user['name']); ?>;
            let billing_mobile = <?php echo json_encode($user['phone']); ?>;
            let billing_email = <?php echo json_encode($user['email']); ?>;
            var shipping_name = <?php echo json_encode($user['name']); ?>;
            var shipping_mobile = <?php echo json_encode($user['phone']); ?>;
            var shipping_email = <?php echo json_encode($user['email']); ?>;
            var payAmount = '29';
                        
            var request_url = "razorpay/submitpayment.php";
            var formData = {
                billing_name: billing_name,
                billing_mobile: billing_mobile,
                billing_email: billing_email,
                shipping_name: shipping_name,
                shipping_mobile: shipping_mobile,
                shipping_email: shipping_email,
                paymentOption: paymentOption,
                payAmount: payAmount,
                action: 'payOrder'
            };
            
            $.ajax({
                type: 'POST',
                url: request_url,
                data: formData,
                dataType: 'json',
                encode: true,
            }).done(function(data) {
                if(data.res == 'success') {
                    var orderID = data.order_number;
                    var orderNumber = data.order_number;
                    var options = {
                        "key": data.razorpay_key,
                        "amount": data.userData.amount,
                        "currency": "INR",
                        "name": "VitaCare",
                        "description": data.userData.description,
                        "image": "http://localhost/VitaCare1/7thsemproject/img/logo.png",
                        "order_id": data.userData.rpay_order_id,
                        "handler": function(response) {
                            window.location.replace("razorpay/payment-success.php?oid="+orderID+"&rp_payment_id="+response.razorpay_payment_id+"&rp_signature="+response.razorpay_signature);
                        },
                        "modal": {
                            "ondismiss": function() {
                                window.location.replace("dashboard.php?oid="+orderID);
                            }
                        },
                        "prefill": {
                            "name": data.userData.name,
                            "email": data.userData.email,
                            "contact": data.userData.mobile
                        },
                        "notes": {
                            "address": ''
                        },
                        "config": {
                            "display": {
                                "blocks": {
                                    "banks": {
                                        "name": 'Pay using '+paymentOption,
                                        "instruments": [{
                                            "method": paymentOption
                                        }],
                                    },
                                },
                                "sequence": ['block.banks'],
                                "preferences": {
                                    "show_default_blocks": true,
                                },
                            },
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    
                    var rzp1 = new Razorpay(options);
                    
                    rzp1.on('payment.failed', function(response) {
                        window.location.replace("razorpay/payment-failed.php?oid="+orderID+"&reason="+response.error.description+"&paymentid="+response.error.metadata.payment_id);
                    });
                    
                    rzp1.open();
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Payment processing failed: ", textStatus, errorThrown);
                // You might want to redirect to a failure page or show an error message
            });
        }
    });
</script>
       <?php }
       if($user['is_premium']==1){
        $conn->close();
        header("Location: userpanel.php");
        exit();
       }
	}
    
    if (isset($_POST['start_free'])) {
        $conn->close();
        header("Location:index.php");
        exit();
    }
	// In your login handler
if(password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['is_premium'] = $user['is_premium']; // Make sure this is set!
    
    if ($_SESSION['is_premium'] == 1) {
        header("Location: userpanel.php");
    } else {
        header("Location: dashboard.php");
    }
    exit();
}
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>विtaCare Subscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: rgb(180, 151, 131);
            --secondary-color: rgb(160, 131, 111);
            --light-bg: rgba(245, 240, 235, 0.9);
            --premium-glow: rgba(255, 215, 0, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f0eb;
            background-image: linear-gradient(135deg, rgba(180, 151, 131, 0.1) 0%, rgba(245, 240, 235, 0.8) 50%, rgba(180, 151, 131, 0.1) 100%);
            background-size: 200% 200%;
            animation: gradientBackground 15s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 100;
        }

        .brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
            position: relative;
            z-index: 10;
        }

        .welcome-section {
            text-align: center;
            margin-bottom: 3rem;
        }

        .welcome-text {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        .plan-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .plan-card {
            background: var(--light-bg);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(180, 151, 131, 0.2);
            position: relative;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        /* Premium card specific styles */
        .plan-card:nth-child(2) {
            animation: float 3s ease-in-out infinite;
            border: 1px solid rgba(255, 215, 0, 0.3);
        }

        .plan-card:nth-child(2)::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border-radius: 20px;
            background: linear-gradient(45deg, 
                rgba(255,215,0,0.1) 0%, 
                rgba(255,255,255,0.3) 50%, 
                rgba(255,215,0,0.1) 100%);
            z-index: -1;
            animation: glow 3s ease-in-out infinite alternate;
        }

        .plan-card:nth-child(2) .plan-icon {
            background: linear-gradient(135deg, #FFD700, #FFA500);
        }

        .plan-card:nth-child(2) .btn {
            background: linear-gradient(135deg, #FFD700, #FFA500);
            box-shadow: 0 4px 15px rgba(255, 165, 0, 0.3);
        }

        .plan-card:nth-child(2) .btn:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            transform: translateY(-2px) scale(1.02);
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
            }
            100% {
                box-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            }
        }

        .plan-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .plan-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: all 0.3s ease;
        }

        .plan-title {
            font-size: 1.5rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        .plan-price {
            font-size: 2rem;
            color: var(--secondary-color);
            margin: 1rem 0;
            font-weight: 700;
        }

        .plan-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .plan-features li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #555;
        }

        .plan-features i {
            color: var(--primary-color);
        }

        .plan-card:nth-child(2) .plan-features i {
            color: #FFD700;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 1rem;
            text-align: center;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .start_free{
            margin-top: 100px;
        }

        .btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        
        /* Payment Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .close-modal {
            font-size: 1.5rem;
            cursor: pointer;
            color: #777;
        }
        
        .payment-form {
            display: grid;
            gap: 1rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .form-group label {
            font-weight: 600;
            color: #555;
        }
        
        .form-group input {
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .form-row {
            display: flex;
            gap: 1rem;
        }
        
        .form-row .form-group {
            flex: 1;
        }

        /* Logo styling */
        .navbar img {
            filter: drop-shadow(0 0 5px rgba(180, 151, 131, 0.3));
            transition: all 0.3s ease;
        }

        .navbar img:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 0 8px rgba(180, 151, 131, 0.5));
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
		<img loading="lazy" style="width:6rem; height:6rem;"src="img/logo.png" class="attachment-full size-full" alt="" decoding="async" />
        <div class="brand welcome-text">Welcome to Your Fitness Journey, <span style="text-transform:uppercase;"><?= $user['name'] ?>!</span></div>

        <div class="user-menu">
            <div class="user-avatar"><?= htmlspecialchars(strtoupper(substr($user['name'], 0, 1)))?></div>
            <span><?= htmlspecialchars($user['name']) ?></span>
        </div>
    </nav>
    <div class="container">
        <div class="welcome-section">
            <!-- Welcome text is now in the navbar -->
        </div>

        <div class="plan-cards">
            <div class="plan-card">
                <div class="plan-header">
                    <div class="plan-icon"><i class="fas fa-dumbbell"></i></div>
                    <div class="plan-title">Free Plan</div>
                </div>
                <div class="plan-price">₹0<span>/month</span></div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i>Basic Workouts</li>
                    <li><i class="fas fa-check"></i>Basic Stress Relief Game Support</li>
                    <li><i class="fas fa-check"></i>Basic Recipes</li>
                    <li><i class="fas fa-check"></i>AI Chatboot</li>
                    <li><i class="fas fa-check"></i>Community Support</li>
                </ul>
                <form method="post">
                    <button type="submit" name="start_free" class="btn start_free">Start Free</button>
                </form>
            </div>

            <div class="plan-card">
                <div class="plan-header">
                    <div class="plan-icon"><i class="fas fa-crown"></i></div>
                    <div class="plan-title">Premium Plan</div>
                </div>
                <div class="plan-price">₹29<span>/month</span></div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i>All Premium Workouts</li>
                    <li><i class="fas fa-check"></i>Personal Training</li>
                    <li><i class="fas fa-check"></i>Advanced Recipes TipS</li>
                    <li><i class="fas fa-check"></i>Relaxation Tips</li>
                    <li><i class="fas fa-check"></i>Personal AI Chatboot</li>
                    <li><i class="fas fa-check"></i>Diet Plans</li>
                    <li><i class="fas fa-check"></i>Priority Support</li>
                </ul>
                <form method="post">
                    <button type="submit" name="go_premium" class="btn">Go Premium</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
