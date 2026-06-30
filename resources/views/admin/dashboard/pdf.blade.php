<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Pelanggan - {{ config('app.name', 'StarConnect') }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #1a56db;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            color: #1a56db;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            color: #666;
            font-size: 12px;
        }
        
        .grid-container {
            width: 100%;
            margin-bottom: 30px;
        }
        
        .stat-box {
            width: 30%;
            display: inline-block;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            margin-right: 1.5%;
            box-sizing: border-box;
        }
        
        .stat-box.last {
            margin-right: 0;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
        }
        
        .text-blue { color: #1a56db; }
        .text-green { color: #059669; }
        .text-orange { color: #ea580c; }
        
        .revenue-box {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            background-color: #f8fafc;
            margin-bottom: 30px;
        }
        
        .revenue-value {
            font-size: 32px;
            font-weight: bold;
            color: #1e3a8a;
            margin: 10px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
            color: #374151;
            font-weight: bold;
        }
        
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 10px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>StarConnect</h1>
        <p>Laporan Statistik & Pendapatan Pelanggan</p>
        <p>Bulan: {{ \Carbon\Carbon::now()->translatedFormat('F Y') }} | Tanggal Cetak: {{ \Carbon\Carbon::now()->translatedFormat('d/m/Y') }}</p>
    </div>

    <div class="grid-container">
        <div class="stat-box">
            <div class="stat-label">Total Pelanggan</div>
            <div class="stat-value text-blue">{{ $belumBayar + $sudahBayar }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Sudah Bayar (Lunas)</div>
            <div class="stat-value text-green">{{ $sudahBayar }}</div>
        </div>
        <div class="stat-box last">
            <div class="stat-label">Belum Bayar</div>
            <div class="stat-value text-orange">{{ $belumBayar }}</div>
        </div>
    </div>

    <div class="revenue-box">
        <div class="stat-label">Total Pendapatan Bulan Ini</div>
        <div class="revenue-value">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</div>
        <div class="stat-label">Rasio Pembayaran: {{ $belumBayar + $sudahBayar > 0 ? round(($sudahBayar / ($belumBayar + $sudahBayar)) * 100) : 0 }}% Lunas</div>
    </div>

    <h3>Rincian Pembayaran Terakhir</h3>
    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama Pelanggan</th>
                <th>Paket</th>
                <th>Tanggal Bayar</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayatPembayaran as $index => $p)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->paket }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_bayar)->translatedFormat('d M Y H:i') }}</td>
                    <td>Rp{{ number_format($p->tagihan, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Belum ada data pembayaran bulan ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak oleh: {{ session('admin_name') ?? 'Admin' }} | {{ config('app.url') }}
    </div>
</body>
</html>
