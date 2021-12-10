<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\nota;

class TurmaController extends Controller
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
        $turma = new Turma();
		$aluno = new Aluno();
		$nota = new Nota();
		$turmas = Turma::All();
		$alunos = Aluno::All();
		$notas = Nota::All();
        return view("turma.index", [
			"turma" => $turma,
			"turmas" => $turmas,
			"aluno" => $aluno,
			"alunos" => $alunos,
			"nota" => $nota,
			"notas" => $notas
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
		/*$aluno->nome = $request->get("nome");
		$turma->user = Auth::id();*/
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
		$aluno = Aluno::Find($id);
		$nota = Nota::Find($id);
		$turmas = Turma::All();
		$notas = Nota::All();
		$alunos = Aluno::All();
        return view("turma.index", [
			"turma" => $turma,
			"turmas" => $turmas,
			"aluno" => $aluno,
			"alunos" => $alunos,
			"nota" => $nota,
			"notas" => $notas
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
    public function destroy(Request $request, $id)
    {
        Turma::Destroy($id);
		$request->session()->flash("status", "excluido com sucesso");
		return Redirect("/turma");
    }
}
