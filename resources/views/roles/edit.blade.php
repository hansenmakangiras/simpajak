@extends('layouts.app')

@push('css_custom')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_custom.css')}}">
@endpush
@section('content')

    <div class="layout-px-spacing">
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
                            <h2 class="display-4 mb-5  mt-4">Update User</h2>
                            <p class="lead mt-3 mb-4">Silahkan mengubah form disamping untuk menambahkan pengguna baru.
                            <hr class="my-4">
                            <p class="mb-5">It uses utility classes for typography and spacing to space content out within the larger container.</p>
                            <p class="lead">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <form>
                            <div class="form-group row mb-4">
                                <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Email</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="email" class="form-control" id="hEmail" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Password</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="password" class="form-control" id="hPassword" placeholder="">
                                </div>
                            </div>
                            <fieldset class="form-group mb-4">
                                <div class="row">
                                    <label class="col-form-label col-xl-2 col-sm-3 col-sm-2 pt-0">Choose Segements</label>
                                    <div class="col-xl-10 col-lg-9 col-sm-10">
                                        <div class="form-check mb-2">
                                            <div class="custom-control custom-radio classic-radio-info">
                                                <input type="radio" id="hRadio1" name="classicRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="hRadio1">Segements 1</label>
                                            </div>
                                        </div>
                                        <div class="form-check mb-2">
                                            <div class="custom-control custom-radio classic-radio-info">
                                                <input type="radio" id="hRadio2" name="classicRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="hRadio2">Segements 2</label>
                                            </div>
                                        </div>
                                        <div class="form-check disabled">
                                            <div class="custom-control custom-radio classic-radio-default">
                                                <input type="radio" id="hRadio3" name="classicRadio" class="custom-control-input" disabled>
                                                <label class="custom-control-label" for="hRadio3">Segements 3   ( disabled )</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-2">Apply</div>
                                <div class="col-sm-10">
                                    <div class="form-check pl-0">

                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="hChkbox">
                                            <label class="custom-control-label" for="hChkbox">Terms Conditions</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary mt-3">Lets Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

@endpush
