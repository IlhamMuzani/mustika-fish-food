@extends('layouts.app')

@section('title', 'Data Laporan')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bolder">Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Produk Masuk</h5>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Stok</th>
                                    <th class="text-center" scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporans as $key => $laporan)
                                    <tr>
                                        <td class="text-center">{{ $laporan->firstItem() + $key }}</td>
                                        <td>{{ $laporan->nama }}</td>
                                        <td>{{ $laporan->kategori }}</td>
                                        <td>{{ $laporan->jenis }}</td>
                                        <td>{{ $laporan->stok }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="#" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modalHapus{{ $laporan->id }}">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                            <div class="modal fade" id="modalHapus{{ $laporan->id }}" data-keyboard="false"
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
                                                                <h5 class="fs-0 fw-normal">Yakin hapus laporan
                                                                    <strong>{{ $laporan->nama }}?</strong>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-primary" type="button"
                                                                onclick="event.preventDefault(); document.getElementById('delete{{ $laporan->id }}').submit();">Hapus</button>
                                                            <form action="{{ url('owner/laporan/' . $laporan->id) }}"
                                                                method="POST" id="delete{{ $laporan->id }}">
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
                                {{ $laporans->appends(Request::all())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Produk Keluar</h5>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Stok</th>
                                    <th class="text-center" scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporans as $key => $laporan)
                                    <tr>
                                        <td class="text-center">{{ $laporan->firstItem() + $key }}</td>
                                        <td>{{ $laporan->nama }}</td>
                                        <td>{{ $laporan->kategori }}</td>
                                        <td>{{ $laporan->jenis }}</td>
                                        <td>{{ $laporan->stok }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="#" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modalHapus{{ $laporan->id }}">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                            <div class="modal fade" id="modalHapus{{ $laporan->id }}"
                                                data-keyboard="false" data-backdrop="static" tabindex="-1"
                                                aria-hidden="true">
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
                                                                <h5 class="fs-0 fw-normal">Yakin hapus laporan
                                                                    <strong>{{ $laporan->nama }}?</strong>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-primary" type="button"
                                                                onclick="event.preventDefault(); document.getElementById('delete{{ $laporan->id }}').submit();">Hapus</button>
                                                            <form action="{{ url('owner/laporan/' . $laporan->id) }}"
                                                                method="POST" id="delete{{ $laporan->id }}">
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
                                {{ $laporans->appends(Request::all())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
