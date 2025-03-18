@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">PERSEMBAHAN PELAYANAN</h1>
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

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('persembahan.tambah') }}" class="btn btn-primary">+ Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark text-center">
                        <tr>
                            <th style="width: 5%;">NO</th>
                            <th style="width: 15%;">GAMBAR</th>
                            <th style="width: 30%;">DESKRIPSI</th>
                            <th style="width: 15%;">SIDANG</th>
                            <th style="width: 15%;">TANGGAL</th>
                            <th style="width: 20%;">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($persembahans as $key => $item)
                            <tr>
                                <td class="text-center">{{ $persembahans->firstItem() + $key }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                         alt="Gambar" class="img-thumbnail" width="100">
                                </td>
                                <td title="{{ $item->deskripsi }}">
                                    {{ Str::limit($item->deskripsi, 50, '...') }}
                                </td>
                                <td class="text-center">{{ $item->sidang }}</td>
                                <td class="text-center">{{ $item->tanggal }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('persembahan.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                                onclick="deletePersembahan({{ $item->id }}, '{{ $item->sidang }}')"
                                                class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button onclick="toggleFeatured({{ $item->id }})"
                                                class="btn btn-sm toggle-featured-btn {{ $item->is_featured ? 'btn-success' : 'btn-secondary' }}"
                                                data-id="{{ $item->id }}">
                                            <i class="fas {{ $item->is_featured ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-2">
                        {{ $persembahans->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function deletePersembahan(id, sidang) {
        console.log("ID:", id);  // Debugging: Periksa ID
        console.log("SIDANG:", sidang);  // Debugging: Periksa Sidang

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: `Data dengan sidang "${sidang}" akan dihapus secara permanen!`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`{{ route('persembahan.delete', '') }}/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Response:", data); // Debugging: Periksa response dari server
                        if (data.success) {
                            Swal.fire("Terhapus!", `Data dengan sidang "${sidang}" berhasil dihapus.`, "success")
                                .then(() => location.reload());
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
