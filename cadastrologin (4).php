<?php
header("Content-type:text/html; charset=utf8");
session_start();
$nome = "";
$email = "";
$senha = "";
$endereco = "";
$perfil = "";
if( isset($_POST["salvar"])){ // tela de cadastro de usuario --> (tela de cadastro.html)
    if(isset($_POST["nome"]) && !empty($_POST["nome"])
        && isset($_POST["email"]) && !empty($_POST["email"])
        && isset($_POST["senha"]) && !empty($_POST["senha"])
        && isset($_POST["endereco"]) && !empty($_POST["endereco"])
        && isset($_POST["perfil"]) && !empty($_POST["perfil"])){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $endereco = $_POST["endereco"];
        $perfil = $_POST["perfil"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["senha"] = $_POST["senha"];
        echo <script>
                alert('Usuário cadastrado com sucesso!!'); // exibindo a mensagem
                window.location.href = '(tela de login.html)'; // redirecionando para o login
             </script>;
    }else{ // o usuario nao preencheu todos os campos do cadastro
        header("location: (tela de cadastro.php)");
    }
}else if(isset($_POST["entrar"])){ //tela de login --> (tela de login.html)
     if (isset($_POST["email"]) && !empty($_POST["email"])
          && isset($_POST["senha"]) && !empty($_POST["senha"])){
          $email = $_POST["email"]; //email informado pelo usuario
          $senha = $_POST["senha"]; //senha informada pelo usuario
          //validar o email e senha com valores armazenados na sessao
          if($_SESSION["email"] == $email) //validando apenas o email
              if($_SESSION["senha"] == $senha) { //validando apenas senha
                  echo <script>
                     alert('Bem vindo!'); // mensagem para login correto
                     window.location.herf = '(tela home.html)';
                     </script>
              }else{ // senha errada
                  echo  <script>
                        alert('Senha incorreta!');
                        window.location.herf = '(tela de login.html)';
                        </script>;


              }
          }else{ //email incorreto
              echo <script>
                        alert('Email incorreto!');
                        window.location.herf = '(tela de login.html)';
                        </script>;
}

    header("location: (tela de login.html)");
?>
