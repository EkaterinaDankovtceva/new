<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>All catalogs</title>
<style>
.main{
margin: auto; 
font-size:20pt;
text-align: center;}
table
{
 width: 40%; 
 font-size:20pt;
 margin: auto;
 

}
</style>
</head>
<body>
<form method="post">
<button type="submit" name="back_button" align="left"  style="width:90;height:25; margin-left:20px;margin-top:5px;" ><a href='login.php'>Back</a></button>

<div class="main">
<br>You can see all catalogs:</br>
<?php
$isAdmin=$_GET["isAdmin"];

if($isAdmin==1)
{?>
<button type="submit" name="add_button" align="left"  style="width:90;height:25; margin-left:20px;margin-top:40px;" ><a href='addcatalog.php'>AddCatalog</a></button>
<button type="submit" name="delete_button" align="left"  style="width:90;height:25; margin-left:20px;margin-top:75px;" ><a href='deletecatalog.php'>DeleteCatalog</a></button>
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
	<? echo("<br><a href='tours.php?isAdmin=$isAdmin&id=$id_catalog'>$id_catalog</a>");?>
	 </td>
	 <td><?
	 echo $nameCatalog;?>
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