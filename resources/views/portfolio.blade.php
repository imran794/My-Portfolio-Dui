@extends('layouts.frontend.app')

@section('title','Portfolio')


@section('content')



<!-- portfolio section starts  -->

<section class="portfolio">

    <h1 class="heading"> <span>my</span> work </h1>

    <div class="box-container">

        @foreach ($portfolios as $portfolio)
        <div class="box">
            <img src="{{ asset('uploads/portfolio/'.$portfolio->portfolio_image) }}" alt="">
            <div class="content">
                <h3>{{ $portfolio->portfolio_title }}</h3>
                <p>{{ $portfolio->portfolio_sub_title }}</p>
                <a target="_blank" href="{{ $portfolio->url }}">read more</a>
            </div>
        </div>
        @endforeach


    </div>

    <a href="#" class="btn"> load more <i class="fas fa-redo"></i> </a>
    
</section>

<!-- portfolio section ends -->


@endsection