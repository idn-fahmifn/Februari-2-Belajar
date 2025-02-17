<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form umur</title>
</head>
<body>
    <h1>Halaman Umur</h1>
    <p>Masukan umur kamu dibawah : </p>

    <!-- output ketika error -->
    @if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('umur.store') }}" method="post">
        @csrf
        <label for="">Masukan nama kamu : </label>
        <input type="text" name="nama">

        <label for="">Masukan umur kamu : </label>
        <input type="number" name="umur">

        <button type="submit">Masuk</button>

    </form>

</body>
</html>