<?php
session_start();
require 'cnx.php';

$erro = '';
$sucesso = '';
$etapa = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Etapa 1: Buscar pergunta
    if (isset($_POST['buscar_pergunta'])) {
        $usuario = trim($_POST['usuario'] ?? '');
        
        if (empty($usuario)) {
            $erro = 'Por favor, digite seu nome de usuário';
            $etapa = 1;
        } else {
            try {
                $stmt = $pdo->prepare("SELECT id, pergunta_seguranca FROM cadastro_usuarios WHERE nickname = ? LIMIT 1");
                $stmt->execute([$usuario]);
                $user = $stmt->fetch();

                if ($user) {
                    $_SESSION['recupera_usuario_id'] = $user['id'];
                    $_SESSION['recupera_pergunta'] = $user['pergunta_seguranca'];
                    $etapa = 2;
                } else {
                    $erro = 'Quando os dados estiverem corretos, você receberá uma pergunta de segurança';
                    $etapa = 1;
                }
            } catch (PDOException $e) {
                error_log("Erro ao buscar usuário: " . $e->getMessage());
                $erro = 'Ocorreu um erro inesperado. Tente novamente mais tarde.';
                $etapa = 1;
            }
        }
    }

    // Etapa 2: Verificar resposta
    if (isset($_POST['verificar_resposta'])) {
        $resposta = trim(strtolower($_POST['resposta'] ?? ''));
        
        if (empty($resposta)) {
            $erro = 'Por favor, digite sua resposta';
            $etapa = 2;
        } elseif (!isset($_SESSION['recupera_usuario_id'])) {
            $erro = 'Sessão expirada. Por favor, comece novamente.';
            $etapa = 1;
            session_unset();
        } else {
            try {
                $stmt = $pdo->prepare("SELECT resposta_seguranca FROM cadastro_usuarios WHERE id = ? LIMIT 1");
                $stmt->execute([$_SESSION['recupera_usuario_id']]);
                $user = $stmt->fetch();

                if ($user && password_verify($resposta, $user['resposta_seguranca'])) {
                    $etapa = 3;
                } else {
                    $erro = 'Resposta incorreta. Tente novamente.';
                    $etapa = 2;
                }
            } catch (PDOException $e) {
                error_log("Erro ao verificar resposta: " . $e->getMessage());
                $erro = 'Ocorreu um erro inesperado. Tente novamente mais tarde.';
                $etapa = 2;
            }
        }
    }

    // Etapa 3: Alterar senha
    if (isset($_POST['alterar_senha'])) {
        $nova_senha = $_POST['nova_senha'] ?? '';
        $repetir_senha = $_POST['repetir_senha'] ?? '';
        
        if (empty($nova_senha) || empty($repetir_senha)) {
            $erro = 'Por favor, preencha ambos os campos de senha';
            $etapa = 3;
        } elseif (strlen($nova_senha) < 8) {
            $erro = 'A senha deve ter pelo menos 8 caracteres';
            $etapa = 3;
        } elseif ($nova_senha !== $repetir_senha) {
            $erro = 'As senhas não coincidem';
            $etapa = 3;
        } elseif (!isset($_SESSION['recupera_usuario_id'])) {
            $erro = 'Sessão expirada. Por favor, comece novamente.';
            $etapa = 1;
            session_unset();
        } else {
            try {
                $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
                $update = $pdo->prepare("UPDATE cadastro_usuarios SET senha = ? WHERE id = ?");
                
                if ($update->execute([$nova_senha_hash, $_SESSION['recupera_usuario_id']])) {
                    $sucesso = 'Senha alterada com sucesso! Redirecionando para login...';
                    $etapa = 1;
                    
                    // Limpar sessão e redirecionar após 3 segundos
                    session_unset();
                    header("Refresh: 3; url=login.php");
                } else {
                    $erro = 'Erro ao atualizar a senha. Tente novamente.';
                    $etapa = 3;
                }
            } catch (PDOException $e) {
                error_log("Erro ao atualizar senha: " . $e->getMessage());
                $erro = 'Ocorreu um erro inesperado. Tente novamente mais tarde.';
                $etapa = 3;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha - iNutre</title>

    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
    <link rel="stylesheet" href="css/main2.css"> <!-- CSS -->
</head>
<body>

    <section class="recuperar">
        <div class="container-r">
            <!--Mensagem de erro ou sucesso-->
            <?php if ($erro): ?>
                <div class="error-message"><?= htmlspecialchars($erro) ?></div>
            <?php elseif ($sucesso): ?>
                <div class="success-message"><?= htmlspecialchars($sucesso) ?></div>
            <?php endif; ?>

            <h2>Recuperar Senha</h2>
            <p>Preencha a credencial para recuperar sua senha</p>

            <!-- Etapa 1: nome de usuário -->
            <?php if ($etapa == 1): ?>
                <div class="form-r">
                    <form method="POST">
                        <div class="input-box-r">
                            <input id="usuario" type="text" name="usuario" placeholder="Digite seu usuário" required>
                        </div>

                        <button type="submit" name="buscar_pergunta" class="login-btn-r">Buscar Pergunta</button>
                    </form>
                    <p class="voltar">Voltar à página de <a href="login.php">Login</a></p>
                </div>
            <?php endif; ?>

            <!-- Etapa 2: pergunta de segurança-->
            <?php if ($etapa == 2): ?>
                <div class="form-r">
                    <form method="POST">
                        <p><strong>Pergunta de Segurança:</strong> <?= htmlspecialchars($_SESSION['recupera_pergunta']) ?></p>
                        <div class="input-box-r">
                            <input id="resposta" type="text" name="resposta" placeholder="Digite sua resposta" required>
                        </div>

                        <button type="submit" name="verificar_resposta" class="login-btn-r">Verificar Resposta</button>
                    </form>
                    <p class="voltar">Voltar à página de <a href="login.php">Login</a></p>
                </div>
            <?php endif; ?>

            <!-- Etapa 3: redefinição e senha -->
            <?php if ($etapa == 3): ?>
                <div class="form-r">
                    <form method="POST">
                        <div class="input-box-r">
                            <input type="password" name="nova_senha" placeholder="Nova Senha" required>
                        </div>
                        <div class="input-box-r">
                            <input type="password" name="repetir_senha" placeholder="Repetir Nova Senha" required>
                        </div>
                        <button type="submit" name="alterar_senha" class="login-btn-r">Alterar Senha</button>
                    </form>
                </div>
            <?php endif; ?>

            

            


        </div>
    </section>

    <script src="main.js"></script> <!-- JS -->
</body>
</html>