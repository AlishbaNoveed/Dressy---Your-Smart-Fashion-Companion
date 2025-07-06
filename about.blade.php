@extends('layouts.app')
@section('content')
   <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">About US</h2>
      </div>

        <p class="mb-5">
          <img loading="lazy" class="w-100 h-auto d-block" src="assets/images/about/about-1.jpg" width="1410"
            height="550" alt="" />
        </p>
        <!-- Our Story -->
  <section class="about-us container">
    <div class="mw-930">
      <h2 class="mb-4">OUR STORY</h2>
      <p class="fs-6 fw-medium mb-4 text-justify">
        DRESSY was born out of a simple yet powerful idea: to make fashion more personal, intelligent, and accessible for every woman. As a team of passionate final-year students, we noticed that many online fashion stores lack personalized recommendations based on individual preferences like skin tone, age, and style needs.
      </p>
      <p class="mb-4 text-justify">
        We set out to build a web-based smart fashion advisor that goes beyond generic shopping. By integrating intelligent suggestions and easy browsing, DRESSY helps users choose outfits that suit their unique personality and look — whether it's stitched, unstitched, summer, or winter wear.
      </p>
    </div>

    <!-- Mission & Vision in Two Columns -->
    <div class="mw-930 row">
      <!-- Mission -->
      <div class="col-lg-6 mb-4">
      <h2 class="mb-4">Our Mission</h2>
      <p class="mb-4 text-justify">
      To simplify fashion decisions by offering smart, tailored outfit recommendations and a seamless online shopping experience for women — helping them look and feel their best, every day.
      </p>
      <p class="mb-4 text-justify">We aim to:</p>
        <ul class="mb-4 text-justify ps-3">
          <li class="mb-2">Make fashion personal and inclusive.</li>
          <li class="mb-2">Guide users with suggestions based on age, skin tone, and category.</li>
          <li class="mb-2">Combine technology and style in a user-friendly interface.</li>
        </ul>
      </div>

      <!-- Vision -->
      <div class="col-lg-6 mb-4">
        <h2 class="mb-4">Our Vision</h2>
        <p class="mb-4 text-justify">
          To become a go-to digital fashion assistant for women by continuously evolving with trends and technology — and to inspire confidence through customized fashion that celebrates individuality.
        </p>
      </div>
    </div>

    <!-- Commented Image (remains commented) -->
    {{-- 
    <div class="image-wrapper col-lg-6">
      <img class="h-auto" loading="lazy" src="assets/images/about/about-1.jpg" width="450" height="500" alt="">
    </div> 
    --}}

  </section>


  </main>
@endsection