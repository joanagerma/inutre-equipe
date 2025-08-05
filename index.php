<?php
session_start();
require 'cnx.php';

if (!isset($_SESSION['email'])) 
{
    echo "Não foi possível fazer o login...";
    header("Location: login.php");
    exit();
}
else
{
    $plano = $_SESSION['plano']; //pega o plano da sessão (do usuário)

    $email = $_SESSION['email']; //pega o email da sessão (do usuário)
    $sql = "SELECT nome_usuario FROM cadastro_usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch();
    $nome = $usuario['nome_usuario'];
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introdução - iNutre</title>

    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
    <link rel="stylesheet" href="css/main3.css"> <!-- CSS -->
</head>
<body>

    <section>
        <div class="page-wrapper">

            <section class="header active">
                <header>
                    <nav class="navbar">
                        <div class="logo">
                            <img src="img/logo-preta.png" alt="INUTRE">
                        </div>
                        <div class="nav-list">
                            <ul>
                                <?php if ($plano == 1): ?>
                                    <li class="nav-item"><a href="index.php">Início</a></li>
                                    <li class="dropbtn">
                                        <a href="diario_alimentar.php">Diário Alimentar <i class="bi bi-chevron-down"></i></a>
                                        <div class="dropdown-content">
                                            <a href="#">Adicionar</a>
                                            <a href="#">Relatórios</a>
                                            <a href="#">Cadastros Anteriores</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a href="comunidade.php">Comunidade</a></li>
                                    <li class="nav-item"><a href="cadastro_2.php">Formulário</a></li>
                                    <li class="nav-item"><a href="receitas.php">Receitas</a></li>
                                    <li class="nav-item"><a href="atualizar_plano.php">Planos</a></li>
                                    <li class="nav-item"><a href="artigos.php">Blog</a></li>
                                    <li class="nav-item"><a href="conta_pessoal"><i class="bi bi-person-circle"></i></a></li>
                                <?php endif; ?>

                                <?php if ($plano == 2): ?>
                                    <li class="nav-item"><a href="index.php">Início</a></li>
                                    <li class="dropbtn">
                                        <a href="diario_alimentar.php">Diário Alimentar <i class="bi bi-chevron-down"></i></a>
                                        <div class="dropdown-content">
                                            <a href="#">Adicionar</a>
                                            <a href="#">Relatórios</a>
                                            <a href="#">Cadastros Anteriores</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a href="cadastro_2.php">Formulário</a></li>
                                    <li class="nav-item"><a href="profissionais.php">Psicólogos/Nutricionistas</a></li>
                                    <li class="nav-item"><a href="receitas.php">Receitas</a></li>
                                    <li class="nav-item"><a href="comunidade.php">Comunidade</a></li>
                                    <li class="nav-item"><a href="atualizar_plano.php">Planos</a></li>
                                    <li class="nav-item"><a href="artigos.php">Blog</a></li>
                                    <li class="nav-item"><a href="conta_pessoal"><i class="bi bi-person-circle"></i></a></li>
                                <?php endif; ?>

                                <?php if ($plano == 3): ?>
                                    <li class="nav-item"><a href="pacientes.php">Pacientes</a></li>
                                    <li class="nav-item"><a href="receitas.php">Receitas</a></li>
                                    <li class="nav-item"><a href="comunidade.php">Comunidade</a></li>
                                    <li class="nav-item"><a href="atualizar_plano.php">Planos</a></li>
                                    <li class="nav-item"><a href="artigos.php">Blog</a></li>
                                    <li class="nav-item"><a href="conta_pessoal"><i class="bi bi-person-circle"></i></a></li>
                                <?php endif; ?>      
                            </ul>
                        </div>

                        <div class="btn-nav">
                            <button id="logout-btn">
                                <i class="bi bi-box-arrow-in-left"></i>
                                <span class="item-descricao"><a href="logout.php">Logout</a></span>
                            </button> 
                        </div>

                        <div class="mobile-menu-icon">
                            <button onclick="menuShow()"><img src="img/open.svg"></button>
                        </div>
                    </nav>

                    <!--Responsivo-->
                    <div class="mobile-menu">
                        <ul>
                            <?php if ($plano == 1): ?>
                                <li class="nav-item"><a href="index.php">Início</a></li>
                                <li class="nav-item"><a href="diario_alimentar.php">Diário Alimentar</a></li>
                                <li class="nav-item"><a href="#">Adicionar - Diário</a></li>
                                <li class="nav-item"><a href="#">Relatórios - Diário</a></li>
                                <li class="nav-item"><a href="#">Cadastros Anteriores - Diário</a></li>
                                <li class="nav-item"><a href="comunidade.php">Comunidade</a></li>
                                <li class="nav-item"><a href="cadastro_2.php">Formulário</a></li>
                                <li class="nav-item"><a href="receitas.php">Receitas</a></li>
                                <li class="nav-item"><a href="atualizar_plano.php">Planos</a></li>
                                <li class="nav-item"><a href="artigos.php">Blog</a></li>
                                <li class="nav-item"><a href="conta_pessoal"><i class="bi bi-person-circle"></i></a></li>
                                <li class="nav-item"><a href="logout.php">Sair</a></li>
                            <?php endif; ?>

                            <?php if ($plano == 2): ?>
                                <li class="nav-item"><a href="index.php">Início</a></li><br><br>
                                <li class="nav-item"><a href="diario_alimentar.php">Diário Alimentar</a></li>
                                <li class="nav-item"><a href="#">Adicionar - Diário</a></li>
                                <li class="nav-item"><a href="#">Relatórios - Diário</a></li>
                                <li class="nav-item"><a href="#">Cadastros Anteriores - Diário</a></li>
                                <li class="nav-item"><a href="cadastro_2.php">Formulário</a></li>
                                <li class="nav-item"><a href="profissionais.php">Psicólogos/Nutricionistas</a></li>
                                <li class="nav-item"><a href="receitas.php">Receitas</a></li>
                                <li class="nav-item"><a href="comunidade.php">Comunidade</a></li>
                                <li class="nav-item"><a href="atualizar_plano.php">Planos</a></li>
                                <li class="nav-item"><a href="artigos.php">Blog</a></li>
                                <li class="nav-item"><a href="conta_pessoal"><i class="bi bi-person-circle"></i></a></li>
                                <li class="nav-item"><a href="logout.php">Sair</a></li>
                            <?php endif; ?>

                            <?php if ($plano == 3): ?>
                                <li class="nav-item"><a href="pacientes.php">Pacientes</a></li>
                                <li class="nav-item"><a href="receitas.php">Receitas</a></li>
                                <li class="nav-item"><a href="comunidade.php">Comunidade</a></li>
                                <li class="nav-item"><a href="atualizar_plano.php">Planos</a></li>
                                <li class="nav-item"><a href="artigos.php">Blog</a></li>
                                <li class="nav-item"><a href="conta_pessoal"><i class="bi bi-person-circle"></i></a></li>
                                <li class="nav-item"><a href="logout.php">Sair</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </header>

                <div class="content-header">
                    <h2>Seja Bem-Vindo, <?= htmlspecialchars($nome) ?></h2>
                    <p>Estamos muito felizes em ter você conosco nessa jornada de cuidar de si e encontrar equilíbrio na sua alimentação.</p>
                </div>
            </section>

            <div class="section-timeline-heading">
                <div class="container">
                    <div class="padding-vertical-xlarge">
                        <div class="timeline-main_heading-wrapper">
                            <div class="container-f">
                                <div class="title-f">
                                    <h3>FUNCIONAMENTO</h3>
                                    <h2>Como funciona esse diário?</h2>
                                    <p>Muito simples! A ideia é realmente remeter a um diário comum, onde você escreve o que aconteceu no seu dia e como se sentiu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-timeline">
                <div class="container">
                    <div class="timeline_component">
                        <div class="timeline_progress">
                            <div class="timeline_progress-bar"></div>
                        </div>

                        <div class="timeline_item"> <!-- item 1 -->
                            <div class="timeline_left">
                                <div class="timeline_date-text">Cadastro de refeições diárias</div>
                            </div>

                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>

                            <div class="timeline_right">
                                <div class="margin-bottom-xlarge">
                                    <div class="timeline_text">
                                        Você pode cadastrar tudo o que você comeu em seu dia, 
                                        qual sua nota para aquela refeição, quais foram os sentimentos experienciados 
                                        com aquela comida e como você se sentiu.
                                    </div>
                                </div>
                                <div class="timeline_image-wrapper">
                                    <img src="img/donut1.png" loading="lazy" width="480" alt="Imagem1" />
                                </div>
                            </div>

                        </div>

                        <div class="timeline_item"> <!-- item 2 -->
                            <div class="timeline_left">
                                <div class="timeline_date-text">Análise semanal destas refeições</div>
                            </div>

                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>

                            <div class="timeline_right">
                                <div class="margin-bottom-medium">
                                    <div class="timeline_text">
                                        Com base em seus cadastros, nossa Inteligência Artificial 
                                        irá analisar esses cadastros e prover um relatório semanal.
                                    </div>
                                </div>

                                <div class="timeline_image-wrapper">
                                    <img src="img/banana.png" loading="lazy" width="480" alt="Imagem2" />
                                </div>
                            </div>

                        </div>

                        <div class="timeline_item"> <!-- item 3 -->
                            <div class="timeline_left">
                                <div class="timeline_date-text">Recomendações de receitas</div>
                            </div>

                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>

                            <div class="timeline_right">
                                <div class="margin-bottom-medium">
                                    <div class="timeline_text">
                                        De acordo com este relatório, a IA analisa os percentuais 
                                        nutricionais das refeições cadastradas, identificando os principais 
                                        nutrientes ingeridos e aqueles em déficit.
                                    </div>
                                </div>

                                <div class="margin-bottom-xlarge">
                                    <p class="text-colour-lightgrey">
                                        Assim, você tem recomendações de novas receitas, levando em conta o que você 
                                        gosta de comer e que possam prover esses nutrientes que estão em falta.
                                    </p>
                                </div>

                                <div class="timeline_image-wrapper margin-bottom-medium">
                                    <img src="img/donut2.png" loading="lazy" width="480" alt="Imagem3" />
                                </div>
                            </div>
                        </div>

                        <div class="timeline_item"> <!-- item 4 -->
                            <div class="timeline_left">
                                <div class="timeline_date-text">Relatórios de desempenho</div>
                            </div>

                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>

                            <div class="timeline_right">
                                <div class="margin-bottom-medium">
                                    <div class="timeline_text">
                                        Com base nestes relatórios, você também pode observar mais de perto 
                                        seu desempenho com a comida e consigo mesmo. 
                                    </div>
                                </div>

                                <div class="timeline_image-wrapper margin-bottom-medium">
                                    <img src="img/donut4.png" loading="lazy" width="480" alt="Imagem4" />
                                </div>
                        </div>

                        </div>

                        <div class="timeline_item"> <!-- item 5 -->
                            <div class="timeline_left">
                                <div class="timeline_date-text">Comparação do antes com o depois</div>
                            </div>

                            <div class="timeline_centre">
                                <div class="timeline_circle"></div>
                            </div>

                            <div class="timeline_right">
                                <div class="margin-bottom-medium">
                                    <div class="timeline_text">
                                        Com isso, você pode perceber a diferença de como você lida com a comida e consigo mesmo.
                                    </div>
                                </div>

                                <div class="timeline_image-wrapper">
                                    <img src="img/donut3.png" loading="lazy" width="480" alt="Imagem5" />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="overlay-fade-top"></div>
                    <div class="overlay-fade-bottom"></div>

                </div>

            </div>

            <div style="height: 50vh;"></div>
        
        </div>
    </section>
    
    <script src="js/main.js"></script> <!-- JS -->
</body>
</html>
