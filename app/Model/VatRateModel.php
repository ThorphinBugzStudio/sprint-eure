<?php
namespace Model;

use W\Model\ConnectionModel;
use W\Model\Model;

/**
 * Gestion de la table vat_rate
 */
class VatRateModel extends Model
{
   /**
    * Initialisation
    *
    * @return void
    */
   public function __construct()
   {
      $this->setTable('spe_vat_rate');
      $this->dbh = ConnectionModel::getDbh();
   }

}
