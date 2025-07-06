@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stripe Payment</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('stripe.post') }}" method="POST">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="10000"
            data-name="Dressy Payment"
            data-description="Pay securely with Stripe"
            data-currency="usd"
            data-locale="auto">
        </script>
    </form>
</div>
@endsection
