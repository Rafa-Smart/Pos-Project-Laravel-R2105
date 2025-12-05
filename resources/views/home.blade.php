@extends('templates.layout')

@section('title', 'Home Page')

@section('content')

<style>
    /* ====== GLOBAL STYLE ====== */
    .dashboard-wrapper {
        animation: fadeIn 0.7s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ===== WELCOME CARD ===== */
    .welcome-card {
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        border-radius: 18px;
        padding: 32px;
        color: white;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    /* ===== STATISTIC CARD (GLASS STYLE) ===== */
    .stat-card {
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        background: rgba(255, 255, 255, 0.2);
        border-radius: 18px;
        padding: 22px;
        color: #fff;
        min-height: 150px;
        position: relative;
        overflow: hidden;
        transition: 0.3s ease;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.18);
    }

    .stat-card-icon {
        position: absolute;
        right: -15px;
        bottom: -15px;
        opacity: 0.25;
        width: 90px;
        height: 90px;
    }

    .stat-title {
        font-size: 19px;
        font-weight: 600;
        margin-top: 4px;
        opacity: 0.9;
    }

    .stat-value {
        font-size: 42px;
        font-weight: 700;
        margin: 0;
    }

    .stat-link {
        display: inline-block;
        margin-top: 8px;
        font-weight: 500;
        text-decoration: none;
        color: #fff;
        opacity: 0.85;
        transition: 0.3s;
    }

    .stat-link:hover {
        opacity: 1;
        text-decoration: underline;
    }

</style>

<div class="container-fluid dashboard-wrapper">

  {{-- SUCCESS MESSAGE --}}
  @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- ERROR VALIDATION --}}
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif


  <!-- ===== WELCOME CARD ===== -->
  <div class="row mb-4">
      <div class="col-12">
          <div class="welcome-card">
              <h2 class="fw-bold mb-1">Selamat Datang di Aplikasi POS</h2>
              <p class="mb-0">Kelola produk, pelanggan, dan kategori dengan mudah menggunakan dashboard modern ini.</p>
          </div>
      </div>
  </div>


  <!-- ===== STATISTIC CARDS ===== -->
  <div class="row g-4">

      {{-- Pelanggan --}}
      <div class="col-lg-3 col-md-6">
          <div class="stat-card" style="background: linear-gradient(135deg, #ff416c, #ff4b2b);">
              <h3 class="stat-value">{{ $jumlah_pelanggan ?? 0 }}</h3>
              <p class="stat-title">Jumlah Pelanggan</p>
              <a href="/customer" class="stat-link">Lihat Pelanggan →</a>
              <svg class="stat-card-icon" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1z"/>
              </svg>
          </div>
      </div>

      {{-- Kategori --}}
      <div class="col-lg-3 col-md-6">
        <div class="stat-card" style="background: linear-gradient(135deg, #ffb347, #ffcc33);">
            <h3 class="stat-value">{{ $jumlah_kategori ?? 0 }}</h3>
            <p class="stat-title">Jumlah Kategori</p>
            <a href="/category" class="stat-link text-dark">Lihat Kategori →</a>
            <svg class="stat-card-icon" fill="currentColor" viewBox="0 0 24 24">
              <path d="M3 2v4.586l7 7L14.586 9l-7-7z"/>
            </svg>
        </div>
      </div>

      {{-- Produk --}}
      <div class="col-lg-3 col-md-6">
          <div class="stat-card" style="background: linear-gradient(135deg, #11998e, #38ef7d);">
              <h3 class="stat-value">{{ $jumlah_produk ?? 0 }}</h3>
              <p class="stat-title">Jumlah Produk</p>
              <a href="/product" class="stat-link">Lihat Produk →</a>
              <svg class="stat-card-icon" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404..."/>
              </svg>
          </div>
      </div>

  </div>

</div>

@endsection
