<?php
require_once 'Framework/Modele.php';

class Chambre extends Modele
{

    function getChambres(){
        $sql = 'SELECT * FROM chambres WHERE efface = 0 ORDER BY numeroChambre ';
        $resultat = $this->executerRequete($sql);
        return $resultat->fetchAll(\PDO::FETCH_ASSOC);
    }
    function estNoChambrePresent($noChambre){
        $sql = 'SELECT numeroChambre FROM chambres WHERE numeroChambre = 
		? AND efface = 0';
        $resultat = $this->executerRequete($sql,[$noChambre])->fetch();

        return $resultat[0]>0;
    }
    function insertionChambre($chambre){
        $sql = 'INSERT INTO chambres (numeroChambre, nombreLits, typeChambre_fk) VALUES(?, ?, ?)';
        $result = $this->executerRequete($sql, [$chambre['numero'], $chambre['lits'], $chambre['type']]);

    }
    function suppressionChambre($id){

        $sql = 'DELETE FROM `chambres` WHERE numeroChambre = ?';
        $this->executerRequete($sql, [$id]);

    }
}