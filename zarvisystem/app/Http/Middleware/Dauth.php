<?php
namespace App\Http\Middleware;
use Modules\AuthMenu;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**

 * @property mixed AuthMenu

 */

class Dauth
{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */

    public $attributes;

    public function handle(Request $request, Closure $next)

    {

        if($request->user()->is_blocked==1)
        {
            $request->session()->flash('flash_message', 'Your Users has been blocked!!');
            return redirect('auth/logout');

        }

        $routes = Route::current();
		
        $routes = explode("/",$routes->uri);

          if($routes[0] != "home")
          {
                    $cek_coy = explode(".", Route::current()->getName());

                    $this->AuthMenu = AuthMenu::AuthMenu(Auth::user()->id_jabatan, $routes[0],Auth::user()->id_dep);

                    $request->session()->flash('menuku',  $this->AuthMenu);

                    if($this->AuthMenu->count() == 0)
                    {
                         abort(403, 'Unauthorized action.');

                    }
                    elseif(!empty($routes[1]))
                    {
                            if($routes[1] == "create"){
                                $this->AuthMenu = AuthMenu::AuthMenuAdd(Auth::user()->id_jabatan, $routes[0],Auth::user()->id_dep);
                                if($this->AuthMenu->count() == 0)
                                {
                                    abort(403, 'Unauthorized action.');
                                }
                            }
                            elseif(!is_null(Route::current()->getName()) && $cek_coy[1] == "destroy"){
                                $this->AuthMenu = AuthMenu::AuthMenuDelete(Auth::user()->id_jabatan, $cek_coy[0], Auth::user()->id_dep);
                                if ($this->AuthMenu->count() == 0) {
                                    abort(403, 'Unauthorized action.');
                                }
                            }
                            elseif(!empty($routes[2]))
                            {
                                if($routes[2] == "edit"){

                                    $this->AuthMenu = AuthMenu::AuthMenuEdit(Auth::user()->id_jabatan, $routes[0], Auth::user()->id_dep);
                                    if ($this->AuthMenu->count() == 0) {
                                        abort(403, 'Unauthorized action.');
                                    }
                                }

                            }

                     }
              }


        return $next($request);

    }

}

