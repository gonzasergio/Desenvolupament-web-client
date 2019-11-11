<?php
function select($host, $user, $pass, $bbdd, $tabla){
    $conn = new mysqli($host, $user, $pass, $bbdd);
    $stmt = $conn->prepare("SELECT * FROM $tabla");
    if(isset($_REQUEST['nivell'])){
        $stmt = $conn->prepare("SELECT * FROM $tabla WHERE nivell=".$_REQUEST['nivell']);
    }
    if(isset($_REQUEST['email'])){
        $stmt = $conn->prepare("SELECT * FROM $tabla WHERE email=".$_REQUEST['email']);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
?>