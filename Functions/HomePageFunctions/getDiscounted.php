<?php
include __DIR__ . '../../../imports/DBConnection.php';

// Retrieve Discounted Product Query
$getDiscountedQuery = "SELECT p.PRODUCT_ID, p.NAME, p.PRICE, p.ImgURL, i.STACK_QUANTITY
                    FROM products p
                    LEFT JOIN inventory i ON p.PRODUCT_ID = i.PRODUCT_ID";


// Prepare the statement
if ($stmt = $conn->prepare($getDiscountedQuery)) {
    $stmt->execute();
    $getDiscounted = $stmt->get_result();
} else {
    echo "Error: " . $conn->error;
}
?>
