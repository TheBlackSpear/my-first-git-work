<?php 
/**
* Author:Alain KIKOUN /
**/
 ?>
<?php 
namespace App\Table;

use Core\Table\Table;

class Sb_classeTable extends Table{

protected	$table='sb_classe';
	
	public function schoolevel(){
		return $this->tableQuery("SELECT * FROM sb_classe");
	}
}