<?php
namespace Modules\Cv\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Cv extends Model {
    protected $table = 'company_profile';
    public $timestamps = true;
 

}
