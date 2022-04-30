<!-- BEGIN PAGE TITLE/BREADCRUMB -->
<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-title">Mon Compte</h1>
            
            <ul class="breadcrumb">
                <li><a href="">Accueil </a></li>
                <li><a href="?p=welcomface.index">Les devoirs</a></li>
                <li><a href="#">Liste de mes contributions</a></li>
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
          <div  class="col-md-10 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12">       
                 <?php
                    if(isset($warningMSG)){
                  ?>
                        <div class="alert alert-warning" style="margin-top:10px;">
                          <span class="fa fa-info-circle"></span> <strong><?php echo $warningMSG; ?></strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  <?php
                      }
                  ?>
                      
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="7" class="text-center">
                    <b>Liste des devoirs publiés</b>
                  </th>
                </tr>
                <tr>
                  <th class="text-center" scope="row">#</th>
                  <th class="text-center" scope="row">TITRE</th>
                  <th class="text-center" scope="row">CATEGORIE</th>
                  <th  class="text-center" scope="row">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($bloglistcateg) && !empty($bloglistcateg)){ foreach ($bloglistcateg as $offreindiv) { //var_dump($total_records);?>
                <tr>
                  <td><?=$offreindiv->iddevoir; ?></td>
                  <td><?=$offreindiv->titre_dev; ?></td>
                 
                  <td> <?=$offreindiv->categorie_libelle; ?></td>
                  <td><a href="?p=contributeur.readMore&suitable=<?=$offreindiv->tokendev; ?>" title="Lire plus"><i class="fa fa-search" aria-hidden="true"></i> lire</a></td>
                </tr> 
              <?php }}else{}?>              
              </tbody>
            </table>         
            
              <?php //if(isset($pageno) && isset($total_pages)>0){ ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="pagination">
                  <li><a href="?p=contributeur.compteConnected&pageno=1">Debut</a></li> &nbsp;&nbsp;
                  <li class="<?php //if($pageno <= 1){ echo 'disabled'; } ?>">
                      <a href="<?php //if($pageno <= 1){ echo '#'; } else { echo "?p=contributeur.compteConnected&pageno=".($pageno - 1); } ?>">Precedent</a>
                  </li>&nbsp;&nbsp;
                  <li class="<?php //if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php //if($pageno >= $total_pages){ echo '#'; } else { echo "?p=contributeur.compteConnected&pageno=".($pageno + 1); } ?>">Suivant</a>
                  </li>&nbsp;&nbsp;
                  <li><a href="?p=contributeur.compteConnected&pageno=<?php //echo $total_pages; ?>">Fin</a></li>
                </ul>
              </div> <?php //} ?>
            
              <br><br>
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