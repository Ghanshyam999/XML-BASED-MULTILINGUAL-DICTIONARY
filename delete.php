<?php
    
$xml = new DOMDocument('1.0', 'utf-8');
$xml->formatOutput = true; 
$xml->preserveWhiteSpace = false; 
   
if ($_SERVER["REQUEST_METHOD"] =="POST") 
{
    if($_POST['submit'] && $_POST['lng']=="ENGLISH" )
    {
        $alpha=strtolower($_POST['word'][0]);
        $file=$alpha."_words.xml";

        $xml->load($file); 
        $lng = $xml->getElementsByTagName('eng')->item(0);
          $use = $lng->getElementsByTagName('ent');

          $found=0;

          foreach($use as $ent)
          {
              $wrd = $ent->getElementsByTagName('word')->item(0)->nodeValue;

              if ($wrd==$_POST['word']) {
                $ent->parentNode->removeChild($ent);
                $found=1;
              }
          }

          $xml->save($file);

          if($found==0)
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD NOT FOUND  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          } 
        
          else
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD SUCCESSFULLY DELETED  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          }
    }

    if($_POST['submit'] && $_POST['lng']=="HINDI" )
    {
        $xml->load('hindi.xml'); 
        $lng = $xml->getElementsByTagName('hin')->item(0);
          $use = $lng->getElementsByTagName('ent');

          $found=0;

          foreach($use as $ent)
          {
              $wrd = $ent->getElementsByTagName('word')->item(0)->nodeValue;

              if ($wrd==$_POST['word']) {
                $ent->parentNode->removeChild($ent);
                $found=1;
            }
          }
     
        $xml->save('hindi.xml');

        if($found==0)
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD NOT FOUND  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          } 
        
          else
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD SUCCESSFULLY DELETED  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          }
    }

    if($_POST['submit'] && $_POST['lng']=="SANSKRIT" )
    {
        $xml->load('sanskrit.xml'); 
        $lng = $xml->getElementsByTagName('sans')->item(0);
          $use = $lng->getElementsByTagName('ent');

          $found=0;

          foreach($use as $ent)
          {
              $wrd = $ent->getElementsByTagName('word')->item(0)->nodeValue;

              if ($wrd==$_POST['word']) {
                $ent->parentNode->removeChild($ent);
                $found=1;
            }
          }
     
        $xml->save('sanskrit.xml');

        if($found==0)
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD NOT FOUND  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          } 
        
          else
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD SUCCESSFULLY DELETED  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          }
    }

    if($_POST['submit'] && $_POST['lng']=="ASSAMESE" )
    {
        $xml->load('assamese.xml'); 
        $lng = $xml->getElementsByTagName('ass')->item(0);
          $use = $lng->getElementsByTagName('ent');

          $found=0;

          foreach($use as $ent)
          {
              $wrd = $ent->getElementsByTagName('word')->item(0)->nodeValue;

              if ($wrd==$_POST['word']) {
                $ent->parentNode->removeChild($ent);
                $found=1;
            }
          }
     
        $xml->save('assamese.xml');

        if($found==0)
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD NOT FOUND  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          } 
        
          else
          {
              echo '<script language="javascript">';
              echo 'alert(" WORD SUCCESSFULLY DELETED  !!!!!!!");'; 
              echo 'window.location.href="delete_ent.php"';
              echo '</script>';
          }
    }
}