<?php
namespace Modules\Rpdo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Rpdo extends Model {
    protected $table = 'pdopr_transaksi';
    public $timestamps = true;



    public function listdep()
    {
        $db = DB::connection('mysql');
        $list  = $db->table('department')
            ->OrderBy('name_department', 'ASC')->get();
        return $list;
    }

    public function listdep_spv()
    {
        $db = DB::connection('mysql');
        $list  = $db->table('department')
            ->where("id", "=", Auth::user()->id_dep)
            ->OrderBy('name_department', 'ASC')->get();
        return $list;
    }

    public function listdep_mgr()
    {
        $db = DB::connection('mysql');
        $list  = $db->table('department')
            ->where("id", "=", Auth::user()->id_dep)
            ->OrderBy('name_department', 'ASC')->get();
        return $list;
    }
    public function listdep_dbm()
    {
        $db = DB::connection('mysql');
        $list  = $db->table('department')
            ->OrderBy('name_department', 'ASC')->get();
        return $list;
    }


    //==tampil list nya
    public function list($tanggal,$dep,$minggu)
    {
        if($minggu == "all"){
            $db = DB::connection('mysql');
            $listuser = $db->table('pdopr_transaksi')
                ->select(DB::raw("pdopr_transaksi.*, pdo_status.progress,name_department"))
                ->leftJoin("pdo_status","pdopr_transaksi.status_pdo","=","pdo_status.id")
                ->leftJoin("department","pdopr_transaksi.id_dep","=","department.id")
                ->where("tanggal_pdo","like",$tanggal."%")
                ->where("id_dep","=", $dep)
                ->orderBy("pdopr_transaksi.id","DESC")
                ->get();
            return $listuser;
        }else{
            $db = DB::connection('mysql');
            $listuser = $db->table('pdopr_transaksi')
                ->select(DB::raw("pdopr_transaksi.*, pdo_status.progress,name_department"))
                ->leftJoin("pdo_status","pdopr_transaksi.status_pdo","=","pdo_status.id")
                ->leftJoin("department","pdopr_transaksi.id_dep","=","department.id")
                ->where("tanggal_pdo","like",$tanggal."%")
                ->where("id_dep","=", $dep)
                ->where("minggu","=", $minggu)
                ->orderBy("pdopr_transaksi.id","DESC")
                ->get();
            return $listuser;
        }

    }

    //==tampil list nya
    public function listall($tanggal,$minggu)
    {
        if($minggu == "all"){
            $db = DB::connection('mysql');
            $listuser = $db->table('pdopr_transaksi')
                ->select(DB::raw("tanggal_pdo,status_pdo,minggu,count(*) as total_dep,sum(total_pdo) as total_pdo, progress,max(updated_at) last_update"))
                ->leftJoin("pdo_status","pdopr_transaksi.status_pdo","=","pdo_status.id")
                ->leftJoin("department","pdopr_transaksi.id_dep","=","department.id")
                ->where("tanggal_pdo","like",$tanggal."%")
                ->where("status_pdo","=", 4)
                ->groupBy("minggu")
                ->orderBy("minggu","ASC")
                ->get();
            return $listuser;
        }else{
            $db = DB::connection('mysql');
            $listuser = $db->table('pdopr_transaksi')
                ->select(DB::raw("tanggal_pdo,status_pdo,minggu,count(*) as total_dep,sum(total_pdo) as total_pdo, progress,max(updated_at) last_update"))
                ->leftJoin("pdo_status","pdopr_transaksi.status_pdo","=","pdo_status.id")
                ->leftJoin("department","pdopr_transaksi.id_dep","=","department.id")
                ->where("tanggal_pdo","like",$tanggal."%")
                ->where("minggu","=", $minggu)
                ->where("status_pdo","=", 4)
                ->groupBy("minggu")
                ->orderBy("minggu","ASC")
                ->get();
            return $listuser;
        }

    }

    // tampil detailannya

