document.addEventListener("DOMContentLoaded", function () {
    const submenuToggles = document.querySelectorAll(".has-submenu > a");

    submenuToggles.forEach(toggle => {
        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            const parent = this.parentElement;
            parent.classList.toggle("active-submenu");
        });
    });
});

function toggleFeatured(id) {
    $.ajax({
        url: `/admin/persembahans/toggle-featured/${id}`,
        type: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function(response) {
            let button = $('button.toggle-featured-btn[data-id="' + id + '"]');
            let statusText = $('#status-' + id); // Elemen status (jika ada)

            if (response.is_featured) {
                button.removeClass('btn-secondary').addClass('btn-success');
                button.find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                statusText.text('Aktif').removeClass('badge-secondary').addClass('badge-success');

                // SweetAlert2 sukses
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Status berhasil diubah menjadi AKTIF!',
                    timer: 2000,
                    showConfirmButton: false
                });

            } else {
                button.removeClass('btn-success').addClass('btn-secondary');
                button.find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                statusText.text('Tidak Aktif').removeClass('badge-success').addClass('badge-secondary');

                // SweetAlert2 info
                Swal.fire({
                    icon: 'info',
                    title: 'Status Diperbarui',
                    text: 'Status berhasil diubah menjadi TIDAK AKTIF!',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function() {
            // SweetAlert2 error
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal mengubah status persembahan.',
            });
        }
    });
}
