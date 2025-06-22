<?php
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['reservation_code'];

    try {
        // Begin transaction
        $conn->begin_transaction();

        // Mark as Paid
        if (isset($_POST['paidBtn'])) {
            $update = $conn->prepare("UPDATE orders SET STATUS = 'Paid' WHERE CODE = ?");
            $update->bind_param("s", $code);
            if (!$update->execute()) {
                throw new Exception("Failed to mark as Paid: " . $update->error);
            }

            if ($update->affected_rows === 0) {
                throw new Exception("No reservation updated. Possibly invalid code.");
            }

            $conn->commit();

            echo "<script>
                alert('Reservation marked as Paid.');
                window.location.href = '../../frames/DashboardAdmin.php';
            </script>";
        }

        // Mark as Expired and Restock Inventory
        if (isset($_POST['expiredBtn'])) {
            // Update order status to Expired
            $update = $conn->prepare("UPDATE orders SET STATUS = 'Expired' WHERE CODE = ?");
            $update->bind_param("s", $code);
            if (!$update->execute()) {
                throw new Exception("Failed to mark as Expired: " . $update->error);
            }
            if ($update->affected_rows === 0) {
                throw new Exception("No reservation updated. Possibly invalid code.");
            }
            $update->close();

            // Fetch ORDER_ID for the given CODE
            $orderIdStmt = $conn->prepare("SELECT ORDER_ID, RESTOCKED FROM orders WHERE CODE = ?");
            $orderIdStmt->bind_param("s", $code);
            $orderIdStmt->execute();
            $orderIdResult = $orderIdStmt->get_result();
            if ($orderIdResult->num_rows === 0) {
                throw new Exception("Order not found for restocking.");
            }
            $orderData = $orderIdResult->fetch_assoc();
            $order_id = $orderData['ORDER_ID'];
            $restocked = (int)$orderData['RESTOCKED'];
            $orderIdStmt->close();

            // Only restock if not already done
            if ($restocked === 0) {
                // Get product and quantities from reserveitems -> cart for this order
                $itemsStmt = $conn->prepare("
                    SELECT ct.PRODUCT_ID, ct.QUANTITY
                    FROM reserveitems ri
                    JOIN cart ct ON ri.CART_ID = ct.CART_ID
                    WHERE ri.ORDER_ID = ?
                ");
                $itemsStmt->bind_param("i", $order_id);
                $itemsStmt->execute();
                $itemsResult = $itemsStmt->get_result();

                while ($item = $itemsResult->fetch_assoc()) {
                    $product_id = $item['PRODUCT_ID'];
                    $quantity = $item['QUANTITY'];

                    // Add quantity back to inventory
                    $updateInventory = $conn->prepare("UPDATE inventory SET STACK_QUANTITY = STACK_QUANTITY + ? WHERE PRODUCT_ID = ?");
                    $updateInventory->bind_param("ii", $quantity, $product_id);
                    if (!$updateInventory->execute()) {
                        throw new Exception("Failed to restock inventory: " . $updateInventory->error);
                    }
                    $updateInventory->close();
                }
                $itemsStmt->close();

                // Mark order as restocked to prevent duplicate restocking
                $markRestocked = $conn->prepare("UPDATE orders SET RESTOCKED = 1 WHERE ORDER_ID = ?");
                $markRestocked->bind_param("i", $order_id);
                if (!$markRestocked->execute()) {
                    throw new Exception("Failed to mark order as restocked: " . $markRestocked->error);
                }
                $markRestocked->close();
            }

            $conn->commit();

            echo "<script>
                alert('Reservation marked as Expired and inventory restocked.');
                window.location.href = '../../frames/DashboardAdmin.php';
            </script>";
        }

    } catch (Exception $e) {
        $conn->rollback();
        echo "<script>
            alert('Transaction failed: " . addslashes($e->getMessage()) . "');
            window.history.back();
        </script>";
    }

    $conn->close();
}
?>
