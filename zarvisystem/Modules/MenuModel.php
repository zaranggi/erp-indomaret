<?php namespace Modules;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model {

	protected $table = 'menu';

	public static function cekmenu($user,$link,$id_dept)
	{
		$mainmenu = MenuModel::SELECT("id_main")
			->where('active','=',  'Y')
            ->where('auth_access', 'like', '%#'.$user.'#%')
            ->where('id_dep', 'like', '%#'.$id_dept.'#%')
            ->where('link', '=', $link)
			->orderBy('urut', 'ASC')
			->get();
		return $mainmenu;
	}

	public static function mainmenu($user,$id_dept)
	{
		$mainmenu = MenuModel::where('active','=',  'Y')
				 ->where('auth_access', 'like', '%#'.$user.'#%')
            ->where('id_dep', 'like', '%#'.$id_dept.'#%')
				->where('id_main','=',  0)
               ->orderBy('urut', 'ASC')
               ->get();
		return $mainmenu;
	}


	public static function submenu($user,$id_dept)
	{
		$submenu = MenuModel::where('active','=',  'Y')
			->where('auth_access', 'like', '%#'.$user.'#%')
            ->where('id_dep', 'like', '%#'.$id_dept.'#%')
			->where('id_main', '<>', 0)
			->orderBy('urut', 'ASC')
			->get();
		return $submenu;

	}




}

