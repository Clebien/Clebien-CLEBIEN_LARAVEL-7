<!Doctype html>
@extends('template3')
<head>
	<title>HOME PAGE</title>
    <style>
        main{
            padding-top:10em;
        }
    </style>

</head>
@section('contenu')
<body>
<main>
      <div class="jumbotron text-center">
      <h1>UNIVERSITE PARIS NANTERRE</h1>
      <br>
      <P>
            Bienvenu, sur le site de getion de la Miage Paris Nanterre <br>
            -Les étudiants pouront s'inscrire, créer leur identifiants, et candidater à une formation <br>
            -Les enseignants pourront étudier les dossiers des étudiants depuis leur espace personnelle <br>
            -L’administrateur (login : admin@parisnanterre.fr / mot de passe : admin) via un formulaire, pourra insérer dans la base une liste d'enseignant.
      </P>
      <br>
        <a href="admin" class="btn btn-primary my-2">Administrateur</a>
        <a href="/inscription" class="btn btn-warning my-2">Etudiant / Enseignant</a>
      </p> 
      </div> 
</main>
</body>
 @endsection
