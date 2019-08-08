@extends('admin.layout')
@section('styles')
@stop

@section('content')

    @foreach($data as $r)
    @endforeach

    @if($r->id_atasan <>0)
        @foreach($data_atasan as $r_atasan)
        @endforeach
    @endif

    <div class="d-md-flex align-items-md-start">
        <!-- Left sidebar component -->
        <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">
            <!-- Sidebar content -->
            <div class="sidebar-content">
                <!-- Navigation -->
                <div class="card">
                    <div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{ asset('assets/images/bg.png') }}); background-size: contain;">
                        <div class="card-img-actions d-inline-block mb-3">
                            @if(Auth::user()->photo == "")
                            <img class="img-fluid rounded-circle" src="{{ asset('global_assets/images/user.png') }}" width="170" height="170" alt="">
                            @else
                                <img class="img-fluid rounded-circle" src="{{ asset('images/listuser/'.Auth::user()->photo) }}" width="170" height="170" alt="">
                                @endif
                            <div class="card-img-actions-overlay rounded-circle">
                                <a href="profile" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                    <i class="icon-plus3"></i>
                                </a>
                            </div>
                        </div>
                        <h6 class="font-weight-semibold mb-0">{{ $r->name }}</h6>
                        <span class="d-block opacity-75">{{$r->nik }} </span>
                        <span class="d-block opacity-85"> {{ $r->name_jabatan }} - {{$r->name_department }}</span>
                        <div class="list-icons list-icons-extended mt-3">
                            <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a>
                            <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a>
                            <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-sidebar mb-2">
                            <li class="nav-item-header">Navigation</li>
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active" data-toggle="tab">
                                    <i class="icon-user"></i>
                                    My profile
                                </a>
                            </li>

                            <li class="nav-item-divider"></li>

                        </ul>
                    </div>
                </div>
                <!-- /navigation -->
            </div>
            <!-- /sidebar content -->
        </div>
        <!-- /left sidebar component -->

        <!-- Right content -->
        <div class="tab-content w-100 overflow-auto">
            <div class="tab-pane fade active show" id="profile">


                <!-- Profile info -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Profile information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="text-success font-weight-bold">NIK</label>
                                        <input type="text" value="{{$r->nik}}" readonly class="form-control">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="text-warning font-weight-bold">Nama Lengkap</label>
                                        <input type="text" value="{{$r->name}}" readonly class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-warning font-weight-bold">Departement</label>
                                        <input type="text" value="{{$r->name_department}}" readonly class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-warning font-weight-bold">Jabatan</label>
                                        <input type="text" value="{{$r->name_jabatan}}" readonly class="form-control">
                                    </div>
                                </div>
                                <hr/>

                                @if($r->id_atasan <>0)

                                <div class="row">
                                    <div class="col-md-3">

                                        <label class="text-primary font-weight-bold"> NIK Atasan</label>
                                        <input type="text" value="{{$r_atasan->nik}}" readonly class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-primary font-weight-bold"> Nama Atasan</label>
                                        <input type="text" value="{{$r_atasan->name}}" readonly class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-primary font-weight-bold"> Jabatan Atasan</label>
                                        <input type="text" value="{{$r_atasan->name_jabatan}}" readonly class="form-control">
                                    </div>
                                </div>
                                    @else
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="text-primary font-weight-bold"> Atasan Belum Di Setting</label>
                                        </div>
                                    </div>
                                    @endif
                            </div>
                    </div>
                </div>
                <!-- /profile info -->

                <!-- Account settings -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Account settings</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile/ubah')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input type="text" value="{{$r->username}}" readonly="readonly" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>New password</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="password" name="password" class="form-control form-control-lg" >
                                            <div class="form-control-feedback form-control-feedback-lg">
                                                <i class="icon-lock2"></i>
                                            </div>
                                            <div class="col-sm-6 col-sm-offset-2" style="padding-top: 30px;">
                                                <div class="pwstrength_viewport_progress"></div>
                                            </div>
                                            <strong style="color:red">{{ $errors->first('password') }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Repeat password</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="password" name="password_confirmation" class="form-control form-control-lg" >
                                            <div class="form-control-feedback form-control-feedback-lg">
                                                <i class="icon-lock2"></i>
                                            </div>
                                            <strong style="color:red">{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Upload Foto</label>
                                            <div class="uniform-uploader">
                                                <input type="file" name="file" class="form-input-styled" data-fouc="">
                                                <span class="filename" style="-moz-user-select: none;">Kosongkan jika tidak ingin dirubah</span>
                                                <span class="action btn bg-warning-400 legitRipple" style="-moz-user-select: none;">Choose File</span>

                                            </div>
                                        <strong class="text-warning">NB: Dimensi 320 X 320 , Ukuran file maksimum 500 kb</strong>
                                        <strong style="color:red">{{ $errors->first('file') }}</strong>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Ubah Atasan</label>
                                        <select name="id_atasan" data-placeholder="Select a Atasan" class="form-control select-icons" data-fouc>
                                            <optgroup label="Atasan">
                                                @foreach($atasandep as $ra)
                                                    @if($ra->nik == $r->id_atasan)
                                                        <option value="{{ $ra->nik }}" data-icon="users" selected> {{ $ra->name }} ({{ $ra->name_department }}) </option>
                                                    @else
                                                        <option value="{{ $ra->nik }}" data-icon="users"> {{ $ra->name }} ({{ $ra->name_department }})</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /account settings -->
            </div>

        </div>
        <!-- /right content -->
    </div>

@stop
@section('scripts')
    <!-- Theme JS files-->
    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>



    <script src="{{ asset('global_assets/js/pwstrength-bootstrap.min.js') }}"></script>

    <!-- /theme JS files -->

    <script type="text/javascript" src="{{ asset('global_assets/js/pwstrength.js') }}"></script>

    <script type="text/javascript">

        jQuery(document).ready(function () {

            "use strict";

            var options = {};

            options.ui = {

                bootstrap4: true,

                container: "#pwd-container",

                viewports: {

                    progress: ".pwstrength_viewport_progress"

                },

                showVerdictsInsideProgressBar: true

            };

            /*

             options.common = {

             debug: true,

             onLoad: function () {

             $('#messages').text('Start typing password');

             }

             };*/



            $(':password').pwstrength(options);

        });

    </script>
@stop
