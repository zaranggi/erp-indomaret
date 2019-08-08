<?php
use App\Helpers\Tanggal;

?>
@extends('admin.layout')

@section('styles')

@stop
@section('content')

    <!-- Basic initialization -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"> List Pending SPL<br/>
            </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        @if(Auth::user()->id_jabatan == 34)
            <form method="post" action="{{ url('/pendspl/mgr') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 font-weight-bold">Pilih Supervisor : </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="nik"  class="form-control form-control-uniform" data-fouc>
                                        <option value="all" selected> All Supervisor </option>
                                        @foreach($listspv as $r)
                                                <option value="{{$r->nik}}" > {{$r->nik}} - {{$r->name}} ( {{$r->name_department}} )</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <div class="text-left">

                                    <button type="submit" class="btn bg-pink-400 legitRipple"> <i class="icon-search4  ml-auto"></i> Preview </button>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        @endif


        <table class="table datatable-button-html5-columns" id="example">
            <thead>
            <tr>
                <th >No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Total Hari</th>
                <th>Total Lembur (Jam)</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=1;
            $totalan_hari = 0;
            $totalan_lembur = 0;
            ?>
            @foreach($data as $r)
                <tr>
                    <td align="center">{{ $no }}</td>
                    <td class="text-center">{{ $r->NIK }}</td>
                    <td >{{  $r->NAME}}</td>
                    <td class="text-center">{{  $r->total_hari}} Hari</td>
                    <td class="text-center">{{  $r->total_lembur}} Jam</td>
                    <td class="text-center">
                        <a href="{{ route('pendspl.edit', $r->NIK) }}" class="text-warning font-weight-bold">
                            <i class="icon-pencil5 "></i> Edit
                        </a>
                    </td>
                </tr>
                <?php $no++;
                $totalan_hari = $totalan_hari + $r->total_hari;
                $totalan_lembur = $totalan_lembur + $r->total_lembur;
                ?>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="text-center font-weight-bold bg-blue-300">
                <td colspan="3" class="text-center"> Grand Total Lembur</td>
                <td> {{$totalan_hari}} Hari</td>
                <td>{{$totalan_lembur}} Jam</td>
                <td></td>
            </tr>
            </tfoot>
        </table>

        <hr/>
        <div class="col-12">
            <div class="text-center">
                @if($no > 1)
                    <form method="post" action="{{ url('/pendspl/mgr/app') }}">
                        @csrf
                        <input type="hidden" name="nik" value="all">
                        <button type="submit" class="btn bg-success-400 legitRipple"> <i class="icon-quill4   ml-auto"></i> Approve All </button>
                    </form>
                @endif

            </div>

        </div>
        <hr/>

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
    <script src="{{ asset('global_assets/js/datadelete.js') }} "></script>

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>

    <script type="text/javascript">
        window.csrfToken = '<?php echo csrf_token(); ?>';
    </script>


@stop
