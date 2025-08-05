<?php
session_start();
require 'cnx.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$plano = $_SESSION['plano'];
$id = $_SESSION['id'];
$respostas = [];
$respostasPergunta = [];
$doencas = [];
$alergias = [];
$bons = [];
$ruins = [];
$erro = '';

// Verifica se já existem respostas
try {
    // Verifica respostas do questionário
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM respostas WHERE id_usuario = ?");
    $stmt->execute([$id]);
    $totalRespostas = $stmt->fetchColumn();

    if ($totalRespostas > 0) {
        // Busca respostas do questionário com join nas perguntas
        $sql = 'SELECT r.*, p.descricao 
                FROM respostas r
                JOIN perguntas p ON r.id_pergunta = p.id
                WHERE r.id_usuario = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $forms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($forms as $f) {
            $respostasPergunta[$f['id_pergunta']] = [
                'descricao' => $f['descricao'],
                'resposta' => $f['resposta']
            ];
        }

        // Busca doenças
        $sql = 'SELECT * FROM doencas WHERE id_usuario = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $doencas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Busca alergias
        $sql = 'SELECT * FROM alergias WHERE id_usuario = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $alergias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Busca alimentos bons
        $sql = 'SELECT * FROM bons WHERE id_usuario = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $bons = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Busca alimentos ruins
        $sql = 'SELECT * FROM ruins WHERE id_usuario = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $ruins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    error_log("Erro ao buscar dados: " . $e->getMessage());
    $erro = "Erro ao carregar dados. Tente novamente mais tarde.";
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo->beginTransaction();
        $id_usuario = $_SESSION['id'];

        // Remove apenas as respostas deste usuário
        $pdo->prepare("DELETE FROM respostas WHERE id_usuario = ?")->execute([$id_usuario]);
        $pdo->prepare("DELETE FROM doencas WHERE id_usuario = ?")->execute([$id_usuario]);
        $pdo->prepare("DELETE FROM alergias WHERE id_usuario = ?")->execute([$id_usuario]);
        $pdo->prepare("DELETE FROM bons WHERE id_usuario = ?")->execute([$id_usuario]);
        $pdo->prepare("DELETE FROM ruins WHERE id_usuario = ?")->execute([$id_usuario]);

        // Insere novas respostas relacionadas ao usuário
        $stmt = $pdo->prepare("INSERT INTO respostas (id_usuario, id_pergunta, resposta) VALUES (?, ?, ?)");
        
        if (isset($_POST['p1'])) {
            $stmt->execute([$id_usuario, 1, htmlspecialchars($_POST['p1'])]);
        }
        
        if (isset($_POST['p2'])) {
            $stmt->execute([$id_usuario, 2, htmlspecialchars($_POST['p2'])]);
        }

        // Processa doenças (apenas para este usuário)
        if (!empty($_POST['doencas'])) {
            $stmt = $pdo->prepare("INSERT INTO doencas (doenca, id_usuario) VALUES (?, ?)");
            foreach ($_POST['doencas'] as $d) {
                if ($d !== 'NULL') {
                    $stmt->execute([htmlspecialchars($d), $id_usuario]);
                }
            }
        }

        // Processa alergias (apenas para este usuário)
        if (!empty($_POST['alergias'])) {
            $stmt = $pdo->prepare("INSERT INTO alergias (alimento, id_usuario) VALUES (?, ?)");
            foreach ($_POST['alergias'] as $a) {
                if ($a !== 'NULL') {
                    $stmt->execute([htmlspecialchars($a), $id_usuario]);
                }
            }
        }
        if (!empty(trim($_POST['outro_alergia']))) {
                $stmt->execute([htmlspecialchars(trim($_POST['outro_alergia'])), $id_usuario]);
            }

        // Processa alimentos bons (apenas para este usuário)
        if (!empty($_POST['bons'])) {
            $stmtBons = $pdo->prepare("INSERT INTO bons (nome, id_usuario) VALUES (?, ?)");
            foreach ($_POST['bons'] as $b) {
                if ($b !== 'NULL') {
                    $stmtBons->execute([htmlspecialchars($b), $id_usuario]);
                }
            }
        }
        if (!empty(trim($_POST['outro_bons']))) {
            $stmtBons = $pdo->prepare("INSERT INTO bons (nome, id_usuario) VALUES (?, ?)");
            $stmtBons->execute([htmlspecialchars(trim($_POST['outro_bons'])), $id_usuario]);
        }

        // Processa alimentos ruins (apenas para este usuário)
        if (!empty($_POST['ruins'])) {
            $stmtRuins = $pdo->prepare("INSERT INTO ruins (nome, id_usuario) VALUES (?, ?)");
            foreach ($_POST['ruins'] as $r) {
                if ($r !== 'NULL') {
                    $stmtRuins->execute([htmlspecialchars($r), $id_usuario]);
                }
            }
        }
        if (!empty(trim($_POST['outro_ruins']))) {
            $stmtRuins = $pdo->prepare("INSERT INTO ruins (nome, id_usuario) VALUES (?, ?)");
            $stmtRuins->execute([htmlspecialchars(trim($_POST['outro_ruins'])), $id_usuario]);
        }
        
        $pdo->commit();
        $_SESSION['mensagem'] = "Dados atualizados com sucesso!";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        error_log("Erro ao salvar dados: " . $e->getMessage());
        $erro = "Erro ao salvar dados. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - iNutre</title>

    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
    <link rel="stylesheet" href="css/main3.css"> <!-- CSS -->
    <style>
        .erro { 
            color: red; 
            margin: 15px auto;
            max-width: 800px;
            padding: 10px;
            background: #ffeeee;
            border: 1px solid #ffcccc;
            border-radius: 4px;
        }
        
        .sucesso { 
            color: green; 
            margin: 15px auto;
            max-width: 800px;
            padding: 10px;
            background: #eeffee;
            border: 1px solid #ccffcc;
            border-radius: 4px;
        }
    </style>
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

    <?php if (!empty($erro)): ?>
        <div class="erro"><?= $erro ?></div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['mensagem'])): ?>
        <div class="sucesso"><?= $_SESSION['mensagem'] ?></div>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    

    <div class="form-container">
        <h1>Preencha seu questionário</h1>
        <form method="post" action="">
            <div class="secao">
                <h2>Informações básicas</h2>
                <label for="p1">Qual é seu principal objetivo com a plataforma?</label><br>
                <select name="p1" required>
                    <option value="">Selecione...</option>
                    <option value="Quero melhorar a relação com a comida">Quero melhorar a relação com a comida</option>
                    <option value="Quero criar hábitos saudáveis">Quero criar hábitos saudáveis</option>
                    <option value="Quero explorar novas possibilidades com as receitas">Quero explorar novas possibilidades com as receitas</option>
                    <option value="Quero uma ferramenta a mais no acompanhamento profissional">Quero uma ferramenta a mais no acompanhamento profissional</option>
                </select><br><br>

                <label for="p2">Por onde você nos conheceu?</label><br>
                <select name="p2" required>
                    <option value="">Selecione...</option>
                    <option value="Amigos e/ou familiares">Amigos e/ou familiares</option>
                    <option value="Recomendação do(a) meu(minha) nutri/psico">Recomendação do(a) meu(minha) nutri/psico</option>
                    <option value="Redes Sociais">Redes Sociais</option>
                    <option value="Caí de paraquedas">Caí de paraquedas</option>
                </select>
            </div>

            <div class="secao">
                <h2>Histórico de saúde</h2>
                <p>Você tem histórico de doenças? Se sim, selecione quais:</p>
                <label><input type="checkbox" name="doencas[]" value="NULL"> Não tenho</label><br><br>
                
                <label><input type="checkbox" name="doencas[]" value="Pré-diabetes"> Pré-diabetes</label><br>
                <label><input type="checkbox" name="doencas[]" value="Diabetes"> Diabetes</label><br>
                <label><input type="checkbox" name="doencas[]" value="Hipertensão"> Hipertensão arterial</label><br>
                <label><input type="checkbox" name="doencas[]" value="Hipotireoidismo"> Hipotireoidismo</label><br>
                <label><input type="checkbox" name="doencas[]" value="Hipertireoidismo"> Hipertireoidismo</label><br>
                <label><input type="checkbox" name="doencas[]" value="Obesidade"> Obesidade</label><br>
                <label><input type="checkbox" name="doencas[]" value="Dislipidemia"> Dislipidemia</label><br>
                <label><input type="checkbox" name="doencas[]" value="Hepatite"> Hepatite</label><br>
                <label><input type="checkbox" name="doencas[]" value="SM"> Síndrome metabólica</label><br>
                <label><input type="checkbox" name="doencas[]" value="Gastrite"> Gastrite</label><br>
                <label><input type="checkbox" name="doencas[]" value="Refluxo"> Refluxo</label><br>
                <label><input type="checkbox" name="doencas[]" value="Lúpus"> Lúpus</label><br>
                <label><input type="checkbox" name="doencas[]" value="Anemia"> Anemia</label><br>
                <label><input type="checkbox" name="doencas[]" value="Câncer"> Câncer</label><br>
                <label><input type="checkbox" name="doencas[]" value="Osteoporose"> Osteoporose</label><br>
                <label><input type="checkbox" name="doencas[]" value="Constipação"> Constipação</label><br>
                <input type="text" name="outro_doenca" placeholder="Outro (especifique)">
            </div>

            <div class="secao">
                <h2>Alergias alimentares</h2>
                <p>Possui alguma alergia alimentar?</p>
                <label><input type="checkbox" name="alergias[]" value="NULL"> Não tenho</label><br><br>
                
                <label><input type="checkbox" name="alergias[]" value="Glúten"> Glúten</label><br>
                <label><input type="checkbox" name="alergias[]" value="Lactose"> Lactose</label><br>
                <label><input type="checkbox" name="alergias[]" value="APLV"> APLV</label><br>
                <label><input type="checkbox" name="alergias[]" value="Ovo"> Ovo</label><br>
                <label><input type="checkbox" name="alergias[]" value="Amendoim"> Amendoim</label><br>
                <label><input type="checkbox" name="alergias[]" value="Frutos do mar"> Frutos do mar</label><br>
                <label><input type="checkbox" name="alergias[]" value="Soja"> Soja</label><br>
                <label><input type="checkbox" name="alergias[]" value="Gergelim"> Gergelim</label><br>
                <label><input type="checkbox" name="alergias[]" value="Oleaginosas"> Oleaginosas</label><br>
                <label><input type="checkbox" name="alergias[]" value="Peixes"> Peixes</label><br>
                <input type="text" name="outro_alergia" placeholder="Outro (especifique)">
            </div>

            <div class="secao">
                <h2>Preferências alimentares</h2>
                <p>Quais alimentos você MAIS gostaria que te fossem recomendados?</p>
                <label><input type="checkbox" name="bons[]" value="NULL"> Não tenho preferência</label><br><br>
                
                <label><input type="checkbox" name="bons[]" value="Legumes"> Legumes</label><br>
                <label><input type="checkbox" name="bons[]" value="Arroz"> Arroz</label><br>
                <label><input type="checkbox" name="bons[]" value="Feijão"> Feijão</label><br>
                <label><input type="checkbox" name="bons[]" value="Ovo"> Ovo</label><br>
                <label><input type="checkbox" name="bons[]" value="Amendoim"> Amendoim</label><br>
                <label><input type="checkbox" name="bons[]" value="Frutos do mar"> Frutos do mar</label><br>
                <label><input type="checkbox" name="bons[]" value="Carne bovina"> Carne bovina</label><br>
                <label><input type="checkbox" name="bons[]" value="Gergelim"> Gergelim</label><br>
                <label><input type="checkbox" name="bons[]" value="Oleaginosas"> Oleaginosas</label><br>
                <label><input type="checkbox" name="bons[]" value="Peixes"> Peixes</label><br>
                <input type="text" name="outro_bons" placeholder="Outro (especifique)">
            </div>

            <div class="secao">
                <p>Quais alimentos você NÃO gostaria que te fossem recomendados?</p>
                <label><input type="checkbox" name="ruins[]" value="NULL"> Não tenho restrições</label><br><br>
                
                <label><input type="checkbox" name="ruins[]" value="Coentro"> Coentro</label><br>
                <label><input type="checkbox" name="ruins[]" value="Cheiro verde"> Cheiro verde</label><br>
                <label><input type="checkbox" name="ruins[]" value="Alho"> Alho</label><br>
                <label><input type="checkbox" name="ruins[]" value="Frango"> Frango</label><br>
                <label><input type="checkbox" name="ruins[]" value="Peixe"> Peixe</label><br>
                <label><input type="checkbox" name="ruins[]" value="Miúdos/órgãos de animais"> Miúdos/órgãos de animais</label><br>
                <input type="text" name="outro_ruins" placeholder="Outro (especifique)">
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>

    <div class="respostas-container">
        <h1>Suas respostas</h1>
        
        <?php if (!empty($respostasPergunta)): ?>
        <div class="secao">
            <h2>Informações básicas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Pergunta</th>
                        <th>Resposta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($respostasPergunta as $id_pergunta => $resposta): ?>
                    <tr>
                        <td><?= htmlspecialchars($resposta['descricao']) ?></td>
                        <td><?= htmlspecialchars($resposta['resposta']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <h2>Histórico de doenças</h2>
        <?php if (!empty($doencas)): ?>
        <div class="secao">
            <ul>
                <?php foreach ($doencas as $d): ?>
                    <li><?= htmlspecialchars($d['doenca']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>
            <p>Dados não encontrados</p>
        <?php endif; ?>

        <h2>Alergias alimentares</h2>
        <?php if (!empty($alergias)): ?>
        <div class="secao">
            <ul>
                <?php foreach ($alergias as $a): ?>
                    <li><?= htmlspecialchars($a['alimento']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>
            <p>Dados não encontrados</p>
        <?php endif; ?>

        <h2>Alimentos preferidos</h2>
        <?php if (!empty($bons)): ?>
        <div class="secao">
            <ul>
                <?php foreach ($bons as $b): ?>
                    <li><?= htmlspecialchars($b['nome']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>
            <p>Dados não encontrados</p>
        <?php endif; ?>

        <h2>Alimentos não recomendados</h2>
        <?php if (!empty($ruins)): ?>
        <div class="secao">
            <ul>
                <?php foreach ($ruins as $r): ?>
                    <li><?= htmlspecialchars($r['nome']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>
            <p>Dados não encontrados</p>
        <?php endif; ?>

        <button onclick="document.querySelector('.form-container').style.display='block'; this.style.display='none';">Editar Respostas</button>
    </div>
</body>
</html>