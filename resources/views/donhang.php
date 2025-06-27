<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đơn Hàng</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .customer-info,
    .order-details {
        margin-bottom: 20px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 5px;
    }

    .customer-info h2,
    .order-details h2 {
        color: #007bff;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
       
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tfoot tr {
        font-weight: bold;
        background-color: #f2f2f2;
    }

    .footer {
        text-align: center;
        margin-top: 20px;

    }

 
</style>

<body>
    <div class="container">
        <h1>Thông Tin Đơn Hàng</h1>
        <div class="customer-info">
            <h2>Thông Tin Khách Hàng</h2>
            <p><strong>Tên:</strong> Nguyễn Văn A</p>
            <p><strong>Địa chỉ:</strong> 123 Đường ABC, Quận 1, TP.HCM</p>
            <p><strong>Số điện thoại:</strong> 0901234567</p>
            <p><strong>Email:</strong> nguyenvana@gmail.com</p>
        </div>

        <div class="order-details">
            <h2>Chi Tiết Đơn Hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sách A</td>
                        <td>2</td>
                        <td>60.000 VNĐ</td>
                        <td>120.000 VNĐ</td>
                    </tr>
                    <tr>
                        <td>Sách B</td>
                        <td>1</td>
                        <td>80.000 VNĐ</td>
                        <td>80.000 VNĐ</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Tổng Cộng</strong></td>
                        <td><strong>200.000 VNĐ</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="footer">
            <button>Về Trang Chủ</button>
            <button>Hủy Đơn Hàng</button>
            <p>© 2025 Book Shop. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</body>

</html>