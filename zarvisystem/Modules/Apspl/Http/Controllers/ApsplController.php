<?php

namespace Modules\Apspl\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Modules\Apspl\Models\Apspl;


/**
 * @property Apspl data
 */
class ApsplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Apspl $data
     */
    public function __construct(Apspl $data)
    {
        $this->data = $data;
    }

    public function index()
    {
         if(Auth::user()->id_jabatan == 35 ){
            //Supervisor
            $list = $this->data->list_ap_spv();

        }elseif(Auth::user()->id_jabatan == 34 ){
            //Manager
            $list = $this->data->list_ap_manager();
        }elseif(Auth::user()->id_jabatan == 33 or Auth::user()->id_jabatan == 31){
            //DBM
            $list = $this->data->list_ap_dbm();
        }else{
            $list = $this->data->list_ap_user();
        }


        return view('apspl::index',['data' =>$list]);
    }



}
