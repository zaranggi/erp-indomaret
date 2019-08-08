<?php
namespace Modules\Home\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Home extends Model {
    protected $table = 'users';
    public $timestamps = true;


    public function karyawan()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('users')
            ->select(DB::raw("users.*,name_jabatan,name_department"))
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->OrderBy('name', 'ASC')->get();
        return $listuser;
    }
    public function quotes()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('users')
            ->select(DB::raw("users.name,note, name_department"))
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->Where("note","<>","")
            ->inRandomOrder()->take(10)->get();
        return $listuser;
    }



    public function pending_user($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",0)
            ->count();
        return $listuser;
    }
    public function app_user($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",1)
            ->where("STATUS_LEMBUR","=",4)
            ->count();
        return $listuser;
    }
    public function reject_user($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",1)
            ->wherein("STATUS_LEMBUR",[3,5])
            ->count();
        return $listuser;
    }

    //================= spv
    public function pending_spv($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_SPV","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("STATUS_LEMBUR","=",1)
            ->where("SELESAI","=",0)
            ->count();
        return $listuser;
    }
    public function app_spv($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_SPV","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->wherein("STATUS_LEMBUR",[2,4])
            ->count();
        return $listuser;
    }
    public function reject_spv($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_SPV","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->wherein("STATUS_LEMBUR",[5,3])
            ->count();
        return $listuser;
    }

    //================= mgr
    public function pending_mgr($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_MANAGER","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("STATUS_LEMBUR","=",2)
            ->where("SELESAI","=",0)
            ->count();
        return $listuser;
    }
    public function app_mgr($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_MANAGER","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",1)
            ->wherein("STATUS_LEMBUR",[4])
            ->count();
        return $listuser;
    }
    public function reject_mgr($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_MANAGER","=",$nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",1)
            ->wherein("STATUS_LEMBUR",[5])
            ->count();
        return $listuser;
    }

    //================= dbm
    public function pending_dbm($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_DBM_ADM","=",$nik)
            ->where("SELESAI","=",0)
            ->count();
        return $listuser;
    }
    public function app_dbm($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_DBM_ADM","=",$nik)
            ->where("SELESAI","=",1)
            ->where("STATUS_LEMBUR","=",4)
            ->count();
        return $listuser;
    }
    public function reject_dbm($nik){

        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->where("NIK_DBM_ADM","=",$nik)
            ->where("SELESAI","=",1)
            ->wherein("STATUS_LEMBUR",[5])
            ->count();
        return $listuser;
    }



}
