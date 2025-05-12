<?php
    //database inclusion
    include __DIR__ . '../../imports/DBConnection.php';

    //Upadte Profile Information
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['editProfBtn'])){

        $Email = $_POST['Email'];
        $Name = $_POST['FullName'];
        $Password = $_POST['Password'];
        $ContactNum = $_POST['ContactNumber'];
        $UserId = $_POST['user_id'];

        $ProfileQuery = "UPDATE users SET name = ?, email = ?, password = ?, Contact_Number = ? WHERE user_id = ?";
        $stmt = $conn->prepare($ProfileQuery);

        //Hash the new password
        $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

        try{

            //Binding the data
            $stmt ->bind_param("sssss", $Name,$Email, $hashed_password, $ContactNum, $UserId);
            $stmt ->execute();

            if ($stmt->affected_rows === 0) {
            echo "<script>alert('No changes were made.');</script>";
            }


            echo "<script>
            alert('Update Successful');
            window.location.href = '../frames/Homepage.php';
            </script>";
            exit();

        }catch(Exception $e){
            die('Error, Please Try Again'. $e ->getMessage());
        }
    }





?>