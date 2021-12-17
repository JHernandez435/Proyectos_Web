<?php
include_once "dbConnection.php";

$userName = $_POST['userName'];
$email = $_POST['email'];
$pass = hash("sha256" , $_POST['pass']);

$sql = "SELECT userName from usuarios WHERE userName = '$userName'";
$result = $pdo->query($sql);

if($result->rowCount() > 0)
{
    $data = array('done' => false , 'message' => "Error nombre de usuario ya existe");
    Header('Content Type: application/json');
    exit();
}else{

$sql = "SELECT email from usuarios WHERE email = '$email'";
$result = $pdo->query($sql);

    if($result->rowCount() > 0)
    {
        $data = array('done' => false , 'message' => "Error nombre de email ya existe");
        Header('Content Type: application/json');
        exit();
    }else{
        $sql = "INSERT INTO usuarios SET userName = '$userName' , email = '$email' , password = '$password'";
        $pdo->query($sql);

        $data = array('done' => false , 'message' => "Usuario nuevo creado");
        Header('Content Type: application/json');
        echo json_encode($data);
        exit();
    }
}























































































































