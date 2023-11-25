<?php
// Inclua o arquivo de conexão com o banco de dados
require '../../con.php';

// Verifica se o ID do registro está presente na URL
if (isset($_GET['id'])) {
    $id_muda = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Processamento do formulário enviado via POST
        if (isset($_POST['id_muda'], $_POST['muda'], $_POST['temp'])) {
            $id_muda = $_POST['id_muda'];
            $nomeMuda = $_POST['muda'];
            $tempProd = $_POST['temp'];

            // Atualização dos dados no banco de dados
            $stmt = $mysqli->prepare("UPDATE muda SET nomemuda = ?, tempProd = ? WHERE id_muda = ?");
            $stmt->bind_param("sii", $nomeMuda, $tempProd, $id_muda);

            if ($stmt->execute()) {
                // Redirecionamento para a página muda.php após salvar as alterações
                header("Location: muda.php");
                exit();
            } else {
                echo "Erro ao atualizar o registro: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Dados incompletos.";
        }
    } else {
        // Consulta para selecionar o registro específico com base no ID
        $query = "SELECT id_muda, nomemuda, tempProd FROM muda WHERE id_muda = $id_muda";
        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            // Recupera os detalhes do registro
            $row = $result->fetch_assoc();
            $nomeMuda = $row['nomemuda'];
            $tempProd = $row['tempProd'];
        } else {
            // Se o registro não for encontrado, redirecione ou exiba uma mensagem de erro
            header("Location: muda.php");
            exit();
        }
    }
} else {
    // Se o ID do registro não estiver presente na URL, redirecione ou exiba uma mensagem de erro
    header("Location: muda.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="muda.css">
</head>

<body>
    <h1>Editar Registro</h1>

    <!-- Formulário para editar os detalhes do registro -->
    <form action="" method="post">
        <input type="hidden" name="id_muda" value="<?php echo $id_muda; ?>">
        <label for="muda">Nome Muda:</label>
        <input type="text" name="muda" id="muda" value="<?php echo isset($nomeMuda) ? $nomeMuda : ''; ?>">
        <label for="temp">Tempo de Produção:</label>
        <input type="number" name="temp" id="temp" value="<?php echo isset($tempProd) ? $tempProd : ''; ?>">
        <button type="submit">Salvar Alterações</button>
    </form>
</body>

</html>
