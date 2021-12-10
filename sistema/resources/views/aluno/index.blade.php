@extends("template.admin")

@section("titulo", "Alunos")

@section("formulario")
<form class="row" method="POST" action="/aluno">
	<div class="col-2">
		<label for="nome">Nome</label>
		<input type="text" class="form-control" placeholder="Nome" name="nome" value="{{$aluno->nome}}" />
	</div>
	<div class="col-2">
		<label for="email">E-mail</label>
		<input type="email" class="form-control" placeholder="Email" name="email" value="{{$aluno->email}}"/>
	</div>
	<div class="col-2">
		<label for="matricula">Matricula</label>
		<input type="num" class="form-control" placeholder="Matricula" name="matricula" value="{{$aluno->matricula}}"/>
	</div>
	<div class="col-1">
		<a>{{$turma->nome}}</a>
	</div>
	<div class="col-3" style="text-align:right;">
		<button class="btn bg-gradient-info botoes" type="button" onclick="location.href='/aluno';">Novo</button>
		<button type="submit" class="btn bg-gradient-success botoes">Salvar</button>
	</div>
	<div class="col-2 form-group">
				<br/>
				@if($aluno->possui == 1)
					<input type="checkbox" id="possui" name="possui" value="1" checked="checked" class="form-group"/>
				@else
					<input type="checkbox" id="possui" name="possui" value="1" />
				@endif
				<label for="possui">Possui</label>
	</div>
	@csrf
	<input type="hidden" name="id" value="{{$aluno->id}}"/>
</form>
@endsection

@section("tabela")
<table class="table align-items-center mb-0">
	<colgroup>
		<col width="700">
		<col width="700">
		<col width="700">
		<col width="700">
		<col width="50">
		<col width="50">
	</colgroup>
	<thead>
        <tr>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aluno</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">E-mail</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Matricula</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turma</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Excluir</th>
        </tr>
    </thead>
	<tbody>
		@foreach($alunos as $aluno)
        <tr>
            <td>   
                {{$aluno->nome}}
			</td>
            <td>
				{{$aluno->email}}
			</td>
			<td>
				{{$aluno->matricula}}
			</td>
			<td>
				@foreach($turmas as $turma)
					{{$turma->nome}}
				@endforeach
			</td>
			<td class="align-middle text-center">
                <button class="btn bg-gradient-warning" type="button" onclick="location.href='/aluno/{{$aluno->id}}/edit';">Editar</button>
            </td>
			<td class="align-middle text-center">
				<form method="POST" action="/aluno/{{$aluno->id}}">
					<input type="hidden" name="_method" value="DELETE"/>
					@csrf
					</br>
					<button type="submit" class="btn bg-gradient-danger">Excluir</button>
				</form>
            </td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
<script>
	window.addEventListener("load", function(){
		$(document).ready(function() {
			$('.imagem').magnificPopup({
				type: 'iframe'
			});
		});
	});
</script>