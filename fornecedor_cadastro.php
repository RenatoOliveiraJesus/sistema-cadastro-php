<html>

<head>
    <title> Cadastro de Fornecedores </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/fornecedor_cadastro.css">
    <!--boodstrape css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Awersome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>

    <?php include('includes/cd_fornecedor_header.php'); ?>
    <?php include 'fornecedor_processo.php';   ?>

    
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

    require_once('conection.php');
    
    $result = $mysqli->query("SELECT * FROM fornecedores")  or die ($mysqli->error);
    //pre_r($result->fetch_all());
?>


    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
  
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">

                <!--Inserir dados-->

                <div class="container justify-content-center ">
                    <form action="fornecedor_processo.php" method="POST">

                        <input type="hidden" name="id_fornecedor" value="<?php echo $id_fornecedor;?>">

                        <div class="row form_principal">
                            <div class="col-8 fm_1">

                                <div class="form-group formulario">
                                    <label>Nome:</label>
                                    <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>"
                                        placeholder="Nome">
                                </div>
                                <div class="form-group formulario">
                                    <label for="exampleFormControlSelect1">Ramo:</label>
                                    <select class="form-control" name="ramo" id="exampleFormControlSelect1">
                                        <option value="">Selecione...</option>
                                        <option value="Alimentos e bebidas"
                                            <?php echo $ramo === 'Alimentos e bebidas' ? 'selected': '' ?>> Alimentos e
                                            bebidas</option>
                                        <option value="Eletrônicos e informática"
                                            <?php echo $ramo === 'Eletrônicos e informática' ? 'selected': '' ?>>
                                            Eletrônicos e informática</option>
                                        <option value="Roupas e acessórios"
                                            <?php echo $ramo === 'Roupas e acessórios' ? 'selected': '' ?>> Roupas e
                                            acessórios</option>
                                    </select>
                                </div>

                                                             
                                <div class="form-group formulario">
                                <label>Cep:
                                    <input name="cep" type="text" id="cep" value=""  maxlength="9" class="form-control"
                                        onblur="pesquisacep(this.value);">
                                </label>
                                </div>
                           
                                <div class="form-group formulario">
                                <label>Logradouro:
                                    <input style="width: 725" name="rua" type="text" id="rua" class="form-control">
                                </label>           
                                </div>

                                <div class="form-group formulario">
                                <label>Cidade:
                                    <input style="width: 520" name="cidade" type="text" id="cidade" class="form-control">
                                </label>                                          
                    
                                <label>Estado:
                                    <input name="estado" type="text" id="uf" class="form-control">
                                </label>                                                                     
                                </div>

                            </div>       

                            <div class="col-4 fm_2">

                                <div class="form-group formulario">
                                    <label>CNPJ:</label>
                                    <input type="text" name="cnpj" class="form-control" value="<?php echo $cnpj; ?>"
                                        id="cnpj">
                                </div>

                                <div class="form-group formulario">
                                    <label>E-mail:</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"
                                        placeholder="E-mail" id="email">
                                </div>
                                <div class="form-group formulario">
                                    <label>Telefone Fixo:</label>
                                    <input type="tel" name="telefone" class="form-control"
                                        value="<?php echo $telefone; ?>"  id="telefone">
                                </div>
                            </div>

                            <div class="form-group ">

                                <?php if($update == true): ?>

                                <button class="btn btn-info Botao_principal" type="submit" name="update">
                                    Atualizar</button>

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
    $('#data').mask("00/00/0000", {placeholder: "__/__/____"});
})
</script>

</body>
</html>