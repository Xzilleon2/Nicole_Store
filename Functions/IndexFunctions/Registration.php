<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

    //Registration Process
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Sign_up'])){
    $Email = $_POST['emailreg'];
    $FullName = $_POST['fullnamereg'];
    $Password = $_POST['passwordreg'];
    $RePassword = $_POST['Confirmpasswordreg'];
    $Role = 'customer';

    if($Password != $RePassword){
        $_SESSION['Regmessage'] = 'Password does not match!';
        echo "<script>
                window.location.href = '../../index.php';
                </script>";
                exit();
    }

    //Hashing the Password
    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

    //Preparing the Query
    $RegisterQuery = 'INSERT INTO users(email, name, password, role) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($RegisterQuery);

    //Validating if No errors
    try{
        $stmt->bind_param("ssss", $Email, $FullName, $hashed_password, $Role);
        $stmt->execute();
        echo "<script>
                alert('registration Successful');
                window.location.href = '../../index.php';
                </script>";
                exit();
    }catch(Exception $e){
        die("Attempt Failed". $e->getMessage());
    }

 }