<?php require_once('database.php'); ?>
<html>
<head>
<meta charset="utf-8">
<title>Editace kontaktu</title>
</head>
<body>
<?php
	//zpracování editace kontaků, všechny upravené informace co nejsou prázdné se hodí do arraye a pošlou do metody úpravy
	
	$fields = array();
	
	if($_POST['jmeno'] != ""){
		$fields['jmeno'] = $_POST['jmeno'];
	}
	
	if($_POST['telefon'] != ""){
		$fields['telefon'] = $_POST['telefon'];
	}
	
	if($_POST['email'] != ""){
		$fields['email'] = $_POST['email'];
	}
	
	if($_POST['poznamka'] != ""){
		$fields['poznamka'] = $_POST['poznamka'];
	}
	
	
	//kontrola jestli úprava proběhla
	if(db_edit(urldecode($_GET['id']), $fields) == "worked"){
		echo'Kontakt byl úspěšně upraven!';
	}else{
		echo'Někde se stala chyba!';
	}
?>
	<br><br>
	<!-- odkaz na hlavní stránku -->
	<a href="index.php">Zpět na hlavní stránku</a>
</body>
</html>
