@extends('layouts.main')

@section('title', 'Tambah Data Transaksi')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Transaksi</h1>
                </div><!-- /.col -->
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-danger border-2" role="alert">
                    <div class="clearfix">
                        <div class="d-flex align-items-center float-start">
                            <div class="bg-danger me-3 icon-item">
                                <span class="fas fa-times-circle text-white fs-3"></span>
                            </div>
                            <h5 class="mb-0 text-danger">Error!</h5>
                        </div>
                        <button class="btn-close float-end" type="button" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="mt-3">
                        @foreach (session('status') as $error)
                            <p>
                                <span class="dot bg-danger"></span> {{ $error }}
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Transaksi</h5>
                </div>
                <form action="{{ url('transaksi') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nama_pembeli">Nama Pembeli *</label>
                            <input class="form-control @error('nama-pembeli') is-invalid @enderror" id="nama_pembeli"
                                name="nama_pembeli" type="text" placeholder="masukan nama pembeli"
                                value="{{ old('nama_pembeli') }}" />
                            @error('nama_pembeli')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kategori_produk">Kategori *</label>
                            <select class="form-select @error('kategori_produk') is-invalid @enderror"
                                name="kategori_produk" id="kategori_produk" aria-label="Default select example">
                                <option selected> -- Pilih --</option>
                                <option value="ikan">ikan</option>
                                <option value="pakan">pakan</option>
                            </select>
                        </div>
                        <div class="mb-3" id="layout_ikan">
                            <label class="form-label">Produk Ikan *</label>
                            <select class="form-select @error('ikan_id') is-invalid @enderror" id="ikan_id" name="ikan_id"
                                aria-label="Default select example">
                                <option value="">- Pilih -</option>
                                @foreach ($ikans as $k)
                                    <option value="{{ $k->id }}" {{ old('ikan_id') == $k->id ? 'selected' : null }}>
                                        {{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" id="layout_pakan">
                            <label class="form-label">Produk Pakan *</label>
                            <select class="form-select @error('pakan_id') is-invalid @enderror" id="pakan_id"
                                name="pakan_id" aria-label="Default select example">
                                <option value="">- Pilih -</option>
                                @foreach ($pakans as $k)
                                    <option value="{{ $k->id }}" {{ old('pakan_id') == $k->id ? 'selected' : null }}>
                                        {{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date and time:</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="date" id="tanggal" name="tanggal" placeholder="d M Y sampai d M Y"
                                    data-options='{"mode":"range","dateFormat":"d M Y","disableMobile":true}'
                                    value="{{ old('tanggal') }}" class="form-control datetimepicker-input"
                                    data-target="#reservationdatetime">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="jumlah_jual">Jumlah yang di jual *</label>
                            <input class="form-control @error('jumlah_jual') is-invalid @enderror" id="jumlah_jual"
                                name="jumlah_jual" type="number" placeholder="masukan jumlah jual"
                                value="{{ old('jumlah_jual') }}" />
                            @error('jumlah_jual')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga_jual">Harga*</label>
                            <input class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual"
                                name="harga_jual" type="number" placeholder="masukan jumlah jual"
                                value="{{ old('harga_jual') }}" />
                            @error('harga_jual')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-secondary me-1" type="reset">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        var kategori_produk = document.getElementById('kategori_produk');
        var layout_ikan = document.getElementById('layout_ikan');
        var layout_pakan = document.getElementById('layout_pakan');
        var ikan = document.getElementById('ikan_id');
        var pakan = document.getElementById('pakan_id');
        kategori_produk.addEventListener('change', function() {
            if (this.value == 'ikan') {
                layout_ikan.style.display = 'inline';
                layout_pakan.style.display = 'none';
                pakan.value = 1;
            } else {
                layout_ikan.style.display = 'none';
                layout_pakan.style.display = 'inline';
                ikan.value = 1;
            }
        })
    </script>

@endsection
