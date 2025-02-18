<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
</head>
<body>
    <h1>Detail Barang</h1>
    <span>Barang yang ditampilkan adalah : {{ $detail->nama_barang }} </span>

    <table>
        <tr>
            <th>Nama Barang</th>
            <td>{{ $detail->nama_barang }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $detail->qty }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $detail->kategori }}</td>
        </tr>
        <tr>
            <th>Ukuran</th>
            <td>{{ $detail->size }}</td>
        </tr>
        <tr>
            <th>Merk</th>
            <td>{{ $detail->merk }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $detail->deskripsi }}</td>
        </tr>
    </table>

</body>
</html>