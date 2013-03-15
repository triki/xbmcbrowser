
<html>
<head>
<style>

* {
margin:0;
padding:0;
outline:0;
}
body {
background:#000000;
}
#scroll {
text-align:center;
width:100%;
height:180px;
margin:0px auto;
background:#000000;
border:2px solid #000;
overflow:auto;
}
#scroll div {
float:left;
text-align:center;
margin-right:-999em;
white-space:nowrap;
}
#scroll img {
margin:5px 5px 0 5px;
}
/* ------------- Flexcroll CSS ------------ */
.scrollgeneric {
line-height:1px;
font-size:1px;
position:absolute;
top:0;left:0;
}
.hscrollerbase {
height:17px;
background:#999;
}
.hscrollerbar {
height:12px;
background:#000;
cursor:e-resize;
padding:3px;
border:1px solid #999;
}
.hscrollerbar:hover {
background:#222;
border:1px solid #222;
}
#rightImage
{
    height:138px;
    width: 92px;
    margin: 10px;
    float:left;
    position:relative;

    
}
#rightImage:hover img
{
    height: 150px;
    width: 100px;
    margin: 0px;
}

</style>
<script type="text/javascript" src="flexcroll.js"></script>
</head>
<body bgcolor="black">
<center>
<div id="scroll" class="flexcroll" align="center">
<div>
<center>

<?PHP

$searchstring = $_GET["search"];
if($searchstring <> "")
{

$user_name = "xbmc";
$password = "xbmc";
$database = "xbmc_video75";
$server = "127.0.0.1";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

$SQL = "select * from movieview where c00 like '%" . $searchstring ."%'";
$result = mysql_query($SQL);

while ( $db_field = mysql_fetch_assoc($result) ) {

$poster = $db_field['c08'];
$poster2 = str_replace("</thumb>", "", $poster);
$array = explode('<thumb>', $poster2);

if($array[1] <> "")
{
print "<a id='rightimage' href='info.php?search=" . $db_field['idMovie'] . "' target='bottom'><img src='" . $array[1] . "' width='92px' height='138px' alt='" . $db_field['c00'] . "' border='0'></a>&nbsp;";
}
else
{
$poster = $db_field['c08'];
$poster2 = str_replace(">", "", $poster);
$poster3 = str_replace("</thumb", "", $poster2);
$array = explode('<thumb preview="', $poster3);

if($array[1] <> "")
{
print "<a  id='rightimage' href='info.php?search=" . $db_field['idMovie'] . "' target='bottom'><img src='" . $array['1'] . "' width='92px' height='138px' alt='" . $db_field['c00'] . "' border='0'></a>&nbsp;";
}
else
{
$poster = $db_field['c08'];
$poster2 = str_replace(">", "", $poster);
$poster3 = str_replace("</thumb", "", $poster2);
$array = explode('<thumb aspect="poster" preview="', $poster3);

print "<a  id='rightimage' href='info.php?search=" . $db_field['idMovie'] . "' target='bottom'><img src='" . $array[1] . "' width='92px' height='138px' alt='" . $db_field['c00'] . "' border='0'></a>&nbsp;";
}

}


}
mysql_close($db_handle);

}

else {
print "Database NOT Found ";

}
}
?>

