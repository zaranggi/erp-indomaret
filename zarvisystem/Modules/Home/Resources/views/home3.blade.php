@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><div class="page-title d-flex">
                            <h4><i class="icon-office  mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>
                    </div>
                    <!-- Dashboard content -->
                    <div class="card-body">
                        <div class="row text-center">

                            <div class="col-4">
                                <p><a href="{{url('pendspl')}}" class="btn bg-transparent border-warning text-warning rounded-round border-3 btn-icon mr-2">
                                        <i class="icon-calendar2   icon-3x"></i></a>
                                </p>
                                <h5 class="font-weight-semibold mb-0">{{$total_pending}}</h5>
                                <span class="text-muted font-size-sm">Pending SPL</span>
                            </div>

                            <div class="col-4">
                                <p><a href="{{url('apspl')}}" class="btn bg-transparent border-success-400 text-success-400  rounded-round border-3 btn-icon mr-2">
                                        <i class="icon-clipboard5  icon-3x "></i></a>
                                </p>
                                <h5 class="font-weight-semibold mb-0">{{$total_app}}</h5>
                                <span class="text-muted font-size-sm">Approved SPL</span>
                            </div>

                            <div class="col-4">
                                <p><a href="{{url('rejectspl')}}" class="btn border-danger text-danger-400 rounded-round border-3 btn-icon mr-2">
                                        <i class="icon-stack-cancel   icon-3x "></i></a>
                                </p>
                                <h5 class="font-weight-semibold mb-0">{{$total_reject}}</h5>
                                <span class="text-muted font-size-sm">Rejected SPL</span>
                            </div>


                        </div>

                        <hr/>
                        <div class="row text-center">

                            <div class="col-4 ">
                                <p><a href="{{url('trendspl')}}" class="btn bg-transparent border-bottom-teal-300 text-teal rounded-round border-3 btn-icon mr-2">
                                        <i class="icon-stats-dots icon-3x"></i>
                                    </a></p>
                                <h5 class="font-weight-semibold mb-0"></h5>
                                <span class="text-muted font-size-sm">Trend Spl</span>
                            </div>

                            <div class="col-4">
                                <p><a href="{{ url('hisspl') }}" class="btn bg-transparent border-pink  text-pink rounded-round border-3 btn-icon mr-2">
                                        <i class="icon-calendar2   icon-3x"></i></a>
                                </p>
                                <h5 class="font-weight-semibold mb-0"></h5>
                                <span class="text-muted font-size-sm">Reporting SPL</span>
                            </div>

                            <div class="col-4 ">
                                <p><a href="{{url('profile')}}" class="btn bg-transparent border-indigo text-indigo rounded-round border-3 btn-icon mr-2">
                                        <i class="icon-vcard icon-3x"></i>
                                    </a></p>
                                <h5 class="font-weight-semibold mb-0"></h5>
                                <span class="text-muted font-size-sm">Set Up Profile</span>
                            </div>



                        </div>
                        <hr/>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
