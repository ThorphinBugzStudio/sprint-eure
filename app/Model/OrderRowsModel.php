<?php
namespace Model;

use W\Model\ConnectionModel;
use W\Model\Model;

use Services\Tools\ToolHP;

/**
 * Gestion de la table order_row
 */
class OrderRowsModel extends Model
{

   /**
    * Initialisation
    *
    * @return void
    */
   public function __construct()
   {
      $this->setTable('spe_order_rows');
      $this->dbh = ConnectionModel::getDbh();
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
            $sql = "SELECT r.id, i.id, f.family, i.designation, i.packaging, r.puht, r.amount, r.pht 
                    FROM $this->table AS r
                    JOIN spe_items AS i ON r.items_id = i.id
                    JOIN spe_items_family AS f	ON i.items_family_id = f.id
                    WHERE r.orders_id = $id";

            // debug($sql);
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $results = $sth->fetchAll();

            return $results;
        }
        else
        {
           die('error : id commande');
        }
   }

}
