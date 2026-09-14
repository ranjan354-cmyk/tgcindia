<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Thank You - TGC India</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      text-align: left; /* Optional if you want the whole page aligned */
    }
    .email-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      text-align: left; /* Ensures everything inside is left-aligned */
    }
    .contact-info {
      margin-top: 15px;
    }
    .contact-info p {
      margin: 5px 0;
    }
    .footer {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <p>Dear {{ isset($details['name']) ? $details['name'] : 'Student' }} ,</p>

    <p>
      Thank you for showing interest in <strong>TGC India</strong>. Our team will connect with you shortly to guide you about courses and admission.
    </p>

    <div class="contact-info">
      <p><strong>For quick assistance, reach us at:</strong></p>
      <p>📞 <strong>1800 1020 418</strong> (Toll-Free)</p>
      <p>📞 +91-9582786406 | +91-9582786407</p>
      <p>📧 <a href="mailto:info@tgcindia.com">info@tgcindia.com</a></p>
      <p>💬 WhatsApp: <a href="https://wa.me/919582786407" target="_blank">+91 9582786407</a></p>
    </div>

    <div class="footer">
      <p>Best regards,<br>
      <strong>Team TGC</strong></p>
    </div>
  </div>
</body>
</html>
