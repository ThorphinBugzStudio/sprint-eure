<?php

namespace Controller;

use \W\Controller\Controller;
// ajout use pour tools communs à tous les controleurs
use \Services\Tools\ToolHp; // outil hervé

/**
 * Les controlleurs heritent de AppController plutot que de Controller.
 * Methodes communent à tout les controlleurs.
 */
class AppController extends Controller
{
    /**
     * Outil Hervé
     *
     * @var object
     */
    protected $hp;

    /**
     * Initialisation de AppController.
     */
    public function __construct()
    {
        // pas de __construct dans Controller donc osef de parent::__construct();
        $this->hp = new ToolHp();   // outil hervé
    }
}