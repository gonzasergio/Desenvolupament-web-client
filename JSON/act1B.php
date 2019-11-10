<?php
include 'BBDD.php';
$result = select('localhost', 'root', '', 'excursionistas', 'excursionista');
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>