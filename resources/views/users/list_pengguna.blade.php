@extends('layouts.app')

@push('css_custom')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_custom.css')}}">
@endpush
@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing layout-spacing">
            @include('flash::message');
            <div class="col-lg-6">
                <a href="{{ url('users/create') }}" class="btn btn-primary mb-2">Create Users</a>
            </div>

            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
{{--                    <div class="widget-header">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">--}}
{{--                                <h4>Users List</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4">
                            <table id="style-2" class="table style-2 table-hover table-bordered non-hover table-sm">
                                <thead class="">
                                <tr>
                                    <th class="checkbox-column dt-no-sorting"> Id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center dt-no-sorting">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td class="checkbox-column"> {{ $user->id }}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @foreach($user->roles as $role)
                                            @switch($role->name)
                                                @case('Super Admin')
                                                <td class="text-center"><span class="shadow-none badge badge-primary">{{ $role->name }}</span></td>
                                                    @break
                                                @case('Admin')
                                                <td class="text-center"><span class="shadow-none badge badge-warning">{{ $role->name }}</span></td>
                                                    @break
                                                @default
                                                <td class="text-center"><span class="shadow-none badge badge-danger">{{ $role->name }}</span></td>
                                            @endswitch
                                        @endforeach
                                        <td class="text-center"><span class="shadow-none badge badge-{{ $user->status === 1 ? 'primary' : 'danger'}}">{{ $user->status === 1 ?
                                        'Aktif' : 'Non Aktif'}}</span></td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item" href="{{ route('users.account', $user->id) }}">Account Setting</a>
                                                    <a class="dropdown-item" href="{{ route('users.profil', $user->id) }}">Profil</a>
                                                    <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">View</a>
                                                    <a class="dropdown-item" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="{{ route('users.destroy',$user->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

    <script>
        // var e;
        c2 = $('#style-2').DataTable({
            headerCallback: function (e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML = '<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs: [{
                targets: 0, width: "30px", className: "", orderable: !1, render: function (e, a, t, n) {
                    return '<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c2);

    </script>
@endpush
