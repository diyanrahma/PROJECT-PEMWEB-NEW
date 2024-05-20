// 1. BAGIAN IKON LOGIN //
// Asumsikan isLogin adalah variabel yang menunjukkan status login pengguna
const isLogin = true; // Ubah ini berdasarkan status login sebenarnya

// Fungsi untuk mengubah ikon profil
function ubahIkonProfil() {
    const ikonProfil = document.querySelector('.fa-user'); // Menggunakan selector untuk ikon Font Awesome yang sesuai
    if (isLogin) {
        ikonProfil.classList.remove('fa-regular fa-user'); // Hapus kelas 'fa-user'
        ikonProfil.classList.add('fa-solid fa-user'); // Tambahkan kelas 'fa-sign-out-alt' untuk ikon saat login
    } else {
        ikonProfil.classList.remove('fa-solid fa-user'); // Hapus kelas 'fa-sign-out-alt'
        ikonProfil.classList.add('fa-regular fa-user'); // Tambahkan kelas 'fa-user' untuk ikon saat tidak login
    }
}

window.onload = ubahIkonProfil;

// 2. BAGIAN INDEX //
document.addEventListener("DOMContentLoaded", function () {
    const carouselSlide = document.querySelector(".carousel-slide");
    const carouselItems = document.querySelectorAll(".slidee"); // Ubah .carousel-item menjadi .slide
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");

    let counter = 1;
    const slideWidth = carouselItems[0].clientWidth;

    function goToSlide(index) {
        if (index >= carouselItems.length) {
            index = 0;
        } else if (index < 0) {
            index = carouselItems.length - 1;
        }

        carouselSlide.style.transition = "transform 0.5s ease-in-out";
        carouselSlide.style.transform = `translateX(-${slideWidth * index}px)`;
        counter = index;
    }

    prevBtn.addEventListener("click", () => {
        goToSlide(counter - 1 - 0.5);
    });

    nextBtn.addEventListener("click", () => {
        // Tambahkan nilai kelebihan saat mengklik tombol "next"
        goToSlide(counter + 1 + 0.1); // Misalnya, tambahkan +0.1 sebagai nilai kelebihan
    });
});

// 3. BAGIAN LAYANAN //
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    const totalSlides = slides.length;
    let currentIndex = 0;

    const showSlides = () => {
        slides.forEach((slide, index) => {
            if (index >= currentIndex && index < currentIndex + 2) {
                slide.style.display = "block";
            } else {
                slide.style.display = "none";
            }
        });
    };

    const nextSlide = () => {
        if (currentIndex < totalSlides - 1) {
            currentIndex += 2;
        } else {
            currentIndex = 0;
        }
        showSlides();
    };

    const prevSlide = () => {
        if (currentIndex > 0) {
            currentIndex -= 2;
        } else {
            currentIndex = totalSlides - 2;
        }
        showSlides();
    };

    document.querySelector(".next-btn").addEventListener("click", nextSlide);
    document.querySelector(".prev-btn").addEventListener("click", prevSlide);

    // Show initial slides
    showSlides();
});