<?php 
/**
* Author:Alain KIKOUN
**/
 ?>
<?php 
namespace App\Controller;
use Core\Controller\Controller;
use \App;

class AppController extends Controller{
	//protected $template='default';
	protected $template='fronttemp';

	public function __construct(){
		$this->viewpath=ROOT.'/app/Views/';
	}
	
	protected function loadModel($modele_name){
		$this->$modele_name=App::getInstanceApp()->getTable($modele_name);
	}
}