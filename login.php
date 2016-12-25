<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
<style>
   table {
    width: 300px; 
    margin: auto; 
    margin-top: 200px;
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
 <table cellspacing="0" cellpadding="4" >
    <tr> 
     <td align="right" width="100">Login</td>
     <td><input type="text" name="login" maxlength="70" size="20"></td>
    </tr>
    <tr> 
     <td align="right">Password</td>
     <td><input type="text" name="pass" maxlength="70" size="20"></td>
    </tr>
	<tr>
	<td align="right"> </td>
	<td><button type="submit"  style="width:90;height:30" >Ok</button></td>	
	</tr>
	<tr>
	<td colspan="2" align="center"> <?php
 if($_SERVER["REQUEST_METHOD"] == "POST"){
$login=$_POST["login"];
$pass=$_POST["pass"];

if(empty($login)||empty($pass))
{echo "<font color='red'>Please,enter login and password</font>";
}
else 
{
require("connect.php");
$sql = "select * from users where login='$login' and password='$pass'";
$result = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($result); 
if(empty($r))
echo"<font color='red'>User not found</font>";
else{
$id_user = $r["id_users"];	
$isAdmin=$r["isAdmin"];
$url = "catalogs.php?isAdmin=$isAdmin,id_user=$id_user";
    echo "<meta http-equiv=refresh content=0;URL=$url>";
}

mysqli_close($conn);
}
}
?>
</td>
</tr>
</table>

      

</form>
</body>
</html>
