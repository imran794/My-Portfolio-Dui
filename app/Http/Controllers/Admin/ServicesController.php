<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::latest('id')->get();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
          //    'services_icon'           => 'required',
            //  'services_title'          => 'required',
            // ' services_des'            => 'required',
              // 'services_btn'           => 'required',
        // ]);


        $services = new Services();
        $services->services_icon        = $request->services_icon;
        $services->services_title       = $request->services_title;
        $services->services_des         = $request->services_des;
        $services->services_btn         = $request->services_btn;
        $services->save();

        notify()->success("Services Added", "Success");
        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {
       return view('admin.services.create',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {
         // $request->validate([
          //    'services_icon'           => 'required',
            //  'services_title'          => 'required',
            // ' services_des'            => 'required',
              // 'services_btn'           => 'required',
        // ]);
        
        $service->services_icon        = $request->services_icon;
        $service->services_title       = $request->services_title;
        $service->services_des         = $request->services_des;
        $service->services_btn         = $request->services_btn;
        $service->save();

        notify()->success("Services Added", "Success");
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        $service->delete();
        notify()->success('Services Deleted', "Success");
        return redirect()->back();
    }
}
