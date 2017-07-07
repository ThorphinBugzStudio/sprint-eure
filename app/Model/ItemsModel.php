<?php
namespace Model;

use W\Model\Model;
use \W\Model\ConnectionModel;

class ItemsModel extends Model
{

  public function __construct(){
    $this->setTable('items');
    $this->dbh = ConnectionModel::getDbh();
  }

}
