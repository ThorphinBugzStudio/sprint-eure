<?php
namespace Model;

use W\Model\ConnectionModel;
use W\Model\Model;

class AvatarsModel extends Model
{

   public function __construct()
   {
      $this->setTable('spe_avatars');
      $this->dbh = ConnectionModel::getDbh();
   }

  public function getAvatarId($userId)
  {
    $sql = "SELECT id FROM $this->table WHERE user_id = '$userId'";

    $querry = $this->dbh->prepare($sql);
    $querry->execute();
    $result = $querry->fetch();
    return $result;
  }

  /**
   * Get Avatar d'un utilisateur
   * @param  int $userId id de l'utilisateur
   * @return array
   */
  public function getUserAvatar($userId)
  {
    $sql = "SELECT * FROM $this->table WHERE user_id = '$userId'";
    $querry = $this->dbh->prepare($sql);
    $querry->execute();
    $result = $querry->fetch();
    // debug($result);
    // die('here2');
    return $result;
  }

}
