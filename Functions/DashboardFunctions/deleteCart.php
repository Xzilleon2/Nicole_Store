<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteBtn'])) {
    $customer_id = $_SESSION['user_id'];
    $cart_id = $_POST['cart_id'];

    // Step 1: Delete the item from the cart
    $deleteQuery = "DELETE FROM cart WHERE CART_ID = ? AND CUSTOMER_ID = ?";
    $stmtDelete = $conn->prepare($deleteQuery);
    $stmtDelete->bind_param("ii", $cart_id, $customer_id);

    if ($stmtDelete->execute()) {
        echo "<script>
            alert('Item deleted successfully');
            window.location.href = '../../frames/Dashboard.php';
        </script>";
        exit();
    } else {
        echo "Error deleting cart item: " . $stmtDelete->error;
    }
}
?>
