<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

    //Login Process
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Sign_in'])){
        $Email = $_POST['email'];
        $Password = $_POST['password'];


        //Preparing the Query
        $LoginQuery = 'SELECT * FROM users WHERE email = ?';
        $stmt = $conn->prepare($LoginQuery);

        //Validating if No errors
        try{
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $userInfoResult = $stmt->get_result();

            if($userInfoResult->num_rows > 0){
                $row = $userInfoResult->fetch_assoc();

                if(password_verify($Password, $row['password'])){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['profname'] = strtoupper(substr(trim($row['name']), 0, 1));
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['Contact_Number'] = $row['Contact_Number'];
                    $_SESSION['user_id'] = $row['user_id'];

                    echo "<script>
                        alert('Login Successful');
                        window.location.href = '../../frames/Homepage.php';
                        </script>";
                        exit();             
                }
            }else{
                $_SESSION['Logmessage'] = 'Incorrect Email or Password';
                echo "<script>
                    window.location.href = '../../index.php';
                    </script>";
                    exit();
            }

        }catch(Exception $e){
            die("Attempt Failed". $e->getMessage());
        }

    }

?>