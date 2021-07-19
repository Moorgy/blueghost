<?php require_once('database.php') ?>

<html>
<head>
<link rel="stylesheet" href="css.css">	
<meta charset="utf-8">
<title><?php echo urldecode($_GET['jmeno']); ?></title>
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Jméno</th>
			<th>Telefoní číslo</th>
			<th>Email</th>
			<th>Poznámka</th>
		</tr>
	<?php
		$id = $_GET['id'];
		
		//vypsání upravovaného kontaktu
	db_select(urldecode($_GET['id']));
	?>
	</table>
	<br><br><br>
	
	<!-- form na úpravu kontaktu -->
	<form action="edit-contact.php?id=<?php echo $id; ?>" method="post">
		Jméno a příjmení: <input type='text' placeholder="Petr Novák" name="jmeno"><br>
		Telefoní číslo: <input type='tel' placeholder="+420123456789" name="telefon"><br>
		Email: <input type='email' placeholder="email@doména.cz" name='email'><br>
		Poznámka: <textarea placeholder="Tento člověk je problémový." cols="30" rows="3" name="poznamka"></textarea><br>
		<input type="submit" value="Upravit kontakt">
	</form>
	
	<!-- mazání kontaktu -->
	<form action="delete-contact.php?id=<?php echo $id; ?>" method="post"><input type='submit' value='Smazat kontakt'></form>
	
	<br><br>
	
	<!-- odkaz na hlavní stránku -->
<a href="index.php">Zpět na hlavní stránku</a>
</body>
</html>
