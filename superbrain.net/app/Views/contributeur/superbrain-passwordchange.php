
<!-- BEGIN PAGE TITLE/BREADCRUMB -->
<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="page-title">Mon Compte</h1>
        
        <ul class="breadcrumb">
          <li><a href="">Accueil </a></li>
          <li><a href="?p=welcomface.index">Les devoirs</a></li>
          <li><a href="#">Mot de Passe</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE TITLE/BREADCRUMB -->
<hr>

<div class="container" style="min-height:480px;">

  <!-- si recruteur connecte Afficher son compte sinon Texte BREF Conditions et Form connexion ou Form inscription-->
    <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-masthead">
            <div class="container">
              <nav class="blog-nav">
                <a href="?p=logout.contributeurbye" title="DECONNEXION" class="blog-nav-item"><span style="font-weight:bold; font-size:18px; color:#ce0823"><i class="fa fa-sign-out"></i></span></a> 
                <a href="?p=contributeur.compteConnected" class="blog-nav-item">
                <b><?=substr($_SESSION['etd_nom'], 0,15)." ..."; ?></b> 
                </a>
                <a class="blog-nav-item" href="?p=contributeur.newpswd">Mot de passe</a>
                <a class="blog-nav-item" href="?p=contributeur.newResource">Partager un devoir</a>
              <a class="blog-nav-item" href="?p=contributeur.maliste">Mes contributions</a>
              </nav>
            </div>
          </div>
          <div class="blog-post">
            <section class="jobox">
              <div class="media-left float-text" style="float:left; border:#f5f5f5 solid 0.8px; margin-right:10px;">
                 
              </div>
                <div  class="col-xs-12 col-sm-12 col-md-10">
              <div class="panel panel-info">
                  <div class="panel-heading">
                     <div class="panel-title">MODIFICATION DU MOT DE PASSE</div>
                  </div>  
                  <div class="panel-body">

                     <?php
                       if(isset($errMSG)){
                     ?>  
                      <div class="alert alert-danger" role="alert">
                          <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                          
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    <?php
                        }
                      else if(isset($warningMSG)){
                    ?>
                      <div class="alert alert-warning" role="alert">
                          <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $warningMSG; ?></strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    <?php
                        }else if(isset($successMSG)){
                     ?>
                      <div class="alert alert-success" role="alert">
                          <strong><span class="glyphicon glyphicon-ok-sign"></span> <?php echo $successMSG; ?></strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  <?php  }  ?>
                      <form method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                        <div class="form-group">
                              <label for="email" class="col-md-3 control-label">Email</label>
                              <div class="col-md-9">
                                  <input type="email" class="form-control" name="usermail" placeholder="Adresse Email">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="login-password" class="col-md-3 control-label">Nouveau Mot de passe</label>
                              <div class="col-md-9">
                                  <input type="password" id="login-password" class="form-control" name="newpassword" placeholder="Nouveau mot de passe">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="password" class="col-md-3 control-label">Confirmation mot de passe</label>
                              <div class="col-md-9">
                                  <input type="password" class="form-control" name="confpassword" placeholder="Nouveau mot de passe">
                              </div>
                          </div>
                          <div class="form-group">
                                      <!-- Button -->                                        
                              <div class="col-md-offset-3 col-md-9">
                                  <button type="submit" id="submit_button" class="btn btn-primary" name="passchange"><i class="icon-hand-right"></i> Envoyer </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div> 
              </div>
            </section>
          </div>
            <!-- /.blog-post -->
          <nav>
            <a href="?p=welcomface.index" class="btn btn-primary">  &lsaquo;&lsaquo; Liste des devoirs sur SuperBrain.net</a>
          </nav>
        </div><!-- /.blog-main -->
        <br>

        <div class="col-sm-4 blog-sidebar">
          <div class="sidebar-module sidebox">

          </div>
          <div class="sidebar-module sidebox">
           
          </div>
          <div class="sidebar-module sidebox">
           
          </div>
        </div>  <!-- /.blog-sidebar -->

    </div><!-- /.row -->
</div><!-- /.container -->















