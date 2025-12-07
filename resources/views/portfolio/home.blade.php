@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    /* ===== GLOBAL STYLES ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        overflow-x: hidden;
    }

    /* ===== GLASS CARD EFFECT ===== */
    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .glass-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 48px rgba(0, 0, 0, 0.6);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* ===== HERO SECTION ===== */
    .hero-section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        color: #fff;
        position: relative;
        overflow: hidden;
        padding: 4rem 1.5rem;
    }

    /* Animated background particles */
    .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        animation: float 15s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes float {
        0%, 100% {
            transform: translate(0, 0);
        }
        50% {
            transform: translate(20px, 20px);
        }
    }

    /* Profile Image */
    .hero-section .profile-img {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        border: 6px solid rgba(255, 255, 255, 0.3);
        margin-bottom: 2rem;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        position: relative;
        z-index: 2;
        transition: transform 0.5s ease;
    }

    .hero-section .profile-img:hover {
        transform: scale(1.08) rotate(5deg);
    }

    /* Hero Title */
    .hero-title {
        font-weight: 900;
        font-size: 3.5rem;
        background: linear-gradient(90deg, #ffd700, #ffed4e, #fff, #ffd700);
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine 3s linear infinite, fadeInUp 0.8s ease-out;
        position: relative;
        z-index: 2;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    @keyframes shine {
        to {
            background-position: 200% center;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Hero Subtitle */
    .hero-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.95);
        max-width: 750px;
        margin: 0 auto 2.5rem;
        letter-spacing: 0.5px;
        line-height: 1.8;
        position: relative;
        z-index: 2;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    /* CTA Buttons */
    .hero-cta {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .btn-hero {
        padding: 14px 36px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-hero-primary {
        background: linear-gradient(135deg, #ffd700, #ffed4e);
        color: #1a1a2e;
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.5);
        background: linear-gradient(135deg, #ffed4e, #ffd700);
    }

    .btn-hero-secondary {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
    }

    .btn-hero-secondary:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
    }

    /* ===== SKILLS SECTION ===== */
    .skills-section {
        background: linear-gradient(135deg, #4a00e0 0%, #8e2de2 100%);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    .skills-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
        opacity: 0.03;
        pointer-events: none;
    }

    .section-title {
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 3.5rem;
        color: #fff;
        position: relative;
        display: block;
        text-align: center;
        padding-bottom: 15px;
    }

    .section-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #ffd700, #ffed4e);
        border-radius: 2px;
    }

    .skill-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .skill-card i {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #ffd700, #ffed4e);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 4px 8px rgba(255, 215, 0, 0.3));
    }

    .skill-card h5 {
        font-weight: 700;
        font-size: 1.4rem;
        margin-bottom: 1rem;
        color: #fff;
    }

    .skill-card p {
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.7;
        font-size: 1rem;
    }

    /* ===== ABOUT SECTION ===== */
    .about-section {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #c44569 100%);
        padding: 6rem 0;
        color: #fff;
        position: relative;
    }

    .about-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .about-content h2 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
    }

    .about-content p {
        font-size: 1.15rem;
        line-height: 1.8;
        margin-bottom: 2rem;
        color: rgba(255, 255, 255, 0.95);
    }

    .btn-about {
        background: #fff;
        color: #c44569;
        padding: 14px 36px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-about:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        background: #ffd700;
        color: #1a1a2e;
    }

    /* ===== SOCIAL SECTION ===== */
    .social-section {
        background: linear-gradient(135deg, #2d3561 0%, #1e1e2f 100%);
        padding: 5rem 0;
        color: #fff;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .social-links a {
        width: 70px;
        height: 70px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .social-links a::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 0;
    }

    .social-links a:hover::before {
        opacity: 1;
    }

    .social-links a i {
        position: relative;
        z-index: 1;
    }

    .social-links a:hover {
        transform: translateY(-8px) scale(1.1);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.8rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .skill-card i {
            font-size: 3rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 90vh;
            padding: 3rem 1.5rem;
        }

        .hero-section .profile-img {
            width: 150px;
            height: 150px;
            margin-bottom: 1.5rem;
        }

        .hero-title {
            font-size: 2.2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .hero-cta {
            flex-direction: column;
            align-items: center;
        }

        .btn-hero {
            width: 100%;
            max-width: 280px;
        }

        .skills-section,
        .about-section,
        .social-section {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 2.5rem;
        }

        .glass-card {
            padding: 2rem;
        }

        .skill-card i {
            font-size: 2.5rem;
        }

        .skill-card h5 {
            font-size: 1.2rem;
        }

        .skill-card p {
            font-size: 0.95rem;
        }

        .about-content h2 {
            font-size: 2rem;
        }

        .about-content p {
            font-size: 1rem;
        }

        .social-links a {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 1.8rem;
        }

        .hero-subtitle {
            font-size: 0.95rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .btn-hero {
            padding: 12px 28px;
            font-size: 0.95rem;
        }
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <img src="{{ asset('images/foto_dailam.jpg') }}" alt="Dailam" class="profile-img">
    <h1 class="hero-title">Hai, Saya Dailam 👋</h1>
    <p class="hero-subtitle">
        <strong>Developer & DevOps Engineer</strong> yang berfokus pada membangun aplikasi modern — cepat, otomatis, dan mudah di-maintain. 
        Saya mencintai teknologi yang membuat hidup jadi lebih efisien ✨
    </p>
    <div class="hero-cta">
        <a href="{{ url('/projects') }}" class="btn-hero btn-hero-primary">
            <i class="bi bi-briefcase-fill me-2"></i> Lihat Portfolio
        </a>
        <a href="{{ url('/contact') }}" class="btn-hero btn-hero-secondary">
            <i class="bi bi-envelope-fill me-2"></i> Hubungi Saya
        </a>
    </div>
</section>

<!-- Skills Section -->
<section class="skills-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Keahlian Saya</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="glass-card skill-card">
                    <i class="bi bi-code-slash"></i>
                    <h5>Web Development</h5>
                    <p>Membangun website modern, responsif, dan interaktif dengan Laravel, Bootstrap, & JavaScript yang powerful.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="glass-card skill-card">
                    <i class="bi bi-cloud-fill"></i>
                    <h5>DevOps</h5>
                    <p>Mengelola deployment, CI/CD, dan server automation agar aplikasi lancar, scalable, dan efisien.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="glass-card skill-card">
                    <i class="bi bi-phone-fill"></i>
                    <h5>UI/UX & Mobile</h5>
                    <p>Mendesain antarmuka user-friendly dan mobile responsive agar pengalaman pengguna maksimal.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section text-center">
    <div class="container">
        <div class="glass-card about-content">
            <h2>Tentang Saya</h2>
            <p>
                Saya seorang <strong>Developer & DevOps Enthusiast</strong> yang berfokus pada pembuatan sistem modern, efisien, dan mudah di-maintain.
                Saya senang mengeksplor teknologi baru dan membangun solusi digital yang berdampak nyata.
            </p>
            <a href="{{ url('/about') }}" class="btn-about">
                <span>Lihat Selengkapnya</span>
                <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
</section>

<!-- Social Section -->
<section class="social-section text-center">
    <div class="container">
        <h2 class="section-title">Terhubung dengan Saya</h2>
        <div class="social-links">
            <a href="mailto:daimoh442@gmail.com" target="_blank" title="Email">
                <i class="bi bi-envelope-fill"></i>
            </a>
            <a href="https://instagram.com/dailammhb" target="_blank" title="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://wa.me/6289618418569" target="_blank" title="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
            </a>
        </div>
    </div>
</section>

@endsection