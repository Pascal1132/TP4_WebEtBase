<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$titre?></title>
    <base href="<?= $racineWeb ?>" >
	<link rel="stylesheet" type="text/css" href="Contenu/css/style.css">
	 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	 <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
     <script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="Contenu/js/autocompletionTypeChambre.js"></script>
	
</head>
<body>
	<h1 id="titreGestion">Gestion de l'hôtel</h1>
	<?=$contenu?>
	<a href="Apropos" class="bouton">À propos</a><a href="tests.php" class="bouton">Tests</a>
</body>
</html>