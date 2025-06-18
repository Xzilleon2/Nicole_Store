<?php
include __DIR__ . '../../../imports/DBConnection.php';

// Set number of items per page
$limit = 9;

// Get the current page or default to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Count total items for pagination
$countResult = $conn->query("SELECT COUNT(*) AS total FROM products p JOIN inventory i ON p.PRODUCT_ID = i.PRODUCT_ID");
$totalItems = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $limit);

// Fetch paginated products
$getFeaturedQuery = "SELECT 
                        p.PRODUCT_ID,
                        p.NAME,
                        p.PRICE,
                        p.ImgURL,
                        i.STACK_QUANTITY
                    FROM 
                        products p
                    JOIN 
                        inventory i ON p.PRODUCT_ID = i.PRODUCT_ID
                    LIMIT ? OFFSET ?";

if ($stmt = $conn->prepare($getFeaturedQuery)) {
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $getFeatured = $stmt->get_result();
} else {
    echo "Error: " . $conn->error;
}
?>
