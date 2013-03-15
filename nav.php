<html>
<head>
<style>

</style>
<script language="Javascript">
<!--
function OnButton1()
{
    document.Form1.action = "genre.php"
    document.Form1.target = "left";    // Open in a new window
    document.Form1.submit();             // Submit the page
    return true;
}

function OnButton2()
{
    document.Form1.action = "search.php"
    document.Form1.target = "left";    // Open in a new window
    document.Form1.submit();             // Submit the page
    return true;
}
function OnButton3()
{
    document.Form1.action = "year.php"
    document.Form1.target = "left";    // Open in a new window
    document.Form1.submit();             // Submit the page
    return true;
}
function OnButton4()
{
    document.Form1.action = "rating.php"
    document.Form1.target = "left";    // Open in a new window
    document.Form1.submit();             // Submit the page
    return true;
}
-->
</script>
<style>
.highlightit img{

filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50);

-moz-opacity: 0.5;

opacity: 0.5;

}

.highlightit:hover img{

filter:progid:DXImageTransform.Microsoft.Alpha(opacity=100);

-moz-opacity: 1;

opacity: 1;

}

</style>
</head>
<body bgcolor="black">
<table border="0" width="100%">
<tr><td valign="top" width="40px"><center><a class='highlightit' href="index.htm" target="_top"><img src="home.jpg" border="0" width="25px" height="25px"></a></td><td valign="bottom">

<form name="Form1" method="get">

<!-- Add the data entry bits -->
<input type="text" name="search" size="10" />

<!-- Add some buttons -->
<INPUT type="button" value="Genre" name=genre onclick="return OnButton1();">
<INPUT type="button" value="Movie" name=movie onclick="return OnButton2();">
<INPUT type="button" value="Year" name=movie onclick="return OnButton3();">
<INPUT type="button" value="Rating" name=movie onclick="return OnButton4();">

<!-- close the form -->
</form>


</td>
<td align="right"><font face="arial" color="white" size="3"><?PHP print date("F j, Y"); ?>
</td></tr>
</table>