<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelUser;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $data = ModelUser::all();

    if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        $res['message'] = "Success!";
        $res['values'] = $data;
        return response()->json($res);
    }
    else{
        $res['message'] = "Empty!";
        return response()->json($res);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->input('nama');
		$email = $request->input('email');
		$password = $request->input('password');
		
		$data = new ModelUser();
		$data->nama = $nama;
		$data->email = $email;
		$data->password = md5($password);
		

		if($data->save()){
			$res['message'] = "Success!";
			$res['value'] = "$data";
			return response()->json($res);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ModelUser::where('id',$id)->get();

    if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        $res['message'] = "Success!";
        $res['values'] = $data;
        return response($res);
    }
    else{
        $res['message'] = "Failed!";
        return response($res);
    }
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
           //
		$nama = $request->input('nama');
		$email = $request->input('email');
		$password = $request->input('password');
		

		$data = ModelUser::where('id',$id)->first();
		$data->nama = $nama;
		$data->email = $email;
		$data->password = md5($password);
		

		if($data->save()){
			$res['message'] = "Success!";
			$res['value'] = "$data";
			return response($res);
		}
		else{
			$res['message'] = "Failed!";
			return response($res);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelUser::where('id',$id)->first();

		if($data->delete()){
			$res['message'] = "Success!";
			$res['value'] = "$data";
			return response($res);
		}
		else{
			$res['message'] = "Failed!";
			return response($res);
		}
    }
}
