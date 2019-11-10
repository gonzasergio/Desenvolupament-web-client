<?php
include 'BBDD.php';
$result = select('localhost', 'root', '', 'excursionistas', 'nivells');
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
?>