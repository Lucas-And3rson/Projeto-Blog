<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/css/links.css">
    <link rel="stylesheet" href="assets/css/media-query.css">

    <title>Cadastro</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    
</head>
<body>
    <main>
    <nav>
        <div class="lua"><i class="fa-regular fa-moon"></i></div>
        <div class="sol"><i class="fa-regular fa-sun"></i></div>
        <ul>
            <li> <a href="home.php">inicio</a></li>
            <li><a href="login.php">entrar</a></li>
        </ul>
    </nav>
        <section id="login">
            <div id="imagem">
                <!-- Aqui vai a imagem nas CSS -->
            </div>
            <div id="formLogin">
                <h1>Cadastro</h1>
                <p>Seja bem-vindo(a) novamente. Faça login para acessar sua conta.</p>

                <?php 

                    if(isset($_POST['submit']))
                    {
                    /* aparecendo na tela as informações:
                        print_r("Nome: " . $_POST['nome']);
                        print_r("<br>");
                        print_r("Email: " .$_POST['email']);
                        print_r("<br>");
                        print_r("Senha: " .$_POST['senha']);
                        */

                        // passando as informações de todos os inputs para o banco de dados

                        include_once('config.php');
                        
                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];

                        /*Verificando se o email e senha já existem*/ 

                        $sqlEmail = "SELECT * FROM usuarios WHERE email = '$email'";
                        $resultEmail = $conexao->query($sqlEmail);

                        $sqlSenha = "SELECT * FROM usuarios WHERE senha = '$senha'";
                        $resultSenha = $conexao->query($sqlSenha);

                        if(mysqli_num_rows($resultEmail) == 1)
                        { ?>
                            <p class="msgErro">Email já cadastrado! Troque o seu email.</p>
    <?php                   }else{
                            if(mysqli_num_rows($resultSenha) == 1){ ?>
                                <p class="msgErro">Essa senha pode ter sido utilizada, tente uma mais forte!</p>
    <?php                       } else{
                                $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha)
                                VALUES ('$nome', '$email', '$senha')"); ?>
                                <p class="msgErro">Cadastro feito com sucesso! Volte agora para fazer o seu login.</p>
                       <?php     }
                        }
                    }
                    ?>
                <form  action="cadastro.php" method = "POST" autocomplete="on">
                    <div class="campo">
                        <i class="material-symbols-outlined">person</i>
                        <input type="text" name="nome" id="nome" placeholder="seu nome" autocomplete="nome" required="" maxlength="40">
                        <label for="nome">Login</label>
                    </div>
                    <div class="campo">
                        <i class="material-symbols-outlined">mail</i>
                        <input type="email" name="email" id="email" placeholder="seu e-mail" autocomplete="email" required="" maxlength="40">
                        <label for="email">Login</label>
                    </div>
                    <div class="campo">
                        <i class="material-symbols-outlined">key</i>
                        <input type="password" name="senha" id="isenha" placeholder="sua senha" autocomplete="current-password" required="" minlength="8" maxlength="32">
                        <label for="isenha">Senha</label>
                    </div>
                    <input type="submit" class = "entrar" name="submit" id="submit" value = "Entrar">
                </form>
            </div>
        </section>
    </main>
    <script src = "assets/js/script.js"></script>

<reclameaqui-extension-pin><section></section></reclameaqui-extension-pin></body>
    
</html>
