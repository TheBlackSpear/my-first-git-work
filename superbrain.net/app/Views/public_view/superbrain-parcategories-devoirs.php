  
        <ul class="breadcrumb">
          <li><a href="">Accueil </a></li>
          <li><a href=""></a></li>
          <li><a href="?p=welcomface.devoirParCategorie&cat=<?=$uncateg->categorie_libelle;?>&list=<?=$uncateg->categorie_dev;?>"><?=$uncateg->categorie_libelle; ?></a></li>
          <li><?=ucfirst(substr($uncateg->titre_dev, 0, 200)); ?></li>
        </ul>

  <div class="col-md-12" style="margin-top:0em;">
      <h2>Tous les devoirs de <span style="color:rgb(204, 0, 0); font-style: italic;"> <?php if(isset($uncateg) && !empty($uncateg)){ echo $uncateg->categorie_libelle;} ?> </span> sur Super Brain</h2>
  </div>

 
    <div class="row">
      <div class="col-sm-8 blog-main">
          <!-- 3X4 12 vignettes a l'accueil -->
            <?php if(isset($bloglistcateg) && !empty($bloglistcateg)){ foreach ($bloglistcateg as $vignettes) { ?>  
        <div class="col-md-4" style="border:0.2px #245580 solid; padding:0.5em;">
          <div class="card md-4 shadow-sm">
            <a href="?p=welcomface.lectureDevoir&dirvig=<?=$vignettes->tokendev; ?>&Cours=<?=$vignettes->categorie_libelle; ?>"><img src="app/Views/contributeur/imagesetd/<?=$vignettes->categorie_img; ?>" class="img-responsive" alt="<?=$vignettes->categorie_img; ?>"> </a>

            <a href="?p=welcomface.lectureDevoir&dirvig=<?=$vignettes->tokendev; ?>&Cours=<?=$vignettes->categorie_libelle; ?>" class="lienjob">
              <div class="card-body joboxbref" style="padding:0.5em;">
                  <p class="card-text"> <h4><?=substr($vignettes->titre_dev, 0,15); ?></h4> 
                  <?=substr($vignettes->contenu_dev, 0,35); ?> </p>
                  
              </div>
            </a>
          </div>
        </div>
          <?php   }} ?>
        
        <div class="row">
          <?php if(isset($pageno) && isset($total_pages) && isset($uncateg) && !empty($uncateg)){ ?>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <ul class="pagination">
              <li><a href="?p=welcomface.devoirParCategorie&cat=<?=$uncateg->categorie_libelle;?>&list=<?=$uncateg->categorie_dev;?>&pageno=1">Debut</a></li> &nbsp;&nbsp;
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                  <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?p=welcomface.devoirParCategorie&cat=".$uncateg->categorie_libelle."&list=".$uncateg->categorie_dev."&pageno=".($pageno - 1); } ?>">Precedent</a>
              </li>&nbsp;&nbsp;
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?p=welcomface.devoirParCategorie&cat=".$uncateg->categorie_libelle."&list=".$uncateg->categorie_dev."&pageno=".($pageno + 1); } ?>">Suivant</a>
              </li>&nbsp;&nbsp;
              <li><a href="?p=welcomface.devoirParCategorie&cat=<?=$uncateg->categorie_libelle;?>&list=<?=$uncateg->categorie_dev;?>&pageno=<?=$total_pages; ?>">Fin</a></li>
            </ul>
          </div> <?php } ?> 
        </div>
      </div>
    
<div class="col-sm-4 blog-sidebar">
        <div class="sidebar-module sidebox">          
          <h4 class="text-center">Categories</h4>
          <p>
            <ul class="categories">
              <?php //if(isset($blogcateg) && !empty($blogcateg)){foreach ($blogcateg as $categoriesblog): ?>
                <li><a href="?p=blog.allBlogByCategorie&list=<?php //=$categoriesblog->ordercategorie;?>"><?php //=$categoriesblog->categorie_lib;?> <span> </span></a></li>
              <?php //endforeach;}else{ echo "Aucun Blog disponible pour l'instant !";} ?>
            </ul>
          </p>  
          <p></p>
        </div>
        <div class="sidebar-module sidebox">
          <img src="app/Views/dddd/pub/300X600.jpg" class="img-thumbnail text-center">
        </div>
        <div class="sidebar-module sidebox">
          
        </div>
      </div><!-- /.blog-sidebar -->
</div>