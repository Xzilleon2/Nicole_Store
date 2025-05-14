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

        // Mark as Expired
        if (isset($_POST['expiredBtn'])) {
            $update = $conn->prepare("UPDATE orders SET STATUS = 'Expired' WHERE CODE = ?");
            $update->bind_param("s", $code);
            if (!$update->execute()) {
                throw new Exception("Failed to mark as Expired: " . $update->error);
            }

            if ($update->affected_rows === 0) {
                throw new Exception("No reservation updated. Possibly invalid code.");
            }

            $conn->commit();

            echo "<script>
                alert('Reservation marked as Expired.');
                window.location.href = '../../frames/DashboardAdmin.php';
            </script>";
        }

        if (isset($update)) {
            $update->close();
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
