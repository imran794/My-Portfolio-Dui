@extends('layouts.frontend.app')

@section('title','Contact')


@section('content')



<!-- contact section starts  -->

<section class="contact">

<h1 class="heading"> contact <span>me</span> </h1>

<div class="row">

    <div class="info-container">

        <h1>get in touch</h1>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas dolorem sunt sapiente vel minus eaque voluptate fugit corrupti omnis tempora?</p>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-map"></i>
                <div class="info">
                    <h3>address :</h3>
                    <p>Chunkutia Madhya Para, Keraniganj, Dhaka</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <div class="info">
                    <h3>email :</h3>
                    <p>imran75hossainkhan@gmail.com</p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-phone"></i>
                <div class="info">
                    <h3>number :</h3>
                    <p>01910122877</p>
                </div>
            </div>

        </div>

        <div class="share">
            <a href="https://www.facebook.com/imran.suddam" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/Aymanimran10" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="https://www.linkedin.com/in/imran-ayman-b80261194/" class="fab fa-linkedin"></a>
        </div>

    </div>

    <form action="{{ route('contact.post') }}" method="POST">
        @csrf

        <div class="inputBox">
            <input type="text" placeholder="your name" name='name'>
            <input type="number" placeholder="your number" name="number">
        </div>

        <div class="inputBox">
            <input type="email" placeholder="your email" name='email'>
            <input type="text" placeholder="your subject" name="subject">
        </div>

        <textarea name="message" placeholder="your message" id="" cols="30" rows="10"></textarea>

        <input type="submit" value="send message" class="btn">

    </form>

</div>

</section>

<!-- contact section ends -->


@endsection