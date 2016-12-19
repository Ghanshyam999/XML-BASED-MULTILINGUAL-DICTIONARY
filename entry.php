<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<?php
    
$xml = new DOMDocument('1.0', 'utf-8');
$xml->formatOutput = true; 
$xml->preserveWhiteSpace = false; 
   


//          *********** ENGLISH CODE : ***********



if ($_SERVER["REQUEST_METHOD"] =="POST") 
{
    if($_POST['submit'] && $_POST['lng']=="ENGLISH" )
    {
        $alpha=strtolower($_POST['word'][0]);
        $file=$alpha."_words.xml";

        $xml->load($file); 
        $lang = $xml->getElementsByTagName('eng')->item(0);

        if($lang->nodeValue=="")
        {
            $dict=$xml->getElementsByTagName('dictionary')->item(0);
            $dict->appendChild($xml->createElement('eng'));
            $lang = $xml->getElementsByTagName('eng')->item(0);
        }

        $ent = $xml->createElement('ent');

$ent->appendChild($xml->createElement('word', strtolower($_POST['word'])));
$ent->appendChild($xml->createElement('word_h', $_POST['word_h']));
$ent->appendChild($xml->createElement('word_s', $_POST['word_s']));
$ent->appendChild($xml->createElement('word_a', $_POST['word_a']));
$ent->appendChild($xml->createElement('pro', $_POST['pro'] ));
$ent->appendChild($xml->createElement('origin', $_POST['ori']));

$no = $_POST["pos"];
$i=0;
$found=0;

foreach ($no as $num) {
     $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', $_POST['pos'][$i]));
     $para->appendChild($xml->createElement('def', $_POST['def'][$i]));

     if(strtolower($_POST['pos'][$i])=="verb")
     {
         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);
         $found=1;
     }

        $count1=0;
        $syn=array();
        $arr=$_POST['syn'][$i];
        for($j=0;$j<strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('syn', $syn[$count1]));
                $count1++;    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $syn[$count1]=$syn[$count1].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $syn[$count1]=$syn[$count1].$arr[$j];   
            }
        }

        $count2=0;
        $ant=array();
        $arr=$_POST['ant'][$i];
        for($j=0;$j<strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('ant', $ant[$count2]));
                $count2++;                    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $ant[$count2]=$ant[$count2].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $ant[$count2]=$ant[$count2].$arr[$j];   
            }
        }

        $count=0;
        $plu=array();
        $arr=$_POST['pl'][$i];
        for($j=0;$j<=strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('pl', $plu[$count]));
                $count++;    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $plu[$count]=$plu[$count].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $plu[$count]=$plu[$count].$arr[$j];   
            }
        }

        $para->appendChild($xml->createElement('syn', $syn[$count1]));
        $para->appendChild($xml->createElement('ant', $ant[$count2]));
        $para->appendChild($xml->createElement('pl', $plu[$count]));
        $para->appendChild($xml->createElement('gen', $_POST['gen'][$i]));
        $para->appendChild($xml->createElement('phr', $_POST['phr'][$i]));
        $para->appendChild($xml->createElement('eg', $_POST['eg'][$i]));

        $ent->appendChild($para);
     $i++;

}

if($found==0 && strcmp($_POST["wrd"][0],"")!=0)
{
    $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', "verb"));
     $para->appendChild($xml->createElement('def', $_POST['def'][$i]));

         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);

        $para->appendChild($xml->createElement('syn', ""));
        $para->appendChild($xml->createElement('ant', ""));
        $para->appendChild($xml->createElement('pl', ""));
        $para->appendChild($xml->createElement('gen', ""));
        $para->appendChild($xml->createElement('phr', ""));
        $para->appendChild($xml->createElement('eg', ""));

        $ent->appendChild($para);
}

$ent->appendChild($xml->createElement('rhy', $_POST['rhy']));
$lang->appendChild($ent);

  $xml->save($file);

     echo '<script type="text/javascript">';
     echo 'alert(" Word Successfully Added !!! ");';
     echo 'window.location.href = "add_eng.php"';
     echo '</script>';
  
        
}



//          *********** HINDI CODE : ***********


