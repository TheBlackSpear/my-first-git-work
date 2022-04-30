<?php 
/**
* Author:Alain KIKOUN /
**/
 ?>
<?php 
namespace App\Table;

use Core\Table\Table;

class Sb_devoirTable extends Table{

	protected	$table='sb_devoir';
	
	public function twelveLast(){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte ORDER BY iddevoir DESC LIMIT 12");
	}

	public function devUniq($cledev){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant 
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte WHERE tokendev=?", [$cledev], true);
	}
	
	public function duniqByCategory($categorie){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte WHERE categorie_dev=?", [$categorie], true);
	}
	public function devListByCategory($categorie){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte WHERE categorie_dev=? ORDER BY iddevoir ASC", [$categorie], false);
	}
	public function pagerdevListByCategory($offset, $nbperpage, $categorie){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte WHERE categorie_dev=? ORDER BY iddevoir ASC LIMIT $offset, $nbperpage", [$categorie], false);
	}


/* affichage des depots de contributeurs*/

	public function uneContribution($idcontributeur){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte WHERE ajout_par=? ORDER BY iddevoir ASC", [$idcontributeur], true);
	}

	public function devListuncontribut($idcontributeur){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte WHERE ajout_par=? ORDER BY iddevoir ASC", [$idcontributeur], false);
	}
	public function devListuncontributpager($offset, $nbperpage, $idcontributeur){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte WHERE ajout_par=? ORDER BY iddevoir ASC LIMIT $offset, $nbperpage", [$idcontributeur], false);
	}



public function listaleatoire(){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		  ORDER BY iddevoir ASC", false);
	}
	public function pagerListaleatoire($offset, $nbperpage){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir ORDER BY iddevoir ASC LIMIT $offset, $nbperpage", false);
	}
/*A REVOIR*/
	/*public function listaleatoire(){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte  ORDER BY iddevoir ASC", false);
	}
	public function pagerListaleatoire($offset, $nbperpage){
		return $this->tableQuery("SELECT * FROM sb_devoir INNER JOIN sb_categorie_devoir ON sb_devoir.categorie_dev=idcategorie_devoir
		INNER JOIN sb_etudiant ON sb_devoir.ajout_par=idsb_etudiant INNER JOIN sb_classe ON sb_devoir.laclasse=idclasse
		INNER JOIN sb_nivo_difficulte ON sb_devoir.difficulte_dev=idnivo_difficulte ORDER BY iddevoir ASC LIMIT $offset, $nbperpage", false);
	}*/

}