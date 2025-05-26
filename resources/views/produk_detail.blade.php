@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6">
            <div class="product-image">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="col-md-6">
            <h2 class="fw-bold">{{ $product->name }}</h2>
            <div class="rating mb-2">
                <span class="text-warning">&#9733; {{ $product->rating }} </span>
                <span class="text-muted">({{ $product->rating_count }})</span>
                <span class="ms-2">{{ $product->review_count }} reviews</span>
            </div>
            <h3 class="text-brown mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
            <div class="shipping-info mb-3">
                <p><i class="bi bi-truck"></i> Send to <strong>{{ $destination ?? 'Tulungagung' }}</strong></p>
                <p>Estimated 3–4 days</p>
            </div>
            <form action="{{ route('cart.store') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <div class="d-flex align-items-center mb-3">
                <button type="button" class="btn btn-outline-secondary" onclick="updateQty(-1)">−</button>
                <input type="number" id="qty" name="quantity" value="1" min="1" class="form-control text-center mx-2" style="width: 60px;" readonly>
                <button type="button" class="btn btn-outline-secondary" onclick="updateQty(1)">+</button>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-secondary">Add to Cart</button>
                    <button type="submit" formaction="{{ route('checkout.buyNow') }}" class="btn btn-primary">Buy Now</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Deskripsi Produk -->
    <div class="mt-5">
        <h4 class="fw-semibold mb-3">Product Description</h4>
        <p>{{ $product->description }}</p>
    </div>

    <!-- Detail Spesifikasi -->
    <div class="mt-4">
        <h5>Product Details</h5>
        <ul>
            <li>Net Weight: {{ $product->weight }} grams</li>
            <li>Skin Type: {{ $product->skin_type }}</li>
            <li>Texture: {{ $product->texture }}</li>
            <li>Scent: {{ $product->scent }}</li>
            <li>Color: {{ $product->color }}</li>
        </ul>
    </div>

    <!-- Ulasan Produk -->
    <div class="mt-5">
        <h5>Reviews ({{ count($reviews ?? []) }})</h5>

        @if (!empty($reviews) && count($reviews) > 0)
            @foreach ($reviews as $review)
                <div class="bg-light p-4 rounded mb-3">
                    <strong>{{ Str::limit($review->user_name, 3, '***') }}</strong>
                    <div class="text-warning mb-1">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p>"{{ $review->comment }}"</p>
                    <small class="text-muted">
                        Created on {{ \Carbon\Carbon::parse($review->created_at)->format('F d, Y') }}
                    </small>
                    <div class="mt-2">
                        👍 {{ $review->likes }} 👎 {{ $review->dislikes }}
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">Belum ada review.</p>
        @endif

        <a href="#" class="btn btn-outline-success">See more</a>
    </div>
</div>

<!-- Script untuk tombol + / - qty -->
<script>
    function updateQty(change) {
        const qtyInput = document.getElementById('qty');
        let value = parseInt(qtyInput.value);
        value = isNaN(value) ? 1 : value + change;
        if (value < 1) value = 1;
        qtyInput.value = value;
    }
</script>
@endsection
