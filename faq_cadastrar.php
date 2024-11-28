<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCategoria = intval($_POST['id_categoria']);
    $pergunta = mysqli_real_escape_string($conn, $_POST['nm_pergunta']);
    $resposta = mysqli_real_escape_string($conn, $_POST['nm_resposta']);
    $idUsuario = 1; // Substituir pelo ID do usuário logado

    $query = "INSERT INTO tb_faq (nm_pergunta, nm_resposta, id_categoria, id_usuario) 
              VALUES ('$pergunta', '$resposta', $idCategoria, $idUsuario)";

    if (mysqli_query($conn, $query)) {
        echo "FAQ cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar FAQ</title>
    <link rel="stylesheet" href="css/faq.css"> <!-- Link para o CSS -->
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Pergunta Frequente</h1>
        <form action="cadastrar_faq.php" method="POST">
            <label for="categoria">Categoria:</label>
            <select name="id_categoria" id="categoria" required>
                <?php
                $queryCategorias = "SELECT * FROM tb_categoria_faq";
                $resultCategorias = mysqli_query($conn, $queryCategorias);
                while ($categoria = mysqli_fetch_assoc($resultCategorias)) {
                    echo "<option value='" . $categoria['cd_categoria_faq'] . "'>" . htmlspecialchars($categoria['nm_categoria']) . "</option>";
                }
                ?>
            </select>

            <label for="pergunta">Pergunta:</label>
            <input type="text" name="nm_pergunta" id="pergunta" required>

            <label for="resposta">Resposta:</label>
            <textarea name="nm_resposta" id="resposta" required></textarea>

            <button type="submit">Salvar FAQ</button>
        </form>
    </div>
</body>
</html>
