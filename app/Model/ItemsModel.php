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

  public function nomcategorie($id){
    $sql = 'SELECT family FROM items_familly WHERE id = :id ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $id);
    $sth->execute();
    return $sth->fetchAll();
  }

}
