<?php
$conn = new mysqli("localhost", "root", "", "excursionistas");
$stmt = $conn->prepare("delete from excursionista where id =".$_REQUEST['id']);
$stmt->execute();

header('Location: datatable.php');