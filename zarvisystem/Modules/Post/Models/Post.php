<?php
namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property array|null|string name
 */
class Post extends Model {
    protected $table = 'post';
    public $timestamps = true;

    public function listpost()
    {
        $db = DB::connection('mysql');
        $list = $db->table('post')
                ->select(DB::raw("*, post.id as id_postnya"))
                ->leftjoin("postcategory","post.id_category","=","postcategory.id")
                ->OrderBy('post.id', 'DESC')->get();
        return $list;
    }

}
