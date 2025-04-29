<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <?php
        include '../imports/extensions.php';
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
                    <p class="underline w-[80px] hover:cursor-pointer">Edit Profile</p>
                </div>
            </div>

            <div class="border rounded-full w-[130px] h-10 bg-[#1E1E1E] place-self-center flex items-center text-center
             justify-center text-white hover:cursor-pointer">
                <h1>Filter</h1>
            </div>


        </div>

        <!--Table for Products-->
        <!--Task: Loop each row from DB-->
        <div class="border p-3 flex  justify-center">
            <table class="table-auto border-separate">
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

    </div>

    <?php include '../includes/Footer.php'; ?>

    <!--Function for the modals of Dashboard-->
    <script>
    const modal = document.getElementById('addProductModal');
    const openBtn = document.getElementById('addProductBtn');
    const closeBtn = document.getElementById('closeModalDash');

    openBtn.addEventListener('click', () =>{
        modal.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
    </script>
</body>
</html>