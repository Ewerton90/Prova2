<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8"/>
		<title>
			Turma
		</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
		<link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet"/>
		<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
		<link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css')}}" rel="stylesheet" />
	</head>
<body class="g-sidenav-show  bg-gray-100">
	<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
		<div class="container-fluid py-4">
			@if (Session::get("status") == "salvo")
				<div class="alert alert-success" role="alert">
					<strong>Salvo com sucesso!</strong>
				</div>
			@endif
			@if (Session::get("status") == "excluido")
			<div class="alert alert-danger" role="alert">
				<strong>Excluido com sucesso!</strong>
			</div>
			@endif
			
			<div class="row">
				<div class="col-12">
					<div class="card mb-4">
						<div class="card-header pb-0">
							<h6>Formulario</h6>
						</div>
						<div class="card-body pt-0 pb-2">
							@yield("formulario")
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mb-4">
							<div class="card-header pb-0">
								<h6>Tabela</h6>
							</div>
							<div class="card-body pt-0 pb-2">
								<div class="table-responsive pt-0">
									@yield("tabela")
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
	<script src="{{asset('js/core/popper.min.js');}}"></script>
	<script src="{{asset('js/core/bootstrap.min.js');}}"></script>
	<script src="{{asset('js/jquery.js');}}"></script>
	<script src="{{asset('js/plugins/perfect-scrollbar.min.js');}}"></script>
	<script src="{{asset('js/plugins/smooth-scrollbar.min.js');}}"></script>
	<script src="{{asset('js/magnific-popup.js');}}"></script>
</html>