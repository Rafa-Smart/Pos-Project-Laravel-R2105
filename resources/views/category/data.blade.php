<style>
    /* Global Card Styling (Consistent with Customer List) */
    .category-card {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background-color: #ffffff;
        border: none;
        margin-top: 20px;
    }

    /* Header Styling */
    .category-header {
        background-color: #4A90E2; /* Biru yang profesional */
        color: #fff;
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: none;
    }

    .category-title {
        font-weight: 700;
        margin-bottom: 0;
        font-size: 1.5rem;
    }

    /* Add Button Styling */
    .add-category-btn {
        background-color: #fff;
        color: #4A90E2;
        border: none;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 8px;
        transition: background-color 0.2s, transform 0.2s;
    }

    .add-category-btn:hover {
        background-color: #f0f8ff;
        color: #357ABD;
        transform: translateY(-1px);
    }

    /* Table Styling */
    .category-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .category-table thead th {
        font-weight: 700;
        color: #555;
        background-color: #F8F9FA; /* Header tabel yang netral dan bersih */
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding: 15px 12px;
        border-bottom: 2px solid #E9ECEF;
    }

    .category-table tbody tr {
        border-bottom: 1px solid #E9ECEF;
        transition: background-color .3s ease;
    }

    .category-table tbody tr:hover {
        background-color: #E6F0FF !important; /* Efek hover yang lebih jelas */
    }

    .category-table td {
        padding: 14px 12px;
        color: #333;
        vertical-align: middle;
    }

    /* Action Buttons */
    .action-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .action-group .btn {
        font-size: 0.8rem;
        padding: 6px 10px;
        border-radius: 6px;
        font-weight: 500;
    }
</style>
<div class="card category-card">
    <div class="category-header">
        <h3 class="category-title">🏷️ Daftar Kategori Produk</h3>
        <a href="{{ route('category.create') }}" class="btn add-category-btn">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table category-table align-middle text-center mb-0">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th class="text-start">Nama Kategori</th>
                        <th class="text-start">Deskripsi</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $ct)
                    <tr>
                        <td>{{ $ct->id }}</td>
                        <td class="text-start fw-bold">{{ $ct->name }}</td>
                        <td class="text-start text-muted">{{ $ct->description}}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('category.edit', $ct->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('category.destroy', $ct->id) }}" method="POST" style="display:inline"
                                    onsubmit="return confirm('Yakin mau hapus category {{ $ct->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>