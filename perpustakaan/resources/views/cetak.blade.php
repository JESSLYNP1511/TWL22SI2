<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Anggota</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h2>Laporan Anggota Aktif</h2>
    <p>Periode: {{ $startDate }} hingga {{ $endDate }}</p>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Total Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggotaAktif as $anggota)
            <tr>
                <td>{{ $anggota->nama }}</td>
                <td>{{ $anggota->email }}</td>
                <td>{{ $anggota->phone }}</td>
                <td>{{ \Carbon\Carbon::parse($anggota->borrow_date)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($anggota->return_date)->format('d-m-Y') }}</td>
                <td>{{ $anggota->total_pinjaman }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
