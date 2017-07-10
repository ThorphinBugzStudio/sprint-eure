<?php
namespace Model;

use W\Model\Model;

/**
 * Gestion de la table user_adresses
 */
class User_adressesModel extends Model
{

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
