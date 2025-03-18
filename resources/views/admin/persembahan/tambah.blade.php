@extends('admin.layouts.master')
@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h5 class="card-title text-white">Tambah Data Persembahan Pelayanan</h5>
                </div>
                <form action="{{ route('persembahan.proses-tambah') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id">

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" name="gambar" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="sidang">Sidang</label>
                            <input type="text" class="form-control" name="sidang"
                                   placeholder="FHK 25 Desember 2025" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Status</label>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_featured" id="is_featured1" value="1"
                                        {{ old('is_featured') == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_featured" id="is_featured2" value="0"
                                        {{ old('is_featured') == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured2">Tidak Aktif</label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('persembahan.index') }}" class="btn btn-secondary">
                                        Kembali <i class="fas fa-mail-reply"></i>
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        Submit <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
