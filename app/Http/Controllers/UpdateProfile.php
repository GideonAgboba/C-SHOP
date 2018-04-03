<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UpdateProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "worked!";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "worked!";
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        global $file;
        $input = $request->all();
        if($file = $request->file('path')){
            $name = $file->getClientOriginalName();
            $file->move('uploads', $name);
            $input['path'] = $name;
        }
        $update = ['firstname'=>$request->firstname, 'lastname'=>$request->lastname, 'address'=>$request->address, 'phone'=>$request->phone, 'city'=>$request->city, 'country'=>$request->country, 'zip'=>$request->zip, 'bio'=>$request->bio, 'path'=>$input['path']];
        $user = User::where('id', $request->id)->update($update);
        return redirect()->back();
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
        //
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
        // $this->validate($request, [
        //     'file'=>'required',
        //     'bio'=> 'min:10'
        // ]);
        // global $name;
        $input = $request->all();
        if($file = $request->file('path')){
            $name = $file->getClientOriginalName();
            $file->move('uploads', $name);
            $input['path'] = $name;
        }
        
        $user = User::where('id', $request->id)->update(['path'=>$input['path']]);
        return redirect()->back();
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
