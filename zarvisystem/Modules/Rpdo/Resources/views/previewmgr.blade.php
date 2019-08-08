@extends('admin.layout')

@section('styles')

@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-9   ">

        <div class="card">

            <div class="card-header bg-transparent header-elements-inline text-center text-primary">
                <h4 class="card-title font-weight-bold">Pengajuan Dana Operasional</h4>
            </div>

            <div class="card-body border-left-3 border-left-blue-400 rounded-left-0">
                @foreach($depnya as $r)
                <?php $status = $r->status_pdo; ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <img src="{{ asset("images/indomaret.png") }} "  class="mb-3 mt-2" alt=""  >
                            <ul class="list list-unstyled mb-0">

                                    <li>PT. Indomarco Prismata</li>
                                <li>{{ $r->name_department }}</li>
                                <li><span class="font-weight-semibold text-indigo">{{ $r->nama_spv }}</span></li>

                                    <li>Cabang Jember</li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-4">
                            <div class="text-sm-right">
                                <ul class="list list-unstyled mb-0">
                                    <li>Created at: <span class="font-weight-semibold text-warning">{{ \App\Helpers\Tanggal::indonesian_date($r->tanggal_pdo)}}</span></li>


                                </ul>

                                <h5 class="text-primary mb-2 mt-md-2">{{ $r->kode_trx }}</h5>
                                <span class="text-success mb-2 font-weight-bold"> Minggu Ke - {{ $r->minggu}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


                <fieldset class="mb-3">
                    <div class="row">
                        <div class="col-lg-8 form-control font-weight-bold text-primary-600 text-center font-size-lg ">
                            Keterangan
                        </div>
                        <div class="col-lg-4 form-control font-weight-bold text-primary-600 text-center font-size-lg ">
                            Jumlah
                        </div>


                    </div>

                        <?php
                            $no = 1;
                            $total = 0;
                            ?>
                        @foreach($data as $r)
                        <div class=" row">
                            <div class="col-lg-8 form-control">
                             {{ $no.". ".$r->nama_akun }}  </div>

                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group-feedback form-group-feedback-left">
                                            <input type="text" data-symbol="Rp "  value="{{ number_format($r->rp_pengajuan) }}" style="text-align: right;" class="form-control dp"  id="currency{{$no}}" readonly>
                                            <div class="form-control-feedback form-control-feedback-lg">
                                               Rp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php

                        $total += $r->rp_pengajuan;
                        $no++;?>
                        @endforeach
                        <div class=" row">
                            <legend class="text-uppercase font-size-sm font-weight-bold text-primary-600">15. Uang Muka per Departemen ::
                            </legend>
                        </div>
                <?php
                            $nox = 1;
                            $total_umd = 0;
                            ?>
                    @foreach($bawah as $r)
                        <div class=" row">
                            <div class="col-lg-1 form-control">
                            </div>
                            <div class="col-lg-5 form-control">
                                {{ $nox.". ".$r->nama_akun }}  </div>

                            <div class="col-lg-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group-feedback form-group-feedback-left">
                                            <input type="text" data-symbol="Rp "  value="{{ number_format($r->rp_pengajuan) }}" style="text-align: right;" class="form-control dp"  id="currency{{$no}}" readonly>
                                            <div class="form-control-feedback form-control-feedback-lg">
                                                Rp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $total += $r->rp_pengajuan;
                        $total_umd += $r->rp_pengajuan;
                        $nox++;?>

                    @endforeach
                    <div class=" row">
                        <div class="col-lg-8 form-control text-center text-warning font-weight-bold">
                            Total  UMD </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group-feedback form-group-feedback-left">
                                        <input type="text" data-symbol="Rp "  value="{{ number_format($total_umd) }}" style="text-align: right;" class="form-control text-warning font-weight-bold"  id="currency{{$no}}" readonly>
                                        <div class="form-control-feedback form-control-feedback-lg">
                                            Rp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-lg-8 form-control">
                            16. Lain-Lain  </div>

                        @foreach($bawah2 as $r)
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group-feedback form-group-feedback-left">
                                        <input type="text" data-symbol="Rp "  value="{{ number_format($r->rp_pengajuan) }}" style="text-align: right;" class="form-control dp"  id="currency{{$no}}" readonly>
                                        <div class="form-control-feedback form-control-feedback-lg">
                                            Rp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>


                    <div class="row">
                        <div class="col-lg-8 form-control font-weight-bold text-primary-600 text-center font-size-lg ">
                            Total Pengajuan  </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group-feedback form-group-feedback-left">
                                        <input type="text" data-symbol="Rp "  value="{{ number_format($total) }}" style="text-align: right;" class="form-control font-weight-bold text-primary-600 font-size-lg"  readonly>
                                        <div class="form-control-feedback form-control-feedback-lg font-weight-bold text-primary">
                                            Rp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <br/>
                            <br/>
                            <br/>

                        <div class=" row">
                            <div class="col-md-12 text-center">
                                <a href="{{ url('rpdo')  }}" class="btn btn-warning text-center">Back <i class="icon-backward2 ml-2"></i></a>

                            </div>

                        </div>

                    </form>

                </fieldset>

            </div>
        </div>

    </div>
</div>

@stop

@section('scripts')



@stop
