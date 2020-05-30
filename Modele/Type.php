<?php
require_once 'Framework/Modele.php';

class Type extends Modele
{
    function estTypeValide($type){
        $sql = 'SELECT type FROM typesChambre WHERE type = ?';
        $req = $this->executerRequete($sql, [$type]);
        return ($req->rowCount())>0;
    }
    function chercherType($term){
        $sql= 'SELECT type FROM typesChambre WHERE type LIKE :term';
        $stmt = $this->executerRequete($sql, ['term' => '%' . $term . '%']);

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['type'];
        }

        /* Toss back results as json encoded array. */
        return json_encode($return_arr);
    }
    function getTypesChambre(){
        $sql = 'SELECT * FROM reservations LEFT JOIN utilisateurs ON numeroUtilisateur_fk = numeroUtilisateur '
                .'LEFT JOIN chambres ON numeroChambre_fk = numeroChambre ORDER BY numeroReservation DESC LIMIT 0, 10';
        $typeReq = $this->executerRequete($sql);
        return $typeReq->fetchAll(\PDO::FETCH_ASSOC);
    }
}