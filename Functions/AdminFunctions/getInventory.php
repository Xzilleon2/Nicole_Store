<?php
include __DIR__ . '../../../imports/DBConnection.php';

$getInventoryQuery = "
    SELECT p.NAME, p.PRICE, i.STACK_QUANTITY, p.CATEGORY, i.RESTOCK_DATE
    FROM inventory i
    JOIN products p ON i.PRODUCT_ID = p.PRODUCT_ID
    ORDER BY p.NAME ASC
";
$stmt = $conn->prepare($getInventoryQuery);
$stmt->execute();
$getInventory = $stmt->get_result();
?>
