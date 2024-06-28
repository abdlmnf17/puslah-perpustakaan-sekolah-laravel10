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
    <center>
        <h3>Laporan Peminjaman Buku</h3>
        <h2>{{ App\Models\Setting::first()->webname }}</h2>

        <p><strong>Periode:</strong> {{ $tanggal_mulai->format('d M Y') }} - {{ $tanggal_selesai->format('d M Y') }}</p>

    </center>

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
                    <td>{{ $p->borrow_number }}</td>
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->book_title }}</td>
                    <td>{{ Carbon\Carbon::parse($p->borrow_date)->format('d M Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($p->return_date)->format('d M Y') }}</td>
                    <td>{{ $p->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
