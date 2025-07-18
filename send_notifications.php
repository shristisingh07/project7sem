<?php
require 'db_connect.php';

// Check if required data is present
if (!isset($_POST['user_id'], $_POST['medicine_name'], $_POST['dosage'], $_POST['time'], $_POST['frequency'])) {
    error_log("Missing data in notification request");
    echo json_encode(['status' => 'error', 'message' => 'Missing data']);
    exit;
}

// Get POST data
$user_id = $_POST['user_id'];
$medicine_name = $_POST['medicine_name'];
$dosage = $_POST['dosage'];
$time = $_POST['time'];
$frequency = $_POST['frequency'];

// Get user details
$stmt = $conn->prepare("SELECT email, phone FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($user) {
    // Prepare message
    $message = "VitaCare Medicine Reminder:\n";
    $message .= "Medicine: $medicine_name\n";
    $message .= "Dosage: $dosage\n";
    $message .= "Time: " . date('h:i A', strtotime($time)) . "\n";
    $message .= "Frequency: " . ucfirst($frequency);

    // Send email
    if (!empty($user['email'])) {
        $subject = "VitaCare: Time to take your medicine!";
        $headers = "From: reminders@vitacare.com";
        mail($user['email'], $subject, $message, $headers);
    }

    // Log WhatsApp (simulated)
    if (!empty($user['phone'])) {
        $logFile = 'whatsapp.log';
        $logEntry = "[" . date('Y-m-d H:i:s') . "] To: " . $user['phone'] . "\nMessage: $message\n\n";
        file_put_contents($logFile, $logEntry, FILE_APPEND);
    }
}

echo json_encode(['status' => 'success']);
?>