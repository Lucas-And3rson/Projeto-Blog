<?php
session_start();
require_once 'assets/classes/comentarios.php';
//entrando no BD e acionando função buscarComentários
$c = new Comentario("syscomentario", "localhost", "root", "");
$coments = $c->buscarComentarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/sistema.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="lua"><i class="fa-regular fa-moon"></i></div>
        <div class="sol"><i class="fa-regular fa-sun"></i></div>
        <ul>
            <li> <a href="home.php">inicio</a></li>
            <li><a href="cadastro.php">cadastrar</a></li>
        </ul>
    </nav>
  
    <section class = "comentario">
        <h2>Deixe seu comentário</h2>
        <form method="POST">
            <img src="assets/img/PERFIL.jpg" alt="perfil">
            <textarea name='texto' placeholder="digite seu comentário"></textarea>
            <input type="submit" value="PUBLICAR">
        </form>
        <?php
        if(count($coments) > 0)//se tiver comentarios no BD
        {
            //foreach percorre linha por linha, verificando os dados
            foreach($coments as $v){ ?>
            <div class = "areaComentarios">
            <img src="assets/img/PERFIL.jpg" alt="perfil">
            <h3><?php echo $v[nome_pessoa];?></h3>
            <h4>
                <?php
                //mudando a data para aparecer da forma do Brasil: dia/mês/ano
                $data = new dataTime($v['dia']);
                echo $data->format('d/m/Y');
                echo " - ";
                echo $v['horario'];
                ?>
                <a href="">Excluir</a>
            </h4>
            <p><?php echo $v['comentarios'];?></p>
            </div>
           <?php }
        } else{
            echo "ainda não há comentarios!";
        }
        /* mostra o que tem no BD
        echo "<pre>";
        var_dump($coments);
        echo "</pre>";
        */
        ?>
        

    </section>
    <script src="assets/js/script.js"></script>
</body>
</html>

<?php
if(isset($_POST['texto'])){
    $texto = addslashes($_POST['texto']);
    $c->inserirComentario($_SESSION, $texto);
    header("location: sistema.php");
}
?>