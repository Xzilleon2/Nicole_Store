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
    <title>Nicole Store</title>
    <?php
        include '../imports/extensions.php';
        include './modals/HomepageModal/AddCart.php';
        include '../Functions/HomePageFunctions/getFeatured.php';
        include '../Functions/HomePageFunctions/getDiscounted.php';
    ?>
</head>
<body>
    <?php include '../includes/Header.php'; ?>

    <!--Main Div for the Body-->
    <div class="flex flex-col justify-center w-full py-10 px-10 gap-5">

        <!--Store Features and info-->
        <div class="w-full flex flex-wrap justify-center gap-10">
            <div id="StoreImageCard" class="border border-black rounded-2xl shadow-xl w-5xl h-80">

                <div class="w-full h-full flex">
                    <div class="p-5 w-full h-full flex flex-col justify-center items-center text-center">
                        <h1 class="text-[40px] my-3 font-[Italiana] font-bold">
                            Affordable<br>Products
                        </h1>
                        <p class="font-semibold text-xl">Discounted Prices</p> <br>
                        <a href="#FeaturedProducts" class="bg-[#1E1E1E] rounded-full text-white w-[100px]
                         h-8 flex items-center justify-center hover:cursor-pointer"> View</a>
                    </div>
                    <div class="hidden lg:block h-full w-[300px] border-l rounded-r-2xl rounded-l-[100px] bg-cover" 
                     style="background-image: url('../assets/ProductImages/NicoleStoreIMG.jpg');">
                    </div>
                </div>

            </div>

            <div id="GCashImageCard" class="border border-black rounded-2xl shadow-xl w-[300px] h-80 bg-cover p-5 flex items-end text-sky-100"
             style="background-image: url('../assets/ProductImages/payment.jpg');">
                <h1 class="font-bold font-sans text-2xl hover:cursor-default">Payment <br> over the counter <br> made easy</h1>
            </div>
        </div>

        <!--Discounted Product part with looped grid-->
        <h2 id="DiscountedProducts" class="font-sans text-[30px]">Discounted Products</h2>
        <div class="w-full flex flex-wrap gap-13 justify-start items-start">

        <?php while ($rowDis = $getDiscounted->fetch_assoc()) { ?>
            <div class="relative shadow-xl w-[300px] h-80 bg-cover hover:scale-105 transition-transform duration-300"
                style="background-image: url('../<?php echo htmlspecialchars($rowDis['ImgURL']); ?>');">

                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black opacity-20 rounded-md"></div>

                <!-- Card content -->
                <div class="relative z-10 flex flex-col justify-end h-full p-4 text-white">
                    <h2 class="place-self-end text-green-700">
                        <?php echo intval($rowDis['DISCOUNT_PERCENT'] * 100); ?>% OFF
                    </h2>
                    <div class="flex items-end justify-between">
                        <h2 class="uppercase w-fit font-semibold"><?php echo htmlspecialchars($rowDis['NAME']); ?></h2>
                        <p class="text-sm">Stacks: <?php echo htmlspecialchars($rowDis['STACK_QUANTITY']); ?></p>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <p class="text-green-700 font-bold">
                            <span class="line-through text-red-700">P<?php echo htmlspecialchars($rowDis['ORIGINAL_PRICE']); ?></span>
                            &nbsp;P<?php echo htmlspecialchars($rowDis['DISCOUNTED_PRICE']); ?>
                        </p>
                        <button 
                            class="showaddCart w-20 bg-[#1E1E1E] text-white rounded-lg px-2 py-1 hover:cursor-pointer"
                            data-name="<?php echo htmlspecialchars($rowDis['NAME']); ?>"
                            data-price="<?php echo htmlspecialchars($rowDis['DISCOUNTED_PRICE']); ?>"
                            data-stock="<?php echo htmlspecialchars($rowDis['STACK_QUANTITY']); ?>"
                            data-id="<?php echo htmlspecialchars($rowDis['PRODUCT_ID']); ?>"
                        >
                            ADD
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>


        </div>

        <!--Featured Product part with looped grid-->
        <h2 id="FeaturedProducts" class="font-sans text-[30px] mt-10">Featured Products</h2>
        <div class="w-full flex flex-wrap gap-13 justify-start items-start">

            <?php while ($row = $getFeatured->fetch_assoc()) { ?>
            <div class="relative shadow-xl w-[300px] h-80 bg-cover hover:scale-105 transition-transform duration-300"
                style="background-image: url('../<?php echo htmlspecialchars($row['ImgURL']); ?>');">
            
                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black opacity-20 rounded-md"></div>
                
                <!-- Card content -->
                <div class="relative z-10 flex flex-col justify-end h-full p-4 text-white">
                    <div class="flex items-end justify-between">
                        <h2 class="uppercase w-fit font-semibold"><?php echo htmlspecialchars($row['NAME']); ?></h2>
                        <p class="text-sm">Stacks: <?php echo htmlspecialchars($row['STACK_QUANTITY']); ?></p>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <p class="text-green-300 font-semibold">P<?php echo htmlspecialchars($row['PRICE']); ?></p>
                        <button 
                            class="showaddCart w-20 bg-[#1E1E1E] text-white rounded-lg px-2 py-1 hover:cursor-pointer"
                            data-name="<?php echo htmlspecialchars($row['NAME']); ?>"
                            data-price="<?php echo htmlspecialchars($row['PRICE']); ?>"
                            data-stock="<?php echo htmlspecialchars($row['STACK_QUANTITY']); ?>"
                            data-id="<?php echo htmlspecialchars($row['PRODUCT_ID']); ?>"
                        >
                            ADD
                        </button>

                    </div>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>

    <?php include '../includes/Footer.php'; ?>
    <?php include './HomepageScript/Homepagescript.php'; ?>
</body>
</html>
