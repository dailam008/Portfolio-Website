@extends('layouts.app')

@section('title', 'About')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    /* ===== GLOBAL STYLES ===== */
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
        transform: translateY(-5px);
        box-shadow: 0 16px 48px rgba(0, 0, 0, 0.6);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* ===== ABOUT HERO SECTION ===== */
    .about-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        padding: 6rem 0 4rem;
        position: relative;
        overflow: hidden;
    }

    .about-hero::before {
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
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(20px, 20px); }
    }

    .profile-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 6px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        transition: transform 0.5s ease;
        animation: fadeInLeft 0.8s ease-out;
    }

    .profile-image:hover {
        transform: scale(1.08) rotate(5deg);
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .about-content h2 {
        font-weight: 800;
        font-size: 2.5rem;
        background: linear-gradient(90deg, #ffd700, #ffed4e, #fff);
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
        animation: fadeInRight 0.8s ease-out;
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .about-content p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.1rem;
        line-height: 1.8;
        animation: fadeInRight 0.8s ease-out 0.2s both;
    }

    /* ===== SKILLS & TOOLS SECTION ===== */
    .skills-tools-section {
        background: linear-gradient(135deg, #4a00e0 0%, #8e2de2 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }

    .skills-tools-section::before {
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
        font-size: 2.2rem;
        margin-bottom: 3rem;
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

    .skill-item {
        text-align: center;
        transition: transform 0.3s ease;
    }

    .skill-item:hover {
        transform: translateY(-5px);
    }

    .skill-item i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #ffd700, #ffed4e);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 4px 8px rgba(255, 215, 0, 0.3));
    }

    .skill-item h6 {
        font-weight: 700;
        font-size: 1.1rem;
        color: #fff;
        margin: 0;
    }

    .divider {
        height: 3px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        margin: 4rem 0;
        border: none;
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 768px) {
        .about-hero {
            padding: 4rem 0 3rem;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            margin-bottom: 2rem;
        }

        .about-content h2 {
            font-size: 2rem;
        }

        .about-content p {
            font-size: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .skill-item i {
            font-size: 2rem;
        }

        .skill-item h6 {
            font-size: 1rem;
        }

        .glass-card {
            padding: 2rem;
        }
    }

    @media (max-width: 480px) {
        .about-content h2 {
            font-size: 1.6rem;
        }

        .section-title {
            font-size: 1.5rem;
        }
    }
</style>
@endpush

@section('content')

<!-- About Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="row align-items-center glass-card">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img src="{{ asset('images/foto_dailam.jpg') }}" 
                     alt="Foto Dailam" 
                     class="profile-image">
            </div>
            <div class="col-md-8 about-content">
                <h2>Tentang Saya</h2>
                <p class="lead mb-3">
                    Saya <span class="fw-bold">Mochammad Dailam Al Muhibi</span>, seorang mahasiswa Telkom University Surabaya yang sedang menekuni dunia Teknologi Informasi. Ketertarikan saya terhadap IT mulai tumbuh sejak memasuki bangku kuliah, dan sejak itu saya terus belajar serta mengembangkan kemampuan saya di berbagai bidang, mulai dari pemrograman, pengembangan web, hingga teknologi digital lainnya.
                </p>
                <p>
                    Meskipun saya belum memiliki pengalaman profesional, saya memiliki semangat besar untuk berkembang, belajar hal baru, dan berkontribusi dalam menciptakan solusi digital yang bermanfaat. Saya terus belajar membangun sistem yang <span class="fw-bold">aman</span>, <span class="fw-bold">cepat</span>, dan <span class="fw-bold">mudah di-scale</span> agar aplikasi berjalan efisien & andal.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Skills & Tools Section -->
<section class="skills-tools-section">
    <div class="container">
        <!-- Skills -->
        <div class="text-center mb-5">
            <h3 class="section-title">Keahlian Saya</h3>
            <div class="row justify-content-center g-4">
                @php
                    $skills = [
                        ['name' => 'Laravel', 'icon' => 'bi-layers-fill'],
                        ['name' => 'PHP', 'icon' => 'bi-code-square'],
                        ['name' => 'Docker', 'icon' => 'bi-box-fill'],
                        ['name' => 'Docker Compose', 'icon' => 'bi-boxes'],
                        ['name' => 'CI/CD', 'icon' => 'bi-arrow-repeat'],
                        ['name' => 'Azure', 'icon' => 'bi-cloud-fill'],
                        ['name' => 'MySQL', 'icon' => 'bi-database-fill'],
                        ['name' => 'Redis', 'icon' => 'bi-lightning-fill']
                    ];
                @endphp
                @foreach($skills as $skill)
                <div class="col-6 col-md-3">
                    <div class="glass-card skill-item">
                        <i class="bi {{ $skill['icon'] }}"></i>
                        <h6>{{ $skill['name'] }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <hr class="divider">

        <!-- Tools -->
        <div class="text-center">
            <h3 class="section-title">Tools</h3>
            <div class="row justify-content-center g-4">
                @php
                    $tools = [
                        ['name' => 'VSCode', 'icon' => 'bi-code-slash'],
                        ['name' => 'Git', 'icon' => 'bi-git'],
                        ['name' => 'Docker', 'icon' => 'bi-box-fill'],
                        ['name' => 'Postman', 'icon' => 'bi-send-fill'],
                        ['name' => 'phpMyAdmin', 'icon' => 'bi-server']
                    ];
                @endphp
                @foreach($tools as $tool)
                <div class="col-6 col-md-3">
                    <div class="glass-card skill-item">
                        <i class="bi {{ $tool['icon'] }}"></i>
                        <h6>{{ $tool['name'] }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection