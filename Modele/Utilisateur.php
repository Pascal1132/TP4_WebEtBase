<?php


class Utilisateur extends Modele
{
    public function getUtilisateurs(){
        $sql = 'SELECT numeroUtilisateur, nomUtilisateur FROM utilisateurs ORDER BY numeroUtilisateur';
       $utilisateursReq= $this->executerRequete($sql);
        return $utilisateursReq->fetchAll(\PDO::FETCH_ASSOC);
    }
    function estUtilisateurValide($utilisateur){
        $sql = 'SELECT numeroUtilisateur FROM utilisateurs WHERE numeroUtilisateur = ?';
        $requeteUtilisateur=$this->executerRequete($sql, [$utilisateur]);

        $resultat = $requeteUtilisateur->fetch();
        return $resultat[0]>0;
    }
}