<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <?php
        include '../imports/extensions.php';
        include './modals/AdminDashboardModal/addProduct.php';
        include './modals/AdminDashboardModal/addCustomer.php';
        include './modals/AdminDashboardModal/editProfile.php';
        include '../Functions/AdminFunctions/getInventory.php';
        include '../Functions/AdminFunctions/getCustomers.php';
        include '../Functions/AdminFunctions/getReservation.php';
    ?>
</head>
<body>
    <?php include '../includes/Header.php'; ?>

    <div class="flex flex-col py-10 px-15 h-screen">
        <div class="flex justify-between w-full h-30 p-5">
            <div class="flex w-sm gap-3 p-1">
                <div class=" w-[100px] bg-gray-500 font-bold text-2xl rounded-full h-20 flex items-center justify-center text-center">
                    <h1><?php echo $_SESSION['profname'] ?></h1>
                </div>
                <div class="w-full flex flex-col justify-center">
                    <h2 class="font-bold text-2xl"><?php echo $_SESSION['name'] ?></h2>
                    <p id="showEditProfile" class="underline w-[80px] hover:cursor-pointer">Edit Profile</p>
                </div>
            </div>

            <div class="flex gap-5 text-white border-black items-center">
                <div class="group relative h-fit w-fit h-30 flex flex-col justify-center p-1">
                    <div class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center justify-center hover:cursor-pointer">
                        <h1>+Add</h1>
                    </div>
                    <div class="absolute top-full right-0 rounded-lg p-3 bg-[#1E1E1E] shadow-md scale-y-0 group-hover:scale-y-100 origin-top duration-200">
                        <button id="addProductBtn" class="cursor-pointer px-1 my-2 w-full text-start hover:bg-[#3C3C3C] duration-300 rounded-md">Products</button>
                        <button id="addCustomerBtn" class="cursor-pointer px-1 my-2 w-full text-start hover:bg-[#3C3C3C] duration-300 rounded-md">Customers</button>
                    </div>
                </div>

                <div class="group relative h-fit w-fit flex flex-col justify-center p-1">
                    <div class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center justify-center hover:cursor-pointer">
                        <h1>Tables</h1>
                    </div>
                    <div class="absolute top-full right-0 rounded-lg p-3 bg-[#1E1E1E] shadow-md scale-y-0 group-hover:scale-y-100 origin-top duration-200">
                        <button id="showCustomerTable" class="px-1 my-2 w-full text-start cursor-pointer hover:bg-[#3C3C3C] duration-300 rounded-md">Customers</button>
                        <button id="showInventoryTable" class="px-1 my-2 w-full text-start cursor-pointer hover:bg-[#3C3C3C] duration-300 rounded-md">Inventory</button>
                        <button id="showReservationTable" class="px-1 my-2 w-full text-start cursor-pointer hover:bg-[#3C3C3C] duration-300 rounded-md">Reservations</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Table for Inventory-->
        <div id="InventoryTable" class="border h-full p-3 overflow-x-auto">
            <table id="Inventory" class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                        <th class="w-xl">PRODUCTS</th>
                        <th class="w-sm">ITEM PRICE</th>
                        <th class="w-sm">STOCK QUANTITY</th>
                        <th class="w-sm">CATEGORY</th>
                        <th class="w-sm">RESTOCK DATE</th>
                        <th class="w-sm">ACTION</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <?php while ($row1 = $getInventory->fetch_assoc()): ?>
                    <tr class="even:bg-white odd:bg-gray-100 h-20">
                        <td class="p-3 text-center"><?= htmlspecialchars($row1['NAME']) ?></td>
                        <td class="p-3 text-center">₱<?= number_format($row1['PRICE'], 2) ?></td>
                        <td class="p-3 text-center"><?= $row1['STACK_QUANTITY'] ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row1['CATEGORY']) ?></td>
                        <td class="p-3 text-center"><?= $row1['RESTOCK_DATE'] ?></td>
                        <td class="p-3 flex justify-center gap-5">
                            <button onclick="document.getElementById('updateModalProduct<?= $row1['PRODUCT_ID'] ?>').showModal()" class="bg-yellow-200 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Update</button>
                            <button onclick="document.getElementById('deleteModalProduct<?= $row1['PRODUCT_ID'] ?>').showModal()" class="bg-red-700 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer text-white">Delete</button>
                        </td>
                    </tr>

                    <!-- Update Modal -->
                    <dialog id="updateModalProduct<?= $row1['PRODUCT_ID'] ?>" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 w-[90%] max-w-md backdrop:bg-black/30">
                        <form method="POST" action="../Functions/AdminFunctions/updateProduct.php" class="flex flex-col gap-4">
                            <input type="hidden" name="product_id" value="<?= $row1['PRODUCT_ID'] ?>">
                            <h2 class="text-lg font-bold">Update Product</h2>
                            <input type="text" name="name" value="<?= htmlspecialchars($row1['NAME']) ?>" class="border p-2 rounded">
                            <input type="number" name="price" value="<?= $row1['PRICE'] ?>" class="border p-2 rounded">
                            <input type="number" name="stock" value="<?= $row1['STACK_QUANTITY'] ?>" class="border p-2 rounded">
                            <input type="text" name="category" value="<?= htmlspecialchars($row1['CATEGORY']) ?>" class="border p-2 rounded">
                            <div class="flex justify-end gap-3">
                                <button type="submit" name="updateProduct" class="bg-yellow-400 px-4 py-2 rounded font-bold">Save</button>
                                <button type="button" onclick="document.getElementById('updateModalProduct<?= $row1['PRODUCT_ID'] ?>').close()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            </div>
                        </form>
                    </dialog>
                    <!-- Delete Modal -->
                    <dialog id="deleteModalProduct<?= $row1['PRODUCT_ID'] ?>" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 w-[90%] max-w-md backdrop:bg-black/30">
                        <form method="POST" action="../Functions/AdminFunctions/deleteProduct.php" class="flex flex-col gap-4">
                            <input type="hidden" name="product_id" value="<?= $row1['PRODUCT_ID'] ?>">
                            <h2 class="text-lg font-bold text-center">Confirm Deletion</h2>
                            <p class="text-center">Are you sure you want to delete <strong><?= htmlspecialchars($row1['NAME']) ?></strong>?</p>
                            <div class="flex justify-end gap-3">
                                <button type="submit" name="deleteProduct" class="bg-red-600 text-white px-4 py-2 rounded font-bold">Delete</button>
                                <button type="button" onclick="document.getElementById('deleteModalProduct<?= $row1['PRODUCT_ID'] ?>').close()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            </div>
                        </form>
                    </dialog>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Table for Customers -->
        <div id="CustomerTable" class="hidden border h-full p-3 flex justify-center overflow-x-auto">
            <table id="Customer" class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                        <th class="w-sm">ID</th>
                        <th class="w-xl">NAME</th>
                        <th class="w-xl">EMAIL</th>
                        <th class="w-xl">CONTACT NUMBER</th>
                        <th class="w-xl">STATUS</th>
                        <th class="w-xl">ACTION</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <?php while ($row2 = $getCustomers->fetch_assoc()): ?>
                    <tr class="even:bg-white odd:bg-gray-100 h-20">
                        <td class="p-3 text-center"><?= $row2['CUSTOMER_ID'] ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row2['NAME']) ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row2['EMAIL']) ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row2['CONTACT_NUMBER']) ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row2['isACTIVE']) ?></td>
                        <td class="p-3 flex justify-center gap-5">
                            <button onclick="document.getElementById('updateModalCustomer<?= $row2['CUSTOMER_ID'] ?>').showModal()" class="bg-yellow-200 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Update</button>
                            <button onclick="document.getElementById('deleteModalCustomer<?= $row2['CUSTOMER_ID'] ?>').showModal()" class="bg-red-700 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer text-white">Delete</button>
                        </td>
                    </tr>

                    <!-- Update Customer Modal -->
                    <dialog id="updateModalCustomer<?= $row2['CUSTOMER_ID'] ?>" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 w-[90%] max-w-md backdrop:bg-black/30">
                        <form method="POST" action="../Functions/AdminFunctions/updateCustomer.php" class="flex flex-col gap-4">
                            <input type="hidden" name="customer_id" value="<?= $row2['CUSTOMER_ID'] ?>">
                            <h2 class="text-lg font-bold">Update Customer</h2>
                            <input type="text" name="name" value="<?= htmlspecialchars($row2['NAME']) ?>" class="border p-2 rounded" required>
                            <input type="email" name="email" value="<?= htmlspecialchars($row2['EMAIL']) ?>" class="border p-2 rounded" required>
                            <input type="text" name="contact_number" value="<?= htmlspecialchars($row2['CONTACT_NUMBER']) ?>" class="border p-2 rounded">
                            <div class="flex justify-end gap-3">
                                <button type="submit" name="updateBtn" class="bg-yellow-400 px-4 py-2 rounded font-bold">Save</button>
                                <button type="button" onclick="document.getElementById('updateModalCustomer<?= $row2['CUSTOMER_ID'] ?>').close()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            </div>
                        </form>
                    </dialog>

                    <!-- Delete Customer Modal -->
                    <dialog id="deleteModalCustomer<?= $row2['CUSTOMER_ID'] ?>" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 w-[90%] max-w-md backdrop:bg-black/30">
                        <form method="POST" action="../Functions/AdminFunctions/deleteCustomer.php" class="flex flex-col gap-4">
                            <input type="hidden" name="customer_id" value="<?= $row2['CUSTOMER_ID'] ?>">
                            <h2 class="text-lg font-bold text-center">Confirm Deletion</h2>
                            <p class="text-center">Are you sure you want to delete <strong><?= htmlspecialchars($row2['NAME']) ?></strong>?</p>
                            <div class="flex justify-end gap-3">
                                <button type="submit" name="deleteBtn" class="bg-red-600 text-white px-4 py-2 rounded font-bold">Delete</button>
                                <button type="button" onclick="document.getElementById('deleteModalCustomer<?= $row2['CUSTOMER_ID'] ?>').close()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            </div>
                        </form>
                    </dialog>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Table for Reservations -->
        <div id="ReservationTable" class="hidden border h-full p-3 flex justify-center overflow-x-auto">
            <table id="Reservation" class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                        <th class="w-xl">RESERVATION CODE</th>
                        <th class="w-xl">ITEMS</th>
                        <th class="w-xl">CUSTOMER NAME</th>
                        <th class="w-sm">QUANTITY</th>
                        <th class="w-sm">TOTAL PRICE</th>
                        <th class="w-sm">RESERVE UNTIL</th>
                        <th class="w-sm">STATUS</th>
                        <th class="w-sm">ACTION</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <?php while ($row3 = $getReservations->fetch_assoc()): ?>
                    <tr class="even:bg-white odd:bg-gray-100 h-20">
                        <td class="p-3 text-center"><?= htmlspecialchars($row3['CODE']) ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row3['ITEMS']) ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row3['NAME']) ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row3['QUANTITY']) ?></td>
                        <td class="p-3 text-center">₱<?= number_format($row3['TOTAL_PRICE'], 2) ?></td>
                        <td class="p-3 text-center"><?= $row3['CLAIM_DATE'] ?></td>
                        <td class="p-3 text-center"><?= htmlspecialchars($row3['STATUS']) ?></td>
                        <td class="p-3 flex justify-center gap-5">
                            <button onclick="document.getElementById('paidModal<?= $row3['CODE'] ?>').showModal()" class="bg-yellow-200 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Paid</button>
                            <button onclick="document.getElementById('expiredModal<?= $row3['CODE'] ?>').showModal()" class="bg-red-700 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer text-white">Expired</button>
                        </td>
                    </tr>

                    <!-- Paid Modal -->
                    <dialog id="paidModal<?= $row3['CODE'] ?>" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 w-[90%] max-w-md backdrop:bg-black/30">
                        <form method="POST" action="../Functions/AdminFunctions/processStatus.php" class="flex flex-col gap-4">
                            <input type="hidden" name="reservation_code" value="<?= $row3['CODE'] ?>">
                            <h2 class="text-lg font-bold">Mark as Paid</h2>
                            <p class="text-center">Are you sure you want to mark this reservation as paid?</p>
                            <div class="flex justify-end gap-3">
                                <button type="submit" name="paidBtn" class="bg-yellow-400 px-4 py-2 rounded font-bold">Mark as Paid</button>
                                <button type="button" onclick="document.getElementById('paidModal<?= $row3['CODE'] ?>').close()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            </div>
                        </form>
                    </dialog>

                    <!-- Expired Modal -->
                    <dialog id="expiredModal<?= $row3['CODE'] ?>" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 w-[90%] max-w-md backdrop:bg-black/30">
                        <form method="POST" action="../Functions/AdminFunctions/processStatus.php" class="flex flex-col gap-4">
                            <input type="hidden" name="reservation_code" value="<?= $row3['CODE'] ?>">
                            <h2 class="text-lg font-bold">Mark as Expired</h2>
                            <p class="text-center">Are you sure you want to mark this reservation as expired?</p>
                            <div class="flex justify-end gap-3">
                                <button type="submit" name="expiredBtn" class="bg-red-600 text-white px-4 py-2 rounded font-bold">Mark as Expired</button>
                                <button type="button" onclick="document.getElementById('expiredModal<?= $row3['CODE'] ?>').close()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            </div>
                        </form>
                    </dialog>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>



    </div>

    <?php include '../includes/Footer.php'; ?>
    <?php include './AdminDashboardScript/AdminDashScript.php'; ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const Rtable = document.querySelector("#Reservation");
        const Cutable = document.querySelector("#Customer");
        const Itable = document.querySelector("#Inventory");
        new simpleDatatables.DataTable(Rtable);
        new simpleDatatables.DataTable(Cutable);
        new simpleDatatables.DataTable(Itable);
    });
    </script>

</body>
</html>
