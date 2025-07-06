@extends('layouts.app')
@section('content')
<style>

  .contact-us__form {
    background-color: lightgrey;
    border-radius: 8px;
    padding: 40px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
  }

  .form-control,
  .form-floating > .form-control {
    height: 48px !important;
    padding: 0.5rem 1rem;
    font-size: 0.95rem;
  }

  .form-floating > textarea.form-control {
    height: 140px !important;
    resize: vertical;
    padding-top: 1.2rem;
  }

  .btn-primary {
    padding: 10px 30px;
    font-size: 1rem;
    border-radius: 6px;
    background-color: green;
  }

  .form-floating label {
    font-size: 0.9rem;
    color: #555;
  }

  .text-danger.small {
    font-size: 0.8rem;
  }
</style>

 <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">CONTACT US</h2>
      </div>
    </section>

    <hr class="mt-2 text-secondary " />
    <div class="mb-4 pb-4"></div>

   <section class="contact-us container">
  <div class="mw-930 mx-auto">
    <div class="contact-us__form">

      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <form name="contact-us-form" class="needs-validation" novalidate action="{{ route('home.contact.store') }}" method="POST">
        @csrf

        <h3 class="mb-4 fw-bold text-center">Get In Touch</h3>

        <!-- Name -->
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="contact_name" name="name" value="{{ old('name') }}" placeholder="Name *" required>
          <label for="contact_name">Name *</label>
          @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- Phone -->
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="contact_phone" name="phone" value="{{ old('phone') }}" placeholder="Phone *" required>
          <label for="contact_phone">Phone *</label>
          @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="contact_email" name="email" value="{{ old('email') }}" placeholder="Email *" required>
          <label for="contact_email">Email *</label>
          @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- Message -->
        <div class="form-floating mb-4">
          <textarea class="form-control" id="contact_comment" name="comment" placeholder="Your Message *" required>{{ old('comment') }}</textarea>
          <label for="contact_comment">Your Message *</label>
          @error('comment') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>

        <!-- Submit -->
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>

    </div>
  </div>
</section>
  </main>
@endsection