<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\nota;

class UserController extends Controller
{
	/*public function __construct(){
			$this->middleware("auth");
	}*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
		$users = User::All();
		return view("user.index", [
			"user" => $user,
			"users" => $users
		]);
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
        if($request->get("id") != ""){
			$user = User::Find($request->get("id"));
		}else{
			$user = new User(); 
		}
		$user->nome = $request->get("nome");
		$user->email = $request->get("email");
		$user->password = Hash::make ($request->get("password"));
		$user->Save();
		$request->Session()->Flash("status", "salvo");
		return redirect("/user");
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
        
        $user = User::Find($id);
		$users = User::All();
		return view("user.index", [
			"user" => $user,
			"users" => $users
		]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::Destroy($id);
		$request->Session()->Flash("status", "excluido");
		return redirect("/user");
    }
}
