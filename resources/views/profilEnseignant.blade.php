@extends('template3')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-info">	
			<div class="panel-heading">Mise à jour informations personnelles</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($enseignant, ['route' => ['admin.update', $enseignant->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
					</div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prenom']) !!}
					  	{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
					  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					<label>Mot de passe</label>
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::password('password', null, ['class' => 'form-control']) !!}
					  	{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
					</div>
					<label>Confirmation de mot de passe</label>
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
					  	{!! $errors->first('password_confirmation', '<small class="help-block">:message</small>') !!}
					</div>
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection