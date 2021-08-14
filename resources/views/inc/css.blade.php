<link href="{{ asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('assets/js/loader.js')}}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements/alert.css')}}">

@if(config('app.env') === 'local' || config('app.env') === 'development')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/animate/animate.css')}}">
@else
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endif

<!-- END GLOBAL MANDATORY STYLES -->

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css')}}">

@stack('css_custom')
<livewire:styles/>
