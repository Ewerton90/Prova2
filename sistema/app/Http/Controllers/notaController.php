<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\nota;
use App\Models\Aluno;
use App\Models\Turma;

class notaController extends Controller
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
        $nota = new Nota();
		$aluno = new Aluno();
		$turma = new Turma();
		$notas = Nota::All();
		$alunos = Aluno::All();
		$turmas = Turma::All();
        return view("nota.index", [
			"nota" => $nota,
			"notas" => $notas,
			"aluno" => $aluno,
			"alunos" => $alunos,
			"turma" => $turmas,
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
			$nota = Nota::Find($request->get("id"));
		}else{
			$nota = new Nota();
		}
		$nota->pontos = $request->get("pontos");
		$nota->nome = $request->get("nome");
		$turma->nome = $request->get("nome");
		$aluno->nome = $request->get("nome");
		/*$nota->turma = $request->get("turma");*/
		/*$nota->user = Auth::id();*/
		$nota->save();
		$request->session()->flash("status", "salvo com sucesso");
		return redirect("/nota");
		
		$nota = new Nota();
		$nota->aluno = $request->get("aluno");
		$url = $request->input("url")->store("public/alunos");
		/*$url = str_replace("public/", "storage/", $url);*/
		$nota->url = $url;
		$nota->save();
		
		$request->session()->flash("status", "salvo");
		
		return redirect("/nota/" . $request->get("nota"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notas = Nota::Where("aluno", "=", $id)->get();
        return view("nota.index",[
			"aluno" => $id,
			"notas" => $notas
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::Find($id);
		$aluno = Aluno::Find($id);
		$turma = Turma::Find($id);
		$alunos = Aluno::All();
		$turmas = Turma::All();
		$notas = Nota::All();
        return view("nota.index", [
			"nota" => $nota,
			"notas" => $notas,
			"aluno" => $aluno,
			"alunos" => $alunos,
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
        /*Nota::Destroy($id);
		$request->session()->flash("status", "excluido com sucesso");
		return Redirect("/nota");*/
		
		$nota = Nota::Find($id);
		$url = $nota->url;
		/*$url = str_replace("storage/", "public/", $url);*/
		$aluno = $nota->aluno;
		$nota->delete();
		
		Storage::delete($url);
		
		$request->session()->flash("status", "excluido");
		
		return redirect("/notas/" . $request->get("nota"));
    }
}
