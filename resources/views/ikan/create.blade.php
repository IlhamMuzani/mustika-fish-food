@extends('layouts.main')

@section('title', 'Tambah Data Ikan')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Ikan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ikan</li>
                    </ol>
                </div>
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
                    <h5>Tambah ikan</h5>
                </div>
                <form action="{{ url('ikan') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama *</label>
                            <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                type="text" placeholder="masukan nama ikan" value="{{ old('nama') }}" />
                            @error('nama')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jenis_ikan">Jenis Ikan *</label>
                            <select class="form-select @error('jenis_ikan') is-invalid @enderror" name="jenis_ikan"
                                id="jenis_ikan" aria-label="Default select example">
                                <option selected> -- Pilih --</option>
                                <option value="ikan hias">ikan hias</option>
                                <option value="ikan konsumsi">ikan konsumsi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kategori">Kategori *</label>
                            <select class="form-select" id="kategori" name="kategori">
                                <option value="">- Pilih -</option>
                                <option value="kecil" {{ old('kategori') == 'kecil' ? 'selected' : null }}>kecil</option>
                                <option value="sedang" {{ old('kategori') == 'sedang' ? 'selected' : null }}>sedang</option>
                                <option value="besar" {{ old('kategori') == 'besar' ? 'selected' : null }}>besar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gambar">Gambar *</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                                id="gambar" accept="image/*" />
                            @error('gambar')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stok">Stok *</label>
                            <input class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                                type="number" placeholder="masukan stok" value="{{ old('stok') }}" />
                            @error('stok')
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

@endsection
