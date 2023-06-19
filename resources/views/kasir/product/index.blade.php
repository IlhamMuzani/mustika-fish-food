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
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th scope="col">Kode</th>
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
                                <td>{{ $product->kode_product }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->kategori }}</td>
                                <td>{{ $product->jenis }}</td>
                                <td>{{ $product->stok }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#myModal{{ $product->id }}">
                                        <i class="fas fa-eye"></i> Detail
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
                                                                                    <img class="mb-2" src="{{ asset('storage/uploads/' . $product->gambar) }}"
                                                                                        width="30%" height="30%">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="25%" valign="top"
                                                                                        class="textt">Kode</td>
                                                                                    <td width="2%">:</td>
                                                                                    <td>{{ $product->kode_product }}</td>
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
