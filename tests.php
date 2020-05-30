<?php
if(isset($_GET['test'])){
    switch ($_GET['test']){
        case 'modeleReservation':
        require 'Tests/Modeles/testReservation.php';
        break;
        case 'vueAccueil':
            require 'Tests/Vues/testAccueil.php';
            break;
        case 'vueModifierReservation':
            require 'Tests/Vues/testModifierReservation.php';
            break;
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleReservation">Reservation</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueAccueil">Accueil</a>
    </li>
    <li>
        <a href="tests.php?test=vueModifierReservation">ModifierReservation</a>
    </li>

</ul>
