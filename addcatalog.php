<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
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
 
 padding: 4px;
 text-align: center;
}
</style>
</head>
<body>
<form method="post">
<button type="submit" name="back_button" align="left"  style="width:90;height:25; margin-left:20px;margin-top:5px;" ><a href='catalogs.php'>Back</a></button>
<button type="submit" name="add_button" align="left"  style="width:90;height:25; margin-left:100px;margin-top:50px;" >Add</button>
<div class="main">
<?
$isAdmin=$_GET["isAdmin"];?>
<table>
<tr>
<td>Id_catalog:</td>
 <td><input type="text" name="adding1" maxlength="4" size="20"></td></tr>
<tr>
<td>Name_catalog:</td>
 <td><input type="text" name="adding2" maxlength="4" size="20"></td></tr>
</table>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {if (isset($_POST['add_button'])) 
 {
	 $add_id=$_POST['adding1'];
	 $add_name=$_POST['adding2'];
     
	 if(is_integer($adding_id)& $add_name!=null)
	{
		require("connect.php");
		$sql = "INSERT INTO catalog_tour(id_catalog,nameCatalog) VALUES('$add_id','$add_name')";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		echo "<meta http-equiv=refresh content=0>";
	}
 }
 }
 else 
 echo"<font color='red' size=3pt>Incorrect data!</font>";



if(isset($_POST['back_button'])){
$url = "cataloges.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}?>
</div>
</form>
</body>
</html>

 