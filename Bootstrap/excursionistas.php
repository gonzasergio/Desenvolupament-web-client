<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "excursionistas");
$stmt = $conn->prepare("SELECT * FROM excursionista");
if(isset($_REQUEST['id'])){
    $stmt = $conn->prepare("SELECT * FROM excursionista WHERE id=".$_REQUEST['id']);
}
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);