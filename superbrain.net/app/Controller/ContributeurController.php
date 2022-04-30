<?php 
/**
* Author:Alain KIKOUN
**/
 ?>
<?php 
namespace App\Controller;
use Core\Config;
use \App;
use Core\Auth\DBAuth;

class ContributeurController extends AppController{
	
	private $les_classes;

	public function __construct(){
		parent::__construct();

		$this->loadModel('sb_ville');
		$this->loadModel('sb_etudiant');
		$this->loadModel('sb_classe');
		$this->loadModel('sb_categorie_devoir');
		$this->loadModel('sb_nivo_difficulte');
		$this->loadModel('sb_devoir');
	}


	public function index(){
		$this->render("contributeur.superbrain-account");
	}


	private function orthographeClasse(){
	/*foreach ($this->sb_classe-> schoolevel() as $classeid => $classenom) {
			
		}	
		if($this->sb_classe-> schoolevel()->classe_libelle==="sixieme")
			$les_classes="Sixième";
		return $this->les_classes= $this->sb_classe->schoolevel();*/

	}

	
	public function ddmaliste(){		
		
		$this->render("contributeur.superbrain-mes-contributions");
	}




	public function maliste(){
		$this->islogged();

		$etddatas=$this->sb_etudiant->findById($_SESSION["etd_id"])->idsb_etudiant;
		


		if($etddatas){
			$categid=trim(htmlentities($etddatas));
			$devoirparcateg=$this->sb_devoir->devListuncontribut($etddatas);
		}
		//$blogcateg=$this->sb_devoir->blogListe(); //liste de categories en sidebar
		/*$shortlist=$this->sb_devoir->blogShortList();
		$categname=$this->sb_devoir->blogCategUne($categid);*/


		if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 12;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages = ceil(count($devoirparcateg) / $no_of_records_per_page);
		$bloglistcateg=$this->sb_devoir->devListuncontributpager($offset, $no_of_records_per_page, $categid);
		$uncateg=$this->sb_devoir->duniqByCategory($categid);
		$this->render("contributeur.superbrain-mes-contributions", compact('pageno', 'total_pages', 'bloglistcateg', 'categid', 'uncateg'));

		/*$this->render("public_view.superbrain-parcategories-devoirs", compact('pageno', 'total_pages', 'bloglistcateg', 'categid', 'uncateg'));*/
	}

	/*============CONNEXION A SON COMPTE==================*/
	

	public function connexion(){
			
				
		if(!empty($_POST)){	
			if(isset($_POST["connexionopen"])){

				$auth=new DBAuth(\App::getInstanceApp()->getDatabase());
				$usernamee=trim(htmlspecialchars($_POST['usernamestd'])); 
				$passworde=trim(htmlspecialchars($_POST['passwordstd']));
				if($auth->loginetudiant($usernamee, $passworde)){
					$successMSG="Connexion en cours...";
					header('refresh:5,index.php?p=contributeur.compteconnected');		
				}else{ 
					$errMSG="Identifiant ou Mot de passe erroné!";}
			}
		}
		if(isset($errMSG)){
			$this->render("contributeur.superbrain-connexion",compact('errMSG'));
		}elseif(isset($successMSG)){
			$this->render("contributeur.superbrain-connexion",compact('successMSG'));
		}else{
			$this->render("contributeur.superbrain-connexion");
		}
				
	}




