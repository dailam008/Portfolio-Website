@extends('layouts.app')

@section('title', 'Contact')

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

    <div class="text-center mb-5 glass-card animate__animated animate__fadeIn">
        <h1 class="fw-bold mb-3 text-primary">Kontak Saya</h1>
        <p class="text-light fs-5">Pilih cara menghubungi saya dan alasan menghubungi:</p>
    </div>

    <div class="mx-auto" style="max-width: 600px;">
        <div class="glass-card animate__animated animate__fadeInUp shadow-lg">
            <h4 class="text-center mb-4 fw-bold">Hubungi Saya</h4>
            <form id="contactForm">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold text-light">Nama</label>
                    <input type="text" id="name" class="form-control rounded-pill" placeholder="Masukkan nama Anda" required>
                </div>

                <div class="mb-3">
                    <label for="platform" class="form-label fw-semibold text-light">Pilih Platform</label>
                    <select id="platform" class="form-select rounded-pill" required>
                        <option value="" disabled selected>Pilih platform...</option>
                        <option value="whatsapp">WhatsApp</option>
                        <option value="instagram">Instagram</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label fw-semibold text-light">Alasan Menghubungi</label>
                    <select id="reason" class="form-select rounded-pill" required>
                        <option value="" disabled selected>Pilih alasan...</option>
                        <option value="Pertanyaan">Pertanyaan</option>
                        <option value="Kerjasama">Kerjasama</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label fw-semibold text-light">Pesan (opsional)</label>
                    <textarea id="message" class="form-control rounded-4" rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold">
                    <i class="bi bi-send"></i> Kirim
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value.trim();
    const platform = document.getElementById('platform').value;
    const reason = document.getElementById('reason').value;
    const message = document.getElementById('message').value.trim();

    if(!name || !platform || !reason){
        alert('Harap isi semua kolom yang wajib.');
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
        alert(`Silakan kirim pesan via Instagram: @${instaUsername}\n\nGunakan pesan berikut:\n${decodeURIComponent(finalMessage.replace(/%0A/g,'\n'))}`);
        window.open(`https://instagram.com/${instaUsername}`, '_blank');
    }
});
</script>
@endsection
