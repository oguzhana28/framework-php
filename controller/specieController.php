<?php 
include_once('../model/SpecieModel.php');

function index($message = ''){
    render("species/index",array('species' => getAllSpecies(), 'message' => $message));
}

function edit() {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            editSpecie($id);
        }
    }
    var_dump($id);
    render("species/edit", array(
        'specie' => getSpecie($id)
    ));
}
function create() {
    render("species/create");
}

function createSave() {
    $result = createSpecie();
    // redirect met status message (gelukt of foutgegaan)
    if ($result == "") {
        index("Nieuwe specie is opgeslagen");
    } else {
        index("Nieuwe specie kon niet worden opgeslagen. Foutbericht: " . $result);
    }
}

function delete()
{
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            var_dump($id);
            getSpecie($id);
        }
	if (deleteSpecie($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

    render("species/delete");
	header("Location:" . URL . "specie/index");
}
?>