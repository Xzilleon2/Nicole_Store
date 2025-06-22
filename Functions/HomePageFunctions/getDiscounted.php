<?php
include __DIR__ . '../../../imports/DBConnection.php';

// Get current date
$today = date("Y-m-d");

// Retrieve Discounted Product Query
$getDiscountedQuery =   "
                        SELECT 
                            p.PRODUCT_ID, 
                            p.NAME, 
                            p.PRICE AS ORIGINAL_PRICE,
                            p.ImgURL, 
                            i.STACK_QUANTITY,
                            d.DISCOUNT_PERCENT,
                            ROUND(p.PRICE - (p.PRICE * d.DISCOUNT_PERCENT), 2) AS DISCOUNTED_PRICE
                        FROM 
                            products p
                        LEFT JOIN 
                            discounts d ON d.PRODUCT_ID = p.PRODUCT_ID
                        LEFT JOIN 
                            inventory i ON i.PRODUCT_ID = p.PRODUCT_ID
                        WHERE 
                            d.STATUS = 'Available' 
                            AND d.DATE_START <= ? 
                            AND d.DATE_END >= ?
                        ";


// Prepare the statement
if ($stmt = $conn->prepare($getDiscountedQuery)) {
    $stmt->bind_param("ss", $today, $today);
    $stmt->execute();
    $getDiscounted = $stmt->get_result();
} else {
    echo "Error: " . $conn->error;
}
?>
