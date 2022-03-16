<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use File;
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
     
        $blog = new Blog();
        $blog->blog_title       = $request->blog_title;
        $blog->added_by         = Auth::id();
        $blog->blog_des         = $request->blog_des;

         if ($request->hasFile('blog_image')) {
                $file = $request->file('blog_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().".".$extension;
                $file->move('uploads/blog/',$filename);
                $blog->blog_image = $filename;

            }

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

        $blog->blog_image       = $imagename;
        $blog->blog_title       = $request->blog_title;
        $blog->blog_des         = $request->blog_des;
          if ($request->hasFile('blog_image')) {

             if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $file = $request->file('blog_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().".".$extension;
                $file->move('uploads/blog/',$filename);
                $blog->blog_image = $filename;

            }
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
       if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            
        $blog->delete();
        notify()->success('Blog Deleted', "Success");
        return redirect()->back();
    }
}
