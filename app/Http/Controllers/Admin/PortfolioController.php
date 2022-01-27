<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::latest('id')->get();
        return view('admin.portfolio.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
        //      'portfolio_image'      => 'required',
        //      'portfolio_icon'       => 'required',
        //     ' portfolio_title'      => 'required',
        //      'portfolio_sub_title'  => 'required',
        // ]);

            $image = $request->file('portfolio_image');
            $slug  =  $slug = Str::slug($request->portfolio_title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check portfolio dir is exists
            if (!Storage::disk('public')->exists('portfolio'))
            {
                Storage::disk('public')->makeDirectory('portfolio');
            }
         //  resize image for portfolio and upload
        
            Image::make($image)->resize(540, 336)->save(storage_path('app/public/portfolio').'/'.$imagename);

        }


        $portfolio = new Portfolio();
        $portfolio->portfolio_image       = $imagename;
        $portfolio->portfolio_title       = $request->portfolio_title;
        $portfolio->portfolio_sub_title   = $request->portfolio_sub_title;
        $portfolio->url                   = $request->url;
        $portfolio->save();

        notify()->success("Portfolio Added", "Success");
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
         return view('admin.portfolio.create',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
     {
        // $request->validate([
        //      'portfolio_image'      => 'required',
        //      'portfolio_icon'       => 'required',
        //     ' portfolio_title'      => 'required',
        //      'portfolio_sub_title'  => 'required',
        // ]);

            $image = $request->file('portfolio_image');
            $slug  =  $slug = Str::slug($request->portfolio_title);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

           //    check portfolio dir is exists
            if (!Storage::disk('public')->exists('portfolio'))
            {
                Storage::disk('public')->makeDirectory('portfolio');
            }

            // image delete for portfolio

             if (Storage::disk('public')->exists('portfolio/'.$portfolio->portfolio_image)) {
                Storage::disk('public')->delete('portfolio/'.$portfolio->portfolio_image);
            }


         //  resize image for portfolio and upload
        
            Image::make($image)->resize(540, 336)->save(storage_path('app/public/portfolio').'/'.$imagename);

        }else{
            $imagename = $portfolio->portfolio_image;

        }

        $portfolio->portfolio_image       = $imagename;
        $portfolio->portfolio_title       = $request->portfolio_title;
        $portfolio->portfolio_sub_title   = $request->portfolio_sub_title;
        $portfolio->url                   = $request->url;
        $portfolio->save();

        notify()->success("Portfolio Updated", "Success");
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
       if (Storage::disk('public')->exists('portfolio/'.$portfolio->portfolio_image)) {
                Storage::disk('public')->delete('portfolio/'.$portfolio->portfolio_image);
            }

       $portfolio->delete();
        notify()->success("Portfolio Deleted", "Success");
        return redirect()->back();
    }
}
