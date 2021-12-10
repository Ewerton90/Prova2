<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Turmas</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />

		<!-- Stylesheet      -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
		<link href="{{asset('css/hipster_cards.css')}}" rel="stylesheet"/>
		<!--<link href="{{asset('css/news.css')}}" rel="stylesheet" />-->
		
		<script src="{{asset('js/jquery.js');}}" type="text/javascript"></script>
		<script src="{{asset('js/core/popper.min.js');}}"></script>
		<script src="{{asset('js/bootstrap.min.js');}}" type="text/javascript"></script>
		
		<!-- Fonts and icons     -->
		<link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Playfair+Display|Raleway:700,100,400|Roboto:400,700|Playfair+Display+SC:400,700' rel='stylesheet' type='text/css'/>

	</head>
<body>		
	<div class="masonry-container">
		<div>
			@yield("turma")
		</div>
	</div>	
</body>

	<script src="{{asset('js/jquery.js');}}" type="text/javascript"></script>
	<script src="{{asset('js/core/popper.min.js');}}"></script>
	<script src="{{asset('js/bootstrap.min.js');}}" type="text/javascript"></script>
	<script src="{{asset('js/hipster-cards.js');}}"></script>
	
	 <!--  Just for demo	 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>
    <script src="{{asset('js/news.js');}}"></script>
	
	<script>
		$().ready(function(){

        	var $container = $('.masonry-container');


            doc_width = $(document).width();

            if (doc_width >= 768){
                $container.masonry({
                    itemSelector        : '.card-box',
                    columnWidth         : '.card-box',
                    transitionDuration  : 0
                });
            } else {
                $('.mas-container').removeClass('mas-container').addClass('row');
            }

    	});
	</script>
</html>
		