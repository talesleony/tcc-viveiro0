<?php 
require '../../con.php';

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Execute a query DELETE no banco de dados para excluir o registro com o ID fornecido
  $delete_query = "DELETE FROM muda WHERE id_muda = $id"; // Substitua 'id_muda' pelo nome correto da coluna
  
  if ($mysqli->query($delete_query)) {
    echo "Registro deletado com sucesso!";
  } else {
    echo "Erro ao deletar registro: " . $mysqli->error;
  }
} else {
  echo "ID não foi fornecido para exclusão.";
}
?>
