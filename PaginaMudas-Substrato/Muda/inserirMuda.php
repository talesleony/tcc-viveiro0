<?php
require '../../con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['muda']) && isset($_POST['temp'])) {
        $nomeMuda = trim($_POST['muda']);
        $tempoProducao = $_POST['temp'];

        if (empty($nomeMuda)) {
            echo "O nome da muda não pode ser vazio.";
        } elseif ($tempoProducao < 0 || $tempoProducao === '') {
            echo "O tempo de produção não pode ser negativo ou vazio.";
        } else {
            // Realiza a inserção no banco de dados
            $stmt = $mysqli->prepare("INSERT INTO muda (nomemuda, tempProd) VALUES (?, ?)");

            if ($stmt) {
                $stmt->bind_param("si", $nomeMuda, $tempoProducao);

                if ($stmt->execute()) {
                    echo "Registro inserido com sucesso!";
                } else {
                    echo "Erro ao inserir o registro: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Erro na preparação da declaração SQL.";
            }
        }
    } else {
        echo "Erro: Dados incompletos.";
    }
} else {
    echo "Acesso inválido ao arquivo.";
}
?>
