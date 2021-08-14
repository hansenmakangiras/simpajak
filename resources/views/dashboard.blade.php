@extends('layouts.app')

@push('css_custom')
    <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/alert.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endpush

@section('content')
    <div class="layout-px-spacing">
        @include('flash::message')
        <div class="row layout-top-spacing">
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <livewire:dashboard.statistik />
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <livewire:dashboard.expense />
            </div>

            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <livewire:dashboard.chart />
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <livewire:dashboard.notifications />
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

