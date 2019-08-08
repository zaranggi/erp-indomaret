<?php
namespace Modules\Listpdo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Listpdo extends Model {
    protected $table = 'pdopr_transaksi';
    public $timestamps = true;
    protected $primary_key = "kode_trx";

    public function listspv()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('pdopr_transaksi')
            ->select(DB::raw("pdopr_transaksi.*, pdo_status.progress"))
            ->leftJoin("pdo_status","pdopr_transaksi.status_pdo","=","pdo_status.id")
            ->wherein("status_pdo",[1,2])
            ->where("id_dep","=", Auth::user()->id_dep)
            ->orderBy("pdopr_transaksi.id","DESC")
            ->get();
        return $listuser;
    }
    public function listmgr()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('pdopr_transaksi')
            ->select(DB::raw("pdopr_transaksi.*, pdo_status.progress"))
            ->leftJoin("pdo_status","pdopr_transaksi.status_pdo","=","pdo_status.id")
            ->wherein("status_pdo",[1, 2])
            ->where("id_dep","=", Auth::user()->id_dep)
            ->orderBy("pdopr_transaksi.id","DESC")
            ->get();
        return $listuser;
    }


    public function listdbm()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('pdopr_transaksi')
            ->select(DB::raw("pdopr_transaksi.*, pdo_status.progress,name_department"))
            ->leftJoin("pdo_status","pdopr_transaksi.status_pdo","=","pdo_status.id")
            ->leftJoin("department","pdopr_transaksi.id_dep","=","department.id")
            ->wherein("status_pdo",[2])
            ->orderBy("pdopr_transaksi.id","DESC")
            ->get();
        return $listuser;
    }





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


    public function dataawal()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('pdopr_akun')
            ->where("id","<>",15)
            ->get();
        return $listuser;
    }



    public function cekspv($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK","=",$id)
            ->where("STATUS_LEMBUR","=",1)
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }

    public function list_bawahan($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('users')
            ->select(DB::raw("users.*,name_jabatan,name_department"))
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("users.id_atasan","=",$id)
            ->OrderBy('name', 'ASC')->get();
        return $listuser;
    }

    //=====insert

    public function insertmstran($id_dep, $kode_trx, $id_akun, $nama_akun, $tanggal_pdo, $rp_pengajuan)
    {

        $db = DB::connection('mysql');

        $db->table('pdo_mstran')
            ->insert(
                [
                    'id_dep' => $id_dep,
                    'kode_trx' => $kode_trx,
                    'id_akun' => $id_akun,
                    'nama_akun' => $nama_akun,
                    'tanggal_pdo' => $tanggal_pdo,
                    'rp_pengajuan' => $rp_pengajuan
                ]);
    }
    public function inserttrx($id_dep, $kode_trx, $nik_spv, $nama_spv, $nik_mgr, $tanggal_pdo,$status_pdo,$tanggal_pdo_spv,$total_pdo)
    {

        $db = DB::connection('mysql');

        $db->table('pdopr_transaksi')
            ->insert(
                [
                    'id_dep' => $id_dep,
                    'kode_trx' => $kode_trx,
                    'nik_spv' => $nik_spv,
                    'nama_spv' => $nama_spv,
                    'nik_mgr' => $nik_mgr,
                    'tanggal_pdo' => $tanggal_pdo,
                    'status_pdo' => $status_pdo,
                    'tanggal_pdo_spv' => $tanggal_pdo_spv,
                    'total_pdo' => $total_pdo
                ]);
    }


    public function appmgr($id)
    {
        $db = DB::connection('mysql');
        $db->table('pdopr_transaksi')
            ->where('kode_trx', "=",$id)
            ->where('id_dep', "=",Auth::user()->id_dep)
            ->update([
                'nik_mgr' => Auth::user()->nik ,
                'nama_mgr' => Auth::user()->name ,
                'nik_dbm' => Auth::user()->id_atasan,
                'tanggal_pdo_mgr' => date("Y-m-d"),
                'status_pdo' => 2,
                'updated_at' => now(),
            ]) ;
    }
    public function rjmgr($id)
    {
        $db = DB::connection('mysql');
        $db->table('pdopr_transaksi')
            ->where('kode_trx', "=",$id)
            ->where('id_dep', "=",Auth::user()->id_dep)
            ->update([
                'nik_mgr' => Auth::user()->nik ,
                'nama_mgr' => Auth::user()->name ,
                'nik_dbm' => Auth::user()->id_atasan,
                'tanggal_pdo_mgr' => date("Y-m-d"),
                'status_pdo' => 3,
                'updated_at' => now(),
            ]) ;
    }

    public function appdbm($id)
    {
        $db = DB::connection('mysql');
        $db->table('pdopr_transaksi')
            ->where('kode_trx', "=",$id)
            ->update([
                'nik_dbm' => Auth::user()->nik ,
                'nama_dbm' => Auth::user()->name ,
                'tanggal_pdo_dbm' => date("Y-m-d"),
                'status_pdo' => 4,
                'updated_at' => now(),
            ]) ;
    }
    public function rjdbm($id)
    {
        $db = DB::connection('mysql');
        $db->table('spl')
            ->where('kode_trx', "=",$id)
            ->update([
                'nik_dbm' => Auth::user()->nik ,
                'nama_dbm' => Auth::user()->name ,
                'tanggal_pdo_dbm' => date("Y-m-d"),
                'status_pdo' => 5,
                'updated_at' => now(),
            ]) ;
    }







}
