<?php
namespace Model;

use W\Model\Model;

class OrderRowsModel extends Model
{

   public function __contruct()
   {
      $this->setTable('spe_order_rows');
      $this->dbh = ConnectionModel::getDbh();
   }

}
