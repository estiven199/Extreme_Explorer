<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer - Registration</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/registration/registration.css">
</head>

<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>

    <?php
    // Array de imágenes aleatorias
    $random_images = ['random1.jpg', 'random2.jpg', 'random3.jpg'];
    // Seleccionar una imagen aleatoria
    $random_image = $random_images[array_rand($random_images)];
    ?>

    <div class="registration-container">
        <form action="/Extreme_Explorer/services/customers.php" method="post" enctype="multipart/form-data">
            <h1>Register</h1>
            <div class="form-row">
                <div class="form-group">
                    <label for="photo">Profile Photo:</label>
                    <img src="/Extreme_Explorer/public/banner-2.png" alt="Random Image" id="profilePhoto"
                        style="display:block; margin-bottom:10px;">
                    <input type="file" id="photo" name="photo" onchange="previewImage(event)">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sport">Sport of Interest:</label>
                    <input type="text" id="sport" name="sport" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate:</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn" name="action" value="create">Register</button>
            </div>
        </form>
    </div>
    <?php include (__DIR__ . '/../../components/footer/footer.html'); ?>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('profilePhoto');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>