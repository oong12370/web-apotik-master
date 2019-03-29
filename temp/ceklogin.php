<?php
include '../temp/koneksi.php';

//create variable to store data was sent from login.php
$password=$_POST['password'];
$nm_admin=$_POST['nm_admin'];

//create query to check if the data is valid
$query="SELECT * FROM tbl_admin WHERE nm_admin='$nm_admin'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);

if ($result > 0 and $row['level']=='admin')
{
		session_start();
		$_SESSION['user_forum']=$nm_admin;
		$_SESSION['agent_forum']=md5($_SERVER['HTTP_USER_AGENT']);
		$_SESSION['level']=$level;
		header("location: .././admin/");
}
if ($result > 0 and $row['level']=='pemilik')
{
		session_start();
		$_SESSION['user_forum']=$nm_admin;
		$_SESSION['agent_forum']=md5($_SERVER['HTTP_USER_AGENT']);
		$_SESSION['level']=$level;
		header("location: .././admin/index1.php");
}


else

{
echo "<center>Login Gagal ! <br> Wrong Email and Password Address.<br>";
echo "<a href='../?page=temp/login'><b>Ulangi Lagi</b></a></center>";
}
?>
