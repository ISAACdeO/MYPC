<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendações de Peças</title>
   
</head>
<body>
<header>
    <div class="Container-1">
        <h1>Recomendações de Peças</h1>
        <h2>Aqui você seleciona suas peças que melhor te adequam e te envia para os sites dos vendedores</h2>
    </div>
</header>
<div class="Container-2">
    <ul>
        <li><button class="btn"><a href="PlacadeVideo/PlacadeVideo.php" style="color: inherit; text-decoration: none;">Placa de Vídeo</a></button></li>
        <li><button class="btn"><a href="Processador/Processador.php" style="color: inherit; text-decoration: none;">Processadores</a></button></li>
        <li><button class="btn"><a href="PlacaMae/PlacaMae.php" style="color: inherit; text-decoration: none;">Placa Mãe</a></button></li>
        <li><button class="btn"><a href="Gabinete/Gabinete.php" style="color: inherit; text-decoration: none;">Gabinete</a></button></li>
        <li><button class="btn"><a href="Fonte/Fonte.php" style="color: inherit; text-decoration: none;">Fonte</a></button></li>
        <li><button class="btn"><a href="RAM/RAM.php" style="color: inherit; text-decoration: none;">Memória Ram</a></button></li>
    </ul>
</div>
</body>
</html>



<style>
        body, h1, h2, ul, li, a, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #EAD0D0;
            color: #333;
        }

        header {
            width: 100%;
            background-color: white;
            color: black;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        .Container-1 h1, .Container-1 h2 {
            margin-bottom: 10px;
        }

        .Container-2 {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        button.btn {
            background-color:#BC8F8F	;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button.btn:hover {
            background-color: #45a049;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>