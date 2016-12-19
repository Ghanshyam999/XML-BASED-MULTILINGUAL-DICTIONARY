<?php
function Sanskrit($search){
$var1="sanskrit.xml";
$xml=simplexml_load_file($var1) or die("Error: Cannot create object");

for($i=0;$i<count($xml->sans->ent);$i++){

if(strcmp($xml->sans->ent[$i]->word,$search)==0){

echo "<h2 style=color:red;>"." <i><b>" .$xml->sans->ent[$i]->word."</i></b>"."</h2>";
echo "<span style=color:black;>"." pronunciation : /".$xml->sans->ent[$i]->pro ."</span>"."/<br>" ;
echo "<hr style=color:green;>";

for($j=0;$j<count($xml->sans->ent[$i]->p);$j++){

echo "<span style=color:gray; >"."<i>".$xml->sans->ent[$i]->p[$j]->pos."</i>"."</span><br>";

echo "<br>".$xml->sans->ent[$i]->p[$j]->mean.".";
echo $xml->sans->ent[$i]->p[$j]->def."<br>";


if($xml->sans->ent[$i]->p[$j]->sim!=''){
echo "<br><span style=color:green;>"."<u>समरूप शब्द :</u> : "."</span>";
for($syn_count=0;$syn_count<count($xml->sans->ent[$i]->p[$j]->sim);$syn_count++){
echo " <a href=#>".$xml->sans->ent[$i]->p[$j]->sim[$syn_count]."</a>";
if(count($xml->sans->ent[$i]->p[$j]->sim)-$syn_count-1)
echo " ,";
}
echo "<hr>";
}


if($xml->sans->ent[$i]->p[$j]->gen!='')
echo "<br><span style=color:green;>"."लिङ्ग : "."</span>".$xml->sans->ent[$i]->p[$j]->gen."<br>";


if($xml->sans->ent[$i]->p[$j]->ending!='')
echo "<br><span style=color:green;>"."Ending : </span>".$xml->sans->ent[$i]->p[$j]->ending."<br>";


if($xml->sans->ent[$i]->p[$j]->tense!='')
echo "<br><span style=color:green;>".$xml->sans->ent[$i]->p[$j]->tense."</span><br>";


if($xml->sans->ent[$i]->p[$j]->pad!='')
echo "<br><span style=color:green;>".$xml->sans->ent[$i]->p[$j]->pad."</span><br>";


if($xml->sans->ent[$i]->p[$j]->person!='')
echo "<br><span style=color:green;>"."पुरुष : "."</span>".$xml->sans->ent[$i]->p[$j]->person."<br>";


if($xml->sans->ent[$i]->p[$j]->num!='')
echo "<br><span style=color:green;>"."वचन :"."</span>". $xml->sans->ent[$i]->p[$j]->num."<br>";


if($xml->sans->ent[$i]->p[$j]->cases!='')
echo "<br><span style=color:green;>"."विभक्ति : </span>".$xml->sans->ent[$i]->p[$j]->cases."<br>";

}
}

}
}
							
?>	
