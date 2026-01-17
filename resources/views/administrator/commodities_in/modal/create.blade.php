<!-- Modal -->
<div class="modal fade" id="addCommodityInModal" aria-labelledby="addCommodityInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommodityInModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.barang-masuk.store') }}" method="POST">
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
                                <label for="date_in">Tanggal Barang Masuk</label>
                                <div class="input-group">
                                    <input type="date"
                                        class="form-control{{ $errors->has('date_in') ? ' is-invalid' : '' }}"
                                        name="date_in" id="date_in" placeholder="Pilih tanggal.." data-input required>
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <a class="input-button" title="Pilih tanggal.." data-toggle>
                                                <i class="fas fa-calendar-alt"></i>
                                            </a>
                                        </span>
                                    </div>

                                    @if ($errors->has('date_in'))
                                        <div class="invalid-feedback font-weight-bold d-block">
                                            {{ $errors->first('date_in') }}
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
                                    placeholder="Masukkan jumlah.." min="1" step="1" required>


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

@push('scripts')
    <script>
        const amountInput = document.getElementById('amount');

        amountInput.addEventListener('keydown', function(e) {
            if (
                e.key === '-' ||
                e.key === '+' ||
                e.key === 'e' ||
                e.key === 'E' ||
                e.key === '.'
            ) {
                e.preventDefault();
            }
        });

        amountInput.addEventListener('input', function() {
            if (this.value !== '' && Number(this.value) < 1) {
                this.value = '';
            }
        });
    </script>
@endpush
