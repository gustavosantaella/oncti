<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - NOTICIAS ONCTI</title>
	<link href="{{ asset('css/css-template-bootstrap/style.css') }}" rel="stylesheet" />
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
	<style>

	}   
</style>
</head>
<body{{--  style="background: #949ad6" --}} style="overflow-y: hidden;">

<div class="container p-md-5 mt-md-5 mt-5 d-flex align-items-center justify-content-center">

	<div class="card shadow-lg">
		<div class="card-body">
			<div class="card-title">
				<h2 class="text-center">Iniciar sesi&oacute;</h2>   
			</div>
			<div class="login-form ">
				{!! Form::open(['route'=>'signIn','autocomplete'=>'off','method'=>'POST']) !!}
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon mr-3"><i class="fa fa-user"></i></span>
						{!! Form::text('username', null, ['class'=>'form-control','placeholder'=>'Usuario...']) !!}		
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon mr-3"><i class="fa fa-lock"></i></span>
						{!! Form::password('password', ['class'=>'form-control','placeholder'=>'Clave...']) !!}		
					</div>
				</div>        
				<div class="form-group">
					{!! Form::submit('Aceptar', ['class'=>'btn btn-primary btn-block font-weight-bold']) !!}
				</div>

			</form>

		</div>
	</div>
</div>
</div>

</body>
</html>