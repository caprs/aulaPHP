<?php
session_start();

$filme = "";
$genero = "";
$imagem = "filme.jpeg";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filme = $_POST["nomeFilme"] ?? '';
    $genero = $_POST["generoFilme"] ?? '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Filmes</title>
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body{
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    header{
        width: 100%;
        max-width: 600px;
        text-align: center;
        padding: 20px;
        background: black;
        color: white;
        border-radius: 8px 8px 0 0;
    }

    header img{
        max-width: 500px;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    #formulario{
        width: 100%;
        max-width: 600px;
        padding: 20px;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        gap: 15px;

    }

    #formulario input{
        padding:12px;
        border:1px solid #ccc;
        border-radius: 6px;
        font-size:12px;
    }

    #formulario input:focus{
        outline:none;
        border-color: #3498db;
    }

    #formulario button{
        padding: 12px;
        border: none;
        background: black;
        color: white;
        font-size: 18px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

  

    footer {
        margin-top: 30px;
        text-align: center;
        font-size: 14px;
        color: #555;
    }
    </style>
        
</head>
<body>
    <?php include 'cabecalho.php'; ?>

    <form method="POST" action="" id="formulario">
        <input type="text" name="nomeFilme" required placeholder="Nome do filme">
        <input type="text" name="generoFilme" required placeholder="Gênero do filme">
        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php
            $cor = "black";
            if (($genero) == "terror") {
                $cor = "red";
                echo "Atenção! Filme de terror cadastrado";
            } elseif (($genero) == "comédia" || ($genero) == "comedia") {
                $cor = "green";
                echo "Esse filme promete boas risadas!";
            }
        ?>
        <p style="color: <?php echo $cor; ?>;">
            Filme cadastrado: <?php echo($filme); ?> (<?php echo ($genero); ?>)
        </p>
    <?php endif; ?>

    <?php include 'rodape.php'; ?>
</body>
</html>
