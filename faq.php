<?php
include 'conexao.php';

// Consultar categorias
$queryCategorias = "SELECT * FROM tb_categoria_faq";
$resultCategorias = mysqli_query($conn, $queryCategorias);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="css/faq.css"> <!-- Link para o CSS -->
</head>
<body>
    <div class="faq-container">
        <h1>Perguntas Frequentes</h1>
        <?php
        // Exibir categorias e suas perguntas
        while ($categoria = mysqli_fetch_assoc($resultCategorias)) {
            echo "<div class='faq-category'>";
            echo "<h2>" . htmlspecialchars($categoria['nm_categoria']) . "</h2>";

            // Consultar FAQs por categoria
            $idCategoria = $categoria['cd_categoria_faq'];
            $queryFaq = "SELECT * FROM tb_faq WHERE id_categoria = $idCategoria AND st_ativo = 1";
            $resultFaq = mysqli_query($conn, $queryFaq);

            while ($faq = mysqli_fetch_assoc($resultFaq)) {
                echo "<div class='faq-item'>";
                echo "<h3>" . htmlspecialchars($faq['nm_pergunta']) . "</h3>";
                echo "<p>" . htmlspecialchars($faq['nm_resposta']) . "</p>";
                echo "</div>";
            }

            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
