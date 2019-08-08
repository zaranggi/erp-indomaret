<?php
namespace Modules\Hisspl\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Hisspl extends Model {
    protected $table = 'users';
    public $timestamps = true;


    public function cek_dbm($periode, $dep, $status_lembur)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*,SUM(TOTAL_LEMBUR) AS TOTAL_LEMBUR,COUNT(*) AS TOTAL_HARI,
                            SUM(IF(STATUS_HARI = 'NORMAL',TOTAL_LEMBUR,0)) AS T_NORMAL,
                            SUM(IF(STATUS_HARI <> 'NORMAL',TOTAL_LEMBUR,0)) AS T_MERAH,
                            name_jabatan,name_department"))
            ->leftjoin("users","users.nik","=","spl.NIK")
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("STATUS_LEMBUR","=",$status_lembur)
            ->where("spl.id_dep","=",$dep)
            ->where("spl.TANGGAL","like",$periode."%")
            ->groupBy("spl.NIK")
            ->OrderBy('name', 'ASC')->get();
        return $listuser;
    }

    public function cek_dbm_detail($periode, $dep, $status_lembur)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_MERAH,
                            IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_NORMAL"))
            ->leftjoin("users","users.nik","=","spl.NIK")
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("STATUS_LEMBUR","=",$status_lembur)
            ->where("spl.id_dep","=",$dep)
            ->where("spl.TANGGAL","like",$periode."%")
            ->OrderBy('name', 'ASC')->get();
        return $listuser;
    }

    public function cek_dbm_detail2($periode, $dep, $status_lembur)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            SUM(IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0)) AS TOTAL_MERAH,
                            SUM(IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0)) AS TOTAL_NORMAL,
                            SUM(TOTAL_LEMBUR) AS TOTAL_LEMBURX"))
            ->leftjoin("users","users.nik","=","spl.NIK")
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("STATUS_LEMBUR","=",$status_lembur)
            ->where("spl.id_dep","=",$dep)
            ->where("spl.TANGGAL","like",$periode."%")
            ->groupBy(DB::raw('NIK ,TANGGAL WITH ROLLUP'))
            ->get();
        return $listuser;
    }







    public function cek_spv($periode, $dep, $status_lembur)
    {
        if($status_lembur == 2) {
            //approved
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,SUM(TOTAL_LEMBUR) AS TOTAL_LEMBUR,COUNT(*) AS TOTAL_HARI,
                            SUM(IF(STATUS_HARI = 'NORMAL',TOTAL_LEMBUR,0)) AS T_NORMAL,
                            SUM(IF(STATUS_HARI <> 'NORMAL',TOTAL_LEMBUR,0)) AS T_MERAH,
                            name_jabatan,name_department"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->wherein("STATUS_LEMBUR",  [2,4])
                ->where("spl.NIK_SPV", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->groupBy("spl.NIK")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }elseif($status_lembur == 3){
            //rejected
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,SUM(TOTAL_LEMBUR) AS TOTAL_LEMBUR,COUNT(*) AS TOTAL_HARI,
                            SUM(IF(STATUS_HARI = 'NORMAL',TOTAL_LEMBUR,0)) AS T_NORMAL,
                            SUM(IF(STATUS_HARI <> 'NORMAL',TOTAL_LEMBUR,0)) AS T_MERAH,
                            name_jabatan,name_department"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->wherein("STATUS_LEMBUR",  [3,5])
                ->where("spl.NIK_SPV", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->groupBy("spl.NIK")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }else{
            //pending
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,SUM(TOTAL_LEMBUR) AS TOTAL_LEMBUR,COUNT(*) AS TOTAL_HARI,
                            SUM(IF(STATUS_HARI = 'NORMAL',TOTAL_LEMBUR,0)) AS T_NORMAL,
                            SUM(IF(STATUS_HARI <> 'NORMAL',TOTAL_LEMBUR,0)) AS T_MERAH,
                            name_jabatan,name_department"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->wherein("STATUS_LEMBUR",  [1])
                ->where("spl.NIK_SPV", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->groupBy("spl.NIK")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }
    }

    public function cek_spv_detail($periode, $dep, $status_lembur)
    {

        if($status_lembur == 2) {
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_MERAH,
                            IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_NORMAL"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->wherein("STATUS_LEMBUR",  [2,4])
                ->where("spl.NIK_SPV", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }elseif($status_lembur == 3){
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_MERAH,
                            IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_NORMAL"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->wherein("STATUS_LEMBUR",  [3,5])
                ->where("spl.NIK_SPV", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }else{
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_MERAH,
                            IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_NORMAL"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->wherein("STATUS_LEMBUR",  [1])
                ->where("spl.NIK_SPV", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }
    }

    public function cek_user($periode, $dep, $status_lembur)
    {
        if($status_lembur == 4){
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,SUM(TOTAL_LEMBUR) AS TOTAL_LEMBUR,COUNT(*) AS TOTAL_HARI,
                            SUM(IF(STATUS_HARI = 'NORMAL',TOTAL_LEMBUR,0)) AS T_NORMAL,
                            SUM(IF(STATUS_HARI <> 'NORMAL',TOTAL_LEMBUR,0)) AS T_MERAH,
                            name_jabatan,name_department"))
                ->leftjoin("users","users.nik","=","spl.NIK")
                ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
                ->leftjoin("department","users.id_dep","=","department.id")
                ->where("STATUS_LEMBUR","=",$status_lembur)
                ->where("spl.NIK","=",$dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL","like",$periode."%")
                ->groupBy("spl.NIK")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }elseif($status_lembur == 5){

            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,SUM(TOTAL_LEMBUR) AS TOTAL_LEMBUR,COUNT(*) AS TOTAL_HARI,
                            SUM(IF(STATUS_HARI = 'NORMAL',TOTAL_LEMBUR,0)) AS T_NORMAL,
                            SUM(IF(STATUS_HARI <> 'NORMAL',TOTAL_LEMBUR,0)) AS T_MERAH,
                            name_jabatan,name_department"))
                ->leftjoin("users","users.nik","=","spl.NIK")
                ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
                ->leftjoin("department","users.id_dep","=","department.id")
                ->wherein("STATUS_LEMBUR",[3,5])
                ->where("spl.NIK","=",$dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL","like",$periode."%")
                ->groupBy("spl.NIK")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }
        else{
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,SUM(TOTAL_LEMBUR) AS TOTAL_LEMBUR,COUNT(*) AS TOTAL_HARI,
                            SUM(IF(STATUS_HARI = 'NORMAL',TOTAL_LEMBUR,0)) AS T_NORMAL,
                            SUM(IF(STATUS_HARI <> 'NORMAL',TOTAL_LEMBUR,0)) AS T_MERAH,
                            name_jabatan,name_department"))
                ->leftjoin("users","users.nik","=","spl.NIK")
                ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
                ->leftjoin("department","users.id_dep","=","department.id")
                ->where("SELESAI","=",0)
                ->where("spl.NIK","=",$dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL","like",$periode."%")
                ->groupBy("spl.NIK")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }

    }

    public function cek_user_detail($periode, $dep, $status_lembur)
    {
        if($status_lembur == 4){
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_MERAH,
                            IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_NORMAL"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->where("STATUS_LEMBUR", "=", $status_lembur)
                ->where("spl.NIK", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }elseif($status_lembur == 5){
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_MERAH,
                            IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_NORMAL"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->wherein("STATUS_LEMBUR",[3,5])
                ->where("spl.NIK", "=", $dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }else{
            $db = DB::connection('mysql');
            $listuser = $db->table('spl')
                ->select(DB::raw("spl.*,
                            name_jabatan,name_department,
                            IF(STATUS_HARI = 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_MERAH,
                            IF(STATUS_HARI <> 'MERAH',TOTAL_LEMBUR,0) AS TOTAL_NORMAL"))
                ->leftjoin("users", "users.nik", "=", "spl.NIK")
                ->leftjoin("jabatan", "users.id_jabatan", "=", "jabatan.id_jabatan")
                ->leftjoin("department", "users.id_dep", "=", "department.id")
                ->where("SELESAI", "=", 0)
                ->where("spl.NIK", "=", $dep)
                ->where("spl.id_dep","=",Auth::user()->id_dep)
                ->where("spl.TANGGAL", "like", $periode . "%")
                ->OrderBy('name', 'ASC')->get();
            return $listuser;
        }
    }



    public function deplimit()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('users')
            ->select(DB::raw("users.*,name_jabatan,name_department"))
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("users.id_jabatan","=",34)
            ->where("users.id_dep","=",Auth::user()->id_dep)
            ->OrderBy('name', 'ASC')->get();
        return $listuser;
    }


    public function dep()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('department')
            ->where("id","<>",32)
            ->OrderBy('name_department', 'ASC')->get();
        return $listuser;
    }

    public function depdetail($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('department')
            ->where("id","=",$id)
            ->OrderBy('name_department', 'ASC')->get();
        return $listuser;
    }

    public function depdetail2($id)
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('users')
            ->select(DB::raw("users.*,name_jabatan,name_department"))
            ->leftjoin("jabatan","users.id_jabatan","=","jabatan.id_jabatan")
            ->leftjoin("department","users.id_dep","=","department.id")
            ->where("users.id_jabatan","=",34)
            ->where("users.id_dep","=",$id)
            ->OrderBy('name', 'ASC')->get();
        return $listuser;
    }


}
