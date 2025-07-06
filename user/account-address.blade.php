@extends('layouts.app')
@section('content')
<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">My Address</h2>
        <div class="row">
            <div class="col-lg-3">
                 @include('user.account-nav')
           </div>
           <div class="col-lg-9">
          <div class="page-content my-account__address">
            <div class="row">
              <div class="col-6">
                <p class="notice">The address provided below was entered during the checkout process.</p>
              </div>
            </div>
            <div class="my-account__address-list row">
              <h5>Shipping Address</h5>
               @if($order)
              <div class="my-account__address-item col-md-6">
                <div class="my-account__address-item__title">
                  <h5>{{ $order->name ?? 'No Name Found' }} <i class="fa fa-check-circle text-success"></i></h5>
                </div>
                <div class="my-account__address-item__detail">
                  <p>{{$order->address ?? 'N/A'}}</p>
                  <p>{{$order->locality ?? 'N/A'}}</p>
                  <p>{{$order->city ?? ''}}, {{$order->country ?? ''}} </p>
                  <p>{{$order->landmark ?? 'N/A'}}</p>
                  <p>{{$order->zip ?? 'N/A'}}</p>
                  <br>
                  <p>Mobile : {{$order->phone ?? 'N/A'}}</p>
                </div>
              </div>
              <hr>
            </div>
              @else
              <div class="col-md-12">
             <p class="text-center" style="color: black; font-size: 18px;">No shipping address found yet.</p>
            </div>
            @endif
          </div>
        </div>
</main>
@endsection    