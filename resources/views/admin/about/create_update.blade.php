@extends('layouts.dashboard.app')

@section('title','About')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <form action="{{ isset($about) ? route('admin.about.update',$about->id) : route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($about)
            @method('PUT')
            @endisset
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($about) ?  'Update about' : ' Add New about' }}
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                              <label class="form-label">about Image</label>
                            <div class="form-line">   
                                <input type="file" name="about_image">
                                  @isset ($about)
                                      <div style="padding: 10px;">
                                    <img width="100" src="{{ Storage::disk('public')->url('about/'.$about->about_image) }}">
                                </div>    
                                  @endisset
                                
                                    @error('image')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror  
                            </div>
                        </div>
                        <div class="form-group form-float">
                                <label class="form-label">About Title</label>
                            <div class="form-line">
                                <input type="text" id="about_title" class="form-control" name="about_title" value="{{ $about->about_title ?? old('about_title') }}">
                                    @error('about_title')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div>

                        <div class="form-group form-float">
                               <label class="form-label">About Description</label>
                            <div class="form-line">
                                <textarea class="form-control" name="about_des">{{ $about->about_des ?? old('about_des') }}</textarea>
                                 @error('about_des')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div>

                        
                          <div class="form-group form-float">
                                <label class="form-label">About Btn</label>
                            <div class="form-line">
                                <input type="text" id="about_btn" class="form-control" name="about_btn" value="{{ $about->about_btn ?? old('about_btn') }}">
                                    @error('about_btn')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div> 

                          <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.about.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                            @isset ($about)
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