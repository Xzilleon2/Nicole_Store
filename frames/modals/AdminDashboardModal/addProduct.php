<!--Add Product Modal for the Admin Dashboard-->
<div id="addProductModal" class="hidden fixed inset-0 flex justify-center items-center z-10   text-black">
    <div class='w-[400px] flex flex-col'>
        <div class='flex flex-col bg-white border-1 border-black p-10 rounded'>

            <div class='w-full flex justify-between text-center items-center'>
                <p class='font-bold text-[20px]'>Register Product</p>
                <button id="closeModalDash" class='text-xl hover:cursor-pointer'>X</button>
            </div>
            
            <p class='mb-3'>Fill all the required information</p>

            <form action="" method='POST'>
                <label htmlFor="productName">Product Name</label> <br />
                <input class='border rounded-md w-full my-2 p-2' type="text" name='productName'
                required/> <br/>
                <label htmlFor="ProductPrice">Price</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='ProductPrice' 
                required/> <br/>
                <label htmlFor="ProductQuantity">Quantity</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='ProductQuantity' 
                required/> <br/>
                <label htmlFor="ProductImage">Image</label> <br/>
                <input class='border rounded-md my-2 p-2 hover:cursor-pointer' type="file" name='ProductImage' 
                required/> <br/>
                <input class='bg-[#1E1E1E] text-white border rounded-md w-full p-2 
                hover:bg-[#353434] cursor-pointer' type="submit" name='RegisterProduct' value="Register Product"/>
            </form>

        </div>
    </div>
</div>