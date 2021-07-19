<?php
//připojení k databázi
$connect = new mysqli('localhost', 'root', '', 'blueghost');

//kontrola připojení
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

//zapisování do databáze
function db_insert($name, $tel, $email, $description){
	global $connect;	

	$sql = $connect->prepare('INSERT INTO kontakty (jmeno, telefon, email, poznamka) VALUES (?,?,?,?)');
	$sql->bind_param('ssss', $name, $tel, $email, $description);
	$sql->execute();
	
	return 'worked';
	}

//vypsání všech kontaktů z databáze do tabulky
function db_select_all(){
	global $connect;
	
	$sql = 'SELECT * FROM kontakty';
	$result = $connect->query($sql);
	
	if($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
        echo '<tr><td>'.$row['id'].'</td><td>'.$row['jmeno'].'</td><td>'.$row['telefon'].'</td><td>'.$row['email'].'</td><td>'.$row['poznamka'].'</td><td><a href="identifikator-kontaktu.php?jmeno='.urlencode($row['jmeno']).'&id='.urlencode($row['id']).'">Editovat kontakt</a></td><tr>';
  }
    }else{
	    echo 'Nejsou zapsány žádné kontakty';
}
}

//vypsání určitého kontaktu do tabulky
function db_select($id){
	global $connect;
	
	$sql = 'SELECT * FROM kontakty WHERE id='.$id;
	$result = $connect->query($sql);
	
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
        echo '<tr><td>'.$row['id'].'</td><td>'.$row['jmeno'].'</td><td>'.$row['telefon'].'</td><td>'.$row['email'].'</td><td>'.$row['poznamka'].'</td><tr>';
    }else{
	    echo 'Kontakt s tímto ID neexistuje';
}
}

//úprava/editace kontaktu
function db_edit($id, $fields){
	global $connect;
	$toEdit = array();
	$values = array();
	$bindParam = "";
	
    //kontrola toho, které atributy se musí aktualizovat
	if(array_key_exists('jmeno', $fields)){
		array_push($toEdit, "jmeno");
		$bindParam .= "s";
		array_push($values, $fields['jmeno']);
	}
	
	if(array_key_exists('telefon', $fields)){
		array_push($toEdit, "telefon");
		$bindParam .= "s";
		array_push($values, $fields['telefon']);
	}
	
	if(array_key_exists('email', $fields)){
		array_push($toEdit, "email");
		$bindParam .= "s";
		array_push($values, $fields['email']);
	}
	
	if(array_key_exists('poznamka', $fields)){
		array_push($toEdit, "poznamka");
		$bindParam .= "s";
		array_push($values, $fields['poznamka']);
	}	
	
	$bindParam .= 'i';
	array_push($values, $id);
	$stmt = 'UPDATE kontakty SET ';
	
	for($i = 0; $i<count($toEdit); $i++){
		$stmt .= $toEdit[$i] . '=?, ';
	}
	$stmt = rtrim($stmt, ', ');
	$stmt .= ' WHERE id=?';
	
	$sql = $connect->prepare($stmt);
	$sql->bind_param($bindParam, ...$values);
	$sql->execute();
	
		return 'worked';
}

//mazání kontaktu z databáze
function db_delete($id){
	global $connect;
	
	$sql = $connect->prepare('DELETE FROM kontakty WHERE id=?');
	$sql->bind_param('i', $id);
	$sql->execute();
	
		return 'worked';
}
?>
