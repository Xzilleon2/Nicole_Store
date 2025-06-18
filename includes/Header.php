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
<div Class='w-full flex text-center justify-between border-b-1 px-15 '>
    <div Class='flex justify-between w-full px-10'>
        <div Class='flex justify-center items-center py-3 gap-3'>
            <a href="../frames/Homepage.php"><h1 Class='font-serif font-bold text-3xl'>Logo</h1></a>
            <div class="flex flex-col items-start">
                <p class="font-serif font-bold text-xl">Stash</p>
                <p>Slogan</p>
            </div>
        </div>
        <div Class='flex items-center gap-6 w-fit px-10'>
                <div class="group relative h-fit w-fit flex flex-col justify-center p-1">

                    <a class="rounded-full font-bold bg-blue-300 h-10 flex items-center justify-center w-[40px]" 
                     href="../frames/Dashboard.php"><?php echo $_SESSION['profname'] ?></a>

                    <div class="absolute w-[160px] top-full left-[-60px] rounded-lg p-3 bg-white text-dark-100 shadow-md scale-y-0
                    group-hover:scale-y-100 origin-top duration-200">
                        <a class="font-semibold px-1 my-1 w-full text-start cursor-pointer hover:text-gray-300 duration-300 rounded-md"
                        href="../Functions/Logout.php">Logout</a>
                    </div>

                </div>
            <a href="../frames/Dashboard.php#CartTable"><img class="cursor-pointer hover:scale-150"
             src="../assets/Icons/cart.png" alt="cartIcon"></a>
        </div>
    </div>

</div>