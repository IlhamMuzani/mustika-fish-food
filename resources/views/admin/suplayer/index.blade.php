@extends('layouts.app')

@section('title', 'Data Suplayer')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bolder">Suplayer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">suplayer</li>
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
                    <h5>Tabel Suplayer</h5>
                </div>
                <div class="d-flex align-items-start justify-content-between py-3 mr-3">
                    <form class="d-flex ml-3" method="get" action="{{url('admin/suplayer')}}">
                        <input class="form-control me-2" name="keyword" value="{{Request::get('keyword')}}" type="search" placeholder="Cari.." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <a href="{{ url('admin/suplayer/create') }}" class="btn btn-outline-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th scope="col">Nama Suplayer</th>
                            <th scope="col">alamat</th>
                            <th class="text-start" scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suplayers as $key => $suplayer)
                            <tr>
                                <td class="text-center">{{ $suplayers->firstItem() + $key }}</td>
                                <td>{{ $suplayer->nama }}</td>
                                <td class="">{{ $suplayer->alamat }}</td>
                                <td class="text-start">
                                    {{-- <a href="#" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a> --}}
                                    <a href="{{ url('admin/suplayer/' . $suplayer->id . '/edit') }}"
                                        class="btn btn-warning btn-sm mb-1">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modalHapus{{ $suplayer->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <div class="modal fade" id="modalHapus{{ $suplayer->id }}" data-keyboard="false"
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
                                                        <h5 class="fs-0 fw-normal">Yakin hapus suplayer
                                                            <strong>{{ $suplayer->nama }}?</strong>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="event.preventDefault(); document.getElementById('delete{{ $suplayer->id }}').submit();">Hapus</button>
                                                    <form action="{{ url('admin/suplayer/' . $suplayer->id) }}"
                                                        method="POST" id="delete{{ $suplayer->id }}">
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
                        {{ $suplayers->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
