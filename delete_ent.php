<?php
   session_start();
   if(!isset($_SESSION['id']))
   {
       echo '<script type="text/javascript">';
       echo 'alert("Please login to continue ...... !!!!");';
       echo 'window.location.href="signin.html";';
       echo '</script>';
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Entry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/StyleSheet.css">

</head>
<body>

<div class="container-fluid">
  <div class="row content">      
    <div class="col-sm-2 sidenav hidden-xs">
      <div class="f1"><h2 align="center"><b><u>DICTIONARY</u></b></h2></div>
        <?php
        if(isset($_SESSION['id']))
        {
            echo '<div class="panel panel-danger">';
            echo '<div class="panel-body" style="background-color: #f3e5ab; padding-top:5px; border: 1px solid green; border-radius:20px; ">';
            echo '<center><h4 style="color: #1E8449;"><u>WELCOME</u> !!</h4>';
            echo '<div style="color: #ff6a00;">'.$_SESSION['id'].'</div>';
            echo '</center></div></div>';
        }
        ?>
      <ul class="nav nav-pills nav-stacked">
        <li align="center"><a class="active" href="process.php">Home</a></li>
        <li align="center"><a href="add_eng.php">Add</a></li>
        <li align="center"><a href="entry_mod_main.php">Modify</a></li>
		<li align="center"><a href="delete_ent.php">Delete</a></li>
      </ul><br>
    </div>
<?php
           if(isset($_SESSION['id']))
           {
                echo '<div class="col-sm-10 pull-right " style="padding-top: 20px; padding-left: 1000px; padding-bottom: 20px;">
                <a href="logout.php"><button class="btn btn-danger">LOG OUT</button></a>
                </div>';
           }
           else
           {
               echo '<div class="col-sm-10 pull-right " style="padding-top: 20px; padding-left: 1000px; padding-bottom: 20px;">
                
                </div>';
           }
      ?>
<div class="col-sm-10">
<p>  </p>
    <div class="col-sm-12">
      <div class="well ff">
          <div class="box" style="background-color: #ffd800; padding-top: 3px;">
          <center><h1 style="color: #b200ff;">DELETE &nbsp WORD</h1></center><hr style="display: block; border-color: #0026ff" >
          </div>

	   <div class="box" style="margin-left: 200px; margin-right: 50px; padding-top: 30px; padding-left: 50px; padding-right: 30px;" >
		<form action="delete.php" method="POST">            
            <div style="padding-left:70px;">
            <label><u>Language</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
            <select class="f_block" name="lng" style="width:130px; height: 30px;" autofocus>
		        <option value="ENGLISH" >English</option>
		        <option value="HINDI" >Hindi</option>
		        <option value="SANSKRIT" >Sanskrit</option>
		        <option value="ASSAMESE" >Assamese</option>
		    </select>
		    <br><br>
            </div>

            <label class="pull-left"><u>Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block pull-left" type="text" id="word" name="word" placeholder=" Word (in english) " autofocus><br><br>
            <input type='submit' class='btn btn-primary btn-md pull-right' onclick="return confirm('Are you sure to delete ?')" name='submit' value='Delete'>
		    
		<br><br>
		
	</form>
   
		<div  class ='col-xs-0 pull-right '>
		
	</div>
  </div>
  </div>
  
 
      </div>
  
            
 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
