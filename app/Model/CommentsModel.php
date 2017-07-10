<?php
namespace Model;

use W\Model\Model;

class CommentsModel extends Model
{
  public function last5Comments()
  {

      $sql = "SELECT c.comment, u.username, c.created_at
              FROM comments AS c
              JOIN users AS u
              WHERE c.users_id = u.id
              ORDER BY c.created_at DESC LIMIT 5";

      $query = $this->dbh->prepare($sql);
      $query->execute();
      $comments = $query->fetchAll();
      return $comments;
  }

}
