<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

include "config.php";

if(isset($data['name']) && !empty($data['name'])){
    $name = $data['name'];
    $sql = "INSERT INTO name (name) VALUES ('{$name}')";

    if(mysqli_query($conn, $sql)){
        echo json_encode(array('message' => 'Add Record Successfully.', 'status' => true));
    } else {
        echo json_encode(array('message' => 'Add Record Unsuccessfully.', 'status' => false));
    }
} else {
    echo json_encode(array('message' => 'No name provided in JSON.', 'status' => false)); 
}
?>
