<?php 
/**
* Author:Alain KIKOUN /
**/
 ?>
<?php 
namespace App\Table;

use Core\Table\Table;

class Sb_etudiantTable extends Table{
	protected $table="sb_etudiant";


	public function isMailExist($mail){
		return $this->tableQuery("SELECT idsb_etudiant, nom_etd , mail_etd  FROM sb_etudiant WHERE mail_etd=?",[$mail],true);
	}
	
	public function keyExist($cletoken){
		return $this->tableQuery("SELECT * FROM sb_etudiant WHERE etd_token=?",[$cletoken],true);
	}

	public function getById($id){
		return $this->tableQuery("SELECT * FROM sb_etudiant 
			 WHERE  idsb_etudiant=?",["$id"], true);		
	}



}