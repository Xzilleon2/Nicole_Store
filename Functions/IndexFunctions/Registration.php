<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

// Registration Process
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Sign_up'])) {
    $Email = $_POST['emailreg'];
    $FullName = $_POST['fullnamereg'];
    $Password = $_POST['passwordreg'];
    $RePassword = $_POST['Confirmpasswordreg'];
    $Role = 'customer';

    if ($Password != $RePassword) {
        $_SESSION['Regmessage'] = 'Password does not match!';
        echo "<script>
                window.location.href = '../../index.php';
                </script>";
        exit();
    }

    // Hashing the Password
    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    // Start transaction
    $conn->begin_transaction();

    // Preparing the Query
    $RegisterQuery = 'INSERT INTO customers(EMAIL, NAME, PASSWORD, ROLE) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($RegisterQuery);

    try {
        // Bind parameters and execute
        $stmt->bind_param("ssss", $Email, $FullName, $hashed_password, $Role);
        $stmt->execute();

        // If the insert is successful, commit the transaction
        $conn->commit();
        
        echo "<script>
                alert('Registration Successful');
                window.location.href = '../../index.php';
                </script>";
        exit();
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();

        // Output the error
        die("Registration failed: " . $e->getMessage());
    } finally {
        // Close the prepared statement
        $stmt->close();
    }
}
?>
