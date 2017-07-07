<?php
namespace Model;

use W\Model\Model;
use \W\Model\ConnectionModel;

class ItemsFamilyModel extends Model
{


public function __construct(){
  $this->setTable('items_family');
  $this->dbh = ConnectionModel::getDbh();
}


}
