<?php
namespace Model;

use W\Model\Model;
use \W\Model\ConnectionModel;
use \Model\ItemsFamilyModel;

class ItemsModel extends ItemsFamilyModel
{

  public function __construct(){
    $this->setTable('spe_items');
    $this->dbh = ConnectionModel::getDbh();
    // Set le nombre d'enregistrements.
    $this->nbId = $this->countId();
  }

  public function nomcategorie(){
    $this->setTable('spe_items_family');
    $sql = 'SELECT family FROM ' . $this->table;
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();
  }

}
