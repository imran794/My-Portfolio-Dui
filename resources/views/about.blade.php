@extends('layouts.frontend.app')

@section('title','About')


@section('content')

<!-- about section starts  -->

<section class="about">

    <h1 class="heading"> about <span>me</span> </h1>

    <div class="row">

        <div class="info-container">

            <h1>personal info</h1>

            <div class="box-container">

                <div class="box">
                    <h3> <span>name : </span> Imran Hossan </h3>
                    <h3> <span>age : </span> 29 </h3>
                    <h3> <span>email : </span> imran75hossainkhan@gmail.com </h3>
                    <h3> <span>address : </span> Keranigonj Dhaka </h3>
                </div>
    
                <div class="box">
                    <h3> <span>freelance : </span> available </h3>
                    <h3> <span>skill : </span> Backend Developer </h3>
                    <h3> <span>experience : </span> 1 years </h3>
                    <h3> <span>language : </span> Bangla, english </h3>
                </div>

            </div>

            <a href="#" class="btn"> download CV <i class="fas fa-download"></i> </a>

        </div>

        <div class="count-container">

            <div class="box">
                <h3>1+</h3>
                <p>years of experience</p>
            </div>

            <div class="box">
                <h3>5+</h3>
                <p>happy clients</p>
            </div>

            <div class="box">
                <h3>10+</h3>
                <p>project completed</p>
            </div>

            <div class="box">
                <h3>0+</h3>
                <p>awards won</p>
            </div>

        </div>

    </div>

</section>

<!-- about section ends -->

<!-- skills section starts  -->

<section class="skills">

    <h1 class="heading"> <span>my</span> skills </h1>

    <div class="box-container">
        <div class="box">
            <img src="{{ asset('assets/frontend/images/icon-1.png') }}">
            <h3>html</h3>
        </div>
        <div class="box">
            <img src="{{ asset('assets/frontend/images/icon-2.png') }}">
            <h3>css</h3>
        </div>
        <div class="box">
            <img src="{{ asset('assets/frontend/images/icon-3.png') }}">
            <h3>javascript</h3>
        </div>
        <div class="box">
            <img src="{{ asset('assets/frontend/images/icon-4.png') }}">
            <h3>sass</h3>
        </div>
        <div class="box">
            <img src="{{ asset('assets/frontend/images/php.png') }}">
            <h3>PHP</h3>
        </div>
        <div class="box">
            <img src="{{ asset('assets/frontend/images/laravel.jpg') }}">
            <h3>Laravel</h3>
        </div>
    </div>

</section>

<!-- skills section ends -->

<!-- education section starts  -->
{{-- 
<section class="education">

    <h1 class="heading"> <span>my</span> education </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span>2015 - 2016</span>
            <h3>front-end development</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia explicabo magni est quo vitae quis veritatis fugiat optio placeat enim!</p>
        </div>

        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span>2016 - 2017</span>
            <h3>front-end development</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia explicabo magni est quo vitae quis veritatis fugiat optio placeat enim!</p>
        </div>

        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span>2017 - 2018</span>
            <h3>front-end development</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia explicabo magni est quo vitae quis veritatis fugiat optio placeat enim!</p>
        </div>

        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span>2018 - 2019</span>
            <h3>front-end development</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia explicabo magni est quo vitae quis veritatis fugiat optio placeat enim!</p>
        </div>

        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span>2019 - 2020</span>
            <h3>front-end development</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia explicabo magni est quo vitae quis veritatis fugiat optio placeat enim!</p>
        </div>

        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span>2020 - 2021</span>
            <h3>front-end development</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia explicabo magni est quo vitae quis veritatis fugiat optio placeat enim!</p>
        </div>

    </div>

</section> --}}



@endsection