<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
  	<title>Etude Candidature</title>
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
                  background-color: #000;
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
        </style>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
	</head>
	<body>
      <main>
          <div class="col-sm-offset-4 col-sm-4">
            <br>
          <div class="panel panel-info">	
            <div class="panel-heading">Fiche étudiant</div>
            <div class="panel-body"> 
                  @foreach($candidature as $candidature)
                  <p>Numéro: {{$candidature->numID }}</p>
                  <p>Nom: {{$candidature->nom }}</p>
                  <p>Prenom: {{$candidature->prenom }}</p>
                  <p>Adresse: {{$candidature->adresse }}</p>
                  <p>Téléphone: {{$candidature->Tel }}</p>
                  <p>Email: {{$candidature->email }}</p>
                  <p>Postule en: {{ $candidature->libelle }}</p>
                  <p>Statut:
                      {!! Form::model($candidature, ['route' => ['consulter.update', $candidature->candidatureID], 'method' => 'put']) !!}
                      <select name="statut" id="choix">
                      <option value=""> {{ $candidature->statut }}</option>
                      <option value="1">Reçu</option>
                      <option value="2">Accepté</option>
                      <option value="3">Liste d'atttente</option>
                      <option value="4">Refusé</option>
                      <option value="5">Reçu incomplet en attente de complément</option>
                      <option value="6">Entretien</option>
                      <option value="7">Validé complet</option>
                      </select>
                      </p>
                      <p>Email de l'enseignant qui étudie le dossier</p>
                      <div>
                      {!! Form::email('mail', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
                      {!! $errors->first('mail', '<small class="help-block">:message</small>') !!}
                      </div>
                      {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
              {!! Form::close() !!}
                
                  @endforeach
            </div>
          </div>				
          <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
          </a>
        </div>
      </main>
</body>
</html>
