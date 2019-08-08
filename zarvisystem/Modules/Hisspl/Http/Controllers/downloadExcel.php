<?php
/**
 * Created by PhpStorm.
 * User: Donny
 * Date: 10-07-2019
 * Time: 9:13 AM
 */

namespace Modules\Hisspl\Http\Controllers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class downloadExcel implements FromView
{
    private $data;
    private $listdep;
    private $tanggal;

    public function __construct($data,$listdep,$tanggal)
    {
        $this->data = $data;
        $this->listdep = $listdep;
        $this->tanggal = $tanggal;
    }

    public function view(): View
    {
        return view('hisspl::exports.download', [
            'data' => $this->data,
            'listdep' => $this->listdep,
            'tanggal' => $this->tanggal
        ]);
    }
}
