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
    $sql = 'SELECT * FROM ' . $this->table;
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll();
  }

  public function findAllWhere($id, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
  {

    $sql = "SELECT * FROM $this->table WHERE items_family_id ='$id'" ;
    if (!empty($this->where)) { $sql .= ' WHERE '.$this->where; }

        if (!empty($orderBy)){
      //sécurisation des paramètres, pour éviter les injections SQL
      if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
        die('Error: invalid orderBy param');
      }
      $orderDir = strtoupper($orderDir);
      if($orderDir != 'ASC' && $orderDir != 'DESC'){
        die('Error: invalid orderDir param');
      }
      if ($limit && !is_int($limit)){
        die('Error: invalid limit param');
      }
      if ($offset && !is_int($offset)){
        die('Error: invalid offset param');
      }

      $sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
    }
        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
    $sth = $this->dbh->prepare($sql);
    $sth->execute();

    return $sth->fetchAll();
  }

  public function countIdcat($id)
  {
      $app = getApp();

      $sql = 'SELECT COUNT(' . $app->getConfig('security_id_property') . ') FROM ' . $this->table ." WHERE items_family_id ='$id'";
      if (!empty($this->where))
      {
          $sql .= ' WHERE '.$this->where;
      }
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchColumn();

      return $result;
  }

}
