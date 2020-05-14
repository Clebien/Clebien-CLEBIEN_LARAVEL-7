
@extends('template3')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-info">  
            <div class="panel-heading">Sign in</div>
            <div class="panel-body"> 
                 @if(isset($var))
                  <div class="panel panel-danger">
                  <div class="panel-heading">{{ $var }} cliquez <a href = "/inscription">ici pour vous inscrire</a></div>
                  </div>
                 @endif
                 @if(isset($err))
                  <div class="panel panel-danger">
                  <div class="panel-heading">{{ $err }}</div>
                  </div>

                 @endif
                    {!! Form::open(['url' => 'user/connection', 'method' => 'post']) !!}
                    {{csrf_field()}}
                    <div class="col-sm-12">
                      
                        <label for="name">Email<span>*</span>
                              <div class ="form-group">
                                  <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" size="50%">
                                  <br>
                                  {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                              </div> 
                        </label>
                        <br>
                        <label for="name">Mot de passe<span>*</span>
                              <div class ="form-group">
                                  <input type="password" name="password" placeholder="Mot de passe" size="50%" >
                                  <br>
                                  {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                              </div>
                        </label>
                        <br>
                        <label for="name">Confirmation du mot de passe<span>*</span>
                              <div class ="form-group"> 
                                  <input type="password" name="password_confirmation" placeholder="Retaper le mot de passe" size="50%" >
                                  <br>
                                  {!! $errors->first('password_confirmation', '<small class="text-danger">:message</small>') !!}
                              </div>
                              @if(isset($passerr))
                                <div class="panel panel-danger">
                                <div class="panel-heading">{{$passerr}}</div>
                                </div>
                              @endif
                        </label>
                      <div class="form-group">
                            <div class="checkbox">
                            <label>
                              <input type="radio" name="statut" value="1" >Etudiant<span>*</span>
                              @if($errors->has('statut'))
                                    <p><span><small>{{ $errors->first('statut') }}</small></span></p>
                                  @endif
                            </label>
                            <label align="right">
                              <input type="radio" name="statut" value="2">Enseignant<span>*</span>
                              @if($errors->has('statut'))
                                    <p><span><small>{{ $errors->first('statut') }}</small></span></p>
                                  @endif
                            </label>
                            </div>
                      </div>
                    {!! Form::submit('Envoyer', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

@endsection