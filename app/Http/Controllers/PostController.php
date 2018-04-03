<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests;

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $post = Post::latest()->get();
        return view('posts.home',  compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePostRequest $request)
    {
        $input = $request->all();
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('uploads', $name);
            $input['path'] = $name;
        }
        // $user = User::whereName($request->name)->get();
        // $post = Post::create(['title'=>$request->title, 'body'=>$request->body, 'path'=>$name]);
        // $user->posts;
        // $user->save($post);
        $posts = Post::create(['user_id'=>$request->id, 'title'=>$request->title, 'body'=>$request->body, 'path'=>$name]);
        Post::where('title', $request->title)->update(['user_id'=>$request->id]);
        // $user->save(new Post(['title'=>$request->title, 'body'=>$request->body, 'path'=>$name]));
        $resuts_id = $request->id;
        return redirect('/home');
        /* Submitting file */    
   // $file = $request->file('file');
        // return $file->getClientOriginalName();

        /* Normal submitting without file */
        // $this->validate($request, [
        //     'title'=>'required|max:10',
        //     'body'=>'required'
        // ]);
        // $post = Post::create($request->all());
        // $post->save();
        // return redirect('/home');
        // // return $post->title;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts/edit', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $this->validate($request, [
            'file'=>'required'
        ]);
        global $name;
        $input = $request->all();
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('uploads', $name);
            $input['path'] = $name;
        }
        $post = Post::where('id', $id)->update(['title'=>$request->title, 'body'=>$request->body, 'path'=>$request->file->getClientOriginalName()]);
        // $post->save();
        // $post->save();
        // return $post;id
        $newid = $request->id;
        $dir = '/king/'.$newid;
        // return redirect($dir);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::whereId($id)->delete();
        return redirect('/home');
    }

    public function search(){
        $item = $_POST['item'];
        $post_result = Post::where('title', 'like', '%' .$item. '%')->get();
        $search = session()->put([$item=>$item]);
        $result = session()->all();
        // return $result;
        return view('posts.find',  compact('post_result', 'item', 'result'));
    }
    // public function dezleteitem(){
    //     $post = Post::find($id);
    //     return view('posts/delete', compact('post'));
    // }

    public function users_posts($id){
        $users_posts = Post::where('user_id', $id)->get();
        return view('posts.user_posts', compact('users_posts'));
        // return $users_posts;
    }

    // php
}
