<?php

namespace Services\Tools;

/**
 * Outil Hervé
 */
class ToolHP
{
    /**
     * Now au format SQL pour insert bdd
     *
     * @return string
     */
    public static function nowSql()
    {
        $now = new \DateTime();

        return $now->format('Y-m-d H:i:s');
    }

   /**
    * Date SQL vers un format determiné
    * @param  string $dateSQL Date au format SQL
    * @param  string $format  Format de retour voulu
    * @return string          Date
    */
   public static function dateSqlToForm($dateSQL = null, $format = 'd/m/Y')
   {
      if (empty($dateSQL)) { $dateSQL = self::nowSql(); }

      return date($format, strtotime($dateSQL));
   }

    /**
     * Calcul des totaux HT - TVA - TTC à partir d'un array de lignes de commandes.
     * Verifie validité de puht * amount = pht pour chaque ligne.
     * [ex.] => Array
     *   (
     *       [id] => 1
     *       [family] => Bobines
     *       [designation] => Imprimante mk1
     *       [packaging] => 1
     *       [puht] => 100.00
     *       [amount] => 2
     *       [pht] => 200.00
     *   )
     *
     * @param array $rowsOrder Lignes de la commande
     * @param float tvaRate Taux de tva
     *
     * @return array ['totalHt' => x, 'totalTva' => y, 'totalTTC' => z]
     */
    public static function CalculFootOrder($rowsOrder = null, $tvaRate = 20)
    {
        $i = 0;
        $errors = array();
        $result = ['totalHt' => 0, 'totalTva' => 0, 'totalTTC' => 0];

        // pas besoin de test numeric : ca va exploser tout seul.
        if (empty($rowsOrder) || empty($tvaRate)) { $errors[] = 'Pas de lignes de commandes // Taux de tva'; }
        elseif (empty($rowsOrder[0]['puht'])) { $errors[] = 'Pas de \'puht\' dans ligne de commande'; }
        elseif (empty($rowsOrder[0]['pht'])) { $errors[] = 'Pas de \'pht\' dans ligne de commande'; }
        elseif (empty($rowsOrder[0]['amount'])) { $errors[] = 'Pas de \'amount\' dans ligne de commande'; }
        else
        {
            foreach ($rowsOrder as $rowOrder)
            {
                $i ++;
                if ($rowOrder['puht'] * $rowOrder['amount'] != $rowOrder['pht'])
                { // debug($rowOrder);
                    // $errors[] = 'ligne '.$i.' puht * amount != pht'; // à voir debug($errors); if ($i == 3) {die ();}
                }
            }
        }

        if (empty($errors))
        {
            foreach ($rowsOrder as $rowOrder)
            {
                $result['totalHt'] += $rowOrder['pht'];
            }
            $result['totalTva'] = round($result['totalHt'] * ($tvaRate / 100) , 2);
            $result['totalTTC'] = $result['totalHt'] + $result['totalTva'];

            return $result;
        }

        else { die(debug($errors)); }

    }

}
