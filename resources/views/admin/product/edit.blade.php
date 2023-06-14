@extends('layouts.app')

@section('title', 'Perbarui Produk')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Perbarui Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                    <h5>Perbarui produk</h5>
                </div>
                <form action="{{ url('admin/product/' . $product->id) }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama *</label>
                            <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                type="text" placeholder="masukan nama produk"
                                value="{{ old('nama', $product->nama) }}" />
                            @error('nama')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Suplayer *</label>
                            <select class="form-select @error('suplayer_id') is-invalid @enderror" id="suplayer_id"
                                name="suplayer_id" aria-label="Default select example">
                                <option value="">- Pilih -</option>
                                @foreach ($suplayers as $suplayer)
                                    <option value="{{ $suplayer->id }}"
                                        {{ old('suplayer_id', $product->suplayer_id) == $suplayer->id ? 'selected' : null }}>
                                        {{ $suplayer->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kategori">Kategori *</label>
                            <select class="form-select" id="kategori" name="kategori">
                                <option value="">- Pilih -</option>
                                <option value="ikan"
                                    {{ old('kategori', $product->kategori) == 'ikan' ? 'selected' : null }}>ikan</option>
                                <option value="pakan"
                                    {{ old('kategori', $product->kategori) == 'pakan' ? 'selected' : null }}>pakan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jenis">Jenis produk *</label>
                            <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" id="jenis"
                                aria-label="Default select example">
                                <option selected> -- Pilih --</option>
                                <option value="ikan"
                                    {{ old('jenis', $product->jenis) == 'ikan hias' ? 'selected' : null }}>ikan hias
                                </option>
                                <option value="ikan konsumsi"
                                    {{ old('jenis', $product->jenis) == 'ikan konsumsi' ? 'selected' : null }}>ikan
                                    konsumsi
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gambar">Gambar <small>(Kosongkan saja jika tidak
                                    diubah)</small></label>
                            <input class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar"
                                type="file" value="{{ old('gambar', $product->gambar) }}" accept="image/*" />
                            @error('gambar')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stok">Stok *</label>
                            <input class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                                type="number" placeholder="masukan stok" value="{{ old('stok', $product->stok) }}" />
                            @error('stok')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga">Harga*</label>
                            <input class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                                type="number" placeholder="masukan jumlah jual" value="{{ old('harga', $product->harga) }}" />
                            @error('harga')
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
