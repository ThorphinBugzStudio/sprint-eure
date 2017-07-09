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
            if (!empty($this->find($id)))
            {
                $update = $this->update(['role' => $role], $id, true);
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
            if (!empty($this->find($id)))
            {
                $update = $this->update(['status' => $status], $id, true);
            }
        }
    }

    /**
     * Methode qui permet de recup l'id user pdt l'inscription
     */
     public function getUserId($pseudo)
     {
       $sql = "SELECT id FROM users WHERE username = '$pseudo'";
       $sth = $this->dbh->prepare($sql);
       $sth->execute();
       $result = $sth->fetch();
      //  debug($result);
       return $result;
     }

 }
