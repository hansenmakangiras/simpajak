<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')
<body
    {{ ($has_scrollspy) ? scrollspy($scrollspy_offset) : '' }}
    class=" {{ ($alt_menu) ? 'alt-menu' : '' }}
    {{ ($page_name === 'error404') ? 'error404 text-center' : '' }}
    {{ ($page_name === 'error500') ? 'error500 text-center' : '' }}
    {{ ($page_name === 'error503') ? 'error503 text-center' : '' }}
    {{ ($page_name === 'maintenence') ? 'maintanence text-center' : '' }}"
>
<x-loader/>

@include('inc.navbar')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
@include('layouts.partials.overlay')
@include('inc.sidebar')
<!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        @yield('content')
        @if ($page_name != 'account_settings')
            @include('inc.footer')
        @endif
    </div>
    <!--  END CONTENT PART  -->
</div>
<!-- END MAIN CONTAINER -->
{{--@include('inc.scripts')--}}
@include('inc.js')
</body>
</html>
