<?php
require 'cnx.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nome = $_POST['nome_usuario'] ?? '';
    $nickname = $_POST['nickname'] ?? '';
    $data_nasc = $_POST['data_nasc'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $plano = $_GET['plano'] ?? NULL;
    if ($plano == '1'|| $plano == '4')
    {
        $premium_expires = NULL;
    }
    elseif ($plano == '2' || $plano == '3')
    {
        $hoje = new DateTime();
        $hoje->modify('+1 month');
        $premium_expires = $hoje->format('Y-m-d');
    }

    $foto = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION); 
        $foto = uniqid() . '.' . $ext; 
        move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $foto); 
        // Você pode salvar $foto no banco se quiser
    }

    $cep = $_POST['cep'] ?? '';
    $pergunta_seguranca = $_POST['pergunta_seguranca'];
    $resposta_seguranca = strtolower(trim($_POST['resposta_seguranca'])); 
    $resposta_hash = password_hash($resposta_seguranca, PASSWORD_DEFAULT);
            
    $sql = "INSERT INTO cadastro_usuarios 
        (nome_usuario, nickname, data_nasc, genero, telefone, email, senha, plano, premium_expires, foto, cep, pergunta_seguranca, resposta_seguranca) 
        VALUES (:nome_usuario, :nickname, :data_nasc, :genero, :telefone, :email, :senha, :plano, :premium_expires, :foto, :cep, :pergunta_seguranca, :resposta_seguranca)";
        
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome_usuario' => $nome,
        ':nickname' => $nickname,
        ':data_nasc' => $data_nasc,
        ':genero' => $genero,
        ':telefone' => $telefone,
        ':email' => $email,
        ':senha' => password_hash($senha, PASSWORD_DEFAULT),
        ':plano' => $plano,
        ':premium_expires' => $premium_expires,
        ':foto' => $foto,
        ':cep' => $cep,
        ':pergunta_seguranca' => $pergunta_seguranca,
        ':resposta_seguranca' => $resposta_hash

    ]);

    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - iNutre</title>

    <link rel="icon" type="image/x-icon" href="img/logo-flor.png"> <!-- Ícone -->
    <link rel="stylesheet" href="css/main2.css"> <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/> <!-- Swiper JS -->
</head>
<body>
    <section class="cadastro">
        <div class="container-c">
            <div class="form-image">
                <img src="img/cadastro-w.jpg">
            </div>

            <div class="form-c">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-header-c">
                        <div class="title-c">
                            <h2>Cadastre-se</h2>
                        </div>
                        <div class="cadastro-button">
                            <a href="login.php" role="button">Fazer Login</a>
                        </div>
                    </div>

                    <div class="input-group-c">
                        <div class="input-box-c">
                            <label for="nome_usuario">Nome Completo</label>
                            <input id="nome_usuario" type="text" name="nome_usuario" placeholder="Digite seu nome completo" required>
                        </div>

                        <div class="input-box-c">
                            <label for="nickname">Nome de Usuário</label>
                            <input id="nickname" type="text" name="nickname" placeholder="Digite seu usuário" required>
                        </div>

                        <div class="input-box-c">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" placeholder="Digite seu email" required>
                        </div>

                        <div class="input-box-c">
                            <label for="telefone">Telefone</label>
                            <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" required>
                        </div>

                        <div class="input-box-c">
                            <label for="cep">CEP</label>
                            <input id="cep" type="text" name="cep" placeholder="Digite seu CEP" required>
                        </div>

                        <div class="input-box-c">
                            <label for="senha">Senha</label>
                            <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                        </div>

                        <div class="input-box-c">
                            <label for="data_nasc">Data de Nascimento</label>
                            <input id="data_nasc" type="date" name="data_nasc" placeholder="Digite sua data de nascimento" required>
                        </div>

                        <div class="input-box-c">
                            <label for="pergunta_seguranca">Pergunta de Segurança</label>
                            <select name="pergunta_seguranca" required>
                                <option value="Selecione uma Pergunta">Selecione uma Pergunta</option>
                                <option value="Qual o nome do seu primeiro animal de estimação?">Qual o nome do seu primeiro animal de estimação?</option>
                                <option value="Qual o nome da sua mãe solteira?">Qual o nome da sua mãe solteira?</option>
                                <option value="Qual o nome da sua escola primária?">Qual o nome da sua escola primária?</option>
                                <option value="Qual sua cidade natal?">Qual sua cidade natal?</option>
                            </select>
                        </div>

                        <div class="input-box-c">
                            <label for="resposta_seguranca">Resposta de Segurança</label>
                            <input id="resposta_seguranca" type="text" name="resposta_seguranca" placeholder="Digite sua resposta" required>
                        </div>
                    </div>

                    <div class="gender-input-c">
                        <div class="gender-title-c">
                            <h6>Gênero</h6>
                        </div>

                        <div class="gender-group">
                            <div class="gender-input">
                                <input type="radio" id="female" name="genero">
                                <label for="female">Feminino</label>
                            </div>

                            <div class="gender-input">
                                <input type="radio" id="male" name="genero">
                                <label for="male">Masculino</label>
                            </div>

                            <div class="gender-input">
                                <input type="radio" id="others" name="genero">
                                <label for="other">Outros</label>
                            </div>

                            <div class="gender-input">
                                <input type="radio" id="none" name="genero">
                                <label for="none">Prefiro não dizer</label>
                            </div>
                        </div>
                    </div>

                    <div class="continue-button">
                        <input type="submit" value="Continuar">
                    </div>

                </form>
            </div>
        </div>
    </section>
    
</body>
</html>