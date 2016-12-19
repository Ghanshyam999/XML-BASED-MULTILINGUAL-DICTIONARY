<?php
function Hindi($search){
$var1="hindi.xml";
$xml=simplexml_load_file($var1) or die("Error: Cannot create object");

$found=0;


for($i=0;$i<count($xml->hin->ent);$i++){

if(strcmp($xml->hin->ent[$i]->word,$search)==0){

 $found++;

echo "<h2 style=color:red;>"." <i><b>" .$xml->hin->ent[$i]->word."</i></b>"."</h2>";
echo "<span style=color:black;>"." pronunciation : /".$xml->hin->ent[$i]->pro ."</span>"."/<br>" ;
echo "<hr style=color:green;>";


for($j=0;$j<count($xml->hin->ent[$i]->p);$j++){


if(($xml->hin->ent[$i]->p[$j]->pos)=="n."){
echo "<span style=color:gray; >"."<i>"." Noun "."</i>"."</span>";
if(($xml->hin->ent[$i]->p[$j]->pl)!='')
echo "<i style=color=black;><b>"."("."Plural: "."<span style=color:red;>". "&nbsp &nbsp".$xml->hin->ent[$i]->p->pl."</span>".")"."</i></b>"."<br>";
}


if($xml->hin->ent[$i]->p[$j]->gen !='')
echo "<br><span style=color:green;>"."<u>Gender</u> : "."</span>".$xml->hin->ent[$i]->p->gen."<br>";


if(($xml->hin->ent[$i]->p[$j]->pos)=='v.')
echo "<br><hr>"."<span style=color:gray; >"."<i>"." Verb"."</i>"."</span>"."<br>";


if(($xml->hin->ent[$i]->p[$j]->pos)=='adj.')
echo "<hr><span style=color:gray; >"."<i>"." Adjective"."</i>"."</span>";


if(($xml->hin->ent[$i]->p[$j]->pos)=='adv.')
echo "<hr><span style=color:gray; >"."<i>"." Adverb"."</i>"."</span>";


if(($xml->hin->ent[$i]->p[$j]->pos)=='prep.')
echo "<hr><span style=color:gray; >"."<i>"." Preposition"."</i>"."</span>";


if(($xml->hin->ent[$i]->p[$j]->pos)=='conj.')
echo "<hr><span style=color:gray; >"."<i>"." Conjuction"."</i>"."</span>";


echo "<br>".$xml->hin->ent[$i]->p[$j]->mean.". ";

echo $xml->hin->ent[$i]->p[$j]->def."<br>";

if($xml->hin->ent[$i]->p[$j]->eg!='')
echo "&nbsp &nbsp".$xml->hin->ent[$i]->p[$j]->eg."<br>";

if($xml->hin->ent[$i]->p[$j]->syn!=''){
echo "<br><span style=color:green;>"."<u>Synonyms</u> : "."</span>";
for($syn_count=0;$syn_count<count($xml->hin->ent[$i]->p[$j]->syn);$syn_count++){
echo " <a href=#>".$xml->hin->ent[$i]->p[$j]->syn[$syn_count]."</a>";
if(count($xml->hin->ent[$i]->p[$j]->syn)-$syn_count-1)
echo " ,";
}
}

}

if($xml->hin->ent[$i]->rhy!='')
echo "<hr><span style=color:green;>"."<u>Rhyme</u> : "."</span>".$xml->hin->ent[$i]->rhy . "<br>";

if(strcmp(($xml->hin->ent[$i]->word),$search)==0){
echo "<hr>";
if($xml->hin->ent[$i]->origin!='')
echo "<h3 style=color:black;><b>"."Origin"."</b></h3>"."<h5 style=color:black;>".$xml->hin->ent[$i]->origin."</h5>"."<br>";
}


}
if($found>0)
break;
}
}
?>
