<?php
namespace Model;

use W\Model\Model;
use \W\Model\ConnectionModel;
use \Controller\AppController;
use \Services\Tools\Pagination;
use \Services\Tools\RadiosBox;
use Services\Tools\ToolHP;

class ItemsFamilyModel extends Model
{

   public function __contruct()
   {
      $this->setTable('spe_items_family');
      $this->dbh = ConnectionModel::getDbh();
   }

  /**
   * Nombre d'enregistrements dans la table.
   *
   * @var int
   */
  protected $nbId;
  /**
   * Restriction WHERE pour requete SQL
   *
   * @var string
   */
  protected $where;

  /**
   * Initialisation.
   * Attention au constructeur du parent.
   */
  public function __construct($where = null)
  {
    $this->setTable('spe_items_family');
    $this->dbh = ConnectionModel::getDbh();
      parent::__construct();
      $this->where = $where;
      // Set le nombre d'enregistrements.
      $this->nbId = $this->countId();
  }

  /**
   * Getter de la condition WHERE du model
   *
   * @return string
   */
  public function getWhere()
  {
      return $this->where;
  }

  /**
   * Setter de la condition WHERE du model.
   * ex. "status != 'deleted'"
   *
   * @param string $where
   * @return void
   */
  public function setWhere($where = null)
  {
      $this->where = $where;
  }

  /**
 * Surcharge findALL avec WHERE du model ($this->where).
   * Récupère toutes les lignes de la table avec un where optionnel.
 * @param $orderBy La colonne en fonction de laquelle trier
 * @param $orderDir La direction du tri, ASC ou DESC
 * @param $limit Le nombre maximum de résultat à récupérer
 * @param $offset La position à partir de laquelle récupérer les résultats
   * @param $where String de condition
 * @return array Les données sous forme de tableau multidimensionnel
 */
public function findAll($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
{

  $sql = 'SELECT * FROM ' . $this->table;
  if (!empty($this->where)) { $sql .= ' WHERE '.$this->where; }

      if (!empty($orderBy)){
    //sécurisation des paramètres, pour éviter les injections SQL
    if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
      die('Error: invalid orderBy param');
    }
    $orderDir = strtoupper($orderDir);
    if($orderDir != 'ASC' && $orderDir != 'DESC'){
      die('Error: invalid orderDir param');
    }
    if ($limit && !is_int($limit)){
      die('Error: invalid limit param');
    }
    if ($offset && !is_int($offset)){
      die('Error: invalid offset param');
    }

    $sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
  }
      if($limit){
          $sql .= ' LIMIT '.$limit;
          if($offset){
              $sql .= ' OFFSET '.$offset;
          }
      }
  $sth = $this->dbh->prepare($sql);
  $sth->execute();

  return $sth->fetchAll();
}

  /**
   * Getter $this->nbId.
   *
   * @return int
   */
  public function getNbId()
  {
      return $this->nbId;
  }

  /**
   * Get nb d'enregistrements de la table du model
   *
   * @return int
   */
  public function countId()
  {
      $app = getApp();

      $sql = 'SELECT COUNT(' . $app->getConfig('security_id_property') . ') FROM ' . $this->table;
      if (!empty($this->where))
      {
          $sql .= ' WHERE '.$this->where;
      }
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchColumn();

      return $result;
  }

  /**
   * Update le role de l'utilisateur en bdd.
   * enum('client', 'admin')
   *
   * @param string $role
   * @return void
   */
  public function updateRole($id, $role = '')
  {
      if ($role == 'admin' || $role == 'client')
      {
          // Si l'id existe -> update.
          if (!empty($this->find($id)))
          {
              // Si l'id existe -> update.
              if (!empty($this->find($id)))
              {
                  $update = $this->update(['role'        => $status,
                                           'modified_at' => ToolHP::nowSql()
                                          ], $id, true);
              }
          }
      }
  }

  /**
   * Update le status de l'utilisateur en bdd.
   * enum('active', 'inactive', 'deleted')
   *
   * @param string $status
   * @return void
   */
  public function updateStatus($id, $status = '')
  {
      if ($status == 'active' || $status == 'inactive' || $status == 'deleted')
      {
          // Si l'id existe -> update.
          if (!empty($this->find($id)))
          {
              $update = $this->update(['status'      => $status,
                                       'modified_at' => ToolHP::nowSql(),
                                       'deleted_at'  => ToolHP::nowSql()
                                      ], $id, true);
          }
      }
  }

  /**
   * Methode qui permet de recup l'id user pdt l'inscription
   */
   public function getUserId($pseudo)
   {
     $sql = "SELECT id FROM spe_users WHERE username = '$pseudo'";
     $sth = $this->dbh->prepare($sql);
     $sth->execute();
     $result = $sth->fetch();
    //  debug($result);
     return $result;
   }


public function notdelete()
{
  $sql = 'SELECT * FROM ' . $this->table . ' WHERE status != "deleted" ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  return $sth->fetchAll();
}

public function doubloncheck($designation, $champ)
	{

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $champ .'  = :designation ';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':designation', $designation);
    $sth->execute();
    $etat = $sth->rowCount();

		return $etat;
	}

}
