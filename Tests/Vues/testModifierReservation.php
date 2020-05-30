<?php
require_once 'Framework/Vue.php';
$reservation =
    [
        'numeroReservation' => '55',
        'dateArrivee' => '2020-01-01',
        'dateDepart' => '2020-01-02',
        'numeroChambre_fk'=> '100',
        'nomUtilisateur' => 'Test test',
        'numeroChambre'=>'100',
        'typeChambre_fk' => 'CeciEstUnTypeTest',
        'numeroUtilisateur' => '1'
    ]
;
$vue = new Vue('ModifierReservation');
$utilisateursTab =[
    [
        'numeroUtilisateur'=>'1',
        'nomUtilisateur'=>'Test test'
]

];
$msg="";
$msgCode="";
$chambresTab=[];
$vue->generer(["msgCode" => $msgCode, "msg" => $msg, "chambresTab" => $chambresTab, "utilisateursTab" => $utilisateursTab, "resultat" => $reservation, "id" => $reservation['numeroReservation']]);