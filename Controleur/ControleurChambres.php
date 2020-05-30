<?php
require_once 'Modele/Chambre.php';
require_once 'Modele/Type.php';
require_once 'Modele/Outils.php';
require_once 'Framework/Vue.php';
require_once 'Framework/Controleur.php';

class ControleurChambres extends Controleur
{
    /*
     * Constructeur de ControleurChambres
     */
    private $chambre;
    private $typeChambre;
    private $outils;

    public function __construct()
    {
        $this->chambre=new Chambre();
        $this->typeChambre=new Type();
        $this->outils = new Outils();
    }

    public function supprimer(){
        $id=$this->requete->getParametreId('id');
        $this->chambre->suppressionChambre($id);
        $this->executerAction('index');
    }
    public function validerAjoutChambre($chambre){
        $msgInfo = "";
        // Vérifier que le numéro est un entier supérieur ou égal à 0
        if(filter_var($chambre['numero'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1))) && !$this->chambre->estNoChambrePresent($chambre['numero'])){
            if(filter_var($chambre['courriel'], FILTER_VALIDATE_EMAIL)){
                if(filter_var($chambre['lits'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))){
                    if($this->typeChambre->estTypeValide($chambre['type'])){
                        $this->chambre->insertionChambre($chambre);
                        $msgInfo="succesNouvChambre";
                    }else{
                        $msgInfo="typeErr";
                    }

                }else{
                    $msgInfo="litsErr";
                }
            }else{
                $msgInfo="courrielErr";
            }
        }else{
            $msgInfo="chambreErr";
        }
        $this->executerAction('index');
    }
    public function nouvelleChambre($msgCode)
    {
        $chambreTab = $this->chambre->getChambres();
        $vue = new Vue("NouvelleChambre");
        $msg=$this->chambre->getMessageInfo($msgCode);
        $vue->generer(array('chambresTab'=>$chambreTab, 'msg'=>$msg, 'msgCode'=>$msgCode));

    }
    public function ajouter(){
        $chambre['numero'] = $this->requete->getParametre('numero');
        $chambre['lits'] = $this->requete->getParametre('lits');
        $chambre['type'] = $this->requete->getParametre('type');
        $chambre['courriel'] = $this->requete->getParametre('courriel');
        $msgInfo = "";
        // Vérifier que le numéro est un entier supérieur ou égal à 0
        if(filter_var($chambre['numero'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1))) && !$this->chambre->estNoChambrePresent($chambre['numero'])){
            if(filter_var($chambre['courriel'], FILTER_VALIDATE_EMAIL)){
                if(filter_var($chambre['lits'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))){
                    if($this->typeChambre->estTypeValide($chambre['type'])){
                        $this->chambre->insertionChambre($chambre);
                        $msgInfo="succesNouvChambre";
                    }else{
                        $msgInfo="typeErr";
                    }

                }else{
                    $msgInfo="litsErr";
                }
            }else{
                $msgInfo="courrielErr";
            }
        }else{
            $msgInfo="chambreErr";
        }
        $this->executerAction('index');

    }

    public function index()
    {
        $chambreTab = $this->chambre->getChambres();
        $vue = new Vue("NouvelleChambre");
        $msgCode = "";
        if($this->requete->existeParametre('msg')){
            $msgCode = $this->requete->getParametre('msg');
        }
        $msg=$this->outils->getMessageInfo($msgCode);
        $this->genererVue(['chambresTab'=>$chambreTab, 'msg'=>$msg, 'msgCode'=>$msgCode]);
    }
}