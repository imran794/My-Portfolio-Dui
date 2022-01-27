<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Image;
use Carbon\Carbon;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest('id')->get();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create_update');
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
        //      'about_image'      => 'required',
        //      'about_title'       => 'required',
        //     ' about_des'      => 'required',
        //      'about_btn'  => 'required',
        // ]);

            $image = $request->file('about_image');
            $slug = Str::slug($request->about_title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

           //    check about dir is exists
            if (!Storage::disk('public')->exists('about'))
            {
                Storage::disk('public')->makeDirectory('about');
            }
         //  resize image for about and upload
        
            Image::make($image)->resize(524, 478)->save(storage_path('app/public/about').'/'.$imagename);

        }else{
            $imagename = 'default.png';
        }


        $about = new About();
        $about->about_image        = $imagename;
        $about->about_title        = $request->about_title;
        $about->about_des          = $request->about_des;
        $about->about_btn          = $request->about_btn;
        $about->save();

        notify()->success("About Added", "Success");
        return redirect()->route('admin.about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
         return view('admin.about.create_update',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        // $request->validate([
        //      'about_image'      => 'required',
        //      'about_title'       => 'required',
        //     ' about_des'      => 'required',
        //      'about_btn'  => 'required',
        // ]);

            $image = $request->file('about_image');
            $slug = Str::slug($request->about_title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

           //    check about dir is exists
            if (!Storage::disk('public')->exists('about'))
            {
                Storage::disk('public')->makeDirectory('about');
            }

            // delete old image

            if (Storage::disk('public')->exists('about/'.$about->about_image)) {
                Storage::disk('public')->delete('about/'.$about->about_image);
            }


         //  resize image for about and upload
        
            Image::make($image)->resize(524, 478)->save(storage_path('app/public/about').'/'.$imagename);

        }else{
            $imagename = $about->about_image;
        }

        $about->about_image        = $imagename;
        $about->about_title        = $request->about_title;
        $about->about_des          = $request->about_des;
        $about->about_btn          = $request->about_btn;
        $about->save();

        notify()->success("About Added", "Success");
        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if (Storage::disk('public')->exists('about/'.$about->about_image)) {
                Storage::disk('public')->delete('about/'.$about->about_image);
            }

        $about->delete();
        notify()->success("About Delete", "Success");
        return redirect()->back();

    }
}
