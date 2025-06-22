<?php
include __DIR__ . '../../../imports/DBConnection.php';

$getCustomersQuery = "
    SELECT CUSTOMER_ID, NAME, EMAIL, CONTACT_NUMBER, isACTIVE
    FROM customers
    ORDER BY NAME ASC
";
$stmt = $conn->prepare($getCustomersQuery);
$stmt->execute();
$getCustomers = $stmt->get_result();
?>
