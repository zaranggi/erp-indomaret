<?php

use App\Helpers\Tanggal;

?>
@extends('admin.layout')
@section('styles')
@stop
@section('content')
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
        <form method="post" onsubmit="return postForm()" enctype="multipart/form-data" action="{{ route('cv.update', $data->id) }}">

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

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Company Name</label>
                        <input type="text" name="nama" value="{{ $data->nama }}" placeholder="PT. Sintesa Citra Abadi" class="form-control">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Address</label>
                        <input type="text" name="alamat" value="{{ $data->alamat }}" placeholder="Alamat" class="form-control">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>City</label>
                        <input type="text" name="kota" value="{{ $data->kota }}" placeholder="Jember" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>State/Province</label>
                        <input type="text" name="provinsi" value="{{ $data->provinsi }}" placeholder="Jawa Timur" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label>ZIP code</label>
                        <input type="text" name="zipcode" value="{{ $data->zipcode }}" placeholder="68121" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="text"  name="email" value="{{ $data->email }}" placeholder="admin@sintesacitraabadi.co.id" class="form-control">
                    </div>

                </div>
            </div>


            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">About Us</h5>

                </div>

                <div class="card-body">
                            <textarea class="summernote"  name="deskripsi" rows="18">
                            </textarea>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>
<!-- /profile info -->

@stop
@section('scripts')
    <!-- Theme JS files-->
    <script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/mail_list_write.js') }}"></script>

    <!-- /theme JS files -->
    <script type="text/javascript">
        $('document').ready(function() {
            $('.summernote').summernote({ height: 350 });

                @if (old('deskripsi') != "")
            var review_body = '<?php echo($data->deskripsi);?>';
            $('.summernote').summernote('code', review_body);
                @else
            var db_review_body = '<?php echo($data->deskripsi);?>';
            $(".summernote").summernote('code', db_review_body);
                @endif

            var postForm = function() {
                    var content = $('textarea[name="deskripsi"]').html($('.summernote').code());
                }
        });
    </script>

    <script type="text/javascript">

        window.csrfToken = '<?php echo csrf_token(); ?>';

    </script>

@stop

