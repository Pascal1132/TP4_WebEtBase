<?php $titre = 'Modification'; ?>


<h3 style="color:var(--couleurOrange);font-weight: bold;"><?php if($msgCode!=="dateErr" && $msgCode!=="chambreErr" && $msgCode !=="utilisateurErr")echo $msg;?></h3>
<form action="Apropos/index.php?action=miseAJourReservation" method="post" class="formulaire" id="formulaireReservation">
		<h2>Modifier une réservation</h2>
		<fieldset>
			<legend>Dates de réservation</legend>
			
			<label for="dateArrivee" class="align-left">Arrivée : </label>
			<input type="date" name="dateArrivee" id="dateArrivee" required class="align-right" value="<?=$resultat['dateArrivee']?>" />
			<label for="dateDepart" class="align-left">Départ : </label>
			<input type="date" name="dateDepart" id="dateDepart" required class="align-right" value="<?=$resultat['dateDepart']?>"/>
			<span style="color:black;font-weight: bold;"><?php if($msgCode=="dateErr")echo $msg;?></span>
		</fieldset>
		<br>
		<fieldset>
			<legend>Informations</legend>
			<ul class="field-style">
				<li><label for="numeroChambre" class="align-left">Numéro de la chambre</label>
					<select name="chambre" form="formulaireReservation" class="align-right select-style" value="<?=$resultat['dateDepart']?>">
					<option value="<?=$resultat['numeroChambre']?>" selected hidden><?=$resultat['numeroChambre']."   (".$resultat['typeChambre_fk'].")"?></option>
				<?php foreach($chambresTab as $ligne){?>
					<option value="<?=$ligne['numeroChambre'];?>"><?=$ligne['numeroChambre'];?>   (<?=$ligne["typeChambre_fk"];?>)</option>
				<?php }?>
				</select></li>
				<li><label for="utilisateur" class="align-left">Nom de l'utilisateur</label>
					<select name="utilisateur" form="formulaireReservation" class="align-right select-style">
					<option value="<?=$resultat['numeroUtilisateur']?>" selected hidden><?=$resultat['nomUtilisateur']?></option>
				<?php foreach($utilisateursTab as $ligne){?>
					<option value="<?=$ligne['numeroUtilisateur'];?>"><?=$ligne['nomUtilisateur'];?></option>
				<?php }?>
				</select></li>
			</ul>
		</fieldset>
		<br>
		<input type="submit" value="Modifier" />
		<a style="float:left;margin-top:10px;" href="Apropos/index.php">Retourner à l'accueil</a>
		<input type="hidden" name="id" value="<?=$id;?>">
		<br>
	</p>
</form>
