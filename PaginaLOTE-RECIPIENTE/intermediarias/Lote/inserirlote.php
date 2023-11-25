<?php

require '../../../con.php';


// recebendo as variaveis atraves do post, sei que mandei para ca por causa da action do form, depois do post a gente bota o name do campo, ent tem q estar certo
$muda = $_POST['muda'];
$substrato = $_POST['substrato'];
$dataPlantio = $_POST['dataPlantio'];
$dataColheita = $_POST['dataColheita'];
$quantidade = $_POST['quantidade'];

//inserindo os dados do form na tabela
$query = "INSERT INTO lote (muda, substrato, dataPlantio, dataColheita, quantidade) VALUES ( '$muda', '$substrato', '$dataPlantio', '$dataColheita', '$quantidade')";

if ($mysqli->query($query) === TRUE) {
    echo "Dados inseridos com sucesso!";
    header('Location: http://localhost/ControledeMudas/PaginaLOTE-RECIPIENTE/intermediarias/Lote/Pagina-Lote.php');
} else {
    echo "Erro na inserção: " . $mysqli->error;
}

$mysqli->close();
?>