<!-- Add to Cart Modal -->
<div id="addCartModal" class="hidden fixed inset-0 z-50 flex items-center justify-center z-11">
    <form action="../Functions/HomePageFunctions/addCartFunc.php" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-96">

        <!-- Product Name Display -->
        <h2 class="uppercase text-xl font-bold mb-2" id="modalProductName">Product Name</h2>
        <p class="mb-2 text-gray-600">Price: <span id="modalProductPrice">0.00</span></p>

        <!-- Hidden Inputs for Backend -->
        <input type="hidden" name="product_name" id="hiddenProductName">
        <input type="hidden" name="price" id="hiddenProductPrice">
        <input type="hidden" name="stock" id="hiddenProductStock">
        <input type="hidden" name="product_id" id="hiddenProductId">
        <input type="hidden" name="total_price" id="hiddenTotalPrice">


        <!-- Quantity -->
        <label for="quantityInput" class="block text-sm font-medium text-gray-700">Quantity:</label>
        <input 
            type="number" 
            id="quantityInput" 
            name="quantity" 
            class="border w-full p-2 rounded mb-2" 
            min="1" 
            value="1"
            required
        >

        <!-- Stock Display + Total -->
        <p class="mb-2 text-sm text-gray-600">Available Stock: <span id="modalStock">0</span></p>
        <p class="mb-2 font-semibold text-lg">Total Price: <span id="modalTotalPrice">0.00</span></p>

        <!-- Buttons -->
        <div class="flex justify-end gap-2">
            <button 
                type="submit" 
                class="bg-green-600 text-white px-4 py-2 rounded hover:cursor-pointer"
            >Add</button>
            <button 
                type="button" 
                id="closeaddCart" 
                class="bg-gray-400 text-white px-4 py-2 rounded hover:cursor-pointer"
            >Cancel</button>
        </div>
    </form>
</div>
