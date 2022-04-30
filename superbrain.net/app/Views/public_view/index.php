     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>




  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top:1em;">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="public/imagediapo/nature" alt="First slide">
      </div>
      <div class="item">
        <img src="public/imagediapo/education" alt="Second slide">
      </div>
      <div class="item">
        <img src="public/imagediapo/formation" alt="Third slide">
      </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron joboxbref" style="margin-top:1em;">
    <h2>Qu'est-ce que Super Brain ?</h2>
    <p>Super Brain est une plateforme web de partage de ressources de formation et d'évaluation pour élèves de l'enseignement secondaire général ivoirien. <br> Avec Super Brain, partagez un devoir ou une évaluation qui vous a aidé à vous améliorer avec d'autres élèves. Trouvez également, des épreuves proposés par d'autres élèves pour vous évaluer. <br>Les corrigés des épreuves, proposés par des experts, seront bientôt disponibles sous certaines conditions. <br>Ce service a un objectif d'extension à d'autres pays.  </p>
  </div>



  <div class="album py-5 bg-light">
    
    <div class="row"> <!-- 3X4 12 vignettes a l'accueil -->
      <div class="col-md-12">  
        <?php if(isset($lesTopTwelveLast) && !empty($lesTopTwelveLast)){ foreach ($lesTopTwelveLast as $vignettes) { ?>  
        <div class="col-md-4" style="border:0.5px #ccc solid; padding:0em;">
          <div class="card md-4 shadow-sm"><a href="?p=welcomface.lectureDevoir&dirvig=<?=$vignettes->tokendev; ?>&Cours=<?=$vignettes->categorie_libelle; ?>"><img src="app/Views/contributeur/imagesetd/<?=$vignettes->categorie_img; ?>" class="img-responsive" alt="<?=$vignettes->categorie_img; ?>"></a>
            <a href="?p=welcomface.lectureDevoir&dirvig=<?=$vignettes->tokendev; ?>&Cours=<?=$vignettes->categorie_libelle; ?>" class="lienjob"><!-- lecture uniq par lien direct -->
              <div class="card-body joboxbref" style="padding:0.5em;">
                <p class="card-text"> <h4><?=substr($vignettes->titre_dev, 0,40); ?></h4> 
                <?=substr($vignettes->contenu_dev, 0,40); ?> </p>
                
              </div>
            </a>
          </div>
        </div>
        <?php   }} ?>

        <div class="row"> 
        <div class="col-md-12"> 
          <a href="?p=welcomface.devoirCategories" class="btn btn-primary" style="margin-top:1em; margin-bottom: 1em;"> Voir plus de ressources</a> 
        </div><!-- vers les ressources par ordre nouveau -ancien -->
      </div>
      </div>

    </div>
  </div>

