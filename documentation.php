
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

  <body ng-controller="DocCtrl as doc">
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
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="#">Documentação</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <div class="page-header">
        <h1>Program Documentation <small>Card Data</small></h1>
      </div>
      <section class="row" >
        <h2> Cards </h2>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Mana Cost</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody ng-repeat="tp in doc.cards.data">
                  <tr>
                    <td><img ng-src="{{tp.imageurl}}" class="img-responsive" height="20px"/></td>
                    <td>{{tp.id}}</td>
                    <td>{{tp.name}}</td>
                    <td>{{tp.manacost}}</td>
                    <td>{{tp.description}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <section class="row" id="tabels">
        <h2> Tables </h2>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Icon</th>
                    <th>id</td>
                    <th>Set</td>
                    <th>SetName</td>
                  </tr>
                </thead>
                <tbody ng-repeat="tp in doc.sets.data">
                  <tr>
                    <td><img ng-src="{{tp.imageurl}}"></td>
                    <td>{{tp.id}}</td>
                    <td>{{tp.code}}</td>
                    <td>{{tp.name}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Icon</th>
                    <th>id</td>
                    <th>Color</td>
                  </tr>
                </thead>
                <tbody ng-repeat="tp in doc.colors.data">
                  <tr>
                    <td><img ng-src="{{tp.imageurl}}"></td>
                    <td>{{tp.id}}</td>
                    <td>{{tp.name}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</td>
                    <th>Rarity</td>
                  </tr>
                </thead>
                <tbody ng-repeat="tp in doc.rarities.data">
                  <tr>
                    <td>{{tp.id}}</td>
                    <td>{{tp.name}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</td>
                    <th>Super Type</td>
                  </tr>
                </thead>
                <tbody ng-repeat="tp in doc.supertypes.data">
                  <tr>
                    <td>{{tp.id}}</td>
                    <td>{{tp.name}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>id</td>
                    <th>Type</td>
                  </tr>
                </thead>
                <tbody ng-repeat="tp in doc.types.data">
                  <tr>
                    <td>{{tp.id}}</td>
                    <td>{{tp.name}}</td>
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