	/*============CREER SON COMPTE==================*/
	public function inscription(){
		if(isset($_POST) && !empty($_POST)){
			if(isset($_POST["soumettreform"])){
				if(
					$_POST['ton_nom']!=='' 
					&& $_POST['ton_prenom']!=='' 
					&&$_POST['ton_email']!=='' 
					&& $_POST['ton_pass']!=='' 
					&& $_POST['ton_pass_bis']!=='' 
					&& $_POST['ton_ecole']!==''  
					&& $_POST['ta_classe']!=='' 
					&&$_POST['ta_ville']!=='' 
					&& $_POST['captchahumain']!==''  
					 
				){
					$captchasb=trim(htmlspecialchars(htmlentities($_POST["captchahumain"])));
					$reponsesb=strtolower($captchasb);
					if($reponsesb==="rouge" ){
						$mail=trim($_POST["ton_email"]);
						$okmail=$this->sb_etudiant->isMailExist($mail);					
						if(!$okmail){

							if(strlen(trim($_POST["ton_pass"]))>=9){
								//$long = strlen($_POST["ton_pass"]);
									#generer key
								$tokenkey=sha1(rand());
								$replylink="https://www.superbrain.infoci.info/?p=contributeur.inscriptionConf&inscconf=".$tokenkey."&avis=0&frag=yqoFgJa4327";

								$myname=trim(htmlspecialchars(htmlentities($_POST["ton_nom"])));
								$myprenom=trim(htmlspecialchars(htmlentities($_POST["ton_prenom"])));
								$mycity=trim(htmlspecialchars(htmlentities($_POST["ta_ville"])));
								$myschool=trim(htmlspecialchars(htmlentities($_POST["ton_ecole"])));
								$myclass=trim(htmlspecialchars(htmlentities($_POST["ta_classe"])));
								$mymail=trim(htmlspecialchars(htmlentities($_POST["ton_email"])));
								$mypass=trim(htmlspecialchars(htmlentities($_POST["ton_pass"])));

								$options = ['cost' => 12,];
								$mypswd = $mypass;
								$donnees=$_POST;

								$contributor_create=$this->sb_etudiant->create([
								'nom_etd'		=> 	$myname,
								'prenoms_etd'	=>	$myprenom,
								'classe_etd'	=> 	$myclass,
								'mail_etd'		=> 	$mymail,
								'password_etd'	=> password_hash($mypswd,PASSWORD_BCRYPT, $options),
								'ville_etd'=>	$mycity,
								'ecole_etd'=>	$myschool,
								'etd_token'=>	$tokenkey,
								'etd_online'=>	0
								]);/* ENVOI D'UN MAIL DE CONFIRMATION*/
								#envoi de mail
								$maildest=$mymail;
								$nomdest=$myname;
								$objet="***CONFIRMATION de compte***";
								$contenuMsg="Bonjour &nbsp;". $nomdest.",<br> 
								Veuillez cliquer sur le lien suivant pour activer votre compte  : ".$replylink. 
								"<br><br>NB: Il est fortement conseillé de garder confidentiel son mot de passe.
								 Aussi, le changer périodiquement est-il nécessaire !<br> <br> <b></i>Super Brain vous remercie pour l'intérêt porté à son projet !</i></b>";
								$contenuMsg=str_replace("\n.", "\n..", $contenuMsg);
								$from_name="SuperBrain";

								$from_mail="noreply@infoci.info";//Not reply;
								$encoding = "utf-8";
									 // Mail header
								$header = 'Content-type: text/html; charset='.$encoding."\r\n";
								$header .= 'From: '.$from_name.'<'.$from_mail.'>'."\r\n";
								$header .= 'To:'.$maildest."\n";
								$header .= 'MIME-Version: 1.0'."\r\n";
								$header .= 'Content-Transfer-Encoding: 8bit'."\r\n";
								$header .= 'Date:'.date("r (T)")." \r\n";
								$tomail=mail($maildest, $objet, $contenuMsg, $header);
							
								if($contributor_create && $tomail){
									$successMSG=" Achevez la création du compte avec le mail de confirmation dans votre boite Mail !";
									header('refresh:3,?p=contributeur.connexion');
									$this->render("erreurpage.rdvvalid", compact('successMSG'));
									exit;
								}else{
									$errMSG="OOOP une erreur est survenue. Veuillez essayer plus tard !"; 
								}
									
								
							}else{$errMSG="Votre mot de passe doit contenir au moins 9 caractères alphanum&eacute;riques !";}
						}else{ $errMSG="Cette addresse mail existe d&eacute;j&agrave;";}
					}else{ $errMSG="Etes-vous un humain ou un robot ? <br> Quelle est la couleur du sang ?";}
				}else{$errMSG="Au moins un champ est vide. Veuillez remplir à nouveau le formulaire !";}
			}else{$errMSG="Veuillez soumettre le formulaire d'enregistrement des contributeurs !";}
		}
		$appelville=$this->sb_ville->ville();
		$appelclassecole=$this->sb_classe-> schoolevel();
		if(isset($errMSG)){
			$this->render("contributeur.superbrain-registration", compact('errMSG', 'appelclassecole', 'appelville'));
		}elseif(isset($successMSG)){
			$this->render("contributeur.superbrain-registration", compact('successMSG', 'appelclassecole', 'appelville'));
		}else{
			$this->render("contributeur.superbrain-registration", compact( 'appelclassecole', 'appelville'));
		}	
	}

