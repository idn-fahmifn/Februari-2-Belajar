<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
</head>
<body>
    <h1>Barang</h1>
    <span>Data semua barang yang sudah ada.</span>

    <table style="width: 80%;">
        <thead>
            <th>Nama</th>
            <th>Quantity</th>
            <th>Kategori</th>
        </thead>
        <tbody>
            <!-- looping semua data yang ada di $data -->

            @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->kategori }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}

</body>
</html>