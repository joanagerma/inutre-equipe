<?php
session_start();
include 'cnx.php';

$plano = $_SESSION['plano'];
// Buscar todos os alimentos para o <select>
$sql = "SELECT id, alimento FROM alimentos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$alimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//para mostrar as características
$caracteristicas = [];
$alimentoSelecionado = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['alimento'])) {
    $idAlimento = $_POST['alimento'];

    // Buscar nome do alimento selecionado
    $stmt = $pdo->prepare("SELECT alimento FROM alimentos WHERE id = :id");
    $stmt->execute(['id' => $idAlimento]);
    $alimentoSelecionado = $stmt->fetchColumn();

    // Buscar características do alimento
    $sql = "SELECT c.descricao, c.caracteristicas 
            FROM alimento_caracteristica ac
            JOIN caracteristicas c ON ac.id_caracteristica = c.id
            WHERE ac.id_alimento = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $idAlimento]);
    $caracteristicas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Diário Alimentar - iNutre</title>
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

    <form method="post" action="">
        <label for="alimento">Selecione um alimento:</label>
        <select name="alimento" id="alimento" required>
            <option value="">-- Escolha um alimento --</option>
            <?php foreach ($alimentos as $a): ?>
                <option value="<?= $a['id'] ?>" <?= (isset($_POST['alimento']) && $_POST['alimento'] == $a['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($a['alimento']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Selecionar</button>
        <button type="submit" class="finalizar">Finalizar relatório</a>

    </form>

    <?php if ($alimentoSelecionado): ?>
        
        <h3><?= htmlspecialchars($alimentoSelecionado) ?></h3>
    <?php endif; ?>

    <?php if ($alimentoSelecionado): ?>
        <h3>Características: <?= htmlspecialchars($alimentoSelecionado) ?></h3>
        <ul>
            <?php foreach ($caracteristicas as $c): ?>
                <li><strong><?= ucfirst($c['caracteristicas']) ?>:</strong> <?= htmlspecialchars($c['descricao']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
