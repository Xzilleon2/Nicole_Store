<!--Function for the modals of Dashboard-->
<script>
    const addCartModal = document.getElementById('addCartModal');
    const showaddCart = document.getElementById('showaddCart');
    const showaddCart1 = document.getElementById('showaddCart1');
    const closeaddCart = document.getElementById('closeaddCart');

    showaddCart.addEventListener('click', () =>{
        addCartModal.classList.remove('hidden');
    });

    showaddCart1.addEventListener('click', () =>{
        addCartModal.classList.remove('hidden');
    });

    closeaddCart.addEventListener('click', () => {
        addCartModal.classList.add('hidden');
    });
</script>