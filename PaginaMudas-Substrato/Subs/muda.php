<?php require'../../con.php'?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Minha Página</title>
<link rel="stylesheet" href="muda.css">
</head>
<body>
  <nav class="navbar">
    <div class="nav-buttons">
      <div class="ocupacidade">
        <button class="nav-button">Muda</button>
      </div>
      
    </div>
  </nav>

  

  <div class="flex-container">
    <div class="left-column">
      <div class="content">
        <div class="editable-boxes">
          <form action="inserirMuda.php" method="post">
          <input type="text" class="editable-box" name="muda" placeholder="Nome Muda">
          <input type="text" class="editable-box" name="temp" placeholder="Tempo de produção">
        </div>
        
        <div class="left-column">
          <div class="button-container">
              <button class="submit-button" type="submit">Enviar</button>
              <button class="clear-button">Limpar</button>
          </div>
          </form>
      </div>
      </div>
    </div>
    <div class="right-column"> 
    <div class="right-column">
      <div class="square">
      <?php 
        $query = "SELECT nomemuda, tempProd FROM muda";
        $result = $mysqli->query($query);
        
        if ($result && $result->num_rows > 0) {
            echo '<div class="resultado-container">';
            foreach ($result as $row) {
               
                $linha_formatada = 'Muda: ' . $row['nomemuda'] . ' - Tempo de Producao: ' . $row['tempProd'].' dias';
                echo '<div class="resultado-item">' . $linha_formatada . '</div>';
            }
            echo '</div>';
        } else {
            echo 'Nenhum resultado encontrado.';
        }
      ?>
      </div> 
    </div>
    </div>
</div>

</body>
</html>
