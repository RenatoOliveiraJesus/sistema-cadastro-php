<?php

session_start();
unset($_SESSION['user_a']);
unset($_SESSION['user_n']);
session_destroy();  
  
echo '<script type="text/javascript">window.location ="login.php"</script>';
exit;
?>