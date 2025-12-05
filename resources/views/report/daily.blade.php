@extends('templates.layout')

@section('title', 'Daily Report Page')

@section('content')
<style>
    /* Custom Styles for Modern Report Card */
    .report-card {
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1); /* Shadow yang lebih dalam */
        overflow: hidden;
        border: none;
    }

    .report-title-section {
        background-color: #4A90E2; /* Warna primer konsisten */
        color: #fff;
        padding: 25px;
        border-radius: 16px 16px 0 0;
    }

    .report-title {
        font-weight: 700;
        margin-bottom: 0;
        font-size: 1.8rem;
    }

    /* Kuantitas Metrics (Infoboxes) */
    .metric-box {
        padding: 20px;
        border-radius: 12px;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        transition: transform 0.2s;
    }

    .metric-box h6 {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 5px;
        text-transform: uppercase;
    }

    .metric-box h5 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    /* Table Styling (Consistent with Previous Tables) */
    .report-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .report-table thead th {
        font-weight: 700;
        color: #555;
        background-color: #F8F9FA;
        text-transform: uppercase;
        font-size: 0.8rem;
        padding: 12px 10px;
        border-bottom: 2px solid #E9ECEF;
    }

    .report-table tbody tr:hover {
        background-color: #E6F0FF !important;
        transition: background-color .3s ease;
    }

    .report-table td {
        padding: 10px 10px;
        color: #333;
        vertical-align: middle;
    }

    .btn-print {
        background-color: #4A90E2;
        border-color: #4A90E2;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.2s;
    }

    .btn-print:hover {
        background-color: #357ABD;
    }

    /* Print Specific Styles */
    @media print {
        body * {
            visibility: hidden;
        }
        .report-card, .report-card * {
            visibility: visible !important;
        }
        .report-card {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            box-shadow: none !important;
            border: none !important;
        }
        .report-title-section {
            background-color: #ccc !important;
            -webkit-print-color-adjust: exact;
            color: #333 !important;
        }
        .report-table thead th {
            background-color: #f0f0f0 !important;
            -webkit-print-color-adjust: exact;
        }
    }
</style>

<div class="container mt-4">
    <div class="card report-card">
        <div class="report-title-section">
            <h3 class="report-title">📅 Laporan Penjualan Harian</h3>
            <p class="mb-0 fs-5">Tanggal: **{{ $date }}**</p>
        </div>
        
        <div class="card-body">
            
            <div class="row g-3 text-center mb-5">
                <div class="col-md-4">
                    <div class="metric-box shadow-sm">
                        <h6>Total Transaksi</h6>
                        <h5 class="fw-bold text-primary">{{ $totalOrders }} Order</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric-box shadow-sm">
                        <h6>Total Produk Terjual</h6>
                        <h5 class="fw-bold text-info">{{ $totalItems }} Pcs</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric-box shadow-sm">
                        <h6>Pendapatan Kotor</h6>
                        <h5 class="fw-bold text-success">Rp {{ number_format($totalSales, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>

            <h5 class="mb-3 fw-bold text-primary">Detail Transaksi</h5>

            <div class="table-responsive">
                <table class="table table-striped align-middle text-center report-table">
                    <thead>
                        <tr>
                            <th width="50">NO</th>
                            <th>Invoice</th>
                            <th class="text-start">Pelanggan</th>
                            <th width="150">Total</th>
                            <th width="100">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $i => $order)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td class="fw-bold">{{ $order->invoice }}</td>
                                <td class="text-start">{{ $order->customer->name ?? 'Umum (Non Member)' }}</td>
                                <td class="fw-bold text-success">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td>{{ $order->created_at->format('H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Tidak ada transaksi yang tercatat pada tanggal ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-end">
                <button id="print-now" class="btn btn-primary btn-print">
                    <i class="fas fa-print"></i> Cetak Laporan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    /**
     * Fungsi untuk mencetak hanya konten di dalam .report-card.
     * Menggunakan pendekatan window.open dan inject CSS untuk kontrol print yang lebih baik.
     */
    function printCardOnly() {
        const card = document.querySelector('.report-card').cloneNode(true);
        
        // 1. Hapus tombol dari konten yang akan dicetak
        const btns = card.querySelectorAll('#print-now');
        btns.forEach(b => b.remove());
        
        // 2. Ambil semua style dari dokumen (termasuk Bootstrap dan custom styles)
        const styles = Array.from(document.styleSheets)
            .map(sheet => {
                try {
                    // Hanya ambil CSS rules yang dapat diakses (hindari CORS issues)
                    return Array.from(sheet.cssRules).map(rule => rule.cssText).join('');
                } catch(e) {
                    return ''; // Abaikan stylesheet yang tidak bisa diakses
                }
            })
            .join('');

        // 3. Buat jendela baru untuk proses cetak
        const printWindow = window.open('', '_blank', 'width=900,height=700');
        printWindow.document.write(`
            <html>
                <head>
                    <title>Laporan Penjualan {{ $date }}</title>
                    <style>
                        /* Inject semua CSS yang diambil */
                        ${styles}
                        
                        /* Tambahan CSS khusus cetak */
                        body { margin: 0; padding: 20px; }
                        .report-card { box-shadow: none !important; border: none !important; }
                        .report-title-section { 
                            background-color: #E9ECEF !important; 
                            color: #333 !important;
                            -webkit-print-color-adjust: exact; /* Paksa cetak warna latar */
                            print-color-adjust: exact;
                        }
                        .report-table thead th {
                            background-color: #f0f0f0 !important;
                            -webkit-print-color-adjust: exact;
                            print-color-adjust: exact;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">${card.outerHTML}</div>
                </body>
            </html>
        `);
        printWindow.document.close();

        // 4. Panggil fungsi cetak setelah konten dimuat
        printWindow.addEventListener('load', function() {
            printWindow.focus();
            printWindow.print();
            // Berikan sedikit jeda sebelum menutup, untuk memastikan cetak selesai
            setTimeout(() => printWindow.close(), 500); 
        });
    }

    // Event Listener untuk tombol cetak
    document.getElementById('print-now').addEventListener('click', printCardOnly);
</script>
@endpush