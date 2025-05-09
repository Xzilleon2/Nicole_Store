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
    ?>
</head>
<body>
    <?php include '../includes/Header.php'; ?>

    <!--Profile Edit and filter button panel-->
    <div class="flex flex-col py-10 px-15 h-screen ">

        <div class="flex justify-between w-full h-30 p-5">

            <div class="flex w-sm gap-3 p-1">
                <div class=" w-[100px] flex items-center justify-center text-center">
                    <h1>IMAGE</h1>
                </div>
                <div class="w-full flex flex-col justify-center">
                    <h2 class="font-bold text-2xl">User One</h2>
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
        <!--Task: Loop each row from DB-->
        <div id="CartTable" class="border h-full p-3 flex flex-col">
            <table id="CartTable" class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                    <th class="w-[100px]">Select</th>
                    <th class="w-xl">Product</th>
                    <th class="w-sm">Price</th>
                    <th class="w-sm">Quantity</th>
                    <th class="w-sm">Date Added</th>
                    <th class="w-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <tr class="bg-gray-100 h-20">
                    <td class="p-3 text-center"><input id="cartCheckbox" class="h-5 w-full" type="checkbox"></td>
                    <td class="p-3 text-center">Imported Soy Sauce</td>
                    <td class="p-3 text-center">P1000</td>
                    <td class="p-3 text-center">13</td>
                    <td class="p-3 text-center">1961</td>
                    <td class="p-3 flex justify-center gap-5">
                        <button class="bg-yellow-200 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Update</button>
                        <button class="bg-red-700 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Delete</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Table for Purchased Products-->
        <!--Task: Loop each row from DB-->
        <div id="PurchaseTable" class="hidden h-full border p-3 flex  justify-center">
            <table id="CartTable" class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                    <th class="w-xl">CODE</th>
                    <th class="w-xl">Items</th>
                    <th class="w-sm">Total Price</th>
                    <th class="w-sm">CLAIM Date</th>
                    <th class="w-sm">Status</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <tr class="bg-gray-100 h-20">
                    <td class="p-3 text-center">TEST XXX-1111</td>
                    <td class="p-3 text-center">Vinegar, Rice, Pork, Beans</td>
                    <td class="p-3 text-center">P1000</td>
                    <td class="p-3 text-center">01-01-2025</td>
                    <td class="p-3 text-center">Paid</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <?php include '../includes/Footer.php'; ?>
    <!--Function for the modals of Dashboard-->
    <?php include './DashboardScript/DashboardScript.php'; ?>

</body>
</html>