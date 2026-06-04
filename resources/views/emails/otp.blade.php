<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kode Verifikasi StarConnect</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
            color: #1f2937;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #0f766e 0%, #06b6d4 100%);
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .content {
            padding: 40px 30px;
            text-align: center;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #4b5563;
            margin-top: 0;
        }
        .otp-container {
            background-color: #f3f4f6;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
            letter-spacing: 5px;
        }
        .otp-code {
            font-size: 32px;
            font-weight: 900;
            color: #0f766e;
            margin: 0;
        }
        .warning {
            font-size: 14px;
            color: #ef4444;
            margin-top: 20px;
        }
        .footer {
            background-color: #f9fafb;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        .footer p {
            font-size: 12px;
            color: #9ca3af;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>StarConnect</h1>
        </div>
        <div class="content">
            <p>Halo,</p>
            <p>Anda menerima email ini karena ada permintaan untuk menautkan alamat email ini dengan akun StarConnect Anda. Gunakan kode verifikasi di bawah ini untuk menyelesaikan proses:</p>
            
            <div class="otp-container">
                <p class="otp-code">{{ $otp }}</p>
            </div>
            
            <p>Kode ini hanya berlaku selama <strong>5 menit</strong>.</p>
            <p class="warning">Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} StarConnect. All rights reserved.</p>
            <p>Jl. Luwunggede-Mundu, Tanjung, Kab. Brebes</p>
        </div>
    </div>
</body>
</html>
