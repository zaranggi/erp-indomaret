<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

use Modules\Post\Models\Post;
use Modules\Postcategory\Models\Postcategory;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Intervention\Image\ImageManagerStatic as Image;

/**
 * @property Post data
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(Post $data)
    {
        $this->data = $data;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $list = $this->data->listpost();
        return view("post::index", ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $postcategory = Postcategory::all();
        return view('post::create',  ['list' => $postcategory]);
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
            'post_title' => 'required|max:50',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('post/create')->withErrors($validator)->withInput();
        }
        else
        {
			$file_name = "post_".$request->input('title').".jpg";

            $post_status = ($request->input('active') == "on") ? 'Y' : 'N';

            $data = new Post;
            $data->post_title 	= $request->input('post_title');
            $data->id_category 	= $request->input('id_category');
            $data->post_author 	= Auth::user()->name;
            $data->post_content = $request->input('deskripsi');
			$data->images = $file_name;
            $data->post_date 	= date("Y-m-d");
            $data->post_status 	= $post_status;
            $data->save();
			 if ($request->hasFile('file')) {
                Image::make(Input::file('file'))->resize(362, 242)->save('images/news/'.$file_name);
            }

            Session::flash('flash_message', 'Data telah sukses ditambahkan!');

            return redirect('post');

        }
    }


    public function edit($id)
    {
        //
        $data = Post::findOrFail($id);
        $postcategory = Postcategory::all();

        return view('post::edit',  ['list' => $postcategory,
                                            'data' => $data
                                            ]);

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
            'post_title' => 'required|max:50',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('post/'.$id.'/edit')->withErrors($validator)->withInput();

        }
        else
        {
			$file_name = "post_".$request->input('title').".jpg"; 
            $post_status = ($request->input('active') == "on") ? 'Y' : 'N';

            $data = Post::findOrFail($id);
            $data->post_title 	= $request->input('post_title');
            $data->id_category 	= $request->input('id_category');
            $data->post_author 	= Auth::user()->name;
            $data->post_content = $request->input('deskripsi');
			$data->images = $file_name;
            $data->post_date 	= date("Y-m-d");
            $data->post_status 	= $post_status;
        
			 if ($request->hasFile('file')) {
                Image::make(Input::file('file'))->resize(362, 242)->save('images/news/'.$file_name);
            }
			    $data->save();


            Session::flash('flash_message', 'Data telah sukses ditambahkan!');

            return redirect('post');

        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $users = Post::findOrFail($id);
        $users->delete();
        Session::flash('flash_message', 'Data has ben successful Deleted!');

        return redirect('post');
    }
}
