<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All catalogs</title>
<style>
.main{
margin: auto; 
font-size:20pt;
}
table
{
 width: 40%; 
 font-size:20pt;
 margin: auto;

}
td {
text-align: center; }
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
<br>You can see all catalogs:</br>
<?php
$isAdmin=$_GET["isAdmin"];
$id_user = $_GET["id_user"];
if($isAdmin==1)
{?>
<button type="submit" name="add_button" align="left"  style="width:90;height:25;left:20pt;top : 20pt;" ><a href='addcatalog.php'>AddCatalog</a></button>
<button type="submit" name="delete_button" align="left"  style="width:90;height:25;left:20pt;top : 60pt;" ><a href='deletecatalog.php'>DeleteCatalog</a></button>
<?}

require("connect.php");
$sql = "select * from catalog_tour";
$result = mysqli_query($conn, $sql);
?> <table><?
while($r = mysqli_fetch_assoc($result)) 
{ 
$id_catalog=$r["id_catalog"]; 
$nameCatalog=$r["nameCatalog"];
     ?>
	 <tr>
	 <td>
	<? echo("<br><a href='tours.php?isAdmin=$isAdmin,id=$id_catalog, id_user=$id_user'>$nameCatalog</a>");?>
	 </td>	 
	 </tr>
	<? }?>
</table>	
<?	 
 mysqli_close($conn);
 
 if(isset($_POST['back_button'])){
$url = "login.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}
	
	if(isset($_POST['add_button'])){
$url = "addcatalog.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}
	
	if(isset($_POST['delete_button'])){
$url = "deletecatalog.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}

 ?>

</div>
</form>
</body>
</html>
