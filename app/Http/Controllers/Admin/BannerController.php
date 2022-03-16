<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;

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
        

        $banner = new Banner();
        $banner->sub_title   = $request->sub_title;
        $banner->title       = $request->title;
        $banner->description = $request->description;


           if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().".".$extension;
                $file->move('uploads/banner/',$filename);
                $banner->image = $filename;

            }


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
        // 
        
        $banner->sub_title   = $request->sub_title;
        $banner->title       = $request->title;
        $banner->description = $request->description;

           if ($request->hasFile('image')) {

            $image_path = 'uploads/banner/'.$banner->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().".".$extension;
                $file->move('uploads/banner/',$filename);
                $banner->image = $filename;

            }
 
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
         $image_path = 'uploads/banner/'.$banner->image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }


        $banner->delete();
        notify()->success('Banner Deleted', "Success");
        return redirect()->back();
    }
}
