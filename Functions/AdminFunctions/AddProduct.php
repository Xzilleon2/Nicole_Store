<?php
session_start();
include __DIR__ . '../../../imports/DBConnection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['RegisterProduct'])) {
    $Name = $_POST['ProductName'];
    $Price = $_POST['ProductPrice'];
    $Quantity = $_POST['ProductQuantity'];
    $Category = $_POST['ProductCategory'];

    // Handle uploaded image file
    $targetDir = "../../assets/ProductImages/"; // You can change this path
    $imageName = basename($_FILES["ProductImage"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    //Validate image file
    $allowedTypes = ['jpg', 'jpeg', 'jfif', 'png', 'gif', 'webp'];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Invalid image format. Only JPG, PNG, GIF, or WEBP are allowed.");
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $targetFilePath)) {
        // Save relative path to DB (adjust path format as needed)
        $ImagePath = "assets/ProductImages/" . $imageName;

        // Insert into products table
        $RegisterProdQuery = "INSERT INTO products (NAME, PRICE, ImgURL, CATEGORY) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($RegisterProdQuery);
        $stmt->bind_param("sdss", $Name, $Price, $ImagePath, $Category);

        if ($stmt->execute()) {
            $product_id = $stmt->insert_id;

            // Insert into inventory
            $InsertInventoryQuery = "INSERT INTO inventory (PRODUCT_ID, STACK_QUANTITY) VALUES (?, ?)";
            $invStmt = $conn->prepare($InsertInventoryQuery);
            $invStmt->bind_param("ii", $product_id, $Quantity);

            if ($invStmt->execute()) {
                echo "<script>
                    alert('Registration Successful');
                    window.location.href = '../../frames/DashboardAdmin.php';
                    </script>";
                    exit();  
            } else {
                echo "Inventory insert failed: " . $invStmt->error;
            }

            $invStmt->close();
        } else {
            echo "Product insert failed: " . $stmt->error;
            exit();
        }

        $stmt->close();
    } else {
        echo "Failed to upload image.";
        exit();
    }

    $conn->close();
}
?>
