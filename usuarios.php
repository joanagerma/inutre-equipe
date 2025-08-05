<?php
session_start();
require 'cnx.php';

$plano = $_SESSION['plano'] ?? '';
$usuarios = [];
$sql = 'SELECT * FROM cadastro_usuarios';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - iNutre</title>
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
                font-family: Arial, sans-serif; 
                line-height: 1.6; 
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }

            header {
                width: 100%;
                background-color: darkgreen; 
                color: white;
                position: sticky;
                top: 0;
                z-index: 100;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }

            h1{
                font-family: 'quisemi';
                font-size: 40px;
                margin: 0;
                padding: 15px 20px;
            }

            h3{
                font-family: 'quisemi';
                font-size: 20px;
                text-align: center;
                margin: 50px;
            }

            nav {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0;
            }

            nav ul {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
            }

            nav ul li {
                margin: 0;
                padding: 0;
            }

            nav ul li a{
                text-decoration: none;
                color: white;
                display: block;
                padding: 20px 15px;
                transition: background-color 0.3s;
            }

            nav ul li a:hover {
                background-color: rgba(255,255,255,0.1);
            }

            .logout {
                background: transparent;
                border: 1px solid white;
                color: white;
                padding: 8px 15px;
                margin-left: 15px;
                cursor: pointer;
                transition: all 0.3s;
            }

            .logout:hover {
                background: white;
                color: darkgreen;
            }

            .logout a {
                color: inherit;
                text-decoration: none;
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
                <li><a href="index.php">Início</a></li>
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

    <div class="container">
    <h1>Dados dos usuários:</h1>

    <?php if (count($usuarios) > 0): ?> <!--vai contar quantos dados tem no array e verificar se é um número maior que 0 -->
        <table> <!--mostra os dados do banco na tabela-->
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nome de usuário</th>
                    <th>Data de nascimento</th>
                    <th>Gênero</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Plano</th>
                    <th>Renovado até</th>
                    <th>Foto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['nome_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['nickname']) ?></td>
                    <td><?= htmlspecialchars($usuario['data_nasc']) ?></td>
                    <td><?= htmlspecialchars($usuario['genero']) ?></td>
                    <td><?= htmlspecialchars($usuario['telefone']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['plano']) ?></td>
                    <td><?= htmlspecialchars($usuario['premium_expires']) ?></td>
                    <td>
                        <?php if (!empty($usuario['foto'])): ?>
                            <img src="uploads/<?= htmlspecialchars($usuario['foto']) ?>" width="60">
                        <?php else: ?>
                            Sem foto
                        <?php endif; ?>
                    </td>    
                    <td>
                        <form action="editar_novo.php" method="POST">
                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                            <button type="submit" class="button action">Editar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
</form>
    <?php else: ?>
        <div>
            <p style="text-align: center; font-size: 18px; color: #555; margin: 30px 0;">Nenhum dado encontrado</p>
        </div>
    <?php endif; ?>

</div>

    
</body>
</html>