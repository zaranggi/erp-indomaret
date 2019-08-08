<?php
use App\Helpers\Tanggal;

?>
@extends('admin.layout')

@section('styles')

@stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-11   ">
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

<div class="table-responsive">
    <table class="table table-lg table-bordered">
        <thead>
        <tr>
            <th>NIK</th>
            <th>Tanggal</th>
            <th>Jam Datang</th>
            <th>Jam Pulang</th>
            <th>Total Lembur</th>
            <th>Status Kerja</th>
            <th>Status Hari</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total_normal = 0;
        $total_merah = 0;
        $total_jamnya = 0;
        ?>
            @foreach($data as $r)
                <tr>
                    <td class="text-center"> {{$r->NIK}}</td>
                    <td class="text-center"> {{ Tanggal::tgl_indo($r->TANGGAL)}} </td>
                    <td class="text-center"> {{$r->JAM_START}}</td>
                    <td class="text-center"> {{$r->JAM_END}} </td>
                    <td class="text-center"> {{$r->TOTAL_LEMBUR}} </td>
                    <td class="text-center"> {{$r->STATUS_KERJA}} </td>
                    <td class="text-center"> {{$r->STATUS_HARI}} </td>
                    <td class="text-center"> {{$r->KETERANGAN}} </td>
                </tr>
                <?php
                    if($r->STATUS_HARI == "NORMAL"){
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

<div class="card-body">
    <div class="d-md-flex flex-md-wrap">
        <div class="pt-2 mb-3">

        </div>

        <div class="pt-2 mb-3 wmin-md-200 ml-auto">

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Total Hari Normal:</td>
                        <td  ><h5 > {{ $total_normal }} Jam</h5></td>
                    </tr>
                    <tr>
                        <td>Total Tanggal Merah:</td>
                        <td ><h5 > {{ $total_merah }} Jam</h5></td>
                    </tr>
                    <tr>
                        <th>Total Lembur:</th>
                        <td class=" text-primary"><h5 class="font-weight-semibold">  {{ $total_jamnya }} Jam</h5></td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <div class="text-center">
        <a href="{{ url('pendspl')  }}" class="btn btn-warning text-center">Back <i class="icon-backward2 ml-2"></i></a>

    </div>

</div>

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
