@extends('layouts.app')

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

