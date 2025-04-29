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
    ?>
</head>
<body>
    <?php include '../includes/Header.php'; ?>

    <!--Profile Edit and filter button panel-->
    <div class="flex flex-col py-10 px-15 h-screen">
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
                <div class="group relative h-fit w-fit h-30 flex flex-col justify-center p-1">
                    <div class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center justify-center
                    hover:cursor-pointer">
                        <h1>+Add</h1>
                    </div>
                    <div class="absolute top-full right-0 rounded-lg p-3 bg-[#1E1E1E] shadow-md scale-y-0
                     group-hover:scale-y-100 origin-top duration-200">
                        <button id="addProductBtn" class="mx-1 my-2 hover:cursor-pointer">Products</button>
                        <button id="addCustomerBtn" class="mx-1 my-2 hover:cursor-pointer">Customers</button>
                    </div>
                </div>

                <div class="group relative h-fit w-fit flex flex-col justify-center p-1">
                    <div class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center justify-center
                    hover:cursor-pointer">
                        <h1>Tables</h1>
                    </div>
                    <div class="absolute top-full right-0 rounded-lg p-3 bg-[#1E1E1E] shadow-md scale-y-0
                     group-hover:scale-y-100 origin-top duration-200">
                        <button id="showInventoryTable" class="mx-1 my-2 hover:cursor-pointer">Inventory</button>
                        <button id="showCustomerTable" class="mx-1 my-2 hover:cursor-pointer">Customers</button>
                    </div>
                </div>
            </div>

        </div>

        <!--Table for Inventory-->
        <!--Task: Loop each row from DB-->
        <div id="InventoryTable" class="hidden border h-full p-3 flex  justify-center">
            <table class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                    <th class="w-xl">Product</th>
                    <th class="w-sm">Price</th>
                    <th class="w-sm">Quantity</th>
                    <th class="w-sm">Restocked Date</th>
                    <th class="w-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <tr class="bg-gray-100 h-20">
                    <td class="p-3">Imported Soy Sauce</td>
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

        <!--Table for Customers-->
        <!--Task: Loop each row from DB-->
        <div id="CustomerTable" class="border h-full p-3 flex  justify-center">
            <table class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                    <th class="w-xl">ID</th>
                    <th class="w-sm">NAME</th>
                    <th class="w-sm">EMAIL</th>
                    <th class="w-sm">ADDRESS</th>
                    <th class="w-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <tr class="bg-gray-100 h-20">
                    <td class="p-3">Imported Soy Sauce</td>
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
    </div>

    <?php include '../includes/Footer.php'; ?>
    <?php include './AdminDashboardScript/AdminDashScript.php'; ?>

</body>
</html>