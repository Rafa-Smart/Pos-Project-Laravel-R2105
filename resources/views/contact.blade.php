@extends('templates.layout')

@section('title', 'Contact Page')

@section('content')

<style>
    .contact-wrapper {
        max-width: 800px;
        margin: 0 auto;
        animation: fadeUp 0.6s ease;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .contact-card {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 18px;
        padding: 35px;
        box-shadow: 0 12px 35px rgba(0,0,0,0.15);
        transition: 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.25);
    }

    .contact-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .contact-header-icon {
        width: 48px;
        height: 48px;
        color: #4e73df;
    }

    .contact-title {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #2d2d2d;
    }

    .contact-list {
        list-style: none;
        padding: 0;
        margin-top: 15px;
    }

    .contact-list li {
        font-size: 18px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(0,0,0,0.07);
    }

    .contact-list li:last-child {
        border-bottom: none;
    }

    .contact-icon-small {
        font-size: 22px;
        opacity: 0.85;
        color: #4e73df;
    }
</style>

<div class="contact-wrapper">
    <div class="contact-card">

        <!-- Header -->
        <div class="contact-header">
            <svg class="contact-header-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M2 3a1 1 0 0 1 1-1h3.18a1 1 0 0 1 .707.293l2.12 2.121A3 3 0 0 0 10.828 5H20a1 1 0 0 1 1 1v11.985a1 1 0 0 1-.883.993l-7.534.754a3 3 0 0 0-2.42 1.676l-.854 1.707A1 1 0 0 1 8.42 23H3a1 1 0 0 1-1-1z"/>
            </svg>
            <h3 class="contact-title">Kontak Kami</h3>
        </div>

        <p class="text-muted mb-3">Silakan hubungi kami melalui informasi berikut:</p>

        <!-- Contact List -->
        <ul class="contact-list">

            <li>
                <i class="bi bi-envelope contact-icon-small"></i>
                <strong>Email:</strong> admin@pos.com
            </li>

            <li>
                <i class="bi bi-telephone contact-icon-small"></i>
                <strong>Telepon:</strong> +62 812-3456-7890
            </li>

            <li>
                <i class="bi bi-geo-alt contact-icon-small"></i>
                <strong>Alamat:</strong> Jl. Sukses No. 123
            </li>

        </ul>

    </div>
</div>

@endsection
