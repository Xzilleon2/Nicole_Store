<?php
include __DIR__ . '../../../imports/DBConnection.php';

// Retrieve Featured Product Query
$getFeaturedQuery = "   SELECT 
                            p.PRODUCT_ID,
                            p.NAME,
                            p.PRICE,
                            p.ImgURL,
                            i.STACK_QUANTITY
                        FROM 
                            products p
                        JOIN 
                            inventory i ON p.PRODUCT_ID = i.PRODUCT_ID
                        JOIN 
                            featureds f ON p.PRODUCT_ID = f.PRODUCT_ID
                        WHERE 
                            f.isFeatured = 1
                    ";

// Prepare the statement
if ($stmt = $conn->prepare($getFeaturedQuery)) {
    $stmt->execute();
    $getFeatured = $stmt->get_result();
} else {
    echo "Error: " . $conn->error;
}
?>
