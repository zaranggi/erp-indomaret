<?php

namespace Modules\Spl\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Modules\Spl\Models\Spl;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


/**
 * @property Spl data
 */
class SplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Spl $data
     */
    public function __construct(Spl $data)
    {
        $this->data = $data;
    }

    public function index()
    {

        $list = Spl::all();
        return view('spl::index',['data' =>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = array(
            'tanggal' => 'required|date|after_or_equal:'.date("Y-m-d"),
            'jam_start' => 'required',
            'jam_end' => 'required',
            'status_kerja' => 'required',
            'status_hari' => 'required',
            'total_lembur' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('spl')->withErrors($validator)->withInput();
        }
        else
        {
            //$mulai = $request->input('tanggal')."-".$request->input('jam_start');
            //$pulang = $request->input('tanggal')."-".$request->input('jam_end');

            //$total_jam =  (new \App\Helpers\Tanggal)->selisih_jam($mulai,$pulang);

            $data = new Spl;
            $data->id_dep 		= Auth::user()->id_dep;
            $data->NIK 	        = Auth::user()->nik;
            $data->NAME 		= Auth::user()->name;
            $data->TANGGAL 		= $request->input('tanggal');
            $data->JAM_START 	= $request->input('jam_start');
            $data->JAM_END 		= $request->input('jam_end');
            $data->TOTAL_LEMBUR = $request->input('total_lembur');
            $data->STATUS_KERJA = $request->input('status_kerja');
            $data->STATUS_HARI 	= $request->input('status_hari');
            $data->KETERANGAN 	= $request->input('keterangan');
            $data->NIK_SPV = Auth::user()->id_atasan;
            $data->STATUS_LEMBUR = '1';

            $data->save();

            Session::flash('flash_message', 'Data has ben successful Added!');
            return redirect('home');

        }
    }


}
