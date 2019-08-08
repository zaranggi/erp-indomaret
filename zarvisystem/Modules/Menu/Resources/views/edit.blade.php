

@extends('admin.layout')



@section('styles')



@stop





@section('content')





    <div class="card">

        <div class="card-header header-elements-inline">

            <h5 class="card-title">Manage Menu<br/>



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

                <legend class="text-uppercase font-size-sm font-weight-bold">Edit Menu </legend>
                <form method="post" action="{{ route('menu.update', $menu->id) }}">

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

                        <label class="col-form-label col-lg-2">Name Menu</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <input type="text" value="{{ $menu->name_menu }}" name="name_menu" class="form-control form-control-lg" placeholder="Name Menu">

                                        <div class="form-control-feedback form-control-feedback-lg">

                                            <i class="icon-make-group"></i>

                                        </div>

                                        <strong style="color:red">{{ $errors->first('name_menu') }}</strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Link Address</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <input type="text" value="{{ $menu->link }}" name="link" class="form-control form-control-lg" placeholder="Link Address">

                                        <div class="form-control-feedback form-control-feedback-lg">

                                            <i class="icon-pin-alt"></i>

                                        </div>

                                        <strong style="color:red">{{ $errors->first('link') }}</strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Main Menu</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <select name="id_main" data-placeholder="Select a Main Menu" class="form-control select-icons" data-fouc>

                                        <optgroup label="Main Menu">

                                            <option value="0" data-icon="blank"> Nothing </option>

                                            @foreach($listmenu as $r)

                                                @if($menu->id_main == $r->id)

                                                    <option value="{{ $r->id }}" data-icon="{{ $r->icon }}" selected> {{ $r->name_menu }} </option>

                                                @else

                                                    <option value="{{ $r->id }}" data-icon="{{ $r->icon }}"> {{ $r->name_menu }} </option>

                                                @endif

                                            @endforeach

                                        </optgroup>



                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>





                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Active</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <span class="input-group-prepend">

												<span class="input-group-text">

                                                    @if($menu->active == "Y")

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



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Icons</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <input type="text" value="{{ $menu->icon }}" name="icon" class="form-control form-control-lg" placeholder="Input Icons">

                                        <div class="form-control-feedback form-control-feedback-lg">

                                            <i class="icon-new"></i>

                                        </div>

                                        <strong style="color:red">{{ $errors->first('icon') }}</strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Department</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="input-group">

                                        <select name="id_department[]" class="form-control multiselect-toggle-selection-dep" multiple="multiple" data-fouc>

                                            @foreach($listdepartment as $r_user)

                                                <?php $cek_level = preg_match( '/#'.$r_user->id.'#/' ,$menu->id_dep ) ?>

                                                @if($cek_level == false)

                                                    <option value="#{{ $r_user->id }}#" > {{ $r_user->name_department }} </option>

                                                @else

                                                    <option value="#{{ $r_user->id }}#" selected> {{ $r_user->name_department }} </option>

                                                @endif

                                            @endforeach

                                        </select>



                                        <div class="input-group-append">

                                            <button type="button" class="btn btn-light multiselect-toggle-selection-button-dep">Select All</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Auth Access</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="input-group">

                                        <select name="auth_access[]" class="form-control multiselect-toggle-selection-access" multiple="multiple" data-fouc>

                                            @foreach($listjabatan as $r_user)

                                                <?php $cek_level = preg_match( '/#'.$r_user->id_jabatan.'#/' ,$menu->auth_access ) ?>

                                                @if($cek_level == false)

                                                    <option value="#{{ $r_user->id_jabatan }}#" > {{ $r_user->name_jabatan }} </option>

                                                @else

                                                    <option value="#{{ $r_user->id_jabatan }}#" selected> {{ $r_user->name_jabatan }} </option>

                                                @endif

                                            @endforeach

                                        </select>



                                        <div class="input-group-append">

                                            <button type="button" class="btn btn-light multiselect-toggle-selection-button-access">Select All</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Auth Add</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="input-group">

                                        <select name="auth_add[]" class="form-control multiselect-toggle-selection-add" multiple="multiple" data-fouc>

                                                @foreach($listjabatan as $r_user)

                                                    <?php $cek_level = preg_match( '/#'.$r_user->id_jabatan.'#/' ,$menu->auth_add ) ?>

                                                    @if($cek_level == false)

                                                        <option value="#{{ $r_user->id_jabatan }}#" > {{ $r_user->name_jabatan }} </option>

                                                    @else

                                                        <option value="#{{ $r_user->id_jabatan }}#" selected> {{ $r_user->name_jabatan }} </option>

                                                    @endif

                                                @endforeach

                                        </select>



                                        <div class="input-group-append">

                                            <button type="button" class="btn btn-light multiselect-toggle-selection-button-add">Select All</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Auth Update</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="input-group">

                                        <select name="auth_update[]" class="form-control multiselect-toggle-selection-update" multiple="multiple" data-fouc>

                                            @foreach($listjabatan as $r_user)

                                                <?php $cek_level = preg_match( '/#'.$r_user->id_jabatan.'#/' ,$menu->auth_update ) ?>

                                                @if($cek_level == false)

                                                    <option value="#{{ $r_user->id_jabatan }}#" > {{ $r_user->name_jabatan }} </option>

                                                @else

                                                    <option value="#{{ $r_user->id_jabatan }}#" selected> {{ $r_user->name_jabatan }} </option>

                                                @endif

                                            @endforeach

                                        </select>



                                        <div class="input-group-append">

                                            <button type="button" class="btn btn-light multiselect-toggle-selection-button-update">Select All</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>





                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Auth Delete</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="input-group">

                                        <select name="auth_delete[]" class="form-control multiselect-toggle-selection-delete" multiple="multiple" data-fouc>

                                            @foreach($listjabatan as $r_user)

                                                <?php $cek_level = preg_match( '/#'.$r_user->id_jabatan.'#/' ,$menu->auth_delete ) ?>

                                                @if($cek_level == false)

                                                    <option value="#{{ $r_user->id_jabatan }}#" > {{ $r_user->name_jabatan }} </option>

                                                @else

                                                    <option value="#{{ $r_user->id_jabatan }}#" selected> {{ $r_user->name_jabatan }} </option>

                                                @endif

                                            @endforeach

                                        </select>



                                        <div class="input-group-append">

                                            <button type="button" class="btn btn-light multiselect-toggle-selection-button-delete">Select All</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Auth Upload</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="input-group">

                                        <select name="auth_upload[]" class="form-control multiselect-toggle-selection-upload" multiple="multiple" data-fouc>

                                            @foreach($listjabatan as $r_user)

                                                <?php $cek_level = preg_match( '/#'.$r_user->id_jabatan.'#/' ,$menu->auth_upload ) ?>

                                                @if($cek_level == false)

                                                    <option value="#{{ $r_user->id_jabatan }}#" > {{ $r_user->name_jabatan }} </option>

                                                @else

                                                    <option value="#{{ $r_user->id_jabatan }}#" selected> {{ $r_user->name_jabatan }} </option>

                                                @endif

                                            @endforeach

                                        </select>



                                        <div class="input-group-append">

                                            <button type="button" class="btn btn-light multiselect-toggle-selection-button-upload">Select All</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="col-md-10 ">

                        <div class="text-right">

                            <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>

                            <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel <i class="icon-backward2 ml-2"></i></a>

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



    <!-- /theme JS files -->



@stop
