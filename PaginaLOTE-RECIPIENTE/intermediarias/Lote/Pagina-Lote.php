
<?php require '../../../con.php'?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Minha Página</title>
<link rel="stylesheet" href="Pagina-Lote.css">
</head>
<style>
 
</style>
<body>
  <nav class="navbar">
    <div class="nav-buttons">
      <div class="ocupacidade">
        <button class="nav-button">LOTE</button>
      </div>
    </div>
  </nav>

  <div class="flex-container">
    <div class="left-column">
      <div class="content">
      <form method="post" action="inserirlote.php">
        
        <div class="editable-boxes">
          <div class="reci">
          <select id="muda" name="muda">
            <option value="" disabled selected>muda</option>

            <?php

$result = $mysqli->query("SELECT nomemuda FROM muda");

if ($result) {
    while ($nome = $result->fetch_object()) {
        echo '<option value="' . $nome->nomemuda . '">' . $nome->nomemuda . '</option>';
    }

    $result->close(); 
}
?>          
            
          </select>
          <select id="substrato" name="substrato">
            <option value="" disabled selected>substrato</option>
            <option value="homus">homus</option>
          </select>
          </div>
          <div class="filter-box">
            <select class="reci" id="recipiente" name="recipiente">
              <option value="">Selecione um Recipiente</option>
              <option value="Saquinho">Saquinho</option>
              <option value="Bandeija">Bandeja</option>
              <option value="Tubete P">Tubete Pequeno</option>
              <option value="Tubete M">Tubete Médio</option>
              <option value="Tubete G">Tubete Grande</option>
            </select>
          </div>
          <label for="dataPlantio" class="Label">Data Plantio:</label>
          <input type="date" id="dataPlantio" name="dataPlantio"class="editable-box" placeholder="Data do Plantio">
          <label for="DataFinaliza" class="Label">Data Finalização:</label>
          <input type="date" name="dataColheita" id="dataColheita"class="editable-box" placeholder="Data Colheita">
          <input type="number" name="quantidade" id="quantidade" class="editable-box" placeholder="Quantidade">
        </div>
        
        <div class="left-column">
          <div class="button-container">
              <button type="submit"class="submit-button">Enviar</button>
              <button class="clear-button">Limpar</button>
          </div>
      </div>
      </form>
      </div>
    </div>
    <div class="right-column"> 
    <div class="right-column">
      <div class="square">

      <?php 
        $query = "SELECT id_lote, muda, substrato, dataPlantio FROM lote";
        $result = $mysqli->query($query);
        
        if ($result && $result->num_rows > 0) {
            echo '<div class="resultado-container">';
            foreach ($result as $row) {
               
                $linha_formatada = 'Lote: ' . $row['id_lote'] . ' - ' . $row['muda'] . ' - SUBS :' . $row['substrato'] . ' - PLAN' . $row['dataPlantio'];
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
