<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórias de Superação - iNutre</title>
    <link rel="icon" type="image/x-icon" href="imgTCC/logo-flor.png">
    <style>
        @font-face 
        {
            font-family: ptserif;
            src: url(imgTCC/PTSerif-Regular.ttf);
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
        .supera{
            min-height: 80vh;
            background: url(imgTCC/image-superar.png) no-repeat;
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
            color: #396697;
            transition: ease 0.5s;
        }

        .content-supera{
            margin-top: 14%;
            color: #F6F4EE;
            text-align: center;
        }

        .content-supera h1{
            font-size: 70px;
            font-family: ptserif;
            line-height: 85px;
            font-weight: 100;
        }
        /* end */

        /* seção EI QUE TAL ALGUMAS HIASTORIAS */
        .intro{
            margin-top: 8%;
            margin-bottom: 10%;
        }

        .title-intro{
            align-items: center;
            text-align: center;
        }

        .title-intro h3{
            font-family: ptserif;
            font-size: 60px;
            font-weight: 100;
        }

        .title-intro h4{
            font-family: quimed;
            font-size: 25px;
            font-weight: 100;
        }
        /* end */

        /* seção comida */

        .historia1{
            margin-top: 10%;
            margin-bottom: 10%;
        }
        
        .historia1 .box-container-his1{
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.7rem;
        }

        .historia1 .box-container-his1 .image{
            flex: 2 2 21rem;
        }

        .historia1 .box-container-his1 .image img{
            width: 92%;
        }

        .historia1 .content-his1{
            flex: 1 1 41rem;
        }

        .historia1 .content-his1 .title{
            font-size: 70px;
            color: black;
            font-family: ptserif;
            font-weight: 100;
            text-align: center;
        }

        .historia1 .content-his1 .tt{
            font-family: quimed;
            color: black;
            font-weight: 100;
            text-align: center;
            font-size: 27px;
            margin-bottom: 25px;
        }

        .historia1 .content-his1 p{
            font-size: 20px;
            color: #444;
            text-align: justify;
            font-family: quimed;
            margin-right: 10%;
            font-weight: 100;
            line-height: 1.5;
        }
        /* end */

        /* seção ondas */
        .ondas{
            margin-top: 5%;
            margin-bottom: 10%;
        }

        .ondas img {
            width: 100%;
        }
        /* end */


        /*seção HISTORIA 2 GABI*/
        .historias2{
            margin-top: 10%;
            margin-bottom: 5%;
        }
        
        .historias2 .box-container-hist2{
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.7rem;
        }

        .historias2 .box-container-hist2 .image2{
            flex: 2 2 21rem;
        }

        .historias2 .box-container-hist2 .image2 img{
            width: 92%;
            margin-left: 9%;
        }

        .historias2 .content-hist2{
            flex: 1 1 41rem;
        }

        .historias2 .content-hist2 .title2{
            font-size: 70px;
            color: black;
            font-family: ptserif;
            font-weight: 100;
            text-align: center;
        }

        .historias2 .content-hist2 .tt2{
            font-family: quimed;
            color: black;
            font-weight: 100;
            text-align: center;
            font-size: 27px;
            margin-bottom: 25px;
        }

        .historias2 .content-hist2 p{
            font-size: 20px;
            color: #444;
            text-align: justify;
            font-family: quimed;
            margin-left: 10%;
            font-weight: 100;
            line-height: 1.5;
        }
        /*end*/

        /*seção E POR FIM, */
        .fim{
            margin-top: 10%;
            margin-bottom: 10%;
        }

        .title-fim{
            align-items: center;
            text-align: center;
        }

        .title-fim h3{
            font-family: ptserif;
            font-size: 60px;
            font-weight: 100;
        }

        .title-fim h4{
            font-family: quimed;
            font-size: 27px;
            font-weight: 100;
            margin-bottom: 5%;
        }

        .fim .video-intro{
            align-items: center;
            text-align: center;
        }

        .fim .video-intro iframe{
            border: solid rgba(0, 0, 0, 0.42) 2px;
            border-radius: 2%;
        }
        /*end*/

        /*seção viu só*/
        .viu{
            margin-top: 10%;
            margin-bottom: 10%;
        }

        .title-viu{
            align-items: center;
            text-align: center;
        }

        .title-viu h3{
            font-family: ptserif;
            font-size: 60px;
            font-weight: 100;
        }

        .title-viu h4{
            font-family: quimed;
            font-size: 27px;
            font-weight: 100;
            margin-bottom: 2%;
        }

        .btn-viu{
            padding: 10px 30px;
            background-color: #FF6600;
            color: #F6F4EE;
            border: solid 1px #FF6600;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 100;
            font-family: quimed;
            font-size: 18px;
        }

        .btn-viu:hover{
            border: #FF6600 1px solid;
            color: #FF6600;
            background-color: #F6F4EE;
            transition: ease 0.5s;
        }
        /*end*/

        /* footer */
        footer{
            border: 1px solid #CFC39F;
        }
        /* end */

    </style>
</head>
<body>
    <!-- cabeçalho -->
    <section class="supera" id="supera">
        <header>
            <nav>
                <img src="imgTCC/logo.png" class="logo">
                <ul>
                    <li><a href="pagina_inicial.php">HOME</a></li>
                    <li><a href="sobre_nos.php">SOBRE NÓS</a></li>
                    <li><a class="btn-nav" href="login.php" role="button">LOGAR</a></li>
                </ul>
                
            </nav>
        </header>
        <div class="content-supera">
            <h1>HISTÓRIAS DE SUPERAÇÃO</h1>
        </div>
    </section>
    <!-- Fim -->

    <!-- seção EI, QUE TAL ALGUMAS -->
    <section class="intro" id="intro">
        <div class="title-intro">
            <h3>Ei, que tal algumas histórias inspiradoras?</h3>
            <h4>Essas pessoas passaram por maus momentos, mas conseguiram se reerguer e agora incentivam outras pessoas a fazerem o mesmo!</h4>
        </div>
    </section>
    <!-- Fim -->

    <!-- seção HISTORIA1 -->
    <section class="historia1" id="historia1">
        <div class="box-container-his1">
            <div class="image">
                <img src="imgTCC/image-his-vit.png">
            </div>
            <div class="content-his1">
                <h3 class="title">VITÓRIA</h3>
                <h4 class="tt">REIS</h4>
                <p>Vitória teve uma relação tranquila com a comida na infância, mas só passou a valorizar uma alimentação saudável aos 18 anos, quando começou a praticar exercícios para se preparar para um concurso da Polícia Militar. Ao longo do tempo, se apaixonou pela corrida de rua. No último ano de faculdade, enfrentou o agravamento da saúde da mãe, que teve uma recaída de câncer. Diante do estresse e do sentimento de descontrole, Vitória passou a controlar rigidamente sua alimentação e rotina, cortando alimentos, emagrecendo e intensificando treinos.

Essa obsessão evoluiu para anorexia nervosa, com uso de métodos compensatórios, embora ninguém ao redor suspeitasse inicialmente. O quadro se agravou até que Vitória perdeu forças para realizar tarefas simples, desenvolveu depressão profunda e chegou a pensar em suicídio. Foi nesse momento crítico que ela decidiu buscar ajuda.

Inicialmente, não teve sucesso com tratamentos, sentindo-se julgada pelos profissionais. Só depois encontrou uma equipe que a ajudou efetivamente — uma nutricionista e um gastroenterologista. Com o apoio adequado, começou a recuperar sua saúde física e mental. Voltar a se exercitar foi uma de suas maiores alegrias e motivações para viver.</p>
            </div>
        </div>
    </section>
    <!-- Fim -->

    <!-- seção ONDAS1 -->
    <section class="ondas" id="ondas">
        <img src="imgTCC/image-hist-onda1.png">
    </section>
    <!-- Fim -->

    <!-- seção HISTORIA2 -->
    <section class="historias2" id="historias">
        <div class="box-container-hist2">
            <div class="content-hist2">
                <h3 class="title2">GABRIELA</h3>
                <h4 class="tt2">DAMANSO</h4>
                <p>Aos 14 anos, após uma infância sem grandes preocupações com o corpo, a protagonista passou a fazer esforços extremos em busca do “corpo ideal”, com horas excessivas de exercícios e longos jejuns, chegando a ficar 24 horas sem comer. Sem saber, já vivia um quadro de anorexia. Aos 18, teve seu primeiro episódio de compulsão alimentar, seguido de vômito induzido — início da bulimia. Por anos, viveu entre excesso de exercícios, compulsões e métodos compensatórios prejudiciais.

Aos 27 anos, engravidou e precisou abandonar essas práticas. Ganhou 24 kg durante a gestação e desenvolveu diversos problemas de saúde. Após o parto, enfrentou um forte abalo emocional ao ver o próprio corpo, passou por uma separação, mergulhou em depressão e chegou a pesar 112 kg. Mesmo formada em educação física, não conseguia cuidar de si.

Em 2016, iniciou um relacionamento com um fisiculturista, o que a motivou a mudar. Com apoio, retomou uma rotina de exercícios e alimentação equilibrada. Em dez meses, perdeu 30 kg apenas com treino e dieta. Mesmo após o término do namoro, manteve o foco, contando com o acompanhamento de um nutricionista esportivo. Conquistou um corpo forte e saudável, com 70 kg e alto percentual de massa muscular.</p>
            </div>
            <div class="image2">
                <img src="imgTCC/image-his-gabi.png">
            </div>
        </div>
    </section>
    <!-- Fim -->

    <!-- seção ONDAS2 -->
    <section class="ondas" id="ondas">
        <img src="imgTCC/image-hist-ondas2.png">
    </section>
    <!-- Fim -->

    <!-- seção E POR FIM, MAS NÃO MENOS IMPORTANTE AUDREY -->
    <section class="fim" id="fim">
        <div class="title-fim">
            <h3>E por fim, mas não menos importante</h3>
            <h4>Audrey Bernini</h4>
        </div>

        <div class="video-intro">
            <iframe width="1100" height="615" src="https://www.youtube.com/embed/Q4ANdC9CBSY?si=6aJnhYd6Yvshhi0k&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>
    <!-- Fim -->

    <!-- Seção Viu SÓ? -->
     <section class="viu" id="viu">
        <div class="title-viu">
            <h3>VIU SÓ? Esses são exemplos de pessoas</h3>
            <h4>que passaram por muitos desafios mas que aprenderam a cuidar de sua saúde. Com o iNutre você também poderá seguir o exemplos delas!</h4>
            <a class="btn-viu" href="pagina_inicial.html" role="button">VOLTAR A PÁGINA PRINCIPAL</a>
        </div>
    </section>
    <!-- Fim -->

    

    <!-- FOOTER -->
    <footer>
        <p>oi</p>
    </footer>
    <!-- Fim -->

</body>
</html>