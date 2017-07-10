<?php
namespace Model;

use W\Model\Model;

class AvatarsModel extends Model
{

  public function getAvatarId($userId)
  {
    $sql = "SELECT id FROM avatars WHERE user_id = '$userId'";

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
    debug($this->table);
    $querry = $this->dbh->prepare($sql);
    $querry->execute();
    $result = $querry->fetch();
    return $result;
  }

}
