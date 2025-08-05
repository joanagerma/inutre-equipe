<?php
session_start();
require 'cnx.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_usuario = $_SESSION['id']; //id do usuário da sessão
    $conteudo = $_POST['conteudo']; //conteúdo do depoimento
    $data_post = date('Y-m-d H:i:s'); //data e hora da postagem

    //Foto
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $foto = 'uploads/fotos/' . uniqid() . '_' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }

    //Vídeo: link 
    $video = null;
    if (!empty($_POST['video_link'])) {
        $video = $_POST['video_link'];
    } 
    //Vídeo: upload
    elseif (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === 0) {
        $video = 'uploads/videos/' . uniqid() . '_' . basename($_FILES['video_file']['name']);
        move_uploaded_file($_FILES['video_file']['tmp_name'], $video);
    }

    //Inserir no banco
    $sql = "INSERT INTO comunidade (id_usuario, conteudo, data_post, foto, video)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_usuario, $conteudo, $data_post, $foto, $video]);

    echo "Postagem efetuada!";

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Post - iNutre</title>
    <link rel="icon" type="image/x-icon" href="imgTCC/logo-flor.png">
</head>
<body>
    <header>
        <nav>
            <h1>iNUTRE</h1>

            <ul>
                <?php if ($plano == 1): ?>
                <li><a href="index.php">Início</a></li><br><br>
                <li><a href="cadastro_2.php">Formulário</a></li>
                <li><a href="conta_pessoal.php">Minha conta</a></li>
                <li><a href="diario_alimentar.php">Diário alimentar</a></li>
                <li><a href="receitas.php">Receitas</a></li>
                <li><a href="comunidade.php">Comunidade</a></li>
                <li><a href="artigos.php">Artigos</a></li>
                <li><a href="depoimentos.php">Depoimentos</a></li>
                

                <li><a href="sobre_nos.php">Mais sobre a iNUTRE</a></li>
                <li><a href="atualizar_plano.php">Planos</a></li>
                <button class="logout"><a href="logout.php">Logout</a></button>
                <?php endif; ?>
                
                <?php if ($plano == 2): ?>
                <li><a href="index.php">Início</a></li><br><br>
                <li><a href="cadastro_2.php">Formulário</a></li>
                <li><a href="conta_pessoal.php">Minha conta</a></li>
                <li><a href="profissionais.php">Psicólogos/Nutricionistas</a></li>
                <li><a href="diario_alimentar.php">Diário alimentar</a></li>
                <li><a href="receitas.php">Receitas</a></li>
                <li><a href="comunidade.php">Comunidade</a></li>
                <li><a href="artigos.php">Artigos</a></li>
                <li><a href="depoimentos.php">Depoimentos</a></li>


                <li><a href="sobre_nos.php">Mais sobre a iNUTRE</a></li>
                <li><a href="atualizar_plano.php">Planos</a></li>
                <button class="logout"><a href="logout.php">Logout</a></button>
                <?php endif; ?>

                <?php if ($plano == 3): ?>
                <li><a href="conta_pessoal.php">Minha conta</a></li>
                <li><a href="pacientes.php">Pacientes</a></li>
                <li><a href="receitas.php">Receitas</a></li>
                <li><a href="comunidade.php">Comunidade</a></li>
                <li><a href="artigos.php">Artigos</a></li>
                <li><a href="depoimentos.php">Depoimentos</a></li>


                <li><a href="sobre_nos.php">Mais sobre a iNUTRE</a></li>
                <li><a href="atualizar_plano.php">Planos</a></li>
                <button class="logout"><a href="logout.php">Logout</a></button>
                <?php endif; ?>

                <?php if ($plano == 4): ?>
                <li><a href="index.php">Início</a></li><br><br>
                <li><a href="conta_pessoal.php">Minha conta</a></li>
                <li><a href="usuarios.php">Usuários</a></li>
                <li><a href="receitas.php">Receitas</a></li>
                <li><a href="comunidade.php">Comunidade</a></li>
                <li><a href="artigos.php">Artigos</a></li>
                <li><a href="depoimentos.php">Depoimentos</a></li>


                <li><a href="sobre_nos.php">Mais sobre a iNUTRE</a></li>
                <li><a href="atualizar_plano.php">Planos</a></li>
                <button class="logout"><a href="logout.php">Logout</a></button>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <form action="adicionar_post.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="id_usuario">

    <label for="foto">Foto (opcional):</label><br>
    <div id="foto">
        <input type="file" name="foto">
    </div><br><br>    

    <label for="video">Vídeo (link ou arquivo):</label><br>
    <input type="file" name="video_file"><br><br>

    <label for="conteudo">Digite uma legenda:</label><br>
    <textarea name="conteudo" id="conteudo" required></textarea><br><br>


    <button type="submit">Concluir</button>
</form>
    
</body>
</html>