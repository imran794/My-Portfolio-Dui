@extends('layouts.frontend.app')

@section('title','Blog')


@section('content')


<!-- blogs section starts  -->

<section class="blogs">

    <h1 class="heading"> <span>my</span> blogs </h1>

    <div class="box-container">
            @foreach ($blogs as $blog)
                  <div class="box">
            <div class="image">
                <img src="{{ Storage::disk('public')->url('blog/'.$blog->blog_image) }}" alt="$blog->blog_image">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> {{ $blog->created_at->format('d.m.Y') }} </a>
                    <a href="#"> <i class="fas fa-user"></i> by {{ $blog->user->name }} </a>
                </div>
                <h3>{{ $blog->blog_title }}</h3>
                <p>{{ $blog->blog_des }}</p>
                <a href="#" class="btn"> read more <i class="fas fa-link"></i> </a>
            </div>
        </div>
            @endforeach
     

    </div>

</section>

<!-- blogs section ends -->



@endsection