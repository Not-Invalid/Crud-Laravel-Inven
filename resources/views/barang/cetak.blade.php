<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
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
    <h2 style="text-align: center;">Laporan Barang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Jumlah</th>
                <th>Harga Barang</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $barang)
                <tr>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->jenis_barang }}</td>
                    <td>{{ $barang->jumlah }}</td>
                    <td>{{ formatRupiah($barang->harga_barang) }}</td>
                    <td>{{ formatRupiah($barang->total_harga) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
