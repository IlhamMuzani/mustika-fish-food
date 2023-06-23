@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('kasir/produk') }}">Transaksi</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      @if (session('error_pelanggans') || session('error_pesanans'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Error!
          </h5>
          @if (session('error_pelanggans'))
            @foreach (session('error_pelanggans') as $error)
              - {{ $error }} <br>
            @endforeach
          @endif
          @if (session('error_pesanans'))
            @foreach (session('error_pesanans') as $error)
              - {{ $error }} <br>
            @endforeach
          @endif
        </div>
      @endif
      <form action="{{ url('kasir/transaksi') }}" method="post" autocomplete="off">
        @csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detail Pelanggan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Pembeli</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama pembeli"
                value="{{ old('nama') }}">
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detail Pesanan</h3>
            <div class="float-right">
              <button type="button" class="btn btn-primary btn-sm" onclick="addPesanan()">
                Tambah
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody id="tabel-pesanan">
                <tr id="pesanan-0">
                  <td class="text-center" id="urutan">1</td>
                  <td style="width: 240px">
                    <div class="form-group">
                      <select class="form-control select2bs4" id="produk-0" name="produk[]" onchange="getHarga(0)">
                        <option value="">- Pilih Produk -</option>
                        @foreach ($produks as $produk)
                          <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" class="form-control" id="harga-0" name="harga[]" onkeyup="getTotal(0)">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" class="form-control" id="jumlah-0" name="jumlah[]" onkeyup="getTotal(0)">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control" id="total-0" name="total[]" readonly>
                    </div>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger" onclick="removePesanan(0)">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <script>
    function getHarga(id) {
      var produk = document.getElementById('produk-' + id);
      $.ajax({
        url: "{{ url('kasir/transaksi/harga') }}" + "/" + produk.value,
        type: "GET",
        dataType: "json",
        success: function(produk) {
          var harga = document.getElementById('harga-' + id);
          harga.value = produk.harga;
          getTotal(id);
        },
      });
    }

    function getTotal(id) {
      var harga = document.getElementById('harga-' + id);
      var jumlah = document.getElementById('jumlah-' + id);
      var total = document.getElementById('total-' + id);

      if (harga.value != "" && jumlah.value != "") {
        total.value = harga.value * jumlah.value;
      } else {
        total.value = "";
      }
    }

    var data_pesanan = @json(session('data_pesanans'));
    var jumlah_pesanan = 1;

    if (data_pesanan != null) {
      jumlah_pesanan = data_pesanan.length;
      $('#tabel-pesanan').empty();
      var urutan = 0;
      $.each(data_pesanan, function(key, value) {
        urutan = urutan + 1;
        itemPesanan(urutan, key, false, value);
      });
    }

    function addPesanan() {
      jumlah_pesanan = jumlah_pesanan + 1;

      if (jumlah_pesanan == 1) {
        $('#tabel-pesanan').empty();
      }

      itemPesanan(jumlah_pesanan, jumlah_pesanan - 1, true);
    }

    function removePesanan(params) {
      jumlah_pesanan = jumlah_pesanan - 1;

      console.log(jumlah_pesanan);

      var tabel_pesanan = document.getElementById('tabel-pesanan');
      var pesanan = document.getElementById('pesanan-' + params);

      tabel_pesanan.removeChild(pesanan);

      if (jumlah_pesanan == 0) {
        var item_pesanan = '<tr>';
        item_pesanan += '<td class="text-center" colspan="6">- Pesanan belum ditambahkan -</td>';
        item_pesanan += '</tr>';
        $('#tabel-pesanan').append(item_pesanan);
      } else {
        var urutan = document.querySelectorAll('#urutan');
        for (let i = 0; i < urutan.length; i++) {
          urutan[i].innerText = i + 1;
        }
      }
    }

    function itemPesanan(urutan, key, style, value = null) {
      var produk = '';
      var harga = '';
      var jumlah = '';
      var total = '';

      if (value !== null) {
        produk = value.produk;
        harga = value.harga;
        jumlah = value.jumlah;
        total = value.total;
      }

      console.log(produk);

      var item_pesanan = '<tr id="pesanan-' + urutan + '">';
      item_pesanan += '<td class="text-center" id="urutan">' + urutan + '</td>';
      item_pesanan += '<td style="width: 240px">';
      item_pesanan += '<div class="form-group">';
      item_pesanan += '<select class="form-control select2bs4" id="produk-' + key +
        '" name="produk[]" onchange="getHarga(' + key + ')">';
      item_pesanan += '<option value="">- Pilih Produk -</option>';
      item_pesanan += '@foreach ($produks as $produk)';
      item_pesanan +=
        '<option value="{{ $produk->id }}" {{ $produk->id == ' + produk + ' ? 'selected' : '' }}>{{ $produk->nama }}</option>';
      item_pesanan += '@endforeach';
      item_pesanan += '</select>';
      item_pesanan += '</div>';
      item_pesanan += '</td>';
      item_pesanan += '<td>';
      item_pesanan += '<div class="form-group">';
      item_pesanan += '<input type="number" class="form-control" id="harga-' + key + '" name="harga[]" value="' + harga +
        '" onkeyup="getTotal(' + key + ')">';
      item_pesanan += '</div>';
      item_pesanan += '</td>';
      item_pesanan += '<td>';
      item_pesanan += '<div class="form-group">';
      item_pesanan += '<input type="number" class="form-control" id="jumlah-' + key + '" name="jumlah[]" value="' +
        jumlah + '" onkeyup="getTotal(' + key + ')">';
      item_pesanan += '</div>';
      item_pesanan += '</td>'
      item_pesanan += '<td>';
      item_pesanan += '<div class="form-group">'
      item_pesanan += '<input type="text" class="form-control" id="total-' + key + '" name="total[]" value="' + total +
        '" readonly>';
      item_pesanan += '</div>';
      item_pesanan += '</td>';
      item_pesanan += '<td>';
      item_pesanan += '<button type="button" class="btn btn-danger" onclick="removePesanan(' + urutan + ')">';
      item_pesanan += '<i class="fas fa-trash"></i>';
      item_pesanan += '</button>';
      item_pesanan += '</td>';
      item_pesanan += '</tr>';

      // var data_produk = @json($produk);

      // for (let i = 0; i < data_produk.length; i++) {
      //   $('#produk-' + key).append("<option value=" + data_produk[i].id + ">" + data_produk[i].nama + "</option>");
      // }

      if (style) {
        select2(key);
      }

      $('#tabel-pesanan').append(item_pesanan);

      $('#produk-' + key + '').val(produk).attr('selected', true);
    }

    function select2(id) {
      $(function() {
        $('#produk-' + id).select2({
          theme: 'bootstrap4'
        });
      });
    }
  </script>
@endsection
