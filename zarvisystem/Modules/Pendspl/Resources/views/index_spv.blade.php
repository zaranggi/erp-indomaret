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


        <table class="table datatable-button-html5-columns">
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
            <?php $no=1; ?>
            @foreach($data as $r)
                <tr>
                    <td align="center">{{ $no }}</td>
                    <td class="text-center">{{ $r->NIK }}</td>
                    <td >{{  $r->NAME}}</td>
                    <td class="text-center">{{  $r->total_hari}} Hari</td>
                    <td class="text-center">{{  $r->total_lembur}} Jam</td>

                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
                                    <i class="icon-menu9"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-158px, 19px, 0px);">

                                    <a href="{{ route('pendspl.edit', $r->NIK) }}" class="dropdown-item">
                                        <i class="icon-pencil5 "></i> Edit
                                    </a>

                                </div>


                            </div>
                        </div>
                    </td>

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
