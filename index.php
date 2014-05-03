<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>

<script type="text/javascript">
function accessAppletMethod()
{
     var b=document.applets[0].result;
    document.forms["input"].elements["t"].value =b;
}
</script>

</head>
<body>
<ul id="menu-bar">
 <li ><a href="index.php">Home</a></li>
  <li><a href="fetch.php">Fetch</a></li>
 <li><a href="filternsave.php">Filter and Save</a></li>
 <li><a href="db.php">Database</a></li>
</ul>
<br />
<br />
<br />
<br />
<form name="input" action="" method="get">
<input type="text"  size="50" name="t" title="S" class="rounded" />
              <applet 
            archive=BrowseApplet.jar
             name="app"
            code="BrowseApplet.class" height="26" width="52">
</applet>
<input type="button" value="add Path" id="b" onclick="accessAppletMethod()" />
<input type="submit" value="Submit" id="button" />
<br />
<br />
<br />
</form>


<?php 
if (isset($_GET['t']))
{
function get_file_extension($file_name) 
{
  return substr(strrchr($file_name,'.'),1);
}
function RemoveExtension($filename) {
    $file = substr($filename, 0,strrpos($filename,'.'));   
    return $file;
}
$allfiles =array();
//s to scan the directory
function getDirectory( $path = '.')
{ 
  $allext = array();
  $allext = json_decode(file_get_contents("json/allext.json"), true);
 
    $ignore = array( 'cgi-bin', '.', '..' ); 
	/*Directories to ignore when listing output. Many hosts 
    will deny PHP access to the cgi-bin.*/ 
	$dh = @opendir( $path ); 
    /*Open the directory to the handle $dh */
    while( false !== ( $file = readdir( $dh ) ) )/*Loop through the directory */
	{ 
     if( !in_array( $file, $ignore ) )/*Check that this file is not to be ignored */    
	 {         
       if( is_dir( "$path/$file" ) )/*Its a directory, so we need to keep reading down...*/ 
	   {
  		 getDirectory( "$path/$file" ); 
         /*Re-call this same function but on a new directory. 
          this is what makes function recursive. */
       }  
	   else 
	   { 
         $ext=get_file_extension($file);
         $ext = strtolower($ext);
         if(isset($allext[$ext]))
	   	 if ( preg_match("/video/",$allext[$ext]))
         {
            $fil=RemoveExtension($file);
            //$allfiles[]=$fil;
        //++$GLOBALS['count'];
        $GLOBALS['allfiles'][]=$fil;
         //echo "$fil<br />"; 
         /*Just print out the filename */
         }
	   }    
     }  
	} 
	closedir( $dh ); 
    /*Close the directory handle */
 //print_r($allfil);   
} 
//e scan dir
$dir=$_GET['t'];
//echo $dir;
getDirectory( $dir ); 
//echo $count;
$allfiles=array_unique($allfiles);
sort($allfiles);
//print_r($allfiles);
$res=count($allfiles);
echo "$res Video Files Scanned";
file_put_contents("json/allfiles.json",json_encode($allfiles));


}
?>
</body>
</html>
