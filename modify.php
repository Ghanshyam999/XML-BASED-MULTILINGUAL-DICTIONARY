<?php
session_start();

if($_POST['lng']=="ENGLISH")
{
    $_SESSION["wrd"] = strtolower($_POST['word']);
    header('Location: entry_mod_eng.php');    
} 

else if($_POST['lng']=="HINDI")
{
    $_SESSION["wrd"] = $_POST['word'];
    header('Location: entry_mod_hin.php'); 
} 
 
else if($_POST['lng']=="SANSKRIT")
{
    $_SESSION["wrd"] = $_POST['word'];
    header('Location: entry_mod_san.php'); 
}

else if($_POST['lng']=="ASSAMESE")
{
    $_SESSION["wrd"] = $_POST['word'];
    header('Location: entry_mod_ass.php'); 
}

?>

