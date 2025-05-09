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
                        <button id="addProductBtn" class="cursor-pointer px-1 my-2 w-full text-start
                         hover:bg-[#3C3C3C] duration-300 rounded-md">Products</button>
                        <button id="addCustomerBtn" class="cursor-pointer px-1 my-2 w-full text-start
                         hover:bg-[#3C3C3C] duration-300 rounded-md">Customers</button>
                    </div>
                </div>

                <div class="group relative h-fit w-fit flex flex-col justify-center p-1">
                    <div class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center justify-center
                    hover:cursor-pointer">
                        <h1>Tables</h1>
                    </div>
                    <div class="absolute top-full right-0 rounded-lg p-3 bg-[#1E1E1E] shadow-md scale-y-0
                     group-hover:scale-y-100 origin-top duration-200">
                        <button id="showCustomerTable" class="px-1 my-2 w-full text-start cursor-pointer 
                         hover:bg-[#3C3C3C] duration-300 rounded-md">Customers</button>
                        <button id="showInventoryTable" class="px-1 my-2 w-full text-start cursor-pointer 
                         hover:bg-[#3C3C3C] duration-300 rounded-md">Inventory</button>
                        <button id="showReservationTable" class="px-1 my-2 w-full text-start cursor-pointer 
                         hover:bg-[#3C3C3C] duration-300 rounded-md">Reservations</button>
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
                    <th class="w-xl">PRODUCTS</th>
                    <th class="w-sm">ITEM PRICE</th>
                    <th class="w-sm">STACK QUANTITY</th>
                    <th class="w-sm">CATEGORY</th>
                    <th class="w-sm">RESTACK DATE</th>
                    <th class="w-sm">ACTION</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <tr class="bg-gray-100 h-20">
                    <td class="p-3 text-center">Garlic</td>
                    <td class="p-3 text-center">P20</td>
                    <td class="p-3 text-center">50</td>
                    <td class="p-3 text-center">Spices</td>
                    <td class="p-3 text-center">2025-01-20</td>
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
                    <th class="w-sm">ID</th>
                    <th class="w-xl">NAME</th>
                    <th class="w-xl">EMAIL</th>
                    <th class="w-xl">ADDRESS</th>
                    <th class="w-xl">IMAGE</th>
                    <th class="w-xl">STATUS</th>
                    <th class="w-sm">ACTION</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <tr class="bg-gray-100 h-20">
                    <td class="p-3 text-center">13</td>
                    <td class="p-3 text-center">John Cena</td>
                    <td class="p-3 text-center">YouCantSee@gmail.com</td>
                    <td class="p-3 text-center">#13 Paris street Davao City</td>
                    <td class="p-3 text-center">Img.jpg</td>
                    <td class="p-3 text-center">ACTIVATED</td>
                    <td class="p-3 flex justify-center gap-5">
                        <button class="bg-yellow-200 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Update</button>
                        <button class="bg-red-700 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Delete</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Table for Reservations-->
        <!--Task: Loop each row from DB-->
        <div id="ReservationTable" class="hidden border h-full p-3 flex  justify-center">
            <table class="table-auto border-separate h-fit">
                <thead class="bg-[#1E1E1E] text-white h-20">
                    <tr>
                    <th class="w-xl">RESERVATION CODE</th>
                    <th class="w-xl">ITEMS</th>
                    <th class="w-xl">CUSTOMER NAME</th>
                    <th class="w-sm">TOTAL PRICE</th>
                    <th class="w-sm">RESERVE UNTIL</th>
                    <th class="w-sm">STATUS</th>
                    <th class="w-sm">ACTION</th>
                    </tr>
                </thead>
                <tbody class="h-full">
                    <tr class="bg-gray-100 h-20">
                    <td class="hidden">13</td>
                    <td class="p-3 text-center">X1001-TEST</td>
                    <td class="p-3 text-center">Soy, Rice, Vinegar</td>
                    <td class="p-3 text-center">James</td>
                    <td class="p-3 text-center">P100</td>
                    <td class="p-3 text-center">2025-01-01</td>
                    <td class="p-3 text-center">PAID</td>
                    <td class="p-3 flex justify-center gap-5">
                        <button class="bg-yellow-200 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Paid</button>
                        <button class="bg-red-700 rounded-full p-3 w-[100px] border font-bold hover:cursor-pointer">Expired</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php include '../includes/Footer.php'; ?>
    <!--Function for the modals of Admin Dashboard-->
    <?php include './AdminDashboardScript/AdminDashScript.php'; ?>

</body>
</html>