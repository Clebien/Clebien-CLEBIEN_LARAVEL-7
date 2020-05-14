<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
  	<title>Espace étudiant</title>
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
    <header>
          <div class ="navbar">
          <div class="w3-container ">
          <div class="w3-bar w3-light-grey" > 
              <a href="/inscription" class="w3-bar-item w3-button" > <i class="fa fa-home"> Home</i></a>
              <a href="/espaceEtudiant/contact" class="w3-bar-item w3-button"><i class="fa fa-fw fa-envelope"></i> Contact</a>
              <a href="/espaceEtudiant/candidature" class="w3-bar-item w3-button"><i class="fas fa-user-graduate"></i>Candidater</a>
          <div class="w3-dropdown-hover">
              <button class="w3-button"><i class="fa fa-fw fa-user"></i> <small><span> {{ $etudiant->prenom }}</span></small></button>
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
         <div class="w-75 p-3">
         <div class="panel panel-default">
  <!-- Contenu avec la classe .panel-default -->
   <div class="panel-heading"></div>
   <div class="panel-body" style="padding:10px">
    <div class="float-left">
     <p>

      {{ link_to_route('user.edit', 'Consulter candidature',[$etudiant->ID], ['class' => 'btn btn-info btn-block']) }}
     </p>
     </div>
     
     <div class="float-right">
     <p>

      {{ link_to_route('user.show', 'Consulter profil',[$etudiant->ID], ['class' => 'btn btn-info btn-block']) }}
     </p>
     </div>
   </div>
   <!-- Avec un tableau -->
   @if(isset($candidature))
   <table class="table">
   <tr>
     <th>Numéro</th>
     <th>Nom</th>
     <th>Prénom</th>
     <th>Adresse</th>
     <th>Téléphone</th>
     <th>Email</th>
     @foreach($candidature as $candidature)
     @if(!empty($candidature->formation_formID ))
     <th>postule pour</th>
     <th>Statut</th>
     @endif
     <th></th>
     <th></th>
   </tr>
   <tr>
   <tr>
   <td>{{$etudiant->numID}}</td>
   <td>{{$etudiant->nom}}</td>
   <td>{{$etudiant->prenom}}</td>
   <td>{{$etudiant->adresse}}</td>
   <td>{{$etudiant->Tel}}</td>
   <td>{{$etudiant->email}}</td>
   @if(!empty($candidature->formation_formID ))
   <td>{{$candidature->libelle}}</td>
   <td>{{ $candidature->statut }}</td>
   @endif
   <td>{{ link_to_route('validation.edit', 'Modifier',[$etudiant->ID], ['class' => 'btn btn-warning btn-block']) }}</td>
    <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $etudiant->ID]]) !!}
        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet Candidature ?\')']) !!}
        {!! Form::close() !!}
    </td>
   @endforeach
   </tr>
  </table>
  @endif
  @if(isset($profil))
   <table class="table">
   <tr>
     <th>Numéro</th>
     <th>Nom</th>
     <th>Prénom</th>
     <th>Date de naissance</th>
     <th>Adresse</th>
     <th>Téléphone</th>
     <th>Email</th>
     <th></th>
   </tr>
   @foreach($profil as $profil)
   <tr>
   <td>{{$profil->numID}}</td>
   <td>{{$profil->nom}}</td>
   <td>{{$profil->prenom}}</td>
   <td>{{$profil->dateNaiss}}</td>
   <td>{{$profil->adresse}}</td>
   <td>{{$profil->Tel}}</td>
   <td>{{$profil->email}}</td>
   <td>{{ link_to_route('groupe.show', 'Modifier',[$etudiant->ID], ['class' => 'btn btn-warning btn-block']) }}</td>
   </tr>
   @endforeach
  </table>
  @endif
</div>
</div>
</div>
        </main>

	</body>
</html>