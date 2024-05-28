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
    <h2 style="text-align: center;">Laporan Jenis Barang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $jenis_barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jenis_barang->jenis_barang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
