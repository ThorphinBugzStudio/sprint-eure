<?php
namespace Model;

use W\Model\Model;

class OrdersModel extends Model
{
   public function __contruct()
   {
      $this->setTable('spe_orders');
      $this->dbh = ConnectionModel::getDbh();
   }

}
