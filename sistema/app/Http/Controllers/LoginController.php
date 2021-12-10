<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\nota;

class LoginController extends Controller
{	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	
    {	/*$login = new Login();
		$logins = Login::All();*/
		return view("template.admin"); /*,[
			"login" => $login,
			"logins" => $logins
		]);*/
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
		
        $credentials = $request->only('email', 'password');
		
        if(Auth::attempt($credentials)) {
			
			$request->session()->regenerate();
			
			return redirect("/turma");
			
		} else {
			return redirect("/template.admin");
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
        $login = Login::Find($id);
		$logins = Login::All();
        return view("admin", [
			"login" => $login,
			"logins" => $logins
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
        Login::Destroy($id);
		$request->session()->flash("status", "excluido com sucesso");
		return Redirect("/login");
    }
	
	public function logout(){
		Auth::logout();
		return redirect("/login");
	}
	
}
