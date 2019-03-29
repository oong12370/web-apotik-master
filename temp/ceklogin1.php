<?php
include '../temp/koneksi.php';

//create variable to store data was sent from login.php
$email=$_POST['email'];
$password=$_POST['password'];

//create query to check if the data is valid
$query="SELECT * FROM 	pendaftaran WHERE email='$email'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);

if ($result > 0 and $row['level']=='pengunjung')
{
		session_start();
		$_SESSION['user_forum']=$email;
		$_SESSION['agent_forum']=md5($_SERVER['HTTP_USER_AGENT']);
		$_SESSION['level']=$level;
		header("location: .././pengunjung/");
}


else
{
echo "<center>Login Gagal ! <br> Wrong Email and Password Address.<br>";
echo "<a href='../?page=temp/login'><b>Ulangi Lagi</b></a></center>";
}
?>
