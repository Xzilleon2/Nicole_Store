<?php
    // Database inclusion
    include __DIR__ . '../../imports/DBConnection.php';

    // Update Profile Information
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['editProfBtn'])) {

        $Email = $_POST['Email'];
        $Name = $_POST['FullName'];
        $Password = $_POST['Password'];
        $ContactNum = $_POST['ContactNumber'];
        $UserId = $_POST['user_id'];

        // Start transaction
        $conn->begin_transaction();

        // Profile update query
        $ProfileQuery = "UPDATE customers SET NAME = ?, EMAIL = ?, PASSWORD = ?, CONTACT_NUMBER = ? WHERE CUSTOMER_ID = ?";
        $stmt = $conn->prepare($ProfileQuery);

        // Hash the new password
        $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

        try {
            // Binding the data
            $stmt->bind_param("sssss", $Name, $Email, $hashed_password, $ContactNum, $UserId);
            $stmt->execute();

            // Check if any rows were affected (to handle no changes)
            if ($stmt->affected_rows === 0) {
                echo "<script>alert('No changes were made.');</script>";
                $conn->rollback(); // Rollback if no changes were made
            } else {
                // Commit the transaction if update is successful
                $conn->commit();
                echo "<script>
                    alert('Update Successful');
                    window.location.href = '../frames/Homepage.php';
                </script>";
                exit();
            }

        } catch (Exception $e) {
            // Rollback the transaction if an error occurs
            $conn->rollback();
            die('Error, Please Try Again: ' . $e->getMessage());
        } finally {
            // Close prepared statement
            $stmt->close();
        }
    }
?>
