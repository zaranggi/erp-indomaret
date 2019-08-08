@extends('admin.layout')

@section('styles')

@stop

@section('content')

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
                            <a href="{{ url('listpdo/preview/'. $r->kode_trx) }}" class="text-pink-400" >
                                <i class="icon-cart m-2"></i>Preview
                            </a>
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

