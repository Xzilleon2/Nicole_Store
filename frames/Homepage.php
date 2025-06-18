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

        <!-- Background Banner -->
        <div class="relative bg-cover h-130" style="background-image: url('../assets/cover.jpg');">
        </div>

        <!-- Overlapping Card Section -->
        <div class="relative z-10 -mt-70 mb-20 px-4">
            <div class="bg-white shadow-xl rounded-2xl p-6 max-w-6xl mx-auto flex flex-col justify-center">
                <h2 class="text-2xl text-center font-bold mb-4">Products</h2>

                <!--Featured Product part with looped grid-->
                <div class="w-full flex flex-wrap gap-2 justify-start items-start">

                    <?php while ($row = $getFeatured->fetch_assoc()) { ?>
                    <button class="showaddCart relative w-[350px] h-80 hover:shadow-xl rounded-xl cursor-pointer"
                        data-name="<?php echo htmlspecialchars($row['NAME']); ?>"
                        data-price="<?php echo htmlspecialchars($row['PRICE']); ?>"
                        data-stock="<?php echo htmlspecialchars($row['STACK_QUANTITY']); ?>"
                        data-id="<?php echo htmlspecialchars($row['PRODUCT_ID']); ?>">

                        <img class="place-self-center rounded-md my-3 w-[330px] h-50 bg-cover" src="../<?php echo htmlspecialchars($row['ImgURL']);
                            ?>" alt="ProductImage">

                        <!-- Card content -->
                        <div class="relative px-3 z-10 flex flex-col justify-end text-dark">
                            <div class="flex items-end justify-between">
                                <h2 class="uppercase text-dark-900 text-xl w-fit font-semibold"><?php echo htmlspecialchars($row['NAME']); ?></h2>
                            </div>
                            <div class="flex justify-start gap-3 items-center mt-2">
                                <p class="text-gray-500">P<?php echo htmlspecialchars($row['PRICE']); ?></p>
                                <p class="text-sm text-gray-500">Stocks: <?php echo htmlspecialchars($row['STACK_QUANTITY']); ?></p>
                            </div>
                        </div>
                    </button>
                    <?php } ?>

                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-6 gap-2">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Previous</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>"
                        class="px-4 py-2 rounded 
                                <?= $i === $page ? 'bg-orange-400 text-white' : 'bg-gray-100 hover:bg-gray-200' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

    <?php include '../includes/Footer.php'; ?>
    <?php include './HomepageScript/Homepagescript.php'; ?>
</body>
</html>
