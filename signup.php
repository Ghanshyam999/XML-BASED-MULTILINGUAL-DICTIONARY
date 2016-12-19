<?php

if ($_SERVER["REQUEST_METHOD"] =="POST") 
{
  if($_POST['password']==$_POST['con_password']) {
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true; 
    $xml->preserveWhiteSpace = false; 
    
    $xml->load('login.xml');

    $nodes = $xml->getElementsByTagName('login')->item(0) ;
    $ent=$xml->createElement('id');
    
    $ent->appendChild($xml->createElement('name', $_POST['name']));
    $ent->appendChild($xml->createElement('email', $_POST['email']));
    $ent->appendChild($xml->createElement('phone', $_POST['mobile']));
    $ent->appendChild($xml->createElement('password', md5($_POST['password'])));

    $nodes->appendChild($ent);

    $xml->save("login.xml");

    echo "<br><br><br><br><br><center>REDIRECTING TO HOME PAGE .........</center>";

    echo '<script language="javascript">';
    echo 'alert("SUCCESSFULLY REGISTERED  !!!!!!!");'; 
    echo 'window.location="process.php"';
    echo '</script>';
  }

  else
  {
      echo '<script language="javascript">';
      echo 'alert("PASSWORD AND CONFIRM PASSWORD DO NOT MATCH  !!!!!!!");';
      echo 'window.location="signup.html"'; 
      echo '</script>';
  }
}


?>