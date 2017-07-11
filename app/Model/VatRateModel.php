<?php
namespace Model;

use W\Model\Model;

class VatRateModel extends Model
{
   public function __contruct()
   {
      $this->setTable('spe_vat_rate');
      $this->dbh = ConnectionModel::getDbh();
   }

}
