<!--Function for the modals of Admin Dashboard-->
<script>
    const EditProfileModal = document.getElementById('addProfileModal');
    const showEditProfile = document.getElementById('showEditProfile');
    const closeEditProfile = document.getElementById('closeModalProfile');

    const ProductModal = document.getElementById('addProductModal');
    const openBtnProduct = document.getElementById('addProductBtn');
    const closeBtnProduct = document.getElementById('closeModalDash');

    const CustomerModal = document.getElementById('addCustomerModal');
    const openBtnCustomer = document.getElementById('addCustomerBtn');
    const closeBtnCustomer = document.getElementById('closeModalCustomer');

    const CustomerTable = document.getElementById('CustomerTable');
    const showCustomerTable = document.getElementById('showCustomerTable');

    const InventoryTable = document.getElementById('InventoryTable');
    const showInventoryTable = document.getElementById('showInventoryTable');

    const ReservationTable = document.getElementById('ReservationTable');
    const showReservationTable = document.getElementById('showReservationTable');

    showEditProfile.addEventListener('click', () =>{
        EditProfileModal.classList.remove('hidden');
    });

    closeEditProfile.addEventListener('click', () => {
        EditProfileModal.classList.add('hidden');
    });

    openBtnProduct.addEventListener('click', () =>{
        ProductModal.classList.remove('hidden');
    });

    closeBtnProduct.addEventListener('click', () => {
        ProductModal.classList.add('hidden');
    });

    openBtnCustomer.addEventListener('click', ()=> {
        CustomerModal.classList.remove('hidden');
    });
    closeBtnCustomer.addEventListener('click', ()=> {
        CustomerModal.classList .add('hidden');
    });

    showCustomerTable.addEventListener('click', ()=> {
        CustomerTable.classList.remove('hidden');
        InventoryTable.classList.add('hidden');
        ReservationTable.classList.add('hidden');
    });
    showInventoryTable.addEventListener('click', ()=> {
        InventoryTable.classList.remove('hidden');
        CustomerTable.classList.add('hidden');
        ReservationTable.classList.add('hidden');
    });
    showReservationTable.addEventListener('click', ()=> {
        ReservationTable.classList.remove('hidden');
        InventoryTable.classList.add('hidden');
        CustomerTable.classList.add('hidden');
    });
</script>