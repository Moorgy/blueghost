<?php
require_once('database.php');
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">	
<title>Blue Ghost</title>
</head>

<body>
	<h1>HLAVNÍ STRÁNKA</h1>
	<br><br>
	<!-- Tabulka kontaktů -->
	<table>
		<tr>
			<th>ID</th>
			<th>Jméno</th>
			<th>Telefoní číslo</th>
			<th>Email</th>
			<th>Poznámka</th>
			<th>#############</th>
		</tr>
		<?php
		//Vypsání všech kontaktů do tabulky
		db_select_all();
		?>
	</table>
	<br><br>
	
	<!-- form na přidávání kontaktů -->
	<form action="add-contact.php" method="post">
		Jméno a příjmení: <input type='text' placeholder="Petr Novák" name="jmeno" required><br>
		Telefoní číslo: <input type='tel' placeholder="+420123456789" name="telefon" required><br>
		Email: <input type='email' placeholder="email@doména.cz" name='email' required><br>
		<p>Poznámka: <textarea placeholder="Tento člověk má rád jahodovou zmrzlinu." cols="30" rows="3" name="poznamka"></textarea></p><br>
		<input type="submit" value="Přidat kontakt">
	</form>
</body>
</html>
