<?php
function getSpecie($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllSpecies() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}
function createSpecie(){
    $db = openDatabaseConnection();
    
    $Specie = isset($_POST['Specie']) ? $_POST['Specie'] : '';
	
    if (strlen($Specie) == 0) {
		return false;
	}
	
	$sql = "INSERT INTO species(Specie) VALUES (:Specie)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':Specie' => $Specie));
    // todo: add error handling
    
    if($query->errorCode() == 0) {
        $db = null;
        return "";
    } else {
        $errors = $query->errorInfo();
        return "fout tijdens uitvoeren query: " . $errors[2];
    }
    
	
}
function deleteSpecie($id){
    if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM species WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	header("Location:" . URL . "specie/index");
}
function editSpecie($id){
    if (!$id) {
		return false;
	}
    
    $db = openDatabaseConnection();
    
 $Specie = isset($_POST['Specie']) ? $_POST['Specie'] : '';
	
if (strlen(Specie) == 0) {
		return "niet alle velden zijn correct ingevuld";
	}
    
    if($Specie){
	   $sql = "UPDATE species SET Specie=:Specie WHERE id=:id";
	   $query = $db->prepare($sql);
	   $query->execute(array(
		  ':Specie' => $Specie,
          ':id' => $id));
    
	   $db = null;
        header("Location:" . URL . "specie/index");
    }
}
?>