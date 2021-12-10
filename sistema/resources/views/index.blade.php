@extends("template.public")

@section("turma")
	@foreach($turmas as $turma)
		<div class="card">
            <div class="content">
                <h4 class="title">{{$turma->nome}}</h4>
			</div>
		</div>
	@endforeach
@endsection