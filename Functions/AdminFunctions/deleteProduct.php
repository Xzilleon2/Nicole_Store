<?php
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProduct'])) {
    $product_id = (int) $_POST['product_id'];

    // Step 1: Delete from inventory table (foreign key depends on this)
    $deleteInventory = $conn->prepare("DELETE FROM inventory WHERE PRODUCT_ID = ?");
    $deleteInventory->bind_param("i", $product_id);
    $deleteInventory->execute();

    // Step 2: Delete from products table
    $deleteProduct = $conn->prepare("DELETE FROM products WHERE PRODUCT_ID = ?");
    $deleteProduct->bind_param("i", $product_id);
    $deleteProduct->execute();

    if ($deleteProduct->affected_rows > 0) {
        echo "<script>
            alert('Product deleted successfully!');
            window.location.href = '../../frames/DashboardAdmin.php';
        </script>";
    } else {
        echo "<script>
            alert('Deletion failed or product not found.');
            window.history.back();
        </script>";
    }

    $deleteInventory->close();
    $deleteProduct->close();
    $conn->close();
}
?>
