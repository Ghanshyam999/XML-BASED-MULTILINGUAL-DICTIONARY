<?php

if ($_SERVER["REQUEST_METHOD"] =="POST") 
{
    if($_POST['password']==$_POST['con_password']) 
    {
        $xml = new DOMDocument('1.0', 'utf-8');
        $xml->formatOutput = true; 
        $xml->preserveWhiteSpace = false; 
    
        $xml->load('login.xml');

        $nodes = $xml->getElementsByTagName('id');

        foreach($nodes as $ent)
        {
            $mail = $ent->getElementsByTagName('email')->item(0)->nodeValue;
            $phone = $ent->getElementsByTagName('phone')->item(0)->nodeValue;

            if ($mail==$_POST['email'] && $phone==$_POST['mobile'])
            {
                $found=1;
                $ent->getElementsByTagName('password')->item(0)->nodeValue=md5($_POST['password']);
                break;
            }
        }
        
        if($found==1)
        {
            echo '<script language="javascript">';
            echo 'alert(" PASSWORD SUCCESSFULLY CHANGED  !!!!!!!");'; 
            echo 'window.location.href="process.php"';
            echo '</script>'; 
        }   

        else
        {
         echo '<script language="javascript">';
         echo 'alert("WRONG EMAIL OR PASSWORD  !!!!!!!");'; 
         echo 'window.location="forgot_pass.html"';
         echo '</script>'; 
        }   
    }

    else
  {
      echo '<script language="javascript">';
      echo 'alert("PASSWORD AND CONFIRM PASSWORD DO NOT MATCH  !!!!!!!");';
      echo 'window.location="forgot_pass.html"'; 
      echo '</script>';
  }
  
  $xml->save("login.xml");
}
?>