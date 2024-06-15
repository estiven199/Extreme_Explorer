<?php

include (__DIR__ . '/../../services/customers.php');

// Ensure the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: /Extreme_Explorer/pages/login/login.php');
    exit();
}

// Get user data
$userId = $_SESSION['user_id'];
$user = getUserById($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer - Profile</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/profile/profile.css">
</head>
<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>

    <div class="profile-container">
        <h1>Manage Profile</h1>
        <?php if (isset($error)) { echo '<p class="error">' . $error . '</p>'; } ?>
        <?php if (isset($_GET['success'])) { echo '<p class="success">Profile updated successfully!</p>'; } ?>
        <?php if (isset($_GET['deleted'])) { echo '<p class="success">Profile deleted successfully!</p>'; } ?>
        <form action="/Extreme_Explorer/services/customers.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['firstName']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['lastName']); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male" <?php if ($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($user['gender'] == 'other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sport">Sport of Interest:</label>
                    <input type="text" id="sport" name="sport" value="<?php echo htmlspecialchars($user['interest']); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" value="<?php echo htmlspecialchars($user['country']); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['mobile']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate:</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($user['birthdate']); ?>" required>
                </div>
            </div>
            <div class="form-group-btns">
                <button type="submit" class="submit-btn" name="update_profile">Update Profile</button>
                <button type="submit" class="delete-btn" name="delete_profile" onclick="return confirm('Are you sure you want to delete your profile?');">Delete Profile</button>
            </div>
        </form>
    </div>
    <?php include (__DIR__ . '/../../components/footer/footer.html'); ?>
</body>
</html>
