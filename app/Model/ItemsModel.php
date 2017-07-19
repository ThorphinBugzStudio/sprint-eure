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

  public function findAllWhereback($id, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
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

  public function findAllWhere($id, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
  {

    $sql = "SELECT * FROM $this->table WHERE items_family_id ='$id' AND status ='active'" ;

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


  public function findAllproduct($where, $condition, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
  {

    $sql = "SELECT * FROM $this->table WHERE $where = '$condition' " ;

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

  public function findAllproductactive($where, $condition, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
  {

    $sql = "SELECT * FROM $this->table WHERE $where = '$condition' AND status = 'active' " ;

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

  public function doubloncheck($designation, $champ)
  	{

  		$sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $champ .'  = :designation ';
  		$sth = $this->dbh->prepare($sql);
  		$sth->bindValue(':designation', $designation);
      $sth->execute();
      $etat = $sth->rowCount();

  		return $etat;
  	}

  public function recherche($search, $order, $orderDir, $limit = null, $offset = null){

      $sql = 'SELECT * FROM ' . $this->table . ' WHERE designation LIKE "%'.$search.'%" AND status = "active" ORDER BY '.$order.' '.$orderDir.'' ;

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

  public function rechercheback($search, $order, $orderDir, $limit = null, $offset = null){

      $sql = 'SELECT * FROM ' . $this->table . ' WHERE designation LIKE "%'.$search.'%" ORDER BY '.$order.' '.$orderDir.'' ;

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

  public function countsearch($search){
    $app = getApp();

    $sql = 'SELECT COUNT(' . $app->getConfig('security_id_property') . ') FROM ' . $this->table . ' WHERE designation LIKE "%'.$search.'%"' ;
    if (!empty($this->where))
    {
        $sql .= ' WHERE '.$this->where;
    }
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchColumn();

    return $result;
  }

  /**
     * Recuperation infos d'un item pour panier
     * @param  int $id Id de l'article
     * @return array
     */
    public function getItemPanier($id = null)
    {
        if (!empty($id))
            {
            $sql = "SELECT f.family, i.designation, i.packaging, i.puht
                    FROM $this->table AS i
                    JOIN spe_items_family AS f	ON i.items_family_id = f.id
                    WHERE i.id = $id";

            // debug($sql);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $result = $sth->fetch();

            return $result;
        }
        else
        {
           die('error : id item');
        }
   }

   public function getsevenDayNewItems()
   {
     $sql = "SELECT count(id) FROM $this->table WHERE created_at >= (CURDATE() + INTERVAL -7 DAY)";
     $sth = $this->dbh->prepare($sql);
     $sth->execute();
     $result = $sth->fetchColumn();
     //  debug($result);
     return $result;
   }



}
