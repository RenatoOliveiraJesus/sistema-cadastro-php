<link rel="stylesheet" type="text/css" href="css/header.css">
<!--boodstrape css-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--Awersome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset='utf-8'>




<nav class="navbar navbar-light bg-light nav_principal">
    <a href="index.php"> <img src="imagens/logo.png" class="logo" alt="..."></a>


    <a class=" navbar-brand" href="produto_tabela.php">
        <i class=" icon_menu fa fa-product-hunt"></i>
        <span class="desc_icon"> Produtos</span>
    </a>

    <a class="navbar-brand" href="#">
        <i class="icon_menu fa fa-user"></i>
        <span class="desc_icon"> Clientes</span>
    </a>

    <a class=" navbar-brand" href="#">
        <i class="icon_menu fa fa-users"></i>
        <span class="desc_icon"> Funcionários</span>
    </a>

    <a class=" navbar-brand" href="fornecedor_tabela.php">
        <i class="icon_menu fa fa-truck"></i>
        <span class="desc_icon"> Fornecedores</span>
    </a>

    <a class=" navbar-brand" href="#">
        <i class="icon_menu fa fa-address-book"></i>
        <span class="desc_icon"> Agenda</span>
    </a>



    <div class="dropdown ">
        <button class="btn btn-secondary dropdown-toggle caixa_login " type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon_user fa fa-user-circle"></i>
        </button>
        <div class="caixa_drop dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>

</nav>

<div class="user_session">

    <?php
        session_start();
    
        if(isset($_SESSION['user_a'])){
        echo '<span>Bem-vindo '.$_SESSION['user_a'].' - '.$_SESSION['departamento'].'</span>';

        }else if(isset($_SESSION['user_n'])){
        echo '<span>Bem-vindo '.$_SESSION['user_n'].' - '.$_SESSION['departamento'].'</span>';

        }else{
        echo '<script type="text/javascript">window.location ="login.php"</script>';
        }
        ?>
</div>