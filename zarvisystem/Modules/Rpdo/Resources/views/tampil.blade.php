@extends('admin.layout')

@section('styles')

    <link rel="stylesheet" href="{{ asset('/global_assets/js/plugins/datepicker/datepicker3.css') }} ">
    <script type="text/javascript">
        function openwindow(linknya)
        {
            window.open(linknya,"location=0,menubar=0,resizable=1,width=400,height=300");
        }
    </script>
@stop

@section('content')


            <div class="card">

                <div class="card-header header-elements-inline ">

                    <h4 class="card-title text-center text-indigo-400 font-weight-bold ">Report PDO<br/>

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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/rpdo/tampillist') }}">

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
                                <label class="col-form-label col-lg-2  font-weight-bold">Departemen</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="dep" class="form-control form-control-uniform" data-fouc required>
                                                @foreach($listdep as $r)
                                                    <option value="{{ $r->id }}" > {{$r->name_department}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2  font-weight-bold">Periode PDO</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input name="tanggal" type="text" data-date-format="yyyy-mm" class="form-control mb-3 mb-md-0" id="tanggal" placeholder="Periode PDO" required>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-lg-2  font-weight-bold">Minggu ke</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="minggu" class="form-control form-control-uniform" data-fouc required>
                                                <option value="all" selected> Satu Bulan </option>
                                                <option value="1" > 1 </option>
                                                <option value="2" > 2 </option>
                                                <option value="3" > 3 </option>
                                                <option value="4" > 4 </option>
                                                <option value="5" > 5 </option>
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


    <!-- Basic initialization -->

    <div class="card">

        <div class="card-header header-elements-inline">

            <h5 class="card-title"> List Permohonan Dana Operasional<br/>

            </h5>

            <div class="header-elements">

                <div class="list-icons">

                    <a class="list-icons-item" data-action="collapse"></a>

                    <a class="list-icons-item" data-action="reload"></a>

                    <a class="list-icons-item" data-action="remove"></a>

                </div>

            </div>

        </div>

        <div class="card-body">


            @if(Session::has('flash_message'))

                <div class="alert alert-info ">

              <span class="glyphicon glyphicon-ok">

              </span><em>  ~  {{ Session::get('flash_message') }}</em>

                </div>

            @endif

        </div>

        <table class="table datatable-button-html5-columns">

            <thead>
            <tr>

                <th >No</th>

                <th>Kode</th>
                <th>Departemen</th>

                <th>Minggu Ke</th>

                <th >Tanggal Pengajuan</th>

                <th>Total</th>

                <th>Status </th>

                <th> </th>

            </tr>

            </thead>

            <tbody>
            <?php $no=1; ?>
            @foreach($list as $r)

                <tr>

                    <td class="text-center">{{ $no }}</td>

                    <td class="text-center">{{ $r->kode_trx }}</td>
                    <td class="text-center">{{ $r->name_department }}</td>
                    <td class="text-center">{{ $r->minggu }}</td>

                    <td class="text-center">{{ \App\Helpers\Tanggal::tgl_indo($r->tanggal_pdo) }}</td>

                    <td class="text-right">Rp {{  number_format($r->total_pdo) }}</td>

                    <td class="text-center">
                        <?php
                            $varstatus = "";
                            if($r->status_pdo == 1){
                                $varstatus = "warning";
                            }elseif($r->status_pdo == 2){
                                $varstatus = "primary";
                            }elseif($r->status_pdo == 4){
                                $varstatus = "success";
                            }else{
                                $varstatus = "danger";
                            }
                        ?>
                        <span class="badge badge- badge-{{$varstatus}} float-center">{{  $r->progress }}</span>
                    </td>

                    <td class="text-center">
                            <a href="#" class="text-pink-400"
                               onclick="javascript: openwindow('{{ url('rpdo/previewdbm/'. $r->kode_trx) }}')">
                                <i class="icon-cart m-2"></i>Preview
                            </a>
                    </td>

                </tr>
                <?php $no++; ?>

            @endforeach

            </tbody>

        </table>

    </div>

    <!-- /basic initialization {{ url('rpdo/previewdbm/'. $r->kode_trx) }} -->

@stop

@section('scripts')

    <!-- Theme JS files-->

    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/buttons.min.js') }} "></script>

    <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
    <script src="{{ asset('global_assets/js/datadelete.js') }} "></script>

    <!-- Theme JS files -->

    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
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

    <script type="text/javascript">

        window.csrfToken = '<?php echo csrf_token(); ?>';

    </script>

@stop

