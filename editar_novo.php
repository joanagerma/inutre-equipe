<?php
require 'cnx.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
} 
else {
    die('ID do usuário não fornecido.');
}

// Busca pelos dados do usuário com o id referido
$sql = 'SELECT * FROM cadastro_usuarios WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); //id é um parâmetro inteiro
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC); //array associativo

if (!$usuario) {
    die('Usuário não encontrado.');
}

// Se o formulário for enviado para salvar alterações
if (isset($_POST['atualizar'])) {
    $nome_usuario = $_POST['nome_usuario'];
    $data_nasc = $_POST['data_nasc'];
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $foto = $usuario['foto']; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        if ($foto && file_exists("uploads/$foto")) {
            unlink("uploads/$foto");
        }

        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/$foto");
    }

    $sql = 'UPDATE cadastro_usuarios SET nome_usuario = :nome_usuario, data_nasc = :data_nasc, genero = :genero, telefone = :telefone, email = :email, foto = :foto WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome_usuario' => $nome_usuario,
        ':data_nasc' => $data_nasc,
        ':genero' => $genero,
        ':telefone' => $telefone,
        ':email' => $email,
        ':foto' => $foto,
        ':id' => $id
    ]);

    header('Location: usuarios.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário - iNutre</title>
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
    <h2>Editar Usuário</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome_usuario" value="<?= htmlspecialchars($usuario['nome_usuario']) ?>" required><br><br>

        <label>Data de nascimento:</label><br>
        <input type="date" name="data_nasc" value="<?= htmlspecialchars($usuario['data_nasc']) ?>" required><br><br>

        <label for="genero">Gênero:</label><br>
        <select name="genero">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select><br><br>

        <label>Telefone:</label><br>
        <input type="tel" name="telefone" value="<?= htmlspecialchars($usuario['telefone']) ?>" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br><br>

        <label>Foto Atual:</label><br>
        <?php if (!empty($usuario['foto'])): ?>
            <img src="uploads/<?= htmlspecialchars($usuario['foto']) ?>" width="100"><br>
        <?php else: ?>
            Nenhuma foto.
        <?php endif; ?>
        <br>
        <label>Alterar Foto:</label><br>
        <input type="file" name="foto"><br><br>

        <button type="submit" name="atualizar">Salvar Alterações</button>
    </form>
</body>
</html>
