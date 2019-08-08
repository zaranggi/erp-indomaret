@extends('admin.layout')

@section('styles')

    <link href="{{ asset('flexslider/flexslider.min.css')}}" rel="stylesheet">

@stop
@section('content')
    <!-- Widgets list -->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <!-- User details (with sample pattern) -->
            <div class="card">
                <div class="card-body bg-blue text-center card-img-top" style="background-image: url({{ asset('global_assets/images/backgrounds/user_bg4.jpg') }});">
                    <div class="card-img-actions d-inline-block mb-3">
                        @if(Auth::user()->photo == "")
                            <img class="img-fluid rounded-circle shadow-3 " src="{{ asset('global_assets/images/user.png') }}" width="170" height="170" alt="">
                        @else
                            <img class="img-fluid rounded-circle shadow-3 " src="{{ asset('images/listuser/'.Auth::user()->photo) }}" width="170" height="170" alt="">
                        @endif


                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <a href="{{ url('profile') }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="card-body border-top-0">
                    <div class="d-sm-flex flex-sm-wrap ">
                        <div class="font-weight-semibold text-primary">{{ Auth::user()->name }}</div>
                    </div>

                    <div class="d-sm-flex flex-sm-wrap ">
                        <div class="font-weight-semibold text-success">{{ Auth::user()->nik }}</div>
                    </div>
                </div>

            </div>
            <!-- /user details (with sample pattern) -->
            <!-- Calendar widget -->
            <div class="card">
                <div class="form-control-datepicker border-0"></div>
            </div>
            <!-- /calendar widget -->
        </div>

        <div class="col-md-6 col-xl-3">



            <!-- Testimonials -->
            <div class="flexslider card text-center p-0">
                <ul class="slides bg-pink-400">
                    @foreach($quotes as $r)
                        <li>
                            <div>
                                <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white  bg-pink rounded-round">
                                    <i class="icon-quotes-left"></i> Quotes of The Day
                                </a>
                            </div>
                            <blockquote class="blockquote mb-2 p-1">
                                    <p>{{ $r->note }}</p>

                                    <footer class="blockquote-footer text-white">
                                                    <span>
                                                        by :  <cite title="Source Title">{{ $r->name }}</cite>
                                                        <br/>
                                                        {{ $r->name_department }}
                                                    </span>

                                    </footer>
                            </blockquote>
                        </li>
                    @endforeach
                </ul>

            </div>
            <!-- /testimonials -->
            <!-- Share your thoughts -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Share your thoughts</h6>

                </div>

                <div class="card-body">
                    <form action="#">

                        <textarea id="quotesku" name="quotes" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your Quotes..."></textarea>
                        <div class="d-flex align-items-center">
                            <div class="list-icons list-icons-extended">
                            </div>
                            <button type="button" class="btn bg-blue btn-labeled btn-labeled-right ml-auto btn-submit"><b><i class="icon-paperplane"></i></b> Share</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /share your thoughts -->


        </div>

        <div class="col-md-6 col-xl-3">
            <!-- Simple stats with thumbnail -->
            <div class="card">

                    <img src="{{ asset('global_assets/images/demo/flat/1.png') }}" class="img-fluid card-img-top" alt="">

                <div class="card-body text-center">

                    <p class="mb-1 ">Portal ini masih dalam proses pengembangan, jika terdapat kendala dalam pengoperasian silahkan hubungi EDP Cabang Jember</p>
                </div>
            </div>
            <!-- /simple stats with thumbnail -->
            <!-- List of files -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h6 class="card-title font-weight-semibold">
                        <i class="icon-folder6 mr-2"></i>
                        Downloaded files
                    </h6>

                    <div class="header-elements">
                        <span class="text-muted">(1)</span>
                    </div>
                </div>

                <div class="list-group list-group-flush">
                    <a href="{{url('media/juklak/Juklak SPL.pptx')}}" target="_blank" class="list-group-item list-group-item-action">
                        <i class="icon-file-pdf mr-3"></i>
                        Buku Panduan SPL.pptx <span class="badge bg-success-400 ml-auto">New</span>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="icon-arrow-right22 mr-3"></i>
                        Click Title to Download
                    </a>
                </div>
            </div>
            <!-- /list of files -->

        </div>

        <div class="col-md-6 col-xl-3">
            <!-- Widget with centered text and colored icon -->
            <div class="card">
                <img src="{{ asset('global_assets/images/demo/flat/23.png') }}" class="img-fluid card-img-top" alt="">
                <div class="card-body text-center">
                    <h6 class="font-weight-semibold">Surat Perintah Lembur</h6>
                    <p class="mb-3">Pastikan Anda membuat Surat Perintah Lembur sebelum proses lembur dilakukan.</p>
                    <a href="{{url('spl')}}">Ajukan lembur &rarr;</a>
                </div>
            </div>
            <!-- /widget with centered text and colored icon -->

            <!-- Simple text stats with icons -->
            <div class="card card-body">
                <h6 class="card-title">Status Lembur</h6>
                <div class="row text-center">
                    <div class="col-4">
                        <p> <a href="{{url('pendspl')}}"><i class="icon-file-word icon-2x d-inline-block text-info"></i></a></p>
                        <h5 class="font-weight-semibold mb-0">{{$total_pending}}</h5>
                        <span class="text-muted font-size-sm">Pending SPL</span>
                    </div>

                    <div class="col-4">
                        <p><a href="{{url('apspl')}}"><i class="icon-checkmark3 icon-2x d-inline-block text-success"></i></a></p>
                        <h5 class="font-weight-semibold mb-0">{{$total_app}}</h5>
                        <span class="text-muted font-size-sm">Approved</span>
                    </div>

                    <div class="col-4">
                        <p><a href="{{url('rejectspl')}}"><i class="icon-cross3 icon-2x d-inline-block text-danger"></i></a></p>
                        <h5 class="font-weight-semibold mb-0">{{$total_reject}}</h5>
                        <span class="text-muted font-size-sm">Rejected</span>
                    </div>
                </div>
            </div>
            <!-- /simple text stats with icons -->


            <!-- Navigation widget -->
            <div class="card">
                <div class="card-header header-elements-inline pb-0">
                    <h6 class="card-title">Navigation</h6>

                    <div class="header-elements">
                        <div class="list-icons">
                            <a href="#" class="list-icons-item"><i class="icon-wrench3"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ url('profile') }}" class="list-group-item list-group-item-action">
                        <i class="icon-user mr-3"></i>
                        My profile
                    </a>
                    <div class="list-group-item list-group-divider"></div>

                    <a href="{{ url('profile') }}" class="list-group-item list-group-item-action">
                        <i class="icon-cog3 mr-3"></i>
                        Account settings
                    </a>
                </div>
            </div>
            <!-- /navigation widget -->

        </div>



    </div>
    <!-- /widgets list -->


@stop
@section('scripts')
    <!-- Theme JS files-->

    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/ripple.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
<script type="text/javascript">
    var ContentWidgets = function() {

        // Datepicker
        var _componentUiDatepicker = function() {
            if (!$().datepicker) {
                console.warn('Warning - jQuery UI components are not loaded.');
                return;
            }

            // Initialize
            $('.form-control-datepicker').datepicker();
        };

        return {
            init: function() {
                _componentUiDatepicker();
            }

        }
    }();

    document.addEventListener('DOMContentLoaded', function() {
        ContentWidgets.init();
    });

</script>

    <script type="text/javascript">

        $(".btn-submit").click(function(e){
            e.preventDefault();
            var quotes = $("#quotesku").val();

            $.ajax({
                type:'POST',
                url:'{{url('/profile/updatequotes')}}',
                data:{"_token": "{{ csrf_token() }}","quotes":quotes},
                success:function(data){
                    alert(data.success);
                    $("#quotesku").val("");
                }
            });
        });

    </script>

    <script src="{{ asset('flexslider/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.flexslider').flexslider();
        });
    </script>

@stop



