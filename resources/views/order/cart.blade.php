<form action="{{url('order') }}" id="order-form" method="POST">
  @csrf

<style>
  .order-card {
    background: #ffffff;
    padding: 25px;
    border-radius: 18px;
    border: 1px solid rgba(230, 230, 230, 0.6);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    animation: fadeIn 0.3s ease;
    margin-right: 20px;
  }

  .order-title {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
  }

  .modern-input, .modern-select {
    border-radius: 10px;
    border: 1px solid #ced4da;
    padding: 10px 12px;
    transition: all 0.25s ease;
  }

  .modern-input:focus,
  .modern-select:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 0 4px rgba(74,144,226,0.25);
  }

  /* TABLE */
  .pretty-table {
    margin-right: 20px;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid #e5e5e5;
  }

  .pretty-table thead {
    background: linear-gradient(to right, #4a90e2, #357ABD);
    color: white;
  }

  .pretty-table th {
    font-weight: 600;
    padding: 12px !important;
  }

  .pretty-table td {
    vertical-align: middle;
    padding: 10px !important;
    background-color: #fdfdfd;
  }

  .pretty-table tbody tr:hover {
    background-color: #eef6ff !important;
  }

  .btn-remove {
    background: #e74c3c;
    border: none;
    color: white;
    padding: 6px 10px;
    border-radius: 6px;
    transition: 0.25s;
  }

  .btn-remove:hover {
    background: #c0392b;
  }

  /* Submit Button */
  #submit-order {
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
    box-shadow: 0 5px 12px rgba(0,0,0,0.12);
    transition: 0.25s;
  }

  #submit-order:hover {
    transform: translateY(-2px);
  }

  /* Animation */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="order-card">

  <h3 class="order-title">Buat Order Baru</h3>

  <div class="mb-3">
    <label for="customer_id" class="form-label fw-bold">Customer</label>
    <select name="customer_id" id="customer_id" class="form-select modern-select">
      @foreach ($customers as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
      @endforeach
    </select>
  </div>

  <table class="table table-sm align-middle pretty-table" id="tbl-cart">
    <thead>
      <tr>
        <th>Product</th>
        <th width="110">Qty</th>
        <th width="140">Price</th>
        <th width="70">Action</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
      <tr>
        <td colspan="3" class="text-end fw-bold fs-5">Total:</td>
        <td id="total-cell" class="fw-bold fs-5">0</td>
      </tr>
    </tfoot>
  </table>

  <input type="hidden" name="order_payload" id="order_payload" value="">

  <button type="submit" id="submit-order" class="btn btn-success mt-3 w-100">
    Submit Order
  </button>

</div>

</form>