	public function inscriptionConf(){	
		if(isset($_GET["inscconf"])){	
			if($_GET["inscconf"]!==""){
				$cletoken=$_GET["inscconf"];
				$iskey=$this->sb_etudiant->keyExist($cletoken);				
				if($iskey){
					if(!empty($_POST)){
						if(isset($_POST["okcompte"])){
							$idrecs=$iskey->idsb_etudiant;
							#Update mot de passe en base de données
							$maj=$this->sb_etudiant->update($idrecs,[
							"etd_online"=>1
							]);									
							#envoi de mail
							$maildest=$iskey->mail_etd;
							$nomdest=$iskey->nom_etd;
							$objet="***Confirmation: COMPTE ACTIF***";
							$contenuMsg="Bonjour &nbsp;". $nomdest.",<br>
							 Votre compte est activé. Vous pouvez désormais partager des devoirs avec la communauté de SuperBrain ! <br> <br>
							  <b></i>SuperBrain</i>, La Com Simplement !</b>";
							$contenuMsg=str_replace("\n.", "\n..", $contenuMsg);
							$from_name="SuperBrain";
							$from_mail="noreply@infoci.info";
							$encoding = "utf-8";
							 // Mail header
						    $header = 'Content-type: text/html; charset='.$encoding."\r\n";
						    $header .= 'From: '.$from_name.'<'.$from_mail.'>'."\r\n";
						    $header .= 'To:'.$maildest."\n";
						    $header .= 'MIME-Version: 1.0'."\r\n";
						    $header .= 'Content-Transfer-Encoding: 8bit'."\r\n";
						    $header .= 'Date:'.date("r (T)")." \r\n";
					    	
					    	  // Send mail
						    $envoiMsg=mail($maildest, $objet, $contenuMsg, $header);
						//if($envoiMsg && $maj){$successMSG="Votre nouveau mot de passe a été généré et envoyé par mail !";}else{$errMSG="Echec de génération du nouveau mot de passe !"; }
						    if($maj){
						    	$tokentoZero=$this->sb_etudiant->update($idrecs,[
							"etd_token"=>0,
							]);
						    	$successMSG="Votre compte a été activé !";
						    	header('refresh:1,?p=contributeur.connexion');
						    }
						}
					}
				}else{
					$errMSG="Ce lien a expiré <br> Votre compte est probablement actif.veuillez-vous connecter !";
					header('refresh:2,?p=contributeur.connexion');
				}
			}
		}
		if(isset($errMSG)){
			$this->render("contributeur.superbrain-confirmaccount", compact('errMSG'));
		}elseif(isset($successMSG)){
			$this->render("contributeur.superbrain-confirmaccount", compact('successMSG'));
		}else{
			$this->render("contributeur.superbrain-confirmaccount");
		}

	}

	/*============AJOUT ET GESTION DES RESSOURCES==================*/

	
	public function newResource(){		
		//var_dump(date('Y-m-d', strtotime(date('Y-m-d'). '+1 DAY')));

		$this->islogged();

		if (isset($_POST["ajout_devoir"])) {
			$etddatas=$this->sb_etudiant->findById($_SESSION["etd_id"])->idsb_etudiant;
			if(
				$_POST["titreof"]!=="" 
				&& $_POST["devdifficulte"]!==""
				&& $_POST["matiere"]!==""
				&& $_POST["contdevoir"]!==""
				&& $_POST["classe"]!==""
			){
							
					
					$length=5;
					$codes=substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);	
					$ok=$this->sb_devoir->create([
						'tokendev'	=>	"jb-".date('YmdHi').$codes,
						'titre_dev'	=> 	$_POST["titreof"],
						'difficulte_dev'	=> 	trim(htmlentities($_POST["devdifficulte"])),
						'laclasse'	=>	trim(htmlentities($_POST["classe"])),
						'categorie_dev'	=> 	trim(htmlentities($_POST["matiere"])),
						'ajout_par'		=> 	$etddatas,
						'contenu_dev'	=> 	trim(htmlentities($_POST["contdevoir"])),
						'ajout_le'	=> 	date('Y-m-d')
					]);
					if($ok){
						$successMSG="Offre enregistr&eacute;e. Publication effective!";
						
						header('refresh:2,?p=contributeur.compteConnected');
					}else{
						$errMSG="Echec enregistrement.";
					}
			}else{$errMSG= "Au moins un champ est mal rempli !";}
		}		

