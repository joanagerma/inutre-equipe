<?php
session_start();
require 'cnx.php';

$plano = $_SESSION['plano'];

if (!isset($_SESSION['id'])) {
    header("Location: cadastro.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['plano'])) {
    $id = $_SESSION['id'];
    $novo_plano = $_GET['plano'];
    $premium_expires = null;

    if ($novo_plano == '1'|| $novo_plano == '4') {
        $premium_expires = null;
    } elseif ($novo_plano == '2' || $novo_plano == '3') {
        $hoje = new DateTime();
        $hoje->modify('+1 month');
        $premium_expires = $hoje->format('Y-m-d');
    } else {
        echo "Plano inválido.";
        exit();
    }

    $sql = "UPDATE cadastro_usuarios 
            SET plano = :plano, premium_expires = :premium_expires 
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':plano' => $novo_plano,
        ':premium_expires' => $premium_expires,
        ':id' => $id
    ]);

    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Plano - iNutre</title>

    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
    <link rel="stylesheet" href="css/main3.css"> <!-- CSS -->
</head>
<body>
    <section class="header">
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
    </section>

    <section class="planos">
        <div class="content-planos">
            <h3>ATUALIZAR</h3>
            <h2>Quer mudar de plano?</h2>
            <p>Selecione seu novo plano iNutre para assinar.</p>

            <?php if (isset($_SESSION['id'])): ?>
                <form action="cancelar_plano.php" method="post">
                    <button  class="btn-a" type="submit" onclick="return confirm('Tem certeza que deseja cancelar seu plano?');">
                        Cancelar plano atual
                    </button>
                </form>

                <form action="atualizar_plano.php" method="post">
                    <button type="submit" class="btn-a">
                        Atualizar plano atual
                    </button>
                </form>
            <?php endif; ?>

        </div>

        <div class="wrapper active">
            <form method="get" action="">
                <div class="card-p">
                    <h3>Básico</h3>
                    <h2>R$00,00<span>/mês</span></h2>
                    <p>Você tem acesso aos nossos principais serviços.</p>

                    <ul>
                        <li><i class="bi bi-check-lg"></i> Diário Alimentar Emocional</li>
                        <li><i class="bi bi-check-lg"></i> Blog Embasado</li>
                        <li><i class="bi bi-check-lg"></i> Recomendação de Receitas</li>
                    </ul>

                    <input type="hidden" name="plano" value="1">
                    <button type="submit" class="btn-p">Atualizar</button>
                </div>
            </form>

            <form method="get" action="">
                <div class="card-p active">
                    <h3>ProNutre</h3>
                    <h2>R$120,00<span>/mês</span></h2>
                    <p>Se com o básico já é bom, com o ProNutre é excepcional!</p>

                    <ul>
                        <li><i class="bi bi-check-lg"></i> Diário Alimentar Emocional</li>
                        <li><i class="bi bi-check-lg"></i> Blog Embasado</li>
                        <li><i class="bi bi-check-lg"></i> Recomendação de Receitas</li>
                        <li><i class="bi bi-check-lg"></i> Relatórios de Desempenho</li>
                        <li><i class="bi bi-check-lg"></i> Acompanhamento Profissional</li>
                        <li><i class="bi bi-check-lg"></i> Comunidade Ativa</li>
                    </ul>

                    <input type="hidden" name="plano" value="2">
                    <button type="submit" class="btn-p">Atualizar</button>
                </div>
            </form>

            <form method="get" action="">
                <div class="card-p">
                    <h3>ProNutre<span> - para profissionais</span></h3>
                    <h2>R$200,00<span>/mês</span></h2>
                    <p>Para os profissionais também temos um espaço especial.</p>

                    <ul>
                        <li><i class="bi bi-check-lg"></i> Diário Alimentar Emocional</li>
                        <li><i class="bi bi-check-lg"></i> Postagens Autorais no Blog</li>
                        <li><i class="bi bi-check-lg"></i> Postagens, Comentários e Recomendações de Receitas</li>
                        <li><i class="bi bi-check-lg"></i> Comunidade Ativa</li>
                        <li><i class="bi bi-check-lg"></i> Relatórios de Desempenho</li>
                        <li><i class="bi bi-check-lg"></i> Comunicação Direta com os Pacientes</li>
                    </ul>

                    <input type="hidden" name="plano" value="3">
                    <button type="submit" class="btn-p">Atualizar</button>
                </div>
            </form>


        </div>
    </section>
    
    <script src="js/main.js"></script> <!-- JS -->
</body>
</html>