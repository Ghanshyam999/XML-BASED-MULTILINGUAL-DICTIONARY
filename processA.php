<?php
function Assamese($search){
$var1="assamese.xml";
$xml=simplexml_load_file($var1) or die("Error: Cannot create object");

for($i=0;$i<count($xml->ass->ent);$i++){
if(strcmp($xml->ass->ent[$i]->word,$search)==0){

$gender=0;
echo "<h2 style=color:red;>"." <i><b>" .$xml->ass->ent[$i]->word."</i></b>"."</h2>";
echo "<span style=color:black;>"." pronunciation : /".$xml->ass->ent[$i]->pro ."</span>"."/<br>" ;
echo "<hr style=color:green;>";
for($j=0;$j<count($xml->ass->ent[$i]->p);$j++){

if(($xml->ass->ent[$i]->p[$j]->pos)=='n.'){
echo "<span style=color:gray; >"."<i>"." Noun "."</i>"."</span>";
}


if(($xml->ass->ent[$i]->p[$j]->pos)=='v.')
echo "<h5 style=color:gray; >"."<i>"." Verb"."</i>"."</h5>";


if(($xml->ass->ent[$i]->p[$j]->pos)=='adj.')
echo "<span style=color:gray; >"."<i>"." Adjective"."</i>"."</span>";


if(($xml->ass->ent[$i]->p[$j]->pos)=='adv.')
echo "<span style=color:gray; >"."<i>"." Adverb"."</i>"."</span>";


if(($xml->ass->ent[$i]->p[$j]->pos)=='prep.')
echo "<span style=color:gray; >"."<i>"." Preposition"."</i>"."</span>";


if(($xml->ass->ent[$i]->p[$j]->pos)=='conj.')
echo "<span style=color:gray; >"."<i>"." Conjuction"."</i>"."</span>";


echo "<br>".$xml->ass->ent[$i]->p[$j]->mean.". ";
echo $xml->ass->ent[$i]->p[$j]->def."<br>";


if($xml->ass->ent[$i]->p[$j]->eg!='')
echo "&nbsp &nbsp".$xml->ass->ent[$i]->p[$j]->eg."<br>";


if($xml->ass->ent[$i]->p[$j]->gen !='' && $gender==0){
echo "<br><span style=color:green;>"."<u>Gender</u> : "."</span>".$xml->ass->ent[$i]->p->gen."<br>";
$gender++;
}

if($xml->ass->ent[$i]->p[$j]->syn!=''){
echo "<br><span style=color:green;>"."<u>Synonyms</u> : "."</span>";
for($syn_count=0;$syn_count<count($xml->ass->ent[$i]->p[$j]->syn);$syn_count++){
echo " <a href=#>".$xml->ass->ent[$i]->p[$j]->syn[$syn_count]."</a>";
if(count($xml->ass->ent[$i]->p[$j]->syn)-$syn_count-1)
echo " ,";
}
}


if($xml->ass->ent[$i]->rhy!='')
echo "Rhyme word :".$xml->ass->ent[$i]->p->rhy . "<br>";

}

if(strcmp(($xml->ass->ent[$i]->word),$search)==0){
echo "<hr>";
if($xml->ass->ent[$i]->origin!='')
echo "<h3 style=color:black;><b>"."Origin"."</b></h3>"."<h5 style=color:black;>".$xml->ass->ent[$i]->origin."</h5>"."<br>";


}
}
}
}
?>
