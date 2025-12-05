@extends('templates.layout')

@section('title', 'About Page')

@section('content')

<style>
    .about-wrapper {
        max-width: 850px;
        margin: 0 auto;
        padding: 10px;
        animation: fadeUp 0.7s ease;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(25px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .about-card {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border-radius: 20px;
        padding: 40px 35px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        transition: 0.3s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .about-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(0,0,0,0.25);
    }

    .about-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .about-header-icon {
        width: 54px;
        height: 54px;
        color: #6c63ff;
    }

    .about-title {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
        color: #2d2d2d;
    }

    .about-description {
        font-size: 19px;
        line-height: 1.7;
        color: #444;
        margin-top: 10px;
    }

    .about-highlight {
        background: linear-gradient(90deg, #6c63ff, #4e9cff);
        color: white;
        padding: 10px 18px;
        display: inline-block;
        border-radius: 12px;
        font-weight: 600;
        margin-top: 15px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        animation: glow 3s infinite alternate ease-in-out;
    }

    @keyframes glow {
        from { box-shadow: 0 0 15px rgba(76, 110, 255, 0.5); }
        to   { box-shadow: 0 0 25px rgba(76, 110, 255, 0.8); }
    }
</style>

<div class="about-wrapper">
    <div class="about-card">

        <!-- Header -->
        <div class="about-header">
            <svg class="about-header-icon" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 15h-2v-2h2Zm0-4h-2V7h2Z"/>
            </svg>
            <h3 class="about-title">Tentang Aplikasi POS</h3>
        </div>

        <!-- Description -->
        <p class="about-description">
            Aplikasi POS ini dikembangkan pada tahun <strong>2025</strong> sebagai solusi modern
            untuk membantu bisnis dalam mengelola data penjualan, pelanggan, produk, dan transaksi
            dengan lebih efektif dan efisien.
        </p>

        <p class="about-description">
            Dengan desain yang sederhana, fitur lengkap, dan pengalaman pengguna yang nyaman,
            aplikasi ini dirancang untuk mendukung operasional bisnis kecil hingga menengah.
        </p>

        <span class="about-highlight">
            Dibangun untuk kecepatan, kemudahan, dan efisiensi.
        </span>

    </div>
</div>

@endsection
