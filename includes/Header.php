<!--Underline Animation-->
<style type="text/tailwindcss">
    @layer utilities{
        .nav{
            @apply relative
        }
        .nav::after{
            @apply content-[''] bg-[#1E1E1E] h-[2px] w-[0%] left-0 -bottom-0 rounded-xl absolute duration-300
        }
        .nav:hover::after{
            @apply w-[100%]
        }
    }
</style>

<!--Header Contents-->
<div Class='w-full flex flex-col text-center justify-center items-center border-b-1 px-15 pb-5 '>
    <div Class='flex w-fit px-10 gap-20'>
        <div Class='flex justify-center items-center py-5'>
            <a href="../frames/Homepage.php"><h1 Class='font-[Italiana] font-bold text-5xl'>Nicole's</h1></a>
        </div>
        <div Class='flex items-center gap-10 w-fit px-10'>
            <form action="">
                <div Class='border flex w-full md:w-3xl h-15 rounded-4xl px-5'>
                    <input Class='w-full h-full focus:border-none outline-none' type="text" placeholder="Find more Products"/>
                    <input class='hover:cursor-pointer' type="submit" value="Search"/>
                </div>
            </form>
            <a href="../frames/Dashboard.php">Profile</a>
            <a href="../frames/Dashboard.php#CartTable"><img class="cursor-pointer hover:scale-150" src="../assets/Icons/cart.png" alt="cartIcon"></a>
        </div>
    </div>
    <div Class='flex justify-center items-center gap-20 mt-3'>
        <div class="group relative flex flex-col justify-center p-1">
            <div class="cursor-pointer">
                <span class="nav w-fit h-full flex"><img src="../assets/Icons/menu.png" alt="MenuIcon">Category</span>
            </div>
            <div class="absolute top-full right-0 rounded-lg shadow-md bg-[#1E1E1E] flex flex-col text-start gap-2 p-1 flex flex-col
             text-white scale-y-0 py-2 group-hover:scale-y-100 origin-top duration-200">
                <a class="hover:bg-[#3C3C3C] duration-300 rounded-xl p-2 w-full" href="" class="mx-5">Foods</a>
                <a class="hover:bg-[#3C3C3C] duration-300 rounded-xl p-2 w-full" href="" class="mx-5">Drinks</a>
                <a class="hover:bg-[#3C3C3C] duration-300 rounded-xl p-2 w-full" href="" class="mx-5">Cosmetics</a>
                <a class="hover:bg-[#3C3C3C] duration-300 rounded-xl p-2 w-full" href="" class="mx-5">Essentials</a>
                <a class="hover:bg-[#3C3C3C] duration-300 rounded-xl p-2 w-full" href="" class="mx-5">Ingredients</a>
            </div>
        </div>
        <a class="nav" href="../frames/Homepage.php#DiscountedProduct">Discounts</a>
        <a class="nav" href="../frames/Homepage.php#FeaturedProducts">Popular</a>
    </div>

</div>