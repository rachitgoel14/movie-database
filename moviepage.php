<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style2.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Full Info</title>




<script type="text/javascript" src="js/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.2.6.css" media="screen" />
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.2.6.js"></script>


	<script type="text/javascript">
		$(document).ready(function() {
			$("a.zoom").fancybox();

			$("a.zoom1").fancybox({
				'overlayOpacity'	:	0.7,
				'overlayColor'		:	'#000'
			});

			$("a.zoom2").fancybox({
				'zoomSpeedIn'		:	500,
				'zoomSpeedOut'		:	500
			});
		});
	</script>


</head>

<body>
<?php
$imi=$_GET['foo'];
//echo $imi;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mir", $con);

$result1 = mysql_query("SELECT * FROM ninfo");
$result = mysql_query("SELECT * FROM pinfo");
while($row = mysql_fetch_array($result))
{
    if($row['imdbid']==$imi)
     {
     $title=$row['title'];
     $year=$row['yea'];
     $imdbrat=$row['imbdrat'];
     $genre=$row['genre'];
     $mpaa=$row['mpaa'];
     }
}	
      while($row = mysql_fetch_array($result1))
  {
	 if($row['imdbid']==$imi)
     {
        $poster=$row['poster'];
        //echo $poster;
        $release=$row['released'];
        $plot=$row['plot'];
        $actor=$row['actor'];
        $director=$row['director'];
        $writer=$row['writer'];
        $runtime=$row['runtime'];
        $imdblink=$row['imdblink'];
     }
  }

mysql_close($con);
?>
<table width="1000" border="0">
  <tr>
    <td>
<div class="movieresult">   
    <div class="poster"><img src="<?php echo "$poster"; ?>" height="325" width="225" border="0" />
	
	</div>
    <div class="movie_description">
		<!-- AD SPACE 468x60 -->
		<!--<img src="/images/adspace2.png" />-->
		<!-- END OF ADSPACE 468x60-->
		<div class="movietitles"><img src="images/35list.png" /><a href="/movie/{$id}/{$title_encoded}"><strong><?php echo "$title"; ?></strong></a> - <a href="/year/{$year}"><?php echo "$year"; ?></a>
		
        <div class="movietitles"><img src="images/35genre.png" />Genres:<?php echo "$genre"; ?></div>
		<div class="movietitles"><img src="images/35list.png" />Plot:<?php echo "$plot"; ?></div>
		<div class="movietitles"><img src="images/35year.png" />Release date: <strong><?php echo"$release"; ?></strong></div>
		<div class="movietitles"><img src="images/35star.png" />Stars: <?php echo"$actor"; ?></div>
        <div class="movietitles"><img src="images/35user.png" />Director:<?php echo "$director"; ?></div>
        <div class="movietitles"><img src="images/35writer.png" />Writer:<?php echo "$writer"; ?></div>
        
		<div class="movietitles"><img src="images/35duration.png" />Runtime:<?php echo "$runtime"; ?></div>
		
		
        
        
		<div class="movietitles"><img src="images/35warning.png" />MPAA Rating: <strong><a title="
		G - General Audiences.All Ages Admitted.
		PG - Parental Guidance Suggested. 
		PG-13 - Parents Strongly Cautioned. 
		R - Restricted. 
		NC-17 - No One 17 and Under Admitted.
		Unknown - No MPAA rating available."><?php echo "$mpaa"; ?></a></strong></div>
        <div class="movietitles"><img src="images/55mix.png" />IMDB Link:<?php echo "<a href=".$imdblink.">".$imdblink."</a>"; ?></div>

	<div class="movietitles"><a href="movietrailer.php?movie=$title&year=$year" style="text-decoration:none" class="zoom1"><font color="#1E67A8" title="Click to watch trailer ">Watch Trailer</font></a></div>	
        
    </div>
    </div>
    <div class="movie_details">
		
		
		
    </div>

</div>
</td>
  </tr>
</table>
	
</body>
</html>
