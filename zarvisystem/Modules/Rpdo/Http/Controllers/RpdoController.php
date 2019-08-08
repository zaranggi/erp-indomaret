<?php

namespace Modules\Rpdo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\Rpdo\Models\Rpdo;

/**
 * @property Rpdo data
 */
class RpdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Rpdo $data
     */
    public function __construct(Rpdo $data)
    {
        $this->data = $data;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        if(Auth::user()->id_jabatan == 35 ){
            //Spv
            $listdep = $this->data->listdep_spv();

            return view('rpdo::index', ["listdep" => $listdep]);

        }elseif (Auth::user()->id_jabatan == 34 ){
            $listdep = $this->data->listdep_mgr();

            return view('rpdo::index', ["listdep" => $listdep]);

        }elseif (Auth::user()->id_jabatan == 33 or Auth::user()->id_jabatan == 31 or Auth::user()->id_jabatan == 12 ){

            $listdep = $this->data->listdep();

             return view('rpdo::indexdbm', ["listdep" => $listdep]);

        }

    }

    public function tampillist(Request $request)
    {
        $rules = array(
            'tanggal' => 'required|max:7',
            'dep' => 'required|numeric',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('rpdo')->withErrors($validator)->withInput();
        } else {

            $tanggal = $request->input('tanggal');
            $dep     = $request->input('dep');
            $minggu  = $request->input('minggu');


            if(Auth::user()->id_jabatan == 35  ){
                //Supervisor
                $listdep = $this->data->listdep_spv();

                $list  = $this->data->list($tanggal,$dep,$minggu);
                return view("rpdo::tampil", ['list' => $list,"listdep" => $listdep ]);

            }elseif(Auth::user()->id_jabatan == 34  ){
                //Manager
                $listdep = $this->data->listdep_mgr();
                $list  = $this->data->list($tanggal,$dep,$minggu);
                return view("rpdo::tampil", ['list' => $list,"listdep" => $listdep ]);

            }elseif(Auth::user()->id_jabatan == 33 or Auth::user()->id_jabatan == 31  or Auth::user()->id_jabatan == 12){
                //DBM
                $listdep = $this->data->listdep();
                if($dep == 0){

                    $list  = $this->data->listall($tanggal,$minggu);
                    return view("rpdo::tampildbm", ['list' => $list,"listdep" => $listdep, 'periode'=>$tanggal ]);

                }else{
                    $list  = $this->data->list($tanggal,$dep,$minggu);
                    return view("rpdo::tampil", ['list' => $list,"listdep" => $listdep ]);
                }



            }

        }

    }

    public function preview($id)
    {
        $dep = $this->data->depnya($id);

        $data = $this->data->tampil($id);
        $bawah = $this->data->tampilbawah($id);
        $bawah2 = $this->data->tampil16($id);

        return view("rpdo::preview", ["bawah" => $bawah, "bawah2" => $bawah2, "depnya" =>$dep ])->with('data', $data);

    }


    public function previewdbm($id)
    {
        $dep = $this->data->depnya($id);

        $data = $this->data->tampil($id);
        $bawah = $this->data->tampilbawah($id);
        $bawah2 = $this->data->tampil16($id);

        return view("rpdo::previewdbm", ["bawah" => $bawah, "bawah2" => $bawah2, "depnya" =>$dep ])->with('data', $data);

    }


    public function previewdbmall($minggu, $periode)
    {
        $data = $this->data->tampil_all($minggu,$periode);
        $bawah = $this->data->tampilbawah_all($minggu,$periode);
        $bawah2 = $this->data->tampil16_all($minggu,$periode);

        return view("rpdo::previewdbmall", ["bawah" => $bawah, "bawah2" => $bawah2, 'minggu'=> $minggu, 'tanggal'=> $periode])->with('data', $data);

    }


}
