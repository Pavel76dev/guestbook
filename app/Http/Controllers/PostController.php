<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use Storage;
use Config;
use App\Http\Requests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->paginate(5);
        return view('post.index',  compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = Config::get('validation.messagesPost');
		$rules = Config::get('validation.rulesPost');
		$validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes())
        {
            $input = $request->all();
            if ($input['fileimage'] != null)
            {
            $path = Storage::putFile('public', $input['fileimage']);
            $request->request->add(['image' => $path]);
            }
            $user_id = auth()->user()->id;
            $request->request->add(['user_id' => $user_id]);
            $post = Post::create($request->all());
           $success = ['success' => 'Ваши данные получены.'];
           return response()->json(['success' => $success]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
		return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $messages = Config::get('validation.messagesPost');
		$rules = Config::get('validation.rulesPost');
		$validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes())
        {
            $input = $request->all();
            if ($input['fileimage'] != null)
            {
            $path = Storage::putFile('public', $input['fileimage']);
            $request->request->add(['image' => $path]);
            }
            Post::find($id)->update($request->all());
            $post = Post::find($id);
            $success = ['success' => 'Ваши данные получены.'];
			return response()->json(['success' => $success]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
