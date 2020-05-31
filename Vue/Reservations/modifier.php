<?php $this->titre = 'Modification'; ?>


<h3 style="color:var(--couleurOrange);font-weight: bold;"><?php if($msgCode!=="dateErr" && $msgCode!=="chambreErr" && $msgCode !=="utilisateurErr")echo $this->nettoyer($msg);?></h3>
<form action="Reservations/miseAJour" method="post" class="formulaire" id="formulaireReservation">
    <h2>Modifier une réservation</h2>
    <fieldset>
        <legend>Dates de réservation</legend>

        <label for="dateArrivee" class="align-left">Arrivée : </label>
        <input type="date" name="dateArrivee" id="dateArrivee" required class="align-right" value="<?=$this->nettoyer($resultat['dateArrivee']);?>" />
        <label for="dateDepart" class="align-left">Départ : </label>
        <input type="date" name="dateDepart" id="dateDepart" required class="align-right" value="<?=$this->nettoyer($resultat['dateDepart']);?>"/>
        <span style="color:black;font-weight: bold;"><?php if($msgCode=="dateErr")echo $this->nettoyer($msg);?></span>
    </fieldset>
    <br>
    <fieldset>
        <legend>Informations</legend>
        <ul class="field-style">
            <li><label for="numeroChambre" class="align-left">Numéro de la chambre</label>
                <select name="chambre" form="formulaireReservation" class="align-right select-style" value="<?=$this->nettoyer($resultat['dateDepart']);?>">
                    <option value="<?=$this->nettoyer($resultat['numeroChambre'])?>" selected hidden><?=$this->nettoyer($resultat['numeroChambre'])."   (".$this->nettoyer($resultat['typeChambre_fk']).")"?></option>
                    <?php foreach($chambresTab as $ligne){?>
                        <option value="<?=$this->nettoyer($ligne['numeroChambre']);?>"><?=$this->nettoyer($ligne['numeroChambre']);?>   (<?=$this->nettoyer($ligne["typeChambre_fk"]);?>)</option>
                    <?php }?>
                </select></li>
            <li><label for="utilisateur" class="align-left">Nom de l'utilisateur</label>
                <select name="utilisateur" form="formulaireReservation" class="align-right select-style">
                    <option value="<?=$this->nettoyer($resultat['numeroUtilisateur'])?>" selected hidden><?=$this->nettoyer($resultat['nomUtilisateur'])?></option>
                    <?php foreach($utilisateursTab as $ligne){?>
                        <option value="<?=$this->nettoyer($ligne['numeroUtilisateur']);?>"><?=$this->nettoyer($ligne['nomUtilisateur']);?></option>
                    <?php }?>
                </select></li>
        </ul>
    </fieldset>
    <br>
    <input type="submit" value="Modifier" />
    <a style="float:left;margin-top:10px;" href="index.php">Retourner à l'accueil</a>
    <input type="hidden" name="id" value="<?=$this->nettoyer($id);?>">
    <br>
    </p>
</form>
