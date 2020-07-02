<?php /*https://www.youtube.com/watch?v=3xRMUDC74Cw VIDEO MINUTO: *

//inicia a sessão para utilizar a SESSION abaixo
session_start()

/*conecta no BD     (servidor    user   senha  banco de dados)*/

   
session_start();

if(isset($_SESSION['user_a'])){
echo '<span>Bem-vindo '.$_SESSION['user_a'].' - '.$_SESSION['departamento'].'</span>';

}else if(isset($_SESSION['user_n'])){
echo '<span>Bem-vindo '.$_SESSION['user_n'].' - '.$_SESSION['departamento'].'</span>';

}else{
echo '<script type="text/javascript">window.location ="login.php"</script>';
}



//conexão com BD
require_once('conection.php');

//Parametros
$update = false;
$id_fornecedor = 0;
$nome= '';
$cnpj= '';
$cep= '';
$rua= '';
$cidade= '';
$estado= '';
$email= '';
$telefone= '';
$ramo= '';




//BOTÃO INSERT
if (isset($_POST['save'])){
    $nome= $_POST['nome'];
    $cnpj= $_POST['cnpj'];
    $cidade= $_POST['cidade'];
    $estado= $_POST['estado'];
    $cep= $_POST['cep'];
    $rua= $_POST['rua'];
    $email= $_POST['email'];
    $telefone= $_POST['telefone'];
    $ramo= $_POST['ramo'];
 

  
$mysqli->query("INSERT INTO fornecedores(nome,cnpj,cidade,estado,cep,rua,email,telefone,ramo) values ('$nome','$cnpj','$cidade','$estado','$cep','$rua','$email','$telefone','$ramo') ") or  die (mysqli_error($mysqli));
 
//mensagem de sucesso na tela
    $_SESSION['message'] = "Cadastro realizado com sucesso";
//mensagem para manipular na class
    $_SESSION['msg_type'] = "success";
//atualiza a página
    header("location: fornecedor_cadastro.php ");
}


//BOTÃO DELETE
if (isset($_GET['delete'])){ 
    $id_fornecedor = $_GET['delete'];
    $mysqli->query("DELETE FROM fornecedores WHERE id_fornecedor=$id_fornecedor") or die($mysqli->error());

//mensagem de sucesso na tela
    $_SESSION['message'] = "Registro deletado com sucesso";
//mensagem para manipular na class   
    $_SESSION['msg_type'] = "danger";
//atualiza a página
   header("location: fornecedor_tabela.php "); 
}

//BOTÃO UPDATE
if (isset($_GET['edit'])){ 
    $id_fornecedor = $_GET['edit']; 
    $update = true;
    $result = $mysqli->query("SELECT * FROM fornecedores WHERE id_fornecedor=$id_fornecedor") or die($mysqli->error()); 
    $row = $result->fetch_array();  
    $nome= $row['nome'];
    $cnpj= $row['cnpj'];
    $cidade= $row['cidade'];
    $estado= $row['estado'];
    $cep= $row['cep'];
    $rua= $row['rua'];
    $email= $row['email'];
    $telefone= $row['telefone'];
    $ramo= $row['ramo'];
        }

if (isset($_POST['update'])){ 
    $id_fornecedor = $_POST['id_fornecedor'];
    $nome= $_POST['nome'];
    $cnpj= $_POST['cnpj'];
    $cidade= $_POST['cidade'];
    $estado= $_POST['estado'];
    $cep= $_POST['cep'];
    $rua= $_POST['rua'];
    $email= $_POST['email'];
    $telefone= $_POST['telefone'];
    $ramo= $_POST['ramo'];

    $mysqli->query("UPDATE fornecedores SET     
    id_fornecedor='$id_fornecedor', 
    nome ='$nome', 
    cnpj ='$cnpj', 
    cidade ='$cidade',
    estado = '$estado',
    cep ='$cep', 
    rua ='$rua', 
    email ='$email', 
    telefone ='$telefone', 
    ramo ='$ramo', 
    WHERE id_fornecedor = $id_fornecedor") or      
    die($mysqli->error());

//mensagem de sucesso na tela
$_SESSION['message'] = "Registro alterado com sucesso!";
//mensagem para manipular na class   
    $_SESSION['msg_type'] = "warning";
//atualiza a página
   header("location: fornecedor_tabela.php "); 

}

?>