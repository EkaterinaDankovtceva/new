<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<title>Delete Catalog</title>
<style>
.main{
margin: auto; 
font-size:20pt;
text-align: center;}
table
{
 width: 40%; 
 top: 40%;
 font-size:20pt;
 margin: auto;
}
body{ 
background-image:url(logo.png); 
background-repeat: no-repeat; 
background-position: 920px 550px; 
}
</style>
</head>
<body>
<form method="post">
<div class="main">
<?
$isAdmin=$_GET["isAdmin"];?>
<table>
<tr>
<td align="right">Id_catalog:</td>
 <td><input type="text" name="adding1" maxlength="4" size="20"></td>
 <td><button type="submit" name="delete_button" align="left" style="width:90;height:25; left:20pt; top : 20pt;">Delete</button></td></tr>

</table>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
	 if (isset($_POST['delete_button'])) 
     {
	   $delete_id=$_POST['adding1'];
	 
     
	   if(is_integer($delete_id))
	   {
		require("connect.php");
		$sql = "DELETE FROM catalog_tour WHERE id_catalog='$delete_id'";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		echo "<meta http-equiv=refresh content=0>";
      }
      else 
        echo"<font color='red' size=3pt>Incorrect data!</font>";
     }
 }
 



if(isset($_POST['back_button'])){
$url = "catalogs.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}?>
</div>
</form>
</body>
</html>
 
