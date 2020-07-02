<html>

<head>
    <title> Tabela de produtos </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="#">
    <!--boodstrape css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Awersome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <?php include('includes/tb_produto_header.php');?>



    <?php include 'produto_processo.php';  ?>

    <!--Se existe o alerta, Executa, se não, não--->
    <?php  if (isset($_SESSION['message'])): ?>

    <!--Cria alerta na página, conforme inserido ou apagado--->

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
         ?>

    </div>

    <!--final do if--->
    <?php endif; ?>

    <div class="container-fluid tabela_margem">

        <?php
             //conecta no banco
             require_once('conection.php');
             //select no banco
            $result = $mysqli->query("SELECT prod.*,fun.id_fornecedor as 'id_fornecedor', fun.nome as 'nome' FROM produtos as prod inner join fornecedores as fun on fun.id_fornecedor = prod.id_fornecedor")  or die ($mysqli->error);
            //pre_r($result->fetch_all());
        ?>

        <div class="col-12 justify-content-center">
            <!--tabela de produtos-->
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>NCM</th>
                            <th>UM</th>
                            <th>Qtd</th>
                            <th>Valor Unit.</th>
                            <th>Valor total</th>
                            <th>Data validade</th>                            
                            <th>Fornecedor</th>
                            <th>Data cadastro</th>


                            <!--Ocupe mais expaço do que o normal-->
                            <th colspan="3"> Ação </th>
                        <tr>
                    </thead>
                    <!--percorrendo a tabela para retornar os dados-->
                    <?php  while($row=$result->fetch_assoc()): ?>

                    <tr>
                        <!--printando os resultados do while na tabela-->
                        <td> <?php echo $row['id_produto'] ;?> </td>
                        <td> <?php echo $row ['descricao'] ;?> </td>
                        <td> <?php echo $row ['ncm'] ;?> </td>
                        <td> <?php echo $row ['um'] ;?> </td>
                        <td> <?php echo $row ['quantidade'] ;?> </td>
                        <td> <?php echo $row ['valor_unitario'] ;?> </td>
                        <td> <?php echo $row ['valor_total'] ;?> </td>
                        <td> <?php echo $row ['data_validade'] ;?> </td>
                        <td> <?php echo $row ['nome'] ;?> </td>
                        <td> <?php echo $row ['data_cadastro'] ;?> </td>

                        <div class="col-2" >
                            <td>
                                <!--botão passando por parametro os ids-->
                                <a  style="margin-left: -37px;padding: 2px;" href="produto_cadastro.php?edit=<?php echo $row['id_produto']; ?>"
                                    class="btn btn-info ">Edit</a>
                                <!--botão passando por parametro os ids-->
                                <a style="padding: 2px;" href="produto_processo.php?delete=<?php echo $row['id_produto']; ?>"
                                    class="btn btn-danger ">Delete</a>

                            </td>
                        </div>
                    </tr>
                    <!--Final do loop-->
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    </div>

</body>
</html>