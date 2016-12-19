<?php 
      session_start(); 
?>

<?php
       session_unset();
       session_destroy();

     echo '<script type="text/javascript">';
     echo 'alert("Successfully Logged Out !!! ");';
     echo 'window.location.href = "process.php"';
     echo '</script>';

?>