<?php 
/**
* Author:Alain KIKOUN /
**/
 ?>
<?php 
namespace App\Table;

use Core\Table\Table;

class Sb_villeTable extends Table{

protected	$table='sb_ville';
	
	public function ville(){
		return $this->tableQuery("SELECT * FROM sb_ville");
	}
}