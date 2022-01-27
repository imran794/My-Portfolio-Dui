<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Image;
use Carbon\Carbon;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest('id')->get();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.banner.create');
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
        //      'sub_title'      => 'required',
        //      'title'          => 'required',
        //     ' description'    => 'required',
        //      'image'          => 'required',
        // ]);

            $image = $request->file('image');
            $slug  = Str::slug($request->title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check banner dir is exists
            if (!Storage::disk('public')->exists('banner'))
            {
                Storage::disk('public')->makeDirectory('banner');
            }
         //  resize image for banner and upload
        
            Image::make($image)->resize(1920, 1080)->save(storage_path('app/public/banner').'/'.$imagename);

        }


        $banner = new Banner();
        $banner->image       = $imagename;
        $banner->sub_title   = $request->sub_title;
        $banner->title       = $request->title;
        $banner->description = $request->description;
        $banner->save();

        notify()->success("Banner Added", "Success");
        return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.create',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
        {
        // $request->validate([
        //      'sub_title'      => 'required',
        //      'title'          => 'required',
        //     ' description'    => 'required',
        //      'image'          => 'required',
        // ]);

            $image = $request->file('image');
            $slug  =  $slug = Str::slug($request->title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check banner dir is exists
            if (!Storage::disk('public')->exists('banner'))
            {
                Storage::disk('public')->makeDirectory('banner');
            }

              //  delete old image for banner

            if (Storage::disk('public')->exists('banner/'.$banner->image)) {
                Storage::disk('public')->delete('banner/'.$banner->image);
            }


         //  resize image for banner and upload
        
            Image::make($image)->resize(1920, 1080)->save(storage_path('app/public/banner').'/'.$imagename);

        }else{
            $imagename = $banner->image;
        }

        $banner->image       = $imagename;
        $banner->sub_title   = $request->sub_title;
        $banner->title       = $request->title;
        $banner->description = $request->description;
        $banner->save();

        notify()->success("Banner Updated", "Success");
        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if (Storage::disk('public')->exists('banner/'.$banner->image)) {
                Storage::disk('public')->delete('banner/'.$banner->image);
            }
            
        $banner->delete();
        notify()->success('Banner Deleted', "Success");
        return redirect()->back();
    }
}
