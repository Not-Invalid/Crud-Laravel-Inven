<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemakaian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table, .table th, .table td {
            border: 1px solid black;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table th, .table td {
            text-align: left;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Pemakaian Barang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pemakaian</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Pakai</th>
                <th>Ruangan</th>
                <th>Tanggal Pakai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $pemakaian)
                <tr>
                    <td>{{ $pemakaian->id_pemakaian }}</td>
                    <td>{{ $pemakaian->kode_barang }}</td>
                    <td>{{ $pemakaian->barang->nama_barang }}</td>
                    <td>{{ $pemakaian->jumlah_pakai }}</td>
                    <td>{{ $pemakaian->ruangan->nama_ruangan }}</td>
                    <td>{{ $pemakaian->tanggal_pakai }}</td>
                    <td>{{ $pemakaian->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
