<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\nota;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
	
	public function listaAlunos(){
		$alunos = DB::table('aluno AS a')
							->join('nota AS n',
							'a.nota', '=', 'n.id')
							->join('turma AS t', 'a.turma',
							'=', 't.id')
							->select('a.id', 'a.nome',
							'a.possui','n.pontos AS nota',
							'n.pontos')
							->get();	
		return $alunos;
	}
	
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
        $aluno = new Aluno();
		$turma = new Turma();
		$nota = new Nota();
		$alunos = $this->listaAlunos();
		$alunos = Aluno::All();
		$turmas = Turma::All();
		$notas = Nota::All();
        return view("aluno.index", [
			"aluno" => $aluno,
			"alunos" => $alunos,
			"turma" => $turma,
			"turmas" => $turmas,
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
		
		$request->validate([
			"nome" => "required",
			"email" => "required|before_or_equal:today",
			"matricula" => "required",
			/*"nota" => "required"*/
		],[
			"nome.required" => "Nome é Obrigatório!",
			"email.required" => "Pontos é Obrigatório!",
			"matricula.required" => "Turma é Obrigatório!",
			/*"nota.required" => "Nota é Obrigatório!",
			"pontos.before_or_equal" => "Pontos
			tem de ser menor que 10!"*/
		]);
		
        if ($request->get("id") != ""){
			$aluno = Aluno::Find($request->get("id"));
		}else{
			$aluno = new Aluno();
		}
		$aluno->nome = $request->get("nome");
		$aluno->email = $request->get("email");
		$aluno->matricula = $request->get("matricula");
		/*$turma->nome = $request->get("nome");
		$aluno->turma = $request->get("turma");
		$aluno->nota = $request->get("nota");*/
		
		if($request->get("possui") == 1){
			$aluno->possui = 1;
		}else{	
			$aluno->possui = 0;
		}
		$aluno->save();
		$request->session()->flash("status", "salvo com sucesso");
		return redirect("/aluno");
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
        $aluno = Aluno::Find($id);
		$alunos = $this->listaAlunos();
		$turma = Turma::Find($id);
		$nota = Nota::Find($id);
		$notas = Nota::All();
		$alunos = Aluno::All();
		$turmas = Turma::All();
        return view("aluno.index", [
			"aluno" => $aluno,
			"alunos" => $alunos,
			"turma" => $turma,
			"turmas" => $turmas,
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
    public function destroy($id, Request $request)
    {
        Aluno::Destroy($id);
		$request->session()->flash("status", "excluido com sucesso");
		return Redirect("/aluno");
    }
	
	public function Adquirir(Request $request, $id){
		$aluno = Aluno::Find($id);
		$aluno->possui = 1;
		$aluno->save();
		$request->session()->flash("status", "Adquirido com sucesso!");
		return redirect("/aluno");
	}
	
}
