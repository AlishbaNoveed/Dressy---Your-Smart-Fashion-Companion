@foreach($products as $product)
    <div class="product-card-wrapper">
        <div class="product-card">
            <a href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">
                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}">
            </a>
            <div class="product-details">
                <p class="mb-1 text-muted">{{ $product->category->name }}</p>
                <h6 class="fw-semibold">{{ $product->name }}</h6>
                <p class="mb-0">
                    @if($product->sale_price)
                        <s class="text-danger">${{ $product->regular_price }}</s> <strong>${{ $product->sale_price }}</strong>
                    @else
                        <strong>${{ $product->regular_price }}</strong>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endforeach

@if(count($products) === 0)
    <p class="text-center mt-4 text-muted">No products matched your preferences.</p>
@endif
