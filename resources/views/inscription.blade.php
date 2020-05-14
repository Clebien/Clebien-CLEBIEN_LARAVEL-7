<!DOCTYPE html>
<html>
  <head>
    <title>ACCUEIL</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #eee;
      }
      body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: rgba(0, 0, 0, 0.5); 
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: rgba(0, 0, 0, 0.7); 
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #eee;
      }
      option:focus {
      border: none;
      }
      option {
      background: black; 
      border: none;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px; 
      border: none;
      background: #26a9e0; 
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
      span{
				color: #AD0313;
			}

    </style>
  </head>
  <body>
  <header>
  <br>
  <div class="w3-light-grey" > 
    <a href="/" class="w3-bar-item w3-button" ><h3><i class="fa fa-home"> Home</i></h3></a>
  <div>
  </header>
  <br>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Bienvenu sur le site de la miage Paris Nanterre</h1>
        <p>Veuillez renseigner vos informations pour déposer votre dossier</p><br>
        <p>ou connectez-vous</p>
        <div class="btn-group">
          <a class="btn-item" href="/connection">Connection</a>
        </div>
      </div>
      <form action="etudiantController" method="POST">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>formulaire etudiant</h2>
        </div>
        {{csrf_field()}}
        <div class="info">
        @if($errors->has('nom'))
            <p><span><small>{{ $errors->first('nom') }}</small></span></p>
          @endif
          <input class="fname" type="text" name="nom" placeholder="Nom" value="{{ old('nom') }}">
          @if($errors->has('prenom'))
            <p><span><small>{{ $errors->first('prenom') }}</small></span></p>
          @endif
          <input class="fname" type="text" name="prenom" placeholder="Prenom" value="{{ old('prenom') }}">
          @if($errors->has('idendite'))
            <p><span><small>{{ $errors->first('identite') }}</small></span></p>
          @endif
          <input type="text" name="identite" placeholder="Numéro de carte d'identité">
          @if($errors->has('dateNaissance'))
            <p><span><small>{{ $errors->first('dateNaissance') }}</small></span></p>
          @endif
          <input type="date" name="dateNaissance" placeholder="Date de naissance">
          @if($errors->has('adresse'))
            <p><span><small>{{ $errors->first('adresse') }}</small></span></p>
          @endif
          <input type="text" name="adresse" placeholder="Adresse postale" value="{{ old('adresse') }}">
          @if($errors->has('tel'))
            <p><span><small>{{ $errors->first('tel') }}</small></span></p>
          @endif
          <input type="number" name="tel" placeholder="Téléphone">
          @if($errors->has('email'))
            <p><span><small>{{ $errors->first('email') }}</small></span></p>
          @endif
          <input type="email" name="email" placeholder="Adresse mail" value="{{ old('email') }}">

          <br>
        </div>
        <div class="checkbox">
          <input type="checkbox" name="checkbox">J'accepte la <a href="https://www.parisnanterre.fr/mentions-legales/"> politique de confidentialité de la Miage Nanterre.</a>
          @if($errors->has('checkbox'))
            <p><span><small>{{ $errors->first('checkbox') }}</small></span></p>
          @endif
        </div>
        <button type="submit" >Envoyer</button>
      </form>
    </div>
    <footer>
  <div class="w3-light-grey" >
  <br><br><br><br>
  <div>
  </footer>
  </body>
</html>