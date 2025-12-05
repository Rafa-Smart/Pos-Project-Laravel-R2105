<div class="product-wrapper">

<style>
    /* Fade Animation */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .product-wrapper {
        animation: fadeUp 0.5s ease;
    }

    /* Card Style */
    .glass-card {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 18px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.15);
        border: 1px solid rgba(255,255,255,0.3);
        overflow: hidden;
        transition: 0.3s;
    }

    .glass-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.25);
    }

    /* Header */
    .glass-header {
        padding: 18px 25px;
        background: linear-gradient(90deg, #4a7eff, #6b4dff);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .glass-header h3 {
        margin: 0;
        font-weight: 700;
    }

    /* Button Primary */
    .btn-modern {
        padding: 7px 14px;
        font-size: 14px;
        border-radius: 10px;
        transition: 0.25s ease;
    }

    .btn-modern-primary {
        background: #ffffff;
        color: #4a5cff;
        border: none;
        font-weight: 600;
    }

    .btn-modern-primary:hover {
        background: #e8e8ff;
        transform: scale(1.05);
    }

    /* Table */
    .modern-table {
        margin: 0;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .modern-table thead tr {
        background: #f3f4ff;
        color: #3640ff;
    }

    .modern-table th {
        padding: 14px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
    }

    .modern-table tbody tr {
        background: white;
        transition: 0.25s ease;
    }

    .modern-table tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .modern-table td {
        padding: 14px;
        vertical-align: middle;
    }

    /* Action buttons */
    .action-btn {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.25s ease;
        border: none;
    }

    .action-edit {
        background: #fff6d4;
        color: #aa8200;
    }

    .action-edit:hover {
        background: #ffe89c;
        transform: scale(1.05);
    }

    .action-delete {
        background: #ffd9d9;
        color: #d60000;
    }

    .action-delete:hover {
        background: #ffb5b5;
        transform: scale(1.05);
    }
</style>

<div class="glass-card">

    <!-- Header -->
    <div class="glass-header">
        <h3>Daftar Produk</h3>
        <a href="{{ route('product.create') }}" class="btn-modern btn-modern-primary">
            + Tambah Produk
        </a>
    </div>

    <!-- Body -->
    <div class="p-3 p-md-4">

        <table class="modern-table table text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                    <td>{{ $p->category->name ?? '-' }}</td>

                    <td>
                        <a href="{{ route('product.edit', $p->id) }}" class="action-btn action-edit">
                            Edit
                        </a>

                        <form action="{{ route('product.destroy', $p->id) }}" method="POST"
                            style="display:inline"
                            onsubmit="return confirm('Yakin mau hapus produk {{ $p->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn action-delete">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

</div>
