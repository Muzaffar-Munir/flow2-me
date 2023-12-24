<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #777;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Email Verification</h2>
        <p>Dear User,</p>
        <p>Thank you for registering with Flowers-2me.com. To complete your registration and access your account, please verify your email by clicking the link below:</p>
        <a href="{{ route('user-verifications', ['token' => $token]) }}">Click here to verify your account</a>
        <p>If you did not initiate this registration, you can safely ignore this email.</p>
        <p>Best regards,</p>
        <p>Your Flowers-2me.com Team</p>
    </div>
</body>
</html>
