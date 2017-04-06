<?php 
include_once('../model/PatientModel.php');
function index(){
    render("patients/index",array('patients' => getAllPatients()));
    
};

function edit() {
     if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        editPatient();
    }
    render("patients/edit", array(
        'patient' => getPatient($id)
    ));
}

function create() {
    render("patients/create", array('owners' => getAllOwners()), array('species' => getAllSpecies()));
}

function createSave() {
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        createPatient();
        var_dump($_POST);
    }
     header("Location:" . URL . "patient/index");
}

function delete()
{
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        var_dump($id);
        getPatient($id);
    }
	if (deletePatient($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

    render("patient/delete");
	header("Location:" . URL . "student/index");
}
?>