@extends('admin.layout')

@section('styles')

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('/global_assets/js/plugins/datepicker/datepicker3.css') }} ">

@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-9   ">

    <div class="card">

        <div class="card-header header-elements-inline ">

            <h4 class="card-title text-center text-indigo-400 font-weight-bold ">Report SPL<br/>

            </h4>

            <div class="header-elements">

                <div class="list-icons">

                    <a class="list-icons-item" data-action="collapse"></a>

                    <a class="list-icons-item" data-action="reload"></a>

                    <a class="list-icons-item" data-action="remove"></a>

                </div>

            </div>

        </div>

        <div class="card-body border-left-3 border-left-blue-400 rounded-left-0">

            <fieldset class="mb-3">

                <legend class="text-uppercase font-size-sm font-weight-bold text-primary-600">Form </legend>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/hisspl/spv') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if ( count( $errors ) > 0 )
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong>
                            There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2  font-weight-bold">Periode Lembur</label>
                        <div class="col-lg-10">
                            <div class="row">
                                    <div class="col-md-4">
                                        <input name="tanggal" type="text" data-date-format="yyyy-mm" class="form-control mb-3 mb-md-0" id="tanggal" placeholder="Periode Lembur">
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2  font-weight-bold">Departemen</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="dep" class="form-control form-control-uniform" data-fouc>
                                        @foreach($listdep as $r)
                                            <option value="{{ $r->id_dep }}" > {{ $r->name_department }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 font-weight-bold">Status Lembur</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="status_lembur" class="form-control form-control-uniform" data-fouc>
                                        <option value="2" selected> Approved </option>
                                        <option value="3" > Rejected </option>
                                        <option value="1" > Pending </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 font-weight-bold">Data Preview</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="jenis_view" class="form-control form-control-uniform" data-fouc>
                                        <option value="0" selected> Summary  </option>
                                        <option value="1" > Detail </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 ">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"
                                    onClick= "return confirm('Apakah Anda Yakin?')">
                                <i class="icon-eye4 ml-2"></i> Preview </button>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
    </div>
</div>

@stop

@section('scripts')

    <!-- Theme JS files -->

    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_input_groups.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/effects.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/extensions/mousewheel.min.js') }}"></script>
    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>

    <script src="{{ asset('/global_assets/js/moment.min.js') }} "></script>
    <script src="{{ asset('/global_assets/js/plugins/datepicker/bootstrap-datepicker.js') }} "></script>
    <!-- /theme JS files -->


    <script type="text/javascript">
        $(function () {

            //Date  picker
            $('#tanggal').datepicker({
                autoclose: true,
                todayHighlight: 1,
                startView: "months",
                minViewMode:  "months",
                maxViewMode:  "months",

                todayBtn:  1,
                endDate : new Date('<?php $kemarin  = mktime(0, 0, 0, date("m"), date("d")-1, date("Y")); $date= date("Y-m-d",$kemarin); echo $date;?>')
            });

        });

    </script>
    <!-- /theme JS files -->

@stop
