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

}
