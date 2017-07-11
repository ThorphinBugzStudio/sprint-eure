<?php
namespace Model;

use W\Model\Model;
use W\Model\ConnectionModel;

/**
 * Gestion de la table user_adresses
 */
class User_adressesModel extends Model
{
   public function __construct()
   {
      $this->setTable('spe_user_adresses');
      $this->dbh = ConnectionModel::getDbh();
   }

   /**
    * Get adresse de facturation d'un utilisateur
    * @param  int $userId id de l'utilisateur
    * @return array
    */
   public function getUserAdress($userId)
   {
      $sql = "SELECT * FROM $this->table WHERE users_id = '$userId' AND adress_type = 'facturation'";
    //   debug($this->table);
      $querry = $this->dbh->prepare($sql);
      $querry->execute();
      $result = $querry->fetch();
      return $result;
   }

}
