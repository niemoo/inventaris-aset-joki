@extends('layouts.app', ['title' => 'Halaman Barang', 'section_header' => 'Barang'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('utilities.flash-messages')
            <div class="card px-3 py-3 table-reponsive">
                <div class="row">
                    <div class="col-lg-12 px-3 py-3 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCommodityModal">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Barang</th>
                            <th>Tempat</th>
                            {{-- <th>Jumlah</th> --}}
                            <th>Tanggal Register</th>
                            <th>Kondisi</th>
                            <th>Tanggal Update</th>
                            {{-- <th>Pengguna</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commodities as $key => $commodity)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $commodity->name }}</td>
                                <td>{{ $commodity->commodity_categories->name }}</td>
                                <td>{{ $commodity->commodity_locations->name }}</td>
                                {{-- <td>{{ $commodity->amount }}</td> --}}
                                <td>{{ indonesian_date_format($commodity->created_at) }}</td>
                                @if ($commodity->condition === 'Sudah Layak')
                                    <td>
                                        <span class="badge badge-pill badge-success" data-toggle="tooltip"
                                            data-placement="top" title="Sudah Layak">Layak</span>
                                    </td>
                                @elseif($commodity->condition === 'Layak Sebagian')
                                    <td>
                                        <span class="badge badge-pill badge-warning" data-toggle="tooltip"
                                            data-placement="top" title="Layak Sebagian">Layak Sebagian</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge badge-pill badge-danger" data-toggle="tooltip"
                                            data-placement="top" title="Tidak Layak">Tidak Layak</span>
                                    </td>
                                @endif
                                <td>{{ indonesian_date_format($commodity->updated_at) }}</td>
                                {{-- <td>{{ $commodity->users->name }}</td> --}}
                                <td>
                                    <div class="btn-group btn-group-justified">
                                        <a href="{{ route('admin.aset.edit', $commodity->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.aset.destroy', $commodity->id) }}" method="POST">
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
    @include('administrator.commodities.modal.create')
@endpush
