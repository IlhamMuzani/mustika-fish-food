@extends('layouts.app')

@section('title', 'Ubah Kategori')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/kateori') }}">Kategori</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
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
                    <h3 class="card-title">Ubah Kategori</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ url('admin/kategori/' . $kategoris->id) }}" method="post" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis_id">Jenis</label>
                            <select class="custom-select form-control" id="jenis_id" name="jenis_id"
                                onchange="get_kategori(this.value)">
                                <option value="">- Pilih Jenis -</option>
                                @foreach ($jenises as $jenis)
                                    <option value="{{ $jenis->id }}"
                                        {{ old('jenis_id', $kategoris->jenis_id) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukan nama" value="{{ old('nama', $kategoris->nama) }}">
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
@endsection
