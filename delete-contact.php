<?php require_once('database.php'); ?>
<html>
<head>
<meta charset="utf-8">
<title>Smazání kontaktu</title>
</head>

<body>
	<?php
	//mazání kontaktu + kontrola jestli to fungovalo
	if(db_delete(urldecode($_GET['id'])) == "worked"){
		echo 'Kontakt byl úspěšně smazán!';
	}else{
		echo 'Někde se stala chyba!';
	}
	?>
	<br><br>
		<!-- odkaz na hlavní stránku -->
<a href="index.php">Zpět na hlavní stránku</a>
</body>
</html>
