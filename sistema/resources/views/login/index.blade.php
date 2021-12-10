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
		<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
		<link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css')}}" rel="stylesheet" />
	</head>
<body class="g-sidenav-show  bg-gray-100">
	<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h6 class="font-weight-bolder mb-0">Login</h6>
				</nav>
			</div>
		</nav>
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-4">
				</div>
				<div class="col-4">
					<div class="card mb-4">
						<div class="card-body pt-0 pb-2">
							<form class="row" method="POST" action="/login">
								@csrf
								<div class="col-12">
									<label>E-mail</label>
									<input type="mail" class="form-control" placeholder="E-mail" name="email"/>
								</div>
								<div class="col-12">
									<label>Senha</label>
									<input type="password" class="form-control" name="password"/>
								</div>
								<div class="col-12" style="text-align: right">
									</br>
									<button type="submit" class="btn bg-gradient-success">OK</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
	<script src="{{asset('js/core/popper.min.js');}}"></script>
	<script src="{{asset('js/core/bootstrap.min.js');}}"></script>
	<script src="{{asset('js/plugins/perfect-scrollbar.min.js');}}"></script>
	<script src="{{asset('js/plugins/smooth-scrollbar.min.js');}}"></script>
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