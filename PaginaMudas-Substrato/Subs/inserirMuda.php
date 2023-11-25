<?php 
require '../../con.php';

$nomemuda=$_POST['muda'];
$tempProd=$_POST['temp'];

$mysqli->query("INSERT INTO muda (nomemuda, tempProd) VALUES ('$nomemuda', '$tempProd')");

header("Location: http://localhost/ControledeMudas/PaginaMudas-Substrato/Muda/muda.php");
