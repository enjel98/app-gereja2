/*!
* Start Bootstrap - Agency v7.0.12 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
//

// swiper
document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".mySwiper", {
        lazy: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});


window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    //  Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua iframe video
        const videos = document.querySelectorAll('.video-container iframe');
        const overlay = document.getElementById('overlay');

        videos.forEach(video => {
            video.addEventListener('click', function () {
                if (!this.classList.contains('fullscreen')) {
                    // Tambah class fullscreen
                    this.classList.add('fullscreen');
                    overlay.style.display = 'block';
                }
            });
        });

        // Klik overlay untuk keluar dari fullscreen
        overlay.addEventListener('click', function () {
            videos.forEach(video => {
                video.classList.remove('fullscreen');
            });
            overlay.style.display = 'none';
        });
    });


// Data jemaat yang berulang tahun
    const jemaat = [
        { nama: "Gbl Lyan Vera Valentino Sihotang", tanggalLahir: "1974-02-19" },
        { nama: "Gbl Ronalt Huibert Ferdinan Lutam", tanggalLahir: "1972-02-10" }
    ];

// Tanggal hari ini
    const today = new Date();
    const todayMonth = today.getMonth() + 1;
    const todayDay = today.getDate();

// Filter jemaat yang berulang tahun hari ini
    const jemaatUlangTahun = jemaat.filter(person => {
        const [year, month, day] = person.tanggalLahir.split("-").map(Number);
        return month === todayMonth && day === todayDay;
    });

// Tampilkan daftar ulang tahun di tabel
    const birthdayTable = document.getElementById("birthdayTable");

    if (jemaatUlangTahun.length > 0) {
        jemaatUlangTahun.forEach(person => {
            const [year, month, day] = person.tanggalLahir.split("-").map(Number);
            const age = today.getFullYear() - year;

            const row = document.createElement("tr");
            row.innerHTML = `
            <td>${person.nama}</td>
            <td>${day} ${getMonthName(month)} ${year}</td>
            <td>${age} Thn</td>
        `;
            birthdayTable.appendChild(row);
        });
    } else {
        birthdayTable.innerHTML = "<tr><td colspan='3'>Tidak ada jemaat yang berulang tahun hari ini.</td></tr>";
    }

// Fungsi mendapatkan nama bulan
    function getMonthName(month) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
        return monthNames[month - 1];
    }

// Tambahkan ucapan ulang tahun
    document.getElementById("beriUcapan").addEventListener("click", function () {
        const ucapan = prompt("Masukkan ucapan ulang tahun:");
        if (ucapan) {
            const greetingsList = document.getElementById("greetings");
            const listItem = document.createElement("li");
            listItem.textContent = `- ${ucapan} // ${todayDay}-${todayMonth}-${today.getFullYear()}`;
            greetingsList.appendChild(listItem);
        }
    });



});
