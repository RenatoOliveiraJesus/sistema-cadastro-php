<link rel="stylesheet" type="text/css" href="css/tb_header.css">
<!--boodstrape css-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--Awersome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--ion-ions-->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">








<nav class="navbar navbar-light bg-light nav_principal">
    <a href="index.php"> <img src="imagens/logo.png" class="logo" alt="..."></a>


    <a class=" navbar-brand" href="fornecedor_tabela.php">
        <i class=" icon_menu fa fa-edit"></i>
        <span class="desc_icon"> Tabela de Fornecedores</span>
    </a>

    <a class=" navbar-brand" href="#">
        <div class="icon_menu ion ion-pie-graph"></div> 
        <span class="desc_icon"> Relatórios</span>
    </a>


    <div class="dropdown ">
        <button class="btn btn-secondary dropdown-toggle caixa_login " type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon_user fa fa-user-circle"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</nav>


<?php include('includes/scripts.php'); ?>

