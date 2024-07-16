<!-- resources/views/borrowing/cetak.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman Buku</h2>
    <p>Periode: {{ $start_date->format('d M Y') }} - {{ $end_date->format('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Nomor Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $p)
                <tr>
                    <td>{{ $p->no_peminjaman }}</td>
                    <td>{{ $p->user->nama }}</td>
                    <td>{{ $p->penulis }}</td>
                    <td>{{ $p->tgl_peminjaman->format('d M Y') }}</td>
                    <td>{{ $p->tgl_pengembalian->format('d M Y') }}</td>
                    <td>{{ $p->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
