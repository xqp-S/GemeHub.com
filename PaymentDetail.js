document.addEventListener('DOMContentLoaded', () => {
    const selectedPaymentMethod = localStorage.getItem('selectedPaymentMethod')?.toLowerCase();
    console.log('Selected Payment Method:', selectedPaymentMethod);

    if (selectedPaymentMethod) {
        const paymentSection = document.getElementById(selectedPaymentMethod);
        console.log('Payment Section:', paymentSection);

        if (paymentSection) {
            paymentSection.style.display = 'block';
            paymentSection.style.position ='fixed';
            paymentSection.style.top ='50%';
            paymentSection.style.left ='50%';
            paymentSection.style.transform ='translate(-50%, -50%)';
            
        } else {
            alert('Invalid payment method selected.');
        }
    } else {
        alert('No payment method selected. Redirecting back to the shopping cart.');
        window.location.href = 'shoppingcart.html';
    }

    const btn = document.getElementById('btn');
    btn.addEventListener('click', (event)=>{
        event.preventDefault();

        const visibleInputs = document.querySelectorAll(`#${selectedPaymentMethod} [required]`);
        let isValid = true;

        visibleInputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('is-invalid'); // Add Bootstrap's validation class
            } else {
                input.classList.remove('is-invalid'); // Remove validation class if input is valid
            }
        });

        if (isValid) {
            window.location.href = "index.html";
        } else {
            alert('Please fill out all required fields.');
        }

    });
    
});
