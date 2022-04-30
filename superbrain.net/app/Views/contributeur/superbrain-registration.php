    
    <!-- Font Icon -->
    <link rel="stylesheet" href="public/regform/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="public/regform/css/style.css">


    <div class="" style="margin-right:auto; margin-left: auto;">
        <div class="containeur">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="public/regform/images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
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
                    }else if(isset($successMSG)){
                  ?>
                  <div class="alert alert-success" role="alert">
                      <strong><span class="glyphicon glyphicon-ok-sign"></span> <?php echo $successMSG; ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php  }  ?>
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Inscription élève contributeur</h2>
                        <div class="form-group">
                            <label for="ton_prenom">Prénoms :</label>
                            <input type="text" name="ton_prenom" id="ton_prenom" required/>
                        </div>
                        <div class="form-group">
                            <label for="ton_nom">Nom:</label>
                            <input type="text" name="ton_nom" id="ton_nom" required/>
                        </div>
                        <div class="form-group">
                          <label for="ecole">Ecole :</label>
                          <input type="text" name="ton_ecole" id="ecole" required/>
                        </div>
                        <div class="form-group">
                          <label for="ta_classe">Classe :</label>
                        <div class="form-select">
                            <select name="ta_classe" id="ta_classe">
                              <option value=""></option>
                                <?php if(isset($appelclassecole) && !empty($appelclassecole)){ foreach ($appelclassecole as $niveau) { ?>
                                  <option value="<?=$niveau->idclasse; ?>"><?=$niveau->classe_libelle; ?></option>
                                <?php  }} ?>
                            </select>
                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="ta_ville">Ville :</label>
                            <div class="form-select">
                                <select name="ta_ville" id="ta_ville">
                                    <option value=""></option>
                                    <?php if(isset($appelville) && !empty($appelville)){ foreach ($appelville as $zone) { ?>
                                    <option value="<?=$zone->idsb_ville; ?>"><?=$zone->sb_ville_nom; ?></option>
                                    <?php  }} ?>
                                    <option value="losangeles">Abidjan</option>
                                    <option value="washington">Dabou</option>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" name="ton_email" id="email" />
                        </div>
                        <div class="form-group">
                            <label for="mdp">Mot de passe :</label>
                            <input type="password" name="ton_pass" id="mdp">
                        </div>
                        <div class="form-group">
                            <label for="mdpb">Confirmation du mot de passe :</label>
                            <input type="password" name="ton_pass_bis" id="mdpb">
                        </div>
                        <div class="form-group">
                            <label for="hom"><b>Je suis un être humain,</b> <i style="color:#f00;">la couleur du sang est:</i> Rouge | Vert | Orange | Noir | Blanc ?</label>
                            <input type="text" name="captchahumain" id="hom" placeholder="Votre réponse ici..." />
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Annuler" class="submit" name="annuler" id="reset" />
                            <input type="submit" value="Soumettre" class="submit" name="soumettreform" id="submit" />
                        </div>
                        <small style="color:#eb1212 ;">Tous les champs sont obligatoires !</small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="public/regform/vendor/jquery/jquery.min.js"></script>
    <script src="public/regform/js/main.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    
  </body>
</html>
