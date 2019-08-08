<?php

namespace Modules\Trendspl\Http\Controllers;

use App\Helpers\Tanggal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Trendspl\Models\Trendspl;
/**
 * @property Trendspl data
 */
class TrendsplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Trendspl $data
     */
    public function __construct(Trendspl $data)
    {
        $this->data = $data;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $r_bulanku  = [];
        $listdep    = [];
        $listnik    = [];
        //initial Tanggal
        $harian = Tanggal::tgl_harian();
        $year= substr($harian,0,4);
        $month=substr($harian,5,2);

        //panggil DB department
        $dep    = $this->data->dep();

        foreach($dep as $r){
            //gabung nama departemen dan nik
            $listdep[] =  "'".$r->name_department."'";
            $listnik[] =  "'".$r->nik."'";
        }

        //looping per Bulan
        for($i=1;$i<=$month;$i++)
        {
            if(strlen($i)==1)
            {
                $bulan= "0".$i;
            }
            elseif(strlen($i)==2)
            {
                $bulan=$i;
            }
            //simpan nama2 bulan
            $list = Tanggal::namabulan($i);
            $r_bulanku[] = "'".$list."'";

            foreach($dep as $r){

                $periode = $year."-".$bulan;
                //hitung lembur per periode per dep
                $A = $this->data->hitungdep($r->nik,$periode);
                //gabungkan per dep per periode
                foreach($A as $value){
                    $hitarray[] = $r->nik.": ".$value->TOTAL_LEMBUR;
                    $detail[$r->nik][$i] = $value->TOTAL_LEMBUR;
                }
            }

            //Gabungkan All dep All Periode
            $ghitarray = implode(",", $hitarray);

            $rowx[]="{periode:'".$list."',".$ghitarray." }";

            unset($hitarray);
        }

        $dataperdep = implode(",",$rowx);
        $listnik = implode(",",$listnik);
        $listdep = implode(",",$listdep);
        $listbulan = implode(",",$r_bulanku);

        return view('trendspl::index', [
            'listdep'       => $listdep,
            'listnik'       => $listnik,
            'listbulan'     => $listbulan,
            'dataperdep'    => $dataperdep,
            'dep'           => $dep,
            'total_bulan'   => $month,
            'detail'        => $detail
        ]);

    }


}
