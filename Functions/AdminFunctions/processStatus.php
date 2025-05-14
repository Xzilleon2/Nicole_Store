<?php
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['reservation_code'];

    // Mark as Paid
    if (isset($_POST['paidBtn'])) {
        $update = $conn->prepare("UPDATE orders SET STATUS = 'Paid' WHERE CODE = ?");
        $update->bind_param("s", $code);
        $update->execute();

        if ($update->affected_rows > 0) {
            echo "<script>
                alert('Reservation marked as Paid.');
                window.location.href = '../../frames/DashboardAdmin.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to update reservation.');
                window.history.back();
            </script>";
        }

        $update->close();
    }

    // Mark as Expired
    if (isset($_POST['expiredBtn'])) {
        $update = $conn->prepare("UPDATE orders SET STATUS = 'Expired' WHERE CODE = ?");
        $update->bind_param("s", $code);
        $update->execute();

        if ($update->affected_rows > 0) {
            echo "<script>
                alert('Reservation marked as Expired.');
                window.location.href = '../../frames/DashboardAdmin.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to update reservation.');
                window.history.back();
            </script>";
        }

        $update->close();
    }

    $conn->close();
}
?>
