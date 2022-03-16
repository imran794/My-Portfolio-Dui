<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Services;
use App\Models\Portfolio;
use App\Models\Contact;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $portfolio = Portfolio::count();
        $contacts = Contact::count();
        $user = User::count();

        return view('admin.home',compact('portfolio','contacts','user'));
    }
}
