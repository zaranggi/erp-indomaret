<?php

namespace Modules\Karyawan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Karyawan\Models\Karyawan;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * @property Karyawan data
 */
class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Karyawan $data
     */

    public function __construct(Karyawan $data)
    {
        $this->data = $data;
    }

    public function index()
    {

        $listusers = $this->data->karyawan();
        return view("karyawan::index", ['listusers' => $listusers]);

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function create()
    {
        $listdepartment =  $this->data->listdepartment();
        $listjabatan =  $this->data->listjabatan();

        $provinces = $this->data->provinces();

        return view("karyawan::create", ['listjabatan' => $listjabatan,
            'listdepartment' => $listdepartment,
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
            'department' => 'required|numeric',
            'address' => 'required|max:255',

        );



        $validator = Validator::make($request->all(), $rules);



        if ($validator->fails()) {

            return Redirect::to('karyawan/create')->withErrors($validator)->withInput();

        } else {



            $active = ($request->input('active') == "on") ? '1' : '0';

            $data = new Karyawan;

            $data->name 	= $request->input('name');

            $data->nik 		= $request->input('nik');
            $data->email 		= $request->input('email');

            $data->username = $request->input('username');

            $data->address = $request->input('address');

            $data->id_jabatan = $request->input('jabatan');

            $data->id_dep = $request->input('department');

            // $data->id_cabang = $request->input('cabang');

            $data->is_blocked = $active;

            $data->password = bcrypt($request->input('password'));

            $data->created_at= date('Y-m-d H:i:s');

            $data->save();

            $request->session()->flash('flash_message', 'Data has ben successful Added!');

            return redirect('karyawan');



        }

    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return Response

     */

    public function edit($id)
    {
        $users = Karyawan::findOrFail($id);
        $listjabatan =  $this->data->listjabatan();
        $listdepartment =  $this->data->listdepartment();
        $provinces = $this->data->provinces();
        // $listcabang =  $this->data->cabang();

        return view("karyawan::edit", [
            'listjabatan' => $listjabatan,
            'listdepartment' => $listdepartment,
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
                'department' => 'required|numeric',

            );

        }else{

            $rules = array(

                'name' => 'required|max:255',

                'nik' => 'required|numeric',
                'email' => 'required|unique:users,email,'.$id,

                'username' => 'required|max:50',

                'address' => 'required|max:255',

                'jabatan' => 'required|numeric',
                'department' => 'required',

            );
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return Redirect::to('karyawan/'.$id.'/edit')->withErrors($validator)->withInput();

        } else {

            $active = ($request->input('active') == "on") ? '1' : '0';
            $data = Karyawan::findOrFail($id);
            $data->name 	= $request->input('name');
            $data->nik 		= $request->input('nik');
            $data->email = $request->input('email');
            $data->is_blocked 		= $active;
            $data->username = $request->input('username');
            $data->id_jabatan = $request->input('jabatan');
            $data->id_dep = $request->input('department');
            // $data->id_cabang = $request->input('cabang');
            $data->address = $request->input('address');

            if(!empty($request->input('password')))
            {
                $data->password = bcrypt($request->input('password'));
            }

            $data->save();
            $request->session()->flash('flash_message', 'Data has ben successful Edited!');

            return redirect('karyawan');
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
        $users = Karyawan::findOrFail($id);
        $users->is_blocked = 1;
        $users->save();
        Session::flash('flash_message', 'Data has ben successful Deleted!');

        return redirect('karyawan');
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
