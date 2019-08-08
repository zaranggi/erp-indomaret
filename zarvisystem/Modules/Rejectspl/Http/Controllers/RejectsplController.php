<?php

namespace Modules\Rejectspl\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Rejectspl\Models\Rejectspl;


/**
 * @property Rejectspl data
 */
class RejectsplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Rejectspl $data
     */
    public function __construct(Rejectspl $data)
    {
        $this->data = $data;
    }

    public function index()
    {
        if (Auth::user()->id_jabatan == 35) {
            //Supervisor
            $list = $this->data->list_rj_spv();

        } elseif (Auth::user()->id_jabatan == 34) {
            //Manager
            $list = $this->data->list_rj_manager();
        } elseif (Auth::user()->id_jabatan == 33 or Auth::user()->id_jabatan == 31) {
            //DBM
            $list = $this->data->list_rj_dbm();
        } else {
            $list = $this->data->list_rj_user();
        }


        return view('rejectspl::index', ['data' => $list]);
    }
}
