<?php
session_start();
include (__DIR__ . '/../db_connect.php');

function createUser($firstName, $lastName, $birthdate, $gender, $address, $mobile, $email, $password, $country, $interest)
{
    global $conn;

    $sql = "SELECT * FROM customers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "Email is already registered.";
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customers (firstName, lastName, birthdate, gender, address, mobile, email, password, country, interest) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssss', $firstName, $lastName, $birthdate, $gender, $address, $mobile, $email, $hashedPassword, $country, $interest);

    if ($stmt->execute()) {
        return "User registered successfully!";
    } else {
        return "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

function getAllUsers($conn)
{
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);
    return $result;
}

function getUserById($userId)
{
    global $conn;
    $sql = "SELECT * FROM customers WHERE customerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function updateUser($userId, $firstName, $lastName, $birthdate, $gender, $address, $mobile, $email, $country, $interest, $role, $active)
{
    global $conn;
    $sql = "UPDATE customers SET firstName = ?, lastName = ?, birthdate = ?, gender = ?, address = ?, mobile = ?, email = ?, country = ?, interest = ?, role = ?, active = ? WHERE customerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssii', $firstName, $lastName, $birthdate, $gender, $address, $mobile, $email, $country, $interest, $role, $active, $userId);
    return $stmt->execute();
}

function updateUserStaus($userId, $role, $active)
{
    global $conn;
    $sql = "UPDATE customers SET  role = ?, active = ? WHERE customerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sii', $role, $active, $userId);
    return $stmt->execute();
}


function deleteUser($userId)
{
    global $conn;
    $sql = "DELETE FROM customers WHERE customerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userId);
    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $birthdate = $_POST['birthdate'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $mobile = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $country = $_POST['country'];
                $interest = $_POST['sport'];

                $message = createUser($firstName, $lastName, $birthdate, $gender, $address, $mobile, $email, $password, $country, $interest);

                if ($message == "User registered successfully!") {
                    header('Location: /Extreme_Explorer/pages/login/login.php');
                    exit();
                } else {
                    echo $message;
                }
                break;

            case 'update':
                $userId = $_POST['customerID'];
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $birthdate = $_POST['birthdate'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $mobile = $_POST['phone'];
                $email = $_POST['email'];
                $country = $_POST['country'];
                $interest = $_POST['sport'];
                $role = $_POST['role'];
                $active = isset($_POST['active']) ? 1 : 0;

                $updateSuccess = updateUser($userId, $firstName, $lastName, $birthdate, $gender, $address, $mobile, $email, $country, $interest, $role, $active);

                if ($updateSuccess) {
                    header('Location: /Extreme_Explorer/pages/customers/customers.php?success=1');
                    exit();
                } else {
                    echo "Error updating user.";
                }
                break;

            case 'update_status':
                $userId = $_POST['customerID'];
                $role = $_POST['role'];
                $active = isset($_POST['active']) ? 1 : 0;

                $updateSuccess = updateUserStaus($userId, $role, $active);

                if ($updateSuccess) {
                    header('Location: /Extreme_Explorer/pages/customers/customers.php?success=1');
                    exit();
                } else {
                    echo "Error updating user status.";
                }
                break;

            case 'delete':
                $userId = $_POST['customerID'];
                $deleteSuccess = deleteUser($userId);

                if ($deleteSuccess) {
                    header('Location: /Extreme_Explorer/pages/customers/customers.php?deleted=1');
                    exit();
                } else {
                    echo "Error deleting user.";
                }
                break;
        }
    }
}
?>