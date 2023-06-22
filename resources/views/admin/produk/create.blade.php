@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/produk') }}">Produk</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Error!
          </h5>
          @foreach (session('error') as $error)
            - {{ $error }} <br>
          @endforeach
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Produk</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ url('admin/produk') }}" method="post" enctype="multipart/form-data" autocomplete="off">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Produk</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama produk"
                value="{{ old('nama') }}">
            </div>
            <div class="form-group">
              <label for="jenis_id">Jenis</label>
              <select class="custom-select form-control" id="jenis_id" name="jenis_id"
                onchange="getKategori(this.value)">
                <option value="">- Pilih Jenis -</option>
                @foreach ($jenises as $jenis)
                  <option value="{{ $jenis->id }}" {{ old('jenis_id') == $jenis->id ? 'selected' : '' }}>
                    {{ $jenis->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="kategori_id">Kategori</label>
              <select class="custom-select form-control" id="kategori_id" name="kategori_id">
                <option value="" disabled>(pilih kategori terlebih dahulu)</option>
              </select>
            </div>
            <div class="form-group">
              <label for="supplier_id">Supplier</label>
              <select class="custom-select form-control" id="supplier_id" name="supplier_id">
                <option value="">- Pilih Supplier -</option>
                @foreach ($suppliers as $supplier)
                  <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukan stok"
                value="{{ old('stok') }}">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan harga"
                value="{{ old('harga') }}">
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <script>
    var jenis_id = document.getElementById('jenis_id');
    var kategori_id = "{{ old('kategori_id') }}";

    console.log(jenis_id.value);
    console.log(kategori_id);

    getKategori(jenis_id.value);

    function getKategori(id) {
      if (id != "") {
        $.ajax({
          url: "{{ url('admin/produk/kategori') }}" + "/" + id,
          type: "GET",
          dataType: "json",
          success: function(kategori) {
            $('#kategori_id').empty();
            $('#kategori_id').append("<option value=''>- Pilih -</option>");
            $.each(kategori, function(key, value) {
              $('#kategori_id').append("<option value=" + value.id + ">" + value.nama + "</option>");
            });
            $('#kategori_id').val(kategori_id).attr('selected', true);
          },
        });
      } else {
        $('#kategori_id').empty();
        $('#kategori_id').append("<option value='' disabled>(pilih jenis terlebih dahulu)</option>");
      }
    }
  </script>
@endsection
