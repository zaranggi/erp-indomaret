<?php
use App\Helpers\Tanggal;

?>
@extends('admin.layout')

@section('styles')

    <style>
        table {
            table-layout:fixed;
        }
        table td {
            word-wrap: break-word;
        }
        .donny td {
            white-space:inherit;
        }
    </style>
@stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
 <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title text-indigo font-weight-semibold">Pengajuan Lembur</h6>
            <!--
            <div class="header-elements">
                <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button>
                <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Print</button>
            </div>
            -->
        </div>

@foreach($karyawan as $r_k)
    @endforeach
<div class="card-body">

    <div class="d-md-flex flex-md-wrap">
        <div class="mb-4 mb-md-2">
            <span class="text-muted ">Data Karyawan:</span>
            <ul class="list list-unstyled mb-0">
                <li><h5 class="my-2 text-primary font-weight-semibold">{{ $r_k->name }}</h5></li>
                <li><span class="my-2 text-warning font-weight-semibold" > {{ $r_k->name_jabatan }} </span> / <span class="my-2 text-success" >{{ $r_k->nik }}</span></li>
                <li> <h6 class=" text-primary-600">{{ $r_k->name_department }}</h6></li>

            </ul>
        </div>

    </div>
</div>
<form method="post" onsubmit="return postForm()" enctype="multipart/form-data" action="{{ route('pendspl.update', $r_k->nik) }}">

<div class="table-responsive">

        @csrf
        @method('PATCH')

        <table class="table donny table-sm table-bordered">
        <thead>
        <tr class="text-wrap">
            <th>Tanggal</th>
            <th>Jam Datang</th>
            <th>Jam Pulang</th>
            <th>Total Lembur </th>
            <th>Status Kerja</th>
            <th>Status Hari</th>
            <th>Keterangan Lembur</th>
            <th>Approval</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $x = 1;
            $total_normal = 0;
            $total_merah = 0;
            $total_jamnya = 0;
        ?>
            @foreach($data as $r)

                <tr class="<?php $r-> STATUS_HARI == "NORMAL" ? $d = " " : $d = "bg-danger-400"; echo $d;?>">
                    <td class="text-center font-size-sm"> {{ Tanggal::tgl_indo($r->TANGGAL)}} </td>
                    <td align="text-center font-size-sm">

                        <input type="hidden" name="id[]" value="{{ $r->id }}">
                        <input type="hidden" name="nik[]" value="{{ $r->id }}">
                        <input type="text" value="{{ $r->JAM_START }}" id="anytime-time{{$x}}" name="jam_start[]" class="col-md-10 form-control text-center"></td>
                    <?php
                    $x++;

                    ?>
                    <td align="text-center font-size-sm"> <input type="text" value="{{$r->JAM_END}}" id="anytime-time{{$x}}" name="jam_end[]" class="col-md-10 form-control text-center"> </td>
                    <td align="text-center font-size-sm"> <input type="text" value="{{$r->TOTAL_LEMBUR}}" name="total_lembur[]" class="col-md-10 form-control text-center"> </td>
                    <td class="text-center font-size-sm"> {{$r->STATUS_KERJA}} </td>
                    <td class="text-center font-size-sm"> {{$r->STATUS_HARI}} </td>
                    <td class="text-left font-size-xs"> {{$r->KETERANGAN}}</td>
                    <td class="text-center">
                        <span class="input-group-prepend ">
						    <span class="input-group-text">
							    <input type="checkbox" name="app[]" class="form-control-switchery">
                            </span>
						</span>
                    </td>
                </tr>
                <?php $x++;
                    if($r->STATUS_HARI == "NORMAL" ){

                            $total_normal = $total_normal + $r->TOTAL_LEMBUR;

                    }else{

                            $total_merah = $total_merah + $r->TOTAL_LEMBUR;

                    }
                    $total_jamnya = $total_jamnya + $r->TOTAL_LEMBUR;
                ?>
            @endforeach

        </tbody>
    </table>
</div>
<hr/>
<div class="row">

        <div class="col-md-4">

        </div>

        <div class="col-md-5">

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Total Hari Normal:</td>
                        <td  ><h5 > {{ $total_normal }} Jam</h5></td>
                    </tr>
                    <tr class="text-danger">
                        <td>Total Tanggal Merah:</td>
                        <td ><h5 > {{ $total_merah }} Jam</h5></td>
                    </tr>
                        <tr class="text-primary">
                            <th>Total Lembur:</th>
                            <td ><h5 class="font-weight-semibold">  {{ $total_jamnya }} Jam</h5></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr/>

            <button type="submit" class="btn btn-primary">Update<i class="icon-checkmark4  ml-2"></i></button>

            ||

            <a href="{{ url('pendspl') }}" class="btn btn-warning text-center">Back <i class="icon-backward2 ml-2"></i></a>


        </div>
</div>

    <hr/>


</form>

<div class="card-footer">
    <span class="text-muted  text-center">Jika ada kesalahan dalam input Surat Perintah Lembur, Silahkan hubungi EDP Jember. Terima Kasih.</span>
</div>
 </div>
        </div>
    </div>
<!-- /invoice template -->
@stop
@section('scripts')
    <!-- Theme JS files-->

    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/pickers/anytime.min.js') }}"></script>


    <script src="{{ asset('global_assets/js/datadelete.js') }} "></script>
    <script type="text/javascript">
        window.csrfToken = '<?php echo csrf_token(); ?>';
    </script>

    <script type="text/javascript">
         var InputGroups = function() {
            // Switchery
            var _componentSwitchery = function() {
                if (typeof Switchery == 'undefined') {
                    console.warn('Warning - switchery.min.js is not loaded.');
                    return;
                }

                // Initialize
                var elems = Array.prototype.slice.call(document.querySelectorAll('.form-control-switchery'));
                elems.forEach(function(html) {
                    var switchery = new Switchery(html);
                });
            };

            return {
                init: function() {
                    _componentSwitchery();
                }
            }
        }();

        document.addEventListener('DOMContentLoaded', function() {
            InputGroups.init();
        });


    </script>

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
                <?php
                    for($i=1;$i<=20;$i++){

                ?>
                // Time picker
                $('#anytime-time<?php echo $i;?>').AnyTime_picker({
                    format: '%H:%i'
                });

                <?php

                    }
                ?>


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
        $("form").submit(function () {

            var this_master = $(this);

            this_master.find('input[type="checkbox"]').each( function () {
                var checkbox_this = $(this);


                if( checkbox_this.is(":checked") == true ) {
                    checkbox_this.attr('value','on');
                } else {
                    checkbox_this.prop('checked',true);
                    //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
                    checkbox_this.attr('value','off');
                }
            })
        })

    </script>
@stop
