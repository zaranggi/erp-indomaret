<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


use Illuminate\Support\Facades\Auth;
use Modules\Profile\Models\Profile;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

/**
 * @property Profile data
 */
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Profile $data
     */
    public function __construct(Profile $data)
    {
        $this->data = $data;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = $this->data->karyawan(Auth::user()->nik);
        $atasandep = $this->data->uhuy(Auth::user()->id_dep);

        if(Auth::user()->id_atasan <> "0"){
            $data_atasan = $this->data->karyawan(Auth::user()->id_atasan);
        }else{
            $data_atasan = "Belum Di Setting";
        }

        return view('profile::index' , ['data'=> $data,
                                                'data_atasan' => $data_atasan,
                                                'atasandep' => $atasandep
                                                ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ubah(Request $request)
    {
        if(!empty($request->input('password')))
        {
                $rules = array(
                                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                                'password_confirmation' => 'min:6',
                            );
        }elseif($request->hasFile('file')){
            $rules = array(
                'file' => 'required|image|mimes:jpeg,jpg|max:512',
            );
        }else{
            $rules = array( );
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('profile')->withErrors($validator)->withInput();
        } else {

            $id_atasan = $request->input('id_atasan');

            // read image from temporary file
            if ($request->hasFile('file')) {
                $file_name = "usr_".Auth::user()->nik.".jpg";

                $this->data->updatefoto($file_name);

                Image::make(Input::file('file'))->resize(320, 320)->save('images/listuser/'.$file_name);
            }



            if(!empty($request->input('password')))
            {
                $password= bcrypt($request->input('password'));
                $this->data->updateatasan2($id_atasan,$password);
                return redirect('profile');

            } else{
                $this->data->updateatasan($id_atasan);
                return redirect('profile');
            }

        }
    }

    public function updatequotes(Request $request)
    {

        $rules = array(
            'quotes' => 'required|max:500'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('home')->withErrors($validator)->withInput();
        } else {

            $a = $request->input('quotes');
            $this->data->updatequotes($a);

            return response()->json(['success'=>'Quotes Anda Sukses terikirim']);
        }

    }


}
