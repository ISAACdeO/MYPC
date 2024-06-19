<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Faça Login para continuar</h2>
    <?php

   if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
   }

    ?>
    <form method="POST" action="valida.php">
         <label>Usuario</label>
         <input type="text" name = "usuario" placeholder="Digite o seu usario"><br><br>

         <label>Senha</label>
         <input type="password" name = "senha" placeholder="Digite o sua senha"><br><br>

         <input type = "submit" name="btnLogin" value="Acessar">


         <h4>Voce não possui uma conta ?</h4>
         <a href="cadastrar.php">Cria gratis</a>
</form>
</body>
</html>