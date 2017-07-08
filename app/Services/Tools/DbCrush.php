<?php
namespace inc\Classes;

use PDO;

/**
 * Écraser les jointures, les voir mourir devant soi et entendre les lamentations de la base de données.
 * @1982 by arnold schwarzhervé
 */
class DbCrush
{
    /**
     * Nom de la base de données
     * 
     * @var string
     */
    private $dbName;
    /**
     * Commande SQL constructible
     * 
     * @var string
     */
    private $sql;
    /**
     * Resultat de la requete effectuée avec $this->sql
     * 
     * @var array
     */
    private $resultQuery;
    /**
     * Html pour affichage
     *
     * @var string
     */
    private $html;
    /**
     * Objet PDO connecté à $this->dbName
     * 
     * @var object
     */
    private $pdo;
    /**
     * Structure de la bdd $this->dbName table => array([0] => colonnes)
     * 
     * @var array 
     */
    private $dbStruct;

    /**
     * Initialisation DbCrush
     *
     * @param string $bddName Nom de la base de donnée à connecter
     */
    public function __construct($bddName)
    {
        // Initialisation variables
        $this->dbName = $bddName;
        $this->sql = '';
        $this->resultQuery = array();
        $this->html = '';

        // test os server windows ou autre
        if (!stristr($_SERVER["HTTP_USER_AGENT"], 'Windows'))
        {
            $mdp = 'mysql';
        }
        else
        {
            $mdp = '';
        }
        
        if (is_string($bddName))
        {
        $this->pdo = new \PDO('mysql:host=localhost;dbname='.$bddName, 'root', $mdp, array(
                                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                                  ));
        
        // Initialisattion de la structure de la bdd
        $this->dbStruct = $this->initDbStruct();
        }
        else
        {
            echo 'Erreur sur DbCrush<br/>';
            echo 'Attendu : new DbCrush(string $bddName -> nom de la bdd)<br/>';
            echo '$bddName => ';
            var_dump($bddName);
            echo '<br/>';
        }
    }

    /**
     * Print_r formatté d'une variable ou de $this.
     * debug() -> Print_r formaté de $this.
     * debug($var, '$var') -> echo '$var' + print_r formaté de $var
     * 
     * @param string $var Variable à debugger | si vide -> $this
     * @param string $varName Nom de la variable à debugger | si vide -> '$this'
     */
    public function debug($var = '', $varName = '')
    {
        if ($var == '')
        {
            echo '$this<br />';
            echo '<pre>';
            print_r($this);
            echo '</pre>';
        }
        else
        {
            echo $varName.'<br />';
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }
    }

    /**
     * getDbStruct() : return $this->dbStruct.
     * getDbStruct('d') debug $this->dbStruct
     *
     * @param string $action Par défaut = '' | Si = 'd' print_r pour debug
     * @return array si $action !='d'
     */
    public function getDbStruct($action = '')
    {
        switch ($action)
        {
            case 'd':
                $this->debug($this->dbStruct, '$this->dbStruct');
                break;
            
            default:
                return $this->dbStruct;
                break;
        }
    }

    /**
     * getSql() : return $this->sql.
     * getSql('d') debug $this->sql
     *
     * @param string $action Par défaut = '' | Si = 'd' print_r pour debug
     * @return string Si $action !='d'
     */
    public function getSql($action = '')
    {
        switch ($action)
        {
            case 'd':
                $this->debug($this->sql, '$this->sql');
                break;
            
            default:
                return $this->sql;
                break;
        }
    }
    
    /**
     * getResultQuery() : return $this->resultQuery.
     * getResultQuery('d') debug $this->resultQuery
     *
     * @param string $action Par défaut = '' | Si = 'd' print_r pour debug
     * @return array si $action !='d'
     */
    public function getResultQuery($action = '')
    {
        switch ($action)
        {
            case 'd':
                $this->debug($this->resultQuery, '$this->resultQuery');
                break;
            
            default:
                return $this->resultQuery;
                break;
        }
    }
    
    /**
     * Raz de $this->sql
     */
    public function sqlInit()
    {
        $this->sql = '';
    }

    /**
     * Set du SELECT de $this->sql.
     * ex : addSqlSelect('a.last_name, b.cp, b.town')
     *
     * @param string $data Par défaut = '*'
     */
    public function addSqlSelect($data = '*')
    {
        $this->sql = 'SELECT '.$data.' ';
    }

