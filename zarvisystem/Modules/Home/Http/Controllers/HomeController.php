<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Home\Models\Home;

/**
 * @property Home data
 */
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Home $data
     */

    public function __construct(Home $data)
    {
        $this->data = $data;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $quotes = $this->data->quotes();

        if(Auth::user()->id_jabatan == 35 ){
            //Supervisor
            $total_pending = $this->data->pending_spv(Auth::user()->nik);
            $total_app = $this->data->app_spv(Auth::user()->nik);
            $total_reject = $this->data->reject_spv(Auth::user()->nik);

            return view('home::home',['total_pending' => $total_pending,
                'total_app' => $total_app,
                'total_reject' => $total_reject,
                'quotes' => $quotes]);


        }elseif(Auth::user()->id_jabatan == 34 ){
            //Manager
            $total_pending = $this->data->pending_mgr(Auth::user()->nik);
            $total_app = $this->data->app_mgr(Auth::user()->nik);
            $total_reject = $this->data->reject_mgr(Auth::user()->nik);

            return view('home::home',['total_pending' => $total_pending,
                'total_app' => $total_app,
                'total_reject' => $total_reject,
                'quotes' => $quotes]);

        }elseif(Auth::user()->id_jabatan == 33 ){
            //BM
            $total_pending = $this->data->pending_dbm(Auth::user()->nik);
            $total_app = $this->data->app_dbm(Auth::user()->nik);
            $total_reject = $this->data->reject_dbm(Auth::user()->nik);

            return view('home::home',['total_pending' => $total_pending,
                'total_app' => $total_app,
                'total_reject' => $total_reject,
                'quotes' => $quotes]);
        }else{
            $total_pending = $this->data->pending_user(Auth::user()->nik);
            $total_app = $this->data->app_user(Auth::user()->nik);
            $total_reject = $this->data->reject_user(Auth::user()->nik);

            return view('home::home',['total_pending' => $total_pending,
                'total_app' => $total_app,
                'total_reject' => $total_reject,
                'quotes' => $quotes]);
        }
    }


}
