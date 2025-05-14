<?php
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProduct'])) {
    // Sanitize inputs
    $product_id = (int) $_POST['product_id'];
    $name = trim($_POST['name']);
    $price = (float) $_POST['price'];
    $stock = (int) $_POST['stock'];
    $category = trim($_POST['category']);

    // Update product info in `products` table
    $updateProductQuery = "UPDATE products SET NAME = ?, PRICE = ?, CATEGORY = ? WHERE PRODUCT_ID = ?";
    $stmtProduct = $conn->prepare($updateProductQuery);
    $stmtProduct->bind_param("sdsi", $name, $price, $category, $product_id);
    $stmtProduct->execute();

    // Update stock in `inventory` table
    $updateInventoryQuery = "UPDATE inventory SET STACK_QUANTITY = ? WHERE PRODUCT_ID = ?";
    $stmtInventory = $conn->prepare($updateInventoryQuery);
    $stmtInventory->bind_param("ii", $stock, $product_id);
    $stmtInventory->execute();

    // Check for success
    if ($stmtProduct->affected_rows >= 0 || $stmtInventory->affected_rows >= 0) {
        echo "<script>
            alert('Product updated successfully!');
            window.location.href = '../../frames/DashboardAdmin.php';
        </script>";
    } else {
        echo "<script>
            alert('Update failed. Please try again.');
            window.history.back();
        </script>";
    }

    // Close connections
    $stmtProduct->close();
    $stmtInventory->close();
    $conn->close();
}
?>
