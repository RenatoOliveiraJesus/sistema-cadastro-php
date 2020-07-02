<html>

<head>
    <title> Tabela de Fornecedores </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/fornecedor_tabela.css">
    <!--boodstrape css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Awersome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

    <?php include('includes/tb_fornecedor_header.php');?>    
    <?php include 'fornecedor_processo.php';  ?>
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
            $result = $mysqli->query("SELECT * FROM fornecedores")  or die ($mysqli->error);
            //pre_r($result->fetch_all());
        ?>    

            <div class="col-12 justify-content-center">
                <!--tabela de Fornecedores-->
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="titulo_lista">Código</th>
                                <th class="titulo_lista">Nome</th>
                                <th class="titulo_lista">CNPJ</th>
                                <th class="titulo_lista">CEP</th>
                                <th class="titulo_lista">Logradouro</th>
                                <th class="titulo_lista">Cidade</th>
                                <th class="titulo_lista">Estado</th>
                                <th class="titulo_lista">E-mail</th>
                                <th class="titulo_lista">Telefone</th> 
                                <th class="titulo_lista">Ramo</th> 
                                <th style="width: 200px;"class="titulo_lista">Data de cadastro</th>

                                <!--Ocupe mais expaço do que o normal-->
                                <th colspan="2"> Ação </th>
                            <tr>
                        </thead>
                        <!--percorrendo a tabela para retornar os dados-->
                        <?php  while($row=$result->fetch_assoc()): ?>

                        <tr>
                            <!--printando os resultados do while na tabela-->
                            <td class="lista"> <?php echo $row['id_fornecedor'] ;?> </td>
                            <td class="lista"> <?php echo $row ['nome'] ;?> </td>
                            <td class="lista"> <?php echo $row ['cnpj'] ;?> </td>
                            <td class="lista"> <?php echo $row ['cep'] ;?> </td>
                            <td class="lista"> <?php echo $row ['rua'] ;?> </td>
                            <td class="lista"> <?php echo $row ['cidade'] ;?> </td>
                            <td class="lista"> <?php echo $row ['estado'] ;?> </td>
                            <td class="lista"> <?php echo $row ['email'] ;?> </td>
                            <td class="lista"> <?php echo $row ['telefone'] ;?> </td>
                            <td class="lista"> <?php echo $row ['ramo'] ;?> </td>
                            <td class="lista"> <?php echo $row ['data_cadastro'] ;?> </td>
                            <td class="lista">
                                <!--botão passando por parametro os ids-->
                                <a  colspan="2" style="margin-left: -37px;padding: 2px;" href="fornecedor_cadastro.php?edit=<?php echo $row['id_fornecedor']; ?>"
                                    class="btn btn-info ">Edit</a>
                                <!--botão passando por parametro os ids-->
                                <a colspan="2" style="padding: 2px;" href="fornecedor_processo.php?delete=<?php echo $row['id_fornecedor']; ?>"
                                    class="btn btn-danger ">Delete</a>

                            </td>
                        </tr>
                        <!--Final do loop-->
                        <?php endwhile; ?>
                    </table>
                </div>


            </div>

            <div class="col-12 justify-content-center">
        </div>
    </div>



</body>

</html>