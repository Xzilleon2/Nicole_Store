<?php 
session_start();
// Check if user is logged in
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
        include './modals/AdminDashboardModal/editProfile.php';
        include './modals/DashboardModal/Checkout.php';
        include '../Functions/DashboardFunctions/getCart.php';
        include '../Functions/DashboardFunctions/getCheckout.php';
    ?>
</head>
<body>
    <?php include '../includes/Header.php'; ?>
    <!-- Session data passed safely to JS -->
    <div id="session-data"
        data-name="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name'], ENT_QUOTES) : ''; ?>"
        data-contact="<?php echo isset($_SESSION['Contact_Number']) ? htmlspecialchars($_SESSION['Contact_Number'], ENT_QUOTES) : ''; ?>">
    </div>

    <!--Profile Edit and filter button panel-->
    <div class="flex flex-col py-10 px-15 h-screen ">

        <div class="flex justify-between w-full h-30 p-5">

            <div class="flex w-sm gap-3 p-1">
                <div class=" w-[100px] bg-blue-300 rounded-full h-20 text-2xl font-bold flex items-center justify-center text-center">
                    <h1><?php echo $_SESSION['profname'] ?></h1>
                </div>
                <div class="w-full flex flex-col justify-center">
                    <h2 class="font-bold text-2xl"><?php echo $_SESSION['name'] ?></h2>
                    <p id="showEditProfile" class="underline w-[80px] hover:cursor-pointer">Edit Profile</p>
                </div>

            </div>
            
            <div class="flex gap-5 text-white border-black items-center">
                <div id="showCheckout" class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center justify-center
                hover:cursor-pointer">
                    <h1>Checkout</h1>
                </div>


                <div class="group relative h-fit w-fit flex flex-col justify-center p-1">
                    <div class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center justify-center
                    hover:cursor-pointer">
                        <h1>Tables</h1>
                    </div>
                    <div class="absolute w-[160px] top-full right-0 rounded-lg p-3 bg-[#1E1E1E] shadow-md scale-y-0
                    group-hover:scale-y-100 origin-top duration-200">
                        <button id="showCartTable" class="px-1 my-1 w-full text-start cursor-pointer
                         hover:bg-[#3C3C3C] duration-300 rounded-md">Cart</button>
                        <button id="showPurchaseTable" class="px-1 my-1 w-full text-start cursor-pointer
                         hover:bg-[#3C3C3C] duration-300 rounded-md">Checkout History</button>
                    </div>
                </div>

            </div>

        </div>

        <!--Table for Cart items-->
        <div id="CartTable" class="border h-full p-3 flex flex-col">
            <div class="w-full overflow-x-auto">
                <table id="CartTable" class="table-auto border-separate h-fit">
                    <thead class="bg-[#1E1E1E] text-white h-20">
                        <tr>
                        <th class="w-[100px]">Select</th>
                        <th class="w-xl">PRODUCT</th>
                        <th class="w-sm">QUANTITY</th>
                        <th class="w-sm">TOTAL PRICE</th>
                        <th class="w-sm">DATE ADDED</th>
                        <th class="w-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody class="h-full overflow-y-scroll">
                    <?php while ($row = $getCart->fetch_assoc()): ?>
                        <tr class="bg-gray-100 h-20">
                            <td class="p-3 text-center">
                                <input class="h-5 w-full" type="checkbox" name="selected_cart[]" value="<?= $row['CART_ID'] ?>">
                            </td>
                            <td class="uppercase p-3 text-center"><?= htmlspecialchars($row['NAME']) ?></td>
                            <td class="p-3 text-center"><?= $row['QUANTITY'] ?></td>
                            <td class="p-3 text-center"><?= $row['TOTAL_PRICE'] ?></td>
                            <td class="p-3 text-center"><?= $row['DATE_ADDED'] ?></td>
                            <td class="p-3 flex justify-center gap-5">
                                <!-- Trigger Buttons -->
                                <button onclick="document.getElementById('updateModal<?= $row['CART_ID'] ?>').showModal()" class="bg-yellow-200 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Update</button>
                            </td>
                        </tr>

                        <!-- Update Modal -->
                        <dialog id="updateModal<?= $row['CART_ID'] ?>" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 w-[90%] max-w-md backdrop:bg-black/30">
                            <form method="POST" action="../Functions/DashboardFunctions/updateCart.php" class="flex flex-col gap-4">
                                <input type="hidden" name="cart_id" value="<?= $row['CART_ID'] ?>">
                                <h2 class="text-lg font-bold">Update Quantity</h2>
                                <input type="number" name="quantity" value="<?= $row['QUANTITY'] ?>" min="1" class="border p-2 rounded">
                                <div class="flex justify-end gap-3">
                                    <button type="submit" name="updateBtn" class="bg-yellow-400 px-4 py-2 rounded font-bold">Save</button>
                                    <button type="button" onclick="document.getElementById('updateModal<?= $row['CART_ID'] ?>').close()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                                </div>
                            </form>
                        </dialog>   
                    <?php endwhile; ?>

                    </tbody>
                </table>
            </div>

        </div>

        <!--Table for Purchased Products-->
        <div id="PurchaseTable" class="hidden h-xl max-h-xl border p-3 flex justify-center overflow-x-auto">
            <div class="w-full overflow-x-auto">
                <table class="table-auto border-separate h-sm">
                    <thead class="bg-[#1E1E1E] text-white h-20">
                        <tr>
                            <th class="w-xl">CODE</th>
                            <th class="w-xl">ITEMS</th>
                            <th class="w-sm">QUANTITY</th>
                            <th class="w-sm">UNIT PRICE</th>
                            <th class="w-sm">TOTAL PRICE</th>
                            <th class="w-sm">CLAIM DATE</th>
                            <th class="w-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody class="h-full">
                        <?php while ($row1 = $getCheckout->fetch_assoc()): ?>
                            <tr class="bg-gray-100 h-20">
                                <td class="uppercase p-3 text-center"><?= htmlspecialchars($row1['ORDER_CODE']) ?></td>
                                <td class="uppercase p-3 text-center"><?= htmlspecialchars($row1['PRODUCT_NAME']) ?></td>
                                <td class="p-3 text-center"><?= $row1['QUANTITY'] ?></td>
                                <td class="p-3 text-center">₱<?= number_format($row1['PRICE_PER_ITEM'], 2) ?></td>
                                <td class="p-3 text-center">₱<?= number_format($row1['TOTAL_ITEM_PRICE'], 2) ?></td>
                                <td class="p-3 text-center"><?= $row1['CLAIM_DATE'] ?></td>
                                <td class="p-3 text-center"><?= $row1['STATUS'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php include '../includes/Footer.php'; ?>
    <!--Function for the modals of Dashboard-->
    <?php include './DashboardScript/DashboardScript.php'; ?>

</body>
</html>