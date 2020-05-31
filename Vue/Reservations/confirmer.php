<?php $this->titre = 'Suppression'; ?>

    <div class="partie">
<?php if($resultat[0]>0){
    ?>
    <h2>Êtes-vous certain de vouloir effacer cette réservation?</h2>
    <fieldset >
        <legend style="text-align: center;">Informations</legend>
        <p >Date d'arrivée : <?=$this->nettoyer($resultat['dateArrivee']);?> <br>
            Date de départ : <?=$resultat['dateDepart']?> <br>
            Nom d'utilisateur : <?=$resultat['nomUtilisateur']?> <br>
            Numéro de la chambre : <?=$resultat['numeroChambre_fk']?></p>
    </fieldset>
    <br>
    <a id="boutonOUI" href="Reservations/supprimer/<?=$resultat['numeroReservation']?>">OUI</a><br><a style="display: block;" href="index.php">NON</a>
    <?php
}else{
    echo "<p>Numéro de réservation non valide.</p>";
}
?>
</div>
