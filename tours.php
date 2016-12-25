<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>All Tours</title>
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

</style>
</head>
<body>
<form method="post">
<div class="main">
<br>All tours</br>
<?php
$isAdmin=$_GET["isAdmin"];
$id_user = $_GET["id_user"];
$id_catalog=$_GET["id_catalog"];

if($isAdmin==1)
{?>
<button type="submit" name="add_button" align="left"  style="width:90;height:25;left:20pt;top : 20pt;" ><a href='addtour.php'>AddTour</a></button>
<button type="submit" name="delete_button" align="left"  style="width:90;height:25;left:20pt;top : 60pt;" ><a href='deletetour.php'>DeleteTour</a></button>
<?}


require("connect.php");
$sql = "select * from tour where id_catalog='$id_catalog'";
$result = mysqli_query($conn, $sql);

?>
<form action="favorite.php" method="post">
<button type="submit" name="submit_button" align="left"  style="width:90;height:25;left:20pt;top : 100pt;" ><a href='favorite.php'>Choose</a></button>
<?/*<input type="submit " value="Choose" />*/?>
<button type="submit" name="submit_button" align="left"  style="width:90;height:25;left:20pt;top : 140pt;" ><a href=''>Reset</a></button>
<?/*<input type="reset" value="Reset" />*/?><?
while($rr=mysqli_fetch_assoc($result))
{	
		$id=$rr["id_tour"];
		$cou =  $rr["country"];
		$hot= $rr["hotel"];
		$nut= $rr["nutrition"];
		$cost = $rr["cost"];		
		$data= $rr["data"];
		$tr =  $rr["transportation"];?>
		
		
<p><input type="checkbox" name="tours[]" value="<?$id?>" /> 
<table>

<tr> 
		<td><?
		echo $cou;
		?></td>
		<td><?
		echo $hot;
		?></td>
		<td><?
		echo $nut;
		?></td>
		<td><?
		echo $cost;
		?></td>
		<td><?
		echo $data;
		?></td>
		<td><?
		echo $tr;
		?></td></tr>   </table><br />

</p>
<?}?>
</form>


<?
mysqli_close($conn);
if(isset($_POST['submit_button'])){
$url = "favorite.php?isAdmin=$isAdmin, tours=$tours,id_user=$id_user";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}
	
	if(isset($_POST['add_button'])){
$url = "addtour.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}
	
	if(isset($_POST['delete_button'])){
$url = "deletetour.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}
?>

</form>
</body>
</html>
