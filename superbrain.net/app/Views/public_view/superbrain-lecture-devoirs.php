
  <div class="container" style="min-height:480px;">

    <div class="row">

      <div class="col-sm-8 blog-main">
        <ul class="breadcrumb">
          <li><a href="">Accueil </a></li>
          <li><a href=""></a></li>
          <li><a href="?p=welcomface.devoirParCategorie&cat=<?=$onedevoir->categorie_libelle;?>&list=<?=$onedevoir->categorie_dev;?>"><?=$onedevoir->categorie_libelle; ?></a></li>
          <li><?=ucfirst(substr($onedevoir->titre_dev, 0, 200)); ?></li>
        </ul>
        <div class="blog-post">
          <?php if(isset($onedevoir) && $onedevoir!=false){ ?>
          <section class="jobox">
            
            <span style="font-style:italic; font-size:14px; color:rgb(51, 122, 183); font-weight:bold;">
              <h3><?=ucfirst($onedevoir->titre_dev); ?></h3> 
          </span>

          <br><b><?=$onedevoir->categorie_libelle; ?></b>  | <b>Classe:</b> <i><?=$onedevoir->classe_libelle; ?></i> |
            <b>Proposé Par:</b> <?=ucwords(substr($onedevoir->nom_etd, 0, 20)); ?>  |
            <b>Ajouté le:</b> <span style="font-style:italic; font-size:11px; color:#0ac45b;"><?=$onedevoir->ajout_le; ?></span> &nbsp; | &nbsp; 
                        
            <br>     

          <div class="" style="">
            <figure>
              <img class="media-object img-responsive" src="app/Views/contributeur/imagesetd/<?=$onedevoir->categorie_img; ?>" alt="<?=$onedevoir->titre_dev; ?>">
            </figure>            
          </div> <br><br>
              <?=htmlspecialchars_decode($onedevoir->contenu_dev); ?>
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

    
