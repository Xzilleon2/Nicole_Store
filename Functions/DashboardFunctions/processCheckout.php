<?php
include __DIR__ . '../../../imports/DBConnection.php';

    $customer_id = $_POST['user_id'];
    $selected_ids = explode(',', $_POST['selected_ids']);
    $claim_date = date('Y-m-d', strtotime('+1 day'));
    $status = 'Pending';

    // Generate unique order code (e.g., ORD-ABC123)
    $code = 'ORD-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));

    // 1. Create one order record
    $insertOrder = $conn->prepare("INSERT INTO orders (CUSTOMER_ID, CODE, CLAIM_DATE, STATUS) VALUES (?, ?, ?, ?)");
    $insertOrder->bind_param("isss", $customer_id, $code, $claim_date, $status);
    $insertOrder->execute();
    $order_id = $insertOrder->insert_id;

    // 2. Fetch selected cart items
    $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));
    $types = str_repeat('i', count($selected_ids));
    $sql = "SELECT * FROM cart WHERE CART_ID IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$selected_ids);
    $stmt->execute();
    $result = $stmt->get_result();

    // 3. Insert each item into reserved_items with total price
    while ($row = $result->fetch_assoc()) {
        $item_id = $row['PRODUCT_ID'];
        $cart_id = $row['CART_ID'];
        $quantity = $row['QUANTITY'];
        $unit_price = $row['PRICE']; // Ensure PRICE exists in your `cart` table or fetched from `products`
        $total_price = $quantity * $unit_price;

        $insertReserved = $conn->prepare("INSERT INTO reserved_items (ITEM_ID, CART_ID, ORDER_ID, TOTAL_PRICE)
                                        VALUES (?, ?, ?, ?)");
        $insertReserved->bind_param("iiid", $item_id, $cart_id, $order_id, $total_price);
        $insertReserved->execute();
    }

    echo "<script>
        alert('Order placed successfully! Your reservation code is $code');
        window.location.href = '../../index.php';
    </script>";
?>
