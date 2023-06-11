@extends('layouts.main')

@section('title', 'Data Ikan')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bolder">Inventory Ikan</h1>
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
                <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                    <div class="bg-success me-3 icon-item">
                        <span class="fas fa-check-circle text-white fs-3"></span>
                    </div>
                    <p class="mb-0 flex-1">{{ session('status') }}</p>
                    <button class="btn-close float-end" type="button" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5>Tabel ikan</h5>
                </div>
                <div class="d-flex align-items-start justify-content-between py-3 mr-3">
                    <form class="d-flex ml-3">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <a href="{{ url('ikan/create') }}" class="btn btn-outline-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Jenis Ikan</th>
                            <th scope="col">Stok</th>
                            <th class="text-center" scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ikans as $key => $ikan)
                            <tr>
                                <td class="text-center">{{ $ikans->firstItem() + $key }}</td>
                                <td>{{ $ikan->nama }}</td>
                                <td>{{ $ikan->kategori }}</td>
                                <td>{{ $ikan->jenis_ikan }}</td>
                                <td>{{ $ikan->stok }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="#" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modalHapus{{ $ikan->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                    <div class="modal fade" id="modalHapus{{ $ikan->id }}" data-keyboard="false"
                                        data-backdrop="static" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog mt-6" role="document">
                                            <div class="modal-content border-0">
                                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
                                                        <h4 class="mb-3">Hapus</h4>
                                                        <h5 class="fs-0 fw-normal">Yakin hapus ikan
                                                            <strong>{{ $ikan->nama }}?</strong>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="event.preventDefault(); document.getElementById('delete{{ $ikan->id }}').submit();">Hapus</button>
                                                    <form action="{{ url('ikan/' . $ikan->id) }}" method="POST"
                                                        id="delete{{ $ikan->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">- Data tidak ditemukan -</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="card-footer py-0">
                    <div class="pagination float-end">
                        {{ $ikans->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
