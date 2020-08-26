@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/examples/css/dashboard/analytics.css">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->

@show
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">TỔNG QUAN</h1>
        </div>
        <!-- <div id="app">
            <example-component></example-component>
        </div> -->

        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">

            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@section('scripts-content')
    <script src="/assets/examples/js/dashboard/analytics.js"></script>

@show
