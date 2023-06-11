@extends('layouts.main')

@section('title', 'Data Transaksi')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bolder">Inventory Transaksi</h1>
                </div><!-- /.col -->
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
                    <h5>Tabel Transaksi</h5>
                </div>
                <div class="d-flex align-items-start justify-content-between py-3 mr-3">
                    <form class="d-flex ml-3">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <a href="{{ url('transaksi/create') }}" class="btn btn-outline-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th class="text-center" scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $key => $transaksi)
                            <tr>
                                <td class="text-center">{{ $transaksis->firstItem() + $key }}</td>
                                <td>{{ $transaksi->nama_pembeli }}</td>                                    
                                <td>{{ $transaksi->ikan->nama }}</td>
                                <td>{{ $transaksi->kategori_produk }}</td>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>{{ $transaksi->jumlah_jual }}</td>
                                <td>{{ $transaksi->harga_jual }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modalHapus{{ $transaksi->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                    <div class="modal fade" id="modalHapus{{ $transaksi->id }}" data-bs-keyboard="false"
                                        data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog mt-6" role="document">
                                            <div class="modal-content border-0">
                                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
                                                        <h4 class="mb-3">Hapus</h4>
                                                        <h5 class="fs-0 fw-normal">Yakin hapus transaksi
                                                            <strong>{{ $transaksi->nama }}?</strong>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="event.preventDefault(); document.getElementById('delete{{ $transaksi->id }}').submit();">Hapus</button>
                                                    <form action="{{ url('transaksi/' . $transaksi->id) }}" method="POST"
                                                        id="delete{{ $transaksi->id }}">
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
                        {{ $transaksis->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
