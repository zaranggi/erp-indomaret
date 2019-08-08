<?php
namespace Modules\Trendspl\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Trendspl extends Model {
    protected $table = 'spl';
    public $timestamps = true;


    public function trend()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw(" name_department,SUM(TOTAL_LEMBUR) AS total_lembur"))
            ->leftjoin("users","users.nik","=","spl.NIK")
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("STATUS_LEMBUR","=","4")
            ->GROUPBY("name_department")
            ->OrderBy('name_department', 'ASC')->get();
        return $listuser;
    }

    public function dep()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('users')
            ->select(DB::raw(" nik, name_department,name"))
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("users.id_jabatan","=","34")
            ->groupBy("name_department")
            ->OrderBy('name_department', 'ASC')->get();
        return $listuser;
    }

    public function hitungdep($nikmgr , $periode)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("IFNULL(sum(TOTAL_LEMBUR),0) as TOTAL_LEMBUR"))
            ->leftjoin("users","spl.NIK","=","users.nik")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("NIK_MANAGER","=",$nikmgr)
            ->where("spl.TANGGAL","like" ,$periode."%")
            ->where("spl.STATUS_LEMBUR","=","4")
            ->get();
        return $listuser;
    }

}
