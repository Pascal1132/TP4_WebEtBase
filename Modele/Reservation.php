<?php
require_once 'Framework/Modele.php';

class Reservation extends Modele{
    function getReservations(){
    $sql = 'SELECT * FROM reservations LEFT JOIN utilisateurs ON numeroUtilisateur_fk = numeroUtilisateur LEFT JOIN chambres ON numeroChambre_fk = numeroChambre WHERE reservations.efface=0 ORDER BY numeroReservation DESC LIMIT 0, 10';
        return $this->executerRequete($sql)->fetchAll(\PDO::FETCH_ASSOC);

    }
    function getInformationsReservation($id){

        $sql = 'SELECT * FROM reservations LEFT JOIN utilisateurs ON numeroUtilisateur_fk = numeroUtilisateur LEFT JOIN chambres ON numeroChambre_fk = numeroChambre WHERE numeroReservation = ? AND reservations.efface = 0';
        $reqAfficher=$this->executerRequete($sql,[$id]);
        return $reqAfficher->fetch();
    }
    function insertionReservation($reservation){
        //Insertion de la réservation grâce à une requête préparée

        $sql = 'INSERT INTO reservations (dateArrivee, dateDepart, numeroChambre_fk, numeroUtilisateur_fk) VALUES(?, ?, ?, ?)';

        return $this->executerRequete($sql, [$reservation['dateArrivee'],$reservation['dateDepart'],$reservation['chambre'],$reservation['utilisateur']]);
    }
    function suppressionReservation($id){
        $sql = 'UPDATE `reservations` SET efface=1 WHERE `reservations`.`numeroReservation` = ?';
       return $this->executerRequete($sql, [$id]);

    }

    function estIdentifiantReservationValide($id){

        $sql = 'SELECT numeroReservation FROM reservations WHERE numeroReservation = ? AND efface = 0';
        $result = $this->executerRequete($sql, [$id]);
        $resultat = $result->fetch();
        return $resultat[0]>0;
    }
    function estDateValide($dateDepart, $dateArrivee){
        return date_diff($dateDepart,$dateArrivee)->format("%R%a")<=0;
    }

    public function miseAJourReservation($reservation)
    {
        $sql = 'UPDATE reservations SET dateArrivee = ?, dateDepart=?, numeroChambre_fk=?, numeroUtilisateur_fk=? WHERE numeroReservation = ?';
        return $this->executerRequete($sql, [$reservation['dateArrivee'],$reservation['dateDepart'],$reservation['chambre'],$reservation['utilisateur'], $reservation['id']]);
    }


}