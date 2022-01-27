<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;
use App\Models\Portfolio;
use App\Models\Blog;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {
        $banner = Banner::first();
        return view('welcome',compact('banner'));
    }

    public function About()
    {
        return view('about');
    } 


    public function Portfolio()
    {

        $portfolios = Portfolio::latest()->get();
        return view('portfolio',compact('portfolios'));
    }


    public function Blog()
    {
        $blogs = Blog::latest()->get();
        return view('blog', compact('blogs'));
    }


    public function Contact()
    {
        return view('contact');
    }
}
