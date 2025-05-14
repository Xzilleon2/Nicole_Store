<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateBtn'])) {
    $customer_id = $_SESSION['user_id'];
    $cart_id = $_POST['cart_id'];
    $new_quantity = $_POST['quantity'];

    // Step 1: Get unit price using JOIN with products table
    $getPriceQuery = "
        SELECT p.PRICE AS unit_price
        FROM cart c
        JOIN products p ON c.PRODUCT_ID = p.PRODUCT_ID
        WHERE c.CART_ID = ? AND c.CUSTOMER_ID = ?
    ";

    $stmtPrice = $conn->prepare($getPriceQuery);
    $stmtPrice->bind_param("ii", $cart_id, $customer_id);
    $stmtPrice->execute();
    $result = $stmtPrice->get_result();

    if ($row = $result->fetch_assoc()) {
        $price_per_item = $row['unit_price'];
        $new_total_price = $price_per_item * $new_quantity;

        // Step 2: Update quantity and total price
        $updateQuery = "UPDATE cart SET QUANTITY = ?, TOTAL_PRICE = ? WHERE CART_ID = ? AND CUSTOMER_ID = ?";
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("idii", $new_quantity, $new_total_price, $cart_id, $customer_id);

        if ($stmtUpdate->execute()) {
            echo "<script>
                alert('Updated');
                window.location.href = '../../frames/Dashboard.php';
            </script>";
            exit();
        } else {
            echo "Error updating cart item: " . $stmtUpdate->error;
        }
    } else {
        echo "Cart item not found or price lookup failed.";
    }
}
?>
