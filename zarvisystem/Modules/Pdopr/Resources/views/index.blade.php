@extends('admin.layout')

@section('styles')

@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-9   ">

    <div class="card">

        <div class="card-header header-elements-inline ">

            <h4 class="card-title text-center text-indigo-400 font-weight-bold ">Pengajuan Dana Operasional<br/>

            </h4>

            <div class="header-elements">

                <div class="list-icons">

                    <a class="list-icons-item" data-action="collapse"></a>

                    <a class="list-icons-item" data-action="reload"></a>

                    <a class="list-icons-item" data-action="remove"></a>

                </div>

            </div>

        </div>

        <div class="card-body border-left-3 border-left-blue-400 rounded-left-0">
            @if(Session::has('flash_message'))

                <div class="alert alert-info ">

              <span class="glyphicon glyphicon-ok">



              </span><em>  ~  {{ Session::get('flash_message') }}</em>

                </div>

            @endif

            <fieldset class="mb-3">

                <legend class="text-uppercase font-size-sm font-weight-bold text-primary-600">Form Budgeting ::
                </legend>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/pdopr') }}">


                <div class=" row">
                    <div class="col-lg-2 form-control">
                        <span class="text-warning font-weight-bold">PDO Minggu ke : </span> </div>

                    <div class="col-lg-1">
                        <div class="row">
                            <div class="col-md-12">
                                    <select name="minggu"  class="form-control" required>
                                        <option value="1" selected="selected">1</option>
                                        <option value="2" >2</option>
                                        <option value="3" >3</option>
                                        <option value="4" >4</option>
                                        <option value="5" >5</option>
                                    </select>

                            </div>
                        </div>
                    </div>
                </div>


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
                    <?php $no = 1;?>
                    @foreach($data as $r)
                        <div class=" row">
                            <div class="col-lg-8 form-control">
                             {{ $no.". ".$r->nama }}  </div>

                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group-feedback form-group-feedback-left">
                                            <input type="text" name="akun_{{ $r->id }}"  data-symbol="Rp "  value="0" style="text-align: right;" class="form-control dp"  id="currency{{$no}}">
                                            <div class="form-control-feedback form-control-feedback-lg">
                                               Rp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $no++;?>
                    @endforeach
                    <hr/>
                    <div class=" row">
                        <legend class="text-uppercase font-size-sm font-weight-bold text-primary-600">15. Uang Muka per Departemen ::
                            <button type="button" class="add_field_button btn btn-warning btn-sm ml-3">
                                <i class="icon-plus-circle2"></i>
                            </button>


                        </legend>
                    </div>
                    <div class="input_fields_wrap">

                    </div>
                    <legend class="text-uppercase font-size-sm font-weight-bold text-primary-600">
                    </legend>

                    <div class=" row">
                        <div class="col-lg-8 form-control">
                            16. Lain - lain</div>

                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group-feedback form-group-feedback-left">
                                        <input type="text" name="nilai16"  data-symbol="Rp "  value="0" style="text-align: right;" class="form-control dp"  id="currency100">
                                        <div class="form-control-feedback form-control-feedback-lg">
                                            Rp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 form-control font-weight-bold text-primary-600 text-center font-size-lg ">
                            Total Pengajuan  </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group-feedback form-group-feedback-left">
                                        <input type="text"  id="total" style="text-align: right;" class="form-control font-weight-bold text-primary-600 font-size-lg"  readonly>
                                        <div class="form-control-feedback form-control-feedback-lg font-weight-bold text-primary">
                                            Rp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <legend class="text-uppercase font-size-sm font-weight-bold text-primary-600">
                    </legend>

                    <div class=" row">
                        <div class="col-md-11 ">

                            <div class="text-right">

                                <button type="submit" class="btn btn-primary"
                                        onClick= "return confirm('Apakah Anda Yakin?')">
                                    Save <i class="icon-paperplane ml-2"></i></button>

                            </div>

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

    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/jquery.maskMoney.min.js') }}"></script>


    <!-- /theme JS files -->
    <script>
        $(document).ready(function() {
            @for($i = 1; $i<= $no- 1; $i++)
                    $('#currency{{$i}}').maskMoney({allowNegative: false, thousands:',', decimal:'.', precision:0, allowZero:true, thousandsStay:false });
            @endfor
            $('#currency100').maskMoney({allowNegative: false, thousands:',', decimal:'.', precision:0, allowZero:true, thousandsStay:false });

            $("form").submit(function() {
                    @for($i = 1; $i<= $no-1; $i++)
                        var saldoawal = intVal($('#currency{{$i}}').val());
                        $('#currency{{$i}}').val(saldoawal);
                    @endfor

                    @for($i = 1; $i<= 10; $i++)
                        var saldoawal2 = intVal($('#nilai_tambahan{{$i}}').val());
                        $('#nilai_tambahan{{$i}}').val(saldoawal2);
                    @endfor
            });
            $(document).on('blur', "[id^=currency]", function(){
                calculateTotal();
            });

        });

        function tandaPemisahTitik(b){
            var _minus = false;
            if (b<0) _minus = true;
            b = b.toString();
            b=b.replace(",","");
            b=b.replace("-","");
            c = "";
            panjang = b.length;
            j = 0;
            for (i = panjang; i > 0; i--){
                j = j + 1;
                if (((j % 3) == 1) && (j != 1)){
                    c = b.substr(i-1,1) + "," + c;
                } else {
                    c = b.substr(i-1,1) + c;
                }
            }
            if (_minus) c = "-" + c ;
            return c;
        }

        var intVal = function ( i ) {
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        function calculateTotal(){
            var totalAmount = 0;
            $("[id^='currency']").each(function() {
                var id = $(this).attr('id');

                id = id.replace("currency",'');

                var rp = $('#currency'+id).val();
                rp = intVal(rp);

                totalAmount += rp;

            });


            $('#total').val(tandaPemisahTitik(parseFloat(totalAmount)));
        }

    </script>




    <script type="text/javascript">
        $(document).ready(function() {
            var x = 20;
            var max_fields      = 40;
            $(".add_field_button").click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){
                    x++; //text box increment
                    i = $( '<div class="row"><div class="col-lg-6">  <input type="text" placeholder="Isikan Nama UMD" name="akun_tambahan[]"  class="form-control" required></div><div class="col-lg-2"><div class="row"><div class="col-md-12"><div class="form-group-feedback form-group-feedback-left"><input type="text" name="nilai_tambahan[]"  data-symbol="Rp "  value="0" style="text-align: right;" id="currency'+ x +'" class="form-control dp'+ x +'"><div class="form-control-feedback form-control-feedback-lg">Rp</div> </div></div> </div> </div><label class="col-form-label col-lg-4"><i class="icon-cancel-square  remove_field text-danger "> </i></label></div>');
                    //re-init mask money to apply new added input
                    $(".input_fields_wrap").append(i); //add input box
                    i.find('.dp' + x).maskMoney({allowNegative: false, thousands:',', decimal:'.', precision:0, allowZero:true, thousandsStay:false });
                }
            });

            $(".input_fields_wrap").on('click', '.remove_field', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).closest("div").remove(); //Remove field html
                calculateTotal();
                x--; //Decrement field counter
            });

        });

    </script>


@stop
