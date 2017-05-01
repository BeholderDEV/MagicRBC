
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
    <link rel="stylesheet" href="https://unpkg.com/angular-toastr/dist/angular-toastr.css" />
    <link rel="stylesheet" href="lib/angular-select/isteven-multi-select.css" type="text/css"/>
    <link rel="stylesheet" href="css/estilo.css"></link>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body ng-controller="MainCtrl as main" ng-cloak>
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
            <li><a href="documentation.php">Documentação</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <div class="row" id="forms">
        <form class="form-inline col-md-12" method="post" enctype="multipart/form-data">
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
            <button id="botao" type="submit" ng-click="searchCard()" class="btn btn-primary pull-right">Search</button>
          </div>
        </form>
      </div>
      <section class="peso row">
        <h2> Pesos </h2>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cor</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" placeholder="0.25" value="0.25" id="color_weight">
            </div>
      </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tipo</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" placeholder="0.25" value="0.25" id="type_weight">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">SuperTipo</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" placeholder="0.1" value="0.1" id="supertype_weight">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Raridade</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" placeholder="0.2" value="0.2" id="rarity_weight">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Custo de Mana</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" placeholder="0.2" value="0.2" id="cmc_weight">
          </div>
        </div>
      </section>
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

      <section class="row" >
        <h2> Cards </h2>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Proximidade</th>
                    <th>Image</th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>SuperType</th>
                    <th>Colors</th>
                    <th>Mana Cost</th>
                    <th>CMC</th>
                    <th>Power</th>
                    <th>Toughness</th>
                    <th>Description</th>
                    <th>Rarity</th>
                    <th>Cardset</th>
                  </tr>
                </thead>
                <tbody ng-repeat="tp in cards.data" ng-if="$index < 50">
                  <tr>
                    <td>{{tp.proximidade}}%</td>
                    <td><img ng-src="{{tp.imageurl}}" class="img-responsive" height="20px"/></td>
                    <td >{{tp.id}}</td>
                    <td>{{tp.name}}</td>
                    <td>{{tp.tipos}}</td>
                    <td>{{tp.supertypes}}</td>
                    <td>{{tp.colors}}</td>
                    <td>{{tp.manacost}}</td>
                    <td>{{tp.cmc}}</td>
                    <td>{{tp.c_power}}</td>
                    <td>{{tp.c_toughness}}</td>
                    <td>{{tp.description}}</td>
                    <td>{{tp.rarity}}</td>
                    <td>{{tp.cardset}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

    </div> <!-- /container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <script type="text/javascript" src="lib/angular-select/isteven-multi-select.js"></script>

    <script src="https://unpkg.com/angular-toastr/dist/angular-toastr.tpls.js"></script>

    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
  </body>
</html>
