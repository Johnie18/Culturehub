<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OTP Verification</title>
    <style>
        body {
            background: #f4f6f8;
            font-family: 'Poppins', sans-serif;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 480px;
            background: white;
            border-radius: 8px;
            padding: 30px;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #007bff;
            text-align: center;
        }
        .otp {
            font-size: 28px;
            text-align: center;
            font-weight: bold;
            color: #212529;
            letter-spacing: 4px;
            margin: 20px 0;
        }
        p {
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $subject ?? 'Your One-Time Password (OTP)' }}</h2>
        <p>Use the following OTP to verify your email or reset your password:</p>
        <div class="otp">{{ $otp }}</div>
        <p>This OTP will expire soon. Do not share it with anyone.</p>
    </div>
</body>
</html>
