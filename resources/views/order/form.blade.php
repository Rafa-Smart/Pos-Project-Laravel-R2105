
<style>
  /* SECTION TITLE */
  .category-title {
    font-weight: 600;
    font-size: 1.1rem;
    color: #4a4a4a;
    border-left: 4px solid #4a90e2;
    padding-left: 8px;
    margin-bottom: 10px;
  }

  /* CARD PRODUK */
  .product-card {
    border-radius: 14px !important;
    border: 1px solid #e8e8e8 !important;
    transition: all 0.25s ease-in-out;
    background: #ffffff;
  }

  .product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.12);
    border-color: #d0d0d0 !important;
  }

  /* NAMA PRODUK */
  .product-name {
    font-size: 0.97rem;
    font-weight: 600;
    color: #333;
  }

  /* HARGA */
  .product-price {
    font-size: 0.9rem;
    font-weight: bold;
    color: #087f5b;
  }

  /* STOCK */
  .stock-info {
    font-size: 0.8rem;
    font-weight: 500;
  }

  .stock-low {
    color: #f39c12;
  }

  .stock-zero {
    color: #e74c3c;
  }

  /* BUTTON ADD */
  .btn-add {
    border-radius: 10px !important;
    font-weight: 600 !important;
    padding: 4px 10px !important;
    transition: 0.25s;
  }

  .btn-add:hover {
    background-color: #357ABD !important;
    color: white !important;
  }

  .btn-add:disabled {
    background: #ccc !important;
    border-color: #ccc !important;
    color: white !important;
    cursor: not-allowed;
    opacity: 0.7;
  }
</style>

@foreach ($categories as $category)

  <h5 class="category-title mt-3">{{ $category->name }}</h5>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2 item-product">

    @foreach ($category->product as $product)
      <div class="col">
        <div class="card product-card h-100 shadow-sm">

          <div class="card-body p-3 d-flex flex-column justify-content-between">

            <div>
              <h6 class="product-name mb-1">{{ $product->name }}</h6>
            </div>

            <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

            {{-- STOCK --}}
            @php
              $stockClass = ($product->stock ?? 0) <= 0 
                              ? 'stock-zero' 
                              : (($product->stock ?? 0) < 5 ? 'stock-low' : '');
            @endphp

            <div class="stock-info {{ $stockClass }}">
              Stock: <strong>{{ $product->stock ?? 0 }}</strong>
            </div>

            <div class="d-flex justify-content-end align-items-center mt-2">
              <input type="hidden" class="id_product" value="{{ $product->id }}" data-price="{{ $product->price }}">
              
              <button 
                class="btn btn-sm btn-outline-primary btn-add" 
                title="Tambah ke keranjang"
                {{ ($product->stock ?? 0) <= 0 ? 'disabled' : '' }}>
                Add
              </button>
            </div>

          </div>
        </div>
      </div>
    @endforeach

  </div>

@endforeach
