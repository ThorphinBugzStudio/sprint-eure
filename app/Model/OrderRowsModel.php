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

}
