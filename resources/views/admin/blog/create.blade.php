@extends('layouts.dashboard.app')

@section('title','Blog')

@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <form action="{{ isset($blog) ? route('admin.blog.update',$blog->id) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($blog)
            @method('PUT')
            @endisset
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($blog) ?  'Update Blog' : ' Add New Blog' }}
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                              <label class="form-label">Blog Title</label>
                            <div class="form-line">   
                                <input type="text" id="blog_title" class="form-control" name="blog_title" value="{{ $blog->blog_title ?? old('blog_title') }}">     
                                    @error('blog_title')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror  
                            </div>
                        </div>
                        <div class="form-group form-float">
                               <label class="form-label">Blog Description</label>
                            <div class="form-line">
                                <textarea class="form-control" name="blog_des">{{ $blog->blog_des ?? old('blog_des') }}</textarea>
                                 @error('blog_des')
                         <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="blog_image">Blog Image</label>
                            <input type="file" name="blog_image">
                            @isset ($blog)
                                <div style="padding: 10px;">
                                     <img width="200" src="{{ Storage::disk('public')->url('blog/'.$blog->blog_image) }}" alt="blog_image">
                                </div>
                            @endisset
                        </div>
                          <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.blog.index') }}">BACK</a>
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