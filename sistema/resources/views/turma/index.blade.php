@extends("template.admin")

@section("titulo", "Turmas")

@section("formulario")
<form class="row" method="POST" action="/turma">
	<div class="col-4">
		<label for="nome" id="nome">Turma</label>
		<input type="text" class="form-control" placeholder="Nome" name="nome" value="{{$turma->nome}}"/>
	</div>
	<div class="col-4">
		<label for="curso">Curso</label>
		<input type="text" class="form-control" placeholder="Curso" name="curso" value="{{$turma->curso}}"/>
	</div>
	<div class="col-4" style="text-align:right;">
		<button class="btn bg-gradient-info botoes" type="button" onclick="location.href='/turma';">Novo</button>
		<button type="submit" class="btn bg-gradient-success botoes">Salvar</button>
	</div>
	@csrf
	<input type="hidden" name="id" value="{{$turma->id}}"/>
</form>
@endsection

@section("tabela")
<table class="table align-items-center mb-0">
	<colgroup>
		<col width="600">
		<col width="600">
		<col width="50">
		<col width="50">
	</colgroup>
	<thead>
        <tr>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turma</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Curso</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Excluir</th>
        </tr>
	</thead>
	<tbody>
		@foreach($turmas as $turma)
        <tr>
            <td>
				{{$turma->nome}}
			</td>
            <td>
				{{$turma->curso}}
			</td>
			<td class="align-middle text-center">
                <button class="btn bg-gradient-warning" type="button" onclick="location.href='/turma/{{$turma->id}}/edit';">Editar</button>
            </td>
			<td class="align-middle text-center">
				<form method="POST" action="/turma/{{$turma->id}}">
					<input type="hidden" name="_method" value="DELETE"/>
					@csrf
					<button type="submit" class="btn bg-gradient-danger">Excluir</button>
				</form>
            </td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
<!--<script>
	window.addEventListener("load", function(){
		$(document).ready(function() {
			$('.imagem').magnificPopup({
				type: 'iframe'
			});
		});
	});
</script>-->