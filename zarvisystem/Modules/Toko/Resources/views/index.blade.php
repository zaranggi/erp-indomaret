@extends('admin.layout')

@section('styles')

@stop
@section('content')


    <!-- Invoice archive -->
    <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">Daftar Toko Sewa </h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <table class="table invoice-archive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Akte Sewa</th>
                    <th>Toko</th>
                    <th>Kota</th>
                    <th>Alamat</th>
                    <th>Tanggal Sewa</th>
                    <th>Jatuh Tempo</th>
                    <th>keterangan</th>
                    <th>Act</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach($data as $r)
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td class="text-center text-warning">{{$r->akte}}</td>
                        <td>{{$r->kdtk}} - {{$r->nama}}</td>
                        <td class="text-center text-indigo-700">{{$r->kota}}</td>
                        <td>{{$r->alamat}}</td>
                        <td class="text-center"> <span class="badge badge-info font-size-md">{{ \App\Helpers\Tanggal::tgl_indo($r->tanggal_sewa)}}</span></td>
                        <td class="text-center">
                            <span class="badge badge-success">{{ \App\Helpers\Tanggal::tgl_indo($r->jatuh_tempo)}}</span>
                        </td>

                        <td class="text-center  ">
                            <i class="icon-alarm m-2 text-warning"></i> {{ number_format(\App\Helpers\Tanggal::selisih_hari(date($r->jatuh_tempo))) }} Hari
                        </td>

                        <td class="text-center">
                            <a href="{{ url('listpdo/preview/'. $r->kode_trx) }}" class="text-pink-400" >
                                <i class="icon-cart m-2"></i>Preview
                            </a>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>

        </table>
    </div>
    <!-- /invoice archive -->

@stop
@section('scripts')
    <!-- Theme JS files-->
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript">
        /* ------------------------------------------------------------------------------
 *
 *  # Invoice archive
 *
 *  Demo JS code for invoice_archive.html page
 *
 * ---------------------------------------------------------------------------- */


        // Setup module
        // ------------------------------

        var InvoiceArchive = function() {


            //
            // Setup module components
            //

            // Datatable
            var _componentDatatable = function() {
                if (!$().DataTable) {
                    console.warn('Warning - datatables.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.invoice-archive').DataTable({
                    autoWidth: false,

                    order: [[ 0, 'desc' ]],
                    dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
                    language: {
                        search: '<span>Filter:</span> _INPUT_',
                        searchPlaceholder: 'Type to filter...',
                        lengthMenu: '<span>Show:</span> _MENU_',
                        paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                    },
                    lengthMenu: [ 25, 50, 75, 100 ],
                    displayLength: 25,
                    drawCallback: function ( settings ) {
                        var api = this.api();
                        var rows = api.rows( {page:'current'} ).nodes();
                        var last=null;

                        api.column(3, {page:'current'} ).data().each( function ( group, i ) {
                            if ( last !== group ) {
                                $(rows).eq( i ).before(
                                    '<tr class="table-active table-border-double"><td colspan="9" class="font-weight-semibold">'+group+'</td></tr>'
                                );

                                last = group;
                            }
                        });

                        // Initializw Select2
                        if (!$().select2) {
                            console.warn('Warning - select2.min.js is not loaded.');
                            return;
                        }
                        $('.form-control-select2').select2({
                            width: 150,
                            minimumResultsForSearch: Infinity
                        });
                    }
                });
            };

            // Select2 for length menu styling
            var _componentSelect2 = function() {
                if (!$().select2) {
                    console.warn('Warning - select2.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.dataTables_length select').select2({
                    minimumResultsForSearch: Infinity,
                    dropdownAutoWidth: true,
                    width: 'auto'
                });
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _componentDatatable();
                    _componentSelect2();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
            InvoiceArchive.init();
        });


    </script>

@stop
