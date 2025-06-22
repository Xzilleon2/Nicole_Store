<?php
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProduct'])) {
    $product_id = (int) $_POST['product_id'];

    // START TRANSACTION
    $conn->begin_transaction();

    try {
        // Step 1: Delete from inventory
        $deleteInventory = $conn->prepare("DELETE FROM inventory WHERE PRODUCT_ID = ?");
        $deleteInventory->bind_param("i", $product_id);
        if (!$deleteInventory->execute()) {
            throw new Exception("Failed to delete from inventory: " . $deleteInventory->error);
        }

        // Step 2: Delete from products
        $deleteProduct = $conn->prepare("DELETE FROM products WHERE PRODUCT_ID = ?");
        $deleteProduct->bind_param("i", $product_id);
        if (!$deleteProduct->execute()) {
            throw new Exception("Failed to delete from products: " . $deleteProduct->error);
        }

        // COMMIT changes if both succeed
        $conn->commit();

        echo "<script>
            alert('Product deleted successfully!');
            window.location.href = '../../frames/DashboardAdmin.php';
        </script>";

    } catch (Exception $e) {
        // ROLLBACK if any error occurs
        $conn->rollback();
        echo "<script>
            alert('Deletion failed: " . addslashes($e->getMessage()) . "');
            window.history.back();
        </script>";
    }

    if (isset($deleteInventory)) $deleteInventory->close();
    if (isset($deleteProduct)) $deleteProduct->close();
    $conn->close();
}
?>
