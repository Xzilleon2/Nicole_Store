<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

// Login Process
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Sign_in'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    // Preparing the Query
    $LoginQuery = 'SELECT * FROM customers WHERE EMAIL = ?';
    $stmt = $conn->prepare($LoginQuery);

    // Validating if No errors
    try {
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $userInfoResult = $stmt->get_result();

        // Check if the email exists in the database
        if ($userInfoResult->num_rows > 0) {
            $row = $userInfoResult->fetch_assoc();

            // Verifying password
            if (password_verify($Password, $row['PASSWORD'])) {
                // Start the session and store user information
                $_SESSION['email'] = $row['EMAIL'];
                $_SESSION['name'] = $row['NAME'];
                $_SESSION['profname'] = strtoupper(substr(trim($row['NAME']), 0, 1));
                $_SESSION['role'] = $row['ROLE'];
                $_SESSION['Contact_Number'] = $row['CONTACT_NUMBER'];
                $_SESSION['user_id'] = $row['CUSTOMER_ID'];

                // Success: Redirect to the homepage
                echo "<script>
                    alert('Login Successful');
                    window.location.href = '../../frames/Homepage.php';
                    </script>";
                exit();
            } else {
                // Incorrect password
                $_SESSION['Logmessage'] = 'Incorrect Email or Password';
                echo "<script>
                    alert('Incorrect Email or Password');
                    window.location.href = '../../index.php';
                    </script>";
                exit();
            }
        } else {
            // Email not found
            $_SESSION['Logmessage'] = 'Incorrect Email or Password';
            echo "<script>
                alert('Incorrect Email or Password');
                window.location.href = '../../index.php';
                </script>";
            exit();
        }
    } catch (Exception $e) {
        // Handling database or other errors
        die("An error occurred while processing your request: " . $e->getMessage());
    }
}
?>
