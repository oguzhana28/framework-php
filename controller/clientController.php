<?php 
include_once('../model/ClientModel.php');

function index($message = ''){
    render("clients/index",array('clients' => getAllClients(), 'message' => $message));
}

function edit() {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            editClient($id);
        }
    }
    var_dump($id);
    render("clients/edit", array(
        'client' => getClient($id)
    ));
}
function create() {
    render("clients/create");
}

function createSave() {
    $result = createClient();
    // redirect met status message (gelukt of foutgegaan)
    if ($result == "") {
        index("Nieuwe client is opgeslagen");
    } else {
        index("Nieuwe client kon niet worden opgeslagen. Foutbericht: " . $result);
    }
}

function delete()
{
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            var_dump($id);
            getClient($id);
        }
	if (deleteClient($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

    render("clients/delete");
	header("Location:" . URL . "patient/index");
}
?>