<style>
  /* Container styling */
  .invoice-container {
    max-width: 600px;
    margin: auto;
  }

  /* Card Styling */
  .invoice-card {
    border-radius: 14px;
    border: 1px solid #ddd;
    padding: 25px;
    background: #ffffff;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
  }

  /* Header Title */
  .invoice-title {
    font-weight: 700;
    color: #2c3e50;
    border-left: 4px solid #3498db;
    padding-left: 10px;
    font-size: 1.3rem;
  }

  /* Info Box */
  .invoice-info p {
    margin: 2px 0;
    font-size: 0.92rem;
    color: #555;
  }

  /* Table Styling */
  .invoice-table {
    margin-top: 15px;
    border-color: #dcdcdc;
  }

  .invoice-table th {
    background: #f4f6f7;
    border-bottom: 2px solid #d0d0d0;
    color: #2c3e50;
    font-size: 0.85rem;
  }

  .invoice-table td {
    font-size: 0.85rem;
  }

  /* Total Row */
  .invoice-total {
    font-weight: 700;
    font-size: 0.95rem;
    color: #2c3e50;
  }

  /* Buttons */
  .invoice-actions a,
  .invoice-actions button {
    border-radius: 10px !important;
    font-weight: 600;
    padding: 6px 12px;
  }

  /* Print Version */
  @media print {
    body {
      background: white !important;
    }
    .invoice-card {
      box-shadow: none !important;
      border: none !important;
      padding: 0 !important;
    }
  }
</style>
