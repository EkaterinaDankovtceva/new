<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<title>Add Tour</title>
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
<td align="right"> Id_tour:</td>
 <td><input type="text" name="delite1" maxlength="4" size="20"></td></tr>
<tr>
<td align="right">country:</td>
 <td><input type="text" name="delite2" maxlength="4" size="20"></td></tr>
 <tr>
<td align="right">hotel:</td>
 <td><input type="text" name="delite3" maxlength="4" size="20"></td></tr>
 <tr>
<td align="right">nutrition:</td>
 <td><input type="text" name="delite4" maxlength="4" size="20"></td></tr>
 <td><button type="submit" name="add_button" align="left" style="width:90;height:25; left:20pt; top : 20pt;">Add</button></td>
 <tr>
<td align="right">cost:</td>
 <td><input type="text" name="delite5" maxlength="4" size="20"></td></tr>
 <tr>
<td align="right">data:</td>
 <td><input type="text" name="delite6" maxlength="4" size="20"></td></tr>
 <tr>
<td align="right">transportation:</td>
 <td><input type="text" name="delite7" maxlength="4" size="20"></td></tr>
 <tr>
<td align="right">id_catalog:</td>
 <td><input type="text" name="delite8" maxlength="4" size="20"></td></tr>
</table>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {if (isset($_POST['add_button'])) 
 {
	 $del_id=$_POST['delite1'];
	 $del_country=$_POST['delite2'];
	 $del_hotel=$_POST['delite3'];
	 $del_nutrition=$_POST['delite4'];
	 $del_cost=$_POST['delite5'];
	 $del_data=$_POST['delite6'];
	 $del_transportation=$_POST['delite7'];
	 $del_id_catalog=$_POST['delite8'];
     
	 if(is_integer($del_id)& is_integer($del_id_catalog)&$del_country!=null&$del_hotel!=null&$del_nutrition!=null)
	{
		require("connect.php");
		$sql = "INSERT INTO tour(id_tour,country,hotel,
		nutrition,cost,data,transportation,id_catalog) 
		VALUES('$del_id','$del_country','$del_hotel','$del_nutrition','$del_cost','$del_data','$del_transportation','$del_id_catalog')";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		echo "<meta http-equiv=refresh content=0>";
	}
	else 
       echo"<font color='red' size=3pt>Incorrect data!</font>";
 }
 }
 



if(isset($_POST['back_button'])){
$url = "tours.php?isAdmin=$isAdmin";
    echo "<meta http-equiv=refresh content=0;URL=$url>";}?>
</div>
</form>
</body>
</html>

 
