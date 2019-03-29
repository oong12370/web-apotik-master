<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tambah Peserta</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function() {
			$('#frm-mhs').validate({
				rules: {
					telp: {
						digits: true
					}
				},
				messages: {
					nm_peserta: {
						required: "Kolom Nama Peserta harus diisi"
					},
					telp: {
						required: "Kolom Telpon harus diisi"
					},
					alamat: {
						required: "Kolom alamat harus diisi"
					}
				}
			});
		});
		
		$.validator.addMethod(
			"indonesianDate",
			function(value, element) {
				return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
			},
			"Please enter a date in the format DD/MM/YYYY"
		);
		</script>
<style type="text/css">
<!--
.style3 {
	font-size: 16;
	font-weight: bold;
}
.style4 {font-size: 16}
.style5 {
	font-size: 24px;
	font-weight: bold;
	font-family: "Times New Roman";
}
.style6 {
	font-family: "Times New Roman";
	font-style: italic;
}
.style11 {font-family: "Times New Roman"; font-size: 16;}
body {
	background-image: url(../Image/Latar.png);
}
<style>

body {
  margin: 2px;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
form {
  width: 35em;
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


form h1 {
  
  padding: 0;
  text-align: center;
}


fieldset {
  padding: 0 20px 20px;
  margin: 0 0 30px;
  border: 2px solid #593131;
  background: #eae1c0;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}


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


label {
  display: block;
  float: left;
  clear: left;
  text-align: right;
  width: 40%;
  padding: .4em 0 0 0;
  margin: .15em .5em 0 0;
}


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


form *:focus {
  border: 2px solid #593131;
  outline: none;
  box-shadow: none;
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
}


input:valid, textarea:valid {
  background: #efe;
}


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

<body>
<div class="dialog">
  <form  action="../temp/s_pendaftaran.php"   method="post" enctype="multipart/form-data" name="form1"  id="frm-mhs" >
  
  <table class="" width="585" height="419" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td colspan="3"><div align="center"><span class="style5">Form Pendaftaran </span></div></td>
      <td height="16"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td height="16"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><span class="style6">Isi data lengkap anda untuk menyelesaikan pendaftaran online di bawah ini ! </span></td>
      <td height="16"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td height="16"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="194"><span class="style11">Nama</span></td>
      <td width="11"><span class="style3">:</span></td>
      <td width="369"><div align="left">
          <input name="nama" type="text" autofocus="autofocus"  id="nama" />
      </div></td>
      <td width="1" height="16"></td>
      <td width="10"><strong> </td>
    </tr>
    <span class="style4"></span>
    <tr>
      <td height="37">Password</td>
      <td><span class="style3">:</span></td>
      <td width="369"><input name="password" class="required" / type="password" id="password" maxlength="50"  onchange="lengthRestrictionn(document.getElementById('nm_peserta'), 2, 50)"  /></td>
    </tr>
    <tr>
      <td height="37">Email</td>
      <td>:</td>
      <td><input name="email" class="required" autofocus="autofocus"/ type="text" id="email" maxlength="50"  onchange="lengthRestrictionn(document.getElementById('nm_peserta'), 2, 50)"></td>
    </tr>
    
    <tr>
      <td height="37"><div align="justify" class="style11">Jenis Kelamin </div></td>
      <td><span class="style3">:</span></td>
      <td><label>
        <table width="162" height="38" border="0" align="left">
          <tr>
            <td width="22" height="34"><input name="jekel" type="radio" value="pria" /></td>
            <td width="29">Pria </td>
            <td width="29"><input name="jekel" type="radio" value="wanita" /></td>
            <td width="64">Wanita</td>
          </tr>
        </table>
        <div align="justify"></div>
        </label></td>
    </tr>
    
    
    <tr>
      <td><div align="justify" class="style11">Alamat</div></td>
      <td><span class="style3">:</span></td>
      <td>
        <label>
        <textarea name="alamat"></textarea>
        </label></td>
    </tr>
    <tr>
      <td height="36"><div align="justify" class="style11">Telpon</div></td>
      <td><span class="style3">:</span></td>
      <td><div align="justify">
          <input name="tlp" type="text" class="required" id="tlp"  />
      </div></td>
    </tr>
    
	<tr>
      <td height="36"><div align="justify" class="style11">Photo</div>
        </td>
      <td><span class="style3">:</span></td>
      <td><div align="justify"><span class="text-info">
        <input name="foto" type="file" id="foto" />
      </span></div></td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <input name="level" type="hidden" value="pengunjung">
      </label></td>
    </tr>
    <tr>
      <td height="5" colspan="3"><input name="Input" type="submit" class="" id="Input" value="Create Account" /></td>
    </tr>
  </table>
  </form>
 
</div>

</body>
</html>
