<!DOCTYPE html>
<html>
<head>
    <title>Laporan Inventaris</title>
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
    <h2 style="text-align: center;">Laporan Inventaris</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Tanggal Pembelian</th>
                <th>Tanggal Pemakaian</th>
                <th>Ruangan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $inventaris)
                <tr>
                    <td>{{ $inventaris->kode_barang }}</td>
                    <td>{{ $inventaris->nama_barang }}</td>
                    <td>{{ $inventaris->jenis_barang }}</td>
                    <td>{{ $inventaris->tanggal_pembelian }}</td>
                    <td>{{ $inventaris->tanggal_pemakaian }}</td>
                    <td>{{ $inventaris->ruangan }}</td>
                    <td>{{ $inventaris->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
