<?php
session_start();
include (__DIR__ . '/../db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM customers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Start the session and store user info
            $_SESSION['logged_in'] = true;
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_id'] = $user['customerID'];
            $_SESSION['user_name'] = $user['firstName'] . ' ' . $user['lastName'];

            header('Location: /Extreme_Explorer/index.php');
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with this email.";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the login page with an error message
    header('Location: /Extreme_Explorer/pages/login/login.php?error=' . urlencode($error));
    exit();
}
?>
