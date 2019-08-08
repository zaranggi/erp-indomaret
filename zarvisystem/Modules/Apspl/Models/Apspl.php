<?php
namespace Modules\Apspl\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Apspl extends Model {
    protected $table = 'spl';
    public $timestamps = true;

    public function list_ap_user()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK","=",Auth::user()->nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",1)
            ->where("STATUS_LEMBUR","=",4)
            ->OrderBy('TANGGAL', 'DESC')->get();
        return $listuser;
    }

    public function list_ap_spv()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK_SPV","=",Auth::user()->nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->wherein("STATUS_LEMBUR",[2,4])
            ->OrderBy('TANGGAL', 'DESC')->get();
        return $listuser;
    }

    public function list_ap_manager()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("NIK_MANAGER","=",Auth::user()->nik)
            ->where("id_dep","=",Auth::user()->id_dep)
            ->where("SELESAI","=",1)
            ->wherein("STATUS_LEMBUR",[4])
            ->OrderBy('TANGGAL', 'DESC')->get();
        return $listuser;
    }
    public function list_ap_dbm()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('spl')
            ->leftJoin("status_lembur","spl.status_lembur","=","status_lembur.id")
            ->where("SELESAI","=",1)
            ->wherein("STATUS_LEMBUR",[4])
            ->OrderBy('TANGGAL', 'DESC')->get();
        return $listuser;
    }

}
