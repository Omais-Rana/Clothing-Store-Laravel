<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Notification</title>
    <style>
        /* Basic styles for the email */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        .order-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-details th,
        .order-details td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .order-details th {
            background-color: #f8f8f8;
        }

        .order-summary {
            margin-top: 20px;
        }

        .order-summary p {
            margin: 5px 0;
        }

        .total {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>New Order Notification</h1>
            <p>A new order has been placed. Below are the details:</p>
            <div class="order-details">
                <h2>Order Details</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Color</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (json_decode($order->product_details, true) as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['color'] }}</td>
                                <td>{{ $item['size'] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="order-summary">
                <p><strong>Customer Name:</strong> {{ $order->name }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->zip }}</p>
                <p><strong>Total Amount:</strong> £{{ number_format($order->total_amount, 2) }}</p>
            </div>
            <p>Please process this order promptly. Thank you.</p>
        </div>
    </div>
</body>

</html>
