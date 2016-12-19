<?php
session_start();
?>

<?php

if ($_SERVER["REQUEST_METHOD"] =="POST") 
{
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true; 
    $xml->preserveWhiteSpace = false; 
    
    $xml->load('login.xml');

    $nodes = $xml->getElementsByTagName('id') ;

    foreach($nodes as $ent)
    {
        $mail = $ent->getElementsByTagName('email')->item(0)->nodeValue;
        $pass = $ent->getElementsByTagName('password')->item(0)->nodeValue;

        if ($mail==$_POST['email'] && $pass==md5($_POST['password'])) 
        {
            $found=1;
            $user=$ent->getElementsByTagName('name')->item(0)->nodeValue;
            break;
        }
    }

    if($found==1)
    {
        $_SESSION["id"] = $user;
        $_SESSION["begin"] = 1;

         echo '<script language="javascript">';
         echo 'alert(" SUCCESSFULLY LOGGED IN  !!!!!!!");'; 
         echo 'window.location.href="process.php"';
         echo '</script>'; 
    }

    else
    {
         echo '<script language="javascript">';
         echo 'alert("INAVLID EMAIL OR PASSWORD  !!!!!!!");'; 
         echo 'window.location="signin.html"';
         echo '</script>'; 
    }   
}


?>