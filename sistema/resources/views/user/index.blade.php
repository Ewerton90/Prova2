@extends("template.admin")

@section("titulo", "Usuários")

@section("formulario")
<form class="row" method="POST" action="/user">
	<div class="col-3">
		<label>Nome</label>
		<input type="text" class="form-control" placeholder="Nome" name="nome" value="{{$user->nome}}" />
	</div>
	<div class="col-3">
		<label>E-mail</label>
		<input type="mail" class="form-control" placeholder="E-mail" name="email" value="{{$user->email}}"/>
	</div>
	<div class="col-3">
		<label>Senha</label>
		<input type="password" class="form-control" placeholder="Senha" name="password" value="{{$user->password}}"/>
	</div>
	<div class="col-3" style="text-align: right;">
		<button class="btn bg-gradient-info botoes" type="button" onclick="location.href='/user';">Novo</button>
		<button type="submit" class="btn bg-gradient-success botoes">Salvar</button>
	</div>
	@csrf
	<input type="hidden" name="id" value="{{$user->id}}"/>
</form>
@endsection

@section("tabela")
<table class="table align-items-center mb-0">
	<colgroup>
		<col width="300">
		<col width="300">
		<col width="50">
		<col width="50">
		<col width="50">
	</colgroup>
	<thead>
        <tr>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">E-mail</th>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
			<th class="text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Excluir</th>
        </tr>
    </thead>
	<tbody>
		@foreach($users as $user)
        <tr>
            <td>
                {{$user->nome}}
            </td>
			<td>
                {{$user->email}}
            </td>
			<td>
			</td>
			<td class="align-middle text-center">
                <button class="btn bg-gradient-warning" type="button" onclick="location.href='/user/{{$user->id}}/edit';">Editar</button>
            </td>
            <td class="align-middle text-center">
				<form method="POST" action="/user/{{$user->id}}">
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