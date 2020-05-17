<!Doctype html>

@extends('layout')
<head>
    <title>Se connecter</title>
    <style>
        main{
            padding-top:10em;
        }
    </style>
</head>
@section('contenu')
<body>

<main>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Connection</div>
                <div class="panel-body">
                 
                    {!! Form::open(['url' => 'user/connection', 'method' => 'post','class'=>'form-horizontal']) !!}

                        {!! csrf_field() !!}
              
                        @if(session('var'))
                          <div class="panel panel-danger">
                          <div class="panel-heading" align="center">{{ session('var') }} cliquez <a href = "/inscription">ici pour vous inscrire</a></div>
                          </div>
                        @endif
                        @if(session('err'))
                          <div class="panel panel-danger">
                          <div class="panel-heading" align="center">{{ session('err')}}</div>
                          </div>

                        @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Adresse mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if(session('error'))
                              <span class="help-block" align="center">
                                <strong>{{ session('error') }}</strong>
                              </span>
                              @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmation du mot de passe</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div align="center">
                        <div class="form-group{{ $errors->has('statut') ? ' has-error' : '' }}">
                            <div class="checkbox">
                            <label>
                              <input type="radio" name="statut" value="1" >Etudiant
                                  @if ($errors->has('statut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('statut') }}</strong>
                                    </span>
                                @endif
                            </label>
                            <label align="right">
                              <input type="radio" name="statut" value="2">Enseignant
                              @if ($errors->has('statut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('statut') }}</strong>
                                    </span>
                                @endif
                            </label>
                            </div>
                      </div>
                      </div>
                        <div class="form-group" align="center">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Connection
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<main>
<body>
@endsection
</html>

