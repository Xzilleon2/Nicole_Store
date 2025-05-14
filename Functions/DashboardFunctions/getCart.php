<?php
include __DIR__ . '../../../imports/DBConnection.php';

$customer_id = $_SESSION['user_id'];

$getCartQuery = "SELECT c.CART_ID, p.NAME, c.QUANTITY, c.TOTAL_PRICE, c.DATE_ADDED 
        FROM cart c
        JOIN products p ON c.PRODUCT_ID = p.PRODUCT_ID
        WHERE c.CUSTOMER_ID = ? ORDER BY p.NAME ASC";
$stmt = $conn->prepare($getCartQuery);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$getCart = $stmt->get_result();
?>
