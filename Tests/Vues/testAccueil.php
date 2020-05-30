<?php
require_once 'Framework/Vue.php';
$reservations = [
    [
        'numeroReservation' => '55',
        'dateArrivee' => '2020-01-01',
        'dateDepart' => '2020-01-02',
        'numeroChambre_fk'=> '100',
        'nomUtilisateur' => 'Test test',
        'numeroChambre'=>'100',
        'typeChambre_fk' => 'CeciEstUnTypeTest'
    ]
];
$vue = new Vue('Accueil');
$utilisateursTab =[];
$msg="";
$msgCode="";
$chambresTab=[];
$vue->generer(['utilisateursTab'=>$utilisateursTab, 'msg'=>$msg, 'msgCode'=>$msgCode, 'reservations'=>$reservations, 'chambresTab'=>$chambresTab]);