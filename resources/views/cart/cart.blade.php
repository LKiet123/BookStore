<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <title>Giỏ Hàng</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 16px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: white;
            border-bottom: 1px solid #ddd;
            width: 100vw;
        }

        .logo {
            display: flex;
            width: 250px;
            height: 70px;
            padding: 0 20px;
        }

        .logo span {
            margin-left: 5px;
        }

        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 5px 10px;

        }

        .search-box input {
            border: none;
            outline: none;
            padding: 5px;
            width: 300px;
        }

        .search-box i {
            color: gray;
        }


        .nav-links {
            display: flex;
            align-items: center;
            margin: 0 20px;
        }

        .nav-links a {
            margin-left: 20px;
            text-decoration: none;
            color: black;
            font-size: 14px;
        }

        .flag {
            width: 40px;
            margin-left: 15px;
        }

        .cart {
            font-size: 2rem;
            margin-left: 15px;
            position: relative;
            color: #ffee00;
            padding-left: 20px;
            margin-right: 50px;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            font-size: 12px;
            width: 15px;
            height: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 10px;
        }

        .content {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .category {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 900px;
            background-color: #f8f9fa;
            font-size: 20px;
            font-weight: bold;
        }

        .collapse {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar-nav {
            list-style-type: none;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
            gap: 20px;
        }

        .nav-item {
            position: relative;
            padding: 0 20px;
            height: 100%;
            display: flex;
        }

        .nav-link {
            z-index: 1;
            color: white;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 18px;
            padding: 10px 5px;
        }

        .nav-item::after {
            content: "";
            position: absolute;
            height: 5px;
            width: 0;
            background-color: white;
            right: 0;
            z-index: 0;
            bottom: 0;
            transition: all 0.5s;
        }


        .nav-link::before {
            position: absolute;
            content: "";
            height: 5px;
            width: 0;
            background-color: white;
            bottom: 66.66%;
            left: 0;
            transition: all 0.5s;
            top: 0;
        }

        .nav-item:hover::after,
        .nav-item:hover .nav-link::before {
            width: 100%;
        }

        .footer {

            width: 100%;
            bottom: 0;
            background-color: #2A1B3D;
            color: #fff;
            padding: 40px 20px;
        }


        .footer-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
        }

        .footer-column {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }

        .footer-column h4 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer-column p {
            font-size: 14px;
            color: #ccc;
        }

        .logo {
            margin-top: 20px;
        }

        .logo img {
            max-width: 150px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-column ul li a:hover {
            text-decoration: underline;
            color: #ddd;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .social-icons a img {
            background-color: #fff;
            border-radius: 20%;
            width: 30px;
            height: 30px;
            transition: transform 0.3s ease;
        }

        .social-icons a .face {
            background-color: #fff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            transition: transform 0.3s ease;
        }

        .social-icons a img:hover {
            transform: scale(1.2);
        }

        .payment-methods {
            text-align: center;
        }

        .payment-methods img {
            width: 40px;
        }

        .b-corp {
            margin-top: 20px;
        }

        .b-corp img {
            max-width: 100px;
        }


        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #ccc;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-bottom p {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .footer-column {
                margin-bottom: 30px;
            }

            .social-icons {
                justify-content: center;
            }
        }

        .cart-icon {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fa-shopping-cart {
            font-size: 1.5rem;
            color: #0f718a;
        }


        h2 {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 12px;
            color: #111827;

        }

        h2 span {
            font-weight: 400;
        }

        .cart-wrapper {
            background-color: #f9fafb;
            /* Tailwind gray-50 */
            border-radius: 0.5rem;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        label.select-all {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            color: #374151;
            /* Tailwind gray-700 */
            user-select: none;
            cursor: pointer;
        }

        label.select-all input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #374151;
            cursor: pointer;
        }

        label.select-all span {
            margin-left: 8px;
        }

        .product-row {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        @media (min-width: 640px) {
            .product-row {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                gap: 0;
            }
        }

        .product-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .product-left label {
            cursor: pointer;
        }

        .product-left input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #374151;
            cursor: pointer;
        }

        .product-image {
            width: 80px;
            height: 100px;
            object-fit: cover;
            flex-shrink: 0;
            background-color: #000;
        }

        .product-info {
            font-size: 0.875rem;
            color: #374151;
        }

        .product-info>div:first-child {
            margin-bottom: 4px;
        }

        .product-price {
            font-weight: 700;
            color: #111827;
            margin-top: 4px;
        }

        .product-price .old-price {
            text-decoration: line-through;
            color: #9ca3af;
            /* Tailwind gray-400 */
            font-weight: 400;
            margin-left: 8px;
        }

        .product-right {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.875rem;
            color: #374151;
            min-width: 180px;
            gap: 12px;
            flex-wrap: wrap;
        }

        @media (min-width: 640px) {
            .product-right {
                justify-content: flex-start;
                gap: 24px;
                flex-wrap: nowrap;
            }
        }

        .qty-label {
            white-space: nowrap;
        }

        .qty-controls {
            display: flex;
            border: 1px solid #d1d5db;
            /* Tailwind gray-300 */
            border-radius: 0.375rem;
            overflow: hidden;
            user-select: none;
        }

        .qty-controls button {
            background: none;
            border: none;
            padding: 4px 12px;
            font-size: 1.25rem;
            line-height: 1;
            color: #374151;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .qty-controls button:hover,
        .qty-controls button:focus {
            background-color: #f3f4f6;
            /* Tailwind gray-100 */
            outline: none;
        }

        .qty-controls input[type="text"] {
            width: 40px;
            text-align: center;
            border-left: 1px solid #d1d5db;
            border-right: 1px solid #d1d5db;
            font-size: 1rem;
            color: #374151;
            outline: none;
            user-select: none;
            pointer-events: none;
            background-color: #fff;
        }

        .total-price {
            font-weight: 700;
            color: #b91c1c;
            /* Tailwind red-700 */
            min-width: 80px;
            text-align: right;
            white-space: nowrap;
        }

        .delete-btn {
            background: none;
            border: none;
            color: #4b5563;
            /* Tailwind gray-600 */
            cursor: pointer;
            font-size: 1.125rem;
            transition: color 0.2s;
        }

        .delete-btn:hover,
        .delete-btn:focus {
            color: #111827;
            /* Tailwind gray-900 */
            outline: none;
        }

        .summary {
            background-color: #f9fafb;
            /* Tailwind gray-50 */
            border-radius: 0.5rem;
            padding: 16px;
            margin-top: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 0.875rem;
            color: #111827;
        }

        .summary .amount {
            color: #b91c1c;
            /* Tailwind red-700 */
        }

        .order-btn {
            width: 100%;
            background-color: #fff;
            border: 1px solid #d1d5db;
            /* Tailwind gray-300 */
            border-radius: 0.5rem;
            padding: 12px 0;
            margin-top: 16px;
            font-size: 0.875rem;
            color: #111827;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .order-btn:hover,
        .order-btn:focus {
            background-color: #f3f4f6;
            /* Tailwind gray-100 */
            outline: none;
        }

        .empty-cart-message {
            text-align: center;
            color: #6b7280;
            /* Tailwind gray-500 */
            padding: 24px 0;
            font-size: 1rem;
        }

        .text {

            border: none;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a class="logo" href="#">
            <img src="{{ asset('images/rsz_logo.png') }}" alt="">
        </a>
        <div class="search-box">
            <form class="d-flex position-relative" role="search" action="">
                <input class="form-control me-2 input-search" type="search" placeholder="Search" aria-label="Search"
                    name="q">
                <i class="fas fa-search mt-2 me-1" style="font-size: 1rem;"></i>

                <ul class="list-group suggest position-absolute start-0 end-0 top-100 bg-white" style="z-index: 10;">

                </ul>
            </form>
        </div>
        <div class="nav-links">
            @auth
            <span class="user-name mx-5">Xin chào <b class="text-primary">{{ Auth::user()->full_name }}</b></span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger"><b>Log Out</b></button>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary"><b>Sign In</b></a>
            <a href="{{ route('user.createUser') }}" class="btn btn-primary"><b>Sign Up</b></a>
            @endauth
            <div class="cart">
                <a href="{{ route('cart.show') }}" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    @auth
                    <sup id="cartCount" style="font-size: 20px;  color: #0f718a;">
                        {{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}
                    </sup>
                    @endauth
                </a>
            </div>
        </div>
    </nav>
    <div>

        <body>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <div class="container-fluid ">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="collapsibleNavbar">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#best-seller">Bán Chạy Nhất</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#new-book">Sách Mới Nhất</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tài Khoản</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </body>
    </div>

    <div class="container">
        <h2>
            GIỎ HÀNG
        </h2>
        <div class="cart-wrapper" id="cartWrapper"></div>
        <div class="summary">
            <span>Tổng Tiền</span>
            <span class="amount" id="grandTotal">0</span>
        </div>

        <button class="order-btn" id="orderBtn" type="button">Đặt Hàng</button>

    </div>
    <div>
        <footer class="footer">
            <div class="footer-container">

                <div class="footer-column">
                    <h4>BookShop</h4>
                    <p style="color: yellow;">★★★★★</p>
                    <p>TrustScore 5 | 0 reviews</p>
                    <div class="logo">
                        <img src="{{ asset('images/rsz_logo.png') }}" alt="Logo" />
                    </div>
                </div>


                <div class="footer-column">
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Support / Help</a></li>
                        <li><a href="#">Ebook FAQ</a></li>
                        <li><a href="#">Become an Affiliate</a></li>
                        <li><a href="#">Gift Cards</a></li>
                        <li><a href="#">Bookshop.io for Authors</a></li>
                        <li><a href="#">Bookshop.io for Bookstores</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Returns and Refund Policy</a></li>
                    </ul>
                </div>


                <div class="footer-column">
                    <h4 style="text-align: center;">Follow us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                    <div class="payment-methods">
                        <p style="margin-bottom: 2px;">Payments Accepted</p>
                        <img src="{{ asset('images/visa.png') }}" alt="Visa" />
                        <img src="{{ asset('images/mastercard.png') }}" alt="MasterCard" />
                        <img src="{{ asset('images/discover.png') }}" alt="discoverCard" />
                    </div>
                </div>
                <!-- Dòng dưới cùng -->
                <div class="footer-bottom">
                    <p>&copy; 2025 TDC</p>
                    <div class="footer-links">
                        <a href="#">Terms of Use</a>
                        <a href="#">Digital Terms of Use</a>
                        <a href="#">Privacy Notice</a>
                        <a href="#">Accessibility Notice</a>
                    </div>
                </div>
        </footer>
    </div>
    <script>

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/api/cart', {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (!data.success) {
                        document.getElementById('cartWrapper').innerHTML = '<div class="empty-cart-message">Bạn cần đăng nhập để xem giỏ hàng.</div>';
                        return;
                    }
                    const cart = data.cart;
                    if (!cart.length) {
                        document.getElementById('cartWrapper').innerHTML = '<div class="empty-cart-message">Giỏ hàng trống.</div>';
                        return;
                    }
                    let html = `
            <label class="select-all" for="selectAllCheckbox">
                <input type="checkbox" id="selectAllCheckbox" />
                <span>Chọn Tất Cả Sản Phẩm</span>
            </label>
        `;
                    cart.forEach(item => {
                        html += `
            <div class="product-row" data-cart-id="${item.cart_id}">
                <div class="product-left">
                    <label>
                        <input type="checkbox" class="product-checkbox" />
                    </label>
                    <img src="${item.book.cover_image ? '{{ asset('uploads') }}/' + item.book.cover_image : 'https://storage.googleapis.com/a1aa/image/84982eee-aa44-41ca-4541-5e3a7b555e3a.jpg'}"
                        alt="${item.book.title}" class="product-image" width="80" height="100" />
                    <div class="product-info">
                        <div>${item.book.title}</div>
                        <div class="product-price">
                            <span class="unit-price" data-base-price="${item.book.price}">${item.book.price}</span>
                        </div>
                    </div>
                </div>
                <div class="product-right">
                    <span class="qty-label">Số lượng</span>
                    <div class="qty-controls" aria-label="Số lượng sản phẩm">
                        <button type="button" class="decrease-btn" aria-label="Giảm số lượng">−</button>
                        <input type="text" class="text quantity-input" value="${item.quantity}" readonly aria-live="polite" aria-atomic="true" />
                        <button type="button" class="increase-btn" aria-label="Tăng số lượng">+</button>
                    </div>
                    <span class="total-price">${item.book.price * item.quantity}</span>
                    <button type="button" class="delete-btn" aria-label="Xóa sản phẩm">🗑️</button>
                </div>
            </div>
            `;
                    });
                    document.getElementById('cartWrapper').innerHTML = html;

                    // ---- MOVE YOUR LOGIC HERE ----
                    function formatPrice(price) {
                        return price.toLocaleString("vi-VN") + " đ";
                    }

                    const selectAllCheckbox = document.getElementById("selectAllCheckbox");
                    const productRows = document.querySelectorAll(".product-row");
                    const grandTotalEl = document.getElementById("grandTotal");

                    productRows.forEach((row, index) => {
                        const checkbox = row.querySelector(".product-checkbox");
                        const quantityInput = row.querySelector(".quantity-input");
                        const decreaseBtn = row.querySelector(".decrease-btn");
                        const increaseBtn = row.querySelector(".increase-btn");
                        const totalPriceEl = row.querySelector(".total-price");
                        const unitPriceEl = row.querySelector(".unit-price");
                        const cartId = row.getAttribute('data-cart-id');
                        const basePrice = Number(unitPriceEl.getAttribute("data-base-price"));

                        function formatPrice(price) {
                            return price.toLocaleString("vi-VN") + " đ";
                        }

                        function updateItemPrice() {
                            const qty = Number(quantityInput.value);
                            const total = basePrice * qty;
                            totalPriceEl.textContent = formatPrice(total);
                            updateGrandTotal();
                        }

                        function updateGrandTotal() {
                            let grandTotal = 0;
                            productRows.forEach((r) => {
                                const cb = r.querySelector(".product-checkbox");
                                const qtyInput = r.querySelector(".quantity-input");
                                const unit = r.querySelector(".unit-price");
                                const base = Number(unit.getAttribute("data-base-price"));
                                if (cb.checked) {
                                    grandTotal += base * Number(qtyInput.value);
                                }
                            });
                            grandTotalEl.textContent = formatPrice(grandTotal);
                        }

                        increaseBtn.addEventListener("click", () => {
                            let newQty = Number(quantityInput.value) + 1;
                            fetch(`/api/cart/${cartId}`, {
                                    method: 'PATCH',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        quantity: newQty
                                    })
                                })
                                .then(res => res.json())
                                .then(result => {
                                    if (result.success) {
                                        quantityInput.value = result.quantity;
                                        updateItemPrice();
                                        // Update cart icon quantity
                                        if (result.total_quantity !== undefined) {
                                            document.getElementById('cartCount').textContent = result.total_quantity;
                                        }
                                    } else {
                                        alert(result.message || 'Cập nhật số lượng thất bại!');
                                    }
                                });
                        });

                        decreaseBtn.addEventListener("click", () => {
                            let current = Number(quantityInput.value);
                            if (current > 1) {
                                let newQty = current - 1;
                                fetch(`/api/cart/${cartId}`, {
                                        method: 'PATCH',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                            'Accept': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            quantity: newQty
                                        })
                                    })
                                    .then(res => res.json())
                                    .then(result => {
                                        if (result.success) {
                                            quantityInput.value = result.quantity;
                                            updateItemPrice();
                                            // Update cart icon quantity
                                            if (result.total_quantity !== undefined) {
                                                document.getElementById('cartCount').textContent = result.total_quantity;
                                            }
                                        } else {
                                            alert(result.message || 'Cập nhật số lượng thất bại!');
                                        }
                                    });
                            }
                        });

                        checkbox.addEventListener("change", updateGrandTotal);

                        updateItemPrice();
                    });

                    // "Chọn tất cả" logic
                    selectAllCheckbox.addEventListener("change", () => {
                        const allChecked = selectAllCheckbox.checked;
                        productRows.forEach((row) => {
                            const cb = row.querySelector(".product-checkbox");
                            cb.checked = allChecked;
                        });
                        // Update grand total after select all
                        let grandTotal = 0;
                        if (allChecked) {
                            productRows.forEach((row) => {
                                const qty = Number(row.querySelector(".quantity-input").value);
                                const base = Number(row.querySelector(".unit-price").getAttribute("data-base-price"));
                                grandTotal += qty * base;
                            });
                        }
                        grandTotalEl.textContent = formatPrice(grandTotal);
                    });

                    // Đặt hàng
                    document.getElementById("orderBtn").addEventListener("click", function() {
                        const checked = document.querySelectorAll('.product-checkbox:checked');
                        if (checked.length === 0) {
                            alert("Vui lòng chọn ít nhất một sản phẩm để đặt hàng!");
                            return;
                        }
                        const cartIds = Array.from(checked).map(cb => cb.closest('.product-row').getAttribute('data-cart-id'));
                        window.location.href = "{{ route('pay.show') }}" + "?cart_ids=" + cartIds.join(',');
                    });



                    // Add event listeners for delete buttons
                    document.querySelectorAll('.delete-btn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const row = btn.closest('.product-row');
                            const cartId = row.getAttribute('data-cart-id');
                            if (confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                                fetch(`/api/cart/${cartId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                            'Accept': 'application/json'
                                        }
                                    })
                                    .then(res => res.json())
                                    .then(result => {
                                        if (result.success) {
                                            row.remove();
                                            // Update cart icon quantity
                                            if (result.total_quantity !== undefined) {
                                                document.getElementById('cartCount').textContent = result.total_quantity;
                                            }
                                            // Optionally update the total
                                            const event = new Event('change');
                                            row.querySelector('.product-checkbox').dispatchEvent(event);
                                        } else {
                                            alert(result.message || 'Xóa sản phẩm thất bại!');
                                        }
                                    })
                                    .catch(() => alert('Có lỗi xảy ra!'));
                            }
                        });
                    });
                });
        });
    </script>
    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            const keyword = this.value;

            if (keyword.length > 0) {
                fetch(`/cart/search/${keyword}`)
                    .then(response => response.json())
                    .then(data => {
                        const suggestions = document.getElementById('suggestions');
                        suggestions.innerHTML = ''; // Làm sạch danh sách trước

                        data.forEach(item => {
                            const li = document.createElement('li');
                            li.className = 'list-group-item';
                            li.textContent = item.book.title; // Hoặc item.title nếu bạn có trường này
                            suggestions.appendChild(li);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('suggestions').innerHTML = ''; // Làm sạch nếu không có từ khóa
            }
        });
    </script>
    <script src="{{ asset('js/cart-api.js') }}"></script>
    <script>
document.querySelector('.input-search').addEventListener('input', function() {
    const keyword = this.value.trim();
    const suggestBox = document.querySelector('.suggest');
    suggestBox.innerHTML = '';
    if (keyword.length === 0) return;

    fetch(`/api/products/search?q=${encodeURIComponent(keyword)}`)
        .then(res => res.json())
        .then(data => {
            if (data.success && data.products.length > 0) {
                suggestBox.innerHTML = data.products.map(product => `
                    <li class="list-group-item">
                        <a href="/itemDetail/${product.book_id}" style="text-decoration:none; color:black;">
                            <b>${product.title}</b>
                            <span style="color:gray;">${product.author ? ' - ' + product.author.author_name : ''}</span>
                        </a>
                    </li>
                `).join('');
            } else {
                suggestBox.innerHTML = '<li class="list-group-item">Không tìm thấy sản phẩm</li>';
            }
        });
});
</script>
</body>

</html>