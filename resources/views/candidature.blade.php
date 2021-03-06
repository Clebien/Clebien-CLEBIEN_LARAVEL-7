<!DOCTYPE html>
<html>
  <head>
    <title>CANDIDATURE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}

		{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}
        {!! Html::style('https://www.w3schools.com/w3css/4/w3.css') !!}
		    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px  #669999; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: url("/uploads/media/default/0001/02/c1504011491c4e04e5158b63a27a4ea654b03ed1.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #669999;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #669999;
      color: #669999;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      .week {
      display:flex;
      justfiy-content:space-between;
      }
      .colums {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .colums div {
      width:48%;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color:  #a3c2c2;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid  #669999;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid  #669999;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .flax {
      display:flex;
      justify-content:space-around;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #669999;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #a3c2c2;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
      
    </style>
  </head>
  <body>
  <br>
  <main>
    <div class="testbox">
    <form action="/candidater/{{ $id}}" method="POST" enctype='multipart/form-data'>
        <div class="banner">
          <h1>Candidature</h1>
        </div>
        @if(isset($err))
               <div align ="center">
                <div class="w-25 p-3">
                <div class="panel panel-danger" align ="center">
                <div class="panel-heading">{{$err}}</div>
                </div>
                </div>
                </div>
        @endif
        <div align="center"><small><span>les fichiers doivent être au format pdf</span></small></div>
        <div class="colums">
        {{csrf_field()}}

          <div class="item">
            <label for="name">CV<span>*</span></label>
            <input type="file" name="cv" required/>
          </div>
          <div class="item">
            <label for="name">Lettre de motivation<span>*</span></label>
            <input type="file" name="lm" required/>
          </div>
          <div class="item">
            <label for="name">Relevés de notes de l’année précédente<span>*</span></label>
            <input type="file" name="Note" required/>
          </div>
          <div class="item">
            <label for="name">Imprime écran de l’ENT de l’année en cours<span>*</span></label>
            <input type="file" name="ent" required/>
          </div>
          <div class="item">
            <label for="name">Formulaire d’inscription rempli<span>*</span></label>
            <input type="file" name="formulaire" required/>
          </div>
          <div class="item" size="16">
            <label for="zip">Formation<span>*</span></label><br>
            <div class="form-group {!! $errors->has('annuaire') ? 'has-error' : '' !!}">
              {!! Form::select('formation', array('1'=>'Licence miage','2'=>'Master 1 miage','3'=>'Master 2 miage'),null, ['class' => 'form-control', 'placeholder' => 'Choisir un niveau']) !!}
              {!! $errors->first('formation', '<small class="help-block">:message</small>') !!}
            </div>
          </div>
        </div>
        <div class="btn-block">
          <button type="submit" >Déposer sa candidature</button><br><br>
        </div>
				</form>
    </div>
    </main>
    <br><br>
  </body>
</html>
