 <head>
    
    <script src="public/tiny_mce/tiny_mce.js"></script>
 <!-- <script>tinymce.init({selector:'textarea'});</script> -->
  <script type="text/javascript">
    tinyMCE.init({
     /* mode : "textareas",*/
      selector: "textarea#contrib",
      theme : "advanced",
      height: 400,
      menubar: false,
    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
  // Theme options
    theme_advanced_buttons1 : "formatselect,fontselect,fontsizeselect,|,bold,italic,underline,strikethrough,|,",
    theme_advanced_buttons2 : "justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,link,unlink,|,forecolor",
    
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // Example content CSS (should be your site CSS)
    content_css : "css/content.css",

  });
  </script> 
</head>

<!-- BEGIN PAGE TITLE/BREADCRUMB -->
<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-title">Mon Compte</h1>
                
                <ul class="breadcrumb">
                    <li><a href="">Accueil </a></li>
                    <li><a href="?p=welcomface.index">Les devoirs</a></li>
                    <li><a href="#">Nouveau devoir en ajout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE TITLE/BREADCRUMB -->
<hr>
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
              <div class="panel panel-info">
                <div class="panel-heading">
                   <div class="panel-title">Soumettre un devoir</div>
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
                   } else if(isset($warningMSG)){
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
                  <form method="post" enctype="multipart/form-data" class="form-horizontal" role="form"  onsubmit="return checkCheckBoxes(this);">

                    <div class="form-group">
                      <label class="col-md-3 control-label">Degre de difficulte</label>
                      <div class="col-md-9">
                        <select class="form-control chosen" name="devdifficulte">
                          <optgroup label="NIVEAU DE DIFFICULTE">
                            <?php 
                            foreach ($difficile as $durete) {          
                             ?>
                          <option value="<?=$durete->idnivo_difficulte;?>"><?=$durete->nivo_difficulte_libelle;?></option>
                          <?php }  ?>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-4 col-sm-3 col-md-3 control-label">Classe </label>
                      <div class="col-xs-8 col-sm-9 col-md-9">                     
                        <select class="form-control chosen" name="classe">
                          <optgroup label="CHOISIR SA CLASSE">
                            <?php 
                            foreach ($nivoscolaire as $etude) {          
                             ?>
                          <option value="<?=$etude->idclasse;?>"><?=$etude->classe_libelle;?></option>
                          <?php }  ?>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-4 col-sm-3 col-md-3 control-label">Discipline </label>
                      <div class="col-xs-8 col-sm-9 col-md-9">
                        <select class="form-control chosen" name="matiere">
                          <optgroup label="CHOISIR LA DISCIPLINE">
                            <?php 
                            foreach ($categoryes as $categ) {          
                             ?>
                          <option value="<?=$categ->idcategorie_devoir;?>"><?=$categ->categorie_libelle;?></option>
                          <?php }  ?>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Titre du sujet :</label>
                      <div class="col-md-9">
                        <input type="text" name="titreof" placeholder="Titre de l'épreuve ou devoir..." class="form-control">
                      </div>                      
                    </div>    
                    <div class="form-group" style="overflow: scroll;">
                      <label class="control-label col-md-3">Contenu du devoir</label>
                      <div class="col-md-9">
                          <textarea name="contdevoir" class="form-control" id="contrib" placeholder="Saisir le sujet du devoir ici"></textarea>
                      </div>                      
                    </div>
                    <!-- <div class="form-group">
                      <label class="control-label col-md-3">Complément d'info au devoir :</label>
                      <div class="col-md-9">
                        <input type="file" name="complinfo" id="complinfo" placeholder="votre fichier" class="form-control">
                      </div>                      
                    </div>    -->                

                    <div class="form-group">
                      <!-- Button -->                                        
                      <div class="col-md-offset-3 col-md-9">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                          <a href="?p=contributeur.compteConnected" class="btn btn-primary btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Mon Compte</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                          <button id="btn-signup" type="submit" class="btn btn-success btn-block" name="ajout_devoir"><i class="fa fa-save"></i> Ajouter ce devoir </button>
                        </div>
                      </div>
                    </div>
                  </form>
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
