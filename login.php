<?php
session_start();
require 'cnx.php';

    $mensagem = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM cadastro_usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['plano'] = $usuario['plano'];
        $_SESSION['premium_expires'] = $usuario['premium_expires'];

        if ( //se estiver vazio, é básico, então não conta. se a data for menor que o dia de hoje, expirou.
            ($usuario['plano'] == 'premium' || $usuario['plano'] == 'profissional') &&
            (!empty($usuario['premium_expires']) && $usuario['premium_expires'] < date('Y-m-d'))
        ) {
            $sql = "UPDATE cadastro_usuarios SET plano = 'basico', premium_expires = NULL WHERE id = :id;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $_SESSION['id']]);
            
            $mensagem = "Parece que seu plano expirou :(... Para continuar com os benefícios adicionais do iNUTRE, renove sua assinatura.";
            
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $mensagem = "E-mail ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - iNutre</title>

    <link rel="stylesheet" href="css/main2.css"> <!-- CSS -->
    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
</head>
<body>

    <section class="login">
        <div class="wrapper-l">
            <form method="post" action="">
                <div class="title-l">
                    <h2>Faça Login</h2>
                    <p>Preencha as seguintes credenciais para acessar sua conta iNutre</p>
                </div>

                <div class="input-box-l">
                    <input id="email" type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-box-l">
                    <input id="senha" type="password" name="senha" placeholder="Senha" required>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox"> Me Lembrar</label>
                    <a href="esqueci_senha.php">Esqueci minha senha</a>
                </div>

                <div class="continue-button-l">
                    <input type="submit" value="Continuar">
                </div>

                <div class="cadastro-l">
                    <p>Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se</a> </p>
                    <p>Voltar a  <a href="pagina_inicial.php">página inicial</a> </p>
                </div>
            </form>

            <div class="mensagem">
              <h4><?= htmlspecialchars($mensagem) ?></h4>
            </div>
        </div>
    </section>

</body>
</html>