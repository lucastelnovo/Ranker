<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NightCrew">
    <meta name="author" content="Lucas Castelnovo">

    <title>Ranker</title>
    
    <!-- jQuery core Local -->
    <script type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
    <!-- jQuery core Remote -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core JS -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <link href="myStyle.css" rel="stylesheet">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style="color: #FFFFFF;">NightCrew</a>
        <div class="nav-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#reservamesa">NightCrew</a></li>            
            	 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Boliches <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Crobar</a></li>
                <li><a href="#">Mandarine</a></li>
                <li><a href="#">Piur</a></li>
                <li><a href="#">Believe</a></li>
                <li><a href="#">Club Leloir</a></li>
              </ul>
            </li> 
            <li><a href="#contact">Contacto</a></li>           
          </ul> 
          <form class="navbar-form form-inline pull-right">
            <input type="text" placeholder="Email">
            <input type="password" placeholder="Contraseña">
            <button type="submit" class="btn" style="padding: 4px;">Iniciar sesión</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1 class="mainHeader">NIGHTCREW</h1>
        <p class="mainPara">¿Salís a bailar este fin de semana? Hacé check-in en el boliche a través de NightCrew
        y compartí fotos, comentarios y más sobre lo que fue tu noche. Conocé gente y hace de tus salidas
        <span style="text-decoration: underline; font-size:20px; font-weight:bold;">una experiencia diferente</span></p>
        <!--/ Boton de más información: desactivado.
         <p><a class="btn btn-primary btn-large">Más información &raquo;</a></p> -->
      </div>

      <div class="body-content">

        <!-- Example row of columns -->
        <div class="row">
          <div class="col-lg-4">
            <h2 class="subHeader">Unite a la tripulación!</h2>
            <p class="subPara">Regístrate en NightCrew y empezá a vivir la noche de una forma distinta. </p>
            <p><a class="btn btn-default" href="#">Registrarse ahora &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <h2 class="subHeader">Todos los boliches!</h2>
            <p class="subPara">Visitá cualquier boliche de Buenos Aires y viví la experiencia de la vida nocturna 
            como nunca antes la habías visto. </p>
            <p><a class="btn btn-default" href="#">Ver boliches &raquo;</a></p>
         </div>
          <div class="col-lg-4">
            <h2 class="subHeader">Contactáte con nosotros!</h2>
            <p class="subPara">¿Tenés un boliche y no aparece en NightCrew? Comunicate con nosotros! </p>
            <p><a class="btn btn-default" href="#">Contactarnos &raquo;</a></p>
          </div>
        </div>

        <hr>

        <footer>
          <p style="color: #FFFFFF; text-align: right;">&copy; NightCrew 2013</p>
        </footer>
      </div>

    </div> <!-- /container -->

  </body>
</html>