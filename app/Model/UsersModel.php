<?php
 namespace Model;

 use W\Model\UsersModel as WUsersModel;

 /**
  * Gestion de la table users
  */
 class UsersModel extends WUsersModel
 {
    /**
     * Nombre d'enregistrements dans la table.
     *
     * @var int
     */
    protected $nbId;

    /**
     * Initialisation.
     * Attention au constructeur du parent.
     */
    public function __construct()
    {
        parent::__construct();
        // Set le nombre d'enregistrements.
        $this->nbId = $this->countId();
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
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchColumn();

        return $result;
    }

    /**
     * Methode qui permet de recup l'id user pdt l'inscription
     */
     public function getUserId()
     {
       $sql = "SELECT id FROM users WHERE username = '$pseudo'";
       $sth = $this->dbh->prepare($sql);
       $sth->execute();
       $result = $sth->fetch();

       return $result;
     }

 }
