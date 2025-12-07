@extends('layouts.app')

@section('title', 'Contact')

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

    /* ===== CONTACT HERO SECTION ===== */
    .contact-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .contact-hero::before {
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

    /* ===== PAGE TITLE ===== */
    .page-title {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
        z-index: 2;
        animation: fadeInDown 0.8s ease-out;
    }

    .page-title h1 {
        font-weight: 900;
        font-size: 3rem;
        background: linear-gradient(90deg, #ffd700, #ffed4e, #fff);
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    .page-title p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
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

    /* ===== CONTACT FORM ===== */
    .contact-form-wrapper {
        max-width: 650px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
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

    .contact-form-wrapper h4 {
        text-align: center;
        font-weight: 800;
        font-size: 1.8rem;
        color: #fff;
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-control,
    .form-select {
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        padding: 12px 20px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: #ffd700;
        box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        color: #fff;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-select option {
        background: #2a2a3e;
        color: #fff;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    /* ===== SUBMIT BUTTON ===== */
    .btn-submit {
        background: linear-gradient(135deg, #ffd700, #ffed4e);
        color: #1a1a2e;
        padding: 14px 0;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
        cursor: pointer;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.6);
        background: linear-gradient(135deg, #ffed4e, #ffd700);
    }

    .btn-submit:active {
        transform: translateY(-1px);
    }

    /* ===== SOCIAL LINKS ===== */
    .social-info {
        margin-top: 3rem;
        text-align: center;
        position: relative;
        z-index: 2;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .social-info h5 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 1.5rem;
        font-size: 1.3rem;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .social-links a {
        width: 60px;
        height: 60px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
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
    @media (max-width: 768px) {
        .contact-hero {
            padding: 4rem 1.5rem;
        }

        .page-title h1 {
            font-size: 2.2rem;
        }

        .page-title p {
            font-size: 1rem;
        }

        .contact-form-wrapper {
            padding: 0 1rem;
        }

        .contact-form-wrapper h4 {
            font-size: 1.5rem;
        }

        .glass-card {
            padding: 2rem;
        }

        .form-control,
        .form-select {
            padding: 10px 16px;
            font-size: 0.95rem;
        }

        .btn-submit {
            padding: 12px 0;
            font-size: 1rem;
        }

        .social-links a {
            width: 55px;
            height: 55px;
            font-size: 1.3rem;
        }
    }

    @media (max-width: 480px) {
        .page-title h1 {
            font-size: 1.8rem;
        }

        .contact-form-wrapper h4 {
            font-size: 1.3rem;
        }
    }
</style>
@endpush

@section('content')
<section class="contact-hero">
    <div class="container">
        <!-- Page Title -->
        <div class="page-title">
            <h1>Kontak Saya 📬</h1>
            <p>Pilih cara menghubungi saya dan alasan menghubungi</p>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper">
            <div class="glass-card">
                <h4>Hubungi Saya</h4>
                <form id="contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="bi bi-person-fill me-2"></i>Nama
                        </label>
                        <input type="text" 
                               id="name" 
                               class="form-control rounded-pill" 
                               placeholder="Masukkan nama Anda" 
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="platform" class="form-label">
                            <i class="bi bi-chat-dots-fill me-2"></i>Pilih Platform
                        </label>
                        <select id="platform" class="form-select rounded-pill" required>
                            <option value="" disabled selected>Pilih platform...</option>
                            <option value="whatsapp">💬 WhatsApp</option>
                            <option value="instagram">📷 Instagram</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="reason" class="form-label">
                            <i class="bi bi-question-circle-fill me-2"></i>Alasan Menghubungi
                        </label>
                        <select id="reason" class="form-select rounded-pill" required>
                            <option value="" disabled selected>Pilih alasan...</option>
                            <option value="Pertanyaan">❓ Pertanyaan</option>
                            <option value="Kerjasama">🤝 Kerjasama</option>
                            <option value="Project">💼 Project</option>
                            <option value="Konsultasi">💡 Konsultasi</option>
                            <option value="Lainnya">📝 Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label">
                            <i class="bi bi-envelope-fill me-2"></i>Pesan (opsional)
                        </label>
                        <textarea id="message" 
                                  class="form-control rounded-4" 
                                  rows="4" 
                                  placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="bi bi-send-fill me-2"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- Social Links -->
        <div class="social-info">
            <h5>Atau hubungi saya langsung di:</h5>
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
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value.trim();
    const platform = document.getElementById('platform').value;
    const reason = document.getElementById('reason').value;
    const message = document.getElementById('message').value.trim();

    if(!name || !platform || !reason){
        alert('⚠️ Harap isi semua kolom yang wajib.');
        return;
    }

    let finalMessage = `Halo, saya ${encodeURIComponent(name)}.%0AAlasan: ${encodeURIComponent(reason)}`;
    if(message) finalMessage += `%0A%0APesan: ${encodeURIComponent(message)}`;

    if(platform === 'whatsapp'){
        const waNumber = '6289618418569';
        const waLink = `https://wa.me/${waNumber}?text=${finalMessage}`;
        window.open(waLink, '_blank');
    } else if(platform === 'instagram'){
        const instaUsername = 'dailammhb';
        const decodedMessage = decodeURIComponent(finalMessage.replace(/%0A/g,'\n'));
        alert(`📱 Silakan kirim pesan via Instagram: @${instaUsername}\n\n📝 Gunakan pesan berikut:\n${decodedMessage}`);
        window.open(`https://instagram.com/${instaUsername}`, '_blank');
    }
});
</script>
@endsection