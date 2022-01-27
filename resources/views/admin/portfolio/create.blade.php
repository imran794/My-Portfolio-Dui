@extends('layouts.dashboard.app')

@section('title','Portfolio')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <form action="{{ isset($portfolio) ? route('admin.portfolio.update',$portfolio->id) : route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($portfolio)
            @method('PUT')
            @endisset
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($portfolio) ?  'Update Portfolios' : ' Add New Portfolios' }}
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                              <label class="form-label">Portfolio Image</label>
                            <div class="form-line">   
                                <input type="file" name="portfolio_image">
                                @isset ($portfolio)
                                     <div style="padding: 10px;">
                                    <img width="100" src="{{ Storage::disk('public')->url('portfolio/'.$portfolio->portfolio_image) }}">
                                </div>   
                                 @endisset 
                                    @error('portfolio_image')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror  
                            </div>
                        </div> 
                        <div class="form-group form-float">
                                <label class="form-label">Portfolio Title</label>
                            <div class="form-line">
                                <input type="text" id="portfolio_title" class="form-control" name="portfolio_title" value="{{ $portfolio->portfolio_title ?? old('portfolio_title') }}">
                                    @error('portfolio_title')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div>

                         <div class="form-group form-float">
                              <label class="form-label">portfolios Sub Title</label>
                            <div class="form-line">   
                                <input type="text" id="portfolio_sub_title" class="form-control" name="portfolio_sub_title" value="{{ $portfolio->portfolio_sub_title ?? old('portfolios_btn') }}">     
                                    @error('portfolio_sub_title')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror  
                            </div>
                        </div>
                          <div class="form-group form-float">
                                <label class="form-label">Portfolio URL</label>
                            <div class="form-line">
                                <input type="text" id="url" class="form-control" name="url" value="{{ $portfolio->url ?? old('url') }}">
                                    @error('url')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div> 
                          <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.portfolio.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                            @isset ($portfolio)
                                Update
                                @else
                                Submit
                            @endisset
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('js')
<!-- Select Plugin Js -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

@endpush