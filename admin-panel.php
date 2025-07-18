<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

require 'db_connect.php';

$adminUsername = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'Admin';

// डेटा फ़ेच करें
$users = $conn->query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);
$subscriptions = $conn->query("SELECT s.*, u.name FROM subscriptions s JOIN users u ON s.user_id = u.id")->fetch_all(MYSQLI_ASSOC);
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ultimate Admin Panel - VitaCare</title>
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
            background: #f8f9fa;
        }

        .admin-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 100px auto 30px;
            padding: 0 20px;
        }

        .tab-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .tab-btn {
            padding: 12px 25px;
            border: none;
            background: var(--primary);
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        .tab-btn.active {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .data-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            opacity: 0;
            transform: translateY(20px);
            animation: sectionEntry 0.6s ease forwards;
        }
		
		
		.data-section {
    display: none;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s ease;
}

.data-section.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
    animation: sectionEntry 0.6s ease forwards;
}

@keyframes sectionEntry {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

        @keyframes sectionEntry {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th {
            background: var(--primary);
            color: white;
            padding: 15px;
            text-align: left;
        }

        .data-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: all 0.2s ease;
        }

        .data-table tr:hover td {
            background: var(--accent);
            transform: scale(1.02);
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            display: inline-block;
        }

        .active-status {
            background: #C8E6C9;
            color: #2E7D32;
        }

        .expired-status {
            background: #FFCDD2;
            color: #C62828;
        }

        .logout-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 12px 25px;
            background: var(--secondary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            background: var(--primary);
        }
		
		
		.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 3rem; /* पैडिंग बढ़ाई */
}

.admin-profile {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1.1rem;
    background: rgba(255,255,255,0.15);
    padding: 8px 20px;
    border-radius: 30px;
    backdrop-filter: blur(5px);
    transition: all 0.3s ease;
}

.admin-profile:hover {
    background: rgba(255,255,255,0.25);
}

.admin-profile i {
    font-size: 1.4rem;
}

.data-section {
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: all 0.4s ease;
    height: 0;
    overflow: hidden;
}

.data-section.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    height: auto;
    overflow: visible;
}
    </style>
</head>
<body>
   <header class="admin-header">
    <h1><i class="fas fa-user-shield"></i> VitaCare Admin Dashboard</h1>
    <div class="admin-profile">
        <i class="fas fa-user-circle"></i>
        <?php 
        // सीधे username दिखाएं
        echo isset($_SESSION['admin_username']) ? htmlspecialchars($_SESSION['admin_username']) : 'Admin'; 
        ?>
    </div>
</header>	
    <div class="container">
      <div class="tab-buttons">
    <button class="tab-btn" data-section="usersSection">
        <i class="fas fa-users"></i> Users
    </button>
    <button class="tab-btn" data-section="subscriptionsSection">
        <i class="fas fa-crown"></i> Subscriptions
    </button>
</div>

        <!-- Users Section -->
        <div class="data-section" id="usersSection">
            <h2>User Database <i class="fas fa-database"></i></h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= date('d M Y', strtotime($user['created_at'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Subscriptions Section -->
        <div class="data-section" id="subscriptionsSection">
            <h2>Premium Subscriptions <i class="fas fa-gem"></i></h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Duration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($subscriptions as $sub): ?>
                    <?php 
                        $endDate = new DateTime($sub['end_date']);
                        $today = new DateTime();
                        $status = $endDate > $today ? 'Active' : 'Expired';
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($sub['name']) ?></td>
                        <td>₹<?= number_format($sub['amount'], 2) ?></td>
                        <td>
                            <?= date('d M Y', strtotime($sub['start_date'])) ?> - 
                            <?= date('d M Y', strtotime($sub['end_date'])) ?>
                        </td>
                        <td>
                            <span class="status-badge <?= strtolower($status) ?>-status">
                                <?= $status ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    

    <script>
      
document.addEventListener('DOMContentLoaded', () => {
    // टैब बटन क्लिक इवेंट
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            // सभी बटन और सेक्शन रिसेट
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.data-section').forEach(section => section.classList.remove('active'));
            
            // एक्टिव बटन और सेक्शन
            button.classList.add('active');
            const targetSection = document.getElementById(button.dataset.section);
            targetSection.classList.add('active');
        });
    });

    // पहला बटन डिफ़ॉल्ट रूप से एक्टिव
    document.querySelector('.tab-btn').click();
});

    </script>
</body>
</html>

<?php 
session_unset();
session_destroy();
?>