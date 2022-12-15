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

    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    
</head>
<body>
    <main>
    <nav>
        <div class="lua"><i class="fa-regular fa-moon"></i></div>
        <div class="sol"><i class="fa-regular fa-sun"></i></div>
        <ul>
            <li> <a href="home.php">inicio</a></li>
            <li><a href="cadastro.php">cadastrar</a></li>
        </ul>
    </nav>
        <section id="login">
            <div id="imagem">
                <!-- Aqui vai a imagem nas CSS -->
            </div>
            <div id="formLogin">
                <h1>Login</h1>
                <p>Seja bem-vindo(a) novamente. Faça login para acessar sua conta.</p>

                <?php
                     if(isset($_POST['submit'])){
                        session_start();
                        include_once('config.php');
                
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        /*
                        print_r('Email: ' . $email);
                        print_r('<br>');
                        print_r('Senha: ' . $senha);
                        */
                
                        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
                        $result = $conexao->query($sql);
                
                       // print_r($result);
                        
                
                        if(mysqli_num_rows($result) < 1){
                            unset($_SESSION ['email']);
                            unset($_SESSION ['senha']); ?>

                            <p class="msgErro">Essa conta não existe, faça seu cadastro primeiro!</p>
                    <?php
                        }
                        else{
                            $_SESSION ['email'] = $email;
                            $_SESSION ['senha'] = $senha;
                            header('Location: sistema.php');
                        }
                     }
                ?>
                <form  action="login.php" method = "POST" autocomplete="on">
                    <div class="campo">
                        <i class="material-symbols-outlined">person</i>
                        <input type="email" name="email" id="email" placeholder="seu e-mail" autocomplete="email" required="" maxlength="40">
                        <label for="email">Login</label>
                    </div>
                    <div class="campo">
                        <i class="material-symbols-outlined">key</i>
                        <input type="password" name="senha" id="isenha" placeholder="sua senha" autocomplete="current-password" required="" minlength="8" maxlength="20">
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
