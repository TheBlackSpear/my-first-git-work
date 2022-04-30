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
                      
            
                <?php if(isset($oneInfo) && !empty($oneInfo)){ ?>
              <div class="container"> 
                <br>                
                 <b><?=$oneInfo->categorie_libelle; ?></b>
                 <br>
                  <h3><?=$oneInfo->titre_dev; ?></h3>

                  <p><?=htmlspecialchars_decode( $oneInfo->contenu_dev);?></p>
                 
              </div>
              <?php }else{}?> 
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

  <div class="container" style="min-height:480px;">

    <div class="row">

      <div class="col-sm-8 blog-main">
        <ul class="breadcrumb">
          <li><a href="">Accueil </a></li>
          <li><a href=""></a></li>
          <li><a href="?p=welcomface.devoirParCategorie&cat=<?=$oneInfo->categorie_libelle;?>&list=<?=$oneInfo->categorie_dev;?>"><?=$oneInfo->categorie_libelle; ?></a></li>
          <li><?=ucfirst(substr($oneInfo->titre_dev, 0, 200)); ?></li>
        </ul>
        <div class="blog-post">
          <?php if(isset($oneInfo) && $oneInfo!=false){ ?>
          <section class="jobox">
            
            <span style="font-style:italic; font-size:14px; color:rgb(51, 122, 183); font-weight:bold;">
              <h3><?=ucfirst($oneInfo->titre_dev); ?></h3> 
          </span>

          <br><b><?=$oneInfo->categorie_libelle; ?></b>  | <b>Classe:</b> <i><?=$oneInfo->classe_libelle; ?></i> |
            <b>Proposé Par:</b> <?=ucwords(substr($oneInfo->nom_etd, 0, 20)); ?>  |
            <b>Ajouté le:</b> <span style="font-style:italic; font-size:11px; color:#0ac45b;"><?=$oneInfo->ajout_le; ?></span> &nbsp; | &nbsp; 
                        
            <br>     

          <div class="" style="">
            <figure>
              <img class="media-object img-responsive" src="app/Views/contributeur/imagesetd/<?=$oneInfo->categorie_img; ?>" alt="<?=$oneInfo->titre_dev; ?>">
            </figure>            
          </div> <br><br>
              <?=htmlspecialchars_decode($oneInfo->contenu_dev); ?>
          </section>

          <?php }else{ echo "Ce devoir n'est plus disponible !"; } ?>
        </div>
      </div>
      <br>


      <div class="col-sm-4 blog-sidebar">
        <div class="sidebar-module sidebox">          
          <h4 class="text-center">Categories</h4>
          <p>
            <ul class="categories">
            </ul>
          </p>  
          <p></p>
        </div>
        <div class="sidebar-module sidebox">
          
        </div>
        <div class="sidebar-module sidebox">
          
        </div>
      </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->
    

  </div><!-- /.container -->

</body>

    
