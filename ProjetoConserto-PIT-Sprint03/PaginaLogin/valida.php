<?php 
session_start();
include_once('../Conexao.PHP'); 
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_SPECIAL_CHARS);

if($btnLogin){
 $usuario = $btnLogin = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
 $senha = $btnLogin = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
 //echo "$usuario - $senha";
if((!empty($usuario)) AND (!empty($senha))){
     //GERAR a SENHA criptografada
     //echo password_hash($senha,PASSWORD_DEFAULT);

     $result_usuario = "SELECT id , nome , email , senha From usuarios WHERE usuario='$usuario' LIMIT 1";
     $resultado_usuario = mysqli_query($conn, $result_usuario);
     if($resultado_usuario){
          $row_usuario = mysqli_fetch_assoc( $resultado_usuario);
          if(password_verify($senha, $row_usuario['senha'])){
               $_SESSION['id'] = $row_usuario['id'];
               $_SESSION['nome'] = $row_usuario['nome'];
               $_SESSION['email'] = $row_usuario['email'];
               header("Location: ../PaginaIncial.php");
          }
          else {
               $_SESSION['msg'] = "Login e senha incorreto! ";

               header("Location: login.php");
          }

     }
}

else{
    $_SESSION['msg'] = "Login e Senha incorreta!";
 header("Location:login.php");
}

}else{
 $_SESSION['msg'] = "Página não encontrada";
 header("Location:login.php");

}





?>