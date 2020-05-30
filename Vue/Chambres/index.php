<?php $titre = 'Gérer les chambres'; ?>


<h3 style="color:var(--couleurOrange);font-weight: bold;"><?php if($msgCode!=="litsErr" && $msgCode!=="courrielErr" && $msgCode!=="chambreErr" && $msgCode !=="typeErr")echo $msg;?></h3>
<form action="Chambres/ajouter" method="post" class="formulaire" >
    <h2>Nouvelle Chambre</h2>
    <ul>
        <li><label for="numero" style="float: left;">Numéro de la chambre:</label>
            <input class="entreeTexteNouvChambre" id="numero" name="numero" type="text"/></li>
        <span style="color:black;font-weight: bold;"><?php if($msgCode=="chambreErr")echo $msg;?></span>
        <li><label for="lits" style="float: left;">Nombre de lits:</label>
            <input class="entreeTexteNouvChambre" id="lits" name="lits" type="text"/></li>
        <span style="color:black;font-weight: bold;"><?php if($msgCode=="litsErr")echo $msg;?></span>
        <li>
            <label for="type" style="float: left;">Type de la chambre:</label>
            <input class="entreeTexteNouvChambre ui-autocomplete-input" id="type" name="type" type="text"/>
        </li>
        <span style="color:black;font-weight: bold;"><?php if($msgCode=="typeErr")echo $msg;?></span>
        <li><label for="courriel" style="float:left;">Courriel de l'administrateur:</label><input class="entreeTexteNouvChambre" id="courriel" name="courriel" type="email"/></li>
        <span style="color:black;font-weight: bold;"><?php if($msgCode=="courrielErr")echo $msg;?></span>


    </ul>





    <input type="submit" value="Ajouter" />
    <a style="float:left;margin-top: 10px;" href='Reservations'>Retour à l'accueil</a>
    <br>
    </p>
</form>
<div class="partie">
    <h2>Liste des chambres:</h2>
    <table class="listeEnregistrement" align="center">
        <tr >

            <th>Effacer</th>
            <th>Numéro</th>

            <th>Nombre de lits</th>
            <th>Type de chambre</th>
        </tr>
        <?php foreach ($chambresTab as $ligne) {
            ?>
            <tr>

                <td><a onclick="afficher(<?=$ligne['numeroChambre']?>)">[effacer]</a></td>
                <td><?=$ligne['numeroChambre']?></td>
                <td><?=$ligne['nombreLits']?></td>
                <td><?=$ligne['typeChambre_fk']?></td>
            </tr>
            <?php
        }

        ?>
    </table>
</div>
<style>




</style>

<div id="alerteSuppression" class="modal">


    <div class="modal-content" style="background-color: var(--couleurGris);">

        <h3>Êtes-vous certain de vouloir supprimer cette chambre?</h3>
        <h4>La suppression d'une chambre peut causer des problèmes comme la suppression des réservations associées à cette chambre.</h4>
        <a id="ouiSupprimerBouton"style="margin:15px; font-size: 28px;">Oui</a>
        <a style="margin:15px; font-size: 28px;" onclick="masquer()">Non</a>
    </div>

</div>

<script>
    var modal = document.getElementById("alerteSuppression");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    function afficher(noChambre) {
        modal.style.display = "block";
        $('#ouiSupprimerBouton').attr('href', 'chambres/supprimer/'+noChambre);
    }
    function masquer() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>




