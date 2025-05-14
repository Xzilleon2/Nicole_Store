<script>
// Open modal and fill in product details when "Add" button is clicked
document.querySelectorAll('.showaddCart').forEach(btn => {
    btn.addEventListener('click', () => {
        // Get the data attributes from the clicked button
        const productName = btn.getAttribute('data-name');
        const productPrice = parseFloat(btn.getAttribute('data-price'));
        const productStock = parseInt(btn.getAttribute('data-stock'));
        const productId = btn.getAttribute('data-id'); 
        const discountPercent = parseFloat(btn.getAttribute('data-discount') || 0);
        
        // Apply discount
        const discountedPrice = productPrice * (1 - discountPercent);

        // Fill the modal with the product details
        document.getElementById('modalProductName').textContent = productName;
        document.getElementById('modalProductPrice').textContent = 'P' + discountedPrice.toFixed(2);
        document.getElementById('modalStock').textContent = productStock;
        
        // Set the hidden inputs for backend (for submitting the form)
        document.getElementById('hiddenProductName').value = productName;
        document.getElementById('hiddenProductPrice').value = discountedPrice.toFixed(2);
        document.getElementById('hiddenProductStock').value = productStock;
        document.getElementById('hiddenProductId').value = productId;

        // Set the maximum quantity to the available stock
        const qtyInput = document.getElementById('quantityInput');
        qtyInput.max = productStock;
        qtyInput.value = 1; // Reset quantity to 1

        // Calculate and set the initial total price
        const total = discountedPrice.toFixed(2);
        document.getElementById('modalTotalPrice').textContent = 'P' + total;
        document.getElementById('hiddenTotalPrice').value = total;

        // Show the modal
        const modal = document.getElementById('addCartModal');
        modal.classList.remove('hidden');
    });
});

// Close modal when "Cancel" button is clicked
document.getElementById('closeaddCart').addEventListener('click', () => {
    document.getElementById('addCartModal').classList.add('hidden');
});

// Update total price dynamically when quantity changes
document.getElementById('quantityInput').addEventListener('input', () => {
    const price = parseFloat(document.getElementById('modalProductPrice').textContent.replace('P', ''));
    const qtyInput = document.getElementById('quantityInput');
    const max = parseInt(qtyInput.max);
    let qty = parseInt(qtyInput.value);

    if (isNaN(qty) || qty < 1) qty = 1;
    if (qty > max) qty = max;

    qtyInput.value = qty;

    const total = (price * qty).toFixed(2);
    document.getElementById('modalTotalPrice').textContent = 'P' + total;
    document.getElementById('hiddenTotalPrice').value = total;
});
</script>