    public function depnya($id)
    {
        $db = DB::connection('mysql');
        $list  = $db->table('pdopr_transaksi')
            ->select(db::raw("minggu,status_pdo, nik_spv,nama_spv,nik_mgr,nama_mgr,kode_trx,tanggal_pdo,name_department"))
            ->leftJoin("department","pdopr_transaksi.id_dep","=","department.id")
            ->where("kode_trx","=",$id)
            ->take(1)->get();
        return $list ;
    }

    public function tampil($id)
    {
        $db = DB::connection('mysql');
        $list  = $db->table('pdo_mstran')
            ->select(db::raw("pdo_mstran.*, name_department"))
            ->leftJoin("department","pdo_mstran.id_dep","=","department.id")
            ->where("kode_trx","=",$id)
            ->wherenotin("id_akun",[15,16])
            ->OrderBy('id_akun', 'ASC')->get();
        return $list ;
    }

    public function tampilbawah($id)
    {
        $db = DB::connection('mysql');
        $list  = $db->table('pdo_mstran')
            ->select(db::raw("pdo_mstran.*, name_department"))
            ->leftJoin("department","pdo_mstran.id_dep","=","department.id")
            ->where("kode_trx","=",$id)
            ->where("id_akun","=",15)
            ->OrderBy('id_akun', 'ASC')->get();
        return $list ;
    }

    public function tampil16($id)
    {
        $db = DB::connection('mysql');
        $list  = $db->table('pdo_mstran')
            ->select(db::raw("pdo_mstran.*, name_department"))
            ->leftJoin("department","pdo_mstran.id_dep","=","department.id")
            ->where("kode_trx","=",$id)
            ->where("id_akun","=",16)
            ->OrderBy('id_akun', 'ASC')->get();
        return $list ;
    }


    //===TAMPILKAN ALL DEP
    public function tampil_all($minggu,$periode)
    {
        $db = DB::connection('mysql');
        $list  = $db->table('pdo_mstran')
            ->select(db::raw("group_concat(name_department) as name_department,id_akun,
                                nama_akun,
                                sum(rp_pengajuan) as rp_pengajuan"))
            ->leftJoin("department","pdo_mstran.id_dep","=","department.id")
            ->rightJoin("pdopr_transaksi","pdo_mstran.kode_trx","=","pdopr_transaksi.kode_trx")
            ->where("pdopr_transaksi.tanggal_pdo","like",$periode."%")
            ->where("minggu","=", $minggu)
            ->where("status_pdo","=", 4)
            ->wherenotin("id_akun",[15,16])
            ->groupBy("id_akun")
            ->OrderBy('id_akun', 'ASC')->get();
        return $list ;
    }

    public function tampilbawah_all($minggu,$periode)
    {
        $db = DB::connection('mysql');
        $list  = $db->table('pdo_mstran')
            ->select(db::raw("group_concat(name_department) as name_department,id_akun,
                                nama_akun,
                                sum(rp_pengajuan) as rp_pengajuan"))
            ->leftJoin("department","pdo_mstran.id_dep","=","department.id")
            ->rightJoin("pdopr_transaksi","pdo_mstran.kode_trx","=","pdopr_transaksi.kode_trx")
            ->where("pdopr_transaksi.tanggal_pdo","like",$periode."%")
            ->where("minggu","=", $minggu)
            ->where("status_pdo","=", 4)
            ->where("id_akun","=",15) ->groupBy("id_akun")
            ->OrderBy('id_akun', 'ASC')->get();
        return $list ;
    }

    public function tampil16_all($minggu,$periode)
    {
        $db = DB::connection('mysql');
        $list  = $db->table('pdo_mstran')
            ->select(db::raw("group_concat(name_department) as name_department,id_akun,
                                nama_akun,
                                sum(rp_pengajuan) as rp_pengajuan"))
            ->leftJoin("department","pdo_mstran.id_dep","=","department.id")
            ->rightJoin("pdopr_transaksi","pdo_mstran.kode_trx","=","pdopr_transaksi.kode_trx")
            ->where("pdopr_transaksi.tanggal_pdo","like",$periode."%")
            ->where("minggu","=", $minggu)
            ->where("status_pdo","=", 4)
            ->where("id_akun","=",16)
            ->groupBy("id_akun")
            ->OrderBy('id_akun', 'ASC')->get();
        return $list ;
    }


}
