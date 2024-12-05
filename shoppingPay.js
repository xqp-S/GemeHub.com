function proceedToPayment() {
    // Get the selected payment method
    const selectedPaymentMethod = document.querySelector('input[name="PM"]:checked');

    if (!selectedPaymentMethod) {
        alert('Please select a payment method!');
        return;
    }

    // Save the selected payment method in localStorage
    localStorage.setItem('selectedPaymentMethod', selectedPaymentMethod.value.toLowerCase());

    // Redirect to the Payment Details page
    window.location.href = 'Payment_Method.html';
}