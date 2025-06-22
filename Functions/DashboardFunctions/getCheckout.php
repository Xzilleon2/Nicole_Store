<?php
include __DIR__ . '../../../imports/DBConnection.php';

$customer_id = $_SESSION['user_id'];

$getCheckoutQuery = "SELECT 
                        o.CODE AS ORDER_CODE,
                        p.NAME AS PRODUCT_NAME,
                        c.QUANTITY,
                        p.PRICE AS PRICE_PER_ITEM,
                        (c.QUANTITY * p.PRICE) AS TOTAL_ITEM_PRICE,
                        o.TOTAL_PRICE AS ORDER_TOTAL_PRICE,
                        o.CLAIM_DATE,
                        o.STATUS
                    FROM orders o
                    JOIN reserveitems r ON o.ORDER_ID = r.ORDER_ID
                    JOIN cart c ON r.CART_ID = c.CART_ID
                    JOIN products p ON c.PRODUCT_ID = p.PRODUCT_ID
                    WHERE o.CUSTOMER_ID = ?
                    ORDER BY o.ORDER_ID DESC";
$stmt = $conn->prepare($getCheckoutQuery);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$getCheckout = $stmt->get_result();
?>
