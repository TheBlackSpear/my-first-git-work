<?php 
/**
* Author:Alain KIKOUN
**/
 ?>
<?php 
namespace App\Controller;
use Core\Config;
//use \App;


class WelcomfaceController extends AppController{
	

	public function __construct(){
		parent::__construct();

		$this->loadModel('sb_ville');
		$this->loadModel('sb_etudiant');
		$this->loadModel('sb_categorie_devoir');
		$this->loadModel('sb_nivo_difficulte');
		$this->loadModel('sb_classe');
		$this->loadModel('sb_devoir');
	}


	public function index(){		
		/*afficher 12 vignettes (3x4) les 12 dernieres enregistrees sans tenir compte des categories*/
		$lesTopTwelveLast=$this->sb_devoir->twelveLast();
		
		$this->render("public_view.index", compact('lesTopTwelveLast'));
	}

	public function devoirCategories(){	
	/**/	
		
		$this->render("public_view.superbrain-categories-devoirs");
	}
	public function aadevoirParCategorie(){		
		/* Liste des categories en sidebar. Au clic sur une categorie AFFICHER uniquement les elements de la categorie
		 12 vignettes par page +pagination
		*/


		$this->render("public_view.superbrain-parcategories-devoirs");
	}

	public function devoirParCategorie(){
		if(isset($_GET['list'])){
			$categid=trim(htmlentities($_GET['list']));
			$devoirparcateg=$this->sb_devoir->devListByCategory($categid);
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
		$bloglistcateg=$this->sb_devoir->pagerdevListByCategory($offset, $no_of_records_per_page, $categid);
		$uncateg=$this->sb_devoir->duniqByCategory($categid);

		$this->render("public_view.superbrain-parcategories-devoirs", compact('pageno', 'total_pages', 'bloglistcateg', 'categid', 'uncateg'));
	}



	public function devoirListeGeneral(){		
		/*afficher 12 vignettes (3x4) les 12 dernieres enregistrees sans tenir compte des categories
		12 par page puis pagination

		*/
			$aleatoireliste=$this->sb_devoir->listaleatoire();
		

		if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 12;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages = ceil(count($aleatoireliste) / $no_of_records_per_page);
		$bloglistcateg=$this->sb_devoir->pagerListaleatoire($offset, $no_of_records_per_page);
		//$uncateg=$this->sb_devoir->duniqByCategory($categid);

		$this->render("public_view.superbrain-liste-devoirs", compact('aleatoireliste', 'total_pages'));
	}

	public function lectureDevoir(){		
		/* single LECTURE d'un seul element*/
		if(isset($_GET['dirvig'])){ 
			$onedevoir=$this->sb_devoir->devUniq($_GET['dirvig']);
			$iddev=$onedevoir->iddevoir;
		}
		$this->render("public_view.superbrain-lecture-devoirs", compact('onedevoir'));
	}




	public function superBrain(){		
		/*qui sommes nous*/
		$this->render("public_view.superbrain-qui-sommes-nous");
	}
	public function contact(){		
		/*contact affiche les coordonnees ou coordonnees + formulaire */
		$this->render("public_view.superbrain-contact");
	}



}
