<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>

</head>
<body>
<ul id="menu-bar">
 <li ><a href="index.php">Home</a></li>
  <li><a href="fetch.php">Fetch</a></li>
 <li><a href="filternsave.php">Filter and Save</a></li>
 <li><a href="db.php">Database</a></li>
</ul>

<?php 

$con = mysql_connect("localhost","root","");
    if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  if($con)
  echo 'yes';
    mysql_select_db("mir", $con);
    $t1=("TRUNCATE TABLE ninfo");
	$t2=("TRUNCATE TABLE pinfo");
	$t3=("TRUNCATE TABLE ginfo");
    mysql_query($t1);
    mysql_query($t2);
    mysql_query($t3);
for($ff=0;$ff<11;$ff++)
{$str = json_decode(file_get_contents("json/str$ff.json"), true);
echo $str;
echo "<br>";
//s pre requisite
    $a="actors ";
    $al=strlen($a);
    $p="plot ";
    $pl=strlen($p);
    $t="title ";
    $tl=strlen($t);
    $y="year ";
    $yl=strlen($y);
    $m="rated ";//mpaa rating
    $ml=strlen($m);
    $re="released ";
    $rel=strlen($re);
    $ru="runtime ";
    $rul=strlen($ru);
    $g="genre ";
    $gl=strlen($g);
    $d="director ";
    $dl=strlen($d);
    $w="writer ";
    $wl=strlen($w);
    $po="poster ";
    $pol=strlen($po);
    $ir="imdbrating ";
    $irl=strlen($ir);
    $iv="imdbVotes ";
    $ivl=strlen($iv);
    $id="imdbid ";
    $idl=strlen($id);
    //e pre requisite
    
    //s getting actors
    $actors='';
    $s=stripos($str,$a);
    $e=stripos($str,$p);
    for($i=$s+$al;$i<$e-1;$i++)
    $actors.=$str[$i];
    $actors=trim($actors);
    echo $actors;
    echo "<br>";
    //e getting actors
   
    //s getting directors
    $directors='';
    $s=stripos($str,$d);
    $e=stripos($str,$w);
    for($i=$s+$dl;$i<$e-1;$i++)
    $directors.=$str[$i];
    $directors=trim($directors);
    echo $directors;
    echo "<br>";
    //e getting directors
    
    //s getting writer
    $writer='';
    $s=stripos($str,$w);
    $e=stripos($str,$a);
    for($i=$s+$wl;$i<$e-1;$i++)
    $writer.=$str[$i];
    $writer=trim($writer);
    echo $writer;
    echo "<br>";
    //e getting writer
    
     //s getting $genre
    $genre='';
    $s=stripos($str,$g);
    $e=stripos($str,$d);
    for($i=$s+$gl;$i<$e-1;$i++)
    $genre.=$str[$i];
    $genre=str_replace(',',"",$genre);
    echo $genre;
    echo "<br>";
    $token = strtok($genre, " ");
    $gen=array();
    while ($token != false)
     {
        $gen[]=$token;
        $token = strtok(" ");
     }
     print_r($gen);
    echo "<br>";
    //e getting $genre
    
     //s getting $plot
    $plot='';
    $s=stripos($str,$p);
    $e=stripos($str,$po);
    for($i=$s+$pl;$i<$e-1;$i++)
    $plot.=$str[$i];
    
    echo $plot;
    echo "<br>";
    //e getting $plot
    
    //s getting $poster
    $poster='';
    $s=stripos($str,$po);
    $e=stripos($str,$ir);
    for($i=$s+$pol;$i<$e-1;$i++)
    $poster.=$str[$i];
    $poster=trim($poster);
    $poster=str_replace(" ","",$poster);
    $poster=str_replace("http","http:",$poster);
    echo $poster;
    echo "<br>";
    //e getting $poster
    
    //s getting $imrat
    $imrat='';
    $s=stripos($str,$ir);
    $e=stripos($str,$iv);
    for($i=$s+$irl;$i<$e-1;$i++)
    $imrat.=$str[$i];
    
    echo $imrat;
    echo "<br>";
    //e getting $imrat
    
    //s getting $imvot
    $imvot='';
    $s=stripos($str,$iv);
    $e=stripos($str,$id);
    for($i=$s+$ivl;$i<$e-1;$i++)
    $imvot.=$str[$i];
    
    echo $imvot;
    echo "<br>";
    //e getting $imvot
    
    //s getting $imid
    $imid='';
    $s=stripos($str,$id);
    $e=stripos($str,"response");
    for($i=$s+$idl;$i<$e-1;$i++)
    $imid.=$str[$i];
    $imid=trim($imid);
    //$imid  - imdb id 
    //s generate imdb link
    $imdblink='';
    $imdblink="http://www.imdb.com/title/$imid"; 
    //e generate imdb link
    echo $imdblink;
    echo "<br>";
    //e getting $imid
    
    
    
    //s getting $title
    $title='';
    $s=stripos($str,$t);
    $e=stripos($str,$y);
    for($i=$s+$tl;$i<$e-1;$i++)
    $title.=$str[$i];
    $title=trim($title);
    echo $title;
    echo "<br>";
    //e getting $title
    
    
    //s getting $year
    $year='';
    $s=stripos($str,$y);
    $e=stripos($str,$m);
    for($i=$s+$yl;$i<$e-1;$i++)
    $year.=$str[$i];
    
    echo $year;
    echo "<br>";
    //e getting $year
    
    //s getting $release
    $release='';
    $s=stripos($str,$re);
    $e=stripos($str,$ru);
    for($i=$s+$rul;$i<$e-1;$i++)
    $release.=$str[$i];
    $release=trim($release);
    echo $release;
    echo "<br>";
    //e getting $release
    
    //s getting $mpaa
    $mpaa='';
    $s=stripos($str,$m);
    $e=stripos($str,$re);
    for($i=$s+$ml;$i<$e-1;$i++)
    $mpaa.=$str[$i];
    
    echo $mpaa;
    echo "<br>";
    //e getting $mpaa
    
    //s getting $runtime
    $runtime='';
    $s=stripos($str,$ru);
    $e=stripos($str,$g);
    for($i=$s+$rul;$i<$e-1;$i++)
    $runtime.=$str[$i];
    $runtime=trim($runtime);
    echo $runtime;
    echo "<br>";
    //e getting $runtime
    
    $sql1=("INSERT INTO ninfo
VALUES ('$imid','$release','$runtime','$directors','$writer','$actors','$plot','$poster','$imdblink')");
   $sql2=("INSERT INTO pinfo 
VALUES ('$imid', '$title','$year','$mpaa','$imrat','$genre')");
mysql_query($sql1);
mysql_query($sql2);
$sql4=("INSERT INTO l_db
VALUES ('$imid', '$title','$year','$mpaa','$imrat','$genre','$release','$runtime','$directors','$writer','$actors','$plot','$poster','$imdblink')");
mysql_query($sql4);

foreach($gen as $v)
{
    $sql3=("INSERT INTO ginfo 
VALUES ('$imid', '$v')");
mysql_query($sql3);
}


}
mysql_close($con);



?>



</body>
</html>