@extends('layouts.frontend.app')

@section('title','Home')

@push('css')

  

@endpush

@section('content')


@if ($banner)
    <section class="home">

    <div class="image">
        <img src="{{ asset('uploads/banner/'.$banner->image) }}" alt="$banner->image">
    </div>

    <div class="content">
        <h3>{{ $banner->title }}</h3>
        <span>{{ $banner->sub_title }}</span>
        <p>{{ $banner->description }}</p>
        <a href="{{ route('about') }}" class="btn"> about me <i class="fas fa-user"></i> </a>
    </div>

</section>
@endif

<!-- home section ends -->




@endsection




@push('css')

  

@endpush