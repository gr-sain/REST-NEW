<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

include "config.php";

if(isset($data['id'])&& isset($data['name']) && !empty($data['id']) && !empty($data['name'])){
    $id = $data['id'];
    $name = $data['name'];
    $sql = "UPDATE name SET name = '{$name}' WHERE id = {$id}";

    if(mysqli_query($conn, $sql)){
        echo json_encode(array('message' => 'Updated successfully Your Data.', 'status' => true));
    } else {
        echo json_encode(array('message' => 'Updated UnsuccessfullyYour Data.', 'status' => false));
    }
} else {
    echo json_encode(array('message' => 'No name provided in JSON.', 'status' => false)); 
}
?>