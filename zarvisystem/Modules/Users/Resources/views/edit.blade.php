<?php

/**

 * Created by PhpStorm.

 * User: zarvi

 * Date: 31-12-2015

 * Time: 10:32 AM

 */

?>



@extends('admin.layout')



@section('styles')



@stop





@section('content')



    <div class="card">

        <div class="card-header header-elements-inline">

            <h5 class="card-title">Manage Users<br/>



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

            <fieldset class="mb-3">

                <legend class="text-uppercase font-size-sm font-weight-bold">Form Input</legend>
                <form method="post" action="{{ route('users.update', $users->id) }}">

                    @csrf
                    @method('PATCH')

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

                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Name</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <input type="text" value="{{ $users->name }}" name="name"  class="form-control form-control-lg" placeholder="Name">

                                        <div class="form-control-feedback form-control-feedback-lg">

                                            <i class="icon-make-group"></i>

                                        </div>

                                        <strong style="color:red">{{ $errors->first('name') }}</strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">NIK</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <input type="text" value="{{ $users->nik }}" name="nik" class="form-control form-control-lg" placeholder="Nik ">

                                        <div class="form-control-feedback form-control-feedback-lg">

                                            <i class="icon-user-tie "></i>

                                        </div>

                                        <strong style="color:red">{{ $errors->first('nik') }}</strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                <div class="form-group row">

                    <label class="col-form-label col-lg-2">Email</label>

                    <div class="col-lg-10">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group form-group-feedback form-group-feedback-left">

                                    <input type="email" value="{{ $users->email }}" name="email" class="form-control form-control-lg" placeholder="">

                                    <div class="form-control-feedback form-control-feedback-lg">

                                        <i class="icon-envelop "></i>

                                    </div>

                                    <strong style="color:red">{{ $errors->first('email') }}</strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Username</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <input type="text" value="{{ $users->username }}" name="username" class="form-control form-control-lg" placeholder="Username">

                                        <div class="form-control-feedback form-control-feedback-lg">

                                            <i class="icon-address-book2"></i>

                                        </div>

                                        <strong style="color:red">{{ $errors->first('username') }}</strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Password</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

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

                            </div>

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Password Confirmation</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

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

                    </div>



                <div class="form-group row">

                    <label class="col-form-label col-lg-2">Address</label>

                    <div class="col-lg-10">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group form-group-feedback form-group-feedback-left">

                                    <input type="text" value="{{ $users->address }}" name="address"  class="form-control form-control-lg" placeholder="Address">

                                    <div class="form-control-feedback form-control-feedback-lg">

                                        <i class="icon-location4 "></i>

                                    </div>

                                    <strong style="color:red">{{ $errors->first('address') }}</strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>





                <div class="form-group row">

                    <label class="col-form-label col-lg-2">Province</label>

                    <div class="col-lg-10">

                        <div class="row">

                            <div class="col-md-6">

                                <select name="province" id="province" data-placeholder="Select a Province" class="form-control select-icons" data-fouc required>

                                    <optgroup label="Province">

                                        <option value="{{ $users->province }}" data-icon="location3" selected> {{ $users->province }} </option>

                                        @foreach($provinces as $r)

                                            <option value="{{ $r->name }}" data-icon="location3"> {{ $r->name }} </option>

                                        @endforeach

                                    </optgroup>



                                </select>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-form-label col-lg-2">City</label>

                    <div class="col-lg-10">

                        <div class="row">

                            <div class="col-md-6">

                                <select name="regency" id="regency" data-placeholder="Select a City" class="form-control select-icons" data-fouc required>



                                    <option value="{{ $users->regency }}" data-icon="location3 " selected> {{ $users->regency }} </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-form-label col-lg-2">District</label>

                    <div class="col-lg-10">

                        <div class="row">

                            <div class="col-md-6">

                                <select name="district" id="district"  data-placeholder="Select a District" class="form-control select-icons" data-fouc required>



                                    <option value="{{ $users->district }}" data-icon="location3" selected> {{ $users->district }} </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="form-group row">

                    <label class="col-form-label col-lg-2">Villages</label>

                    <div class="col-lg-10">

                        <div class="row">

                            <div class="col-md-6">

                                <select name="village" id="village"  data-placeholder="Select a village" class="form-control select-icons" data-fouc required>
                                    <option value="{{ $users->village }}" data-icon="location3" selected> {{ $users->village }} </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Jabatan</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <select name="jabatan" data-placeholder="Select a Jabatan" class="form-control select-icons" data-fouc>

                                        <optgroup label="Jabatan">

                                            @foreach($listjabatan as $r)

                                                @if($users->id_jabatan == $r->id_jabatan)

                                                    <option value="{{ $r->id_jabatan }}" data-icon="users" selected> {{ $r->name_jabatan }} </option>

                                                @else

                                                    <option value="{{ $r->id_jabatan }}" data-icon="users"> {{ $r->name_jabatan }} </option>

                                                @endif

                                            @endforeach



                                        </optgroup>



                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Blocked User?</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <span class="input-group-prepend">

												<span class="input-group-text">

													 @if($users->is_blocked== "1")

                                                        <input type="checkbox" name="active" class="form-control-switchery" checked data-fouc>

                                                    @else

                                                        <input type="checkbox" name="active" class="form-control-switchery" data-fouc>

                                                    @endif

												</span>

											</span>

                                        <strong style="color:red">{{ $errors->first('active') }}</strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="col-md-10 ">

                        <div class="text-right">

                            <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>

                            <a href="{{ url('users') }}" class="btn btn-warning">Cancel <i class="icon-backward2 ml-2"></i></a>

                        </div>

                    </div>





                </form>

            </fieldset>



        </div>



    </div>







    @stop





    @section('scripts')

            <!-- Theme JS files -->

    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>



    <script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/demo_pages/form_input_groups.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>

    <script src="{{ asset('global_assets/js/demo_pages/form_multiselect.js') }}"></script>

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

    <script type="text/javascript">

        $('#province').change(function(){

            var provinceID = $(this).val();

            if(provinceID){

                $.ajax({

                    type:"GET",

                    url:"{{url('users/getregencylist')}}?provinces_id="+provinceID,

                    success:function(res){

                        if(res){

                            $("#regency").empty();
                            $("#district").empty();
                            $("#village").empty();

                            $("#regency").append('<option>Select a City</option>');

                            $.each(res,function(key,value){

                                $("#regency").append('<option value="'+value['name']+'" data-icon="location3">'+value['name']+'</option>');

                            });



                        }else{

                            $("#regency").empty();
                            $("#district").empty();
                            $("#village").empty();

                        }

                    }

                });

            }else{

                $("#regency").empty();

                $("#district").empty();
                $("#village").empty();

            }

        });



        $('#regency').change(function(){

            var regenciesID = $(this).val();

            if(regenciesID){

                $.ajax({

                    type:"GET",

                    url:"{{url('users/getdistrictlist')}}?regencies_id="+regenciesID,

                    success:function(res){

                        if(res){

                            $("#district").empty();
                            $("#village").empty();

                            $("#district").append('<option>Select a District</option>');

                            $.each(res,function(key,value){

                                $("#district").append('<option value="'+value['name']+'" data-icon="location3">'+value['name']+'</option>');

                            });



                        }else{

                            $("#district").empty();
                            $("#village").empty();

                        }

                    }

                });

            }else{

                $("#district").empty();
                $("#village").empty();

            }

        });

        $('#district').change(function(){

            var districtID = $(this).val();

            if(districtID){

                $.ajax({

                    type:"GET",

                    url:"{{url('users/getvillagelist')}}?district_id="+districtID,

                    success:function(res){

                        if(res){

                            $("#village").empty();

                            $("#village").append('<option>Select a District</option>');

                            $.each(res,function(key,value){

                                $("#village").append('<option value="'+value['name']+'" data-icon="location3">'+value['name']+'</option>');

                            });



                        }else{

                            $("#village").empty();

                        }

                    }

                });

            }else{

                $("#village").empty();

            }

        });



    </script>

    @stop

