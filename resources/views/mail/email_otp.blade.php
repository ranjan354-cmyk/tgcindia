<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            max-width: 100px;
        }
        .content {
            margin: 20px 0;
        }
        .otp-code {
            display: inline-block;
            background-color: #007BFF;
            color: #ffffff;
            font-size: 24px;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .footer {
            text-align: center;
            color: #777777;
            font-size: 12px;
            margin-top: 20px;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{url('assets/front/img/logo.png')}}" alt="TGC India">
        </div>
        <div class="content">
            <h2>Hello, {{$details['name']}}!</h2>
            <p>We received a request to access your account with an OTP. Use the code below to complete your request. This OTP is valid for the next 10 minutes.</p>
            <p>Your OTP code is:</p>
            <p><a href="#" class="otp-code">{{$details['otp']}}</a></p>
            <p>If you didn't request this, please ignore this email or contact support if you have any concerns.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
            <p><a href="http://tgcindia.com/">Visit our website</a> | <a href="mailto:support@tgcindia.com">Contact Support</a></p>
        </div>
    </div>
</body>
</html>
