<?php
    session_start();

    include 'modify.php';
    $word=$_SESSION["wrd"];
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

    function addInput1(divName) {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = '<br><label><u>Part of Speech</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>' +
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
            "<input class='f_block' type='text' id='eg' name='eg[]' placeholder=' Example ' autofocus><br><br><br><br>";
            document.getElementById(divName).appendChild(newdiv);
        
    }

    function addInput2(divName) {
        var newdiv = document.createElement('div');
            newdiv.innerHTML = '<center><h4 style="color: red;"><u>Verb-Form</u> <u>' + '</u> - </h4></center><br><label><u>Verb-Form</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>'+
            '<select class="f_block" name="vf[]" id="vf" style="height: 30px;" autofocus>'+
		        '<option value="sp" > Simple Past</option>'+
		        '<option value="pp" >Past Perfect</option>'+
		        '<option value="simpre" >Simple Present</option>'+
		        '<option value="prepar" >Present Perfect</option>'+
		    '</select><br><br>' +

            '<label><u>Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>' +
            '<input class="f_block" type="text" id="wrd" name="wrd[]" placeholder=" Word " autofocus><br><br>';
            document.getElementById(divName).appendChild(newdiv);
        }
   
        }
</script>
 
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
          <center><h1 style="color: #b200ff;">SANSKRIT &nbsp WORD</h1></center><hr style="display: block; border-color: #0026ff" >
          </div>

	   <div class="box" style="margin-left: 200px; margin-right: 50px; padding-top: 30px; padding-left: 50px; padding-right: 30px;" >
		<form action='entry_modify.php' method='POST'>            
            <?php 
            $xml = new DOMDocument('1.0', 'utf-8');
            $xml->formatOutput = true; 
            $xml->preserveWhiteSpace = false; 

            $xml->load('sanskrit.xml'); 
            $lng = $xml->getElementsByTagName('sans')->item(0);
            $ent=$lng->getElementsByTagName('ent');

            $found=0;
            foreach($ent as $entry)
            {
                if($entry->getElementsByTagName('word')->item(0)->nodeValue==$word){
                    $wrd=$entry->getElementsByTagName('word')->item(0)->nodeValue;
                    $wrd2=$entry->getElementsByTagName('word_h')->item(0)->nodeValue;
                    $wrd3=$entry->getElementsByTagName('word_e')->item(0)->nodeValue;
                    $wrd4=$entry->getElementsByTagName('word_a')->item(0)->nodeValue;
                    $pr=$entry->getElementsByTagName('pro')->item(0)->nodeValue;
                    $org=$entry->getElementsByTagName('origin')->item(0)->nodeValue;
                    $par=$entry->getElementsByTagName('p');
                    $rym=$entry->getElementsByTagName('rhy')->item(0)->nodeValue;
                    
            echo "<div style='padding-left:170px;'>            
            <label><u>Language</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='lng' name='lng' style='width: 100px;' value='SANSKRIT' readonly ><br><br>
            </div>
            
            <label><u>San - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='word' name='word' value='$wrd' autofocus><br><br>
            
            <label><u>Hin - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='word_h' name='word_h' value='$wrd2' autofocus><br><br>

            <label><u>Eng - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='word_e' name='word_e' value='$wrd3' autofocus><br><br>

            <label><u>Ass - Word</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='word_a' name='word_a' value='$wrd4' autofocus><br><br>
            
            <label><u>Pronunciation</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='pro' name='pro' value='$pr' autofocus><br><br>
            
            <label><u>Origin</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='ori' name='ori' style='width: 600px;' value='$org' autofocus><br><br>
                        
            <center><h4 style='color: red;'><u>MEANING</u> -</h4></center><br>";

            foreach($par as $para){
                 $mn=$para->getElementsByTagName('mean')->item(0)->nodeValue;
                 $ps=$para->getElementsByTagName('pos')->item(0)->nodeValue;
                 $cs=$para->getElementsByTagName('cases')->item(0)->nodeValue;
                 $nmb=$para->getElementsByTagName('num')->item(0)->nodeValue;
                 $per=$para->getElementsByTagName('person')->item(0)->nodeValue;
                 $df=$para->getElementsByTagName('def')->item(0)->nodeValue;
                 $edg=$para->getElementsByTagName('ending')->item(0)->nodeValue;
                 $eg=$para->getElementsByTagName('eg')->item(0)->nodeValue;
                 $gn=$para->getElementsByTagName('gen')->item(0)->nodeValue;

            echo "<label><u>Meaning</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='mean' name='mean[]' value='$mn' autofocus><br><br>

            <label><u>Part of Speech</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='pos' name='pos[]' value='$ps' autofocus><br><br>

            <label><u>Case</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='cas' name='cas[]' value='$cs' autofocus><br><br>";

            echo "<label><u>Number</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='num' name='num[]' value='$nmb' autofocus><br><br>";
           
            echo "<label><u>Person</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='ant' name='prsn[]' value='$per' autofocus><br><br>";
            
            echo "<label><u>Definition</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='phr' name='def[]' value='$df' autofocus><br><br>

            <label><u>Gender</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='gen' name='gen[]' value='$gn' autofocus><br><br>";

            echo "<label><u>Ending</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='endg' name='endg[]' value='$edg' autofocus><br><br>";
            
            echo "<label><u>Example</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='eg' name='eg[]' value='$eg' autofocus><br><br><br><br>";
                }
                $found=1;
                break;
              }
            }

            if($found==0)
            {
              echo '<script language="javascript">';
              echo 'alert(" WORD NOT FOUND  !!!!!!!");'; 
              echo 'window.location.href="entry_mod_main.php"';
              echo '</script>';
            } 

           ?>
            <div id='dynamicInput1'></div>
            <input class="btn btn-primary btn-md pull-right"  type="button" value=" + Add another meaning " onClick="addInput1('dynamicInput1');" ><br><br><br>

            <center><h4 style='color: red;'><u>Verb</u> <u>Form</u> : <br><br></h4></center>

            <?php
              foreach($par as $para){  
                  $mn=$para->getElementsByTagName('pos')->item(0)->nodeValue;
                  if($mn=="verb" || $mn=="v."){
                      $val=$para->getElementsByTagName('fov')->item(0);
                      $sp=$val->getElementsByTagName('sp');
                      $pp=$val->getElementsByTagName('pp');
                      $sim=$val->getElementsByTagName('sim_pre');
                      $pre=$val->getElementsByTagName('pre_par');
                      foreach($sp as $s ){
                          $v=$s->nodeValue;
            echo "<label><u>Simple Past</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='wrd1' name='wrd1' value='$v' autofocus><br><br>";
                      }

                      foreach($pp as $s ){
                          $v=$s->nodeValue;
            echo "<label><u>Past Perfect</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='wrd2' name='wrd2' value='$v' autofocus><br><br>";
                      }

                      foreach($sim as $s ){
                          $v=$s->nodeValue;
            echo "<label><u>Simple Present</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='wrd3' name='wrd3' value='$v' autofocus><br><br>";
                      }

                      foreach($pre as $s ){
                          $v=$s->nodeValue;
            echo "<label><u>Present Perfect</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='wrd4' name='wrd4' value='$v' autofocus><br><br>";
                      }
                  }
              }
            ?>

            <div id="dynamicInput2"></div>          
            <input class="btn btn-primary btn-md pull-right"  type="button" value=" + Add another verb-form " onClick="addInput2('dynamicInput2');"><br><br><br>

            <?php      
            echo "<label><u>Rhyme</u> : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		    <input class='f_block' type='text' id='rhy' name='rhy' style='width: 500px;' value='$rym' autofocus><br><br><br><br>";
            ?>
            <center><input type='submit' class='btn btn-primary btn-md' onclick="return confirm('Are you sure to modify ?')" name='submit' value='Save'></center>
		    
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
