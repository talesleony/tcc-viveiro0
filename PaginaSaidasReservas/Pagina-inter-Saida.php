<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Minha Página</title>
<link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
<link rel="stylesheet" href="Pagina-inter.css">
<style>
    a:-webkit-any-link {
        color: white;
        font-family: Arial, sans-serif;
        font-family: 'lalezar', sans-serif;
    }
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 0;
        padding: 0;
        overflow: hidden;
        font-family: 'lalezar', sans-serif;
        background-color: transparent;
        color: rgb(0, 0, 0); /* Define a cor do texto como preto */
        text-decoration-color: black;
    }

    .navbar {
        margin-bottom: 80px;
    }

    .navbar .nav-button {
        text-decoration: none;
        color: black;
    }

    .flexible-button {
        font-size: 40px;
        text-decoration: none;
    }


</style>
</head>
<body>
<nav class="navbar">
      <div class="nav-buttons">
          
          <a href="Pagina-inter-Desti.php" class="nav-button" >Destinatário</a>
          
          <div class="ocupacidade">
          <a href="Pagina-inter-Saida.php" class="nav-button">Saida</a>
          </div>

          <a href="Pagina-inter-reser.php" class="nav-button">Reserva</a>
          
      </div>
    </nav>
    
    <div class="flex-container">
      <div class="left-column">
        <div class="content">
          <a href="Muda/muda.php" class="flexible-button">Novo Registro</a>
        </div>
      </div>
      <div class="right-column">
        <a href="link4.php" class="flexible-button">Filtrar Dados </a>
      </div>
    </div>
</body>
</html>
