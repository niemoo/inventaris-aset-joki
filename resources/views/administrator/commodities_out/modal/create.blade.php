<!-- Modal -->
<div class="modal fade" id="addCommodityOutModal" aria-labelledby="addCommodityOutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommodityOutModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.barang-keluar.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="commodity_id">Nama Barang</label>
                                <select class="form-control{{ $errors->has('commodity_id') ? ' is-invalid' : '' }}"
                                    name="commodity_id" id="commodity_id" required>
                                    <option selected>Pilih..</option>
                                    @foreach ($commodities as $key => $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('commodity_id'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('commodity_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="user_id">Pengguna</label>
                                <select class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                    name="user_id" id="user_id" required>
                                    <option selected>Pilih..</option>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user_id'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('user_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="date_out">Tanggal Barang Keluar</label>
                                <div class="input-group">
                                    <input type="date"
                                        class="form-control{{ $errors->has('date_out') ? ' is-invalid' : '' }}"
                                        name="date_out" id="date_out" placeholder="Pilih tanggal.." data-input
                                        required>
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <a class="input-button" title="Pilih tanggal.." data-toggle>
                                                <i class="fas fa-calendar-alt"></i>
                                            </a>
                                        </span>
                                    </div>

                                    @if ($errors->has('date_out'))
                                        <div class="invalid-feedback font-weight-bold d-block">
                                            {{ $errors->first('date_out') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="amount">Jumlah</label>
                                <input type="number"
                                    class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                    name="amount" id="amount" value="{{ old('amount') }}"
                                    placeholder="Masukkan jumlah.." required>

                                @if ($errors->has('amount'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
