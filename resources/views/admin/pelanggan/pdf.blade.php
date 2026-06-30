<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Pelanggan - {{ config('app.name', 'StarConnect') }}</title>
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
        .status-lunas {
            color: #059669;
            font-weight: bold;
        }
        .status-belum {
            color: #dc2626;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #777;
        }
        .summary {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>StarConnect</h1>
        <p>Laporan Database Pelanggan Internet</p>
        <p>Tanggal Cetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}</p>
    </div>

    <div class="summary">
        Total Pelanggan: {{ $pelanggans->count() }} | 
        Sudah Bayar: {{ $pelanggans->where('status', 'sudah_bayar')->count() }} | 
        Belum Bayar: {{ $pelanggans->where('status', 'belum_bayar')->count() }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Paket</th>
                <th>Tagihan</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $index => $p)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->no_hp ?? '-' }}</td>
                    <td>{{ $p->paket }}</td>
                    <td>Rp{{ number_format($p->tagihan, 0, ',', '.') }}</td>
                    <td>
                        @if ($p->status === 'sudah_bayar')
                            <span class="status-lunas">Lunas</span>
                        @else
                            <span class="status-belum">Belum Bayar</span>
                        @endif
                    </td>
                    <td>
                        {{ $p->tanggal_bayar ? \Carbon\Carbon::parse($p->tanggal_bayar)->translatedFormat('d/M/Y') : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">Belum ada data pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak oleh: {{ session('admin_name') ?? 'Admin' }} | {{ config('app.url') }}
    </div>
</body>
</html>
