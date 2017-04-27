
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magic RBC</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="lib/Bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"/>
    <link rel="stylesheet" href="css/estilo.css"></link>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="jumbotron"><h1><img class="img-responsive" src="img/parking.png"> RBC</h1></div>

      <div class="row">
        <form class="form-inline">
          <div class="form-group">
            <select id="selectTags" class="form-control" multiple="multiple">
              <option>Colorless</option>
              <option>Blue</option>
              <option>Red</option>
              <option>Green</option>
              <option>Black</option>
              <option>White</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control">
              <option>Land</option>
              <option>Creature</option>
              <option>Artifact</option>
              <option>Enchantment</option>
              <option>Planeswalker</option>
              <option>Sorcery</option>
              <option>Instant</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control">
              <option>Untyped</option>
              <option>Basic</option>
              <option>Legendary</option>
              <option>Ongoing</option>
              <option>Snow</option>
              <option>World</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control">
              <option>Common</option>
              <option>Uncommon</option>
              <option>Rare</option>
              <option>Mythic Rare</option>
              <option>Special</option>
              <option>Basic Land</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control">
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>maior ou igual a 10</option>
            </select>
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>

    </div> <!-- /container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="lib/Bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
