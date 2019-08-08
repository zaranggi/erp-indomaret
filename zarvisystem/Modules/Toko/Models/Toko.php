<?php
namespace Modules\Toko\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Toko extends Model {
    protected $table = 'tokosewa';
    public $timestamps = true;


}
