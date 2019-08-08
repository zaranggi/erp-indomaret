<?php

namespace Modules\Listpdo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Modules\Listpdo\Models\Listpdo;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * @property Listpdo data
 */
class ListpdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Listpdo $data
     */
    public function __construct(Listpdo $data)
    {
        $this->data = $data;
    }

    public function index()
    {

        if(Auth::user()->id_jabatan == 35   or Auth::user()->id_jabatan == 12){
            //Supervisor
            $list  = $this->data->listspv();
            return view("listpdo::indexspv", ['list' => $list ]);

        }elseif(Auth::user()->id_jabatan == 34 ){
            //Manager
            $list = $this->data->listmgr();
            //$listspv = $this->data->list_bawahan(Auth::user()->nik);

            return view('listpdo::indexmgr',[
                'list' =>$list,
                //'listspv' =>$listspv,
            ]);

        }elseif(Auth::user()->id_jabatan == 33){
            //DBM
            $list = $this->data->listdbm();
            //$lismgr = $this->data->list_bawahan(Auth::user()->nik);
            return view('listpdo::indexdbm',['list' =>$list,
                //'lismgr' =>$lismgr,
            ]);

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function preview($id)
    {
        $dep = $this->data->depnya($id);

        $data = $this->data->tampil($id);
        $bawah = $this->data->tampilbawah($id);
        $bawah2 = $this->data->tampil16($id);

        return view("listpdo::preview", ["bawah" => $bawah, "bawah2" => $bawah2, "depnya" =>$dep ])->with('data', $data);

    }

    public function previewmgr($id)
    {
        $dep = $this->data->depnya($id);

        $data = $this->data->tampil($id);
        $bawah = $this->data->tampilbawah($id);
        $bawah2 = $this->data->tampil16($id);

        return view("listpdo::previewmgr", ["bawah" => $bawah, "bawah2" => $bawah2, "depnya" =>$dep ])->with('data', $data);

    }

    public function previewdbm($id)
    {
        $dep = $this->data->depnya($id);

        $data = $this->data->tampil($id);
        $bawah = $this->data->tampilbawah($id);
        $bawah2 = $this->data->tampil16($id);

        return view("listpdo::previewdbm", ["bawah" => $bawah, "bawah2" => $bawah2, "depnya" =>$dep ])->with('data', $data);

    }

    //Action MGR
    public function appmgr($id)
    {
        $this->data->appmgr($id);

        return redirect('listpdo');

    }
    public function rjmgr($id)
    {
        $this->data->rjmgr($id);

        return redirect('listpdo');
    }
    //DBM
    public function appdbm($id)
    {
        $this->data->appdbm($id);

        return redirect('listpdo');
    }
    public function rjdbm($id)
    {
        $this->data->rjdbm($id);

        return redirect('listpdo');
    }



    // DOWNLOAD
    public function download($id)
    {
        $dep = $this->data->depnya($id);

        $data = $this->data->tampil($id);
        $bawah = $this->data->tampilbawah($id);
        $bawah2 = $this->data->tampil16($id);

        $x = ["bawah" => $bawah, "bawah2" => $bawah2, "depnya" =>$dep, 'data'=> $data];

        $pdf = PDF::loadView('listpdo::previewmgr', ["bawah" => $bawah, "bawah2" => $bawah2, "depnya" =>$dep, 'data'=> $data]);
        return $pdf->stream('invoice.pdf');
    }



}
