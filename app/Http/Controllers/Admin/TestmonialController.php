<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testmonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Image;
use Carbon\Carbon;

class TestmonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testmonials = Testmonial::latest('id')->get();
        return view('admin.testmonial.index',compact('testmonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.testmonial.create_update');
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
        //      'image'      => 'required',
        //      'test_name'       => 'required',
        //     ' test_des'      => 'required',
        //      'test_degi'  => 'required',
        // ]);

            $image = $request->file('image');
            $slug  = Str::slug($request->test_name);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check testmonial dir is exists
            if (!Storage::disk('public')->exists('testmonial'))
            {
                Storage::disk('public')->makeDirectory('testmonial');
            }
         //  resize image for testmonial and upload
        
            Image::make($image)->resize(300, 300)->save(storage_path('app/public/testmonial').'/'.$imagename);

        }


        $testmonial = new Testmonial();
        $testmonial->image            = $imagename;
        $testmonial->test_name        = $request->test_name;
        $testmonial->test_des         = $request->test_des;
        $testmonial->test_degi        = $request->test_degi;
        $testmonial->save();

        notify()->success("Testmonial Added", "Success");
        return redirect()->route('admin.testmonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testmonial  $testmonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testmonial $testmonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testmonial  $testmonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testmonial $testmonial)
    {
        return view('admin.testmonial.create_update',compact('testmonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testmonial  $testmonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testmonial $testmonial)
    {
           {
        // $request->validate([
        //      'image'      => 'required',
        //      'test_name'       => 'required',
        //     ' test_des'      => 'required',
        //      'test_degi'  => 'required',
        // ]);

            $image = $request->file('image');
            $slug  =  $slug = Str::slug($request->test_name);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check testmonial dir is exists
            if (!Storage::disk('public')->exists('testmonial'))
            {
                Storage::disk('public')->makeDirectory('testmonial');
            }

            // image delete for testmonial

             if (Storage::disk('public')->exists('testmonial/'.$testmonial->image)) {
                Storage::disk('public')->delete('testmonial/'.$testmonial->image);
            }

         //  resize image for testmonial and upload
        
            Image::make($image)->resize(300, 300)->save(storage_path('app/public/testmonial').'/'.$imagename);

        }else{
            $imagename = $testmonial->image;

        }

        $testmonial->image            = $imagename;
        $testmonial->test_name        = $request->test_name;
        $testmonial->test_des         = $request->test_des;
        $testmonial->test_degi        = $request->test_degi;
        $testmonial->save();

        notify()->success("Testmonial Updated", "Success");
        return redirect()->route('admin.testmonial.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testmonial  $testmonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testmonial $testmonial)
    {
        
        if (Storage::disk('public')->exists('testmonial/'.$testmonial->image)) {
                Storage::disk('public')->delete('testmonial/'.$testmonial->image);
        }

        $testmonial->delete();

        notify()->success("Testmonial Deleted", "Success");
        return redirect()->back();


    }
}
