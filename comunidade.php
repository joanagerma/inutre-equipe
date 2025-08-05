<?php
session_start();
require 'cnx.php';

$plano = $_SESSION['plano'] ?? NULL;
$id_usuario = $_SESSION['id'] ?? NULL;

//para aparecer os depoimentos
$sql = 'SELECT * FROM comunidade';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$postagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

//para aparecer o nome de usuário
$sql = 'SELECT r.*, c.nickname, c.foto 
        FROM comunidade r
        JOIN cadastro_usuarios c ON r.id_usuario = c.id'; 
$stmt = $pdo->prepare($sql);
$stmt->execute();
$postagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT nickname, foto FROM cadastro_usuarios WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id_usuario]);
$usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
$nickname = $usuario['nickname'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidade - iNutre</title>
    <link rel="icon" type="image/x-icon" href="imgTCC/logo-flor.png">
    <style>
        @font-face 
        {
            font-family: ptserif;
            src: url(PTSerif/PTSerif-Regular.ttf);
        }

        @font-face 
        {
            font-family: quimed;
            src: url(Quicksand/static/Quicksand-Light.ttf);
        }

        @font-face {
            font-family: quisemi;
            src: url(Quicksand/static/Quicksand-Medium.ttf);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-color: #F6F4EE;
            background-repeat: no-repeat;
            background-position: right;
            background-size: contain;
            display: flex;
            flex-direction: column;
        }

        header {
            width: 100%;
            padding: 20px;
        }

        nav {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            text-align: right;
            padding-right: 60px;
        }

        nav ul li {
            display: inline-block;
            margin: 10px 20px;
        }

        nav ul li a{
            text-decoration: none;
            color: black;

        }

        .logout{ 
        background-color:rgba(255, 255, 255, 0);
        color: #FF6600;
        cursor: pointer;
        border: 2px solid  #FF6600;
        width: fit-content;
        }

        .logout a{ 
            color: #FF6600;
            text-decoration: none;
            cursor: pointer;
            font-weight: lighter;
        }
        .depoimento {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .usuario-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .foto-perfil {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .usuario-dados {
            display: flex;
            flex-direction: column;
        }
        
        .usuario-dados strong {
            font-size: 16px;
        }
        
        .usuario-dados span {
            font-size: 12px;
            color: #666;
        }
        .img-depoimento img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        
        .conteudo-depoimento {
            margin-top: 10px;
        }
    </style>
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

    <h2>COMUNIDADE</h2>

    <div class="container">
        <h1>Feed</h1>

        <?php if (count($postagens) > 0): ?>
            <?php foreach($postagens as $p): ?>
                <div class="postagens">
                    <p><?= htmlspecialchars($p['data_post']) ?></p>

                    <?php if (!empty($p['foto'])): ?>
                        <div class="img-post">
                            <img src="uploads/fotos/<?= htmlspecialchars($p['foto']) ?>" width="200">
                        </div>
                    <?php endif; ?>

                    <div><?= htmlspecialchars($p['conteudo']) ?></div>

                    <?php if (!empty($p['video'])): ?>
                        <video width="300" controls>
                            <source src="uploads/videos/<?= htmlspecialchars($p['video']) ?>" type="video/mp4">
                            Seu navegador não suporta vídeo.
                        </video>
                    <?php endif; ?>
                </div>
                <hr>
            <?php endforeach; ?>

            
        <?php else: ?>
            <p style="text-align: center; font-size: 18px; color: #555; margin: 30px 0;">Nenhum dado encontrado</p>
        <?php endif; ?>
    </div>
</body>
</html>