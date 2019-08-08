<?php

namespace Modules\Pdopr\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


use Illuminate\Support\Facades\Auth;
use Modules\Pdopr\Models\Pdopr;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


/**
 * @property Pdopr data
 */
class PdoprController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Pdopr $data
     */
    public function __construct(Pdopr $data)
    {
        $this->data = $data;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data =  $this->data->dataawal();
        return view('pdopr::index', ['data' =>$data]);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $awal = 'PDO';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Pdopr::max('id');
        $kode_trx = $awal.sprintf("%04s", $noUrutAkhir + 1) . "-".Auth::user()->id_dep."-".$bulanRomawi[date('n')]."-". date('Y');

        $data =  $this->data->dataawal();
        $rp_pengajuan = 0;

        foreach($data as $r){

            $rp_pengajuan = $rp_pengajuan + $request->input("akun_".$r->id);

            $this->data->insertmstran(Auth::user()->id_dep, $kode_trx, $r->id, $r->nama, date("Y-m-d"), $request->input("akun_".$r->id));

        }
        // UMD
        $no=0;
        $data = $request->input("akun_tambahan");
        if(count($data) >0 ){
            foreach($data as $r){
                $nama_akun = $r;
                if( $nama_akun <>""){


                $nilai = $request->input("nilai_tambahan");

                $nilaix = str_replace(",","",$nilai[$no]);

                $rp_pengajuan = $rp_pengajuan + $nilaix;

                $this->data->insertmstran(Auth::user()->id_dep, $kode_trx, 15, $nama_akun, date("Y-m-d"), $nilaix);
                $no++;
                }
            }
        }else{

            $this->data->insertmstran(Auth::user()->id_dep, $kode_trx, 15, 'Uang Muka per departemen', date("Y-m-d"), 0);

        }

        $this->data->insertmstran(Auth::user()->id_dep, $kode_trx, 16, "Lain - lain", date("Y-m-d"), str_replace(",","", $request->input("nilai16")));
        $rp_pengajuan = $rp_pengajuan + str_replace(",","", $request->input("nilai16"));

        $this->data->inserttrx($request->input("minggu"),Auth::user()->id_dep, $kode_trx, Auth::user()->nik, Auth::user()->name, Auth::user()->id_atasan,  date("Y-m-d"),"1", date("Y-m-d"),$rp_pengajuan);

        Session::flash('flash_message', 'Data has ben successful Added!');
        return redirect('pdopr');



    }

}
