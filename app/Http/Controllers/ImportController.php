<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
    public function showForm()
    {
        return view('admin.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|file|mimes:xlsx,xls,csv|max:5120',
        ], [
            'file_excel.required' => 'File Excel wajib dipilih.',
            'file_excel.mimes'    => 'File harus berformat .xlsx, .xls, atau .csv',
            'file_excel.max'      => 'Ukuran file maksimal 5 MB.',
        ]);

        try {
            $file        = $request->file('file_excel');
            $spreadsheet = IOFactory::load($file->getPathname());
            $sheet       = $spreadsheet->getActiveSheet();
            $rows        = $sheet->toArray(null, true, true, true);

            // Hapus baris header (baris pertama)
            $header = array_shift($rows);

            // Mapping harga paket (ambil dari kolom E/F/G jika ada, atau gunakan default)
            $hargaPaket = [
                '8 Mbps'  => 150000,
                '10 Mbps' => 170000,
                '15 Mbps' => 220000,
                '20 Mbps' => 270000,
                '30 Mbps' => 420000,
            ];

            $imported = 0;
            $skipped  = 0;
            $errors   = [];

            foreach ($rows as $rowIndex => $row) {
                $realRow = $rowIndex + 1; // karena header sudah di-shift

                // Baca kolom — sesuaikan dengan header Excel Anda
                // Kolom A: Username/Nama, B: Password, C: Paket, D: Harga (opsional)
                $nama     = trim($row['A'] ?? '');
                $username = trim($row['A'] ?? ''); // username = nama
                $password = trim($row['B'] ?? '');
                $paket    = trim($row['C'] ?? '');
                $harga    = trim($row['D'] ?? '');

                // Lewati baris kosong
                if (empty($nama) && empty($paket)) {
                    $skipped++;
                    continue;
                }

                if (empty($nama)) {
                    $errors[] = "Baris {$realRow}: Nama/Username kosong, dilewati.";
                    $skipped++;
                    continue;
                }

                if (empty($paket)) {
                    $errors[] = "Baris {$realRow}: Kolom Paket kosong untuk '{$nama}', dilewati.";
                    $skipped++;
                    continue;
                }

                // Tentukan tagihan: prioritaskan kolom D, kalau kosong pakai lookup
                $tagihan = 0;
                if (!empty($harga) && is_numeric(str_replace(['.', ',', 'Rp', ' '], '', $harga))) {
                    $tagihan = (int) preg_replace('/[^0-9]/', '', $harga);
                } else {
                    // Cari harga berdasarkan nama paket
                    foreach ($hargaPaket as $namaPaket => $hargaDefault) {
                        if (stripos($paket, str_replace(' Mbps', '', $namaPaket)) !== false) {
                            $tagihan = $hargaDefault;
                            break;
                        }
                    }
                }

                // Simpan ke database (update jika nama sudah ada, insert jika baru)
                $mode = $request->input('mode', 'skip'); // 'skip' atau 'update'

                $existing = Pelanggan::where('nama', $nama)->first();

                if ($existing) {
                    if ($mode === 'update') {
                        $existing->update([
                            'paket'    => $paket,
                            'tagihan'  => $tagihan ?: $existing->tagihan,
                            'username' => $username,
                            'password' => $password,
                        ]);
                        $imported++;
                    } else {
                        $errors[] = "Baris {$realRow}: '{$nama}' sudah ada (dilewati).";
                        $skipped++;
                    }
                } else {
                    Pelanggan::create([
                        'nama'     => $nama,
                        'username' => $username,
                        'password' => $password,
                        'paket'    => $paket,
                        'tagihan'  => $tagihan ?: 0,
                        'status'   => 'belum_bayar',
                    ]);
                    $imported++;
                }
            }

            $message = "Import selesai! {$imported} data berhasil diimpor.";
            if ($skipped > 0) {
                $message .= " {$skipped} baris dilewati.";
            }

            return redirect()->route('admin.import.form')
                ->with('success', $message)
                ->with('import_errors', $errors);

        } catch (\Exception $e) {
            return redirect()->route('admin.import.form')
                ->with('error', 'Gagal membaca file: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Pelanggan');

        // Header
        $headers = ['Username / Nama', 'Password', 'Paket', 'Harga (Rp)'];
        foreach ($headers as $col => $header) {
            $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1);
            $sheet->setCellValue($colLetter . '1', $header);
            $sheet->getStyle($colLetter . '1')->getFont()->setBold(true);
            $sheet->getStyle($colLetter . '1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FF0F766E'); // teal
            $sheet->getStyle($colLetter . '1')->getFont()->getColor()->setARGB('FFFFFFFF');
        }

        // Contoh data
        $contoh = [
            ['budi_santoso',  '123456', '10 Mbps', 170000],
            ['siti_rahayu',   '123456', '15 Mbps', 220000],
            ['agus_priyanto', '123456', '30 Mbps', 420000],
        ];

        foreach ($contoh as $i => $row) {
            $rowNum = $i + 2;
            $sheet->setCellValue('A' . $rowNum, $row[0]);
            $sheet->setCellValue('B' . $rowNum, $row[1]);
            $sheet->setCellValue('C' . $rowNum, $row[2]);
            $sheet->setCellValue('D' . $rowNum, $row[3]);
        }

        // Auto-width
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Keterangan harga paket (di sheet kedua)
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Keterangan Paket');
        $sheet2->setCellValue('A1', 'Nama Paket');
        $sheet2->setCellValue('B1', 'Harga (Rp)');
        $sheet2->getStyle('A1:B1')->getFont()->setBold(true);

        $paketList = [
            ['8 Mbps', 150000],
            ['10 Mbps', 170000],
            ['15 Mbps', 220000],
            ['20 Mbps', 270000],
            ['30 Mbps', 420000],
        ];
        foreach ($paketList as $i => $p) {
            $sheet2->setCellValue('A' . ($i + 2), $p[0]);
            $sheet2->setCellValue('B' . ($i + 2), $p[1]);
        }
        $sheet2->getColumnDimension('A')->setAutoSize(true);
        $sheet2->getColumnDimension('B')->setAutoSize(true);

        $writer   = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'template_import_pelanggan.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
