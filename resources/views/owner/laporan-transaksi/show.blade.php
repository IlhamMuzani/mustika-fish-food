@extends('layouts.app')

@section('title', 'Lihat Transaksi')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ url('admin/user') }}">Laporan Transaksi</a>
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
          <h3 class="card-title">Lihat Detail Transaksi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-3">
              <strong>Kode Transaksi</strong>
            </div>
            <div class="col-md-9">
              {{ $transaksi->kode }}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-3">
              <strong>Nama Pelanggan</strong>
            </div>
            <div class="col-md-9">
              {{ $transaksi->nama }}
            </div>
          </div>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detail_transaksis as $detail_transaksi)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $detail_transaksi->produk->nama }}</td>
                  <td>{{ $detail_transaksi->produk->harga }}</td>
                  <td>{{ $detail_transaksi->jumlah }}</td>
                  <td>{{ $detail_transaksi->total }}</td>
                </tr>
              @endforeach
              <tr>
                <td colspan="4" class="text-center">
                  <strong>Total Harga</strong>
                </td>
                @php
                  $total = [];
                  foreach ($detail_transaksis as $detail_transaksi) {
                    $total[] = $detail_transaksi->total;
                  }
                @endphp
                <td>{{ array_sum($total) }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection
