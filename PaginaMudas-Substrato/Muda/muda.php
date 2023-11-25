<?php require '../../con.php'; ?>
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
                    <form id="formMuda" method="post">
                        <input type="text" class="editable-box" name="muda" id="muda" placeholder="Nome Muda">
                        <input type="number" class="editable-box" name="temp" id="temp" placeholder="Tempo de produção">
                        <div class="button-container">
                            <button class="submit-button" type="submit">Enviar</button>
                            <button class="clear-button" type="button" onclick="limparCampos()">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="right-column">
            <div class="square">
                <?php 
                $query = "SELECT id_muda, nomemuda, tempProd FROM muda";
                $result = $mysqli->query($query);
                
                if ($result && $result->num_rows > 0) {
                    foreach ($result as $row) {
    echo '<div class="resultado-container">';
    echo '<div class="resultado-item">Muda: ' . $row['nomemuda'] . ' - Tempo de Produção: ' . $row['tempProd'] . ' dias</div>';
    // Botões de edição e exclusão
    echo '<button class="edit-button" onclick="editarRegistro(' . $row['id_muda'] . ')">Editar</button>';
    echo '<button class="delete-button" onclick="confirmDelete(' . $row['id_muda'] . ')">Deletar</button>';
    echo '</div>';
}

                } else {
                    echo 'Nenhum resultado encontrado.';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#formMuda').submit(function(e) {
                e.preventDefault();

                var nomeMuda = $('#muda').val();
                var tempProducao = $('#temp').val();

                if (nomeMuda.trim() === '') {
                    alert("O nome da muda não pode ser vazio.");
                    return;
                }

                if (tempProducao.trim() === '') {
                    alert("Informe um tempo de produção válido.");
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: 'inserirMuda.php',
                    data: {
                        muda: nomeMuda,
                        temp: tempProducao
                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            });
        });

        function limparCampos() {
            $('#muda').val('');
            $('#temp').val('');
        }

        function confirmDelete(id) {
            if (confirm("Tem certeza que deseja deletar este registro?")) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                };
                xhttp.open("GET", "delete.php?id=" + id, true);
                xhttp.send();
            }
        }

        function editarRegistro(id) {
    // Redirecione para a página de edição com o ID do registro
    window.location.href = 'edit.php?id=' + id;
}

    </script>
</body>

</html>
