<?php
include "../vendor/config.php";
header('Content-type: application/json; charset=UTF-8');

 
if (isset($_POST['id']) && isset($_POST['halaman'])=="quizku") {
    $id = $_POST['id'];
    $query = $mysqli->query("DELETE FROM quiz WHERE id='$id' ");

    $response = array();
    $response["data"] = array();
    if ($query) {
        $response['icon']  = 'success';
        $response['text'] = 'Deleted Successfully';
    } else {
        $response['icon']  = 'error';
        $response['text'] = 'Something went wrong!';
    }
    
    
    echo json_encode($response);
}