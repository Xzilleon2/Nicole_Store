<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicole Store</title>
    <?php
        include '../imports/extensions.php';
    ?>
</head>
<body>
    <?php include '../includes/Header.php'; ?>

    <!--Main Div for the Body-->
    <div class="flex flex-col justify-center w-full py-10 px-15 gap-5">

        <!--Store Features and info-->
        <div class="w-full h-full flex justify-center gap-10">
            <div id="StoreImageCard" class="border border-black rounded-2xl w-5xl h-80">

                <div class="w-full h-full inset-0 flex">
                    <div class="p-5 w-150 h-full flex flex-col justify-center items-center text-center">
                        <h1 class="text-[40px] my-3 font-[Italiana] font-bold">
                            Affordable<br>Products
                        </h1>
                        <p class="font-semibold text-xl">Discounted Prices</p> <br>
                        <a href="#FeaturedProductsCards" class="bg-[#1E1E1E] rounded-full text-white w-[100px]
                         h-8 flex items-center justify-center hover:cursor-pointer"> View</a>
                    </div>
                    <div class="h-full w-lg border-l rounded-r-2xl rounded-l-[100px] bg-cover" 
                     style="background-image: url('../assets/ProductImages/NicoleStoreIMG.jpg');">
                    </div>
                </div>
                   
            </div>
            <div id="GCashImageCard" class="border border-black rounded-2xl w-[300px] h-80 bg-cover p-5 flex items-end text-sky-100" 
             style="background-image: url('../assets/ProductImages/Gcash.jpg');">
                <h1 class="font-bold font-sans text-2xl">Payment online <br> made easy <br> with GCASH</h1>
            </div>
        </div>

        <!--Discounted Product part with looped grid-->
        <!--Task: Implement Looping from database, store the DB info in session and use it as variable-->
        <h2 id="DiscountedProducts"  class="font-sans text-[30px]">Discounted Products</h2>
        <div class="w-full flex flex-wrap gap-5">

            <div class="border w-[300px] h-80 inset-0 bg-cover" 
             style="background-image: url('../assets/ProductImages/soysauce.jpg');"> <!--Task: Change Bg Image to a session variable for the loop-->

                <!--Task: Change Test information to a session variable for the loop-->
                <h2 class="place-self-end m-4 text-red-600">20%</h2>
                <div class="flex flex-col justify-end h-66 p-4">
                    <h2>Soy Sauce</h2>
                    <div class="flex justify-between">
                        <div class="flex gap-2">
                            <p class="text-red-600 line-through py-2">P100</p>
                            <p class="text-red-600 py-2">P80</p>
                        </div>
                        <button class="w-20 h-md bg-[#1E1E1E] rounded-xl text-white hover:cursor-pointer">ADD</button>
                    </div>
                </div>

            </div>
    
        </div>

        <!--Featured Product part with looped grid-->
        <!--Task: Implement Looping from database, store the DB info in session and use it as variable-->
        <h2 id="FeaturedProducts" class="font-sans text-[30px]">Featured Products</h2>
        <div class="w-full flex flex-wrap gap-5">

            <!--Task: Change Test information to a session variable for the loop-->
            <div class="border w-[300px] h-80 inset-0 bg-cover" 
             style="background-image: url('../assets/ProductImages/soysauce.jpg');"> <!--Task: Change Bg Image to a session variable for the loop-->

                <div class="flex flex-col justify-end h-full p-4">
                    <h2>Soy Sauce</h2>
                    <div class="flex justify-between">
                        <div class="flex gap-2">
                            <p class="text-red-600 py-2">P100</p>
                        </div>
                        <button class="w-20 h-md bg-[#1E1E1E] rounded-xl text-white hover:cursor-pointer">ADD</button>
                    </div>
                </div>
                    
            </div>
            
        </div>

    </div>

    <?php include '../includes/Footer.php'; ?>
</body>
</html>