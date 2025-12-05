@extends('templates.layout')

@section('title', 'Edit Produk')

@section('content')

<style>
  /* Wrapper */
  .edit-product-wrapper {
    max-width: 780px;
    margin: 0 auto;
  }

  /* Card */
  .modern-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(12px);
    border-radius: 18px;
    padding: 25px;
    border: 1px solid rgba(200, 200, 200, 0.25);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.4s ease;
  }

  /* Card Header */
  .modern-card-header {
    border-bottom: 1px solid #e9ecef;
    padding-bottom: 12px;
    margin-bottom: 20px;
  }

  .modern-title {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
  }

  /* Input */
  .modern-input, .modern-select {
    border-radius: 10px;
    border: 1px solid #ced4da;
    padding: 10px 14px;
    transition: all 0.25s ease;
  }

  .modern-input:focus,
  .modern-select:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.25);
  }

  /* Buttons */
  .btn-modern-save {
    background-color: #2ecc71;
    border: none;
    padding: 10px 18px;
    border-radius: 12px;
    font-weight: 600;
    transition: 0.25s;
  }

  .btn-modern-save:hover {
    background-color: #27ae60;
    transform: translateY(-2px);
  }

  .btn-modern-cancel {
    background-color: #95a5a6;
    border: none;
    padding: 10px 18px;
    border-radius: 12px;
    font-weight: 600;
    transition: 0.25s;
  }

  .btn-modern-cancel:hover {
    background-color: #7f8c8d;
    transform: translateY(-2px);
  }

  /* Animation */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="edit-product-wrapper">

  <div class="modern-card">

    {{-- Header --}}
    <div class="modern-card-header d-flex justify-content-between align-items-center">
      <h3 class="modern-title">Edit Produk</h3>
      <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    {{-- Error --}}
    @if ($errors->any())
      <div class="alert alert-danger rounded-3">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('product.update', $product->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label fw-bold">Nama Produk</label>
        <input 
          type="text" 
          name="name" 
          class="form-control modern-input"
          value="{{ old('name', $product->name) }}"
          required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Deskripsi</label>
        <input 
          type="text" 
          name="description" 
          class="form-control modern-input"
          value="{{ old('description', $product->description) }}"
          required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Stok</label>
        <input 
          type="number" 
          name="stock" 
          class="form-control modern-input"
          value="{{ old('stock', $product->stock) }}"
          required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Harga</label>
        <input 
          type="number" 
          name="price" 
          class="form-control modern-input"
          value="{{ old('price', $product->price) }}"
          required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Kategori</label>
        <select name="category_id" class="form-select modern-select" required>
          <option value="">-- Pilih Kategori --</option>
          @foreach($category as $k)
            <option 
              value="{{ $k->id }}"
              {{ old('category_id', $product->category_id) == $k->id ? 'selected' : '' }}>
              {{ $k->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn-modern-save">Update Produk</button>
        <a href="{{ route('product.index') }}" class="btn-modern-cancel">Batal</a>
      </div>

    </form>

  </div>
</div>

@endsection
