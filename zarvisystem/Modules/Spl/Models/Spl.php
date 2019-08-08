<?php
namespace Modules\Spl\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Spl extends Model {
    protected $table = 'spl';
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

}
