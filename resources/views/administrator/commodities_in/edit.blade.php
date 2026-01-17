@extends('layouts.app', ['title' => 'Halaman Edit Barang Masuk', 'section_header' => 'Edit Barang Masuk'])

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('utilities.flash-messages')
        </div>
        <div class="col-lg-6">
            <div class="card">
                <form action="{{ route('admin.barang-masuk.update', $commodityIn->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <table class="table">
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <select class="form-control" name="commodity_id" id="commodity_id" required>
                                <option selected>Pilih..</option>
                                @foreach ($commodities as $commodity)
                                    <option value="{{ $commodity->id }}"
                                        {{ $commodity->id === $commodityIn->commodity_id ? 'selected' : '' }}>
                                        {{ $commodity->name }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('commodity_id'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('commodity_id') }}
                                </div>
                            @endif
                        </td>

                        <tr>
                            <td>Pengguna</td>
                            <td>:</td>
                            <td class="text-wrap">
                                <select class="form-control" name="user_id" id="user_id" required>
                                    <option selected>Pilih..</option>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $user->id }}"
                                            {{ $commodityIn->user_id === $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user_id'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('user_id') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </table>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <table class="table">
                    <tr>
                        <td>Tanggal Barang Masuk</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <div class="input-group">
                                <input type="date" class="form-control" name="date_in" id="date_in"
                                    placeholder="Pilih tanggal.." value="{{ $commodityIn->date_in }}" data-input required>
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <a class="input-button" title="Pilih tanggal.." data-toggle>
                                            <i class="fas fa-calendar-alt"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                            @if ($errors->has('date_in'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('date_in') }}
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <input type="number" class="form-control" name="amount" id="amount"
                                value="{{ $commodityIn->amount }}" required>

                            @if ($errors->has('amount'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <a href="{{ route('admin.barang-masuk.index') }}" class="btn btn-primary">Kembali</a>
                <button type="submit" class="btn btn-success text-white">Simpan Perubahan</button>
            </div>

            </form>

        </div>
    </div>
@endsection
