<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <style>
        /* Customize your email styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f6f6f6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .logo {
            max-width: 200px;
            display: block;
            margin: 0 auto;
        }
        .order-info {
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .product-image {
            width: 150px;
            float: left;
            margin-right: 10px;
        }
        .order-card {
            position: relative;
            display: inline-block;
            border: 1px solid #ccc;
            padding: 10px;
            width: 400px;
            border: none;
            box-shadow: 1px solid #f6f7f8;
            margin-bottom: 20px;
        }
        .span-class{
            padding-left: 40%;
        }
        .custom-hr {
            width: 100px;
            border: 1px solid #ccc;
            margin:20px auto;
            margin-left: 50px;
        }
        .address{
            display: flex;
        }
         .address p{
            padding: 10px;
        }
        .name_address{
            display: flex;
        }
        .name_address p{
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('assets\media\OrderEmailLogo/orderLogo.png') }}" alt="Logo" class="logo">
        <h2>Order Confirmation</h2>
        <p>Hello</p>
        <p>Your order has been confirmed. Below are the details of your order:</p>
        <h3>Order Summary</h3>
        <div class="order-card">
            <img src="{{ asset('assets\media\OrderEmailLogo/orderLogo.png') }}" alt="Product Image" class="product-image">
            <span class="product-price span-class">$19.99</span>
            <!-- Add more order details here if needed -->
            <hr>
        </div>
        {{--  <h3>Customer  Information</h3>
        <Address>
           <div class="address">
             <p>Address</p>
            <p>Location</p>
           </div>
           <div class="name_address">
            <p>Name</p>
            <p>Name</p>

           </div>
        </Address>  --}}
        <p>Thank you for your order!</p>
        <p>Regards,<br>Admin Of Flowers-2me.com Admin</p>
    </div>
</body>
</html>
