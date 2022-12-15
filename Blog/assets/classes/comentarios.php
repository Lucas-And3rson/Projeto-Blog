<?php
        $dbHost = 'Localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'syscomentario';
    
        $conexao = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName);

        //se baseando no horário de São Paulo
        date_default_timezone_set('America/Sao_Paulo');
    Class Comentario{
        private $pdo;

        //construtor
        public function __construct( $dbname, $host, $usuario, $senha){
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);
            } catch(PDOException $e){
                echo "Erro com BD: " .$e->getMensage();
            }catch(Exception $e){
                echo "Erro: " .$e->getMensage();
            }
        }
        public function buscarComentarios(){
            $cmd = $this->pdo->prepare ("SELECT *, (SELECT nome FROM usuarios WHERE id = fk_id_usuario) as nome_pessoa FROM comentarios ORDER BY dia,horario DESC");
            $cmd->execute();
            $dados = $cmd->fetchALL(PDO::FETCH_ASSOC);
            return $dados;
            // id, comentario, dia, horario, nome_pessoa
           }

        public function inserirComentario($id_usuario, $comentario){
            $cmd = $this->pdo->prepare("INSERT INTO comentarios (comentarios, dia, horario, fk_id_usuario) VALUES (:c, :d, :h, :fk)");
            $cmd->bindValue(":c",$comentario);
            $cmd->bindValue(":d", date('Y-m-d'));
            $cmd->bindValue(":h",date('H:i'));
            $cmd->bindValue(":fk",$id_usuario);
            $cmd->execute();

        }
        /*
        //cadastrar
        public function cadastrar($nome, $email, $senha){
            //verificar se usuário já está cadastrado
            $cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e")
        }
    }
    public function buscarComentarios(){
    $cmd = $this-> pdo->prepare ("SELECT *, (SELECT nome FROM usuarios WHERE id = fk_id_usuario) as nome_pessoa FROM comentarios ORDER BY dia DESC");
   }*/
   } 
?>