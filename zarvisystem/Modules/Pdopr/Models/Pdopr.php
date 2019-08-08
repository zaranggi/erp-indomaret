<?php
namespace Modules\Pdopr\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Pdopr extends Model {
    protected $table = 'pdopr_transaksi';
    public $timestamps = true;

    public function dataawal()
    {
        $db = DB::connection('mysql');
        $listuser = $db->table('pdopr_akun')
            ->wherenotin("id", [15,16])
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
                    'rp_pengajuan' => $rp_pengajuan,
                    'created_at' => now()
                ]);
    }
    public function inserttrx($minggu,$id_dep, $kode_trx, $nik_spv, $nama_spv, $nik_mgr, $tanggal_pdo,$status_pdo,$tanggal_pdo_spv,$total_pdo)
    {

        $db = DB::connection('mysql');

        $db->table('pdopr_transaksi')
            ->insert(
                [
                    'id_dep' => $id_dep,
                    'minggu' => $minggu,
                    'kode_trx' => $kode_trx,
                    'nik_spv' => $nik_spv,
                    'nama_spv' => $nama_spv,
                    'nik_mgr' => $nik_mgr,
                    'tanggal_pdo' => $tanggal_pdo,
                    'status_pdo' => $status_pdo,
                    'tanggal_pdo_spv' => $tanggal_pdo_spv,
                    'total_pdo' => $total_pdo,
                    'created_at' => now()
                ]);
    }





}
