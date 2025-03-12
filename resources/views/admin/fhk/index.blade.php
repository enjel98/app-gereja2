@extends('admin.layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DOC FHK</h1>
    </div>
    <div class="row">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">File</h4>
                    <a href="{{route('fhk.tambah')}}" class="btn btn-primary"> + Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table-fhk">
                            <thead>
                            <tr class="text-uppercase">
                                <th class="w-3p">#</th>
                                <th>Nama File</th>
                                <th class="w-10p">Tanggal</th>
                                <th class="w-5p">Download</th>
                                <th class="w-5p">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fhk as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->judul_fhk}}</td>
                                    <td>{{$item->tanggal_khotbah}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-download"></i></button>
                                    </td>
                                    <td>
                                        <a href="{{route('fhk.edit', $item->id)}}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <button type="button" onclick="deleteFhk({{$item->id}})"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="float-right">
                                {{$fhk->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function deleteFhk(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('fhk.delete', '') }}/" + id, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Terhapus!", "Data berhasil dihapus.", "success")
                                    .then(() => location.reload()); // Reload halaman setelah delete
                            } else {
                                Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus data.", "error");
                            }
                        })
                        .catch(error => {
                            Swal.fire("Error!", "Gagal menghapus data.", "error");
                            console.error("Error:", error);
                        });
                }
            });
        }
    </script>
@endsection
