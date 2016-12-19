<?php 
function English($var,$search){

$xml=simplexml_load_file($var) or die("Word is not Available in the Dictionary.");
$counter=0;
for($i=0;$i<count($xml->eng->ent);$i++){

if(strcmp($xml->eng->ent[$i]->word,$search)==0){
$counter=1;
echo "<h2 style=color:red;>"." <i><b>" .$xml->eng->ent[$i]->word."</i></b>"."</h2>";
echo "<span style=color:black;>"." pronunciation : /".$xml->eng->ent[$i]->pro ."</span>"."/<br>" ;
echo "<hr style=color:green;>";

$noun=0;
$gender=0;

for($j=0;$j<count($xml->eng->ent[$i]->p);$j++){

if(($xml->eng->ent[$i]->p[$j]->pos)=='n.' && $noun==0){

$noun++;

echo "<span style=color:gray; >"."<i>"." Noun "."</i>"."</span>";

if(($xml->eng->ent[$i]->p->pl)=='s.'  || ($xml->eng->ent[$i]->p->pl)=='ies.' || ($xml->eng->ent[$i]->p->pl)=='es.')
echo "<i style=color=black;><b>"."("."Plural: "."<span style=color:red;>". "&nbsp &nbsp".$xml->eng->ent[$i]->word.$xml->eng->ent[$i]->p->pl."</span>".")"."</i></b>"."<br>";

}


if($xml->eng->ent[$i]->p->gen !='' && $gender==0){
echo "<br><span style=color:green;>"."<u>Gender</u> : "."</span>".$xml->eng->ent[$i]->p->gen."<br>";
$gender++;
}


if(($xml->eng->ent[$i]->p[$j]->pos)=='v.')
echo "<br><hr>"."<span style=color:gray; >"."<i>"." Verb"."</i>"."</span>"."<br>";


if(($xml->eng->ent[$i]->p[$j]->pos)=='adj.')
echo "<hr><span style=color:gray; >"."<i>"." Adjective"."</i>"."</span>";


if(($xml->eng->ent[$i]->p[$j]->pos)=='adv.')
echo "<hr><span style=color:gray; >"."<i>"." Adverb"."</i>"."</span>";


if(($xml->eng->ent[$i]->p[$j]->pos)=='prep.')
echo "<hr><span style=color:gray; >"."<i>"." Preposition"."</i>"."</span>";


if(($xml->eng->ent[$i]->p[$j]->pos)=='conj.')
echo "<hr><span style=color:gray; >"."<i>"." Conjuction"."</i>"."</span>";


echo "<br>".$xml->eng->ent[$i]->p[$j]->mean.". ";


echo $xml->eng->ent[$i]->p[$j]->def;


if($xml->eng->ent[$i]->p[$j]->eg)
echo "&nbsp &nbsp".$xml->eng->ent[$i]->p[$j]->eg."<br>";


if($xml->eng->ent[$i]->p[$j]->syn!=''){
echo "<br><span style=color:green;>"."<u>Synonyms</u> : "."</span>";
for($syn_count=0;$syn_count<count($xml->eng->ent[$i]->p[$j]->syn);$syn_count++){
echo " <a href=#>".$xml->eng->ent[$i]->p[$j]->syn[$syn_count]."</a>";
if(count($xml->eng->ent[$i]->p[$j]->syn)-$syn_count-1)
echo " ,";
}
echo "<br>";
}


}

if(strcmp(($xml->eng->ent[$i]->word),$search)==0){
echo "<hr>";

if($xml->eng->ent[$i]->origin!='')
echo "<h3 style=color:black;><b>"."Origin"."</b></h3>"."<h5 style=color:black;>".$xml->eng->ent[$i]->origin."</h5>"."<br>";

echo "<hr>";
if($xml->eng->ent[$i]->rhy!='')
echo "<span style=color:green;>"."<u>Rhyme</u> : "."</span>".$xml->eng->ent[$i]->rhy . "<br>";
}
}
}

if($counter==0){
for($ent_count=0;$ent_count<count($xml->eng->ent);$ent_count++)
{
 	for($p_count=0;$p_count<count($xml->eng->ent[$ent_count]->p);$p_count++)
		if(($xml->eng->ent[$ent_count]->p[$p_count]->pos)=="v."){
		if(strcmp(($xml->eng->ent[$ent_count]->p[$p_count]->fov->sp),$search)==0)
		{
		echo "<h2 style=color:red;>"." <i><b>" .$xml->eng->ent[$ent_count]->word."</i></b>"."</h2>";
		echo "<span style=color:black;>"." pronunciation : /".$xml->eng->ent[$ent_count]->pro ."</span>"."/<br>" ;
		echo "<hr style=color:green;>";
		echo "<span style=color:black>"."simple participle : ".$xml->eng->ent[$ent_count]->p[$p_count]->fov->sp."</span><br>";
		echo "&nbsp &nbsp".$xml->eng->ent[$ent_count]->p[$p_count]->eg."<br>";

		}
 
	else if(strcmp(($xml->eng->ent[$ent_count]->p[$p_count]->fov->pp),$search)==0)
	{
		echo "<h2 style=color:red;>"." <i><b>" .$xml->eng->ent[$ent_count]->word."</i></b>"."</h2>";
		echo "<span style=color:black;>"." pronunciation : /".$xml->eng->ent[$ent_count]->pro ."</span>"."/<br>" ;
		echo "<hr style=color:green;>";
		echo "<span style=color:black>"."past participle : ".$xml->eng->ent[$ent_count]->p[$p_count]->fov->pp."</span><br>";
		echo "&nbsp &nbsp".$xml->eng->ent[$ent_count]->p[$p_count]->eg."<br>";


	}
	else if(strcmp(($xml->eng->ent[$ent_count]->p[$p_count]->fov->sim_pre),$search)==0)
	{
		echo "<h2 style=color:red;>"." <i><b>" .$xml->eng->ent[$ent_count]->word."</i></b>"."</h2>";
		echo "<span style=color:black;>"." pronunciation : /".$xml->eng->ent[$ent_count]->pro ."</span>"."/<br>" ;
		echo "<hr style=color:green;>";
		echo "<span style=color:black>"."simple present: ".$xml->eng->ent[$ent_count]->p[$p_count]->fov->sim_pre."</span><br>";
		echo "&nbsp &nbsp".$xml->eng->ent[$ent_count]->p[$p_count]->eg."<br>";
		

	}
	else if(strcmp(($xml->eng->ent[$ent_count]->p[$p_count]->fov->pre_par),$search)==0)
	{
		echo "<h2 style=color:red;>"." <i><b>" .$xml->eng->ent[$ent_count]->word."</i></b>"."</h2>";
		echo "<span style=color:black;>"." pronunciation : /".$xml->eng->ent[$ent_count]->pro ."</span>"."/<br>" ;
		echo "<hr style=color:green;>";
		echo "<span style=color:black>"."present participle : ".$xml->eng->ent[$ent_count]->p[$p_count]->fov->pre_par."</span><br>";
		echo "&nbsp &nbsp".$xml->eng->ent[$ent_count]->p[$p_count]->eg."<br>";


	}

break;
}
}
}
}
?>