    /**
     * Termes de la requete empilables dans l'array transmis en parametre.
     * Voir raccourcis -> ex : addSqlTerms(['a ij b on a.id=b.A_id'])
     *
     * @param array $datas 
     * @return void
     */
    public function addSqlTerms($datas = ["wh id='1'", "AND 1=1"])
    {
        $countDatas = 1;
        foreach ($datas as $data)
        {
            $sqlTerms = explode(' ', $data);
            if ($countDatas == 1)
            {
                $this->sql .= 'FROM ';
            }
            $countDatas ++;

            /**
             * commentaire du 01/07/17 :
             * raccourcis -> WARNING ca va bug si une table ou une colonne est identique à un raccourci
             * peu probable... seul un vicieux nommerai ses tables et colonnes comme mes reccourcis.
             * les vicieux ça merite des bugs !
             * TODO LE 22/07/17 -> FONCTION VERIF TABLES ET COLONNES DIFFERENTES DES RACCOURCIS A L INITIALISATION
             */
            /**
             * commentaire anticipé pour le 03/07/17 : Penser à supprimer la ligne ne correspondant pas à la situation rencontrée
             * - Success -> Evaluation non vicieuse.
             * - Fail -> Et merde...
             */
            foreach ($sqlTerms as $sqlTerm)
            {
                switch ($sqlTerm)
                {
                    case 'ij':
                        $this->sql .= 'INNER JOIN ';
                        break;
                    
                    case 'lj':
                        $this->sql .= 'LEFT JOIN ';
                        break;
                    
                    case 'rj':
                        $this->sql .= 'RIGHT JOIN ';
                        break;

                    case 'fj':
                        $this->sql .= 'FULL JOIN ';
                        break;
                        
                    case 'on':
                        $this->sql .= 'ON ';
                        break;
                        
                    case 'wh':
                        $this->sql .= 'WHERE ';
                        break;
                    
                    case 'in':
                        $this->sql .= 'IS NULL ';
                        break;
                    
                    case 'an':
                        $this->sql .= 'AND ';
                        break;
                    
                    case 'or':
                        $this->sql .= 'OR ';
                        break;
                        
                    default:
                        $this->sql .= $sqlTerm.' ';
                        break;
                }
            }
        }
    }

    /**
     * Execute une requete conforme à $this->sql.
     * Affecte le resultat à $this->resultQuery avec un fetchAll
     */
    public function executeSql()
    {
        $query = $this->pdo->prepare($this->sql);
        $query->execute();
        $this->resultQuery = $query->fetchAll();
    }

    /**
     * Affiche les tables / colonnes, la requete sql et le resultat.
     * Dans un joli html de bon aloi.
     * 
     * @return string Chaine Html.
     */
    public function show()
    {
        $this->html = '';

        $this->html .= '<div class="dbcrush container-fluid">';

            // Affichage des tables et colonnes
            if (!empty($this->dbStruct))
            {
                $this->html .= '<div class="tables row d-flex justify-content-center">';
                foreach ($this->dbStruct as $table => $columns)
                {
                    $this->html .= '<div class="table col-3">';
                        $this->html .= '<h4>Table : '.$table.'</h4>';
                        // colonnes
                        $this->html .= '<ul class="colonnes">';
                        foreach ($columns as $column)
                        {
                            $this->html .= '<li class="colonne">'.$column.'</li>';
                        }
                        $this->html .= '</ul>';
                    $this->html .= '</div>';
                }
                $this->html .= '</div>';
            }

            // Affichage de la requete sql
            if (!empty($this->sql))
            {
                $this->html .= '<div class="sql row d-block">';
                    $this->html .= '<h5 class="col">Requete Sql :</h5>';
                    $this->html .= '<p class="col">'.$this->sql.'</p>';
                $this->html .= '</div>';
            }

            // Affichage du resultat de la requete
            if (!empty($this->resultQuery))
            {
            $this->html .= '<div class="sqlResult row d-flex justify-content-center">';
                foreach ($this->resultQuery as $result => $values)
                {
                    $this->html .= '<div class="resultat col-4">';
                        $this->html .= '<h6>Resultat : ['.$result .']</h6>';
                        $this->html .= '<ul class="results">';
                        foreach ($values as $value => $val)
                        {
                            $this->html .= '<li class="result"> '.$value.' => '.$val.'</li>';
                        }
                        $this->html .= '</ul>';
                    $this->html .= '</div>';
                }
            $this->html .= '</div>';
            }
        $this->html .= '</div>';

        return $this->html;
    }

    /**
     * Recupere la structure des tables et colonnes de la bdd.
     *
     * @return array ('tableA' => array('0' => id', '1' => 'name'))
     */
    private function initDbStruct()
    {
        $tables = array();
        $struct = array();

        $sql = "SHOW TABLES IN $this->dbName";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $tables = $query->fetchAll(PDO::FETCH_COLUMN, 0);

        foreach ($tables as $table)
        {
            $sql = "SHOW COLUMNS IN $table FROM $this->dbName";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $struct += [$table => $query->fetchAll(PDO::FETCH_COLUMN, 0)];
        }
        return $struct;
    }


}

