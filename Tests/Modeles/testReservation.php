<?php
require_once 'Modele/Reservation.php';
$tstReservation = new Reservation();
$reservations = $tstReservation->getReservations();
echo '<h3>Test getReservations :</h3>';

var_dump($reservations);

echo '<h3>Test getInformationsReservation(0) :</h3>';
$reservation = $tstReservation->getInformationsReservation(34);
var_dump($reservation);
