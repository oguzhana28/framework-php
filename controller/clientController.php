<?php 
include_once('../model/ClientModel.php');
// het renderen van alle clienten en  een message meegeven of het gelukt is of niet
function index($message = ''){
    render("clients/index",array('clients' => getAllClients(), 'message' => $message));
}
//edit functie voor de clienten
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
// create pagina laden
function create() {
    render("clients/create");
}
// een aparte functie om het op te slaan via een andere funtie in deze functie wor dde message gevult
function createSave() {
    $result = createClient();
    // redirect met status message (gelukt of foutgegaan)
    if ($result == "") {
        index("Nieuwe client is opgeslagen");
    } else {
        index("Nieuwe client kon niet worden opgeslagen. Foutbericht: " . $result);
    }
}
// het delete functie, doormiddel van het id.
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