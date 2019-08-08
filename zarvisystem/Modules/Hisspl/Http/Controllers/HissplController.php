<?php

namespace Modules\Hisspl\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Hisspl\Models\Hisspl;
use Illuminate\Support\Facades\Validator;

/**
 * @property Hisspl data
 */
class HissplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Hisspl $data
     */

    public function __construct(Hisspl $data)
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
            //Supervisor
            if(Auth::user()->id_dep == 33){
                $listdep = $this->data->dep();

                return view('hisspl::index_dbm', ['listdep' => $listdep]);
            }else{

                $listdep = $this->data->deplimit();
                return view('hisspl::index_spv', ['listdep' => $listdep]);

            }

        }elseif(Auth::user()->id_jabatan == 34 ){
            //Manager
            if(Auth::user()->id_dep == 33){
                $listdep = $this->data->dep();

                return view('hisspl::index_dbm', ['listdep' => $listdep]);
            }else{

                $listdep = $this->data->deplimit();
                return view('hisspl::index_mgr', ['listdep' => $listdep]);

            }

        }elseif(Auth::user()->id_jabatan == 33  or Auth::user()->id_jabatan == 31 or Auth::user()->id_jabatan == 12){
            //BM/dbm
            $listdep = $this->data->dep();

            return view('hisspl::index_dbm', ['listdep' => $listdep]);

        }else{
            return view('hisspl::index_user');
        }
    }

    public function dbm(Request $request)
    {
        $rules = array(
            'tanggal' => 'required|max:7',
            'dep' => 'required',
            'status_lembur' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('hisspl')->withErrors($validator)->withInput();
        }
        else
        {
            $tanggal        = $request->input('tanggal');
            $dep            = $request->input('dep');
            $status_lembur  = $request->input('status_lembur');
            $jenis_view  = $request->input('jenis_view');

                $listdep = $this->data->dep();

            if($dep <> "all"){

                $depdetail = $this->data->depdetail2($dep);

                if($jenis_view == 0){
                    $data = $this->data->cek_dbm($tanggal, $dep, $status_lembur);

                    return view('hisspl::hasil_dbm', [
                        'data' => $data,
                        'listdep' => $listdep,
                        'periode' => $tanggal,
                        'depdetail' => $depdetail,
                        'status_lembur' => $status_lembur,
                    ]);

                }else{

                    $data = $this->data->cek_dbm_detail($tanggal, $dep, $status_lembur);

                    return view('hisspl::hasil_dbm_detail', [
                        'data' => $data,
                        'listdep' => $listdep,
                        'periode' => $tanggal,
                        'depdetail' => $depdetail,
                        'status_lembur' => $status_lembur,
                    ]);

                }

            }else{

                $data = array();

                if($jenis_view == 0){

                    foreach($listdep as $r){

                        $depdetail[$r->id] = $this->data->depdetail2($r->id);

                        $data[$r->id] = $this->data->cek_dbm($tanggal, $r->id, $status_lembur);
                    }



                    return view('hisspl::hasil_dbm_all', [
                        'data' => $data,
                        'listdep' => $listdep,
                        'periode' => $tanggal,
                        'depdetail' => $depdetail,
                        'status_lembur' => $status_lembur,
                    ]);


                }else{

                    foreach($listdep as $r){
                        $depdetail[$r->id] = $this->data->depdetail2($r->id);
                        $data[$r->id] = $this->data->cek_dbm_detail($tanggal, $r->id, $status_lembur);
                    }

                    return view('hisspl::hasil_dbm_all_detail', [
                        'data' => $data,
                        'listdep' => $listdep,
                        'periode' => $tanggal,
                        'depdetail' => $depdetail,
                        'status_lembur' => $status_lembur,
                    ]);

                }


            }


        }

    }

    public function mgr(Request $request)
    {
        $rules = array(
            'tanggal' => 'required|date',
            'dep' => 'required',
            'status_lembur' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('hisspl')->withErrors($validator)->withInput();
        }
        else
        {
            $tanggal        = $request->input('tanggal');
            $dep            = $request->input('dep');
            $status_lembur  = $request->input('status_lembur');
            $jenis_view  = $request->input('jenis_view');

            $listdep = $this->data->deplimit();

                $depdetail = $this->data->depdetail($dep);
                if($jenis_view == 0){
                    $data = $this->data->cek_dbm($tanggal, $dep, $status_lembur);

                    return view('hisspl::hasil_mgr', [
                        'data' => $data,
                        'listdep' => $listdep,
                        'periode' => $tanggal,
                        'depdetail' => $depdetail,
                        'status_lembur' => $status_lembur,
                    ]);

                }else{
                    $data = $this->data->cek_dbm_detail($tanggal, $dep, $status_lembur);

                    return view('hisspl::hasil_mgr_detail', [
                        'data' => $data,
                        'listdep' => $listdep,
                        'periode' => $tanggal,
                        'depdetail' => $depdetail,
                        'status_lembur' => $status_lembur,
                    ]);

                }
        }

    }


    public function spv(Request $request)
    {
        $rules = array(
            'tanggal' => 'required|date',
            'dep' => 'required',
            'status_lembur' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('hisspl')->withErrors($validator)->withInput();
        }
        else
        {
            $tanggal        = $request->input('tanggal');
            $dep            = $request->input('dep');
            $status_lembur  = $request->input('status_lembur');
            $jenis_view  = $request->input('jenis_view');

            $listdep = $this->data->deplimit();

            $depdetail = $this->data->depdetail($dep);

            if($jenis_view == 0){

                $data = $this->data->cek_spv($tanggal, Auth::user()->nik, $status_lembur);

                return view('hisspl::hasil_spv', [
                    'data' => $data,
                    'listdep' => $listdep,
                    'periode' => $tanggal,
                    'depdetail' => $depdetail,
                    'status_lembur' => $status_lembur,
                ]);

            }else{
                $data = $this->data->cek_spv_detail($tanggal, Auth::user()->nik, $status_lembur);

                return view('hisspl::hasil_spv_detail', [
                    'data' => $data,
                    'listdep' => $listdep,
                    'periode' => $tanggal,
                    'depdetail' => $depdetail,
                    'status_lembur' => $status_lembur,
                ]);

            }

        }
    }

    public function user(Request $request)
    {
        $rules = array(
            'tanggal' => 'required|max:7',
            'status_lembur' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('hisspl')->withErrors($validator)->withInput();
        }
        else
        {
            $tanggal        = $request->input('tanggal');
            $status_lembur  = $request->input('status_lembur');
            $jenis_view     = $request->input('jenis_view');


            $depdetail = $this->data->depdetail(Auth::user()->id_dep);
            if($jenis_view == 0){
                $data = $this->data->cek_user($tanggal, Auth::user()->nik, $status_lembur);

                return view('hisspl::hasil_user', [
                    'data' => $data,
                    'periode' => $tanggal,
                    'depdetail' => $depdetail,
                    'status_lembur' => $status_lembur,
                ]);

            }else{
                $data = $this->data->cek_user_detail($tanggal, Auth::user()->nik, $status_lembur);

                return view('hisspl::hasil_user_detail', [
                    'data' => $data,
                    'periode' => $tanggal,
                    'depdetail' => $depdetail,
                    'status_lembur' => $status_lembur,
                ]);

            }
        }
    }

    public function downloadExcel(Request $request)
    {
        $tanggal        = $request->input('tanggal');
        $status_lembur  = $request->input('status_lembur');
        $depnya         = $request->input('dep');

        $data = array();

        if($depnya == "all"){
            $listdep = $this->data->dep();
        }else{
            $listdep = $this->data->depdetail($depnya);
        }

        foreach($listdep as $r){
            $data[$r->id] = $this->data->cek_dbm_detail2($tanggal, $r->id, $status_lembur);
        }
        //var_dump($data);
        return Excel::download(new downloadExcel($data,$listdep,$tanggal), 'report_lembur_'.$tanggal.'.xlsx');
    }

}
