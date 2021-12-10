<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TurmaPublicController extends Controller
{	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$turma = new Turma();
        $turmas = Turma::All();
		return view("turma.index", [
			"turma" => $turma,
			"turmas" => $turmas
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
        if ($request->get("id") != ""){
			$turma = Turma::Find($request->get("id"));
		}else{
			$turma = new Turma();
		}
		$turma->nome = $request->get("nome");
		$turma->curso = $request->get("curso");
		$turma->user = Auth::id();
		$turma->save();
		$request->session()->flash("status", "salvo com sucesso");
		return redirect("/turma");
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
        $turma = Turma::Find($id);
		$turmas = Turma::All();
        return view("turma.index", [
			"turma" => $turma,
			"turmas" => $turmas
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
        Turma::Destroy($id);
		$request->session()->flash("status", "excluido com sucesso");
		return Redirect("/turma");
    }
}