else if($_POST['submit'] && $_POST['lng']=="HINDI" )
    {
        $xml->load('hindi.xml'); 
        $lang = $xml->getElementsByTagName('hin')->item(0);

        if($lang->nodeValue=="")
        {
            $dict=$xml->getElementsByTagName('dictionary')->item(0);
            $dict->appendChild($xml->createElement('hin'));
            $lang = $xml->getElementsByTagName('hin')->item(0);
        }

        $ent = $xml->createElement('ent');

$ent->appendChild($xml->createElement('word', $_POST['word']));
$ent->appendChild($xml->createElement('word_e', strtolower($_POST['word_e'])));
$ent->appendChild($xml->createElement('word_s', $_POST['word_s']));
$ent->appendChild($xml->createElement('word_a', $_POST['word_a']));
$ent->appendChild($xml->createElement('pro', $_POST['pro'] ));
$ent->appendChild($xml->createElement('origin', $_POST['ori']));

$no = $_POST["pos"];
$i=0;
$found=0;

foreach ($no as $num) {
     $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', $_POST['pos'][$i]));
     $para->appendChild($xml->createElement('def', $_POST['def'][$i]));

     if(strtolower($_POST['pos'][$i])=="verb")
     {
         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);
         $found=1;
     }

        $count1=0;
        $syn=array();
        $arr=$_POST['syn'][$i];
        for($j=0;$j<strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('syn', $syn[$count1]));
                $count1++;    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $syn[$count1]=$syn[$count1].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $syn[$count1]=$syn[$count1].$arr[$j];   
            }
        }

        $count2=0;
        $ant=array();
        $arr=$_POST['ant'][$i];
        for($j=0;$j<strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('ant', $ant[$count2]));
                $count2++;                    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $ant[$count2]=$ant[$count2].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $ant[$count2]=$ant[$count2].$arr[$j];   
            }
        }

        $count=0;
        $plu=array();
        $arr=$_POST['pl'][$i];
        for($j=0;$j<=strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('pl', $plu[$count]));
                $count++;    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $plu[$count]=$plu[$count].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $plu[$count]=$plu[$count].$arr[$j];   
            }
        }

        $para->appendChild($xml->createElement('syn', $syn[$count1]));
        $para->appendChild($xml->createElement('ant', $ant[$count2]));
        $para->appendChild($xml->createElement('pl', $plu[$count]));
        $para->appendChild($xml->createElement('gen', $_POST['gen'][$i]));
        $para->appendChild($xml->createElement('phr', $_POST['phr'][$i]));
        $para->appendChild($xml->createElement('eg', $_POST['eg'][$i]));

        $ent->appendChild($para);
     $i++;

}

if($found==0 && strcmp($_POST["wrd"][0],"")!=0)
{
    $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', "verb"));
     $para->appendChild($xml->createElement('def', $_POST['def'][$i]));

         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);

        $para->appendChild($xml->createElement('syn', ""));
        $para->appendChild($xml->createElement('ant', ""));
        $para->appendChild($xml->createElement('pl', ""));
        $para->appendChild($xml->createElement('gen', ""));
        $para->appendChild($xml->createElement('phr', ""));
        $para->appendChild($xml->createElement('eg', ""));

        $ent->appendChild($para);
}

$ent->appendChild($xml->createElement('rhy', $_POST['rhy']));
$lang->appendChild($ent);


  $xml->save('hindi.xml');

  echo '<script type="text/javascript">';
     echo 'alert(" Word Successfully Added !!! ");';
     echo 'window.location.href = "add_hnd.php"';
     echo '</script>';

    }


    //          *********** SANSKRIT CODE : ***********


    else if($_POST['submit'] && $_POST['lng']=="SANSKRIT" )
    {
        $xml->load('sanskrit.xml'); 
        $lang = $xml->getElementsByTagName('sans')->item(0);
        
        if($lang->nodeValue=="")
        {
            $dict=$xml->getElementsByTagName('dictionary')->item(0);
            $dict->appendChild($xml->createElement('sans'));
            $lang = $xml->getElementsByTagName('sans')->item(0);
        }
        
        $ent = $xml->createElement('ent');

$ent->appendChild($xml->createElement('word', $_POST['word']));
$ent->appendChild($xml->createElement('word_e', strtolower($_POST['word_e'])));
$ent->appendChild($xml->createElement('word_h', $_POST['word_h']));
$ent->appendChild($xml->createElement('word_a', $_POST['word_a']));
$ent->appendChild($xml->createElement('pro', $_POST['pro'] ));
$ent->appendChild($xml->createElement('origin', $_POST['ori']));

$no = $_POST["pos"];
$i=0;
$found=0;

foreach ($no as $num) {
     $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', $_POST['pos'][$i]));
     $para->appendChild($xml->createElement('cases', $_POST['cas'][$i]));
     $para->appendChild($xml->createElement('num', $_POST['num'][$i]));
     $para->appendChild($xml->createElement('person', $ant['prsn'][$i]));
     $para->appendChild($xml->createElement('def', $plu['def'][$i]));
        
     if(strtolower($_POST['pos'][$i])=="verb")
     {
         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);
         $found=1;
     }

        $para->appendChild($xml->createElement('gen', $_POST['gen'][$i]));
        $para->appendChild($xml->createElement('ending', $_POST['endg'][$i]));
        $para->appendChild($xml->createElement('eg', $_POST['eg'][$i]));

        $ent->appendChild($para);
     $i++;

}

if($found==0 && strcmp($_POST["wrd"][0],"")!=0)
{
    $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', "verb"));
     $para->appendChild($xml->createElement('num', ""));
     $para->appendChild($xml->createElement('person', ""));
     $para->appendChild($xml->createElement('cases', ""));
     $para->appendChild($xml->createElement('def', ""));

         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);

        $para->appendChild($xml->createElement('gen', ""));
        $para->appendChild($xml->createElement('ending', ""));
        $para->appendChild($xml->createElement('eg', ""));

        $ent->appendChild($para);
}

