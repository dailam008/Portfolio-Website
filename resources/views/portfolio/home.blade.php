@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(8px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.5);
    }

    .hero-section {
        min-height: 90vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #f0f0f0;
        position: relative;
        overflow: hidden;
        border-radius: 20px;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
        opacity: 0.05;
        pointer-events: none;
    }

    .hero-section img.profile-img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .hero-title {
        font-weight: 800;
        font-size: 2.8rem;
        background: linear-gradient(90deg, #ffd700, #ffed4a, #fff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: fadeInUp 1s ease-in-out;
    }

    .hero-subtitle {
        font-size: 1.15rem;
        color: #e0e0e0;
        max-width: 700px;
        margin: 0 auto;
        letter-spacing: 0.3px;
        line-height: 1.6;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section-title {
        font-weight: 700;
        margin-bottom: 2rem;
        color: #f0f0f0;
    }

    .skills-section {
        background: linear-gradient(135deg, #4a00e0, #8e2de2);
        padding: 5rem 0;
    }

    .about-section {
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        padding: 5rem 0;
        color: #f0f0f0;
    }

    .social-links a {
        width: 60px;
        height: 60px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        color: #f0f0f0;
        transition: all 0.3s ease;
    }

    .social-links a:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
    }

    .btn-primary {
        background-color: #ffd700;
        border-color: #ffd700;
        color: #1e1e2f;
    }

    .btn-primary:hover {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #1e1e2f;
    }

    .about-btn {
        transition: all 0.3s ease;
    }

    .about-btn:hover {
        background-color: #ffce45 !important;
        color: #1e1e2f !important;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.5);
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="hero-section glass-card animate__animated animate__fadeInDown">
    <img src="{{ asset('images/foto_dailam.jpg') }}" alt="Dailam" class="profile-img animate__animated animate__fadeInDown">
    <h1 class="hero-title animate__animated animate__fadeInUp">Hai, Saya Dailam</h1>
    <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">
        <strong>Developer & DevOps Engineer</strong> yang berfokus pada membangun aplikasi modern — cepat, otomatis, dan mudah di-maintain. 
        Saya mencintai teknologi yang membuat hidup jadi lebih efisien ✨
    </p>
</section>

<!-- Skills Section -->
<section class="skills-section">
    <div class="container">
        <h2 class="text-center section-title animate__animated animate__fadeIn">Keahlian Saya</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card text-center animate__animated animate__fadeInUp">
                    <i class="bi bi-code-slash display-4 mb-3"></i>
                    <h5>Web Development</h5>
                    <p>Membangun website modern, responsif, dan interaktif dengan Laravel, Bootstrap, & JS.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card text-center animate__animated animate__fadeInUp animate__delay-1s">
                    <i class="bi bi-cloud-fill display-4 mb-3"></i>
                    <h5>DevOps</h5>
                    <p>Mengelola deployment, CI/CD, dan server automation agar aplikasi lancar & scalable.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card text-center animate__animated animate__fadeInUp animate__delay-2s">
                    <i class="bi bi-phone-fill display-4 mb-3"></i>
                    <h5>UI/UX & Mobile</h5>
                    <p>Mendesain antarmuka user-friendly dan mobile responsive agar UX maksimal.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section text-center">
    <div class="container glass-card animate__animated animate__fadeIn">
        <h2 class="mb-3">Tentang Saya</h2>
        <p class="lead">
            Saya seorang <strong>Developer & DevOps Enthusiast</strong> yang berfokus pada pembuatan sistem modern, efisien, dan mudah di-maintain.
            Saya senang mengeksplor teknologi baru dan membangun solusi digital yang berdampak nyata.
        </p>
        <a href="{{ url('/about') }}" class="btn btn-warning btn-lg mt-3 px-4 rounded-pill shadow-sm fw-semibold about-btn">
            <i class="bi bi-arrow-right-circle me-2"></i> Lihat Selengkapnya
        </a>
    </div>
</section>

<!-- Social Section -->
<section class="text-center py-5">
    <h2 class="section-title animate__animated animate__fadeIn">Terhubung dengan Saya</h2>
    <div class="d-flex justify-content-center gap-3 social-links animate__animated animate__fadeInUp animate__delay-1s flex-wrap">
        <a href="https://github.com/dailam008" target="_blank"><i class="bi bi-github"></i></a>
        <a href="https://instagram.com/dailammhb" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://wa.me/6289618418569" target="_blank"><i class="bi bi-whatsapp"></i></a>
    </div>
</section>

@endsection
