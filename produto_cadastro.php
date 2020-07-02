<html>

<head>
    <title> Cadastro de produtos </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/produto_cadastro.css">
    <!--boodstrape css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Awersome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include('includes/cd_produto_header.php'); ?>



    <?php include 'produto_processo.php';   ?>

    <!--Se existe o alerta, Executa, se não, não--->
    <?php  if (isset($_SESSION['message'])): ?>
    <!--Cria alerta na página, conforme inserido ou apagado--->
    <div class="alerta_mensagem alert alert-<?=$_SESSION['msg_type']?>">
        <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
         ?>
    </div>
    <!--final do if--->
    <?php endif; ?>

<?php

     //conecta no banco
     require_once('conection.php');
     //select no banco
    $result = $mysqli->query("SELECT * FROM produtos")  or die ($mysqli->error);
    //pre_r($result->fetch_all());
    $result2 = $mysqli->query("SELECT nome,id_fornecedor FROM fornecedores") or die($mysqli->error()); 
   
?>

    <script>
    window.onchange = function() {
        var qtd = document.getElementById('Quantidade').value;

        var unit = document.getElementById('Valor_unitario').value;

        var valor_total = parseInt(qtd) * unit;

        console.log(valor_total);

        document.getElementById('Valor_total').value = valor_total;
    }
    </script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">

                <!--Inserir dados-->

                <div class="container justify-content-center ">
                    <form action="produto_processo.php" method="POST">
                        <input type="hidden" name="id_produto" value="<?php echo $id_produto;?>">
                          <div class="row form_principal">
                            <div class="col-8 fm_1">


                                <div class="form-group formulario">
                                    <label>Descrição</label>
                                    <input type="text" name="descricao" class="form-control"
                                        value="<?php echo $descricao; ?>" placeholder="Descrição do Produto">
                                </div>


                                <div class="form-group">
                                    <label>Quantidade</label>
                                    <input type="text" name="quantidade" class="form-control" pattern="[0-9]+$"
                                        value="<?php echo $quantidade; ?>"  id="Quantidade">
                                </div>

                                <div class="form-group">
                                    <label>Valor Unitario</label>
                                    <input type="text" name="valor_unitario" class="form-control"  pattern="[0-9]+$"
                                        value="<?php echo $valor_unitario; ?>"  id="Valor_unitario">
                                </div>

                                <div class="form-group">
                                    <label>Valor Total</label>
                                    <input readonly type="number" name="valor_total" class="form-control"
                                        value="<?php echo $valor_total; ?>" id="Valor_total">
                                </div>
                              <div class="form-group formulario">
                                    <label for="exampleFormControlSelect1">Fornecedor</label>
                                    <select class="form-control" name="id_fornecedor" id="exampleFormControlSelect1">

                                        <option value="">Selecione...</option>
                                        <?php while($row=$result2->fetch_assoc()): ?>

                                            <option value="<?php echo $row['id_fornecedor']; ?>"
                                                <?php echo $id_fornecedor === $row['id_fornecedor'] ? 'selected': '' ?>>
                                                <?php echo $row['nome'];?>
                                            </option>
                                        <?php endwhile; ?>
                                      


                                    </select>
                                </div>

                            </div>



                            <div class="col-4 fm_2">
                                <div class="form-group formulario">
                                    <label for="exampleFormControlSelect2">Nomenclatura Comum do Mercosul</label>
                                    <select class="form-control" name="ncm" id="exampleFormControlSelect2">
                                        <option value="">Selecione...</option>
                                        <option value="12345678" <?php echo $ncm === '12345678' ? 'selected': '' ?>>
                                            12345678</option>
                                        <option value="10102020" <?php echo $ncm === '10102020' ? 'selected': '' ?>>
                                            10102020</option>
                                        <option value="30304040" <?php echo $ncm === '30304040' ? 'selected': '' ?>>
                                            30304040</option>
                                        <option value="50506060" <?php echo $ncm === '50506060' ? 'selected': '' ?>>
                                            50506060</option>
                                        <option value="70708080" <?php echo $ncm === '70708080' ? 'selected': '' ?>>
                                            70708080</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">Unidade de Medida</label>
                                    <select class="form-control" name="um" id="exampleFormControlSelect3">
                                        <option value="">Selecione...</option>
                                        <option value="Unidade" <?php echo $um === 'Unidade' ? 'selected': '' ?>>
                                            Unidade</option>
                                        <option value="Peça" <?php echo $um === 'Peça' ? 'selected': '' ?>>Peça</option>
                                        <option value="Polegada" <?php echo $um === 'Polegada' ? 'selected': '' ?>>
                                            Polegada</option>
                                        <option value="Metro" <?php echo $um === 'Metro' ? 'selected': '' ?>> Metro
                                        </option>
                                        <option value="Litro" <?php echo $um === 'Litro' ? 'selected': '' ?>>Litro
                                        </option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Data de validade</label>
                                    <input type="date" name="data_validade" class="form-control"
                                           value="<?php echo $data_validade; ?>" id="">
                                </div>
                             

                            </div>
                        </div>



                        <div class="form-group ">

                            <?php if($update == true): ?>

                            <button class="btn btn-info Botao_principal" type="submit" name="update"> Atualizar</button>

                            <?php   else:  ?>

                            <button class="btn btn-primary Botao_principal" type="submit" name="save">
                                Cadastrar</button>

                            <?php endif; ?>

                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>


<?php include('includes/scripts.php'); ?>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<!--Máscara Jquery-->
<script src="includes/jquery.mask.js"></script>
<!--Função do Jquery-->
<script>
    $(document).ready(function(){
    $('#cep').mask('00000-000');
    $('#cpf').mask('000.000.000-00',{placeholder:"000.000.000-00"}, {reverse: true});
    $('#cnpj').mask('00.000.000/0000-00',{placeholder:"00.000.000/0000-00"}, {reverse: true});
    $('#telefone').mask('(00)0000-0000',{placeholder:"(00)0000-0000"});
    $('#data_validade').mask("00/00/0000", {placeholder: "__/__/____"});
})
</script>




</body>
</html>