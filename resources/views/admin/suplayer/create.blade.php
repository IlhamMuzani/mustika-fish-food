@extends('layouts.app')

@section('title', 'Tambah Suplayer')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Suplayer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Suplayer</li>
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
                    <h5>Tambah suplayer</h5>
                </div>
                <form action="{{ url('admin/suplayer') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama Suplayer *</label>
                            <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                type="text" placeholder="masukan nama suplayer" value="{{ old('nama') }}" />
                            @error('nama')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat">Alamat *</label>
                            <textarea class="form-control" id="isi" rows="3" placeholder="masukan alamat" name="alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
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
