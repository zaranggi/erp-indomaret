@extends('admin.layout')

@section('styles')

@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-9   ">

    <div class="card">

        <div class="card-header header-elements-inline ">

            <h4 class="card-title text-center text-indigo-400 font-weight-bold ">Pengajuan Lembur<br/>

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
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/spl') }}">

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
                        <label class="col-form-label col-lg-2">Tanggal Lembur</label>
                        <div class="col-lg-10">
                            <div class="row">
                                    <div class="col-md-4">
                                        <input name="tanggal" type="text" date-format="YYYY-mm-dd" class="form-control mb-3 mb-md-0" id="tanggal" placeholder="Tanggal Lembur">
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Jam Lembur</label>
                        <div class="col-lg-10">
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-watch2"></i></span>
                                            </span>
                                            <input type="text" name="jam_start" class="form-control" id="anytime-time" placeholder="Jam Datang">
                                        </div>
                                    </div>
                                <div class="col-md-1">
                                    <label class="col-form-label ">Sampai</label>

                                </div>

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-watch2"></i></span>
                                            </span>
                                            <input type="text" name="jam_end" class="form-control" id="anytime-time2" placeholder="Jam Pulang">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Total Lembur</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-watch2"></i></span>
                                            </span>
                                    <input type="text" name="total_lembur" class="form-control"  placeholder="Lembur">
                                    </div>

                                </div>
                                <label class="col-form-label col-lg-2">Jam </label>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Status Kerja</label>
                        <div class="col-lg-10">
                            <div class="row">
                                    <div class="col-md-2">
                                        <select name="status_kerja" class="form-control form-control-uniform" data-fouc>

                                            <option value="NON SHIFT" selected> NON SHIFT </option>
                                            <option value="SHIFT"> SHIFT </option>
                                        </select>
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Status Hari Lembur</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-2">
                                        <select name="status_hari" class="form-control form-control-uniform" data-fouc>
                                            <option value="NORMAL" selected> Normal </option>
                                            <option value="MERAH"> Merah </option>
                                        </select>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Keterangan  </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" name="keterangan" class="form-control form-control-lg" placeholder="keterangan">
                                        <div class="form-control-feedback form-control-feedback-lg">
                                            <i class="icon-make-group"></i>
                                        </div>
                                        <strong style="color:red">{{ $errors->first('keterangan') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-10 ">

                        <div class="text-right">

                            <button type="submit" class="btn btn-primary"
                                    onClick= "return confirm('Apakah Anda Yakin?')">
                                Save <i class="icon-paperplane ml-2"></i></button>

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
    <script src="{{ asset('global_assets/js/plugins/pickers/anytime.min.js') }}"></script>


    <script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>
    <!-- /theme JS files -->

    <script type="text/javascript">
        /* ------------------------------------------------------------------------------
 *
 *  # Date and time pickers
 *
 *  Demo JS code for picker_date.html page
 *
 * ---------------------------------------------------------------------------- */
         var DateTimePickers = function() {

            // Anytime picker
            var _componentAnytime = function() {
                if (!$().AnyTime_picker) {
                    console.warn('Warning - anytime.min.js is not loaded.');
                    return;
                }

                // Time picker
                $('#anytime-time').AnyTime_picker({
                    format: '%H:%i'
                });
                // Time picker
                $('#anytime-time2').AnyTime_picker({
                    format: '%H:%i'
                });

            };

            return {
                init: function() {
                    _componentAnytime();
                }
            }
        }();
        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
            DateTimePickers.init();
        });

    </script>
    <script type="text/javascript">
        /* ------------------------------------------------------------------------------
*
*  # jQuery UI forms
*
*  Demo JS code for jqueryui_forms.html page
*
* ---------------------------------------------------------------------------- */
        var JqueryUiForms = function() {

            // Datepicker
            var _componentUiDatepicker = function() {
                if (!$().datepicker) {
                    console.warn('Warning - jQuery UI components are not loaded.');
                    return;
                }

                // From
                $('#tanggal').datepicker({
                    numberOfMonths: 1,
                    dateFormat: "yy-mm-dd",
                    minDate: 0,
                    //onClose: function( selectedDate ) {
                      //  $( '#tanggal' ).datepicker( 'option', 'minDate', selectedDate );
                    //},
                    isRTL: $('html').attr('dir') == 'rtl' ? true : false
                });

            };

            return {
                init: function() {
                    _componentUiDatepicker();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
            JqueryUiForms.init();
        });

    </script>
    <!-- /theme JS files -->

@stop
