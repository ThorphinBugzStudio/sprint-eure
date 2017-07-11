<?php
namespace Model;

use W\Model\Model;
use \W\Model\ConnectionModel;

class ItemsModel extends ItemsFamilyModel
{

  public function __construct(){
    $this->setTable('spe_items');
    $this->dbh = ConnectionModel::getDbh();
  }

  public function doubloncheck($designation, $famille, $champ, $champ2)
  	{

  		$sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $champ .'  = :designation AND '. $champ2 .'  = :famille ';
  		$sth = $this->dbh->prepare($sql);
  		$sth->bindValue(':designation', $designation);
      $sth->bindValue(':famille', $famille);
      $sth->execute();
      $etat = $sth->rowCount();

  		return $etat;
  	}

}
