@extends('admin.layout')



@section('styles')



@stop



@section('content')



    <!-- Basic initialization -->

    <div class="card">

        <div class="card-header header-elements-inline">

            <h5 class="card-title"> Menu Configuration<br/>



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

            <a href="{{ route('menu.create') }}" class="btn  btn-primary">

                <i class="icon-plus3 "></i> Add New Menu

            </a>

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

                <th >ID</th>

                <th>Name</th>

                <th >Link</th>

                <th>Active</th>

                <th>ID Main </th>

                <th> </th>



            </tr>

            </thead>

            <tbody>

            @foreach($listmenu as $r)

                <tr>

                    <td align="center">{{ $r->id }}</td>

                    <td>{{ $r->name_menu }}</td>

                    <td >{{  $r->link }}</td>

                    <td >{{  $r->active }}</td>

                    <td >{{  $r->id_main }}</td>

                    <td class="text-center">

                        <div class="list-icons">

                            <div class="dropdown">

                                <a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">

                                    <i class="icon-menu9"></i>

                                </a>



                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-158px, 19px, 0px);">

                                    <a href="{{ route('menu.edit', $r->id) }}" class="dropdown-item">

                                        <i class="icon-pencil5 "></i> Edit

                                    </a>



                                    <a href="{{ route('menu.destroy', $r->id) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow" class="dropdown-item">

                                        <i class="icon-trash "></i> Delete

                                    </a>



                                </div>

                            </div>

                        </div>

                    </td>





                </tr>

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

