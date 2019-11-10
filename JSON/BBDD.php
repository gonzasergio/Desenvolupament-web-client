<?php
function select($host, $user, $pass, $bbdd, $tabla){
    $conn = new mysqli($host, $user, $pass, $bbdd);
    $stmt = $conn->prepare("SELECT * FROM $tabla");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
?>