<?php
include ("nav1.php");
?>
<?php
include ("footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitaCare Contact Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3.2.0/dist/email.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
		:root {
            
            --vc-about-brown: black;
            
           
            
           
        }
        
        .contact-page-wrapper {
            background:#f9f9f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #333;
        }
        
        .container {
            width: 100%;
            max-width: 500px;
            animation: fadeIn 0.8s ease-out;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: white;
            padding: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 80%;
            margin: 0 auto;
        }
        
        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
            overflow: hidden;
            padding: 40px;
            border: 2px solid rgba(255,255,255,0.3);
            position: relative;
        }
        
        .form-container::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(45deg, #00c9ff, #92fe9d, #00c9ff);
            background-size: 400%;
            border-radius: 25px;
            z-index: -1;
            animation: glowing 12s linear infinite;
            opacity: 0.7;
        }
        
        .input-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 15px;
            padding-left: 10px;
        }
        
        .input-group input, .input-group textarea {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5ee;
            border-radius: 15px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s;
            background-color: #f8f9fa;
        }
        
        .input-group input:focus, .input-group textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
        }
        
        .input-group input:disabled {
            background-color: #e9ecef;
            color: #495057;
            cursor: not-allowed;
        }
        
        .input-group i {
            position: absolute;
            right: 20px;
            top: 43px;
            color: #7f8c8d;
        }
        
        textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        button {
            background: linear-gradient(to right, #1a2980, #26d0ce);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 16px 30px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(38, 208, 206, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(38, 208, 206, 0.4);
        }
        
        button:active {
            transform: translateY(1px);
        }
        
        button::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }
        
        button:hover::after {
            left: 100%;
        }
        
        button i {
            margin-left: 8px;
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #2ecc71;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transform: translateX(200%);
            transition: transform 0.4s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification.error {
            background: #e74c3c;
        }
        
        .notification.info {
            background: #3498db;
        }
        
        .email-preview {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin-top: 25px;
            border: 1px solid #e1e5ee;
            display: none;
        }
        
        .email-preview h3 {
            margin-bottom: 15px;
            color: #1a2980;
            border-bottom: 2px solid #26d0ce;
            padding-bottom: 10px;
        }
        
        .email-preview p {
            margin: 8px 0;
            line-height: 1.5;
        }
        
        .email-preview .message-content {
            background: white;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #26d0ce;
            margin-top: 10px;
        }
        
        .footer {
            text-align: center;
            margin-top: 20px;
            color: white;
            font-size: 0.9rem;
            opacity: 0.9;
            padding: 10px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes glowing {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }
        
        @media (max-width: 600px) {
            .form-container {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .header p {
                font-size: 1rem;
            }
        }
        
        /* Setup instructions */
        .setup-instructions {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            margin-top: 25px;
            border-left: 4px solid #1a2980;
        }
        
        .setup-instructions h3 {
            color: #1a2980;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .setup-instructions ol {
            padding-left: 20px;
            margin-bottom: 15px;
        }
        
        .setup-instructions li {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        
        .setup-instructions a {
            color: #1a2980;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 1px dashed #1a2980;
        }
        
        .setup-instructions a:hover {
            border-bottom-style: solid;
        }
        
        /* Loading spinner */
        .spinner {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
		/* Light Banner Styles */
        .vc-about-main-title-section-wrapper {
            background: var(--vc-about-cream) 100%);
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid rgba(169, 134, 92, 0.15);
        }
        
        .vc-about-main-title-section-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%23a9865c" opacity="0.05"/><path d="M0 50 Q 25 30, 50 50 T 100 50" stroke="%23a9865c" stroke-width="0.3" fill="none"/></svg>');
            background-size: cover;
            z-index: 0;
        }
        
        .vc-about-main-title-section h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--vc-about-brown);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .vc-about-main-title-section h1::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background-color: var(--vc-about-brown);
            border-radius: 2px;
        }
    </style>
</head>
<body class="page-template page-template-elementor_header_footer page page-id-4409 wp-custom-logo theme-mantras has-go-to-top mantras-plus-1.0.2 mantras-pro-1.0.0 woocommerce-no-js tribe-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-mantras wvs-show-label wvs-tooltip tinvwl-theme-style elementor-default elementor-template-full-width elementor-kit-14 elementor-page elementor-page-4409">
   
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <?php
nav1();
?>
<section class="vc-about-main-title-section-wrapper aligncenter" style="background-color:#c5ae96;height:25rem;  margin-bottom:2.4rem;">
        <div class="vc-about-main-title-section-container" >
            <div class="vc-about-container"   >
                <div class="vc-about-main-title-section"><h1>Contact Us</h1></div>
                <div class="vc-about-breadcrumb"><a href="index.php">Home-</a><span class="breadcrumb-default-delimiter"></span><span class="vc-about-current">Contact Us</span></div>
            </div>
        </div>
    </section>
    <!-- Wrapper for the contact form -->
	<div class="header">
                <h1><i class="fas fa-heartbeat"></i> Contact VitaCare</h1>
                <p   style="color:black;">Send us your queries and feedback. Messages are sent to vitacare1102@gmail.com</p>
            </div>
    <div class="contact-page-wrapper"  >
		
        <div class="container"  style="display:flex; justify-content:center;">
            
            
            <div class="form-container"   style="width:40rem;">
                <form id="contactForm">
                    <div class="input-group">
                        <label for="username"><i class="fas fa-user"></i> User Name</label>
                        <input type="text" id="username" name="username" placeholder="Ajeet Singh">
                        <i class="fas fa-user"></i>
                    </div>
                    
                    <div class="input-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" id="email" name="email" placeholder="rahul.sharma@example.com">
                        <i class="fas fa-envelope"></i>
                    </div>
                    
                    <div class="input-group">
                        <label for="date"><i class="fas fa-calendar"></i> Current Date</label>
                        <input type="text" id="date" name="date">
                        <i class="fas fa-calendar"></i>
                    </div>
                    
                    <div class="input-group">
                        <label for="message"><i class="fas fa-comment-medical"></i> Your Message</label>
                        <textarea id="message" name="message" placeholder="Type your message here..." required></textarea>
                    </div>
                    
                    <button type="submit" id="submitBtn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
                
                <div class="email-preview" id="emailPreview">
                    <h3><i class="fas fa-envelope"></i> Email Preview</h3>
                    <p><strong>To:</strong> vitacare1102@gmail.com</p>
                    <p><strong>From:</strong> <span id="preview-email"></span></p>
                    <p><strong>Date:</strong> <span id="preview-date"></span></p>
                    <p><strong>Message:</strong></p>
                    <div class="message-content" id="preview-message"></div>
                </div>
            </div>
            
            
        </div>
    </div>
    
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i> <span id="notification-text">Message sent successfully to vitacare1102@gmail.com!</span>
    </div>
	</div>
	<?php
footer();
?>
</div>
    <script>
        // Initialize EmailJS with your User ID
        (function() {
            emailjs.init("arKiwep9wHJEsV_CE");
        })();

        // Set current date
        const now = new Date();
        const formattedDate = now.toLocaleDateString('en-IN', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        document.getElementById('date').value = formattedDate;
        
        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const date = document.getElementById('date').value;
            const message = document.getElementById('message').value;
            
            // Validate message
            if (!message.trim()) {
                showNotification("Please enter a message before sending", true);
                return;
            }
            
            // Disable button during submission
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner spinner"></i> Sending...';
            
            // Show email preview
            document.getElementById('preview-email').textContent = email;
            document.getElementById('preview-date').textContent = date;
            document.getElementById('preview-message').textContent = message;
            document.getElementById('emailPreview').style.display = 'block';
            
            // EmailJS template ID
            const templateID = "template_w5j23ox";
            
            // Send email using EmailJS
            emailjs.send('service_5ydq22j', templateID, {
                username: username,
                email: email,
                date: date,
                message: message,
                to_email: 'vitacare1102@gmail.com'
            })
            .then(function(response) {
                console.log('SUCCESS!', response.status, response.text);
                showNotification("Message sent successfully to vitacare1102@gmail.com!");
                
                // Reset form after 3 seconds
                setTimeout(() => {
                    document.getElementById('message').value = '';
                    document.getElementById('emailPreview').style.display = 'none';
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
                }, 3000);
            }, function(error) {
                console.log('FAILED...', error);
                showNotification("Failed to send message. Please try again later.", true);
                
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
            });
        });
        
        // Show notification function
        function showNotification(message, isError = false, isInfo = false) {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notification-text');
            const icon = notification.querySelector('i');
            
            notificationText.textContent = message;
            
            // Reset classes
            notification.classList.remove('error', 'info');
            
            // Set appropriate class and icon
            if (isError) {
                notification.classList.add('error');
                icon.className = 'fas fa-exclamation-circle';
            } else if (isInfo) {
                notification.classList.add('info');
                icon.className = 'fas fa-info-circle';
            } else {
                icon.className = 'fas fa-check-circle';
            }
            
            notification.classList.add('show');
            
            // Hide notification after 4 seconds
            setTimeout(() => {
                notification.classList.remove('show');
            }, 4000);
        }
        
    </script>
</body>
</html>

