<style>
    /* Card Styling */
    .modern-card-edit {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        border: none;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        max-width: 600px; /* Batasi lebar form */
        margin: 40px auto;
    }

    .edit-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 25px;
        border-bottom: 3px solid #4A90E2;
        padding-bottom: 10px;
        display: inline-block;
    }

    /* Input/Select Styling */
    .modern-input, .modern-select {
        border-radius: 10px;
        border: 1px solid #ced4da;
        padding: 12px 15px;
        transition: all 0.25s ease;
        background-color: #f8f9fa; /* Latar belakang input yang sedikit abu-abu */
    }

    .modern-input:focus,
    .modern-select:focus {
        border-color: #4A90E2;
        box-shadow: 0 0 0 4px rgba(74,144,226,0.2);
        background-color: #fff;
    }

    /* Form Label */
    .form-label-custom {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    /* Button Styling */
    .btn-action-group {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

    .btn-update {
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 600;
        background-color: #2ecc71;
        border-color: #2ecc71;
        transition: background-color 0.2s;
    }

    .btn-update:hover {
        background-color: #27ae60;
        border-color: #27ae60;
    }

    .btn-cancel {
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 600;
    }

    /* Error Styling */
    .alert-danger {
        border-radius: 10px;
        border-left: 5px solid #e74c3c;
        background-color: #fcebeb;
        color: #c0392b;
    }
</style>

@extends('templates.layout')

@section('content')
<div class="modern-card-edit">
    <h3 class="edit-title">✏️ Edit Kategori</h3>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <h6 class="fw-bold mb-1">Terjadi Kesalahan Validasi:</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label form-label-custom">Nama Kategori</label>
            <input type="text" name="name" class="form-control modern-input" 
                   value="{{ old('name', $category->name) }}" 
                   placeholder="Masukkan nama kategori (misalnya: Minuman, Makanan Ringan)" required>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label form-label-custom">Deskripsi</label>
            <textarea name="description" class="form-control modern-input" rows="3"
                   placeholder="Jelaskan kategori produk ini secara singkat" required>{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="btn-action-group">
            <button type="submit" class="btn btn-success btn-update">
                <i class="fas fa-save"></i> Update Kategori
            </button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary btn-cancel">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection