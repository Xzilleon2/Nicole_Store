<!--Checkout Modal for the User Dashboard-->
<div id="CheckoutModal" class="hidden fixed inset-0 flex justify-center items-center z-10  text-black z-10">
    <div class='w-[400px] flex flex-col'>
        <div class='flex flex-col bg-white border-1 border-black p-10 rounded'>

            <div class='w-full flex justify-between text-center items-center'>
                <p class='font-bold text-[20px]'>Checkout Products</p>
                <button id="closeCheckout" class='text-xl hover:cursor-pointer'>X</button>
            </div>
            
            <p class='mb-3'>Important Informations</p>

            <form action="" method='POST'>
                <label htmlFor="customerName">Customer Name</label> <br />
                <input class='border rounded-md w-full my-2 p-2' type="text" name='customerName'
                disabled=""/> <br/>
                <label htmlFor="TotalPrice">Total Price</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='TotalPrice' 
                disabled=""/> <br/>
                <label htmlFor="ContactNumber">Contact Number</label> <br/>
                <input class='border rounded-md w-full my-2 p-2' type="text" name='ContactNumber' 
                disabled=""/> <br/>
                <p clas="text-justify">
                     Pay at the counter. Your order is reserved for 24 hours. Check your Checkout History for the reservation code.
                </p> <br/>
                <input class='bg-[#1E1E1E] text-white border rounded-md w-full p-2 
                hover:bg-[#353434] cursor-pointer' type="submit" name='RegisterProduct' value="Done"/>
            </form>

        </div>
    </div>
</div>