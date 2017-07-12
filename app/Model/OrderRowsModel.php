<?php
namespace Model;

use W\Model\ConnectionModel;
use W\Model\Model;

use Services\Tools\ToolHP;

/**
 * Gestion de la table order_row
 */
class OrderRowsModel extends Model
{

   /**
    * Initialisation
    *
    * @return void
    */
   public function __construct()
   {
      $this->setTable('spe_order_rows');
      $this->dbh = ConnectionModel::getDbh();
   }

   public function getRows($idOrder = null)
   {
      if (!empty($idOrder))
      {
         $sql = "SELECT * FROM $this->table WHERE orders_id='$idOrder'";
         $sth = $this->dbh->prepare($sql);
         debug($sql);
         $sth->execute();

         return $sth->fetchAll();
      }
      else
      {
         die('error : parametre $idOrder inexistant');
      }
   }

}
