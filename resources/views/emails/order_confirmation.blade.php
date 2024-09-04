<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .order-details {
            margin-bottom: 20px;
        }

        .order-details h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details th,
        .order-details td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }

        .order-details th {
            background-color: #f2f2f2;
        }

        .order-summary {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .order-summary p {
            margin: 0;
            font-size: 16px;
        }

        .order-summary .total {
            font-size: 18px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
            border-top: 1px solid #dddddd;
            font-size: 14px;
            color: #555555;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Order Confirmation</h1>
            <p>Hi {{ $order->name }},</p>
            <p>Thank you for your order! Below are the details of your purchase:</p>
            <div class="order-details">
                <h2>Order Details</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (json_decode($order->product_details, true) as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['color'] }}</td>
                                <td>{{ $item['size'] }}</td>
                                <td>{{ $item['price'] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="order-summary">
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->zip }}</p>
                <p class="total"><strong>Total Amount:</strong> £{{ number_format($order->total_amount, 2) }}</p>
            </div>
            <p>If you have any questions or need further assistance, please contact our support team.</p>
            <p>Thank you for shopping with us!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            <p><a href="https://www.poshmarktrading.com">Visit our website</a> | <a
                    href="mailto:poshmarktradinguk@gmail.com">Contact support</a></p>
        </div>
    </div>
</body>

</html>
