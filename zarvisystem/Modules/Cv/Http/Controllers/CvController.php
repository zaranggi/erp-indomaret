<?php

namespace Modules\Cv\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Cv\Models\Cv;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * @property Cv data
 */
class CvController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(Cv $data)
    {
        $this->data = $data;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //
        $data = Cv::findOrFail(1);

        return view('cv::index',  [
            'data' => $data
        ]);

        return view("cv::index", ['data' => $list]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'nama' => 'required|max:50',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('post/'.$id.'/edit')->withErrors($validator)->withInput();

        }
        else
        {


            $data = Cv::findOrFail($id);
            $data->nama 	= $request->input('nama');
            $data->email 	= $request->input('email');
            $data->alamat 	= $request->input('alamat');
            $data->deskripsi = $request->input('deskripsi');
            $data->kota = $request->input('kota');
            $data->provinsi = $request->input('provinsi');
            $data->zipcode = $request->input('zipcode');
            $data->save();

            Session::flash('flash_message', 'Data telah sukses ditambahkan!');

            return redirect('cv');

        }
    }

}
