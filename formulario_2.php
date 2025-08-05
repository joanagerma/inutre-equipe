<?php
session_start();
require 'cnx.php';

$forms = [];
$doencas = [];
$alergias = [];
$bons = [];
$ruins = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = 'SELECT * FROM cadastro_2 WHERE id_usuario = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $forms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM doencas WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $doencas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM alergias WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $alergias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM bons WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $bons = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM ruins WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $ruins = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Conhecimento - iNutre</title>
    <link rel="icon" type="image/x-icon" href="imgTCC/logo-flor.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <form action="" method="get">
            <label for="id">Digite o ID do usuário que deseja visualizar: </label>
            <input type="number" name="id" placeholder="ID: " required>
            <button type="submit" name="Buscar">Buscar</button>
        </form>
        
        <?php if (count($forms) > 0): ?> <!--vai contar quantos dados tem no array e verificar se é um número maior que 0 -->
            <h2>Perguntas</h2>
            <table> <!--mostra os dados do banco na tabela-->
                <?php foreach($forms as $f): ?>
                    <thead>
                        <tr>
                            <th>Pergunta 1</th>
                            <th>Pergunta 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($f['id_res']) ?></td>
                            <td><?= htmlspecialchars($f['id_res']) ?></td>  
                        </tr>
                    </tbody>
                <?php endforeach; ?>
                <?php else: ?>
                    <div>
                        <p style="text-align: left; font-size: 18px; color: #555; margin: 30px 0;">Nenhum dado encontrado</p>
                    </div>
                <?php endif; ?>
            </table>
        

        <h2>Doenças</h2>
        <?php if (count($doencas) > 0): ?> <!--vai contar quantos dados tem no array e verificar se é um número maior que 0 -->
            <table> <!--mostra os dados do banco na tabela-->
                <tbody>
                    <?php foreach($doencas as $d): ?>
                    <tr>
                        <td><?= htmlspecialchars($d['doenca']) ?></td>  
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div>
                <p style="text-align: left; font-size: 18px; color: #555; margin: 30px 0;">Nenhum dado encontrado</p>
            </div>
        <?php endif; ?>

        <h2>Alergias</h2>
        <?php if (count($alergias) > 0): ?> <!--vai contar quantos dados tem no array e verificar se é um número maior que 0 -->
            <table> <!--mostra os dados do banco na tabela-->
                <tbody>
                    <?php foreach($alergias as $a): ?>
                    <tr>
                        <td><?= htmlspecialchars($a['alimento']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div>
                <p style="text-align: left; font-size: 18px; color: #555; margin: 30px 0;">Nenhum dado encontrado</p>
            </div>
        <?php endif; ?>

        <h2>Recomendar</h2>
        <?php if (count($bons) > 0): ?> <!--vai contar quantos dados tem no array e verificar se é um número maior que 0 -->
            <table> <!--mostra os dados do banco na tabela-->
                <tbody>
                    <?php foreach($bons as $b): ?>
                    <tr>
                        <td><?= htmlspecialchars($b['nome']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div>
                <p style="text-align: left; font-size: 18px; color: #555; margin: 30px 0;">Nenhum dado encontrado</p>
            </div>
        <?php endif; ?>

        <h2>Não recomendar</h2>
        <?php if (count($ruins) > 0): ?> <!--vai contar quantos dados tem no array e verificar se é um número maior que 0 -->
            <table> <!--mostra os dados do banco na tabela-->
                <tbody>
                    <?php foreach($ruins as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['nome']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div>
                <p style="text-align: left; font-size: 18px; color: #555; margin: 30px 0;">Nenhum dado encontrado</p>
            </div>
        <?php endif; ?>
    </div>

    
</body>
</html>