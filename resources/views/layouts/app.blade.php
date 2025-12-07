<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ config('app.name', 'Dailam Portfolio') }} — @yield('title')</title>

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- Custom Styles -->
<style>
html, body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100%;
    background: linear-gradient(135deg, #1e1e2f, #2e2e3f);
    position: relative;
    overflow-x: hidden;
    color: #f0f0f0;
}

body::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
    opacity: 0.05;
    pointer-events: none;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Navbar */
.navbar {
    position: fixed;
    top: 0; left: 0; width: 100%;
    z-index: 1030;
    background-color: rgba(33,33,41,0.95);
    backdrop-filter: blur(6px);
}

/* Brand neon */
.brand-text {
    font-weight: 900;
    font-size: 1.6rem;
    background: linear-gradient(90deg, rgba(79,172,254,0.6), rgba(0,242,254,0.6), rgba(159,122,234,0.6));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 2px rgba(79,172,254,0.5), 0 0 4px rgba(0,242,254,0.4), 0 0 6px rgba(159,122,234,0.3);
    transition: all 0.4s ease;
}
.brand-text:hover {
    transform: scale(1.05) rotate(-1deg);
    text-shadow: 0 0 4px rgba(79,172,254,0.5), 0 0 8px rgba(0,242,254,0.4), 0 0 12px rgba(159,122,234,0.3);
}

.nav-link {
    font-weight: 500;
    transition: all 0.3s ease;
    color: #f0f0f0 !important;
}
.nav-link:hover, .nav-link.active {
    color: #0d6efd !important;
}

/* Footer */
footer {
    background-color: rgba(33,33,41,0.95);
    color: #ccc;
    flex-shrink: 0;
    font-size: 0.9rem;
}
</style>

@stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand brand-text" href="/">Dailam Portfolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="/projects" class="nav-link {{ request()->is('projects') ? 'active' : '' }}">My Work</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Success Alert -->
@if (session('success'))
<div class="alert alert-success text-center" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- Main Content -->
<main class="pt-5">
    <div class="container py-4">
        @yield('content')
    </div>
</main>

<!-- Footer -->
<footer class="py-3 mt-auto">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="mb-2 mb-md-0">&copy; {{ date('Y') }} <strong>Dailam</strong>. All rights reserved.</div>
        <div class="d-flex gap-3 mt-2 mt-md-0">
            <a href="https://github.com/dailam008" target="_blank" class="text-light text-decoration-none"><i class="bi bi-github"></i></a>
            <a href="https://linkedin.com/in/dailam008" target="_blank" class="text-light text-decoration-none"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
