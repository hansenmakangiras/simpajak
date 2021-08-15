@extends('layouts.app')

@push('css_custom')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_custom.css')}}">
@endpush
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <@include('flash::message');
        </div>

        <div class="row layout-top-spacing">
            <div class="col-lg-6">
                <a href="{{ url('users') }}" class="btn btn-outline-danger mb-2">Back</a>
            </div>
        </div>
        <div class="row layout-top-spacing layout-spacing">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h2 class="display-4 mb-5  mt-4">Create User</h2>
                            <p class="lead mt-3 mb-4">Silahkan mengisi form disamping untuk menambahkan pengguna baru.
                            <hr class="my-4">
{{--                            <p class="mb-5">It uses utility classes for typography and spacing to space content out within the larger container.</p>--}}
                            <p class="lead">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        {!! Form::open(['url' => route('users.store',$users),'class' => 'needs-validation','novalidate']) !!}
                        @method('POST')
                        <div class="form-group row mb-4">
                            <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Name</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                {!! Form::text('name',null,['class' => 'form-control' ,'id' => 'user_name','placeholder' => '','required']) !!}
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Email</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                {!! Form::email('email',null,['class' => 'form-control' ,'id' => 'user_password','placeholder' => '','required']) !!}
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Password</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                {!! Form::password('password',['class' => 'form-control' ,'id' => 'user_password','placeholder' => '','required']) !!}
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Role</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                {!! Form::select('roles', $roles,3,['class' => 'form-control','id'=>'user_role','placeholder' => 'Pilih Role','required']) !!}
                                @error('roles')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Status</div>
                            <div class="col-sm-10">
                                <div class="form-check pl-0">
                                    <div class="custom-control custom-checkbox checkbox-info">
                                        {{--                                            {!! Form::checkbox('status',null,1,['class' => 'custom-control-input','id'=>'chkbox']) !!}--}}
                                        <input type="checkbox" name="status" value="1" class="custom-control-input" id="hChkbox" checked>
                                        <label class="custom-control-label" for="hChkbox">Aktif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3">Create</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        {{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>
    <script>
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            let forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            let validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    </script>
@endpush
