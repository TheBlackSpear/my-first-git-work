<!-- BEGIN PAGE TITLE/BREADCRUMB -->
<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">Mon Compte</h1>
                
                <ul class="breadcrumb">
                    <li><a href="">Accueil </a></li>
                    <li><a href="?p=welcomface.index">Les devoirs</a></li>
                    <li><a href="#">Mon Compte</a></li>
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
                    <div  class="col-xs-12 col-sm-12 col-md-10">
                        <div class="col-md-12 col-sm-12 col-xs-12">             
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="panel-title">MES DONNEES PERSONNELLES</div>
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
                                          }
                                          else if(isset($successMSG)){
                                      ?>
                                    <div class="alert alert-success" role="alert">
                                      <strong><span class="glyphicon glyphicon-ok-sign"></span> <?php echo $successMSG; ?></strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                      <?php  }  ?>
                                      <?php //if (isset($lerecruteur)): ?>                                                                  
                                    <form method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="lastname" class="col-md-3 control-label">Nom de famille</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nomowner" placeholder="Nom de famille" value="<?php //=$lerecruteur->rnom; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname" class="col-md-3 control-label">Pr&eacute;nom(s)</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="prenomowner" placeholder="pr&eacute;nom(s)" value="<?php //=$lerecruteur->rprenom; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="emailowner" placeholder="Adresse Email" value="<?php //=$lerecruteur->rmail; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3" for="classe">Classe</label>
                                            <div class="col-md-9"><input name="classe" type="text" placeholder="Votre Classe" class="form-control" id="classe"value="<?php //=$lerecruteur->telephone; ?>" readonly></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3" for="ecole">Ecole</label>
                                            <div class="col-md-9"><input name="ecole" type="text" placeholder="Votre  Ecole" class="form-control" id="ecole" value="<?php //=$lerecruteur->rpseudo; ?>" readonly></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3" for="ville">Ville</label>
                                            <div class="col-md-9"><input name="ta_ville" type="texte" placeholder="Votre ville de résidence" class="form-control" id="ville" value="<?php //=$lerecruteur->r_age; ?>" readonly></div>
                                        </div>
                                        <div class="form-group">                                       
                                            <!-- <div class="col-md-offset-3 col-md-9">
                                              <button type="submit" class="btn btn-lg btn-primary btn-block" name="majform"><i class="icon-hand-right"></i> Mettre à jour </button>
                                            </div> -->
                                        </div>
                                    </form>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div><!-- /.blog-post -->
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
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->
</div><!-- /.container -->