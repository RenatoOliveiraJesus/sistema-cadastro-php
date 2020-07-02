<?php

require_once('conection.php');


$get = $mysqli->query("SELECT * FROM testando");



  if(isset($_POST['email']) && isset($_POST['senha'])) {

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
  
   $get = $mysqli->query("SELECT * FROM usuarios WHERE email ='$email' AND senha ='$senha'");
  
   $num = $get->num_rows; 

    if($num == 1){      
     
        
        while ($percorrer = mysqli_fetch_assoc($get)) {        
            $adm = $percorrer['adm'];
            $nome = $percorrer['nome'];
            $departamento = $percorrer['departamento'];

           // echo $departamento; die;

            session_start();

            if($adm == 1){
                $_SESSION['user_a'] = $nome; 
                $_SESSION['adm'] = $adm; 
                $_SESSION['departamento'] = $departamento;               


            }else{

                $_SESSION['user_n'] = $nome; 
                $_SESSION['adm'] = $adm; 
                $_SESSION['departamento'] = $departamento;                  
            }   
            echo '<script type="text/javascript">window.location ="index.php"</script>';

        }    
    }
    
       
        else{
        echo 'O email e/ou a senha estão incorretos';
        }
}
  
?>