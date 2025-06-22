<!--Function for the modals of Dashboard-->
<script>
    const EditProfileModal = document.getElementById('editProfileModal');
    const showEditProfile = document.getElementById('showEditProfile');
    const closeEditProfile = document.getElementById('closeModalProfile');

    const CheckoutModal = document.getElementById('CheckoutModal');
    const showCheckout = document.getElementById('showCheckout');
    const closeCheckout = document.getElementById('closeCheckout');

    const CartTable = document.getElementById('CartTable');
    const showCartTable = document.getElementById('showCartTable');

    const PurchaseTable = document.getElementById('PurchaseTable');
    const showPurchaseTable = document.getElementById('showPurchaseTable');

    // Edit Profile modal toggle
    showEditProfile?.addEventListener('click', () => {
        EditProfileModal.classList.remove('hidden');
    });

    closeEditProfile?.addEventListener('click', () => {
        EditProfileModal.classList.add('hidden');
    });

    // Checkout logic
    showCheckout?.addEventListener('click', () => {
        const checkboxes = document.querySelectorAll('input[name="selected_cart[]"]:checked');
        if (checkboxes.length === 0) {
            alert("Please select at least one item to checkout.");
            return;
        }

        let totalPrice = 0;
        const selectedIds = [];

        checkboxes.forEach(cb => {
            const row = cb.closest('tr');
            const priceCell = row.querySelector('td:nth-child(4)');
            const price = parseFloat(priceCell.textContent.replace('P', '').trim());
            if (!isNaN(price)) totalPrice += price;
            selectedIds.push(cb.value);
        });

        // Get session data from HTML
        const sessionData = document.getElementById('session-data');
        const customerName = sessionData.dataset.name;
        const contactNumber = sessionData.dataset.contact;

        // Auto-filling the input fields with session data
        document.querySelector('input[name="TotalPrice"]').value = `P${totalPrice.toFixed(2)}`;
        document.querySelector('input[name="customerName"]').value = customerName;
        document.querySelector('input[name="selected_ids"]').value = selectedIds.join(',');

        CheckoutModal.classList.remove('hidden');
    });



    closeCheckout?.addEventListener('click', () => {
        CheckoutModal.classList.add('hidden');
    });

    // Toggle between Cart and Purchase tables
    showCartTable?.addEventListener('click', () => {
        CartTable.classList.remove('hidden');
        PurchaseTable.classList.add('hidden');
    });

    showPurchaseTable?.addEventListener('click', () => {
        PurchaseTable.classList.remove('hidden');
        CartTable.classList.add('hidden');
    });
</script>
