
<html>
<head>
<style>
.alpha60 {
/* Fallback for web browsers that doesn't support RGBa */
background: rgb(0, 0, 0);
/* RGBa with 0.6 opacity */
background: rgba(0, 0, 0, 0.6);
}
table
{
border:2px solid;
border-radius:25px;
-moz-border-radius:25px; /* Old Firefox */
}
</style>
 
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
<?PHP
include "class.movietrailer.php";

function left($str, $length) {
     return substr($str, 0, $length);
}
$movieid = $_GET["search"];

include 'datalogin.php';

if ($db_found) 
{
$SQL = "select * from movieview where idMovie = '" . $movieid . "'";
$result = mysql_query($SQL);

while ( $db_field = mysql_fetch_assoc($result) ) 
{
$movietitle = $db_field['c00'];
$movietitle2 = "'" . $db_field['c00'] . "'";
$moviedescription = $db_field['c02'] . $db_field['c01'];
$moviemoto = $db_field['c03'];
$imdbrating = "<img src='" . substr($db_field['c05'], 0, 1) . ".png'> - " . substr($db_field['c05'], 0, 3) ."/10";
$director = $db_field['c06'];
$year = $db_field['c07'];
$year2 = "'" . $db_field['c07'] . "'";
$rating = $db_field['c12'];
$genre = $db_field['c14'];
$trailer = $db_field['c19'];
$studio = $db_field['c18'];
$filename = $db_field['strFileName'];
$location = $db_field['strPath'];
$fanartpath = $db_field['strPath'];
$fanartpath = "http://danmed.dyndns.org/MyWeb/Movies/" . substr($fanartpath, 21);
$fanartfilename = substr($filename,0,-4);
$fanartfilename = $fanartfilename . "-fanart.jpg";


print "<body bgcolor='black' background='" . $fanartpath . $fanartfilename . "'><br>";
print "<font face='arial' color='white'><center><table class='alpha60' border='0' width='750px' cellspacing='3' cellpadding='2' bgcolor='black'><tr><td colspan='2'><font face='arial' color='#0066FF' size='6'><b>" . $movietitle . "</b></font><font face='arial' color='white'> - " . $year . "</td></tr><tr><td width='446px'>";
new MovieTrailer(@$movietitle2, @$year2); 
print "</td><td width='300px' valign='top'><font face='arial' color='white'><b>Director:</b><br>" . $director ."<br><b>Genre:</b><br>" . $genre ."<br><b>Rating:</b><br>" . $rating ."<br><b>IMDB Rating:</b><br>" . $imdbrating ."<br></td></tr><tr><td colspan='2'><font face='arial' color='white'><b>Plot:</b><br>" . $moviedescription . "</td></tr><tr><td><font face='arial' color='white'><b>Tag Line:</b><br>" . $moviemoto . " </td></tr>";




}
mysql_close($db_handle);
}
else 
{
print "Database NOT Found ";
}

?>
