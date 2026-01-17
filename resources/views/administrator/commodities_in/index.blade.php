@extends('layouts.app', ['title' => 'Halaman Barang Masuk', 'section_header' => 'Barang Masuk'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('utilities.flash-messages')
            <div class="card px-3 py-3 table-reponsive">
                <div class="row">
                    <div class="col-lg-12 px-3 py-3 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal"
                            data-placement="top" title="Print">
                            <i class="fas fa-print"></i>
                        </button>
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#addCommodityInModal" title="Tambah Data">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Barang Masuk</th>
                            <th>Pengguna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commodityIns as $key => $commodityIn)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $commodityIn->commodity->name }}</td>
                                <td>{{ $commodityIn->commodity->commodity_categories->name ?? '-' }}</td>
                                <td>{{ $commodityIn->amount }}</td>
                                <td>{{ indonesian_date_format($commodityIn->date_in) }}</td>
                                <td>{{ $commodityIn->users->name ?? '-' }}</td>
                                <td>
                                    <div class="btn-group btn-group-justified">
                                        <a href="{{ route('admin.barang-masuk.edit', $commodityIn->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.barang-masuk.destroy', $commodityIn->id) }}"
                                            method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-notification">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @include('administrator.commodities_in.modal.create')
    @include('administrator.reports.modal.print')
    @include('profile-modal')
@endpush

@push('js')
    @include('administrator.commodities_in._script')
@endpush
