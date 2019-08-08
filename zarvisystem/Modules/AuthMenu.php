<?php
namespace Modules;

use Illuminate\Database\Eloquent\Model;

class AuthMenu extends Model
{
    protected $table = 'menu';

    /**

     * @param $user

     * @param $route

     * @return mixed

     */

    public static function AuthMenu($user,$routes,$id_dep)
    {
        $AuthMenu = MenuModel::where('active','=',  'Y')
            ->where('link','=',  $routes)
            ->where('auth_access', 'like', '%#'.$user.'#%')
            ->where('id_dep', 'like', '%#'.$id_dep.'#%')
            ->get();
        return $AuthMenu;
    }



    public static function AuthMenuAdd($user,$routes,$id_dep)
    {
        $AuthMenu = MenuModel::where('active','=',  'Y')
            ->where('link','=',  $routes)
            ->where('auth_add', 'like', '%#'.$user.'#%')
            ->where('id_dep', 'like', '%#'.$id_dep.'#%')
            ->get();
        return $AuthMenu;
    }



    public static function AuthMenuEdit($user,$routes,$id_dep)
    {
        $AuthMenu = MenuModel::where('active','=',  'Y')
            ->where('link','=',  $routes)
            ->where('auth_update', 'like', '%#'.$user.'#%')
            ->where('id_dep', 'like', '%#'.$id_dep.'#%')
            ->get();

        return $AuthMenu;
    }



    public static function AuthMenuDelete($user,$routes,$id_dep)
    {
        $AuthMenu = MenuModel::where('active','=',  'Y')
            ->where('link','=',  $routes)
            ->where('auth_delete', 'like', '%#'.$user.'#%')
            ->where('id_dep', 'like', '%#'.$id_dep.'#%')
            ->get();

        return $AuthMenu;

    }

}

