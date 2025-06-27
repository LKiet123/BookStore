// Fetch cart data from the cart API and log/display it
function fetchCartData() {
    fetch('/api/cart', {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // You can render cart items to the page here
            console.log('Cart items:', data.cart);
            // Example: display in a div with id="payCart"
            // document.getElementById('payCart').textContent = JSON.stringify(data.cart, null, 2);
        } else {
            alert(data.message || 'Không thể lấy dữ liệu giỏ hàng.');
        }
    })
    .catch(() => alert('Có lỗi khi lấy dữ liệu giỏ hàng!'));
}

// Call the function when needed (e.g., on page load)
document.addEventListener('DOMContentLoaded', fetchCartData);