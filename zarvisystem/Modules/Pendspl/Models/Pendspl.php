<?php
namespace Modules\Pendspl\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Pendspl extends Model {
    protected $table = 'spl';
    public $timestamps = true;



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


    public function cekmgr($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK","=",$id)
            ->where("STATUS_LEMBUR","=",2)
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }




    public function previewuser($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("spl.id","=",$id)
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }

    public function previewmgr($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("spl.NIK","=",$id)
            ->where("spl.STATUS_LEMBUR","=",2)
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }



    public function karyawan($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('users')
            ->select(DB::raw("users.*,name_jabatan,name_department"))
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("users.nik","=",$id)
            ->OrderBy('name', 'ASC')->get();
        return $listuser;
    }

    public function list_pending_user()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("NIK","=",Auth::user()->nik)
            ->where("SELESAI","=",0)
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }

    public function list_pending_spv()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, count(*) as total_hari,  sum(total_lembur) as total_lembur,progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK_SPV","=",Auth::user()->nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",0)
            ->where("STATUS_LEMBUR","=",1)
            ->groupBy("NIK")
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }

    public function list_pending_manager()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, count(*) as total_hari,  sum(total_lembur) as total_lembur,progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK_MANAGER","=",Auth::user()->nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",0)
            ->where("STATUS_LEMBUR","=",2)
            ->groupBy("NIK")
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }

    public function list_pending_manager2($nik_spv)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, count(*) as total_hari,  sum(total_lembur) as total_lembur,progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK_MANAGER","=", Auth::user()->nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("NIK_SPV","=", $nik_spv)
            ->where("SELESAI","=",0)
            ->where("STATUS_LEMBUR","=",2)
            ->groupBy("NIK")
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }

    public function list_pending_dbm()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, count(*) as total_hari,  sum(total_lembur) as total_lembur,progress,name_department"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->leftJoin("users","spl.NIK","=","users.NIK")
            ->leftJoin("department","users.id_dep","=","department.id")
            //->where("NIK_DBM_ADM","=",Auth::user()->nik)
            ->where("SELESAI","=",0)
            ->where("STATUS_LEMBUR","=",2)
            ->groupBy("NIK")
            ->OrderBy('TANGGAL', 'ASC')->get();
        return $listuser;
    }

    public function list_pending_dbm2($nik_man)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*, count(*) as total_hari,  sum(total_lembur) as total_lembur,progress"))
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            //->where("NIK_DBM_ADM","=", Auth::user()->nik)
            ->where("NIK_MANAGER","=", $nik_man)
            ->where("SELESAI","=",0)
            ->where("STATUS_LEMBUR","=",2)
            ->groupBy("NIK")
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

    public function updatemgr($nikspv)
    {
        $db = DB::connection('mysql');
        $db->table('spl')
            ->where('NIK_SPV', $nikspv)
            ->where('STATUS_LEMBUR', "=","2")
            ->update([
                'STATUS_LEMBUR' => '4' ,
                'SELESAI' => '1' ,
                'NIK_MANAGER' => Auth::user()->nik,
                'NIK_DBM_ADM' => Auth::user()->id_atasan,
                'MANAGER_NAME' => Auth::user()->name,
                'APPROVAL_MAN' => now(),
            ]) ;
    }
    public function updatemgr2()
    {
        $db = DB::connection('mysql');
        $db->table('spl')
            ->where('STATUS_LEMBUR', "=","2")
            ->update([
                'STATUS_LEMBUR' => '4' ,
                'SELESAI' => '1' ,
                'NIK_MANAGER' => Auth::user()->nik,
                'NIK_DBM_ADM' => Auth::user()->id_atasan,
                'MANAGER_NAME' => Auth::user()->name,
                'APPROVAL_MAN' => now(),
            ]) ;
    }

    public function updatedbm($nikmgr)
    {
        $db = DB::connection('mysql');
        $db->table('spl')
            ->where('NIK_MANAGER', $nikmgr)
            ->where('STATUS_LEMBUR', "=","4")
            ->update([
                'STATUS_LEMBUR' => '6' ,
                'SELESAI' => '1' ,
                'NIK_DBM_ADM' => Auth::user()->nik,
                'DBM_ADM_NAME' => Auth::user()->name,
                'APPROVAL_DBM_ADM' => now(),
            ]) ;
    }
    public function updatedbm2()
    {
        $db = DB::connection('mysql');
        $db->table('spl')
            ->where('STATUS_LEMBUR', "=","4")
            ->update([
                'STATUS_LEMBUR' => '6' ,
                'SELESAI' => '1' ,
                'NIK_DBM_ADM' => Auth::user()->nik,
                'DBM_ADM_NAME' => Auth::user()->name,
                'APPROVAL_DBM_ADM' => now(),
            ]) ;
    }

}
