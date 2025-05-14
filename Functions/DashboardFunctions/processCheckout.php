<?php
include __DIR__ . '../../../imports/DBConnection.php';

$customer_id = $_POST['user_id'];
$selected_ids = explode(',', $_POST['selected_ids']);
$claim_date = date('Y-m-d', strtotime('+1 day'));
$status = 'Pending';

// Generate unique order code
$code = 'ORD-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));

// 1. Fetch selected cart items
$placeholders = implode(',', array_fill(0, count($selected_ids), '?'));
$types = str_repeat('i', count($selected_ids));

$sql = "SELECT cart.CART_ID, cart.PRODUCT_ID, cart.QUANTITY, cart.TOTAL_PRICE
        FROM cart
        WHERE cart.CART_ID IN ($placeholders)";
$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$selected_ids);
$stmt->execute();
$result = $stmt->get_result();

$reservedItems = [];
$grandTotal = 0;

while ($row = $result->fetch_assoc()) {
    $reservedItems[] = $row;
    $grandTotal += $row['TOTAL_PRICE'];
}

// 2. Insert ONE row into orders with total price
$insertOrder = $conn->prepare("INSERT INTO orders 
    (CUSTOMER_ID, CODE, TOTAL_PRICE, CLAIM_DATE, STATUS)
    VALUES (?, ?, ?, ?, ?)");
$insertOrder->bind_param("isdss", $customer_id, $code, $grandTotal, $claim_date, $status);
$insertOrder->execute();
$order_id = $insertOrder->insert_id;

// 3. Insert each reserved cart item into reserveitems and update inventory stock
foreach ($reservedItems as $item) {
    $cart_id = $item['CART_ID'];
    $product_id = $item['PRODUCT_ID'];
    $quantity = $item['QUANTITY'];

    // 3a. Insert into reserveitems
    $insertReserved = $conn->prepare("INSERT INTO reserveitems (CART_ID, ORDER_ID)
                                      VALUES (?, ?)");
    $insertReserved->bind_param("ii", $cart_id, $order_id);
    $insertReserved->execute();

    // 3b. Update the inventory stock (subtract the quantity)
    $updateInventory = $conn->prepare("UPDATE inventory
                                      SET STACK_QUANTITY = STACK_QUANTITY - ?
                                      WHERE PRODUCT_ID = ?");
    $updateInventory->bind_param("ii", $quantity, $product_id);
    $updateInventory->execute();
}

echo "<script>
    alert('Order placed successfully! Your reservation code is $code');
    window.location.href = '../../frames/Dashboard.php';
</script>";
?>
