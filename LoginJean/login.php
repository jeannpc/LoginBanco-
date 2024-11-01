<?php

     //toda vez que formos trabalhar com sessão, temos que inicializar a sessão?
     session_start();
     //importar a classe:
     require "Contato.class.php";
     //checar se foi clicado no botão enviar dados
     if(isset($_POST['email'])  ){
        //copiar do post para variaveis locais
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //instanciar a classe Contato em uma variável $contato
        $contato = new Contato();
        
        //acessar o método checkUser enviando o email que foi digitado no formulario
        $existeCaba = $contato->checkUser($email);

        if (!empty($existeCaba)) {
            $chkPass = $contato->checkUserPass($email, $senha);
            if (!empty($chkPass)) {
                //o usuario digitou a existe e digitou a senha corretamente
                // !empty = se não estiver vazio
                $_SESSION['nome'] = $chkPass['nome'];
                header("location:index.php");
                exit();
            } else{
                echo "<script>alert('Senha incorreta')</script>";
            }

        } else {
            echo "<script>alert('Usuário ou senha inválidos')</script>";
            exit();
        }
     }

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="topo cor">
        <div class="data cor borda">
        
        </div>
        <spam class="fonte">
            Logomarca
        </spam> 
    </div>

    <div class="centraliza">
        <div class="formulario interna">
            <h3>Login</h3>
            <form action="" method="post">
                Email:
                <input type="text" name = "email" required class="i1">
                Senha:
                <input type="password" name = "senha" required class="i1">

                <p><a href="forgotpass.html" class = "esqueceu" >Esqueceu a senha?</a></p>
                <a href="cadastrar.php" class = "esqueceu">Cadastrar Novo Usuario</a>
                <input type="submit" name = "botao" value = "Enviar Dados" class = "centralizaBotao">
            </form>
        </div>
    </div>    
</body>
</html>