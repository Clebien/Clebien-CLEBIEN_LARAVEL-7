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
        <a href="admin" class="btn btn-primary my-2">Administrateur</a>
        <a href="/inscription" class="btn btn-warning my-2">Etudiant / Enseignant</a>
      </p> 
      </div> 
</main>
</body>
 @endsection