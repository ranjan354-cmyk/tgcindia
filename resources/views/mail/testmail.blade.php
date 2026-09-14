<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry - TGC India</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .email-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 24px;
            color: #000;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .info-group {
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>{{ isset($details['title']) ? $details['title'] : 'New Enquiry' }}</h1>

        @foreach($details as $key => $value)
            @if(!empty($value))
                <div class="info-group">
                    <span class="info-label">{{ ucwords(str_replace('_', ' ', $key)) }}:</span> {{ $value }}
                </div>
            @endif
        @endforeach

        <div class="footer">
            <p>Best Regards,<br><strong>TGC India Team</strong></p>
        </div>
    </div>
</body>
</html>
