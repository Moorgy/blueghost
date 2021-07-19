<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">	
<title>Přidat Kontakt</title>
</head>

<body>

<?php
require_once('database.php');

	//zpracování formu přidávání kontaktů + kontrola jestli to fungovalo
if(db_insert($_POST['jmeno'], $_POST['telefon'], $_POST['email'], $_POST['poznamka']) == "worked"){
	echo'Byl přidán nový kontakt!';
}else{
	echo'Kontakt se nepodařilo přidat!';
}
?>

<br><br>
	<!-- odkaz na hlavní stránku -->
<a href="index.php">Zpět na hlavní stránku</a>
	
	</body>
</html>