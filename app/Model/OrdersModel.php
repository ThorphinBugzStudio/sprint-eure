<?php
namespace Model;

use W\Model\ConnectionModel;
use W\Model\Model;

use Services\Tools\ToolHP;

/**
 * Gestion de la table orders
 */
class OrdersModel extends Model
{
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
    * Initialisation
    *
    * @return void
    */
   public function __construct($where = null)
   {
      $this->setTable('spe_orders');
      $this->dbh = ConnectionModel::getDbh();
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
     * Update le status de la commande en bdd.
     * Front : enum('temp','validated','paid')
     * Back :  enum('checked','prepared','sent','deleted')
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
                                         'modified_at' => ToolHP::nowSql()
                                        ], $id, true);
               if ($status == 'deleted')
               {
                  $update = $this->update(['deleted_at'  => ToolHP::nowSql()], $id, true);
               }
            }
        }
    }

   /**
    * Recuperation de l'en tete d'une commande
    * @param  int $id Id de la commande
    * @return array
    */
   public function getHeadOrder($id = null)
   {
      if (!empty($id))
      {
         $sql = "SELECT o.id, u.username, u.firstName, u.lastName, o.created_at, o.status, v.vat_percentage
                 FROM $this->table AS o
                 JOIN spe_users AS u ON o.users_id = u.id
                 JOIN spe_vat_rate AS v ON o.vat_rate_id = v.id
                 WHERE o.id = $id";

         $sth = $this->dbh->prepare($sql);
         $sth->execute();
         $result = $sth->fetch();

         return $result;
      }
      else
      {
         die('error : id commande');
      }
   }

   /**
    * Recuperation des lignes d'une commande
    * @param  int $id Id de la commande
    * @return array
    */
   public function getRowsOrder($id = null)
   {
      if (!empty($id))
      {
         $sql = "";

         debug($sql);
         $sth = $this->dbh->prepare($sql);
         $sth->execute();
         $result = $sth->fetchAll();

         return $results;
      }
      else
      {
         die('error : id commande');
      }
   }

}
