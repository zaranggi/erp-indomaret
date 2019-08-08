<?php

use Modules\MenuModel;



use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Session;

$routes = Route::current();
$routes = explode("/",$routes->uri);
$routes = $routes[0];

$this->mainmenu = MenuModel::mainmenu(Auth::user()->id_jabatan,Auth::user()->id_dep);

//$this->cek = MenuModel::cekmenu(Auth::user()->id_jabatan,$routes);


$aktiv =" ";
$aktiv2 =" ";

if($routes  <>"home"){

    if($cekmenu = Session::get('menuku')){

        foreach($cekmenu  as $cek ){
            $aktiv = $cek->id_main;
            $aktiv2 = $cek->id;
        }

    }

}



foreach( $this->mainmenu as $r_menu){



     $listmain[][$r_menu->id] = [

            "id" => $r_menu->id,

            "id_main" => $r_menu->id_main,

            "name_menu" => $r_menu->name_menu,

            "link" => $r_menu->link,

            "icon" => $r_menu->icon,

    ];



}

$this->submenu = MenuModel::submenu(Auth::user()->id_jabatan,Auth::user()->id_dep);

foreach( $this->submenu as $r_sub){



    $listsub[$r_sub->id_main][]= array([

            "id" => $r_sub->id,

            "id_main" => $r_sub->id_main,

            "name_menu" => $r_sub->name_menu,

            "link" => $r_sub->link,

            "icon" => $r_sub->icon,

    ]) ;

}



?>





        <!-- Main sidebar -->

<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">



    <!-- Sidebar mobile toggler -->

    <div class="sidebar-mobile-toggler text-center">

        <a href="#" class="sidebar-mobile-main-toggle">

            <i class="icon-arrow-left8"></i>

        </a>

        <span class="font-weight-semibold">Navigation</span>

        <a href="#" class="sidebar-mobile-expand">

            <i class="icon-screen-full"></i>

            <i class="icon-screen-normal"></i>

        </a>

    </div>

    <!-- /sidebar mobile toggler -->





    <!-- Sidebar content -->

    <div class="sidebar-content">



        <!-- User menu -->

        <div class="sidebar-user-material">

            <div class="sidebar-user-material-body">

                <div class="card-body text-center">

                    <a href="#">
                        @if(Auth::user()->photo == "")
                            <img class="img-fluid rounded-circle shadow-1 mb-3" src="{{ asset('global_assets/images/user.png') }}" width="80" height="80" alt="">
                        @else
                            <img class="img-fluid rounded-circle shadow-1 mb-3" src="{{ asset('images/listuser/'.Auth::user()->photo) }}" width="80" height="80" alt="">
                        @endif


                    </a>

                    <h6 class="mb-0 text-white text-shadow-dark"><p>{{ Auth::user()->name }}</p></h6>



                </div>



                <div class="sidebar-user-material-footer">

                    <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>

                </div>

            </div>



            <div class="collapse" id="user-nav">

                <ul class="nav nav-sidebar">

                    <li class="nav-item">

                        <a href="{{url('profile')}}" class="nav-link">

                            <i class="icon-user-plus"></i>

                            <span>My profile</span>

                        </a>

                    </li>



                    <li class="nav-item">

                        <a href="{{url('profile')}}" class="nav-link">

                            <i class="icon-cog5"></i>

                            <span>Account settings</span>

                        </a>

                    </li>


                </ul>

            </div>

        </div>

        <!-- /user menu -->

        <!-- Main navigation -->

        <div class="card card-sidebar-mobile">

            <ul class="nav nav-sidebar" data-nav-type="accordion">



                <!-- Main -->

                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">Main</div>

                    <i class="icon-menu" title="Main"></i>

                </li>



<?php



foreach($listmain as $a){

   foreach($a as $r){

                $id_main = $r["id"];

                ?>

                @if( empty($r["link"]) OR $r["link"] == "#")


                    @if( $aktiv  ==  $id_main )

                        <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">

                            <a href="{{ url($r["link"]) }}" class="nav-link active">

                                <i class="icon-{{ $r["icon"] }}"></i> <span> {{ strtoupper($r["name_menu"]) }}</span>

                            </a>



                    @else

                        <li class="nav-item nav-item-submenu">

                            <a href="{{ url($r["link"]) }}" class="nav-link">

                                <i class="icon-{{  $r["icon"] }}"></i> <span> {{ strtoupper($r["name_menu"]) }}</span>

                            </a>

                    @endif



                @else

                    <li class="nav-item">

                        <a href="{{ url($r["link"]) }}" class="nav-link legitRipple">

                            <i class="icon-{{  $r["icon"] }}"></i>

								<span>

								 {{ strtoupper($r["name_menu"]) }}

								</span>

                        </a>

                    </li>



                @endif



<?php

       if(array_key_exists($id_main, $listsub)){

                ?>

                <ul class="nav nav-group-sub" data-submenu-title="{{ strtoupper($r["name_menu"]) }}">
                   @php
           foreach($listsub[$id_main] as $x ){

               foreach($x as $r2){
                    if( $aktiv2  ==  $r2["id"] ){
                   @endphp

                        <li class="nav-item " ><a href="{{ url($r2["link"]) }}" class="nav-link text-primary font-weight-bold">{{ $r2["name_menu"] }}</a></li>

                     @php
                        }
                        else{
                     @endphp
                        <li class="nav-item "><a href="{{ url($r2["link"]) }}" class="nav-link">{{ $r2["name_menu"] }}</a></li>
                @php
                        }


               }

           }

                echo "</ul>

</li>";



       }



   }

}



                @endphp



            </ul>

        </div>

        <!-- /main navigation -->



    </div>

    <!-- /sidebar content -->



</div>

<!-- /main sidebar -->

