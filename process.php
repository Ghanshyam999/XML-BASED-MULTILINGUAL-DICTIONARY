<?php 
      session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dictionary</title>
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
    <div class="col-sm-2 sidenav hidden-xs">
      <div class="f1"><h2 align="center"><b><u>Dictionary</u></b></h2></div>
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
                    <?php
                        if(isset($_SESSION['id']))
                        {
                            echo '<li align="center"><a class="active" href="process.php">HOME</a></li>';
                        }
                        else
                        {
                            echo '<li align="center"><a class="active" href="signup.html">REGISTER   !!!</a></li>';
                        }
                    ?>
        <li align="center"><a href="add_eng.php">ADD</a></li>
        <li align="center"><a href="entry_mod_main.php">MODIFY</a></li>
        <li align="center"><a href="delete_ent.php">DELETE</a></li>
                    <?php
                        if(!isset($_SESSION['id']))
                        {
		                    echo '<li align="center"><a href="signin.html">SIGN IN</a></li>';
                        }
                    ?>
      </ul><br>
       </div>
      
      <div class="col-sm-10 "><img src="images/dictionary.jpg" height="150" width="1080"></div>
    <div class="col-sm-10 pad" style="margin-bottom: 50px">
        <ul class="nav navbar-nav nav-pills">
        <li align="center" style="margin-left: 50px; width: 200px; padding: 0px 10px 0px 10px"><a class="active" href="process.php">HOME</a></li>
        <li align="center" style="width: 200px; padding: 0px 10px 0px 10px"><a href="add_eng.php">ADD</a></li>
        <li align="center" style="width: 200px; padding: 0px 10px 0px 10px"><a href="entry_mod_main.php">MODIFY</a></li>
        <li align="center" style="width: 200px; padding: 0px 10px 0px 10px"><a href="delete_ent.php">DELETE</a></li>
		            <?php
                        if(!isset($_SESSION['id']))
                        {
                            echo '<li align="center" style="width: 200px; padding: 0px 10px 0px 10px"><a href="signin.html">SIGN IN</a></li>';
                        }
                    ?>
      </ul><br>
    </div>
	  
	  <div class="col-sm-12">
<p>  </p>
    <div class="col-sm-12">
      <div class="well ff">
	   <div class="box" align="center">
		<form action="process.php" method="POST" >
		<input type="search" id="search" name="search" placeholder="Search..." style="height:32px; width:700px; background-color: #f3e5ab; color: #1E8449;"  autofocus/>
		<input class="btn btn-primary btn-md"  name="submit" type="submit" value="Search"  >
		<br><br>
		<select name="LANG1" style="color:#1E8449; height:32px; width:300px; background-color: #f3e5ab; color: #1E8449;">
		<option value="English" > English</option>
		<option value="Hindi" >Hindi</option>
		<option value="Assamese" >Assamese</option>
		<option value="Sanskrit" >Sanskrit</option>
		</select>
		&nbsp &nbsp <span style="color: #f00;"> to &nbsp &nbsp 
		<select name="LANG2" style="color:#1E8449; height:32px; width:300px; background-color: #f3e5ab; color: #1E8449;">
		<option value="English" > English</option>
		<option value="Hindi" >Hindi</option>
		<option value="Assamese" >Assamese</option>
		<option value="Sanskrit" >Sanskrit</option>
		</select>
		  
	</form>
		<div  class ="col-xs-0 pull-right ">
		
	</div>
  </div>
  </div>
  
 
      </div>
	  <style>
hr { 
    display:block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;

} 
	  .lop{
	  color:blue;
	  }
	  
	  </style>
   <div class="col-sm-12">
      
