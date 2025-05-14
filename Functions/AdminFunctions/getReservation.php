<?php
include __DIR__ . '../../../imports/DBConnection.php';

$getReservationsQuery = "
    SELECT 
        o.CODE, 
        GROUP_CONCAT(p.NAME SEPARATOR ', ') AS ITEMS, 
        c.NAME, 
        o.TOTAL_PRICE, 
        o.CLAIM_DATE, 
        o.STATUS
    FROM orders o
    JOIN customers c ON o.CUSTOMER_ID = c.CUSTOMER_ID
    JOIN reserveitems ri ON o.ORDER_ID = ri.ORDER_ID
    JOIN cart ct ON ri.CART_ID = ct.CART_ID
    JOIN products p ON ct.PRODUCT_ID = p.PRODUCT_ID
    GROUP BY o.ORDER_ID
    ORDER BY o.CLAIM_DATE DESC
";

$stmt = $conn->prepare($getReservationsQuery);
$stmt->execute();
$getReservations = $stmt->get_result();
?>
