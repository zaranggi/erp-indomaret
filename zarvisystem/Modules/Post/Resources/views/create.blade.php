@extends('admin.layout')

@section('styles')

@stop

@section('content')
    <div class="card">

        <div class="card-header header-elements-inline">

            <h5 class="card-title">Manage Post<br/>

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

                <legend class="text-uppercase font-size-sm font-weight-bold">Form </legend>



                <form class="form-horizontal" onsubmit="return postForm()" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/post') }}">

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

                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Post Title  </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" name="post_title" class="form-control form-control-lg" placeholder="Name">
                                        <div class="form-control-feedback form-control-feedback-lg">
                                            <i class="icon-make-group"></i>
                                        </div>
                                        <strong style="color:red">{{ $errors->first('post_title') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Post Category</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="id_category" data-placeholder="Select a Jabatan" class="form-control select-icons" data-fouc required>
                                        <optgroup label="id_category">
                                            <option value="0" data-icon="blank" selected> Nothing </option>
                                            @foreach($list as $r)
                                                <option value="{{ $r->id }}" data-icon="users"> {{ $r->title }} </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group row">

                        <label class="col-form-label col-lg-2">Image</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-4">

                                            <input type="file" name="file" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="true" data-show-caption="false" data-show-upload="false" data-fouc>
                                            <span class="form-text text-muted">Gambar akan di convert ke ukuran 362 x 242</span>

                                    <strong style="color:red">{{ $errors->first('file') }}</strong>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /mail container -->
                    <!-- Summernote click to edit -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Deskripsi</h5>

                        </div>

                        <div class="card-body">
                            <textarea class="summernote"  name="deskripsi" rows="18">
                            </textarea>
                        </div>
                    </div>
                    <!-- /summernote click to edit -->

                    <div class="form-group row">

                        <label class="col-form-label col-lg-2">Publish?</label>

                        <div class="col-lg-10">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group form-group-feedback form-group-feedback-left">

                                        <span class="input-group-prepend">

												<span class="input-group-text">

													<input type="checkbox" name="active" class="form-control-switchery" checked data-fouc>

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
	
        <script src="{{ asset('global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
        <script src="{{ asset('global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
        <script src="{{ asset('global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>



        <script src="{{ asset('global_assets/js/demo_pages/uploader_bootstrap.js') }}"></script>



    <script src="{{ asset('global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/demo_pages/form_input_groups.js') }}"></script>

        <script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
        <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
        <script src="{{ asset('global_assets/js/demo_pages/mail_list_write.js') }}"></script>

        <!-- /theme JS files -->
        <script type="text/javascript">
            $('document').ready(function() {
                $('.summernote').summernote({ height: 600 });

                var postForm = function() {
                    var content = $('textarea[name="deskripsi"]').html($('.summernote').code());
                }


            });
        </script>

    <!-- /theme JS files -->



@stop
