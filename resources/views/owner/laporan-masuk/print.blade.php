<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
    <style>
        /* * {
      border: 1px solid black;
    } */
        .b {
            border: 1px solid black;
        }

        .table,
        .td {
            border: 1px solid black;
        }

        body {
            margin: 0;
            padding: 0;
        }

        span.h2 {
            font-size: 24px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td>
                <img src="{{ asset('storage/uploads/logo.png') }}" alt="Mustika Fish Food" width="100px">
            </td>
            <td style="letter-spacing: 1px">
                <span style="font-weight: bold; font-size: 20px;">Mustika Fish Food</span>
                <br>
                <span>Alamat : Jl.Otista I A No. 10 Jakarta Timur
                    13330</span>
                <br>
                <span>Telp. 85906347,98250714,70793766, Email. mustikafishfood@gmail.com</span>
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <p style="font-weight: bold; text-align: center">DATA LAPORAN PRODUK</p>
    <br>
    <table style="width: 100%;" cellpadding="10" cellspacing="0">
        <tr>
            <td class="td" style="text-align: center">No.</td>
            <td class="td" style="text-align: center">Nama</td>
            <td class="td" style="text-align: center">Kategori</td>
            <td class="td" style="text-align: center">Supplier</td>
            <td class="td" style="text-align: center">Harga</td>
            <td class="td" style="text-align: center">Stok</td>
        </tr>
        @foreach ($cetakpdf as $item)
            <tr>
                <td class="td" style="width: 100px; text-align: center; vertical-align: top">{{ $loop->iteration }}.
                </td>
                <td class="td" style="width: 180px; vertical-align: top">
                    {{ $item->nama }}
                </td>
                <td class="td" style="width: 140px; vertical-align: top">
                    Kategori produk :
                    <br>
                    {{ $item->kategori->nama }}
                    <br>
                </td>
                <td class="td" style="width: 140px; vertical-align: top">
                    Dari Supplier :
                    <br>
                    {{ $item->supplier->nama }}
                    <br>
                </td>
                <td class="td" style="width: 140px; vertical-align: top">
                    Harga beli :
                    <br>
                    {{ $item->harga }}
                    <br>
                </td>
                <td class="td" style="width: 140px; vertical-align: top">
                    Stok barang :
                    <br>
                    {{ $item->stok }}
                    <br>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <table style="width: 100%;" cellspacing="0" cellpadding="8">
        <tr>
            <td></td>
            <td></td>
            <td style="width: 240px">
                <p>Jakarta Timur, {{ Carbon\Carbon::now()->translatedFormat('d M Y') }}</p>
                <p>CV. Mustika Fish Food</p>
                <br>
                <br>
                <br>
                <br>
                M.iqbal adzulfikar
            </td>
        </tr>
    </table>
    <div style="text-align: center; position: fixed; bottom: -20px; left: 0px; right: 0px">
        SUPPORT BY MUSTIKAFISHFOOD.CO.ID
    </div>
</body>

</html>
