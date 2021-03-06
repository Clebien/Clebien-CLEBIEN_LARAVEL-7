<!Doctype html>
@extends('template3')
<head>
	<title>Contact</title>
</head>

@section('contenu')
    <br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Contactez-nous</div>
			<div class="panel-body"> 
				{!! Form::open(['url' => 'validation/contact', 'method' => 'post']) !!}
                		@if(session('success'))
                          <div class="panel panel-success">
                          <div class="panel-heading" align="center">{{ session('success')}} </div>
                          </div>
                        @endif
                        {{csrf_field()}}
					<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
						{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
						{!! $errors->first('nom', '<small class="text-danger">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
						{!! Form::email('login', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
						{!! $errors->first('login', '<small class="text-danger">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
						{!! Form::textarea ('contenu', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
						{!! $errors->first('contenu', '<small class="text-danger">:message</small>') !!}
					</div>
					{!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
</html>
