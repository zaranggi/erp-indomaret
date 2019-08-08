<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Users\Models\Users;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * @property Users data
 */
class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param Users $data
     */

    public function __construct(Users $data)
    {
        $this->data = $data;
    }

    public function index()
    {

        $listusers = Users::all();
        return view("users::index", ['listusers' => $listusers]);

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function create()
    {
        //$listdepartment =  $this->data->listdepartment();
        $listjabatan =  $this->data->listjabatan();
       // $listcabang =  $this->data->cabang();
        $provinces = $this->data->provinces();

        return view("users::create", ['listjabatan' => $listjabatan,
           // 'listdepartment' => $listdepartment,
           // 'listcabang' => $listcabang,
            'provinces'=> $provinces]);

    }

    /**
 * Store a newly created resource in storage.
 *

     * @param Request $request
 * @return \Illuminate\Http\RedirectResponse
 */

    public function store(Request $request)

    {

        $rules = array(

            'name' => 'required|max:255',
            'nik' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'username' => 'required|max:50|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'jabatan' => 'required|numeric',
            //'department' => 'required|numeric',
           // 'cabang' => 'required|max:4',
            'address' => 'required|max:255',

        );



        $validator = Validator::make($request->all(), $rules);



        if ($validator->fails()) {

            return Redirect::to('users/create')->withErrors($validator)->withInput();

        } else {



            $active = ($request->input('active') == "on") ? '1' : '0';

            $data = new Users;

            $data->name 	= $request->input('name');

            $data->nik 		= $request->input('nik');
            $data->email 		= $request->input('email');

            $data->username = $request->input('username');

            $data->address = $request->input('address');

            $data->id_jabatan = $request->input('jabatan');

            //$data->id_department = $request->input('department');

           // $data->id_cabang = $request->input('cabang');

            $data->province = $request->input('province');

            $data->regency = $request->input('regency');

            $data->district = $request->input('district');
            $data->village = $request->input('village');

            $data->is_blocked = $active;

            $data->password = bcrypt($request->input('password'));

            $data->created_at= date('Y-m-d H:i:s');

            $data->save();

            $request->session()->flash('flash_message', 'Data has ben successful Added!');

            return redirect('users');



        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
        //
    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return Response

     */

    public function edit($id)
    {
        $users = Users::findOrFail($id);
        $listjabatan =  $this->data->listjabatan();
       // $listdepartment =  $this->data->listdepartment();
        $provinces = $this->data->provinces();
       // $listcabang =  $this->data->cabang();

        return view("users::edit", [
            'listjabatan' => $listjabatan,
           // 'listdepartment' => $listdepartment,
           // 'listcabang' => $listcabang,
            'provinces'=> $provinces])->with('users', $users);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update($id, Request  $request)
    {
        if(!empty($request->input('password')))
        {

            $rules = array(

                'name' => 'required|max:255',
                'nik' => 'required|numeric',
                'username' => 'required|max:50',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'address' => 'required|max:255',
                'jabatan' => 'required|numeric',
              //  'department' => 'required',

            );

        }else{

            $rules = array(

                'name' => 'required|max:255',

                'nik' => 'required|numeric',
                'email' => 'required|unique:users,email,'.$id,

                'username' => 'required|max:50',

                'address' => 'required|max:255',

                'jabatan' => 'required|numeric',
               // 'department' => 'required',

                'province' => 'required|max:255',

                'regency' => 'required|max:255',
                'village' => 'required|max:255',

                'district' => 'required|max:255',
            );
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return Redirect::to('users/'.$id.'/edit')->withErrors($validator)->withInput();

        } else {

            $active = ($request->input('active') == "on") ? '1' : '0';
            $data = Users::findOrFail($id);
            $data->name 	= $request->input('name');
            $data->nik 		= $request->input('nik');
            $data->email = $request->input('email');
            $data->is_blocked 		= $active;
            $data->username = $request->input('username');
            $data->id_jabatan = $request->input('jabatan');
           // $data->id_department = $request->input('department');
           // $data->id_cabang = $request->input('cabang');
            $data->address = $request->input('address');
            $data->province = $request->input('province');
            $data->regency = $request->input('regency');
            $data->district = $request->input('district');
            $data->village = $request->input('village');


            if(!empty($request->input('password')))
            {
                $data->password = bcrypt($request->input('password'));
            }

            $data->save();
            $request->session()->flash('flash_message', 'Data has ben successful Edited!');

            return redirect('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        $users = Users::findOrFail($id);
        $users->is_blocked = 1;
        $users->save();
        Session::flash('flash_message', 'Data has ben successful Deleted!');

        return redirect('users');
    }



    public function getProvincesList()
    {
        $provinces = $this->data->provinces();
        return response()->json($provinces);
    }



    public function getRegenciesList(Request $request)
    {
        $regencies = $this->data->regencies($request->provinces_id);
        return response()->json($regencies);
    }


    public function getDistrictsList(Request $request)
    {
        $districts = $this->data->districts($request->regencies_id);
        return response()->json($districts);
    }

    public function getVillagesList(Request $request)
    {
        $villages = $this->data->villages($request->district_id);
        return response()->json($villages);

    }



}

