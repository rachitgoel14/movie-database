<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database</title>

<script src="j/sortable.js"></script>

</head>
<body>
<ul id="menu-bar">
 <li ><a href="index.php">Home</a></li>
  <li><a href="fetch.php">Fetch</a></li>
 <li><a href="filternsave.php">Filter and Save</a></li>
 <li><a href="db.php">Database</a></li>
</ul>
<br />

<table id="hor-minimalist-b" class="sortable" >
    <thead>
    	<tr>
        	<th>Movie</th>
            <th>Release Year</th>
            <th>MPAA</th>
            <th>IMDB Rating</th>
            <th>Genre</th>
            <th>More Info</th>
        </tr>
    </thead>
    <tbody>
    
    
    <form method="post">
            Genre:<select type="text" name="gent">
            <option value="all" selected="all" >Select/All</option>
           
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mir", $con);

$result = mysql_query("SELECT * FROM ginfo");
	
      while($row = mysql_fetch_array($result))
  {
	 $gnst[]=$row['genre'];
  }
  $g=array_unique($gnst);
foreach ($g as $name)
        echo "<option value=".$name.">". $name.'</option>';
mysql_close($con);
?>
 
</select>
<input type="submit" value="GO" />
</form >
    <?php	
    
    if(isset($_POST['gent']))
    $gee= $_POST['gent'];
    
    else
    {
        $gee="all";
    }
    echo "<br>";
    echo "Current Genre=$gee";
        $con = mysql_connect("localhost","root","");
    if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

    mysql_select_db("mir", $con);
    
    if($gee!="all")
    {$result = mysql_query("SELECT * FROM ginfo");
    while($row = mysql_fetch_array($result))
    {
        if ($row['genre']== $gee)
        $iid[]=$row['imdbid'];
    }
    }
    $result = mysql_query("SELECT * FROM pinfo");
      while($row = mysql_fetch_array($result))
  {
    if($gee!="all")
    {if (in_array($row['imdbid'],$iid))
    {
  //echo "<a href=\"moviepage.php?foo=".$row['imdbid']."\">";
  //echo "<tr href=\"moviepage.php?foo=".$row['imdbid']."\">";
  //echo "<div onclick=\"window.location.href=\"moviepage.php?foo=".$row['imdbid']."\">";
  echo "<tr>";
  //echo "<td><a style=\"display:block;\" href=moviepage.php?foo=".$row['imdbid'].">".$row['title'] ."</a>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['yea'] . "</td>";
  echo "<td>" . $row['mpaa'] . "</td>";
  echo "<td>" . $row['imbdrat'] . "</td>";
  echo "<td>" . $row['genre'] . "</td>";
  echo "<td><a target=\"_blank\" href=moviepage.php?foo=".$row['imdbid'].">More Info</a>";
  echo "</tr>";
 // echo "</a>";
// echo '</div>';
  }}
  if($gee=="all")
  {
    
    echo "<tr>";
  //  echo "<td><a href=moviepage.php?foo=".$row['imdbid'].">".$row['title'] ."</a>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['yea'] . "</td>";
  echo "<td>" . $row['mpaa'] . "</td>";
  echo "<td>" . $row['imbdrat'] . "</td>";
  echo "<td>" . $row['genre'] . "</td>";
 
  echo "<td><a target=\"_blank\"  href=moviepage.php?foo=".$row['imdbid'].">More Info</a>";

  echo "</tr>";
  
  }
  }
  mysql_close($con); 
  ?>
  
    </tbody>
</table>    
