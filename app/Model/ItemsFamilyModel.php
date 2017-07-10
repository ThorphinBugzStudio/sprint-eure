<?php
namespace Model;

use W\Model\Model;
use \W\Model\ConnectionModel;

class ItemsFamilyModel extends Model
{


public function __construct(){
  $this->setTable('items_family');
  $this->dbh = ConnectionModel::getDbh();
}

public function notdelete()
{
  $sql = 'SELECT * FROM ' . $this->table . ' WHERE status != "deleted" ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  return $sth->fetchAll();
}

public function doubloncheck($designation, $champ)
	{

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $champ .'  = :designation ';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':designation', $designation);
    $sth->execute();
    $etat = $sth->rowCount();

		return $etat;
	}

}
