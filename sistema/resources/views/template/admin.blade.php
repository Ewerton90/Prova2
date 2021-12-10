<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>
			@yield("titulo")
		</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
		<link rel="stylesheet" href="{{asset('css/botoes.css')}}"/>
		<link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet"/>
		<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
		<link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css')}}" rel="stylesheet" />
	</head>
<body class="g-sidenav-show  bg-gray-100">
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
		<div class="sidenav-header">
			<a class="navbar-brand m-0" href="/user">
				<span class="ms-1 font-weight-bold">Admin Page</span>
			</a>
		</div>
		<hr class="horizontal dark mt-0"/>
		<div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/user">
						<span class="nav-link-text ms-1">Usuarios</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/turma">
						<span class="nav-link-text ms-1">Turmas</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/aluno">
						<span class="nav-link-text ms-1">Alunos</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/nota">
						<span class="nav-link-text ms-1">Notas</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/logout">
						<span class="nav-link-text ms-1">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>
	<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h6 class="font-weight-bolder mb-0">@yield("titulo")</h6>
				</nav>
			</div>
		</nav>
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
								<div class="table-responsive p-0">
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
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}	
	</script>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script src="{{asset('js/soft-ui-dashboard.min.js');}}"></script>
</html>