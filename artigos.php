<?php
session_start();
require 'cnx.php';

$plano = $_SESSION['plano'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artigos - iNutre</title>
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

</body>
</html>