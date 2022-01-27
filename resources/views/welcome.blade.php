@extends('layouts.frontend.app')

@section('title','Home')

@push('css')

  

@endpush

@section('content')


<section class="home">

    <div class="image">
        <img src="{{ Storage::disk('public')->url('banner/'.$banner->image) }}" alt="$banner->image">
    </div>

    <div class="content">
        <h3>{{ $banner->title }}</h3>
        <span>{{ $banner->sub_title }}</span>
        <p>{{ $banner->description }}</p>
        <a href="{{ route('about') }}" class="btn"> about me <i class="fas fa-user"></i> </a>
    </div>

</section>

<!-- home section ends -->




@endsection




@push('css')

  

@endpush