<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
  	<title>Espace Enseignant</title>
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}
        {!! Html::style('https://www.w3schools.com/w3css/4/w3.css') !!}
		    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}

		<style> 
                        
                .navbar {
                  width: 100%;
                  overflow: none;
                }
                /* Navigation links */
                .navbar a {
                  float: left;
                  padding: 12px;
                  text-decoration: none;
                  font-size: 17px;
                  width: 25%; /* Four equal-width links. If you have two links, use 50%, and 33.33% for three links, etc.. */
                  text-align: center; /* If you want the text to be centered */
                }
                /* Add a background color on mouse-over */
                .navbar a:hover {
                  background-color: #F5F8F9;
                }
                /* Style the current/active link */
                .navbar a.active {
                  background-color: #4CAF50;
                }
                /* Add responsiveness - on screens less than 500px, make the navigation links appear on top of each other, instead of next to each other */
                @media screen and (max-width: 500px) {
                  .navbar a {
                    float: none;
                    display: block;
                    width: 100%;
                    text-align: left; /* If you want the text to be left-aligned on small screens */
                  }
                }
                span{
                  color:red;
                }
                .w3-dropdown-content {
                  min-width: 108px;
                }
                <style>
                .center {
                    margin: auto;

                }
        </style>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
	</head>
	<body>
    <header>
          <div class ="navbar">
          <div class="w3-container ">
          <div class="w3-bar w3-light-grey" > 
              <a href="/inscription" class="w3-bar-item w3-button" > <i class="fa fa-home"> Home</i></a>
              <a href="/validation" class="w3-bar-item w3-button"><i class="fa fa-fw fa-envelope"></i> Contact</a>
          <div class="w3-dropdown-hover">
              <button class="w3-button"><i class="fa fa-fw fa-user"></i> <small><span> {{ $enseignant->prenom }}</span></small></button>
          <div class="w3-dropdown-content w3-bar-block w3-card-4">
              <a href="/inscription" class="w3-bar-item w3-button"><small><span>logout</span></small><i class='fas fa-power-off'></i></a>
          </div>
          </div>
          </div>
          </div>
          </div>
      </header>
      <main>

                      @if(isset($success))
                              <div align ="center">
                              <div class="w-25 p-3">
                              <div class="panel panel-success" align ="center">
                              <div class="panel-heading">{{$success}}</div>
                              </div>
                              </div>
                              </div>
                      @endif
                <div align="center">
                <div class="h-25 d-inline-block center" align="center">
                {!! Form::open(['method' => 'get', 'route' => ['admin.edit', $enseignant->id]]) !!}
                @csrf
                  <div><h5>Afficher les candidatures par niveau</h5></div>
                  <div class="form-group {!! $errors->has('annuaire') ? 'has-error' : '' !!}">
                      {!! Form::select('niveau', array('1'=>'Licence miage','2'=>'Master 1 miage','3'=>'Master 2 miage'),null, ['class' => 'form-control', 'placeholder' => 'Choisir un niveau']) !!}
                      {!! $errors->first('niveau', '<small class="help-block">:message</small>') !!}
                  </div>
                {!! Form::submit('Afficher', ['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
                </div>
                &emsp;&emsp;
                <div class="h-25 d-inline-block" align="center">
                {!! Form::open(['method' => 'get', 'route' => ['candidature.show', $enseignant->id]]) !!}
                @csrf
                  <div><h5>Afficher les candidatures par statut</h5></div>
                  <div class="form-group {!! $errors->has('annuaire') ? 'has-error' : '' !!}">
                      {!! Form::select('statut', array('1'=>'Reçu','2'=>'Accepté','3'=>'Liste d\'atttente','4'=>'Refusé','5'=>'Reçu incomplet en attente de complément','6'=>'Entretien','7'=>'Validé complet'),null, ['class' => 'form-control', 'placeholder' => 'Choisir un statut']) !!}
                      {!! $errors->first('statut', '<small class="help-block">:message</small>') !!}
                  </div>
                {!! Form::submit('Afficher', ['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
                </div>
                </div>
                <br><br><br>
                <div align="center">
                <div class="w-75 p-3">
                <div class="panel panel-default">
                <!-- Contenu avec la classe .panel-default -->
                <div class="table-responsive">
                <div class="panel-heading">
                <div class="float-left">
                  
                  {{ link_to_route('consulter.show', 'Toutes les candidatures',[$enseignant->id], ['class' => 'btn btn-info btn-block']) }}
                </div>
                <div class="float-right">
                
                  {{ link_to_route('groupe.edit', 'Voir mon profil',[$enseignant->id], ['class' => 'btn btn-info btn-block']) }}
                
                </div>
                <br>
                <br>
                </div>
        
                <div class="panel-body" style="padding:10px">
                <!-- Avec un tableau -->
                @if(!empty(isset($candidature)))
                <table class="table">
                <tr>
                  <th>Numéro</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>libellé</th>
                  <th>Statut</th>
                  <th>Formulaire</th>
                  <th>Capture ENT</th>
                  <th>Notes</th>
                  <th>Lettre de motivation</th>
                  <th>CV</th>
                  <th>Action</th>
                </tr>
                @foreach($candidature as $candidature)
                <tr>
                <td>{{$candidature->numID}}</td>
                <td>{{$candidature->nom}}</td>
                <td>{{$candidature->prenom}}</td>
                <td>{{$candidature->email}}</td>
                <td>{{$candidature->libelle}}</td>
                <td>{{ $candidature->statut }}</td>
                <td>{{ link_to_route('form', 'Télécharger',[$candidature->candidatureID], ['class' => 'btn btn-success btn-sm btn-block']) }}</td>
                <td>{{ link_to_route('ent', 'Télécharger',[$candidature->candidatureID], ['class' => 'btn btn-success btn-sm btn-block']) }}</td>
                <td>{{ link_to_route('note', 'Télécharger',[$candidature->candidatureID], ['class' => 'btn btn-success btn-sm btn-block']) }}</td>
                <td>{{ link_to_route('lettre', 'Télécharger',[$candidature->candidatureID], ['class' => 'btn btn-success btn-sm btn-block']) }}</td>
                <td>{{ link_to_route('cv', 'Télécharger',[$candidature->candidatureID], ['class' => 'btn btn-success btn-sm btn-block']) }}</td>
                <td>{{ link_to_route('consulter.edit', 'Etudier candidature',[$candidature->candidatureID], ['class' => 'btn btn-warning btn-sm btn-block']) }}</td>
                </tr>
                @endforeach
                </table>
                @endif
                @if(isset($profil))
                <table class="table">
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th></th>
                </tr>
                <tr>
                @foreach($profil as $profil)
                <td>{{$profil->nom}}</td>
                <td>{{$profil->prenom}}</td>
                <td>{{$profil->email}}</td>
                <td>{{ link_to_route('admin.show', 'Modifier',[$profil->id], ['class' => 'btn btn-warning btn-sm btn-block']) }}</td>
                @endforeach
                </tr>
                </table>
                @endif
              </div>
              </div>
              </div>
              </div>
              </div>
    </main>

	</body>
</html>