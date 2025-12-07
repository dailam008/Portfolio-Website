@extends('layouts.app')

@section('title', 'About')

@push('styles')
<style>
    .glass-card {
        background: rgba(255,255,255,0.05);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        backdrop-filter: blur(8px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 36px rgba(0,0,0,0.5);
    }
</style>
@endpush

@section('content')
<div class="container py-5">

    <!-- Tentang Saya -->
    <div class="row align-items-center mb-5 glass-card animate__animated animate__fadeIn">
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="{{ asset('images/foto_dailam.jpg') }}" 
                 alt="Foto Dailam" 
                 class="rounded-circle shadow-lg"
                 style="width: 180px; height: 180px; object-fit: cover; border: 5px solid rgba(255,255,255,0.2);">
        </div>
        <div class="col-md-8">
            <h2 class="fw-bold mb-3 text-primary">Tentang Saya</h2>
            <p class="lead text-light">
                Saya <span class="fw-semibold">Dailam</span>, Developer & DevOps Engineer yang fokus pada pengembangan backend dengan Laravel dan otomatisasi deployment menggunakan Docker & pipeline CI/CD.
            </p>
            <p class="text-light">
                Saya membangun sistem yang <span class="fw-semibold">aman</span>, <span class="fw-semibold">cepat</span>, dan <span class="fw-semibold">mudah di-scale</span> agar aplikasi berjalan efisien & andal.
            </p>
        </div>
    </div>

    <hr class="my-5 border-light">

    <!-- Skills -->
    <div class="text-center mb-5">
        <h3 class="fw-bold text-primary mb-4">Keahlian Saya</h3>
        <div class="row justify-content-center g-4">
            @php
                $skills = ['Laravel', 'PHP', 'Docker', 'Docker Compose', 'CI/CD', 'Azure', 'MySQL', 'Redis'];
            @endphp
            @foreach($skills as $skill)
            <div class="col-6 col-md-3">
                <div class="glass-card text-center">
                    <i class="bi bi-check-circle-fill text-primary mb-2" style="font-size: 1.5rem;"></i>
                    <h6 class="fw-semibold text-light">{{ $skill }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <hr class="my-5 border-light">

    <!-- Tools -->
    <div class="text-center">
        <h3 class="fw-bold text-primary mb-4">Tools</h3>
        <div class="row justify-content-center g-4">
            @php
                $tools = ['VSCode', 'Git', 'Docker', 'Postman', 'phpMyAdmin'];
            @endphp
            @foreach($tools as $tool)
            <div class="col-6 col-md-3">
                <div class="glass-card text-center">
                    <i class="bi bi-gear-fill text-secondary mb-2" style="font-size: 1.5rem;"></i>
                    <h6 class="fw-semibold text-light">{{ $tool }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
