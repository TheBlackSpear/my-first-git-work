<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php //=$title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="public/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="public/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="public/bootstrap-3.3.7/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="public/superbraincss/superbrain.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="public/bootstrap-3.3.7/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Super Brain</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="https://www.superbrain.infoci.info/">Accueil</a></li>
            <li class=""><a href="?p=welcomface.devoirListeGeneral">Nos Ressources</a></li>
            <li><a href="?p=welcomface.superBrain">Qui est Superbrain ?</a></li>
            <li><a href="?p=welcomface.contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contribution|Connexion <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php if(isset($_SESSION['etd_nom'])){ ?>
                  <li><a href="?p=contributeur.compteConnected"> <i class="fa fa-logout"></i>Mon compte
                  </a></li>
                  <li><a href="?p=contributeur.newResource">Ajouter une ressource</a></li>
                  <li><a href="?p=logout.contributeurbye"> <span style="font-size:12px; color:#ce0823 ; font-weigt:bold;"><i class="fa fa-logout"></i>DECONNEXION</span></a></li>
                <?php }else{?>

                <li><a href="?p=contributeur.inscription">Créer un compte</a></li>
                <li><a href="?p=contributeur.connexion">Se connecter</a></li>
                <li><a href="?p=contributeur.newResource">Ajouter une ressource</a></li> 
                <?php } ?>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
             
    <div class="container theme-showcase" role="main"><!-- 
    <div class="container theme-showcase" role="main" style="background-color: #fff;margin-top:1.5em; margin-bottom:2em;"> -->
        <?=$content; ?>     
    </div> <!-- /container -->
<br><br>
    <style type="text/css">
      #go_to_top {
        position: fixed;
        width: 25px;
        height: 25px;
        bottom: 50px;
        right: 30px;
      }
    </style>
    <div class=""></div>
    <footer class="footer footstyle">
      <div class="container">
        <p class="pull-right" id="go_to_top"><a href="#" title="Back to top"> <i class="glyphicon glyphicon-circle-arrow-up" style="font-size:50px;"></i></a></p>
        <p class="text-muted"> &copy; 2021 - <?=date("Y"); ?> &middot; Superbrain.net &middot; <a href="" target="_blank">By KIKOUN</a>  ·<a href="" target="_blank">Politique de confidentialité</a> · <a href="?p=welcomface.superBrain" target="_blank">Conditions Générales d'Utilisation</a></p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="public/bootstrap-3.3.7/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="public/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="public/bootstrap-3.3.7/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="public/bootstrap-3.3.7/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
