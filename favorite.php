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
</style>
</head>
<body>
<form method="post">
<div class="main">
<br>Your favorite tours:</br>
<?php
$tours = $_POST["tours"];
$isAdmin=$_GET["isAdmin"];
$id_user = $_GET["id_user"];
if(empty($tours))
{
	
	
}
else
{ 
	require("connect.php");
	$N= count($tours);
	for($i=0;$i<N;$i++){
		$id_tour = $tour[$i];		
		$sql = "INSERT INTO favorite(id_user,id_tour) VALUES('$id_user','$id_tour')";
		$result = mysqli_query($conn, $sql);
	}
	
}
require("connect.php");
$sql = "select * from favorite where id_user='$id_user'";
$result = mysqli_query($conn, $sql);?>
<table>	<?
while($rr=mysqli_fetch_assoc($result))
{	
        $id_tour_FAV = $rr["id_tour"];
		require("connect.php");
		$sql1 = "select * from tour where id_tour='$id_tour_FAV'";
		$result1 = mysqli_query($conn, $sql1);
		$res =mysqli_fetch_assoc($result1) ;
		$cou =  $res["country"];
		$hot= $res["hotel"];
		$nut= $res["nutrition"];
		$cost = $res["cost"];		
		$data= $res["data"];
		$tr =  $res["transportation"];
		?>
	
<tr> <td><?
		echo $id;
		?></td>
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
		?></td></tr>

<?}?>
</table><?
	mysqli_close($conn); 
    echo "<meta http-equiv=refresh content=0;URL=$url>";}

 ?>

</div>
</form>
</body>
</html>
