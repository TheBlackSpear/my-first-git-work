<?php 
/**
* Author:Alain KIKOUN
**/
 ?>
<?php 
namespace App\Controller;
use \App;
use Core\Auth\DBAuth;

class LogoutController extends AppController{
	public function __construct(){
		parent::__construct();
	}

	public function contributeurbye(){
		$app=App::getInstanceApp();
		$db= $app->getDatabase();
		$auth=new DBAuth($db);
		$auth->deconnexion();
		echo"Déconnexion en cours ...";
		header('refresh:5,index.php?p=contributeur.connexion');
	}
	
}
