<?php
// een functie om 1 client op te halen met een id.
function getClient($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM client WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}
// alle clienten ophalen en het op te laden
function getAllClients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM client";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}
// een functie om clienten te crearen
function createClient(){
    $db = openDatabaseConnection();
    
    $Firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : '';
	$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : '';
	$Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : '';
	
    if (strlen($Firstname) == 0 || strlen($Lastname) == 0) {
		return "niet alle velden zijn correct ingevuld";
	}
	
	$sql = "INSERT INTO client(Firstname, prefix, Lastname) VALUES (:Firstname, :prefix, :Lastname)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':Firstname' => $Firstname,
		':prefix' => $prefix,
		':Lastname' => $Lastname));
    // todo: add error handling
    
    if($query->errorCode() == 0) {
        $db = null;
        return "";
    } else {
        $errors = $query->errorInfo();
        return "fout tijdens uitvoeren query: " . $errors[2];
    }
    
	
}
// een functie om clienten te verwijden met het id die er meegegeven word
function deleteClient($id){
    if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM client WHERE id=:id "; 
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	header("Location:" . URL . "client/index");
}
// het aanpassen van de gegevens van een cluente
function editClient($id){
    if (!$id) {
		return false;
	}
    
    $db = openDatabaseConnection();
    
    $Firstname = $_POST['Firstname'];
	$prefix = $_POST['prefix'];
	$Lastname = $_POST['Lastname'];
	
    
    if($Firstname && $Lastname){
	   $sql = "UPDATE client SET Firstname=:Firstname, prefix=:prefix, Lastname=:Lastname WHERE id=:id";
	   $query = $db->prepare($sql);
	   $query->execute(array(
		  ':Firstname' => $Firstname,
		  ':prefix' => $prefix,
		  ':Lastname' => $Lastname,
          ':id' => $id));
    
	   $db = null;
        header("Location:" . URL . "client/index");
    }
}
?>