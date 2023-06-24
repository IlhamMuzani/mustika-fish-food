@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i> Success!
                    </h5>
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Laporan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- <form method="GET" id="form-action">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <select class="custom-select form-control" id="kategori_id" name="kategori_id">
                                    <option value="">- Semua Kategori -</option>
                                    <option value="1" {{ Request::get('kategori_id') == '1' ? 'selected' : '' }}>
                                        Ikan Hias</option>
                                    <option value="2" {{ Request::get('kategori_id') == '2' ? 'selected' : '' }}>Ikan
                                        Konsumsi
                                    </option>
                                </select>
                                <label for="kategori_id">(Pilih Kategori)</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input class="form-control" id="tanggal_awal" name="tanggal_awal" type="date"
                                    value="{{ Request::get('tanggal_awal') }}" max="{{ date('Y-m-d') }}" />
                                <label for="tanggal_awal">(Pilih Tanggal)</label>
                            </div>
                        </div>
                        <div class="text-right mb-3">
                            <button type="button" class="btn btn-outline-primary mr-2" onclick="cari()">
                                <i class="fas fa-search"></i> Cari
                            </button>
                            <button type="button" class="btn btn-primary" onclick="print()" target="_blank">
                                <i class="fas fa-print"></i> Cetak
                            </button>
                        </div>
                    </form> --}}
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Pembeli</th>
                                <th>Total Pembelian</th>
                                <th>Tanggal</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->nama }}</td>
                                    @php
                                        $total = [];
                                        foreach ($transaksi->detail_transaksis as $detail_transaksi) {
                                            $total[] = $detail_transaksi->total;
                                        }
                                    @endphp
                                    <td>{{ array_sum($total) }}</td>
                                    <td>{{ date('d F Y', strtotime($transaksi->created_at)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('owner/laporan-transaksi/' . $transaksi->id) }}" class="btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.card -->
    <script>
        var tanggalAwal = document.getElementById('tanggal_awal');
        var tanggalAkhir = document.getElementById('tanggal_akhir');
        if (tanggalAwal.value == "") {
            tanggalAkhir.readOnly = true;
        }
        tanggalAwal.addEventListener('change', function() {
            if (this.value == "") {
                tanggalAkhir.readOnly = true;
            } else {
                tanggalAkhir.readOnly = false;
            };
            tanggalAkhir.value = "";
            tanggalAkhir.setAttribute('min', this.value);
        });
        var form = document.getElementById('form-action')

        function cari() {
            form.action = "{{ url('admin/report') }}";
            form.submit();
        }

        function print() {
            form.action = "{{ url('owner/report/print') }}";
            form.submit();
        }
    </script>
@endsection
