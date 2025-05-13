<!--Function for the modals of Dashboard-->
<script>

document.querySelectorAll('.showaddCart').forEach(btn => {
    btn.addEventListener('click', () => {
        const modal = document.getElementById('addCartModal');
        if (modal) {
            modal.classList.remove('hidden');
        }
    });
});

// Close modal functionality
document.getElementById('closeaddCart').addEventListener('click', () => {
    const modal = document.getElementById('addCartModal');
    modal.classList.add('hidden');
});

</script>