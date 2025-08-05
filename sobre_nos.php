<?php
session_start();
require 'cnx.php';

$plano = $_SESSION['plano'] ?? '';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - iNutre</title>
    <link rel="icon" type="image/x-icon" href="imgTCC/logo-flor.png">
    <style>
        @font-face 
        {
            font-family: ptserif;
            src: url(imgTCC/PTSerif-Regular.ttf)
        }

        @font-face 
        {
            font-family: quimed;
            src: url(imgTCC/Quicksand-Medium.ttf);
        }

        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background-color: #F6F4EE;
        }

        /* section home e header */
        .sobre{
            min-height: 100vh;
            background-color: #FF6600;
            background-size: cover;
            background-position: top;
            padding: 10px 20px;
        }

        nav{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
        }

        .logo{
            width: 180px;
            cursor: pointer;
        }

        nav ul{
            list-style: none;
            width: 100%;
            text-align: right;
            padding-right: 60px;
        }

        nav ul li{
            display: inline-block;
            margin: 10px 20px;
        }

        nav ul li a {
            color: #F6F4EE;
            text-decoration: none;
            font-family: quimed;
        }

        .btn-nav{
            display: flex;
            align-items: center;
            padding: 7px 30px;
            font-size: 18px;
            border: solid 1px #F6F4EE;
            outline: 0;
            border-radius: 20px;
            font-family: quimed;
            font-weight: 200;
            cursor: pointer;
            background-color: transparent;
            text-decoration: none;
            color: #F6F4EE;
        }

        .btn-nav:hover{
            background-color: #F6F4EE;
            color: #FF6600;
            transition: ease 0.5s;
        }

        .content-sobre{
            margin-top: 14%;
            color: #F6F4EE;
            text-align: center;
        }

        .content-sobre h1{
            font-size: 70px;
            font-family: ptserif;
            line-height: 85px;
            font-weight: 100;
        }

        .content-sobre p{
            font-family: quimed;
            font-size: 20px;
            margin-bottom: 25px;
        }
        /* end */

        /* seçao introdução sobre nos */
        .intro{
            margin-bottom: 5%;
            margin-top: 10%;
        }

        .title-intro{
            align-items: center;
            text-align: center;
        }

        .container-intro {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            max-width: 80%;
            margin: auto;
        }

        .text-section-intro {
            max-width: 47%;
            line-height: 1.5;/*espaçamento entre as linhas dos textos*/
            color: #444;
        }

        .text-section-intro p {
            font-family: quimed;
            font-weight: 100;
            font-size: 20px;
            text-align: justify;
        }

        .text-section-intro .tt{
            font-weight: bold;
        }
        /* end */

        /* seção VIDEO */
        .video .video-intro{
            align-items: center;
            text-align: center;
        }

        .video .video-intro video{
            border: solid #faa5136c 2px;
            border-radius: 3%;
            width: 80%;
        }
        /* end */

        /* seção pensa */
        .pensa{
            margin-top: 10%;
            margin-bottom: 10%;
        }

        .title-pensa{
            align-items: center;
            text-align: center;
        }

        .title-pensa h3{
            font-family: ptserif;
            font-size: 70px;
            font-weight: 100;
        }

        .content-pensa{
            text-align: center;
            line-height: 1.5;
        }

        .content-pensa p{
            font-family: quimed;
            font-size: 20px;
            color: #444;
            font-weight: 100;
            margin-top: 20px;
            line-height: 1.5;
        }
        /* end */

        /* seção com o inutre não */
        .nao{
            margin-top: 10%;
            margin-bottom: 10%;
        }

        .container-nao{
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1100px;
            margin: auto;
        }

        .text-content-nao{
            max-width: 650px;
        }

        .text-content-nao h1 {
            font-size: 70px;
            font-weight: bold;
            margin-bottom: 20px;
            font-family: ptserif;
            font-weight: 200;
        }

        .text-content-nao p {
            font-size: 20px;
            color: #444;
            text-align: justify;
            font-family: quimed;
            margin-right: 10%;
            font-weight: 100;
            line-height: 1.5;
        }

        .icon-nao{
            flex: 2 2 21rem;
            min-width: 40%;
        }

        .icon-nao img{
            width: 100%;
        }
        /* end */

        /* seção ondas */
        .ondas img {
            width: 100%;
        }
        /* end */

        /* seção FOCA */

        .foca{
            margin-top: 10%;
            margin-bottom: 10%;
        }

        .title-foca{
            align-items: center;
            text-align: center;
        }

        .title-foca h3{
            font-family: ptserif;
            font-size: 70px;
            font-weight: 100;
        }

        .title-foca h4{
            font-family: quimed;
            font-size: 27px;
            font-weight: 100;
        }

        .content-foca{
            text-align: center;
            line-height: 1.5;
        }

        .content-foca p{
            font-family: quimed;
            font-size: 20px;
            color: #444;
            font-weight: 100;
            margin-top: 20px;
            margin-bottom: 25px;
        }

        .btn-foca{
            padding: 7px 30px;
            background-color: #FF6600;
            color: #F6F4EE;
            border: solid 1px #FF6600;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 100;
            font-family: quimed;
            font-size: 18px;
        }

        .btn-foca:hover{
            border: #FF6600 1px solid;
            color: #FF6600;
            background-color: #F6F4EE;
            transition: ease 0.5s;
        }

        /* end */

        /* footer */
        footer{
            border: 1px solid #CFC39F;
        }
        /* end */

    </style>
