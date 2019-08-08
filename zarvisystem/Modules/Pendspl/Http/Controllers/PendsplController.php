<?php

namespace Modules\Pendspl\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Modules\Pendspl\Models\Pendspl;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


/**
 * @property Pendspl data
 */
class PendsplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Pendspl $data
     */
    public function __construct(Pendspl $data)
    {
        $this->data = $data;
    }

    public function index()
    {
         if(Auth::user()->id_jabatan == 35 ){
            //Supervisor
            $list = $this->data->list_pending_spv();
             return view('pendspl::index_spv',['data' =>$list]);

        }elseif(Auth::user()->id_jabatan == 34 ){
            //Manager
             $list = $this->data->list_pending_manager();
             $listspv = $this->data->list_bawahan(Auth::user()->nik);

             return view('pendspl::index_mgr',[
                                                     'data' =>$list,
                                                     'listspv' =>$listspv,
                                                    ]);
        }elseif(Auth::user()->id_jabatan == 33 ){
            //DBM
            $list = $this->data->list_pending_dbm();
             $lismgr = $this->data->list_bawahan(Auth::user()->nik);
             return view('pendspl::indexdbm',['data' =>$list, 'lismgr' =>$lismgr,]);

        }else{
             $list = $this->data->list_pending_user();
             return view('pendspl::index_user',['data' =>$list]);
         }



    }
    public function previewuser($id)
    {

        $list = $this->data->previewuser($id);
        $karyawan = $this->data->karyawan(Auth::user()->nik);

        return view('pendspl::previewuser',[
            'data' =>$list,
            'karyawan' =>$karyawan

        ]);
    }


    public function previewmgr($id)
    {

        $list = $this->data->previewmgr($id);
        $karyawan = $this->data->karyawan(Auth::user()->nik);

        return view('pendspl::previewuser',[
            'data' =>$list,
            'karyawan' =>$karyawan

        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function preview($id)
    {

        $list = $this->data->previewmgr($id);
        $karyawan = $this->data->karyawan($id);
        return view('pendspl::preview',[
                                                'data' =>$list,
                                                'karyawan' =>$karyawan

                                                ]);
    }

    public function edit($id)
    {
        //
        if(Auth::user()->id_jabatan == 12 ){

        }elseif(Auth::user()->id_jabatan == 35 ){
            //Supervisor
            $list = $this->data->cekspv($id);


        }elseif(Auth::user()->id_jabatan == 34 ){
            //Manager
            $list = $this->data->cekmgr($id);

        }elseif(Auth::user()->id_jabatan == 33 ){

        }

        $karyawan = $this->data->karyawan($id);

        return view('pendspl::edit',[
            'data' =>$list,
            'karyawan' =>$karyawan

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $id             = $request->input('id');
        $nik            = $request->input('nik');
        $jam_start      = $request->input('jam_start');
        $jam_end        = $request->input('jam_end');
        $total_lembur   = $request->input('total_lembur');
        $app            = $request->input('app');

        $inde = 0;
        foreach($id as $r){

            $approvement = ($app[$inde] == "on") ? 'Y' : 'N';

            $data               = Pendspl::findOrFail($r);
            $data->JAM_START    = $jam_start[$inde];
            $data->JAM_END    = $jam_end[$inde];
            $data->TOTAL_LEMBUR = $total_lembur[$inde];

            if(Auth::user()->id_jabatan == 12 ){
                if($approvement == "Y"){
                    $data->NIK_SPV = Auth::user()->nik;
                    $data->SPV_NAME = Auth::user()->name;
                    $data->STATUS_LEMBUR = 2;
                    $data->APPROVAL_SPV = now();
                }else{
                    $data->NIK_SPV = Auth::user()->nik;
                    $data->SPV_NAME = Auth::user()->name;
                    $data->STATUS_LEMBUR = 3;
                    $data->SELESAI = 1;
                    $data->APPROVAL_SPV = now();
                }
            }elseif(Auth::user()->id_jabatan == 35 ){
                //Supervisor
                if($approvement == "Y"){
                    $data->NIK_SPV = Auth::user()->nik;
                    $data->SPV_NAME = Auth::user()->name;
                    $data->NIK_MANAGER = Auth::user()->id_atasan;
                    $data->STATUS_LEMBUR = 2;
                    $data->APPROVAL_SPV = now();
                }else{
                    $data->NIK_SPV = Auth::user()->nik;
                    $data->SPV_NAME = Auth::user()->name;
                    $data->STATUS_LEMBUR = 3;
                    $data->SELESAI = 1;
                    $data->APPROVAL_SPV = now();
                }

            }elseif(Auth::user()->id_jabatan == 34 ){
                //Manager
                if($approvement == "Y"){
                    $data->NIK_MANAGER = Auth::user()->nik;
                    $data->MANAGER_NAME = Auth::user()->name;
                    $data->NIK_DBM_ADM = Auth::user()->id_atasan;
                    $data->STATUS_LEMBUR = 4;
                    $data->SELESAI = 1;
                    $data->APPROVAL_MAN = now();
                }else{
                    $data->NIK_MANAGER = Auth::user()->nik;
                    $data->MANAGER_NAME = Auth::user()->name;
                    $data->NIK_DBM_ADM = Auth::user()->id_atasan;
                    $data->STATUS_LEMBUR = 5;
                    $data->SELESAI = 1;
                    $data->APPROVAL_MAN = now();
                }
            }

            $data->save();

            $inde++;
        }


        return redirect('pendspl');

    }



    public function mgr(Request $request)
    {
        $nikspv = $request->input('nik');

        if($nikspv == "all"){
            //Manager
            $list = $this->data->list_pending_manager();
            $listspv = $this->data->list_bawahan(Auth::user()->nik);

            return view('pendspl::index_mgr',[
                'data' =>$list,
                'listspv' =>$listspv,
            ]);

        }else{

            $data_spv = $this->data->karyawan($nikspv);
            $listspv = $this->data->list_bawahan(Auth::user()->nik);
            $list = $this->data->list_pending_manager2($nikspv);
            return view('pendspl::index_mgr2',[
                'dataspv' => $data_spv,
                'data' =>$list,
                'listspv' =>$listspv]);
        }

    }

    public function dbm(Request $request)
    {
        $nimgr= $request->input('nik');

        if($nimgr == "all"){
            //DBM
            $list = $this->data->list_pending_dbm();
            $lismgr = $this->data->list_bawahan(Auth::user()->nik);
            return view('pendspl::indexdbm',['data' =>$list, 'lismgr' =>$lismgr,]);

        }else{

            $data_man = $this->data->karyawan($nimgr);
            $listman = $this->data->list_bawahan(Auth::user()->nik);
            $list = $this->data->list_pending_dbm2($nimgr);
            return view('pendspl::indexdbm2',[
                'dataman' => $data_man,
                'data' =>$list,
                'listman' =>$listman]);
        }

    }


    public function mgrapp(Request $request)
    {
        $nikspv = $request->input('nik');

        if($nikspv == "all"){
            $this->data->updatemgr2();
        }else{
            $this->data->updatemgr($nikspv);
        }
        return redirect('pendspl');
    }



    public function dbmapp(Request $request)
    {

        $nikmgr = $request->input('nik');
        if($nikmgr == "all"){
            $this->data->updatedbm2();
        }else{
            $this->data->updatedbm($nikmgr);
        }

        return redirect('pendspl');

    }

}
