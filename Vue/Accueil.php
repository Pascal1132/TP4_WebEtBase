<?php $titre = 'Accueil'; ?>

	<h3 style="color:var(--couleurOrange);font-weight: bold;"><?php if($msgCode!=="dateErr" && $msgCode!=="chambreErr" && $msgCode !=="utilisateurErr")echo $message;?></h3>
	<form action="Apropos/index.php?action=nouvelleReservation" method="post" class="formulaire" id="formulaireReservation">
		<h2>Nouvelle réservation</h2>
		<fieldset>
			<legend>Dates de réservation</legend>
			<label for="dateArrivee" class="align-left">Arrivée : </label>
			<input type="date" name="dateArrivee" id="dateArrivee" required class="align-right" />
			<label for="dateDepart" class="align-left">Départ : </label>
			<input type="date" name="dateDepart" id="dateDepart" required class="align-right" />
			<span style="color:black;font-weight: bold;"><?php if($msgCode=="dateErr")echo $msg;?></span>
		</fieldset>
		<br>
		<fieldset>
			<legend>Informations</legend>

			<ul class="field-style">

				<li><label for="numeroChambre" class="align-left">Numéro de la chambre</label>
					<select name="chambre" form="formulaireReservation" class="align-right select-style">
					<option value="" selected disabled hidden>Choisir</option>
				<?php foreach($chambresTab as $ligne){?>
					<option value="<?=$ligne['numeroChambre'];?>"><?=$ligne['numeroChambre'];?>   (<?=$ligne["typeChambre_fk"];?>)</option>
				<?php }?>

				</select></li>
				<span style="color:black;font-weight: bold;"><?php if($msgCode=="chambreErr")echo $message;?></span>
				<li><label for="villeUtilisateur" class="align-left">Nom de l'utilisateur</label>
					<select name="utilisateur" form="formulaireReservation" class="align-right select-style">
					<option value="" selected disabled hidden>Choisir</option>
				<?php foreach($utilisateursTab as $ligne){?>
					<option value="<?=$ligne['numeroUtilisateur'];?>"><?=$ligne['nomUtilisateur'];?></option>
				<?php }?>

				</select></li>
				<span style="color:black;font-weight: bold;"><?php if($msgCode=="utilisateurErr")echo $message;?></span>
			</ul>
		</fieldset>

		

		
		<input type="submit" value="Ajouter" />
		<a style="float:left;margin-top: 10px;" href='Apropos/index.php?action=nouvelleChambre'>Gérer les chambres</a>
		<br>
	</p>
</form>

<div class="partie">
<h2>Liste des enregistrements dans la table :</h2>
<table class="listeEnregistrement" align="center">
	<tr >
		<th>Modifier</th>
		<th>Supprimer</th>
		<th>Date d'arrivée</th>
		<th>Date de départ</th>
		<th>No. chambre</th>
		<th>Nom de l'utilisateur</th>
	</tr>
	<?php 
		foreach ($reservations as $reservations)
			{
				echo "<tr><td>".'<a href="index.php?action=modifierReservation&id=' . htmlspecialchars($reservations['numeroReservation']) . '">[modifier]</a>' ."</td>" .
						 "<td>".'<a href="index.php?action=confSuppressionReservation&id=' . htmlspecialchars($reservations['numeroReservation']) . '">[supprimer]</a>' ."</td>" .
						 "<td>" . htmlspecialchars($reservations['dateArrivee']) . "</td>".
						 "<td>" . htmlspecialchars($reservations['dateDepart']) . "</td>".
						 "<td>" . htmlspecialchars($reservations['numeroChambre_fk']) . "<i> (".htmlspecialchars($reservations['typeChambre_fk']).")</i></td>".
						 "<td>".htmlspecialchars($reservations['nomUtilisateur'])."</td>
					 </tr>";
			}
	?>
</table>
</div>



</div>
<p></p>

