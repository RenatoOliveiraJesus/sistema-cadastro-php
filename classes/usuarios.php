<?php

class Usuario{
   private $pdo;
   public $msgErro = "";

    public function conectar($nome, $host, $user, $password )
   {
    global $pdo;
    global $msgErro;
    try
    {
        $pdo = new PDO("mysql:dbname=".$name.";host=".$host,$usario,$senha);

    } catch (PDOException $e){ 
        $msgErro = $e->getMessage();
    }    
   }

    public function logar($email,$senha){
    {
    global $pdo;
    global $msgErro;

    $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e and senha =:s");
    $sql->bindValue(":e",$email);
    $sql->bindValue(":s",$senha);
    $sql->execute();
    if($sql->rowCount() > 0)
    {
        $dado = $sql->fetch();
        session_start();
        $_SESSION['id'] = $dados['id'];
        return true; //logado com sucesso

    }
    else
    {
        return false // não foi possivel logar

    }


    }
}
    



?>