<?php include 'con.php'?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout com Divisão Vertical da Página</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Pagina Inicial.css"> 
    <link rel="stylesheet" href="Responsividade.css"><!-- nao existe um arquivo chamado responsividade -->
</head>
<body>
    <div class="top-image">
        <div class="half-circle">
            <div class="center-image"></div>
        </div>
    </div>
    <div class="logo-text">
        Sistema de Gerenciamento do Viveiro de Mudas
    </div>
    <a href="PaginaLOTE-RECIPIENTE/intermediarias/Pagina-inter-Lote.php" class="page-divider">
        <div class="ball-image ball-image-1"></div>
    </a>
    <a href="PaginaSaidasReservas/Pagina-inter-Desti.php" class="page-divider">
        <div class="ball-image ball-image-2"></div>
    </a>
    <a href="PaginaMudas-Substrato/Pagina-inter-Mudas.php" class="page-divider">
        <div class="ball-image ball-image-3"></div>
    </a>
</body>
</html>
