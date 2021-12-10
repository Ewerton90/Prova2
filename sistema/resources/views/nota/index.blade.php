@extends("template.admin")

@section("titulo", "Notas")

@section("formulario")
	<form class="row" method="POST" action="/nota">
		@csrf
		<div class="row">
			<div class="col-3 form-group">
				<label for="nome" id="nome">Turma</label>
					<select id="nome" name="nome" value="" class="form-control">
						<option value=""></option>
							@foreach($turmas as $t)
								@if($t->id == $aluno->t)
									<option value="{{$t->id}}" selected="selected" onclick="location.href='/aluno/{{$aluno->nome}}';">{{$t->nome}}</option>
								@else
									<option value="{{$t->id}}">{{$t->nome}}</option>
								@endif
							@endforeach
					</select>
							@if($errors->get("turmas"))
								<small class="text-danger">{{$errors->first("turmas")}}</small>
								<script>$("#turmas").addClass("is-invalid");</script>
							@endif
			</div>
			<!--<div class="col-3 form-group">
				<label for="pontos" id="pontos">Nota</label>
				@csrf
				<input type="text" id="pontos" name="pontos" placeholder="pontos" value="{{$nota->pontos}}" class="form-control"/>
			</div>
			<div class="col-1 form-group">
				<button type="submit" class="btn bg-gradient-success botoes" class="form-control">Salvar</button>
			</div>-->
		</div>
		<input type="hidden" name="id" value="{{$nota->id}}"/>
	</form>
@stop

@section("tabela")
	<table class="table align-items-center mb-0">
		<colgroup>
			<col width="200">
			<col width="170">
			<col width="10">
			<!--<col width="120">-->
			<!--<col width="120">-->
		</colgroup>
		<thead>
			<tr>
				<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turma</th>
				<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aluno</th>
				<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nota</th>
				<!--<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>-->
				<!--<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Excluir</th>-->
			</tr>
		</thead>
		<body>
			@foreach($turmas as $t)
				<tr>
					<td>
						{{$t->nome}}
					</td>
					<td>
						@foreach($alunos as $aluno)
							{{$aluno->nome}}
						@endforeach
					</td>
					<td class="align-middle text-left">
						<form id="frm1" action="/nota">
							<!--<button id="btn1" name="subject" type="submit" value="10" class="btn btn-outline-light text-dark" disabled></button>-->
							
							<button id="btn1" name="subject" type="submit" value="10" 
							onclick="myFunction()" class="btn btn-outline-info botoes">Nota</button>

							<p id="demo"></p>	
							
							<script>
								function myFunction() {
								  var x = document.getElementById("btn1").value;
								  document.getElementById("demo").innerHTML = x;
								}
							</script>
						</form>
					</td>
					<!--<td class="align-middle text-center">
						<button class="btn bg-gradient-warning botoes" type="button" onclick="location.href='/nota/{{$nota->id}}/edit';">Editar</button>
					</td>
					<td class="align-middle text-center">
						<form method="POST" action="/nota/{{$nota->id}}">
							<input type="hidden" name="_method" value="DELETE"/>
							@csrf
							<button type="submit" class="btn bg-gradient-danger botoes">Excluir</button>
						</form>
					</td>-->
				</tr>	
			@endforeach
		</body>
	</table>
@endsection