@extends('layouts.dashboard.app')

@section('title','Banner')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <form action="{{ isset($banner) ? route('admin.banners.update',$banner->id) : route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($banner)
            @method('PUT')
            @endisset
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($banner) ?  'Update Banner' : ' Add New Banner' }}
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                              <label class="form-label">Banner Sub Title</label>
                            <div class="form-line">   
                                <input type="text" id="sub_title" class="form-control" name="sub_title" value="{{ $banner->sub_title ?? old('sub_title') }}">     
                                    @error('sub_title')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror  
                            </div>
                        </div>
                        <div class="form-group form-float">
                                <label class="form-label">Banner Title</label>
                            <div class="form-line">
                                <input type="text" id="title" class="form-control" name="title" value="{{ $banner->title ?? old('title') }}">
                                    @error('title')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div>  
                        <div class="form-group form-float">
                               <label class="form-label">Description</label>
                            <div class="form-line">
                                <textarea class="form-control" name="description">{{ $banner->description ?? old('description') }}</textarea>
                                 @error('description')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Banner Image</label>
                            <input type="file" name="image">
                        </div>
                          <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.banners.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

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