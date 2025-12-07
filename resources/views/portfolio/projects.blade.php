@extends('layouts.app')

@section('title', 'My Work')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
/* ===== PROJECTS HERO SECTION ===== */
.projects-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 5rem 0 3rem;
    position: relative;
    overflow: hidden;
}

.projects-hero::before {
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

.projects-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 2rem 1.5rem 4rem;
    position: relative;
    z-index: 2;
}

.projects-section h1 {
    font-weight: 900;
    font-size: 3rem;
    margin-bottom: 1rem;
    background: linear-gradient(90deg, #ffd700, #ffed4e, #fff);
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 3s linear infinite, fadeInDown 0.8s ease-out;
}

@keyframes shine {
    to { background-position: 200% center; }
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.projects-section p.lead {
    color: rgba(255, 255, 255, 0.95);
    max-width: 750px;
    margin: 0 auto 3rem;
    font-size: 1.2rem;
    line-height: 1.8;
    animation: fadeInUp 0.8s ease-out 0.2s both;
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

/* ===== CONTENT SECTION ===== */
.projects-content {
    background: linear-gradient(135deg, #4a00e0 0%, #8e2de2 100%);
    padding: 5rem 0;
    position: relative;
}

.projects-content::before {
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

/* ===== GRID PROYEK ===== */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 35px;
    max-width: 1200px;
    width: 100%;
    margin: 0 auto 4rem;
    padding: 0 1.5rem;
    position: relative;
    z-index: 2;
}

/* ===== PROJECT CARD ===== */
.project-card {
    max-width: 450px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
}

.project-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 16px 48px rgba(0, 242, 254, 0.3);
    border-color: rgba(0, 242, 254, 0.3);
}

/* Container gambar dengan rasio 16:9 */
.project-image-container {
    width: 100%;
    height: 0;
    padding-bottom: 56.25%;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
}

.project-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease;
}

.project-card:hover .project-image {
    transform: scale(1.1);
}

/* ===== PROJECT INFO ===== */
.project-info {
    padding: 2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.project-info h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #fff;
    margin: 0 0 1rem 0;
    line-height: 1.3;
}

.project-info p {
    color: rgba(255, 255, 255, 0.85);
    font-size: 1rem;
    margin-bottom: 1.5rem;
    line-height: 1.7;
    flex: 1;
}

/* ===== TECH STACK BADGES ===== */
.project-tech-stack {
    margin-bottom: 1.5rem;
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.tech-badge {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
    color: #fff;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.tech-badge:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.25);
}

.badge-flutter { background: linear-gradient(135deg, #02569B, #027DFD); }
.badge-dart { background: linear-gradient(135deg, #0175C2, #13B9FD); }
.badge-firebase { background: linear-gradient(135deg, #FFCA28, #FFA000); color: #1a1a2e; }
.badge-laravel { background: linear-gradient(135deg, #FF2D20, #F05340); }
.badge-vue { background: linear-gradient(135deg, #41B883, #35495E); }

/* ===== SOURCE CODE BUTTON ===== */
.source-code-btn {
    display: inline-block;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 12px 24px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.source-code-btn:hover {
    background: linear-gradient(135deg, #764ba2, #667eea);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
    color: white;
}

.source-code-btn i {
    margin-right: 8px;
}

/* ===== GITHUB BUTTON ===== */
.github-btn-wrapper {
    text-align: center;
    margin: 3rem 0 4rem;
    position: relative;
    z-index: 2;
}

.project-btn {
    display: inline-block;
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    padding: 14px 36px;
    border-radius: 50px;
    color: #1a1a2e;
    text-decoration: none;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
}

.project-btn:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 25px rgba(255, 215, 0, 0.6);
    color: #1a1a2e;
}

/* ===== CERTIFICATIONS SECTION ===== */
.certifications-section {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #c44569 100%);
    padding: 5rem 0;
    position: relative;
}

.certifications-section::before {
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

.certifications-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
    position: relative;
    z-index: 2;
}

.section-title {
    font-weight: 900;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    background: linear-gradient(90deg, #ffd700, #ffed4e, #fff);
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    animation: shine 3s linear infinite;
}

.section-description {
    color: rgba(255, 255, 255, 0.95);
    text-align: center;
    max-width: 700px;
    margin: 0 auto 3rem;
    font-size: 1.1rem;
    line-height: 1.7;
}

/* ===== CERTIFICATIONS GRID ===== */
.certifications-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-bottom: 3rem;
}

/* ===== CERTIFICATE CARD ===== */
.cert-card {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    gap: 1.5rem;
    align-items: flex-start;
}

.cert-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 48px rgba(255, 215, 0, 0.3);
    border-color: rgba(255, 215, 0, 0.3);
}

.cert-icon {
    font-size: 3rem;
    flex-shrink: 0;
    filter: drop-shadow(0 4px 8px rgba(255, 215, 0, 0.4));
}

.cert-info {
    flex: 1;
}

.cert-info h3 {
    font-size: 1.4rem;
    font-weight: 700;
    color: #fff;
    margin: 0 0 0.5rem 0;
    line-height: 1.3;
}

.cert-issuer {
    color: #ffd700;
    font-weight: 600;
    font-size: 0.95rem;
    margin: 0 0 1rem 0;
}

.cert-description {
    color: rgba(255, 255, 255, 0.85);
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0 0 1.5rem 0;
}

.cert-btn {
    display: inline-block;
    background: linear-gradient(135deg, #ffd700, #ffed4e);
    color: #1a1a2e;
    padding: 10px 24px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
}

.cert-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(255, 215, 0, 0.6);
    background: linear-gradient(135deg, #ffed4e, #ffd700);
    color: #1a1a2e;
}

.cert-btn i {
    margin-right: 6px;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 992px) {
    .projects-section h1 {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .projects-hero {
        padding: 4rem 0 2rem;
    }
    
    .projects-section {
        padding: 2rem 1rem 3rem;
    }
    
    .projects-section h1 {
        font-size: 2rem;
    }
    
    .projects-section p.lead {
        font-size: 1rem;
    }
    
    .projects-content,
    .certifications-section {
        padding: 4rem 0;
    }
    
    .projects-grid,
    .certifications-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .project-image-container {
        padding-bottom: 60%;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .cert-card {
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 1.5rem;
    }
    
    .cert-icon {
        font-size: 2.5rem;
    }
}

@media (max-width: 480px) {
    .projects-section h1 {
        font-size: 1.6rem;
    }
    
    .projects-section p.lead {
        font-size: 0.95rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .project-info,
    .cert-card {
        padding: 1.5rem;
    }
    
    .project-btn {
        padding: 12px 28px;
        font-size: 1rem;
    }
}
</style>
@endpush

@section('content')

<!-- Projects Hero -->
<div class="projects-hero">
    <div class="projects-section">
        <h1>My Work 💼</h1>
        <p class="lead">
            Berikut beberapa proyek yang telah saya kerjakan — menampilkan integrasi teknologi modern dan hasil yang fungsional.
        </p>
    </div>
</div>

<!-- Projects Content -->
<div class="projects-content">
    <div class="projects-grid">
        
        <!-- ============================================ -->
        <!-- PROJECT CARD 1 - Aplikasi Biofir -->
        <!-- ============================================ -->
        <div class="project-card">
            <div class="project-image-container">
                <!-- Ganti path gambar sesuai lokasi file Anda -->
                <img src="{{ asset('images/Gambar 1.jpg') }}" alt="Aplikasi Penjualan Gelang Biofir" class="project-image">
            </div>
            <div class="project-info">
                <!-- Judul Project (bisa pakai emoji untuk visual appeal) -->
                <h3>💎 Aplikasi Penjualan Biofir (Flutter)</h3>
                
                <!-- Tech Stack Badges - Tambahkan sesuai teknologi yang dipakai -->
                <div class="project-tech-stack">
                    <span class="tech-badge badge-flutter">Flutter</span>
                    <span class="tech-badge badge-dart">Dart</span>
                    <span class="tech-badge badge-firebase">Firebase (Auth, DB)</span>
                    <!-- Contoh badge lain yang bisa ditambahkan:
                    <span class="tech-badge badge-laravel">Laravel</span>
                    <span class="tech-badge badge-vue">Vue.js</span>
                    <span class="tech-badge">PHP</span>
                    <span class="tech-badge">MySQL</span>
                    -->
                </div>

                <!-- Deskripsi Project -->
                <p>
                    Aplikasi mobile E-commerce full-featured yang saya kembangkan dari nol. Solusi ini mencakup dua ekosistem terpisah: Panel Admin (CRUD Produk) dan User App yang menghadirkan produk Biofir, sistem Membership, Testimoni, dan integrasi penuh hingga tahap Checkout.
                </p>

                <!-- Link ke Source Code -->
                <a href="https://github.com/dailam008/Project_Perangkat_Lunak.git" target="_blank" class="source-code-btn">
                    <i class="fab fa-github"></i> Source Code
                </a>
            </div>
        </div>
        
        <!-- ============================================ -->
        <!-- PROJECT CARD 2 - Tambahkan Project Baru di Sini -->
        <!-- ============================================ -->
        <!-- CARA MENAMBAH PROJECT BARU:
             1. Copy seluruh block <div class="project-card"> sampai </div> penutupnya
             2. Paste di bawah project sebelumnya
             3. Ganti gambar di asset('images/...')
             4. Ubah judul project di <h3>
             5. Update tech badges sesuai teknologi yang dipakai
             6. Tulis deskripsi project di <p>
             7. Ganti link GitHub di href="..."
        -->
        
        <!-- CONTOH Template Project Card Baru (Hapus komentar untuk menggunakan):
        
        <div class="project-card">
            <div class="project-image-container">
                <img src="{{ asset('images/project2.jpg') }}" alt="Nama Project 2" class="project-image">
            </div>
            <div class="project-info">
                <h3>🚀 Judul Project Kedua</h3>
                
                <div class="project-tech-stack">
                    <span class="tech-badge badge-laravel">Laravel</span>
                    <span class="tech-badge badge-vue">Vue.js</span>
                    <span class="tech-badge">MySQL</span>
                </div>

                <p>
                    Deskripsi singkat tentang project kedua Anda. Jelaskan fitur utama, 
                    teknologi yang digunakan, dan hasil yang dicapai.
                </p>

                <a href="https://github.com/username/repo" target="_blank" class="source-code-btn">
                    <i class="fab fa-github"></i> Source Code
                </a>
            </div>
        </div>
        
        -->
        
    </div>
    
    <div class="github-btn-wrapper">
        <a href="https://github.com/dailam008" target="_blank" class="project-btn">
            🔗 Lihat Semua Repository GitHub
        </a>
    </div>
</div>

<!-- Certifications Section -->
<div class="certifications-section">
    <div class="certifications-content">
        <h2 class="section-title">🏆 Certifications & Achievements</h2>
        <p class="section-description">
            Sertifikat dan pencapaian yang telah saya raih selama perjalanan akademik dan profesional.
        </p>

        <div class="certifications-grid">
            
            <!-- ============================================ -->
            <!-- CERTIFICATE CARD 1 - Contoh Sertifikat -->
            <!-- ============================================ -->
            <div class="cert-card">
                <div class="cert-icon">
                    ⭐
                </div>
                <div class="cert-info">
                    <!-- Nama Sertifikat -->
                    <h3>TAHSIN DESIGN</h3>
                    
                    <!-- Penerbit/Organisasi -->
                    <p class="cert-issuer">TFK DESIGNER • 2025</p>
                    
                    <!-- Deskripsi Singkat (Opsional) -->
                    <p class="cert-description">
                        Pelatiahan Belajar Figma Dasar Part 1.
                    </p>
                    
                    <!-- Tombol Lihat Sertifikat -->
                    <a href="{{ asset('certificates/cert1.pdf') }}" target="_blank" class="cert-btn">
                        <i class="fas fa-file-pdf"></i> Lihat Sertifikat
                    </a>
                    
                </div>
            </div>

            <div class="cert-card">
                <div class="cert-icon">
                    📜
                </div>
                <div class="cert-info">
                    <!-- Nama Sertifikat -->
                    <h3>Achievements Azure</h3>
                    
                    <!-- Penerbit/Organisasi -->
                    <p class="cert-issuer">Microsoft • 2025</p>
                    
                    <!-- Deskripsi Singkat (Opsional) -->
                    <p class="cert-description">
                        Purchase Azure savings plan for compute
                    </p>
                    
                    <!-- Tombol Lihat Sertifikat -->
                    <a href="{{ asset('certificates/cert2.pdf') }}" target="_blank" class="cert-btn">
                        <i class="fas fa-file-pdf"></i> Lihat Sertifikat
                    </a>
                    
                </div>

            </div>

                        <div class="cert-card">
                <div class="cert-icon">
                    🎓
                </div>
                <div class="cert-info">
                    <!-- Nama Sertifikat -->
                    <h3>CERTIFICATE DevOps</h3>
                    
                    <!-- Penerbit/Organisasi -->
                    <p class="cert-issuer">IntelliPaat • 2025</p>
                    
                    <!-- Deskripsi Singkat (Opsional) -->
                    <p class="cert-description">
                        Free DevOps Course Certifications
                    </p>
                    
                    <!-- Tombol Lihat Sertifikat -->
                    <!-- PILIHAN 1: Dari folder public/certificates/ (Lokal) -->
                    <a href="{{ asset('certificates/cert3.pdf') }}" target="_blank" class="cert-btn">
                        <i class="fas fa-file-pdf"></i> Lihat Sertifikat
                    </a>
                    
                </div>
            </div>

            <div class="cert-card">
                <div class="cert-icon">
                    🥇
                </div>
                <div class="cert-info">
                    <!-- Nama Sertifikat -->
                    <h3>Prestasi Maju Indonesia</h3>
                    
                    <!-- Penerbit/Organisasi -->
                    <p class="cert-issuer">Festival Sains Nasional • 2024</p>
                    
                    <!-- Deskripsi Singkat (Opsional) -->
                    <p class="cert-description">
                        Mendapatkan Mendali Emas di Bidang Bahasa Indonesia
                    </p>
                    
                    <!-- Tombol Lihat Sertifikat -->
                    <!-- PILIHAN 1: Dari folder public/certificates/ (Lokal) -->
                    <a href="{{ asset('certificates/cert4.pdf') }}" target="_blank" class="cert-btn">
                        <i class="fas fa-file-pdf"></i> Lihat Sertifikat
                    </a>
                    
                </div>
            </div>

            <!-- ============================================ -->
            <!-- CERTIFICATE CARD 2 - Tambahkan Sertifikat Lain di Sini -->
            <!-- ============================================ -->
            <!-- CARA MENAMBAH SERTIFIKAT BARU:
                 1. Copy seluruh block <div class="cert-card"> sampai </div> penutupnya
                 2. Paste di bawah sertifikat sebelumnya
                 3. Ganti emoji icon (📜, 🎓, 🏅, 🥇, ⭐, 💼, dll)
                 4. Ubah nama sertifikat di <h3>
                 5. Update penerbit dan tahun di <p class="cert-issuer">
                 6. Tulis deskripsi singkat (opsional)
                 7. PILIH SALAH SATU:
                    a. Lokal: {{ asset('certificates/nama-file.pdf') }}
                    b. Online: https://drive.google.com/... atau link lainnya
                 
                 TIPS UPLOAD PDF:
                 - Letakkan file PDF di folder: public/certificates/
                 - Atau upload ke Google Drive/Dropbox dan pakai link share-nya
                 - Pastikan nama file sesuai dengan yang di code
            -->

        </div>
    </div>
</div>

@endsection