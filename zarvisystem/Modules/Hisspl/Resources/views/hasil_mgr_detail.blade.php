<?php
use App\Helpers\Tanggal;

?>
@extends('admin.layout')

@section('styles')

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('/global_assets/js/plugins/datepicker/datepicker3.css') }} ">
@stop
@section('content')

    <!-- Basic initialization -->


    <div class="card">
        <div class="card-header header-elements-inline">

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
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/hisspl/mgr') }}">

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
                                        <option value="4" selected> Approved </option>
                                        <option value="5" > Rejected </option>
                                        <option value="2" > Pending </option>
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
        <hr/>

        @foreach($depdetail as $x)
                <?php
            $namadep = $x->name_department;


            ?>
            @endforeach

        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <span class="font-size-sm text-uppercase font-weight-semibold">Department :: {{ $namadep }}</span>
            <span class="font-size-sm text-uppercase font-weight-semibold font-weight-bold">{{ \App\Helpers\Tanggal::periode($periode) }}</span>
            <span class="font-size-sm text-uppercase font-weight-semibold">Status ::
                @if($status_lembur == 4)
                    <?php echo  "Aproved"; ?>
                @elseif($status_lembur == 5)
                    <?php echo "Rejected"; ?>
                @elseif($status_lembur == 2)
                    <?php echo "Pending"; ?>
                @endif</span>
        </div>

        <div class="card-header header-elements-inline">
            <h5 class="card-title text-success font-weight-bold"> Manager : {{ Auth::user()->name }}<br/></h5>
        </div>

        <div class="card-body border-left-3 border-left-blue-400 rounded-left-0">

            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th >No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status Kerja</th>
                    <th>Start</th>
                    <th>End</th>
                    <th >OT</th>
                    <th >LN</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;

                $TOTAL_HARI = 0;
                $total_normal = 0;
                $total_merah = 0;
                $total_jamnya = 0;
                ?>
                @foreach($data as $r)
                    <tr class="font-size-sm">
                        <td align="center">{{ $no }}</td>
                        <td class="text-left">{{ $r->NIK }} - {{  $r->NAME}}</td>
                        <td class="text-center">{{  Tanggal::tgl_indo($r->TANGGAL) }}</td>

                        <td class="text-center"> {{$r->STATUS_KERJA}} </td>
                        <td class="text-center">{{  $r->JAM_START}}</td>
                        <td class="text-center">{{  $r->JAM_END}}</td>

                        <td class="text-center">{{  $r->TOTAL_NORMAL}} Jam</td>
                        <td class="text-center">{{  $r->TOTAL_MERAH}} Jam</td>
                        <td class="text-left">{{  $r->KETERANGAN}} Jam</td>



                    </tr>
                    <?php
                    $TOTAL_HARI = $no;
                    if($r->STATUS_HARI == "NORMAL"){
                        $total_normal = $total_normal + $r->TOTAL_LEMBUR;
                    }else{
                        $total_merah = $total_merah + $r->TOTAL_LEMBUR;
                    }
                    $total_jamnya = $total_jamnya + $r->TOTAL_LEMBUR;

                    $no++;
                    ?>

                @endforeach

                </tbody>
                <tfoot>
                <tr class="font-size-md bg-info">
                    <td class="text-center" colspan="6"> Grand Total </td>
                    <td class="text-center">{{  number_format($total_normal,1) }} Jam</td>
                    <td class="text-center">{{  number_format($total_merah,1) }} Jam</td>
                    <td></td>
                </tr>

                </tfoot>

            </table>
        </div>
    </div>
    <!-- /basic initialization -->
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
