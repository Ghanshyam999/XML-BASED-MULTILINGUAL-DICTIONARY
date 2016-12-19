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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/StyleSheet.css">

<script>

    var counter = 1;
    var counter2 = 1;
    var limit = 10;

    function addInput1(divName) {
        if (counter == limit) {
            alert("You have reached the limit of adding " + counter + " meanings");
        }
        else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = '<center><h4 style="color: red;"><u>MEANING</u> <u>' + (counter + 1) + '</u> - </h4></center> <br><label><u>Part of Speech</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>' +
            "<input class='f_block' type='text' id='pos' name='pos[]' placeholder=' Part of Speech ' autofocus><br><br>" +

            "<label><u>Definition</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>" +
            "<input class='f_block' type='text' id='def' name='def[]' placeholder=' Definition ' autofocus><br><br>" +

            "<label><u>Synonym</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>" +
            "<input class='f_block' type='text' id='syn' name='syn[]' placeholder=' Synonyms ' autofocus><br><br>" +
            
            "<label><u>Antonym</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>" +
            "<input class='f_block' type='text' id='ant' name='ant[]' placeholder=' Antonyms ' autofocus><br><br>" +

            "<label><u>Phrase</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>" +
            "<input class='f_block' type='text' id='phr' name='phr[]' placeholder=' Phrases ' autofocus><br><br>" +

            "<label><u>Gender</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>" +
            "<input class='f_block' type='text' id='gen' name='gen[]' placeholder=' Gender ' autofocus><br><br>" +

            "<label><u>Plural</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>" +
            "<input class='f_block' type='text' id='pl' name='pl[]' placeholder=' Plural ' autofocus><br><br>" +
             
            "<label><u>Example</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>" +
            "<input class='f_block' type='text' id='eg' name='eg[]' placeholder=' Example ' autofocus><br><br>";
            document.getElementById(divName).appendChild(newdiv);
            counter++;
        }
    }

    function addInput2(divName) {
        if (counter2 == limit) {
            alert("You have reached the limit of adding " + counter2 + " verb-forms");
        }
        else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = '<center><h4 style="color: red;"><u>Verb-Form</u> <u>' + (counter2 + 1) + '</u> - </h4></center><br><label><u>Verb-Form</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>'+
            '<select class="f_block" name="vf[]" id="vf" style="height: 30px;" autofocus>'+
		        '<option value="sp" > Simple Past</option>'+
		        '<option value="pp" >Past Perfect</option>'+
		        '<option value="simpre" >Simple Present</option>'+
		        '<option value="prepar" >Present Perfect</option>'+
		    '</select><br><br>' +

            '<label><u>Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>' +
            '<input class="f_block" type="text" id="wrd" name="wrd[]" placeholder=" Word " autofocus><br><br>';
            document.getElementById(divName).appendChild(newdiv);
            counter2++;
        }
    }

</script>
 
</head>
<body>

<div class="container-fluid">
  <div class="row content">      
    <div class="col-sm-2 sidenav hidden-xs">
      <div class="f1"><h2 align="center"><b><u>LANGUAGE</u></b></h2></div>
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
        <li align="center"><a href="add_eng.php">English</a></li>
        <li align="center"><a href="add_hnd.php">Hindi</a></li>
        <li align="center"><a href="add_san.php">Sanskrit</a></li>
		<li align="center"><a href="add_ass.php">Assamese</a></li>
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
          <center><h1 style="color: #b200ff;">HINDI &nbsp WORD</h1></center><hr style="display: block; border-color: #0026ff" >
          </div>

	   <div class="box" style="margin-left: 200px; margin-right: 110px; padding-top: 30px; padding-left: 50px; padding-right: 30px;" >
		<form action="entry.php" method="POST">            
            <div style="padding-left:170px;">
            <label><u>Language</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="lng" name="lng" style="width: 100px;" value="HINDI" readonly ><br><br>
            </div>

            <label><u>HIN - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="word" name="word" placeholder=" Word(in hindi) " autofocus><br><br>
            
            <label><u>Eng - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="word_e" name="word_e" placeholder=" Word (in english) " autofocus><br><br>

            <label><u>San - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="word_s" name="word_s" placeholder=" Word (in sanskrit) " autofocus><br><br>

            <label><u>Ass - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="word_a" name="word_a" placeholder=" Word (in assamese) " autofocus><br><br>
            
            <label><u>Pronunciation</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="pro" name="pro" placeholder=" Pronunciation " autofocus><br><br>
            
            <label><u>Origin</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="ori" name="ori" placeholder=" Origin " autofocus><br><br>
                        
            <center><h4 style="color: red;"><u>MEANING</u> <u>1</u> -</h4></center><br>
            
            <div id="dynamicInput1">
            <label><u>Part of Speech</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="pos" name="pos[]" placeholder=" Part of Speech " autofocus><br><br>

            <label><u>Definition</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="def" name="def[]" placeholder=" Definition " autofocus><br><br>

            <label><u>Synonym</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="syn" name="syn[]" placeholder=" Synonyms [separate using comma(,)] " autofocus><br><br>
            
            <label><u>Antonym</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="ant" name="ant[]" placeholder=" Antonyms [separate using comma(,)] " autofocus><br><br>
            
            <label><u>Phrase</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="phr" name="phr[]" placeholder=" Phrases " autofocus><br><br>

            <label><u>Gender</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="gen" name="gen[]" placeholder=" Gender " autofocus><br><br>

            <label><u>Plural</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="pl" name="pl[]" placeholder=" Plural [separate using comma(,)] " autofocus><br><br>
           
            <label><u>Example</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="eg" name="eg[]" placeholder=" Example " autofocus><br><br>
           </div>
            <input class="btn btn-primary btn-md pull-right"  type="button" value=" + Add another meaning " onClick="addInput1('dynamicInput1');"><br><br><br>


            <center><h4 style="color: red;"><u>Verb</u> <u>Form</u> <u>1</u> : <br><br></h4></center>

            <div id="dynamicInput2">
            <label><u>Verb-Form</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
            <select class="f_block" name="vf[]" id="vf" style="height: 30px;" autofocus>
		        <option value="sp" > Simple Past</option>
		        <option value="pp" >Past Perfect</option>
		        <option value="simpre" >Simple Present</option>
		        <option value="prepar" >Present Perfect</option>
		    </select>

            <br><br><label><u>Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="wrd" name="wrd[]" placeholder=" Word " autofocus><br><br>
            </div>
                <input class="btn btn-primary btn-md pull-right"  type="button" value=" + Add another verb-form " onClick="addInput2('dynamicInput2');"><br><br><br>

            <label><u>Rhyme</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class="f_block" type="text" id="rhy" name="rhy" placeholder=" Rhymes [Separate by commas(,)] " autofocus><br><br><br><br>

            <center><input type="submit" class="btn btn-primary btn-md" onclick="return confirm('Are you sure to add ?')" name="submit" value="Save"></center>
            
		    
		<br><br>
		
		
	</form>
		<div  class ="col-xs-0 pull-right ">
		
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
