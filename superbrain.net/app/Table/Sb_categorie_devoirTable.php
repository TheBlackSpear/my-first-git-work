<?php 
/**
* Author:Alain KIKOUN /
**/
 ?>
<?php 
namespace App\Table;

use Core\Table\Table;

class Sb_categorie_devoirTable extends Table{

protected	$table='Sb_categorie_devoir';
	
	public function topicGroup(){
		return $this->tableQuery("SELECT * FROM sb_categorie_devoir");
	}


}