</head>
<body>
    <!-- Seção cabeçalho SOBRE NÓS  -->
    <section class="sobre" id="sobre">
        <header>
            <nav>
                <img src="imgTCC/logo.png" class="logo">
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

                    <?php if ($plano == null): ?>
                        <li><a href="pagina_inicial.php">HOME</a></li>
                        <li><a href="sobre_nos.php">SOBRE NÓS</a></li>
                        <!--<li><a href="depoimentos.php">DEPOIMENTOS</a></li>-->
                        <li><a href="planos.php">PLANOS</a></li>
                        <li><a class="btn-nav" href="login.php" role="button">LOGAR</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <div class="content-sobre">
            <h1>SOBRE NÓS</h1>
            <p>O iNutre surgiu com a dedicação de melhorar a relação das pessoas com a alimentação</p>
        </div>
    </section>
    <!-- Fim -->

    <!-- Seção INTRODUÇÃO  -->
    <section class="intro" id="intro">
        <div class="container-intro">
            <div class="text-section-intro">
                <p>Ultimamente, muitas pessoas têm desenvolvido o chamado ‘comer transtornado’, devido a muitas ideias erradas sobre alimentação que percurssão na Internet. Para elas, existem alimentos permitidos e proibidos, e essa ideia pode desenvolver problemas de saúde sérios.</p>
            </div>
            <div class="text-section-intro">
                <p class="tt">e como o iNutre ajuda com isso?</p>
                <p>O iNutre desmistifica essas ideias restritivas e preza pela re-educação alimentar, onde é possível aproveitar todas as classes de alimentos do jeito que seu corpo precisa! Você ainda pode ser feliz comendo, basta ter consciência e equilíbrio do que você come ;)</p>
            </div>
        </div>
    </section>
<!-- Fim -->

<!-- seção VIDEO -->
    <section class="video" id="video">
        <div class="video-intro">
            <video src="imgTCC/videoinutre.mp4" controls autoplay></video> <!--pode ser atribuido o autoplay, que faria o video ser reproduzido automaticamente.-->
            <!--os valores controls e autoplay são booleandos-->
        </div>
    </section>
    <!-- Fim -->

    <!-- seção QUANDO PENSAMOS -->
    <section class="pensa" id="pensa">
        <div class="title-pensa">
            <h3>Quando pensamos em nutrição...</h3>
        </div>
        <div class="content-pensa">
            <p>A primeira coisa que geralmente vem à mente é “dieta”, certo? Isso porque a maioria dos aplicativos por aí se limita à criação de planos alimentares. Mas e o aspecto emocional? Fica de fora?</p>
        </div>
        <br>
        <br>
    </section>
    <!-- Fim -->

    <!-- Seção COMM O INUTRE NÃO -->
    <section class="nao" id="nao">
        <div class="container-nao">
            <div class="text-content-nao">
                <h1>Com o iNutre não!</h1>
                <p>Nossa plataforma tem como objetivo mostrar que é possível sim levar um estilo de vida saudável e equilibrado, de uma forma leve e sem restrições, levando em consideração os dois lados da moeda.</p>
            </div>
            <div class="icon-nao">
                <img src="imgTCC/logo-flor.png">
            </div>
        </div>
    </section>
    <!-- Fim -->

   <!-- Seção ONDAS -->
    <section class="ondas" id="ondas">
        <img src="imgTCC/ondas-sobre.png">
    </section>
    <!-- Fim -->

    <!-- seção FOCAMOS -->
    <section class="foca" id="foca">
        <div class="title-foca">
            <h3>FOCAMOS NA MANUTENÇÃO</h3>
            <h4>DA SAÚDE FÍSICA</h4>
        </div>
        <div class="content-foca">
            <p>Encorajando o consumo de alimentos nutritivos para sua saúde, juntamente com a saúde mental, promovendo uma relação mais gentil consigo mesmo.</p>
            <a class="btn-foca" href="planos.php" role="button">CONHEÇA NOSSOS PLANOS</a>
        </div>
        <br>
        <br>
    </section>
 <!-- Fim -->

    <!-- FOOTER -->
        <footer>
            <p>oi</p>
        </footer>
    <!-- Fim -->
    
</body>
</html>