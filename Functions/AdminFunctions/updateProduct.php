<?php
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProduct'])) {
    // Sanitize inputs
    $product_id = (int) $_POST['product_id'];
    $name = trim($_POST['name']);
    $price = (float) $_POST['price'];
    $stock = (int) $_POST['stock'];
    $category = trim($_POST['category']);

    try {
        // Begin transaction
        $conn->begin_transaction();

        // Update product info in `products` table
        $updateProductQuery = "UPDATE products SET NAME = ?, PRICE = ?, CATEGORY = ? WHERE PRODUCT_ID = ?";
        $stmtProduct = $conn->prepare($updateProductQuery);
        $stmtProduct->bind_param("sdsi", $name, $price, $category, $product_id);
        if (!$stmtProduct->execute()) {
            throw new Exception("Failed to update product info: " . $stmtProduct->error);
        }

        // Update stock in `inventory` table
        $updateInventoryQuery = "UPDATE inventory SET STACK_QUANTITY = ? WHERE PRODUCT_ID = ?";
        $stmtInventory = $conn->prepare($updateInventoryQuery);
        $stmtInventory->bind_param("ii", $stock, $product_id);
        if (!$stmtInventory->execute()) {
            throw new Exception("Failed to update inventory: " . $stmtInventory->error);
        }

        // Commit transaction
        $conn->commit();

        echo "<script>
            alert('Product updated successfully!');
            window.location.href = '../../frames/DashboardAdmin.php';
        </script>";

    } catch (Exception $e) {
        // Rollback transaction if any query fails
        $conn->rollback();

        echo "<script>
            alert('Update failed: " . addslashes($e->getMessage()) . "');
            window.history.back();
        </script>";
    }

    // Close connections
    if (isset($stmtProduct)) $stmtProduct->close();
    if (isset($stmtInventory)) $stmtInventory->close();
    $conn->close();
}
?>
