<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="crsf-token" content="{{ csrf_token() }}"> 
    <style>
        table.static {
            position: relative;
            border : 1px solid black;
        }
    </style>
    <title>Cetak Data Bahan</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Bahan</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th>No.</th>
                <th>Barcode</th>
                <th>Nama Bahan</th>
                <th>Kode Bahan</th>
                <th>Harga Bahan</th>
                <th>Stok</th>
            </tr>
            @foreach ($dtBahan as $bhn)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{!! DNS1D::getBarcodeHTML('Rp. '. $bhn->harga, 'C39') !!}</td>
                <td>{{ $bhn->nama }}</td>
                <td>{{ $bhn->kode }}</td>
                <td>{{ 'Rp. ' .$bhn->harga }}</td>
                <td>{{ $bhn->stok }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>