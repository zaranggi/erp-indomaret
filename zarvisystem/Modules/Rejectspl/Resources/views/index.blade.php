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
            <h5 class="card-title"> List :: Rejected SPL<br/>
            </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <table class="table datatable-button-html5-columns">
            <thead>
            <tr>
                <th >No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Start</th>
                <th>End</th>
                <th >Total</th>
                <th>Keterangan</th>
                <th>Progress</th>

            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach($data as $r)
                <tr class="font-size-sm">
                    <td align="center">{{ $no }}</td>
                    <td class="text-center">{{ $r->NIK }} - {{  $r->NAME}}</td>
                    <td class="text-center">{{  Tanggal::tgl_indo($r->TANGGAL) }}</td>

                    <td class="text-center">{{  $r->JAM_START}}</td>
                    <td class="text-center">{{  $r->JAM_END}}</td>
                    <td class="text-center">{{  $r->TOTAL_LEMBUR}} Jam</td>
                    <td class="text-left">{{  $r->KETERANGAN}} </td>
                    <td class="text-center">{{  $r->progress}}</td>

                </tr>
                <?php $no++; ?>
            @endforeach
            </tbody>
        </table>
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
    <script type="text/javascript">
        window.csrfToken = '<?php echo csrf_token(); ?>';
    </script>
@stop
