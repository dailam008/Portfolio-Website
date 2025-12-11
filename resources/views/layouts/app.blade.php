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
/* ===== GLOBAL STYLES ===== */
html, body {
    margin: 0;
    padding: 0;
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100%;
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    position: relative;
    overflow-x: hidden;
    color: #f0f0f0;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
    opacity: 0.03;
    pointer-events: none;
    z-index: 0;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* ===== NAVBAR ===== */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1030;
    background: rgba(26, 26, 46, 0.95);
    backdrop-filter: blur(12px);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.navbar-scrolled {
    background: rgba(26, 26, 46, 0.98);
    box-shadow: 0 6px 40px rgba(0, 0, 0, 0.4);
}

/* Brand Text with Gradient & Glow */
.brand-text {
    font-weight: 900;
    font-size: 1.7rem;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.4s ease;
    letter-spacing: 0.5px;
    animation: gradientShift 3s ease infinite;
}

@keyframes gradientShift {
    0%, 100% {
        background-position: 0% center;
    }
    50% {
        background-position: 100% center;
    }
}

.brand-text:hover {
    transform: scale(1.05);
    filter: drop-shadow(0 0 8px rgba(102, 126, 234, 0.6));
}

/* Nav Links */
.nav-link {
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    color: rgba(255, 255, 255, 0.8) !important;
    position: relative;
    padding: 0.5rem 1rem !important;
}

.nav-link::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    width: 80%;
    height: 3px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
    transition: transform 0.3s ease;
}

.nav-link:hover,
.nav-link.active {
    color: #fff !important;
}

.nav-link:hover::after,
.nav-link.active::after {
    transform: translateX(-50%) scaleX(1);
}

/* Navbar Toggler */
.navbar-toggler {
    border-color: rgba(255, 255, 255, 0.3);
    padding: 0.5rem;
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.4);
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

/* ===== MAIN CONTENT ===== */
main {
    position: relative;
    z-index: 1;
    flex: 1;
    padding-top: 70px;
}

.container {
    position: relative;
    z-index: 2;
}

/* ===== ALERTS ===== */
.alert {
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-success {
    background: linear-gradient(135deg, #11998e, #38ef7d);
    color: #fff;
    font-weight: 600;
}

/* ===== FOOTER ===== */
footer {
    background: rgba(26, 26, 46, 0.95);
    backdrop-filter: blur(12px);
    color: #ccc;
    flex-shrink: 0;
    font-size: 0.95rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 -4px 30px rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 10;
}

footer strong {
    background: linear-gradient(90deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
}

footer a {
    transition: all 0.3s ease;
    font-size: 1.3rem;
}

footer a:hover {
    color: #667eea !important;
    transform: translateY(-3px);
}

/* ===== SCROLLBAR STYLING ===== */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #1a1a2e;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #764ba2, #667eea);
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
    .brand-text {
        font-size: 1.4rem;
    }

    .nav-link {
        font-size: 0.95rem;
        padding: 0.7rem 1rem !important;
    }

    .nav-link::after {
        display: none;
    }

    footer {
        font-size: 0.85rem;
        text-align: center;
    }

    footer .d-flex {
        flex-direction: column !important;
        gap: 0.5rem !important;
    }
}

@media (max-width: 480px) {
    .brand-text {
        font-size: 1.2rem;
    }
}
</style>

@stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand brand-text" href="/">Dailam Portfolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="bi bi-house-fill me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                        <i class="bi bi-person-fill me-2"></i>About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/projects" class="nav-link {{ request()->is('projects') ? 'active' : '' }}">
                        <i class="bi bi-briefcase-fill me-2"></i>My Work
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        <i class="bi bi-envelope-fill me-2"></i>Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Success Alert -->
@if (session('success'))
<div class="container mt-3">
    <div class="alert alert-success text-center" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
</div>
@endif

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="py-4 mt-auto">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
                &copy; {{ date('Y') }} <strong>Dailam</strong>. All rights reserved.
            </div>
            <div class="d-flex gap-3">
                <a href="https://github.com/dailam008" target="_blank" class="text-light text-decoration-none" title="GitHub">
                    <i class="bi bi-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/mochamad-dailam/" target="_blank" class="text-light text-decoration-none" title="LinkedIn">
                    <i class="bi bi-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Navbar Scroll Effect -->
<script>
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});
</script>

@stack('scripts')
</body>
</html>