@extends('layouts.app')

@section('title', 'My Work')

@push('styles')
<style>
.projects-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 85vh;
    text-align: center;
}

.projects-section h1 {
    font-weight: 800;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    background: linear-gradient(90deg, #4facfe, #00f2fe, #9f7aea);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.projects-section p.lead {
    color: #ccc;
    max-width: 700px;
    margin: 0 auto 3rem;
}

/* Tombol Project */
.project-btn {
    display: inline-block;
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    padding: 12px 22px;
    margin: 10px;
    border-radius: 25px;
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.project-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 242, 254, 0.4);
}
</style>
@endpush

@section('content')
<div class="projects-section">
    <h1>My Work</h1>
    <p class="lead">
        Berikut beberapa proyek yang telah saya kerjakan — menampilkan integrasi teknologi modern dan hasil yang fungsional.
    </p>

    <!-- ==== Mulai Tambahkan Project Manual di sini ==== -->

    <a href="https://github.com/dailam008" target="_blank" class="project-btn">
        🔗 Lihat Semua Repository GitHub
    </a>

</div>
@endsection
