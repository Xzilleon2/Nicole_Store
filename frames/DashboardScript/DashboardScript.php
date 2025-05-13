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

    showEditProfile.addEventListener('click', () =>{
        EditProfileModal.classList.remove('hidden');
    });

    closeEditProfile.addEventListener('click', () => {
        EditProfileModal.classList.add('hidden');
    });

    showCheckout.addEventListener('click', () =>{
        CheckoutModal.classList.remove('hidden');
    });

    closeCheckout.addEventListener('click', () => {
        CheckoutModal.classList.add('hidden');
    });

    showCartTable.addEventListener('click', ()=> {
        CartTable.classList.remove('hidden');
        PurchaseTable.classList.add('hidden');
    });
    showPurchaseTable.addEventListener('click', ()=> {
        PurchaseTable.classList.remove('hidden');
        CartTable.classList.add('hidden');
    });
</script>