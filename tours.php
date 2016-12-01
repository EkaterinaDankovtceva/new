<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>All Tours of this Cataloge</title>
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
<button type="submit" name="back_button" align="left"  style="width:90;height:25; left:20pt; top : 20pt;" ><a href='catalogs.php'>Back</a></button>

<?php
$isAdmin=$_GET["isAdmin"];
$id_catalog=$_GET["id_catalog"];?>
<?
if($isAdmin==1)
{?>
<button type="submit" name="add_button" align="left"  style="width:90;height:25;left:20pt;top : 60pt;" ><a href='addtour.php'>AddTour</a></button>
<button type="submit" name="delete_button" align="left"  style="width:90;height:25;left:20pt;top : 100pt;" ><a href='deletetour.php'>DeleteTour</a></button>
<?}


require("connect.php");
$sql = "select * from tour where id_catalog='$id_catalog'";
$result = mysqli_query($conn, $sql);

?>
<table><?
while($rr=mysqli_fetch_assoc($result))
{	
		$id=$rr["id_tour"];
		$cou =  $rr["country"];
		$hot= $rr["hotel"];
		$nut= $rr["nutrition"];
		$cost = $rr["cost"];		
		$data= $rr["data"];
		$tr =  $rr["transportation"];
?><tr> <td><?
		echo $id;//$rr["id_tour"];
		?></td>
		<td><?
		echo $cou;//$rr["country"];
		?></td>
		<td><?
		echo $hot;//$rr["hotel"];
		?></td>
		<td><?
		echo $nut;//$rr["nutrition"];
		?></td>
		<td><?
		echo $cost;//$rr["cost"];
		?></td>
		<td><?
		echo $data;//$rr["data"];
		?></td>
		<td><?
		echo $tr;//$rr["transportation"];
		?></td></tr>

<?}?>
</table>

<?
mysqli_close($conn);
if(isset($_POST['back_button'])){
$url = "catalogs.php?isAdmin=$isAdmin";
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