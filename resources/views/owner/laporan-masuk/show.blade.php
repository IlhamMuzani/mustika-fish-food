@extends('layouts.app')

@section('title', 'Lihat Produk')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ url('admin/user') }}">Detail Laporan</a>
            </li>
            <li class="breadcrumb-item active">Lihat</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lihat Laporan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-5">
              <img src="{{ asset('storage/uploads/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="w-100 rounded">
            </div>
            <div class="col-md-6">
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Kode</strong>
                </div>
                <div class="col-md-6">
                  {{ $produk->kode }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Nama Produk</strong>
                </div>
                <div class="col-md-6">
                  {{ $produk->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Jenis</strong>
                </div>
                <div class="col-md-6">
                  {{ $produk->kategori->jenis->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Kategori</strong>
                </div>
                <div class="col-md-6">
                  {{ $produk->kategori->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Supplier</strong>
                </div>
                <div class="col-md-6">
                  {{ $produk->supplier->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Stok</strong>
                </div>
                <div class="col-md-6">
                  {{ $produk->stok }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <strong>Harga</strong>
                </div>
                <div class="col-md-6">
                  {{ $produk->harga }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