<?php
if ($_SERVER["REQUEST_METHOD"] =="POST") {
	echo '<div class="well ff">';
	echo '<div class="box lop" align="left"  >';
	 
$count=0;

include 'processE.php';
include 'processA.php';
include 'processS.php';
include 'processH.php';
//*************************************//    For English   When   Searching text is English     //**************************************************//
			
 if($_POST['LANG1']=='English'){

				//	Starting of English code	//

 if($_POST['LANG2']=='English'){
$var2=strtolower($_POST['search'][0]);
$var1=$var2."_words.xml";

English($var1,$_POST['search']);
}
				//	Ending of English code	 //

// ................................................................................................................................................//


// ................................................................................................................................................//

				//	Starting of Assamese 	//
		
else if($_POST['LANG2']=='Assamese'){

$var2=strtolower($_POST['search'][0]);
$var1=$var2."_words.xml";

$xml=simplexml_load_file($var1) or die("Error: Cannot create object");
$def=0;
$word;
for($i=0;$i<count($xml->eng->ent);$i++)
if(($xml->eng->ent[$i]->word)==(strtolower($_POST['search']))){
$def++;
$word=$xml->eng->ent[$i]->word_a;
break;
}
	if($def==0)
	echo "<h3>Word is not Available in the Dictionary.<h3>";
	else
	Assamese($word);

}
					// Ending of Assamese code //
//..................................................................................................................................................//

//..................................................................................................................................................//

					// Starting of Hindi code   //

else if($_POST['LANG2']=='Hindi'){

$var2=strtolower($_POST['search'][0]);
$var1=$var2."_words.xml";

$xml=simplexml_load_file($var1) or die("Error: Cannot create object");
$def=0;
$word;
for($i=0;$i<count($xml->eng->ent);$i++)
if(($xml->eng->ent[$i]->word)==(strtolower($_POST['search']))){
	$def++;
$word=$xml->eng->ent[$i]->word_h;
break;
}
if($def==0)
	echo "<h3>Word is not Available in the Dictionary.<h3>";
	else
	Hindi($word);

}

				   // Ending of Hindi Code //
//.................................................................................................................................................//	


//.................................................................................................................................................//	


                                  // Starting of Sanskrit code //
                                   
if($_POST['LANG2']=='Sanskrit'){

$var2=strtolower($_POST['search'][0]);
$var1=$var2."_words.xml";

$xml=simplexml_load_file($var1) or die("Error: Cannot create object");
$def=0;
$word;

for($i=0;$i<count($xml->eng->ent);$i++)
if(($xml->eng->ent[$i]->word)==(strtolower($_POST['search']))){
$def++;
$word=$xml->eng->ent[$i]->word_s;
break;
}

if($def==0)
	echo "<h3>Word is not Available in the Dictionary.<h3>";
	else
		Sanskrit($word);

}
						//   Ending of Sanskrit code  //


}

//.................................................................................................................................................//	


//.................................................................................................................................................//	



//****************************************//    For Hindi   When   Searching text is Hindi     //****************************************************//
			
 else if($_POST['LANG1']=='Hindi'){


				//	Starting of English code	//


 if($_POST['LANG2']=='English'){

$hindi_ert="hindi.xml";


$word;
$def=0;

$xml_h=simplexml_load_file($hindi_ert) or die("Word is not Available in the Dictionary.");

for($i=0;$i<count($xml_h->hin->ent);$i++)
if(($xml_h->hin->ent[$i]->word)==$_POST['search']){
	$word=$xml_h->hin->ent[$i]->word_e;
	$def++;
	break;
	
}
	if($def==0)
	echo "<h3>Word is not Available in the Dictionary.<h3>";
	else{

	$first=substr($word,0,1);
	$file_name=$first."_words.xml";
	English($file_name,$word);
	}

}
			//	Ending of English code	 //

// ................................................................................................................................................//


// ................................................................................................................................................//

				//	Starting of Assamese 	//
		
else if($_POST['LANG2']=='Assamese'){

$hindi_ert="hindi.xml";


$word;
$def=0;
$xml_h=simplexml_load_file($hindi_ert) or die("Word is not Available in the Dictionary.");

for($i=0;$i<count($xml_h->hin->ent);$i++)
if(($xml_h->hin->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->hin->ent[$i]->word_a;
	break;
}
if($def==0)
echo "<h3>Word is not Available in the Dictionary.</h3>";
else
Assamese($word);

}
					// Ending of Assamese code //
//..................................................................................................................................................//

//..................................................................................................................................................//

					// Starting of Hindi code   //

else if($_POST['LANG2']=='Hindi'){


Hindi($_POST['search']);

}

				   // Ending of Hindi Code //
//.................................................................................................................................................//	


//.................................................................................................................................................//	


                                  // Starting of Sanskrit code //

else if($_POST['LANG2']=='Sanskrit'){

$hindi_ert="hindi.xml";



$def=0;
$word;
$xml_h=simplexml_load_file($hindi_ert) or die("Word is not Available in the Dictionary.");

for($i=0;$i<count($xml_h->hin->ent);$i++)
if(($xml_h->hin->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->hin->ent[$i]->word_s;
	break;
}

if($def==0)
echo "<h3>Word is not Available in the Dictionary.</h3>";
else
Sanskrit($word);
}
//.................................................................................................................................................//	


//.................................................................................................................................................//	


			//   Ending of Sanskrit code  //


}


//.................................................................................................................................................//	


//.................................................................................................................................................//	



//****************************************//    For Assamese   When   Searching text is Assamese     //****************************************************//
			
else if($_POST['LANG1']=='Assamese'){


				//	Starting of English code	//

 if($_POST['LANG2']=='English'){

$ass_ert="assamese.xml";

$def=0;
$word;
$xml_h=simplexml_load_file($ass_ert) or die("Word is not Available in the Dictionary.");


for($i=0;$i<count($xml_h->ass->ent);$i++)
if(($xml_h->ass->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->ass->ent[$i]->word_e;
	break;

}

$first=substr($word,0,1);
$file_name=$first."_words.xml";

English($file_name,$word);

}
			//	Ending of English code	 //

// ................................................................................................................................................//


// ................................................................................................................................................//

				//	Starting of Assamese 	//
		
else if($_POST['LANG2']=='Assamese'){

Assamese($_POST['search']);
}
					// Ending of Assamese code //
//..................................................................................................................................................//

//..................................................................................................................................................//

					// Starting of Hindi code   //

else if($_POST['LANG2']=='Hindi'){

$ass_ert="assamese.xml";

$def=0;
$word;
$xml_h=simplexml_load_file($ass_ert) or die("Word is not Available in the Dictionary.");

for($i=0;$i<count($xml_h->ass->ent);$i++)
if(($xml_h->ass->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->ass->ent[$i]->word_h;
	break;
}
if($def==0)
echo "<h3>Word is not Available in the Dictionary.</h3>";
else
Hindi($word);

}

				   // Ending of Hindi Code //
//.................................................................................................................................................//	


//.................................................................................................................................................//	


                                  // Starting of Sanskrit code //

else if($_POST['LANG2']=='Sanskrit'){

$ass_ert="assamese.xml";
$xml_h=simplexml_load_file($ass_ert) or die("Word is not Available in the Dictionary.");

$def=0;
$word;
for($i=0;$i<count($xml_h->ass->ent);$i++)
if(($xml_h->ass->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->ass->ent[$i]->word_s;
	break;
}
	
if($def==0)
echo "<h3>Word is not Available in the Dictionary.</h3>";
else
Sanskrit($word);

}
//.................................................................................................................................................//	


//.................................................................................................................................................//	


			//   Ending of Sanskrit code  //




}



//.................................................................................................................................................//	


//.................................................................................................................................................//	



//****************************************//    For sanskrit   When   Searching text is sanskrit     //****************************************************//
			
 else if($_POST['LANG1']=='Sanskrit'){


				//	Starting of English code	//


 if($_POST['LANG2']=='English'){

$sans_ert="sanskrit.xml";


$def=0;
$word;

$xml_h=simplexml_load_file($sans_ert) or die("<h3>Word is not Available in the Dictionary.</h3>");

for($i=0;$i<count($xml_h->sans->ent);$i++)
if(($xml_h->sans->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->sans->ent[$i]->word_e;
	break;
}


$first=substr($word,0,1);
$file_name=$first."_words.xml";
if($def==0)
echo "<h3>Word is not Available in the Dictionary.</h3>";
else
English($file_name,$word);

}
			//	Ending of English code	 //

// ................................................................................................................................................//


// ................................................................................................................................................//

				//	Starting of Assamese 	//
		
else if($_POST['LANG2']=='Assamese'){
	
$sans_ert="sanskrit.xml";


$def =0;
$word;	
$xml_h=simplexml_load_file($sans_ert) or die("Word is not Available in the Dictionary.");

for($i=0;$i<count($xml_h->sans->ent);$i++)
if(($xml_h->sans->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->sans->ent[$i]->word_a;
	break;
}
if($def==0)
echo "<h3>Word is not Available in the Dictionary.</h3>";
else
Assamese($word);

}
					// Ending of Assamese code //
//..................................................................................................................................................//

//..................................................................................................................................................//

					// Starting of Hindi code   //

else if($_POST['LANG2']=='Hindi'){

$sans_ert="sanskrit.xml";


$def=0;
$word;
$xml_h=simplexml_load_file($sans_ert) or die("Word is not Available in the Dictionary.");

for($i=0;$i<count($xml_h->sans->ent);$i++)
if(($xml_h->sans->ent[$i]->word)==$_POST['search']){
	$def++;
	$word=$xml_h->sans->ent[$i]->word_h;
	break;
}

	if($def==0)
	echo "<h3>Word is not Available in the Dictionary.</h3>";
	else
	Hindi($word);
}

				   // Ending of Hindi Code //
//.................................................................................................................................................//	


//.................................................................................................................................................//	


                                  // Starting of Sanskrit code //

else if($_POST['LANG2']=='Sanskrit'){

Sanskrit($_POST['search']);

}
//.................................................................................................................................................//	


//.................................................................................................................................................//	


			//   Ending of Sanskrit code  //

}
}
?>
	   
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
