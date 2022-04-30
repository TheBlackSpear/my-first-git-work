<div class="page-header">
        <h2>Modifier sujet - Contributeur</h2>
      </div>
      <form >
        Nom <br> Prenom <br> Ecole <br> Classe <br> Discipline <br> Sujet <br>
      </form>




<?php /**
* Author:Alain KIKOUN 
**/ ?>
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
    theme_advanced_buttons1 : "formatselect,fontselect,fontsizeselect,|,bold,italic,underline,strikethrough,|",
    /*,code,*/
    theme_advanced_buttons2 : "justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,link,unlink,|,forecolor",
    
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // Example content CSS (should be your site CSS)
    content_css : "css/content.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "postAcceptor.php",
    external_link_list_url : "postAcceptor.php",
    external_image_list_url : "postAcceptor.php",
    media_external_list_url : "postAcceptor.php",

    // Style formats
    style_formats : [
      {title : 'Bold text', inline : 'b'},
      {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
      {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
      {title : 'Example 1', inline : 'span', classes : 'example1'},
      {title : 'Example 2', inline : 'span', classes : 'example2'},
      {title : 'Table styles'},
      {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    ]
/*  ,
    formats : {
      alignleft : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'left'},
      aligncenter : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'center'},
      alignright : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'right'},
      alignfull : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'full'},
      bold : {inline : 'span', 'classes' : 'bold'},
      italic : {inline : 'span', 'classes' : 'italic'},
      underline : {inline : 'span', 'classes' : 'underline', exact : true},
      strikethrough : {inline : 'del'}
    },*/

    // Replace values for the template plugin
    /*template_replace_values : {
      username : "Some User",
      staffid : "991234"
    }*/
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
      <li><a href="http://www.infoci.info/">Accueil </a></li>
      <li><a href="?p=jobci.index">Offres</a></li>
      <li><a href="#">Mise à jour de mon offre</a></li>
    </ul>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE TITLE/BREADCRUMB -->
<hr>


<?php

  if(isset($infociseo) && $infociseo!==" "){
    $meta_descr=$infociseo->seo_description;
     $meta_author=$infociseo->seo_auteur;
    $meta_keywd=$infociseo->seo_keyword;
    $title= $infociseo->seo_titre;
    }else{
      $meta_author="KIKOUN Alain KONE ";
      $meta_keywd="rendez-vous, Showbiz de Babi, opportunit&eacute;, Buzz, religion ivoirienne, Mode et beaut&eacute;, Sport, Education, esth&eacute;tique";
      $meta_descr="infoci.info, Support de buzz num&eacute;rique mondial. Explosion de vues sur votre manifestation. ";
    $title="Update my account - INFOCIJOB: Trouver son emploi. || www.infoci.info";
  }
 ?>


<div class="container" style="min-height:480px;">

  <!-- si recruteur connecte Afficher son compte sinon Texte BREF Conditions et Form connexion ou Form inscription-->
  <div class="row">
    <div class="col-sm-12 blog-main">
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
                   <div class="panel-title">METTRE A JOUR DE CE SUJET</div>
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
                        <label class="col-md-3 control-label">Titre</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="titreof" placeholder="Libelle de l'offre"  value="<?=$oneInfo->titre_dev; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-4 col-sm-3 col-md-3 control-label">Type de contrat </label>
                        <div class="col-xs-8 col-sm-9 col-md-9">
                          <select class="form-control chosen" name="classe">
                            <option value="<?=$oneInfo->laclasse;?>"><?=$oneInfo->classe_libelle; ?></option>
                              <optgroup label="CHOISIR LA CLASSE">

                                <?php 
                                foreach ($typcontract as $contrat) {          
                                 ?>
                                <option value="<?=$contrat->orderjobtype;?>"><?=$contrat->jobtypelabel;?></option>
                                <?php }  ?>
                              </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-4 col-sm-3 col-md-3 control-label">Discipline </label>
                        <div class="col-xs-8 col-sm-9 col-md-9">
                          <select class="form-control chosen" name="niveaudetude">
                            <option value="<?=$oneInfo->categorie_dev;?>"><?=$oneInfo->categorie_libelle;?></option>
                              <optgroup label="CHOISIR LE NIVEAU D'ETUDE">
                                <?php 
                                foreach ($nivoetude as $etude) {          
                                 ?>
                                <option value="<?=$etude->orderjobnivo;?>"><?=$etude->nivolabel;?></option>
                                <?php }  ?>
                              </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-4 col-sm-3 col-md-3 control-label">Domaine d'activité </label>
                        <div class="col-xs-8 col-sm-9 col-md-9">
                          <select class="form-control chosen" name="categoriepro">
                            <option value="<?=$oneInfo->orderjobcategpro;?>"><?=utf8_encode($oneInfo->nomcategpro);?></option>
                              <optgroup label="CHOISIR LE DOMAINE D'ACTIVITE">
                                <?php 
                                foreach ($jobdomain as $domaine) {          
                                 ?>
                                <option value="<?=$domaine->orderjobcategpro;?>"><?=utf8_encode($domaine->nomcategpro);?></option>
                              <?php }  ?>
                              </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Lieu du poste</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="localite" placeholder="Zone geographique du poste" value="<?=$oneInfo->lieujob;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Experience professionnelle</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="experience" placeholder="Expérience professionnelle" value="<?=$oneInfo->experience;?>">
                        </div>
                      </div>
                      <div class="form-group" style="overflow: scroll;">
                        <label class="control-label col-md-3">Détails sur l'offre</label>
                        <div class="col-md-9">
                            <textarea name="descrof" class="form-control" id="contrib" placeholder="Quelques pr&eacute;cisions sur votre offre (précision et concision)"><?=$oneInfo->contenu_offre;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="deb" class="col-md-3 control-label">Nouvelle Date de publication</label>
                        <div class="col-md-9">
                          <input type="date" name="debuter" class="form-control" id="deb" value="<?=$oneInfo->publier_le;?>">
                        </div>
                      </div> 
                      <div class="form-group">
                        <label for="fin" class="col-md-3 control-label">Date Limite</label>
                        <div class="col-md-9">
                          <input type="date" name="finir" class="form-control" id="fin" value="<?=$oneInfo->expire_le;?>">
                        </div>
                      </div> 

                      <div class="form-group">
                        <label  class="col-md-3 control-label">Mise en ligne</label>
                          <div class="col-md-9">
                            <input type="radio" name="misonline" class="form-control" id="enligne" value="1"> <label for="enligne">OUI</label>
                            <input type="radio" name="misonline" class="form-control" id="horsligne" value="0" checked> <label for="horsligne" >NON</label>
                          </div>                        
                      </div>                    

                      <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-3 col-md-9">
                          <div class="col-xs-12 col-sm-12 col-md-6">
                            <a href="?p=jobrecruteurci.compteConnected" class="btn btn-primary btn-block"><i class="fa fa-backward" aria-hidden="true"></i> Mon Compte</a>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-6">
                            <button id="btn-signup" type="submit" class="btn btn-success btn-block" name="editdev"><i class="fa fa-save"></i> Valider </button>
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
        <a href="?p=jobci.index" class="btn btn-primary">  &lsaquo;&lsaquo; Liste des offres</a>
      </nav>
    </div><!-- /.blog-main -->
    <br>

    <!-- <div class="col-sm-4 blog-sidebar">
      <div class="sidebar-module sidebox">

      </div>
      <div class="sidebar-module sidebox">
       
      </div>
      <div class="sidebar-module sidebox">
       
      </div>
    </div>/.blog-sidebar -->

  </div><!-- /.row -->
  

</div><!-- /.container -->