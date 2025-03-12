@extends('admin.layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DOC FHK</h1>
    </div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h5 class="card-title text-white">Atur FHK</h5>
                </div>
                <form action="{{route('fhk.proses-tambah')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Judul FHK</label>
                                    <input type="text" class="form-control" name="judul_fhk"
                                           placeholder="FHK 25 Desember 2025">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tema FHK</label>
                                    <input type="text" class="form-control" name="tema_fhk"
                                           placeholder="Masukan Tema FHK">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Bacaan Alkitab</label>
                                    <input type="text" class="form-control" name="bacaan_alkitab"
                                           placeholder="Masukan Ayat Bacaan Alkitab">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tanggal Khotbah</label>
                                    <input type="date" class="form-control" name="tanggal_khotbah">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">File FHK</label>
                                    <input type="file" class="form-control" name="file_fhk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{route('fhk.index')}}" class="btn btn-secondary"> Kembali <i
                                        class="fas fa-mail-reply"></i></a>
                                <button type="submit" class="btn btn-success">Submit <i class="fas fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
