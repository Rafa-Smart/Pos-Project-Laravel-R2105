<style>
    /* Global Card Reset and Modernization */
    .modern-card {
        border-radius: 16px; /* Lebih membulat */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Shadow yang lebih dalam dan lembut */
        overflow: hidden;
        background-color: #ffffff;
        border: none;
    }

    /* Header Styling - Menggunakan warna primer yang menarik */
    .modern-card-header {
        background-color: #4A90E2; /* Biru yang lebih cerah dan profesional */
        color: #fff;
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: none;
    }

    .modern-card-title {
        font-weight: 700;
        margin-bottom: 0;
        font-size: 1.5rem;
    }

    .add-btn {
        background-color: #fff;
        color: #4A90E2;
        border: none;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 8px;
        transition: background-color 0.2s, transform 0.2s;
    }

    .add-btn:hover {
        background-color: #f0f8ff;
        color: #357ABD;
        transform: translateY(-1px);
    }

    /* Table Styling */
    .modern-table {
        width: 100%;
        border-collapse: separate; /* Menggunakan border-radius pada sel */
        border-spacing: 0;
    }

    .modern-table thead th {
        font-weight: 700;
        color: #555;
        background-color: #F8F9FA; /* Header tabel yang netral dan bersih */
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        padding: 15px 12px;
        border-bottom: 2px solid #E9ECEF;
    }

    .modern-table tbody tr {
        border-bottom: 1px solid #E9ECEF;
        transition: background-color .3s ease;
    }

    .modern-table tbody tr:hover {
        background-color: #E6F0FF !important; /* Efek hover yang lebih jelas */
    }

    .modern-table td {
        padding: 14px 12px;
        color: #333;
    }

    /* Badge Styling */
    .status-badge {
        font-size: 0.8rem;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 20px; /* Bentuk pil (pill shape) */
        min-width: 100px; /* Lebar minimum untuk konsistensi */
        display: inline-block;
        text-align: center;
    }

    /* Warna Status Badge */
    .status-member {
        background-color: #E6FFFA;
        color: #38A169;
    }

    .status-non-member {
        background-color: #FEEBCF;
        color: #D69E2E;
    }

    /* Action Buttons */
    .action-btn-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .action-btn-group .btn {
        font-size: 0.8rem;
        padding: 6px 10px;
        border-radius: 6px;
        font-weight: 500;
    }
</style>

<div class="card modern-card">
  <div class="modern-card-header">
    <h3 class="modern-card-title">Daftar Pelanggan 👥</h3>
    <a href="{{ route('customer.create') }}" class="btn add-btn">
      <i class="fas fa-plus"></i> Tambah Pelanggan
    </a>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table modern-table align-middle text-center mb-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $c)
          <tr>
            <td>{{ $c->id }}</td>
            <td class="text-start fw-bold">{{ $c->name }}</td>
            <td class="text-start">{{ $c->email }}</td>
            <td class="text-start text-muted">{{ $c->address }}</td>
            <td>{{ $c->phone_number }}</td>
            <td>
              <span class="status-badge {{ $c->status == 1 ? 'status-member' : 'status-non-member' }}">
                {{ $c->status == 1 ? 'Member Aktif' : 'Non-Member' }}
              </span>
            </td>
            <td>
              <div class="action-btn-group">
                <a href="{{ route('customer.edit', $c->id) }}" class="btn btn-sm btn-outline-primary">
                  Edit
                </a>

                <form action="{{ route('customer.destroy', $c->id) }}" method="POST"
                  onsubmit="return confirm('Yakin mau hapus customer {{ $c->name }}?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
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