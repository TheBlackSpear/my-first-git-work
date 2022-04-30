<?php 
/**
* Author:Alain KIKOUN
**/
 ?>
<?php 
namespace App\Controller;
use Core\Config;
//use \App;


class InfociController extends AppController{
	

	public function __construct(){
		parent::__construct();

		$this->loadModel('eventable');
		$this->loadModel('zone');
		$this->loadModel('mybanner');
		$this->loadModel('infonews');
		$this->loadModel('partenaire');
		$this->loadModel('eventcateg');
		$this->loadModel('seo');

		$this->loadModel('joboffre');
		$this->loadModel('jobtype');
		$this->loadModel('jobnivo');
		$this->loadModel('jobcategpro');

		$this->loadModel('btkartisan');
		$this->loadModel('btkcatmode');
		$this->loadModel('btkart');
		$this->loadModel('btkartcateg');
		$this->loadModel('btkbanner');

		$this->loadModel('lcimmo');

		$this->loadModel('blog');
		$this->loadModel('categorie');

		$this->loadModel('chapchap');
	}


	public function index(){

		//$quinous=$this->apropos->aboutUs();		
		$val_zone=$this->zone->zones();
		$flashs=$this->infonews->flashInfoView();
		$banners=$this->mybanner->openBanners(); 
		$ourpartner=$this->partenaire->partenaire();
		$lacategevent=$this->eventcateg->categfull();
		$dernierban=$this->mybanner->recentBanner();

		/*===========DESACTIVER PUBLICATIONS EXPIREES===========*/
		$events=$this->eventable->eventDelai();
		if($events){
			foreach ($events as $chrono) {
				$ds=$chrono->DateDiff;
				if($ds==null || $ds<=0){
					$order=$chrono->ordereventable;
					$this->eventable->update($order,[						
						'updated_at'	 => date("Y-m-d H:i"),
						'online' => 0
					]);
					exit;
				}
			}
		}
		/*========FIN===DESACTIVER PUBLICATIONS EXPIREES===========*/

		/* ========DESACTIVATION BANNIERES EXPIREES============== */
		$banners=$this->mybanner->bannerDelai();
		if($banners){
			foreach ($banners as $chrono) {
				$ds=$chrono->DateDiff;
				if($ds==null || $ds<=0){
					$order=$chrono->ordermybanner;
					$this->mybanner->update($order,[
						'mybanner_updated'	=> 	date("Y-m-d H:i:s"),
						'actived'			=> 0
					]);
					exit;
				}
			}
		}  
		/* ==FIN========DESACTIVATION BANNIERES EXPIREES====== */

		/* ====DESACTIVATION LOGOS PARTENAIRES EXPIRES======= */

		$logos=$this->partenaire->partnerDelai();
		if($logos){
			foreach ($logos as $chrono) {
				$ds=$chrono->DateDiff;
				if($ds==null || $ds<=0){
					$order=$chrono->orderpartenaire;
					$this->partenaire->update($order,[						
						'partner_updated'	=>  date("Y-m-d H:i"),
						'actived'			=> 	0
						]);
					exit;
				}
			}
		}
		/* =======FIN========DESACTIVATION PARTENAIRES EXPIRES======== */

		/* =====DESACTIVATION TEXTE DEFILANT EXPIRES======= */

		$infos=$this->infonews->newsDelai();
		if($infos){
			foreach ($infos as $chrono) {
				$ds=$chrono->DateDiff;
				if($ds==null || $ds<=0){
					$order=$chrono->orderinfonews;
					$this->infonews->update($order,[						
						'updte'			=>  date("Y-m-d H:i"),
						'info_active'	=> 	0
						]);
					exit;
				}
			}
		}

		/* ==FIN========DESACTIVATION TEXTE DEFILANT EXPIRES======= */


		/* =====DESACTIVATION OFFRES EMPLOIS EXPIRES======= */

		$emploi=$this->joboffre->jobDelai();
		if($emploi){
			foreach ($emploi as $chrono) {
				$ds=$chrono->DateDiff;
				if($ds==null || $ds<0){
					$order=$chrono->orderjoboffre;
					$this->joboffre->update($order,[						
						'updated_at'	=>  date("Y-m-d H:i"),
						'activation'	=> 	0
						]);
					exit;
				}
			}
		}

		/* ==FIN======= */
		
		if($this->seo->oneseo()){$infociseo=$this->seo->oneseo();}

		$trioimmo=$this->lcimmo->troisimmo();
		$triobtk=$this->btkartisan->troisbtk();
		$trioevent=$this->eventable->troisevent();
		$triojob= $this->joboffre->troisjob(); 
		$trioblog= $this->blog->troisblog(); 
		$triochap= $this->chapchap->troischap(); 
		
		$this->render("infocihome.newsinfo", compact('triochap', 'trioblog', 'trioimmo', 'triobtk', 'trioevent', 'triojob', 'flashs', 'val_zone', 'banners', 'dernierban', 'ourpartner', 'infociseo', 'lacategevent'));
	}


}
