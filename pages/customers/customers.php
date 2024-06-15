<?php
include (__DIR__ . '/../../services/customers.php');

// Ensure the user is logged in and has admin role
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    header('Location: /Extreme_Explorer/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer - Manage Users</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/customers/customers.css">
</head>

<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>
   <div class="admin-container">
        <h1>Manage Users</h1>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Birthdate</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = getAllUsers($conn);
                if ($users->num_rows > 0) {
                    while ($row = $users->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['customerID'] . "</td>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['birthdate'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['mobile'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>
                                <form action='/Extreme_Explorer/services/customers.php' method='post'>
                                    <input type='hidden' name='customerID' value='" . $row['customerID'] . "'>
                                    <input type='hidden' name='action' value='update_status'>
                                    <select name='role' onchange='this.form.submit()'>
                                        <option value='user'" . ($row['role'] == 'user' ? ' selected' : '') . ">User</option>
                                        <option value='admin'" . ($row['role'] == 'admin' ? ' selected' : '') . ">Admin</option>
                                    </select>
                                </form>
                              </td>";
                        echo "<td>
                                <form action='/Extreme_Explorer/services/customers.php' method='post'>
                                    <input type='hidden' name='customerID' value='" . $row['customerID'] . "'>
                                    <input type='hidden' name='action' value='update_status'>
                                    <input type='checkbox' name='active' value='1'" . ($row['active'] == 1 ? ' checked' : '') . " onchange='this.form.submit()'>
                                </form>
                              </td>";
                        echo "<td>
                                <form action='/Extreme_Explorer/services/customers.php' method='post'>
                                    <input type='hidden' name='customerID' value='" . $row['customerID'] . "'>
                                    <input type='hidden' name='action' value='delete'>
                                    <button type='submit' class='delete-btn'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No registered users found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include (__DIR__ . '/../../components/footer/footer.html'); ?>
</body>

</html>

<?php
$conn->close();
?>