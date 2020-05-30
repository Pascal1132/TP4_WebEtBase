<?php

require_once 'Modele/Type.php';
require_once 'Framework/Vue.php';
require_once 'Framework/Controleur.php';

class ControleurType extends Controleur
{
    /*
     * Constructeur de ControleurChambres
     */

    private $typeChambre;

    public function __construct()
    {

        $this->typeChambre=new Type();
    }

    public function index()
    {
        $term = $this->requete->getParametre("term");
        echo $this->typeChambre->chercherType($term);
    }
}