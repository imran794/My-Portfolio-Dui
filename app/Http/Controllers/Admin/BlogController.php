<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Image;
use Carbon\Carbon;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $blogs = Blog::latest('id')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
      {
        // $request->validate([
        //      'blog_image'      => 'required',
        //      'blog_title'      => 'required',
        //     ' blog_des'        => 'required',
        // ]);

            $image = $request->file('blog_image');
            $slug  = Str::slug($request->blog_title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check blog dir is exists
            if (!Storage::disk('public')->exists('blog'))
            {
                Storage::disk('public')->makeDirectory('blog');
            }
         //  resize image for blog and upload
        
            Image::make($image)->resize(626, 417)->save(storage_path('app/public/blog').'/'.$imagename);

        }


        $blog = new Blog();
        $blog->blog_image       = $imagename;
        $blog->blog_title       = $request->blog_title;
        $blog->added_by         = Auth::id();
        $blog->blog_des         = $request->blog_des;
        $blog->save();

        notify()->success("Blog Added", "Success");
        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.create',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // $request->validate([
        //      'blog_image'      => 'required',
        //      'blog_title'      => 'required',
        //     ' blog_des'        => 'required',
        // ]);

            $image = $request->file('blog_image');
            $slug  = Str::slug($request->blog_title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check blog dir is exists
            if (!Storage::disk('public')->exists('blog'))
            {
                Storage::disk('public')->makeDirectory('blog');
            }

            if (Storage::disk('public')->exists('blog/'.$blog->blog_image)) {
            Storage::disk('public')->delete('blog/'.$blog->blog_image);
            }


         //  resize image for blog and upload
        
            Image::make($image)->resize(626, 417)->save(storage_path('app/public/blog').'/'.$imagename);

        }else{
            $imagename = $blog->blog_image;
        }

        $blog->blog_image       = $imagename;
        $blog->blog_title       = $request->blog_title;
        $blog->blog_des         = $request->blog_des;
        $blog->save();

        notify()->success("Blog Added", "Success");
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (Storage::disk('public')->exists('blog/'.$blog->blog_image)) {
            Storage::disk('public')->delete('blog/'.$blog->blog_image);
            }
            
        $blog->delete();
        notify()->success('Blog Deleted', "Success");
        return redirect()->back();
    }
}
