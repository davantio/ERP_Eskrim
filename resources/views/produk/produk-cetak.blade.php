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
    <title>Cetak Data Produk</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Produk</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th>No.</th>
                <th>Barcode</th>
                <th>Nama Produk</th>
                <th>Kode Produk</th>
                <th>Harga Produk</th>
                <th>Kuantitas</th>
            </tr>
            @foreach ($dtProduk as $prd)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{!! DNS1D::getBarcodeHTML('Rp. '. $prd->harga, 'C39') !!}</td>
                <td>{{ $prd->nama }}</td>
                <td>{{ $prd->kode }}</td>
                <td>{{ 'Rp. ' .$prd->harga }}</td>
                <td>{{ $prd->stok }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>