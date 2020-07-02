<?php /*https://www.youtube.com/watch?v=3xRMUDC74Cw VIDEO MINUTO: */
   
session_start();

if(isset($_SESSION['user_a'])){
echo '<span>Bem-vindo '.$_SESSION['user_a'].' - '.$_SESSION['departamento'].'</span>';

}else if(isset($_SESSION['user_n'])){
echo '<span>Bem-vindo '.$_SESSION['user_n'].' - '.$_SESSION['departamento'].'</span>';

}else{
echo '<script type="text/javascript">window.location ="login.php"</script>';
}

/*conecta no BD     (servidor    user   senha  banco de dados)*/
require_once('conection.php');

//Parametros
$update = false;
$id_produto = 0;
$descricao= '';
$ncm= '';
$um= '';
$quantidade= '';
$valor_unitario= '';
$valor_total= '';
$data_validade= '';
$id_fornecedor= '';

//BOTÃO INSERT
if (isset($_POST['save'])){
    $descricao= $_POST['descricao'];
    $ncm= $_POST['ncm'];
    $um= $_POST['um'];
    $quantidade= $_POST['quantidade'];
    $valor_unitario= $_POST['valor_unitario'];
    $valor_total= $_POST['valor_total'];
    $data_validade= $_POST['data_validade'];
     $id_fornecedor= $_POST['id_fornecedor'];

    
$mysqli->query("INSERT INTO produtos(descricao,ncm,um,quantidade,valor_unitario,valor_total,data_validade,id_fornecedor) values ('$descricao','$ncm','$um','$quantidade','$valor_unitario','$valor_total','$data_validade','$id_fornecedor') ") or  die (mysqli_error($mysqli));
    
//mensagem de sucesso na tela
    $_SESSION['message'] = "Cadastro realizado com sucesso";
//mensagem para manipular na class
    $_SESSION['msg_type'] = "success";
//atualiza a página
    header("location: produto_cadastro.php ");
}

//BOTÃO DELETE
if (isset($_GET['delete'])){ 
    $id_produto = $_GET['delete'];
    $mysqli->query("DELETE FROM produtos WHERE id_produto=$id_produto") or die($mysqli->error());

//mensagem de sucesso na tela
    $_SESSION['message'] = "Registro apagado com sucesso";
//mensagem para manipular na class   
    $_SESSION['msg_type'] = "danger";
//atualiza a página
   header("location: produto_tabela.php "); 
}

//BOTÃO UPDATE
if (isset($_GET['edit'])){ 
    $id_produto = $_GET['edit']; 
    $update = true;
    $result = $mysqli->query("SELECT * FROM produtos WHERE id_produto=$id_produto") or die($mysqli->error()); 
    $row = $result->fetch_array(); 
     $descricao= $row['descricao'];
    $ncm= $row['ncm'];
    $um= $row['um'];
    $quantidade= $row['quantidade'];
    $valor_unitario= $row['valor_unitario'];
    $valor_total= $row['valor_total'];
    $data_validade= $row['data_validade'];
    $id_fornecedor= $row['id_fornecedor'];
}

if (isset($_POST['update'])){ 
    $id_produto = $_POST['id_produto'];
    $descricao= $_POST['descricao'];
    $ncm= $_POST['ncm'];
    $um= $_POST['um'];
    $quantidade= $_POST['quantidade'];
    $valor_unitario= $_POST['valor_unitario'];
    $valor_total= $_POST['valor_total'];
    $data_validade= $_POST['data_validade'];
    $id_fornecedor= $_POST['id_fornecedor'];
    $mysqli->query("UPDATE produtos SET descricao='$descricao', ncm ='$ncm', um ='$um', quantidade ='$quantidade',valor_unitario ='$valor_unitario', valor_total ='$valor_total', data_validade ='$data_validade', id_fornecedor ='$id_fornecedor' WHERE id_produto = $id_produto") or
    die($mysqli->error());

//mensagem de sucesso na tela
$_SESSION['message'] = "Registro alterado com sucesso!";
//mensagem para manipular na class   
    $_SESSION['msg_type'] = "warning";
//atualiza a página
   header("location: produto_tabela.php "); 
}
?>