$ent->appendChild($xml->createElement('rhy', $_POST['rhy']));
$lang->appendChild($ent);

  $xml->save('sanskrit.xml');

  echo '<script type="text/javascript">';
     echo 'alert(" Word Successfully Added !!! ");';
     echo 'window.location.href = "add_san.php"';
     echo '</script>';

    }


    //          *********** ASSAMESE CODE : ***********



    else if($_POST['submit'] && $_POST['lng']=="ASSAMESE" )
    {
        $xml->load('assamese.xml'); 
        $lang = $xml->getElementsByTagName('ass')->item(0);

        if($lang->nodeValue=="")
        {
            $dict=$xml->getElementsByTagName('dictionary')->item(0);
            $dict->appendChild($xml->createElement('ass'));
            $lang = $xml->getElementsByTagName('ass')->item(0);
        }

        $ent = $xml->createElement('ent');

$ent->appendChild($xml->createElement('word', $_POST['word']));
$ent->appendChild($xml->createElement('word_e', strtolower($_POST['word_e'])));
$ent->appendChild($xml->createElement('word_s', $_POST['word_s']));
$ent->appendChild($xml->createElement('word_h', $_POST['word_h']));
$ent->appendChild($xml->createElement('pro', $_POST['pro'] ));
$ent->appendChild($xml->createElement('origin', $_POST['ori']));

$no = $_POST["pos"];
$i=0;
$found=0;

foreach ($no as $num) {
     $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', $_POST['pos'][$i]));
     $para->appendChild($xml->createElement('def', $_POST['def'][$i]));

     if(strtolower($_POST['pos'][$i])=="verb")
     {
         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);
         $found=1;
     }

        $count1=0;
        $syn=array();
        $arr=$_POST['syn'][$i];
        for($j=0;$j<strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('syn', $syn[$count1]));
                $count1++;    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $syn[$count1]=$syn[$count1].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $syn[$count1]=$syn[$count1].$arr[$j];   
            }
        }

        $count2=0;
        $ant=array();
        $arr=$_POST['ant'][$i];
        for($j=0;$j<strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('ant', $ant[$count2]));
                $count2++;                    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $ant[$count2]=$ant[$count2].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $ant[$count2]=$ant[$count2].$arr[$j];   
            }
        }

        $count=0;
        $plu=array();
        $arr=$_POST['pl'][$i];
        for($j=0;$j<=strlen($arr);$j++)
        {
            if($arr[$j]==",")
            {
                $para->appendChild($xml->createElement('pl', $plu[$count]));
                $count++;    
            }

            else if(ctype_alpha($arr[$j]))
            {
                $plu[$count]=$plu[$count].$arr[$j];
            }
            
            else if($arr[$j]==" " && ctype_alpha($arr[$j-1]) && ctype_alpha($arr[$j+1]))
            {
                 $plu[$count]=$plu[$count].$arr[$j];   
            }
        }

        $para->appendChild($xml->createElement('syn', $syn[$count1]));
        $para->appendChild($xml->createElement('ant', $ant[$count2]));
        $para->appendChild($xml->createElement('pl', $plu[$count]));
        $para->appendChild($xml->createElement('gen', $_POST['gen'][$i]));
        $para->appendChild($xml->createElement('phr', $_POST['phr'][$i]));
        $para->appendChild($xml->createElement('eg', $_POST['eg'][$i]));

        $ent->appendChild($para);
     $i++;

}

if($found==0 && strcmp($_POST["wrd"][0],"")!=0)
{
    $para=$xml->createElement('p');

     $para->appendChild($xml->createElement('mean', ($i+1)));
     $para->appendChild($xml->createElement('pos', "verb"));
     $para->appendChild($xml->createElement('def', $_POST['def'][$i]));

         $vb=$_POST["vf"];
         $wr=0;
         $verb=$xml->createElement('fov');
         foreach($vb as $vrb)
         {
             if($vrb=="sp")
             $verb->appendChild($xml->createElement('sp', $_POST['wrd'][$wr]));

             else if($vrb=="pp")
             $verb->appendChild($xml->createElement('pp', $_POST['wrd'][$wr]));

             else if($vrb=="simpre")
             $verb->appendChild($xml->createElement('sim_pre', $_POST['wrd'][$wr]));

             else if($vrb=="prepar")
             $verb->appendChild($xml->createElement('pre_par', $_POST['wrd'][$wr]));
             $wr++;
         }
         $para->appendChild($verb);

        $para->appendChild($xml->createElement('syn', ""));
        $para->appendChild($xml->createElement('ant', ""));
        $para->appendChild($xml->createElement('pl', ""));
        $para->appendChild($xml->createElement('gen', ""));
        $para->appendChild($xml->createElement('phr', ""));
        $para->appendChild($xml->createElement('eg', ""));

        $ent->appendChild($para);
}

$ent->appendChild($xml->createElement('rhy', $_POST['rhy']));
$lang->appendChild($ent);

  $xml->save('assamese.xml');

  echo '<script type="text/javascript">';
     echo 'alert(" Word Successfully Added !!! ");';
     echo 'window.location.href = "add_ass.php"';
     echo '</script>';
    }
}

?>