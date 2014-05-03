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
/*class IMDBtt{

	function tt($title){
		$t = urlencode($title);
		$content = $this->getSite('http://www.imdb.com/find?s=tt&q=' . $t);
		$content = substr($content, strpos($content, 'div id="main"'));
		preg_match('/tt[0-9]{7}/',$content,$matches);
		return reset($matches);
	}

	private function getSite($url){
		$ch = curl_init($url);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch,CURLOPT_MAXREDIRS,1);

		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

}*/
function getmovieinfo()
{   $ff=0;
    $allfiles = array();
    $allfiles = json_decode(file_get_contents('json/allfiles.json'), true);
    
    
    
    foreach($allfiles as $value)
    {
        
        $v=str_replace(' ','%20',$value);
      /*  $IMDB = new IMDBtt();
        $tt = $IMDB->tt($v);
        echo $tt;
        echo "<br>";*/
        $url="http://www.omdbapi.com/?t=$v";
        //$url="http://www.omdbapi.com/?i=$tt";
    echo $url;
    echo "<br>";
    
    $str=@file_get_contents($url);
    $str=str_replace('{','',$str);
    $str=str_replace('}','',$str);
    $str=str_replace('"','',$str);
    //$str=str_replace(',',"\n",$str);
    $str=str_replace(':','    ',$str);
    echo $str;
    echo "<br>";
    file_put_contents("json/str$ff.json",json_encode($str));
    $ff++;
    }
}
getmovieinfo();
?>
</body>
</html>