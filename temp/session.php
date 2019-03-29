<?php
error_reporting(0);
session_start();

//cek if user was login or not
if(!isset($_SESSION['agent_forum']) || ($_SESSION['agent_forum']!=md5($_SERVER['HTTP_USER_AGENT'])) ){
header("location: ../?page=temp/login");
exit();

}
?>