@extends('layouts.app')
@section('content')
<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">MY Wishlist</h2>
        <div class="row">
            <div class="col-lg-2">
                 @include('user.account-nav')
           </div>
            
           <div class="col-lg-9">
          <div class="page-content my-account__wishlist">
            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">
                @if($items->count())  
                 @foreach($items as $item)
              <div class="product-card-wrapper">
                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                  <div class="pc__img-wrapper">
                    <div class="swiper-container background-img js-swiper-slider"
                      data-settings='{"resizeObserver": true}'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <img loading="lazy" src="{{ asset('uploads/products/' . $item->model->image) }}" width="330" height="400"
                            alt="{{ $item->name }}" class="pc__img">
                        </div>
                        
                      </div>
                    </div>
                    <form method="POST" action="{{ route('user.wishlist.remove', $item->rowId) }}">
                    @csrf
                    <button type="submit" class="btn-remove-from-wishlist" title="Remove from Wishlist">
                      <svg width="12" height="12" viewBox="0 0 12 12"  fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_close" />
                      </svg>
                    </button>
                    </form>
                  </div>

                  <div class="pc__info position-relative">
                    <p class="pc__category">Dresses</p>
                    <h6 class="pc__title">{{ $item->name }}</h6>
                    <div class="product-card__price d-flex">
                      <span class="money price">${{ $item->price }}</span>
                    </div>
                  </div>
                </div>
              </div>
               @endforeach
                @else
             <div class="d-flex justify-content-center align-items-center text-center w-100" style="height: 300px;">
                   <h2 style="color: black; font-size: 28px;">Your wishlist is empty.</h2>
               </div>
               @endif
             </div>  
          </div>
        </div>
 </main>
@endsection          