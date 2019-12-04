<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "excursionistas");
$stmt = $conn->prepare("delete from excursionista where id =".$_REQUEST['id']);
$stmt->execute();
$stmt = $conn->prepare('insert into excursionista(id, nom, email, edat, nivell)
values('.$_REQUEST['id'].', "'.$_REQUEST['nom'].'", "'.$_REQUEST['email'].'", '.$_REQUEST['edat'].', '.$_REQUEST['nivell'].')');
$stmt->execute();

header('Location: datatable.php');