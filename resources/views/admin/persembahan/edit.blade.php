@extends('admin.layouts.master')

@section('content')

<form action="{{ route('persembahan.prosesUbah', $persembahans->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $persembahans->id }}">

    <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h5 class="card-title text-white">Edit Data Persembahan Pelayanan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Deskripsi -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="5" required>{{ $persembahans->deskripsi }}</textarea>
                            </div>
                        </div>

                        <!-- Sidang -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sidang">Sidang</label>
                                <input type="text" class="form-control" name="sidang"
                                       value="{{ $persembahans->sidang }}" required>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal"
                                       value="{{ $persembahans->tanggal }}" required>
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                                @if($persembahans->gambar)
                                    <br>
                                    <img src="{{ asset('storage/' . $persembahans->gambar) }}" alt="Gambar Persembahan" class="img-thumbnail mt-2" width="200">
                                @endif
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="is_featured" id="is_featured1" value="1"
                                            {{ old('is_featured', $persembahans->is_featured) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured1">Aktif</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_featured" id="is_featured2" value="0"
                                            {{ old('is_featured', $persembahans->is_featured) == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured2">Tidak Aktif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="card-footer">
                    <a href="{{ route('persembahan.index') }}" class="btn btn-secondary">
                        Kembali <i class="fas fa-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-warning">
                        Ubah <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
