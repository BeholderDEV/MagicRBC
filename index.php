
<!DOCTYPE html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magic RBC</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="lib/angular-select/isteven-multi-select.css" type="text/css"/>
    <link rel="stylesheet" href="css/estilo.css"></link>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body ng-controller="MainCtrl as main">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Magic RBC</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Documentação</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <div class="row" id="forms">
        <form class="form-inline col-md-12">
          <div class="form-group">
            <label>Color</label>
            <div
              isteven-multi-select
              input-model="colorsModel"
              output-model="colorsSelected"
              button-label="icon"
              item-label="icon name"
              on-close="atualizarTabela()"
              helper-elements=""
              tick-property="ticked"></div>
          </div>
          <div class="form-group">
            <label>Type</label>
            <div
              isteven-multi-select
              input-model="typeModel"
              output-model="typeSelected"
              button-label="name"
              item-label="name"
              tick-property="ticked"
              on-close="atualizarTabela()"
              helper-elements=""
              selection-mode="single"></div>
          </div>
          <div class="form-group">
            <label>Super Type</label>
            <div
              isteven-multi-select
              input-model="superTypeModel"
              output-model="superTypeSelected"
              button-label="name"
              item-label="name"
              tick-property="ticked"
              on-close="atualizarTabela()"
              helper-elements=""
              selection-mode="single"></div>
          </div>
          <div class="form-group">
            <label>Rarity</label>
            <div
              isteven-multi-select
              input-model="rarityModel"
              output-model="raritySelected"
              button-label="name"
              item-label="name"
              tick-property="ticked"
              on-close="atualizarTabela()"
              helper-elements=""
              selection-mode="single"></div>
          </div>
          <div class="form-group">
            <label>Mana Cost</label>
            <div
              isteven-multi-select
              input-model="cmcModel"
              output-model="cmcSelected"
              button-label="name"
              item-label="name"
              tick-property="ticked"
              on-close="atualizarTabela()"
              helper-elements=""
              selection-mode="single"></div>
          </div>
          <div class="form-group">
            <button id="botao" type="submit" class="btn btn-primary pull-right">Search</button>
          </div>
        </form>
      </div>
      <section class="row">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Color</td>
                  <th>Type</td>
                  <th>Super Type</td>
                  <th>Rarity</td>
                  <th>Convertes Mana Cost</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{colors}}</td>
                  <td>{{type}}</td>
                  <td>{{superType}}</td>
                  <td>{{rarity}}</td>
                  <td>{{cmc}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

    </div> <!-- /container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <script type="text/javascript" src="lib/angular-select/isteven-multi-select.js"></script>


    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
  </body>
</html>
