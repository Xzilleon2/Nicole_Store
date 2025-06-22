<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}

$customer_id = $_SESSION['user_id'];

// Get the posted form data
$product_name = $_POST['product_name'];
$product_id = $_POST['product_id'];
$quantity = (int) $_POST['quantity'];
$price = (float) $_POST['price'];
$total_price = (float) $_POST['total_price'];
$stock = $_POST['stock'];
$date_added = date('Y-m-d');  // Current date

function addToCart($customer_id, $product_id, $quantity, $price, $total_price, $date_added) {
    global $conn;

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Check if the product is already in the user's cart
        $checkQuery = "SELECT * FROM cart WHERE CUSTOMER_ID = ? AND PRODUCT_ID = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("ii", $customer_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Product exists, update quantity and total price
            $row = $result->fetch_assoc();
            $new_quantity = $row['QUANTITY'] + $quantity;
            $new_total_price = $price * $new_quantity;

            $updateQuery = "UPDATE cart SET QUANTITY = ?, TOTAL_PRICE = ?, DATE_ADDED = ? WHERE CART_ID = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("idsi", $new_quantity, $new_total_price, $date_added, $row['CART_ID']);
            $updateStmt->execute();

            // Commit transaction
            $conn->commit();

            return "<script>
                alert('Cart updated successfully!');
                window.location.href = '../../frames/Homepage.php';
            </script>";
        } else {
            // Insert new entry into cart
            $insertQuery = "INSERT INTO cart (CUSTOMER_ID, PRODUCT_ID, QUANTITY, TOTAL_PRICE, DATE_ADDED) 
                            VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iiids", $customer_id, $product_id, $quantity, $total_price, $date_added);
            $insertStmt->execute();

            // Commit transaction
            $conn->commit();

            return "<script>
                alert('Cart updated successfully!');
                window.location.href = '../../frames/Homepage.php';
            </script>";
        }
    } catch (Exception $e) {
        // Rollback the transaction if there is an error
        $conn->rollback();
        return "<script>
            alert('An error occurred. Please try again.');
            window.history.back();
        </script>";
    }
}

$response = addToCart($customer_id, $product_id, $quantity, $price, $total_price, $date_added);
echo $response;
?>
