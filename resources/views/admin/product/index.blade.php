@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bolder">Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">produk</li>
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
                    <h5>Tabel Produk</h5>
                </div>
                <div class="d-flex align-items-start justify-content-between py-3 mr-3">
                    <form class="d-flex ml-3" method="get" action="{{ url('admin/product') }}">
                        <input class="form-control me-2" type="search" name="keyword" placeholder="Cari.."
                            value="{{ Request::get('keyword') }}" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <a href="{{ url('admin/product/create') }}" class="btn btn-outline-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Stok</th>
                            <th class="text-center" scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $product)
                            <tr>
                                <td class="text-center">{{ $products->firstItem() + $key }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->kategori }}</td>
                                <td>{{ $product->jenis }}</td>
                                <td>{{ $product->stok }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#myModal{{ $product->id }}">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ url('admin/product/' . $product->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modalHapus{{ $product->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                    <div data-toggle="modal" data-target="#myModal">
                                        <!-- Optional JavaScript -->
                                        <div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">
                                                    <div class="modal-header">-
                                                        <div class="modal-title" id="myModalLabel">Detail Produk</div>
                                                        <button type="button" class="btn btn-lg cl" data-dismiss="modal"><i
                                                                class="fas fa-times-circle"></i></button>
                                                    </div>

                                                    <div class="center">
                                                        <!--Content-->
                                                        <table width="100%" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top">
                                                                        <table border="0" width="100%"
                                                                            style="padding-left: 2px; padding-right: 13px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <img src="{{ asset('storage/uploads/' . $product->gambar) }}"
                                                                                        width="30%" height="30%">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="25%" valign="top"
                                                                                        class="textt">Nama</td>
                                                                                    <td width="2%">:</td>
                                                                                    <td>{{ $product->nama }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="textt">Suplayer</td>
                                                                                    <td>:</td>
                                                                                    <td>
                                                                                        {{ $product->suplayer->nama }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="textt">Kategori</td>
                                                                                    <td>:</td>
                                                                                    <td>
                                                                                        {{ $product->kategori }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="textt">Jenis
                                                                                    </td>
                                                                                    <td>:</td>
                                                                                    <td>{{ $product->jenis }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="textt">Stok
                                                                                    </td>
                                                                                    <td>:</td>
                                                                                    <td>{{ $product->stok }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="textt">Harga
                                                                                    </td>
                                                                                    <td>:</td>
                                                                                    <td>Rp.{{ $product->harga }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modalHapus{{ $product->id }}" data-keyboard="false"
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
                                                        <h5 class="fs-0 fw-normal">Yakin hapus produk
                                                            <strong>{{ $product->nama }}?</strong>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="event.preventDefault(); document.getElementById('delete{{ $product->id }}').submit();">Hapus</button>
                                                    <form action="{{ url('admin/product/' . $product->id) }}"
                                                        method="POST" id="delete{{ $product->id }}">
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
                        {{ $products->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
