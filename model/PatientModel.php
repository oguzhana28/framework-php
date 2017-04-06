<?php
function getPatient($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patient WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllPatients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM patient";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}
function getAllOwners(){
    	$db = openDatabaseConnection();

	$sql = "SELECT * FROM client";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}
function getAllSpecies(){
    	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;

	return $query->fetchAll();
}

    
function createPatient(){
    $db = openDatabaseConnection();
    
    $name = isset($_POST['name']) ? $_POST['name'] : null;
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$status = isset($_POST['status']) ? $_POST['status'] : null;
    $owner = isset($_POST['owner']) ? $_POST['owner'] : null;
	
	if (strlen($name) == 0 || strlen($species) == 0 || strlen($status) == 0|| strlen($owner) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO patient(name, species, status, owner) VALUES (:name, :species, :status, :owner)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':species' => $species,
		':status' => $status,
        ':owner' => $owner
    ));

	$db = null;
    
    return true;
}
function deletePatient($id){
    	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM patient WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	header("Location:" . URL . "patient/index");
}
function editPatient(){
    $db = openDatabaseConnection();
    
    $name = isset($_POST['name']) ? $_POST['name'] : null;
	$species = isset($_POST['species']) ? $_POST['species'] : null;
	$status = isset($_POST['status']) ? $_POST['status'] : null;
	
	if (strlen($name) == 0 || strlen($species) == 0 || strlen($status) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE patient SET name = :name, species = :species, status = :status WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':species' => $species,
		':status' => $status,
        ':id' => $id));

	$db = null;
	
    header("Location:" . URL . "patient/index");
}
?>