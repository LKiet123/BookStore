<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Checkout</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #fff;
            color: #1f2937;
        }

        .container {
            max-width: 1200px;
            margin: 24px auto;
            padding: 0 16px;
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        /* Left + Center container */
        .left-center {
            display: flex;
            flex: 1 1 600px;
            gap: 24px;
            flex-wrap: wrap;
        }

        /* Left form */
        .left {
            flex: 1 1 280px;
            max-width: 400px;
        }

        .logo {
            font-size: 24px;
            font-weight: 600;
            color: #d35400;
            margin-bottom: 24px;
        }

        .logo span {
            font-weight: 400;
        }

        h2 {
            font-weight: 600;
            margin-bottom: 12px;
        }

        form input {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
            color: #9ca3af;
            margin-bottom: 12px;
            outline: none;
            transition: border-color 0.2s ease;
        }

        form input:focus {
            border-color: #d35400;
            color: #1f2937;
        }

        /* Center payment */
        .center {
            display: flex;
            flex: 1 1 320px;
            flex-direction: column;
            max-width: 420px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            padding: 16px;
            background-color: #f9fafb;
        }

        .payment-options label {
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            background: #fff;
            padding: 14px 16px;
            margin-bottom: 14px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.03);
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            cursor: pointer;
            position: relative;
        }

        .payment-options label:hover {
            border-color: #d35400;
            background: #fff7f0;
            box-shadow: 0 2px 8px rgba(211, 84, 0, 0.08);
        }

        .payment-options input[type="radio"] {
            accent-color: #d35400;
            width: 18px;
            height: 18px;
            margin-right: 12px;
            cursor: pointer;
        }

        .payment-options input[type="radio"]:checked+p,
        .payment-options input[type="radio"]:checked~i {
            color: #d35400;
            font-weight: 600;
        }

        .payment-options p {
            margin: 0;
            font-size: 15px;
            color: #374151;
            flex: 1;
            transition: color 0.2s;
        }

        .payment-options i {
            margin-left: 8px;
            color: #d35400;
            font-size: 18px;
            transition: color 0.2s;
        }

        button {
            width: 100%;
            border: none;
            border-radius: 4px;
            font-weight: 700;
            font-size: 12px;
            padding: 8px 0;
            cursor: pointer;
            margin-top: 12px;
            line-height: 1.2;
        }

        .btn-red {
            background-color: #dc0000;
            color: white;
        }

        .btn-red:hover {
            background-color: #b30000;
        }

        .btn-yellow {
            background-color: #fef200;
            color: black;
        }

        .btn-yellow:hover {
            background-color: #e6d800;
        }

        .btn-yellow span {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
            font-weight: 400;
            font-size: 10px;
            margin-top: 2px;
        }

        .payment-info {
            margin-top: 12px;
            background-color: #d1d5db;
            border-radius: 4px;
            padding: 12px;
            font-size: 10px;
            color: #374151;
            line-height: 1.1;
        }

        .payment-info strong {
            font-weight: 700;
            display: block;
            margin-bottom: 4px;
        }

        .payment-info .red-text {
            color: #b91c1c;
            font-weight: 400;
        }

        .payment-info .logo-small {
            vertical-align: middle;
            height: 12px;
            margin-left: 4px;
        }

        .payment-info .offer {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 8px;
        }

        .payment-info .offer img {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .payment-info .offer-text {
            font-size: 10px;
            line-height: 1.1;
            flex: 1;
        }

        .payment-info .hot-badge {
            background-color: #dc0000;
            color: white;
            font-weight: 700;
            font-size: 10px;
            border-radius: 9999px;
            padding: 4px 12px;
            margin-left: 8px;
            min-width: 48px;
            height: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .payment-info .powered {
            text-align: right;
            font-size: 8px;
            color: #4b5563;
            margin-top: 8px;
        }

        .payment-info .powered a {
            color: #2563eb;
            text-decoration: underline;
        }

        /* Right order summary */
        .right {
            flex: 1 1 320px;
            max-width: 480px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            padding: 12px;
        }

        .right h3 {
            font-weight: 600;
            font-size: 14px;
            margin: 0 0 12px 0;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 8px;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            padding: 12px;
        }

        .order-item img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 4px;
            position: relative;
        }

        .order-item .badge {
            position: absolute;
            top: -4px;
            left: -4px;
            background-color: #d35400;
            color: white;
            font-size: 10px;
            font-weight: 700;
            border-radius: 9999px;
            width: 16px;
            height: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px;
        }

        .order-item-text {
            font-size: 12px;
            color: #374151;
            flex: 1;
            line-height: 1.2;
        }

        .order-item-price {
            font-size: 12px;
            color: #374151;
            white-space: nowrap;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 12px;
            color: #374151;
            padding: 12px;
        }

        .order-buttons {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
        }

        .btn-green {
            background-color: #15803d;
            color: white;
            font-size: 12px;
            font-weight: 600;
            border-radius: 4px;
            padding: 6px 12px;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            border: none;
            height: 36px;
        }

        .btn-green:hover {
            background-color: #166534;
        }

        .btn-orange {
            background-color: #d35400;
            color: white;
            font-size: 12px;
            font-weight: 700;
            border-radius: 4px;
            padding: 6px 24px;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
        }

        .btn-orange:hover {
            background-color: #b84300;
        }

        .btn-green i {
            font-size: 14px;
        }

        .order-note {
            font-size: 15px;
            color: #4b5563;
            line-height: 1.3;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close-modal {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-modal:hover,
        .close-modal:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .left-center {
                flex-direction: column;
            }

            .left,
            .center {
                max-width: 100%;
                flex: 1 1 100%;
            }

            .right {
                max-width: 100%;
                flex: 1 1 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="left-center">
            <div class="left">
                <h1 class="logo">Book <span>Shop</span></h1>
                <h2>Thông tin nhận hàng</h2>
                <form>
                    <input type="text" placeholder="Họ và tên người nhận hàng" name="name"
                        value="{{ $user->full_name ?? '' }}" />
                    <input type="text" placeholder="Số điện thoại" name="phone"
                        value="{{ $user->phone ?? '' }}" />
                    <input type="text" placeholder="Địa chỉ" name="address"
                        value="{{ $user->address ?? '' }}" />
                    <input type="email" placeholder="Email" name="email"
                        value="{{ $user->email ?? '' }}" />
                    <input type="text" placeholder="Ghi chú đơn hàng (tùy chọn)" name="note" />
                </form>
            </div>
            <div class="center">
                <h2>Thanh toán</h2>
                <form class="payment-options">
                    <label>
                        <input type="radio" name="payment" checked />
                        <p>Thanh toán khi nhận hàng (COD)</p>
                        <i class="fas fa-money-bill-wave" aria-hidden="true"></i>
                    </label>
                    <label>
                        <input type="radio" name="payment" id="bank-radio" />
                        <p>Thanh toán qua ngân hàng</p>
                        <i class="fas fa-university" aria-hidden="true"></i>
                    </label>
                    <div class="bank-info">
                        <strong>Thông tin chuyển khoản ngân hàng:</strong>
                        <ul>
                            <li>Ngân hàng: Vietcombank</li>
                            <li>Số tài khoản: 0123456789</li>
                            <li>Chủ tài khoản: Nguyễn Văn A</li>
                            <li>Nội Dung Chuyển Khoản : Số Điện Thoại Và Tên Người Nhận</li>
                        </ul>
                    </div>
                </form>

                <form action="{{ url('/vnpay_payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="total" value="{{$total}}">
                    <button type="submit" class="btn check_out"
                        name="redirect" style="height: 50px; background-color:rgb(9, 2, 76); color: white; border: none; border-radius: 4px; font-size: 14px; font-weight: 600; cursor: pointer; width: 100%; display: flex; align-items: center; justify-content: center;"><i class="fas fa-credit-card" style="margin-right: 8px;"></i>Thanh Toán Bằng VNPAY</button>

                </form>
                <form action="{{ url('/momo_payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="total" value="{{$total}}">
                    <button type="submit" class="btn check_out"
                        name="redirect" style="height: 50px; background-color:rgb(76, 2, 46); color: white; border: none; border-radius: 4px; font-size: 14px; font-weight: 600; cursor: pointer; width: 100%; display: flex; align-items: center; justify-content: center;"><i class="fas fa-credit-card" style="margin-right: 8px;"></i>Thanh Toán Bằng MoMo</button>

                </form>

            </div>
        </div>
        <div class="right">
            <h3>Đơn hàng ({{ $totalQuantity }} sản phẩm)</h3>
            @foreach($cartItems as $item)
            <div class="order-item" style="position:relative;">
                <img src="{{ $item->book->cover_image ? asset('uploads/' . ltrim($item->book->cover_image, '/')) : 'https://storage.googleapis.com/a1aa/image/84982eee-aa44-41ca-4541-5e3a7b555e3a.jpg' }}"
                    alt="{{ $item->book->title }}" width="40" height="40" />
                <div class="badge"
                    style="position:absolute;top:-4px;left:-4px;background:#d35400;color:#fff;font-size:10px;font-weight:700;border-radius:9999px;width:16px;height:16px;display:flex;justify-content:center;align-items:center;">
                    {{ $item->quantity }}
                </div>
                <p class="order-item-text">{{ $item->book->title }}</p>
                <span class="order-item-price">{{ $item->book->price * $item->quantity }} ₫</span>
            </div>
            @endforeach
            <div class="order-total">
                <span>Tổng cộng</span>
                <span>{{ $total }} ₫</span>
            </div>
            <div class="order-buttons">
                <a href="{{route('cart.show')}}" style="text-decoration: none; width: 100%;"><button class="btn-green" type="button"><i class="fas fa-pen"></i> Sửa giỏ hàng</button></a>

                <button type="button" class="btn btn-orange check_out" data-bs-toggle="modal" data-bs-target="#myModal">
                    Đặt Hàng
                </button>
            </div>

            <p class="order-note">
                - Giá trên chưa bao gồm phí vận chuyển. Phí vận chuyển sẽ được nhân viên báo khi xác nhận đơn
                hàng.<br />
                - Thời gian xử lý đơn hàng: Từ 8h00- 17h thứ 2 đến thứ 7. Các đơn hàng sau thời gian này sẽ được xử lý
                vào ngày làm việc tiếp theo.
            </p>
        </div>
    </div>


</body>
<script>
    document.addEventListener('click', function() {
        const radios = document.querySelectorAll('.payment-options input[type="radio"]');
        const bankInfo = document.querySelector('.bank-info');

        function toggleBankInfo() {
            // Show if the second radio is checked
            if (radios[0].checked || !radios[1].checked) {
                bankInfo.style.display = 'none';
            } else {
                bankInfo.style.display = 'block';
            }
        }
        radios.forEach(radio => radio.addEventListener('change', toggleBankInfo));
        toggleBankInfo(); // Initial check
    });

    // Modal functionality
    const modal = document.getElementById("card-modal");
    const openModalButton = document.getElementById("open-card-modal");
    const closeModalButton = document.querySelector(".close-modal");

    openModalButton.addEventListener("click", function() {
        modal.style.display = "block";
    });

    closeModalButton.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
</script>

</html>