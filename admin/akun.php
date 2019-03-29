<?php
include '.././temp/session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="../../../../axioo/AppServ/www/toko_exo/images/icon.gif" />
<style type="text/css">
<!--
.style1 {
	font-weight: bold;
	font-size: 24px;
}
.style2 {font-weight: bold}
.style4 {font-size: 16; font-weight: bold; }
body {
  margin: 2px;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}


/* Style the form with a coloured background (and a gradient for Gecko/WebKit browsers), along with curved corners and a drop shadow */

form {
  width: 45em;
  margin: 0 auto;
  padding: 20px 20px;
  
  color: #3e4a49;
  background-color: #f5eedb;
  background: -webkit-gradient( linear, left bottom, left top, color-stop(0,#f5eedb), color-stop(1, #faf8f1) );
  background: -moz-linear-gradient( center bottom, #f5eedb 0%, #faf8f1 100% );  
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;  
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
}


/* Give form elements consistent margin, padding and line height */

form ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

form ul li {
  
  padding: 0;
}

form * {
  line-height: 1em;
}


/* Form heading */

form h1 {
  
  padding: 0;
  text-align: center;
}


/* Give each fieldset a darker background, dark curved border and plenty of space */

fieldset {
  padding: 0 20px 20px;
  margin: 0 0 30px;
  border: 2px solid #593131;
  background: #eae1c0;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}


/* Give each fieldset legend a nice curvy green box with white text */

legend {
  color: #fff;
  background: #8fb98b;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 0.9em;
  font-weight: bold;
  text-align: center;
  padding: 5px;
  margin: 0;
  width: 9em;
  border: 2px solid #593131;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
}


/* The field labels */

label {
  display: block;
  float: left;
  clear: left;
  text-align: right;
  width: 40%;
  padding: .4em 0 0 0;
  margin: .15em .5em 0 0;
}


/* Style the fields */

input, select, textarea {
  display: block;
  margin: 0;
  padding: .4em;
  width: 50%;
}

input, textarea, .date {
  border: 2px solid #eae1c0;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;    
  box-shadow: rgba(0,0,0,.5) 1px 1px 1px 1px inset;
  -moz-box-shadow: rgba(0,0,0,.5) 1px 1px 1px 1px inset;
  -webkit-box-shadow: rgba(0,0,0,.5) 1px 1px 1px 1px inset;
  background: #fff;
}

input {
  font-size: .9em;
}

select {
  padding: 0;
  margin-bottom: 2.5em;
  position: relative;
  top: .7em;
}

textarea {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: .9em;
  width:inherit;
  height: 30px;
}


/* Place a border around focused fields, and hide the inner shadow */

form *:focus {
  border: 2px solid #593131;
  outline: none;
  box-shadow: none;
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
}


/* Display correctly filled-in fields with a green background */

input:valid, textarea:valid {
  background: #efe;
}


/* Submit button */

input[type="submit"] {
 
  width: 12em;
  padding: 10px;
  border: 2px solid #593131;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;  
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  color: #fff;
  background: #593131;
  font-size: 1.2em;
  font-weight: bold;
  -webkit-appearance: none;
}

input[type="submit"]:hover, input[type="submit"]:active {
  cursor: pointer;
  background: #fff;
  color: #593131;
}

input[type="submit"]:active {
  background: #eee;
  box-shadow: 0 0 .5em rgba(0, 0, 0, .8) inset;
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8) inset;
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8) inset;
}


/* Header/footer boxes */

.wideBox {
  clear: both;
  text-align: center;
  margin: 70px;
  padding: 10px;
  background: #ebedf2;
  border: 1px solid #333;
  line-height: 80%;
}

.wideBox h1 {
  font-weight: bold;
  margin: 20px;
  color: #666;
  font-size: 1.5em;
}


/* Validator error boxes */

.error {
  background-color: #fffe36;
  border: 1px solid #e1e16d;
  font-size: .8em;
  color: #000;
  padding: .3em;
  margin-left: 5px;
  border-radius: 5px; 
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -moz-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
  -webkit-box-shadow: 0 0 .5em rgba(0, 0, 0, .8);
}

</style>
</style></head>

<body>
<table width="800px" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td> <p align="center"><span class="style1">My Account</span></p>
    </td>
  </tr>
  <tr>
    <td bgcolor=""><form id="form1" name="form1" method="post" action="">
      <table width="892" border="0" cellpadding="0">
        
        <tr>
          <td width="144" align="right" ><div align="left" class="style4">Nama Peserta </div></td>
          <td width="13">:</td>
          <td width="289"><?php echo $row['nm_admin'];?></td>
        </tr>
        <tr>
          <td align="right" ><div align="left" class="style4">Jenis Kelamin </div></td>
          <td>:</td>
          <td><?php echo $row['jekel'];?></td>
        </tr>
        
        <tr>
          <td align="right"><div align="left" class="style4">Alamat</div></td>
          <td >:</td>
          <td><?php echo $row['alamat'];?></td>
        </tr>
        <tr>
          <td align="right"><div align="left" class="style4">Telpon</div></td>
          <td >:</td>
          <td><?php echo $row['tlp'];?></td>
        </tr>
        
        <tr>
          <td align="right">&nbsp;</td>
          <td >&nbsp;</td>
          <td><a href="?page=akun_edit&kd_admin=<?php echo $row['kd_admin'];?>">Edit Password </a></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
