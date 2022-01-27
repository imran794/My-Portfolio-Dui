@extends('layouts.dashboard.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL CATEGORY</div>
                    <div class="number count-to" data-from="0" data-to="{{ $category }}" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">favorite</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL SERVICES</div>
                    <div class="number count-to" data-from="0" data-to="{{ $servicess }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL PORTFOLIO</div>
                    <div class="number count-to" data-from="0" data-to="{{ $portfolio }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">message</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL MESSAGES</div>
                    <div class="number count-to" data-from="0" data-to="{{ $contacts }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL USERS</div>
                    <div class="number count-to" data-from="0" data-to="{{ $user }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->

 
{{-- 
    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Rank List</th>
                                    <th>Name</th>
                                    <th>Post</th>
                                    <th>Comments</th>
                                    <th>Favorite</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($active_author as $key=>$author)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->posts_count }}</td>
                                    <td>{{ $author->comments_count }}</td>
                                    <td>{{ $author->favorite_posts_count }}</td>
                                
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
  
    </div> --}}
</div>
@endsection


@push('js')
  

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets/dashboard/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('assets/dashboardplugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('assets/dashboard/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/flot-charts/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/pages/index.js') }}"></script>
@endpush
