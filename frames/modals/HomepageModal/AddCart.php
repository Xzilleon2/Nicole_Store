<!--Add to Cart Modal for the Homepage-->
<div id="addCartModal" class="hidden fixed inset-0 flex justify-center items-center z-11  text-black">
    <div class='w-[400px] flex flex-col'>
        <div class='flex flex-col bg-white border-1 border-black p-10 rounded'>

            <div class='w-full flex justify-between text-center items-center'>
                <p class='font-bold text-[20px]'>Product Details</p>
                <button id="closeaddCart" class='text-xl hover:cursor-pointer'>X</button>
            </div>

            <form action="" method='POST'>
                <label htmlFor="ProductName">Product Name</label> <br />
                <input class='border rounded-md w-full my-2 p-2' type="text" name='ProductName'
                disabled=""/> <br/>
                <label htmlFor="Price">Price</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='Price' 
                disabled=""/> <br/>
                <label htmlFor="Quantity">Quantity</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="number" name='Quantity' value="1" 
                required/> <br/>
                <input class='bg-[#1E1E1E] text-white border rounded-md w-full p-2 
                hover:bg-[#353434] cursor-pointer' type="submit" name='RegisterProduct' value="Done"/>
            </form>

        </div>
    </div>
</div>