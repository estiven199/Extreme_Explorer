<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer - Contact</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/contact/contact.css">
</head>
<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>

    <div class="contact-container">
        <h1>Contact Us</h1>
        <div class="contact-info">
            <p><strong>Address:</strong> 123 Adventure Lane, Outdoor City, Australia</p>
            <p><strong>Phone:</strong> +61 123 456 789</p>
            <p><strong>Fax:</strong> +61 123 456 788</p>
            <p><strong>Email:</strong> contact@extremeexplorer.com</p>
        </div>
        <form action="process_contact.php" method="post">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Send Message</button>
            </div>
        </form>
    </div>
    
    <?php include (__DIR__ . '/../../components/footer/footer.html'); ?>
</body>
</html>