		$lecontrinuteur=$this->sb_etudiant->findById($_SESSION['etd_id']);
		$nivoscolaire=$this->sb_classe->schoolevel();
		$categoryes=$this->sb_categorie_devoir->topicGroup();
		$difficile=$this->sb_nivo_difficulte->all();
		if(isset($errMSG)){
			$this->render("contributeur.superbrain-ajout-devoir", compact('nivoscolaire', 'categoryes', 'difficile', 'errMSG'));
		}elseif(isset($successMSG)){
			$this->render("contributeur.superbrain-ajout-devoir", compact('nivoscolaire', 'categoryes', 'difficile', 'successMSG'));
		}else{
			$this->render("contributeur.superbrain-ajout-devoir", compact('nivoscolaire', 'categoryes', 'difficile'));
		}
		
	}



	public function readMore(){
		$this->islogged();
		if(isset($_GET['suitable'])) 
			$idread=$_GET['suitable'];
		$oneInfo=$this->sb_devoir->devUniq($idread);		
		//$lerecruteur=$this->sb_etudiant->findById($_SESSION['etd_id']);
		$this->render("contributeur.superbrain-lire", compact('oneInfo'));
	}


	public function compteConnected(){
		$this->islogged();
		$lerecruteur=$this->sb_etudiant->findById($_SESSION['etd_id']);
		if(isset($errMSG)){
			$this->render("contributeur.superbrain-account", compact('lerecruteur', 'errMSG'));
		}elseif(isset($successMSG)){
			$this->render("contributeur.superbrain-account", compact('lerecruteur', 'successMSG'));
		}else{
			$this->render("contributeur.superbrain-account", compact('lerecruteur'));
		}
					
	}


	public function islogged(){
		$app=App::getInstanceApp();
		$db= $app->getDatabase();
		
		$auth=new DBAuth($db);

		if(!$auth->etd_logged())
		{
			header('Location:index.php?p=contributeur.connexion');
		}
	}

	public function newpswd(){
		$this->islogged();
		if(!empty($_POST)){
			if(isset($_POST["passchange"])){
				if(trim($_POST["usermail"])!=="" && trim($_POST["newpassword"])!=="" && trim($_POST["confpassword"])!==""){
					$pseudoetd=trim($_POST["usermail"]);
					$nPass=trim($_POST["newpassword"]);
					$cPass=trim($_POST["confpassword"]);
					$okmail=$this->sb_etudiant->isMailExist($pseudoetd);
					if($okmail){
						if($nPass===$cPass){
							if(strlen($nPass)>=9){
								//$long = strlen($_POST["passowner"]);
								/**/$options = ['cost' => 12,];
								$npassHide = $nPass;
								$newPass = password_hash(
									$npassHide,
									PASSWORD_BCRYPT,
									$options
								);		
								$etddata=$this->sb_etudiant->findById($_SESSION['etd_id']);
								$idetd= $etddata->idsb_etudiant;
								#Update mot de passe en base de données
								$maj=$this->sb_etudiant->update($idetd,[
								"password_etd"=>$newPass
								]);
								if($maj){
									$successMSG="Votre mot de passe est mis à jour avec succès !";
								header('refresh:1,index.php?p=contributeur.index');
								}else{$errMSG="Echec de mis à jour du mot de pass !";}
							}else{$errMSG="Votre mot de passe doit contenir au moins 9 caractères alphanum&eacute;riques !";}
						}else{ $errMSG="Nouveaux Mots de Passe différents !";}
					}else{ $errMSG="Désolé, ce mail est inconnu ! Ce compte est inexistant.";}
					
				}else{ $errMSG="Au moins un champ est vide !";}
			}
			
		}				
			
		if(isset($errMSG)){
			$this->render("contributeur.superbrain-passwordchange", compact('errMSG'));
		}elseif(isset($successMSG)){
			$this->render("contributeur.superbrain-passwordchange", compact('successMSG'));
		}else{
			$this->render("contributeur.superbrain-passwordchange");
		}
		
 
	}

}
