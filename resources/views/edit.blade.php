@extends('template3')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-info">	
			<div class="panel-heading">Mise à jour informations personnelles</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($etudiant, ['route' => ['groupe.update', $etudiant->ID], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('numID', null, ['class' => 'form-control', 'placeholder' => 'Numéro']) !!}
					  	{!! $errors->first('numID', '<small class="help-block">:message</small>') !!}
					</div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
					</div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prenom']) !!}
					  	{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
					  	{!! Form::date('dateNaiss', null, ['class' => 'form-control', 'placeholder' => 'Date de naissance']) !!}
					  	{!! $errors->first('dateNaiss', '<small class="help-block">:message</small>') !!}
					</div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Adresse']) !!}
					  	{!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
					</div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::number('Tel', null, ['class' => 'form-control', 'placeholder' => 'Téléphone']) !!}
					  	{!! $errors->first('Tel', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Téléphone']) !!}
					  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="mot de passe">
						@if($errors->has('password'))
							<p>{{ $errors->first('password') }}</p>
						@endif

					</div>
					<div class="form-group">
						<input type="password" name="password_confirmation" placeholder="confirmer mot de passe">
						@if($errors->has('password_confirmation'))
							<p>{{ $errors->first('password_confirmation') }}</p>
						@endif
					</div>
						{!! Form::submit('Envoyer', ['class' => 'btn btn-info pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection