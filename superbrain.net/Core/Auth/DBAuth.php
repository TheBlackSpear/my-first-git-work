<?php 
/**
* Author:Alain KIKOUN
**/
 ?>
<?php 
namespace Core\Auth;
use Core\Database\Database;

class DBAuth{

	private $db;
	//private $user_connected;

	public function __construct(Database $db){
		$this->db=$db;
	}

	public function getUserId(){
		if($this->logged()){
			return $_SESSION['connect'];
		}
		return false;
	}
	
	public function loginetudiant($identifiant, $modepass){
		$online=1;
		$recquery=$this->db->dbPrepare("SELECT idsb_etudiant, nom_etd, mail_etd, password_etd FROM sb_etudiant WHERE mail_etd=? AND etd_online=?", [$identifiant, $online], null, true);

		if($recquery){ 
			/*if($modepass===$recquery->password_etd){*/
			/**/if(password_verify($modepass, $recquery->password_etd))
			{
				$passewrd = $recquery->password_etd;				
				$_SESSION['etd_id'] = $recquery->idsb_etudiant;
				$_SESSION['etd_pseudo'] = $recquery->mail_etd;
				$_SESSION['etd_nom'] = $recquery->nom_etd;
				$_SESSION['etd_passwd'] = $passewrd;
				return true;
			}  return false;
		}
	}

	public function etd_logged(){
		if(isset($_SESSION['etd_pseudo'])){return isset($_SESSION['etd_pseudo']);}
		
	}
	
	public function deconnexion(){
		$cheminhors=explode('=', $_SERVER["REQUEST_URI"]);
		var_dump($_SERVER["REQUEST_URI"]);
		if($cheminhors[1]==='logout.contributeurbye') {
			if(isset($_SESSION['etd_pseudo']) && isset($_SESSION['etd_id'])){
				unset($_SESSION['etd_pseudo']);
				unset($_SESSION['etd_nom']);
				unset($_SESSION['etd_id']);
				unset($_SESSION['etd_passwd']);
			}
		}
	}
}