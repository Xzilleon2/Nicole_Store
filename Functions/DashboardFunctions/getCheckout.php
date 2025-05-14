<?php
include __DIR__ . '../../../imports/DBConnection.php';

$customer_id = $_SESSION['user_id'];

$getCheckoutQuery = "SELECT CODE, QUANTITY, CALIM_DATE, STATUS 
        FROM orders 
        WHERE CUSTOMER_ID = ? ORDER BY CODE ASC";
$stmt = $conn->prepare($getCheckoutQuery);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$getCheckout = $stmt->get_result();
?>
