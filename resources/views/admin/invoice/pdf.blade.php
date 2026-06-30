<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice - {{ $pelanggan->nama }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #0f172a;
            color: white;
            padding: 40px;
            position: relative;
        }
        .header-left {
            float: left;
            width: 50%;
        }
        .header-right {
            float: right;
            width: 50%;
            text-align: right;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0 0;
            color: #22d3ee;
        }
        .header-right h2 {
            margin: 0 0 5px 0;
            font-size: 32px;
            color: white;
        }
        .header-right p {
            margin: 0;
            color: #d1d5db;
        }
        .content {
            padding: 40px;
        }
        .info-bar {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 20px;
            margin-bottom: 20px;
            overflow: auto;
        }
        .info-left {
            float: left;
            width: 50%;
        }
        .info-right {
            float: right;
            width: 40%;
            background-color: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }
        .info-left p { margin: 5px 0; }
        .info-right p { margin: 5px 0; font-size: 13px; }
        .table-container {
            margin-top: 20px;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #f8fafc;
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            color: #475569;
        }
        td {
            padding: 15px 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .summary {
            float: right;
            width: 50%;
            border-top: 2px solid #0f172a;
            padding-top: 20px;
        }
        .summary table {
            width: 100%;
        }
        .summary td {
            padding: 8px 0;
            border: none;
        }
        .total-row td {
            font-weight: bold;
            font-size: 18px;
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 40px;
            border-top: 1px solid #e5e7eb;
            position: absolute;
            bottom: 0;
            width: 100%;
            box-sizing: border-box;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="header-left">
            <h1>Starconnect</h1>
            <p>Layanan Internet Cepat & Stabil</p>
        </div>
        <div class="header-right">
            <h2>INVOICE</h2>
            <p>#INV-{{ $pelanggan->tanggal_bayar ? date('Ymd', strtotime($pelanggan->tanggal_bayar)) : date('Ymd') }}-{{ sprintf('%04d', $pelanggan->id) }}</p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="content">
        <div class="info-bar">
            <div class="info-left">
                <span style="color: #64748b; font-size: 12px; font-weight: bold;">DITAGIHKAN KEPADA:</span>
                <h3 style="margin: 5px 0 5px 0; font-size: 20px; color: #0f172a;">{{ $pelanggan->nama }}</h3>
                <p style="color: #475569;">{{ $pelanggan->alamat ?? 'Alamat tidak tersedia' }}</p>
                <p style="color: #475569;">Telp: {{ $pelanggan->no_hp ?? '-' }}</p>
            </div>
            
            <div class="info-right">
                <table style="width: 100%;">
                    <tr>
                        <td style="padding: 5px 0; border: none; color: #64748b;">Tanggal Pembayaran:</td>
                        <td style="padding: 5px 0; border: none; font-weight: bold; text-align: right;">{{ $pelanggan->tanggal_bayar ? \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('d F Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px 0; border: none; color: #64748b;">Status Pembayaran:</td>
                        <td style="padding: 5px 0; border: none; font-weight: bold; text-align: right; color: #059669;">{{ strtoupper(str_replace('_', ' ', $pelanggan->status)) }}</td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Deskripsi Layanan</th>
                        <th class="text-center">Bulan</th>
                        <th class="text-right">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong style="font-size: 16px; color: #0f172a;">Paket Internet {{ $pelanggan->paket }}</strong><br>
                            <span style="color: #64748b; font-size: 13px;">Biaya berlangganan bulanan</span>
                        </td>
                        <td class="text-center">
                            {{ $pelanggan->tanggal_bayar ? \Carbon\Carbon::parse($pelanggan->tanggal_bayar)->translatedFormat('F Y') : \Carbon\Carbon::now()->translatedFormat('F Y') }}
                        </td>
                        <td class="text-right">
                            <strong style="color: #0f172a;">Rp {{ number_format($pelanggan->tagihan, 0, ',', '.') }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="summary">
            <table>
                <tr>
                    <td style="color: #64748b;">Subtotal</td>
                    <td class="text-right">Rp {{ number_format($pelanggan->tagihan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td style="color: #64748b; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">Pajak (0%)</td>
                    <td class="text-right" style="border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">Rp 0</td>
                </tr>
                <tr class="total-row">
                    <td style="padding-top: 15px;">Total Dibayar</td>
                    <td class="text-right" style="padding-top: 15px; color: #0891b2;">Rp {{ number_format($pelanggan->tagihan, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        <div class="clear"></div>
    </div>

    <div class="footer">
        <p style="margin: 0; color: #475569; font-weight: bold;">Terima kasih atas kepercayaan Anda.</p>
        <p style="margin: 5px 0 0 0; color: #94a3b8; font-size: 12px;">Pertanyaan mengenai invoice? Hubungi 081929442611.</p>
    </div>

</body>
</html>
