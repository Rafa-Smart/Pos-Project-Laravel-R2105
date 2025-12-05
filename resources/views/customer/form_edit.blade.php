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
    <h3 class="edit-title">✏️ Edit Data Pelanggan</h3>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <h6 class="fw-bold mb-1">Terjadi Kesalahan:</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label form-label-custom">Nama</label>
            <input type="text" name="name" class="form-control modern-input" 
                   value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label form-label-custom">Email</label>
            <input type="email" name="email" class="form-control modern-input" 
                   value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label form-label-custom">Alamat</label>
            <input type="text" name="address" class="form-control modern-input" 
                   value="{{ old('address', $customer->address) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label form-label-custom">No. Telepon</label>
            <input type="text" name="phone_number" class="form-control modern-input" 
                   value="{{ old('phone_number', $customer->phone_number) }}" required>
        </div>

        <div class="mb-4">
            <label for="status" class="form-label form-label-custom">Status</label>
            <select name="status" class="form-select modern-select" required>
                <option value="">-- Pilih Status --</option>
                {{-- Memperbaiki logika old() agar membandingkan nilai 1 atau 0 --}}
                <option value="1" {{ old('status', $customer->status) == 1 ? 'selected' : '' }}>Member</option>
                <option value="0" {{ old('status', $customer->status) == 0 ? 'selected' : '' }}>Non Member</option>
            </select>
        </div>

        <div class="btn-action-group">
            <button type="submit" class="btn btn-update">
                <i class="fas fa-save"></i> Update Data
            </button>
            <a href="{{ route('customer.index') }}" class="btn btn-secondary btn-cancel">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection