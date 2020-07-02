<html>


<head>
    <title> Login </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!--boodstrape css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Awersome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.lembrete{
    width: 20%;
    text-align: center;
    background-color: yellowgreen;
    border: 1px solid black;
}
</style>
</head>

<body class="body">

    <div class="lembrete">
        <h3>Usuário e senha para login</h3>
        user@email.com
        <br>
        123
    </div>

    <div class="central">
        <h1 class="titulo"> Entrar </h1>
        <form method="post" action="valida_login.php">
            <input type="email" name="email" placeholder="e-mail">
            <input type="password" name="senha" placeholder="senha">
            <input class="bt_enviar" type="submit" name="enviar" placeholder="Acessar">
        </form>
    </div>



</body>

</html>