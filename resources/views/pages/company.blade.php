@extends('layouts.app')
@section('head')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>

{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}

<script>
        $(document).ready(function() {
		$('.js-example-basic-single').select2();
		$(".login-content select").css({ 'display' : 'flex', 'justify-content' : 'flex-start', 'align-items' : 'center', 'text-align' : 'center'  });
		
});
</script>
<style>
	.select2-container--default .select2-selection--single {
		min-height: 40px;
		font-size: 26px;
		line-height: inherit;
		padding-top: 5px;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow{
		top: 7px;
	}
</style>
@endsection
@section('content')
<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
            <form action="{{ action('PagesController@index') }}" accept-charset="UTF-8">
			{{-- <form method="POST" action="{{ action('PagesController@index') }}" accept-charset="UTF-8"> --}}
                
				<img src="img/avatar.svg">
				  <div class="row">
				<h1 class="title">Select Company</h1>
				
						<select class="js-example-basic-single btn" name="state">
							<option value="1">SM</option>
							<option value="2">MK</option>
							<option value="3">WW</option>

						  </select>
				</div>
				
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
@endsection
            
