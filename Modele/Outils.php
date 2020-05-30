<?php
require_once 'Framework/Modele.php';

class Outils extends Modele
{
    function getMessageInfo($msgCode){
        $msg = "";
        switch ($msgCode) {
            case 'dateErr':
                $msg="Le jour d'arrivé doit être inférieur au jour de départ.";
                break;
            case 'chambreErr':
                $msg="Le numéro de la chambre n'est pas valide.";
                break;
            case 'courrielErr':
                $msg="Le courriel n'est pas valide.";
                break;
            case 'typeErr':
                $msg="Le type de chambre n'est pas valide.";
                break;
            case 'litsErr':
                $msg="Le nombre de lits n'est pas valide.";
                break;
            case 'utilisateurErr':
                $msg="L'utilisateur n'est pas valide.";
                break;
            case 'succesModif':
                $msg="La modification a bien été effectuée.";
                break;
            case 'succesNouv':
                $msg="L'ajout a bien été effectué.";
                break;
            case 'succesNouvChambre':
                $msg="L'ajout a bien été effectué<br>Un courriel vous a été envoyé!";
                break;
            case 'succesSupp':
                $msg = "La suppression a bien été effectuée.";
                break;
            case 'annulationSupp':
                $msg="La suppression a été annulée.";
                break;
            case 'annulNouvChambre':
                $msg="L'ajout a été annulé.";
                break;
            case '':
                $msg="";
                break;
            default:
                $msg="Code de message invalide.";
                break;
        }
        return $msg;
    }
}